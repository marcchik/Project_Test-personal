<?php
/**
 * Created by PhpStorm.
 * User: alexa
 * Date: 04.02.2021
 * Time: 17:05
 */

error_reporting(E_ALL & ~E_NOTICE);

ini_set('log_errors', 'On');
ini_set('error_log', 'php_errors.txt');

define('_MRH_LOGIN', 'TestJobs');
define('_MRH_PASSWORD1', 'bSIT7vK69C1meV2oqCsN');
define('_MRH_PASSWORD2', 'h1jvC98dPFTZ0axto1aw');

function sendTelegramBot($chat_id, $message) {

    $link = "https://api.telegram.org/"._TELEGRAM_BOT_API."/sendMessage?chat_id=".$chat_id."&text=".urlencode($message);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $link);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    $result = curl_exec($ch);
    $code = curl_getinfo($ch,CURLINFO_HTTP_CODE);
    curl_close($ch);

    $result = json_decode($result, true);

    if (isset($result['ok'])) {
        if ($result['ok']) {
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function getManagerName($users, $manager_id) {
    $manager_name = "";

    foreach ($users as $user) {
        $user_id = $user["ID"] + 0;
        if($user_id == $manager_id) {
            $manager_name = trim($user['LAST_NAME']).' '.trim($user['NAME']);
            break;
        }
    }

    return $manager_name;
}

function getNameById($rows, $id, $field_id = "ID", $field_name = "TITLE") {
    $name = "";

    foreach ($rows as $row) {
        $row_id = $row[$field_id] /1;
        if($row_id == $id) {
            $name = trim($row[$field_name]);
            break;
        }
    }

    return $name;
}

function myLog($text, $from='', $file = "bitrix24.log"){

    $dir = "logs";
    if (!is_dir($dir)) {
        mkdir($dir);
    }

    if (!file_exists($file)) {  $fp = fopen($file, "w");}
    if($text == 'stop'){
        file_put_contents($file, "\n\n\n\n", FILE_APPEND);
    }else{
        $text = var_export($text, true);
        file_put_contents($file, date("H:i:s d-m-Y")." :".$from.": ".$text."\n", FILE_APPEND);
    }
    if (filesize($file) > 12000000) {
        $tt = date("Ymd");
        $max_log = basename($file, ".txt").'_max_'.$tt.'.log';
        if (!file_exists($max_log))
        {
            $fp = fopen($dir."/".$max_log, "w");
        }
        //file_put_contents($max_log, substr(file_get_contents($file), -10000000, null, 'latin1'));

        //копируем
        file_put_contents($dir."/".$max_log, file_get_contents($file));
        //очищаем
        file_put_contents($file, '');
    }

    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
            $time_sec=time();
            $time_file=filemtime($dir ."/". $file);
            $time=$time_sec-$time_file;
            $unlink = $dir."/".$file;
            if (is_file($unlink)){
                if ($time>30*24*60*60){
                    unlink($unlink);
                }
            }
        }
        closedir($dh);
    }
}

function checkFirst($id, $path, $comment) {
    $dir = "process";
    if (!is_dir($dir)) {
        mkdir("process");
    }

    $dir = "process/".$path."/";
    if (!is_dir($dir)) {
        mkdir("process/".$path."/");
    }

    $process='process/'.$path.'/'.$id."_".$comment.'.txt';
    if (!file_exists($process)) {
        $fp = fopen($process, "w");
        fclose($fp);
        return 1;
    } else {
        return 0;
    }
}

function get_batch($items, $metod, $field) {
    $i = 1;
    $contacts_list = array();
    if ($items) {
        foreach ($items as $item) {
            $contact_id = $item[$field] + 0;
            $bb = 0;

            if (($i % 49) == 1) {
                $batch_list = array();
            }
            $batch_list[] = array(
                'method' => $metod,
                'params' => [
                    "id" => $contact_id,
                ]);

            if (($i % 49) == 0) {
                $batch_result = CRest::callBatch($batch_list);
                $contacts_tmp = $batch_result['result']['result'];

                $contacts_list = array_merge($contacts_list, $contacts_tmp);
                $bb = 1;
            }
            $i++;
        }

        if (!$bb) {
            $batch_result = CRest::callBatch($batch_list);
            $contacts_tmp = $batch_result['result']['result'];

            $contacts_list = array_merge($contacts_list, $contacts_tmp);
        }
    }

    return $contacts_list;
}

function getCurrentUserId() {

    if(empty($_REQUEST['AUTH_ID'])) {
        return 0;
    }

    $queryUrl = 'https://'.$_REQUEST['DOMAIN'].'/rest/user.current.json';
    $queryData = http_build_query(array(
        "auth" => $_REQUEST['AUTH_ID']
    ));
    $bb = 1;

    while ($bb) {
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_SSL_VERIFYPEER => 0,
            CURLOPT_POST => 1,
            CURLOPT_HEADER => 0,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => $queryUrl,
            CURLOPT_POSTFIELDS => $queryData,
        ));

        $result = json_decode(curl_exec($curl), true);
        curl_close($curl);

        if(!empty($result)) {
            if(isset($result['error'])) {
                $bb = 1;
            } else {
                $bb = 0;
            }
        }
        usleep(0.15 * 1000000);
    }

    $user_cur = $result['result'];
    $user_cur_id = $user_cur['ID'] / 1;

    return $user_cur_id;
}

function get_distr_users($distr_users, $prev_user) {

    $new_user = $distr_users[0]+0;

    if($prev_user) {
        $k = count($distr_users);
        for ($i=0; $i<$k; $i++) {
            if ($prev_user == $distr_users[$i]){
                if ($i == $k-1) {
                    $new_user = $distr_users[0];
                } else {
                    $new_user = $distr_users[$i+1];
                }
            }
        }
    }

    return $new_user;
}

function showModalImg($id, $filename, $metka, $auditor_id, $market_id, $section_id, $element_id) {
    $html = "";

    $modal = "modal".$id;

    $html .= '<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#'.$modal.'">';
    $html .= $filename;
    $html .= '</button>';

    $html .= '<div class="modal fade" id="'.$modal.'" tabindex="-1" role="dialog" aria-labelledby="'.$modal.'Label" aria-hidden="true">';
    $html .= '<div class="modal-dialog modal-lg" role="document">';
    $html .= '<div class="modal-content">';
    $html .= '<div class="modal-header">';
    $html .= '<h5 class="modal-title" id="'.$modal.'Label">'.$filename.'</h5>';
    $html .= '<button type="button" class="close" data-dismiss="modal" aria-label="Close">';
    $html .= '<span aria-hidden="true">&times;</span>';
    $html .= '</button>';
    $html .= '</div>';
    $html .= '<div class="modal-body">';
    $html .= '<img src="images/'.$filename.'" width="500px">';
    $html .= '</div>';
    $html .= '<div class="modal-footer">';
    $html .= '<button type="button" class="btn btn-secondary" data-dismiss="modal">Закрыть</button>';
    $html .= '<button type="button" class="btn btn-primary img-del" ms-id="'.$id.'" ms-metka="'.$metka.'" ms-auditor-id="'.$auditor_id.'" ms-market-id="'.$market_id.'" ms-section-id="'.$section_id.'" ms-element-id="'.$element_id.'">Удалить</button>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';
    $html .= '</div>';

    return $html;
}

function setSelectListHtml($nameselect, $selectlist, $default_id, $item_id, $item_name, $item_2 = "") {
    $selected = ($default_id[0] == -1 ? "selected" : "");
    $html = '<select size="1" class="form-control" name="'.$nameselect.'" style="width: 200px; display: inline">';
    $html .= '<option value="-1" '.$selected.'>- Выберите</option>';
    foreach($selectlist AS $item) {
        $selected = "";

        if($default_id == $item[$item_id]) {
            $selected = "selected";
        }

        $html .= '<option value="' . $item[$item_id] . '"'.$selected.'>' . $item[$item_name]. (isset($item[$item_2]) ? " ".$item[$item_2] : "") . '</option>';
    }
    $html .= '</select>';

    return $html;
}

function generatePromo($len = 12) {
    $chars = '12345ABCDEFGHIJKLMNOPQRSTUVWXYZ67890';
    $hashpromo = '';
    for($ichars = 0; $ichars < $len; ++$ichars) {
        $random = str_shuffle($chars);
        $hashpromo .= $random[0];
    }
    return $hashpromo;
}

function getUniquePhone($contact_phone, $ff="7") {
    $bb = 0;
    $contact_phone = str_replace(array(" ", "+", "(", ")", "-"), "", $contact_phone);
    if($contact_phone[0] == "8") {
        $contact_phone = substr($contact_phone, 1);
        $bb = 1;
    } elseif ($contact_phone[0] == "7") {
        $contact_phone = substr($contact_phone, 1);
        $bb = 1;
    }
    if($bb) {
        $contact_phone = $ff . $contact_phone;
    }
    return $contact_phone;
}

function findText($taskText, $searchText)
{
    $pos = strpos($taskText, $searchText);
    $aa = 0;

    if ($pos === false) {
        $aa = 0;
    } else {
        $aa = 1;
    }
    return $aa;
}

function getResultTestJobs($rows) {
    $results = [];

    $e = $rows['E']/1;
    $i = $rows['I']/1;

    $sum = ($e + $i)/2;
    if($e >= $i) {
        $results['E'] = "E".round(($e - $sum)/($sum)*100);
    } else {
        $results['I'] = "I".round(($i - $sum)/($sum)*100);
    }

    $s = $rows['S']/1;
    $n = $rows['N']/1;

    $sum = ($s + $n)/2;
    if($s >= $n) {
        $results['S'] = "S".round(($s - $sum)/($sum)*100);
    } else {
        $results['N'] = "N".round(($n - $sum)/($sum)*100);
    }


    $t = $rows['T']/1;
    $f = $rows['F']/1;

    $sum = ($t + $f)/2;
    if($t >= $f) {
        $results['T'] = "T".round(($t - $sum)/($sum)*100);
    } else {
        $results['F'] = "F".round(($f - $sum)/($sum)*100);
    }

    $j = $rows['J']/1;
    $p = $rows['P']/1;

    $sum = ($j + $p)/2;
    if($j >= $p) {
        $results['J'] = "J".round(($j - $sum)/($sum)*100);
    } else {
        $results['P'] = "P".round(($p - $sum)/($sum)*100);
    }

    return $results;
}

function getRobokassaLinkPay($lead_id, $out_summ) {
    $mrh_login = _MRH_LOGIN;
    $mrh_pass1 = _MRH_PASSWORD1;

    $inv_id   = $lead_id;
    $inv_desc  = "Оплата теста";

    $crc  = md5("$mrh_login:$out_summ:$inv_id:$mrh_pass1");

    $url = "https://auth.robokassa.ru/Merchant/Index.aspx?MrchLogin=$mrh_login&".
        "OutSum=$out_summ&InvId=$inv_id&Desc=$inv_desc&SignatureValue=$crc";

    return $url;
}

function sendMail($mail_to, $mail_to_name, $subject, $message, $file_attach="", $mail_from="zakaz@testjobs.ru", $mail_from_name="TestJobs"){
    $username = "zakaz@testjobs.ru";
    $password = "Zakaz123>";

    $mail = new \PHPMailer\PHPMailer\PHPMailer;
    $mail->CharSet = 'utf-8';
    $mail->isSMTP();
    //$mail->SMTPDebug = 2;
    $mail->Host = 'smtp.yandex.ru';
    //Set the SMTP port number - likely to be 25, 465 or 587
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    //Whether to use SMTP authentication
    $mail->SMTPAuth = true;
    $mail->Username = $username;
    $mail->Password = $password;
    //$mail->setFrom($username, $mail_from_name);
    $mail->setFrom($mail_from, $mail_from_name);
    $mail->addReplyTo($mail_to, $mail_to_name);

    $mail->addAddress($mail_to, $mail_to_name);
    $mail->Subject = $subject;
    $mail->msgHTML($message);
    if($file_attach) {
        $mail->addAttachment($file_attach);
    }
    if (!$mail->send()) {
        return 0;
    } else {
        return 1;
    }
}
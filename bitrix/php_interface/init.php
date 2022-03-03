<?php

CModule::IncludeModule('iblock');
//убираем email из обязательных полей
AddEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserUpdateHandler");
AddEventHandler("main", "OnBeforeUserUpdate", "OnBeforeUserUpdateHandler");

function OnBeforeUserUpdateHandler(&$arFields)
{
    $arFields["LOGIN"] = $arFields["EMAIL"];
    return $arFields;
}




// файл /bitrix/php_interface/init.php
// регистрируем обработчик
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("MyBalance", "OnAfterIBlockElementAddHandler"));

class MyBalance
{
    // создаем обработчик события "OnAfterIBlockElementAdd"
    function OnAfterIBlockElementAddHandler(&$arFields)
    {
        if ($arFields['IBLOCK_ID'] == 4) {

            //история финансов пользователя
            $balanceUser = 0;
            $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "CREATED_BY");
            $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CREATED_BY" => CUser::GetID());
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
            while($ob = $res->GetNextElement())
            {
                $arFields = $ob->GetFields();
                //добавляем пополнение
                $balanceUser += $arFields['PREVIEW_TEXT'];
                //минусуем списание
                $balanceUser -= $arFields['DETAIL_TEXT'];
            }
//            CEventLog::Add(array(
//                "ITEM_ID" => $arFields['PREVIEW_TEXT'],
//                "DESCRIPTION" => $balanceUser,
//            ));

            //баланс итоговый
            $BALANCE_ID = 0;
            $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "CREATED_BY");
            $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CREATED_BY" => CUser::GetID());
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
            while($ob = $res->GetNextElement())
            {
                $arFields = $ob->GetFields();
                //находим баланс
                $BALANCE_ID = $arFields['ID'];
            }

            //обновляем баланс в инфоблоке
            $el = new CIBlockElement;

            $arLoadProductArray = Array(
                "MODIFIED_BY"    => CUser::GetID(), // элемент изменен текущим пользователем
                "ACTIVE"         => "Y",            // активен
                "PREVIEW_TEXT"   => $balanceUser,
            );
//            CEventLog::Add(array(
//                "ITEM_ID" => $BALANCE_ID,
//                "DESCRIPTION" => "id",
//            ));
            $el->Update($BALANCE_ID, $arLoadProductArray);
        }
    }
}



//функция дампа
function pr($array){
     echo"<pre>";
        print_r($array);
     echo"</pre>";
}

//функция пересчета баланса
function recountBalance($id){

    //баланс пользователя
    $balance = array();

    //ID баланса пользователя
    $balanceID = 0;

    $arSelect = Array("ID", "CREATED_BY",  "PREVIEW_TEXT");
    $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CREATED_BY" => $id);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $balance = $arFields['PREVIEW_TEXT'];
        $balanceID = $arFields['ID'];
    }

    //баланс пользователя
    $arrFinance = array();

    $arSelect = Array("ID", "CREATED_BY",  "PREVIEW_TEXT", "DETAIL_TEXT");
    $arFilter = Array("IBLOCK_ID"=>4, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CREATED_BY" => $id);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);

    //последняя транзакция
    $endTransaction = 0;

    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arrFinance[$id]['+'] += $arFields['PREVIEW_TEXT'];
        $arrFinance[$id]['-'] += $arFields["DETAIL_TEXT"];

        //последняя операция в финансах
        $endTransaction = $arFields["PREVIEW_TEXT"] + $arFields["DETAIL_TEXT"];
    }

    //перессчитанный баланс
    $recalcBalance = $arrFinance[$id]['+'] - $arrFinance[$id]['-'];

//    if ($balance - $endTransaction == $recalcBalance || $balance + $endTransaction == $recalcBalance) {
//        $balance = $recalcBalance;
//        echo "совпало!!!";
//    }

    $el = new CIBlockElement;

    $arLoadProductArray = Array(
        "PREVIEW_TEXT"   => $recalcBalance,
    );

    $el->Update($balanceID, $arLoadProductArray);

    return $recalcBalance;
}

//событие после добавления в финансы
AddEventHandler("iblock", "OnAfterIBlockElementAdd", Array("RecBalance", "OnAfterIBlockElementAddHandler"));

class RecBalance
{
    // создаем обработчик события "OnAfterIBlockElementAdd"
    function OnAfterIBlockElementAddHandler(&$arFields)
    {
        if($arFields["IBLOCK_ID"] == 4)
            recountBalance($USER->GetID());

    }
}


//функция Робокассы
define('_MRH_LOGIN', 'TestJobs');
define('_MRH_PASSWORD1', 'bSIT7vK69C1meV2oqCsN');
define('_MRH_PASSWORD2', 'h1jvC98dPFTZ0axto1aw');

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

//функция отправки писем
function sendMail($mail_to, $mail_to_name, $subject, $message, $file_attach="", $mail_from="welcome@testpersonal.ru", $mail_from_name="TestPersonal"){
    $username = "welcome@testpersonal.ru";
    $password = "Welcome123>";

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

<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Администрирование");
?>


<? if($USER->IsAuthorized()):?>
    <main>
        <?
        if ($_FILES && $_FILES["filename"]["error"] == UPLOAD_ERR_OK) {
            $from = $_FILES["filename"]["tmp_name"];

            //массив с параметрами пользователей
            $usersParams = array();

            //читаем файл
            $row = 1;
            if (($handle = fopen($from, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, "\n")) !== FALSE) {
                    $num = count($data);
                    //echo "<p> $num fields in line $row: </p>";
                    $row++;
                    for ($c=0; $c < $num; $c++) {
                        $usersParams[] = str_replace('"', "", explode(";", $data[$c]));
                        //echo $data[$c] . "<br />\n";
                    }
                }


                // включаемая область для раздела
                $APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
                    "MODE" => "php",// будет редактировать в веб-редакторе
                    "NAME" => "Библиотеки для отправки email",// Библиотеки для отправки email
                    "TEMPLATE" => "mail_template.php" // имя шаблона для нового файла
                ));

                //функция генерирования паролей
                function gen_password($length = 6)
                {
                    $chars = 'qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP';
                    $size = strlen($chars) - 1;
                    $password = '';
                    while($length--) {
                        $password .= $chars[random_int(0, $size)];
                    }
                    return $password;
                }

                function _log($title, $data)
                {
                    if (true == true) {
                        if (!file_exists(__FILE__ . '_log')) {
                            mkdir(__FILE__ . '_log');
                            chmod(__FILE__ . '_log', 0777);
                        }
                        @file_put_contents(__FILE__ . '_log' . '/log.txt', '================ ' . $title . ' ================' . PHP_EOL . print_r($data, 1) . PHP_EOL, FILE_APPEND);
                    }
                    if ($_REQUEST["run"]) {
                        echo str_replace(PHP_EOL, "<br/>", '================ ' . $title . ' ================' . PHP_EOL . print_r($data, 1) . PHP_EOL);
                    }
                }

                function callB24Method($method, $params)
                {
                    $c = curl_init('https://genie.bitrix24.ru/rest/1/fb9drtkp8ko24rvh/' . $method . '.json');

                    curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($c, CURLOPT_POST, true);
                    curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($params));

                    $response = curl_exec($c);
                    $response = json_decode($response, true);

                    usleep(500000);
                    _log('REQUEST METHOD', $method);
                    _log('REQUEST PARAMS', $params);
                    _log('RESPONSE', $response);
                    return $response;
                }

                //успешно добавленные пользователи
                $countSuccessUsers = 0;
                //не добавленные добавленные пользователи
                $countFailedUsers = 0;
                //цикл обработки пользователей

                foreach ($usersParams as $key => $user) {
                    if ($key == 0) continue;

                    $login = $user[3];
                    $pass = gen_password(8)."a1A";
                    $name = iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $user[1]);
                    $profile = $user[4];

                    //создание пользователя
                    $newUser = new CUser;
                    $arFields = Array(
                        "NAME"                  => iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $user[1]),
                        "LAST_NAME"             => iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $user[0]),
                        "EMAIL"                 => $user[3],
                        "PERSONAL_PHONE"        => $user[2],
                        "LOGIN"                 => $user[3],
                        "PERSONAL_PROFESSION"   => $user[4],
                        "PASSWORD"              => $pass,
                    );

                    $result24 = callB24Method("crm.duplicate.findbycomm", array(
                        "entity_type" => "CONTACT",
                        "type" => "EMAIL",
                        "values" => array($user[3]),
                    ));

                    $contact_id24 = $result24['result']['CONTACT'][0];

                    if(!$contact_id24) {
                        $result24 = callB24Method("crm.contact.add", [
                            'fields' => [
                                "NAME" => iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $user[1]),
                                "LAST_NAME" => iconv('windows-1251//IGNORE', 'UTF-8//IGNORE', $user[0]),
                                "OPENED" => "Y",
                                "UF_CRM_5EB943318E1DA" => 2, //2- Импорт 1- Обычное создание
                                "TYPE_ID" => 2, //2- Пользователь TestPersonal; 3 - Сотрудник TestPersonal
                                "SOURCE_ID" => "79037550032",
                                "PHONE" => [["VALUE" => $user[2], "VALUE_TYPE" => "WORK"]],
                                "EMAIL" => [["VALUE" => $user[3], "VALUE_TYPE" => "WORK"]]
                            ],
                            'params' => ["REGISTER_SONET_EVENT" => "Y"]
                        ]);
                    }

                    $ID = $newUser->Add($arFields);

                    if (intval($ID) > 0){
                        $countSuccessUsers++;
                        echo '<div class="alert alert-primary" role="alert">Пользователь '.$user[3].' успешно добавлен!</div>';


                        //Хеш логина
                        $loginHash = base64_encode($login);

                        //Хеш пароля
                        $passHash = base64_encode($pass);

                        //ссылка на автологин
                        $linkAvtologin = "https://lk.testpersonal.ru/user/auth/autologin/?login=".$loginHash."&pass=".$passHash;

                        $subject = "$name, письмо от Сергея Ревуцкого";

                        $message = "$name, здравствуйте! Это Сергей Ревуцкий.<br> 
                        <br>
                        Ранее я проводил ваше профессиональное тестирование. Надеюсь оно было для вас полезным.<br>
                        Я создал сервис TestPersonal, который производит обработку и выдачу результата в автоматическом режиме.<br>
                        Был усовершенствован алгоритм работы тестирования и список доступных профессий.<br>
                        <br>
                        Результат вашего тестирования уже загружен в систему. Ваш профиль: $profile <br>
                        Заходите в личный кабинет и освежите в памяти описание своего профиля и то, какие професси вам подходят.<br>
                        <br>
                        В личном кабинете вам будет доступна персональная ссылка на тестирование, которую вы можете отправлять кандидатам на вакансию, друзьям и родственникам.<br>
                        Чтобы вам было комфортно начать пользоваться сервисом, мы пополнили баланс на 100 рублей.<br>
                        Вы можете использовать их, чтобы тестировать первого кандидата.<br>
                        <br>
                        Личный кабинет находится по адресу $linkAvtologin <br>
                        Ваш логин: $login \n<br>
                        Пароль: $pass<br>
                        <br>
                        Подробнее о самом сервисе вы можете прочитать на сайте https://testpersonal.ru";

                        //отправка письма с логином и паролем пользователю
                        sendMail($user[3], $user[3], $subject, $message);
                    } else {
                        $countFailedUsers++;
                        echo '<div class="alert alert-danger" role="alert">Пользователь '.$user[3].' не был добавлен!</div>';
                    }




                }

                fclose($handle);
                echo '<div class="alert alert-primary" role="alert">Успешно добавленные пользователи - '.$countSuccessUsers.'</div>';
                echo '<div class="alert alert-danger" role="alert">Не добавленные пользователи - '.$countFailedUsers.'</div>';

            }
        }
        ?>
        <h2>Загрузка файла</h2>
        <section class="scroll-section" id="filled">
            <div class="card mb-5">
                <div class="card-body">
                    <form  method="post" enctype="multipart/form-data">
                        Выберите файл:
                        <div class="input-group">
                            <input type="file" class="form-control" name="filename">
                            <input class="btn btn-outline-primary" type="submit" value="Загрузить" />
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <h2>Пополнение баланса</h2>
        <section class="scroll-section" id="wrapping">
            <div class="card mb-5">
                <div class="card-body">
                    <form method="post" action="/user/admin/">
                        <div class="input-group flex-nowrap">
                            <span class="input-group-text" id="addon-wrapping">@</span>
                            <input type="text" class="form-control" name="userID" placeholder="ID пользователя" aria-label="Username" aria-describedby="addon-wrapping">
                            <span class="input-group-text" id="addon-wrapping">$</span>
                            <input type="text" class="form-control" name="addSum" placeholder="Сумма пополнения" aria-label="addSum" aria-describedby="addon-wrapping">
                            <input class="btn btn-outline-primary" type="submit" name="addBalance" value="Пополнить" onclick="AddBalanc()"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>


        <?

        if (!empty($_POST['addBalance'])) {
            $el = new CIBlockElement;

            //ID пользователя, которому пополняют баланс
            $userID = $_POST['userID'];

            //Сумма пополнения
            $addSum = $_POST['addSum'];

            $arLoadProductArray = Array(
                "CREATED_BY" => $userID,
                "MODIFIED_BY"    => $userID,
                "IBLOCK_ID"      => 4,
                "CODE" => 2,
                "NAME"           => "Пополнение баланса",
                "ACTIVE"         => "Y",            // активен
                "PREVIEW_TEXT"   => $addSum,
            );


            //массив всех пользователей
            $usersID = array();

            //Email пользователя, которому пополняют баланс

            $filter = array();
            $rsUsers = CUser::GetList(($by="ID"), ($order="asc"), $filter);
            while ($arUser = $rsUsers->Fetch())
            {
                $usersID[$arUser['ID']]['ID'] = $arUser['ID'];
                $usersID[$arUser['ID']]['EMAIL'] = $arUser['EMAIL'];
            }


            //флаг проверки существования такого пользователя
            $existsUser = false;

            foreach ($usersID as $user) {
                if ($user['ID'] == $userID) {
                    $userName = $user['EMAIL'];
                    $existsUser = true;
                    if($PRODUCT_ID = $el->Add($arLoadProductArray)){
                        recountBalance($userID);
                        echo '<div class="alert alert-primary" role="alert">Баланс '.$userName.' на сумму '.$addSum.' руб. успешно пополнен!</div>';
                        unset($_POST);
                    }

                }
            }

            if ($existsUser == false) {
                echo '<div class="alert alert-danger" role="alert">Пользователя с таким ID не существует!</div>';
                echo '<div class="alert alert-danger" role="alert">Проверьте введенный ID!</div>';
            }


        }
        ?>
    </main>

<?else:?>
    <?$APPLICATION->SetTitle("Вход в личный кабинет");?>
    <?$APPLICATION->IncludeComponent("bitrix:system.auth.form","auth",Array(
            "REGISTER_URL" => "register.php",
            "FORGOT_PASSWORD_URL" => "",
            "PROFILE_URL" => "profile.php",
            "SHOW_ERRORS" => "Y"
        )
    );?>
<?endif;?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
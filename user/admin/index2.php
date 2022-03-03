<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Администрирование");
?>


<? if ($USER->IsAdmin()): ?>
    <main>

        
        <?
        pr($_SERVER);
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

                $pass = gen_password(8);


                //успешно добавленные пользователи
                $countSuccessUsers = 0;
                //не добавленные добавленные пользователи
                $countFailedUsers = 0;
                //цикл обработки пользователей

                foreach ($usersParams as $key => $user) {
                    if ($key == 0) continue;

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


                    $ID = $newUser->Add($arFields);

                    if (intval($ID) > 0){
                        $countSuccessUsers++;
                        echo '<div class="alert alert-primary" role="alert">Пользователь '.$user[3].' успешно добавлен!</div>';


                        $subject = 'Приглашение на сайт';
                        $message = 'Ваш логин - '.$user[3].", ваш пароль - ".$pass;

                        //отправка письма с логином и паролем пользователю
                        sendMail($user[3], $user[3], $subject, $message);
                    } else {
                        $countFailedUsers++;
                        echo '<div class="alert alert-danger" role="alert">Пользователь '.$user[3].'не был добавлен!</div>';
                    }




                }

                fclose($handle);

                echo '<div class="alert alert-primary" role="alert">Успешно добавленные пользователи - '.$countSuccessUsers.'</div>';
                echo '<div class="alert alert-danger" role="alert">Не добавленные пользователи - '.$countFailedUsers.'</div>';

            }
        }
        ?>
        <h2>Загрузка файлов</h2>

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
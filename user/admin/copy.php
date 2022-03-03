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
                while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                    $num = count($data);
                    echo "<p> $num fields in line $row: </p>";
                    $row++;
                    for ($c=0; $c < $num; $c++) {
                        $usersParams[] = explode(";", $data[$c]);
                        echo $data[$c] . "<br />\n";
                    }
                }


                // включаемая область для раздела
                $APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
                    "MODE" => "php",// будет редактировать в веб-редакторе
                    "NAME" => "Библиотеки для отправки email",// Библиотеки для отправки email
                    "TEMPLATE" => "mail_template.php" // имя шаблона для нового файла
                ));

                //успешно добавленные пользователи
                $countSuccessUsers = 0;
                //цикл обработки пользователей
                foreach ($usersParams as $key => $user) {
                    if ($key == 0) continue;

                    //создание пользователя
                    $newUser = new CUser;
                    $arFields = Array(
                        "NAME"                  => $user[1],
                        "LAST_NAME"             => $user[0],
                        "EMAIL"                 => $user[2],
                        "PERSONAL_PHONE"        => $user[3],
                        "LOGIN"                 => $user[4],
                        "PASSWORD"              => $user[6],
                        "PERSONAL_PROFESSION"   => $user[5],
                    );




                    $subject = 'Приглашение на сайт';
                    $message = 'Ваш логин - '.$user[4].", ваш пароль - ".$user[6];

                    //отправка письма с логином и паролем пользователю
                    sendMail($user[2], $user[2], $subject, $message);



                    $ID = $newUser->Add($arFields);
                    if (intval($ID) > 0){
                        $countSuccessUsers++;
                        echo "Пользователь успешно добавлен.";
                    }



                }

                

                fclose($handle);
                echo "успешно добавленные пользователи - ".$countSuccessUsers;
            }
        }
        ?>
        <h2>Загрузка файла</h2>
        <form  method="post" enctype="multipart/form-data">
            Выберите файл: <input type="file" name="filename"/><br /><br />
            <input type="submit" value="Загрузить" />
        </form>
<!--        <form id="upload-container" method="POST" action="send.php">-->
<!--            <img id="upload-image" src="https://habrastorage.org/webt/dr/qg/cs/drqgcsoh1mosho2swyk3kk_mtwi.png">-->
<!--            <div>-->
<!--                <input id="file-input" type="file" name="file" multiple>-->
<!--                <label for="file-input">Выберите файл</label>-->
<!--                <span>или перетащите его сюда</span>-->
<!--            </div>-->
<!--        </form>-->
    </main>
    <script>
        $(document).ready(function() {
            var dropZone = $('#upload-container');

            $('#file-input').focus(function() {
                $('label').addClass('focus');
            })
                .focusout(function() {
                    $('label').removeClass('focus');
                });


            dropZone.on('drag dragstart dragend dragover dragenter dragleave drop', function() {
                return false;
            });

            dropZone.on('dragover dragenter', function() {
                dropZone.addClass('dragover');
            });

            dropZone.on('dragleave', function(e) {
                let dx = e.pageX - dropZone.offset().left;
                let dy = e.pageY - dropZone.offset().top;
                if ((dx < 0) || (dx > dropZone.width()) || (dy < 0) || (dy > dropZone.height())) {
                    dropZone.removeClass('dragover');
                }
            });

            dropZone.on('drop', function(e) {
                dropZone.removeClass('dragover');
                let files = e.originalEvent.dataTransfer.files;
                sendFiles(files);
            });

            $('#file-input').change(function() {
                let files = this.files;
                sendFiles(files);
            });


            function sendFiles(files) {
                let maxFileSize = 5242880;
                let Data = new FormData();
                $(files).each(function(index, file) {
                    if ((file.size <= maxFileSize) && ((file.type == 'image/png') || (file.type == 'image/jpeg'))) {
                        Data.append('images[]', file);
                    }
                });

                $.ajax({
                    url: dropZone.attr('action'),
                    type: dropZone.attr('method'),
                    data: Data,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        alert('Файлы были успешно загружены!');
                    }
                });
            }
        })
    </script>
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
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кандидаты");
?> <!-- Bootstrap CSS (jsDelivr CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <style>
        .btn {
            //filter: saturate(0.7);
        }
        /*уменьшение поля для ввода email*/
        @media screen and (max-width: 1000px) {
            .input_email {
                width: 400px !important;
            }
        }
        @media screen and (max-width: 850px) {
            .input_email {
                width: 300px !important;
            }
        }
        @media screen and (max-width: 767px) {
            .input_email {
                width: 250px !important;
            }
        }
        /*класс для заголовков страниц в личном кабинете*/
        .h3{
            margin: 20px;
        }

        .container-fluid{
            margin-top: -14px;
        }
        @media (min-width: 768px) {
            .navbar-container {
                position: sticky;
                top: 0;
                overflow-y: auto;
                height: 100vh;
            }

            .navbar-container .navbar {
                align-items: flex-start;
                /*justify-content: flex-start;*/
                /*flex-wrap: nowrap;*/
                flex-direction: column;
                height: 100%;
            }

            .navbar-container .navbar-collapse {
                align-items: flex-start;
            }

            .navbar-container .nav {
                /*flex-direction: column;*/
                /*flex-wrap: nowrap;*/
            }

            .navbar-container .navbar-nav {
                flex-direction: column !important;
            }
        }
    </style>


            <div class="col-md-8 col-lg-9 content-container" >
                <h1 class="h3 text-center" >Кандидаты</h1>


                <section style="margin-top: 20px;">



                    <form class="form-inline ">
                        <div class="form-group mb-2">
                            <!-- The text field -->
                            <input class="form-control" style="width: 500px;"  readonly="readonly" type="text" value="https://test-personal.com/ts/?id=<?=base64_encode("user".$USER->GetID());?>" id="myInput">
                            <!-- The button used to copy the text -->
                        </div>
                        <button class="btn btn-primary ml-2 mb-2"style="width: 200px;" onclick="myFunction()">Скопировать ссылку</button>
                    </form>
                    <small style="color: gray">Передайте ссылку для прохождения теста вашему сотруднику удобным для вас способом.</small>


                    <form style="margin-top: 40px;" class="form-inline" action="index.php" method="post">
                            <div class="form-group mt-1">
<!--                                <input type="email" name="email" class="form-control2 form-control" id="exampleFormControlInput1" placeholder="name@example.com">-->
                                <textarea name="email" class="form-control input_email" placeholder="Введите Email сотрудников через запятую" id="exampleFormControlTextarea1" rows="1" style="width: 500px"></textarea>
                            </div>
                            <input style="margin-top: -11px; width: 200px;"  type="submit" value="Пригласить" name="invite" class="btn btn-primary ml-2 mt-1">

                    </form>
                    <script>
                        function myFunction() {
                            /* Get the text field */
                            var copyText = document.getElementById("myInput");

                            /* Select the text field */
                            copyText.select();

                            /* Copy the text inside the text field */
                            document.execCommand("copy");

                            /* Alert the copied text */
                            //alert("Copied the text: " + copyText.value);
                        }
                    </script>



                    <?
                    CModule::IncludeModule('iblock');
                    $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
                    $iblock_id = 3; // тут id вашего инфоблока

                    //массив свойств элемента
                    $props = array();

                    //добавление статуса в пользовательское свойство
                    $props[6] = "Приглашен";

                    $arFieldsSec = array(
                        'IBLOCK_ID'=>$iblock_id, // id инфоблока
                        'NAME' => $_POST['email'], // тут к примеру POST переменная name. NAME это название поля в инфоблоке
                        "PROPERTY_VALUES"=> $props,
                    );

                    // ну и добавляем через метод
                    $STAFF_ID = $el->Add($arFieldsSec);//ID добавленного сотрудника
                    ?>
                    <?
                    // включаемая область для раздела
                    $APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
                        "MODE"      => "php",// будет редактировать в веб-редакторе
                        "NAME"      => "Библиотеки для отправки email",// Библиотеки для отправки email
                        "TEMPLATE"  => "mail_template.php" // имя шаблона для нового файла
                    ));
                    $mail_to = $_POST['email'];
                    $subject = 'Приглашение пройти тест';
                    $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
                    # Если кнопка нажата
                    if( isset( $_POST['invite'] ) )
                    {
                        $pattern = "/[-a-z0-9!#$%&'*_`{|}~]+[-a-z0-9!#$%&'*_`{|}~\.=?]*@[a-zA-Z0-9_-]+[a-zA-Z0-9\._-]+/i";
                        $text = $_POST['email'];
                        preg_match_all($pattern, $text, $result);
                        foreach ($result[0] as $item){
                            # отправка письма на почту
                            sendMail($item, $item, $subject, $message);
                        }
                        //переадресация на страницу после вывода сообщения
                        echo "<script>alert('Письма отправлены!');
                        location.href='/user/staff/';</script>";
                    }
                    ?>

                  <div style="margin-top: 40px; margin-bottom: 40px;">
                      <?$APPLICATION->IncludeComponent(
	"bitrix:iblock.element.add", 
	"staff", 
	array(
		"AJAX_MODE" => "N",
		"AJAX_OPTION_ADDITIONAL" => "",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"ALLOW_DELETE" => "Y",
		"ALLOW_EDIT" => "Y",
		"COMPONENT_TEMPLATE" => "staff",
		"CUSTOM_TITLE_DATE_ACTIVE_FROM" => "",
		"CUSTOM_TITLE_DATE_ACTIVE_TO" => "",
		"CUSTOM_TITLE_DETAIL_PICTURE" => "",
		"CUSTOM_TITLE_DETAIL_TEXT" => "",
		"CUSTOM_TITLE_IBLOCK_SECTION" => "",
		"CUSTOM_TITLE_NAME" => "",
		"CUSTOM_TITLE_PREVIEW_PICTURE" => "",
		"CUSTOM_TITLE_PREVIEW_TEXT" => "",
		"CUSTOM_TITLE_TAGS" => "",
		"DEFAULT_INPUT_SIZE" => "30",
		"DETAIL_TEXT_USE_HTML_EDITOR" => "N",
		"ELEMENT_ASSOC" => "CREATED_BY",
		"GROUPS" => array(
			0 => "2",
		),
		"IBLOCK_ID" => "3",
		"IBLOCK_TYPE" => "employee",
		"LEVEL_LAST" => "Y",
		"MAX_FILE_SIZE" => "0",
		"MAX_LEVELS" => "100000",
		"MAX_USER_ENTRIES" => "100000",
		"NAV_ON_PAGE" => "1000",
		"PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
		"PROPERTY_CODES" => array(
			0 => "2",
			1 => "NAME",
		),
		"PROPERTY_CODES_REQUIRED" => array(
			0 => "NAME",
		),
		"RESIZE_IMAGES" => "N",
		"SEF_MODE" => "N",
		"STATUS" => "ANY",
		"STATUS_NEW" => "N",
		"USER_MESSAGE_ADD" => "",
		"USER_MESSAGE_EDIT" => "",
		"USE_CAPTCHA" => "N"
	),
	false
);?>
                  </div>
                </section>
            </div>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
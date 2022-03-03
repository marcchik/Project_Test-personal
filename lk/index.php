<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кандидаты");
?>
    <!-- Bootstrap CSS (jsDelivr CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <!-- Bootstrap Bundle JS (jsDelivr CDN) -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
    <style>
        .col-md-4{
            height: auto !important;
        }
        .row{
            height: 100vh;
        }
        .col-md-8{
            height: auto;
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

<?if ($USER->IsAuthorized()):?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-3 navbar-container bg-light">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="navbar-brand" href="#">Личный кабинет</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbar">
                        <!-- Вертикальное меню -->
                        <ul class="navbar-nav">
                            <li class="">
                                <a class="nav-link" href="/user/staff/">Кандидаты</a>
                            </li>
                            <li class="">
                                <a class="nav-link" href="/user/finance/">Финансы</a>
                            </li>
                            <li class="">
                                <a class="nav-link" href="/user/profile/">Профиль</a>
                            </li>
                            <li class="">
                                <a class="nav-link" href="<?=$APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), array(
                                    "login",
                                    "logout",
                                    "register",
                                    "forgot_password",
                                    "change_password"));?>">Выйти</a>
                                <!--								<a class="nav-link" href="https://Test-personal.com/user/logout.php">Выйти</a>-->
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
            <div class="col-md-8 col-lg-9 content-container" style="background-color: #ffe0b2">
                <h1 class="h3 text-center mt-3">Кандидаты</h1>
                <hr>

                <section>

                    <form class="form-inline" action="index.php" method="post">
                        <label for="exampleFormControlInput1">Email address</label>
                        <div class="form-group mx-sm-3 ">
                            <!--                                <input type="email" name="email" class="form-control2 form-control" id="exampleFormControlInput1" placeholder="name@example.com">-->
                            <textarea name="email" class="form-control" id="exampleFormControlTextarea1" rows="1" style="width: 500px"></textarea>
                        </div>
                        <input type="submit" value="Пригласить" name="invite" class="btn btn-primary btn-primary2">
                    </form>
                    <?
                    // включаемая область для раздела
                    $APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
                        "MODE"      => "php",// будет редактировать в веб-редакторе
                        "NAME"      => "Библиотеки для отправки email",// Библиотеки для отправки email
                        "TEMPLATE"  => "mail_template.php" // имя шаблона для нового файла
                    ));
                    $mail_to = $_POST['email'];
                    $subject = 'Приглашение пройти тест';
                    $message = 'Вас приглашают пройти тест по типированию сотрудников';
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
                        echo "<script type='text/javascript'>alert('Письма отправлены!');</script>";
                        header('Location: /user/staff/');
                    }
                    ?>
                    <?
                    CModule::IncludeModule('iblock');
                    $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
                    $iblock_id = 3; // тут id вашего инфоблока

                    $arFieldsSec = array(
                        'IBLOCK_ID'=>$iblock_id, // id инфоблока
                        'NAME' => $_POST['email'], // тут к примеру POST переменная name. NAME это название поля в инфоблоке
                        'PREVIEW_TEXT' => 'приглашён'
                    );

                    // ну и добавляем через метод
                    $el->Add($arFieldsSec);
                    ?>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:iblock.element.add",
                        "staff",
                        Array(
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
                            "GROUPS" => array(0=>"2",),
                            "IBLOCK_ID" => "3",
                            "IBLOCK_TYPE" => "employee",
                            "LEVEL_LAST" => "Y",
                            "MAX_FILE_SIZE" => "0",
                            "MAX_LEVELS" => "100000",
                            "MAX_USER_ENTRIES" => "100000",
                            "NAV_ON_PAGE" => "10",
                            "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                            "PROPERTY_CODES" => array(0=>"NAME",),
                            "PROPERTY_CODES_REQUIRED" => array(0=>"NAME",),
                            "RESIZE_IMAGES" => "N",
                            "SEF_MODE" => "N",
                            "STATUS" => "ANY",
                            "STATUS_NEW" => "N",
                            "USER_MESSAGE_ADD" => "",
                            "USER_MESSAGE_EDIT" => "",
                            "USE_CAPTCHA" => "N"
                        )
                    );?>
                </section>
            </div>
        </div>
    </div>
<?else:?>
    <?$APPLICATION->IncludeComponent(
        "bitrix:system.auth.form",
        "auth",
        Array(
            "COMPONENT_TEMPLATE" => "auth",
            "FORGOT_PASSWORD_URL" => "/user/",
            "PROFILE_URL" => "/user/profile/",
            "REGISTER_URL" => "/user/registration/",
            "SHOW_ERRORS" => "Y"
        )
    );?>
<?endif;?>






<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
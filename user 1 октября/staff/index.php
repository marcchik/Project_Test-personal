<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Кандидаты");
?>


<? if($USER->IsAuthorized()):?>
            <main>
                <div class="col-auto mb-2 mb-md-0 me-auto">
                    <div class="w-auto sw-md-30">
                        <h1 class="mb-0 pb-0 display-4" id="title">Кандидаты</h1>
                    </div>
                </div>
                <br>
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
            </main>
            <?if (!empty($_REQUEST['tab'])):?>
                <script>
                    //удаляем активную ссылку в кандидатах
                    let oldLink = document.getElementById('testTabLink');
                    oldLink.classList.remove('active');
                    //удаляем открытый таб на странице кандидаты
                    let oldTab = document.getElementById('testTab');
                    oldTab.classList.remove('active');
                    oldTab.classList.remove('show');
                    //открываем нужную ссылку
                    let selectLink = document.getElementById('<?=$_REQUEST["tab"]?>Link');
                    selectLink.classList.add('active');
                    //открываем нужный таб
                    let selectTab = document.getElementById('<?=$_REQUEST["tab"]?>');
                    selectTab.classList.add('active');
                    selectTab.classList.add('show');

                </script>
            <?endif;?>

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
<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Финансы");
?>

    <? if($USER->IsAuthorized()):?>
        <main>
            <!--получаем баланс-->
            <?
            CModule::IncludeModule('iblock');

            // регистрируем обработчик
            //AddEventHandler("iblock", "OnAfterIBlockElementUpdate", Array("MyClass", "OnAfterIBlockElementUpdateHandler"));

            class MyClass
            {
                // создаем обработчик события "OnAfterIBlockElementUpdate"
                function OnAfterIBlockElementUpdateHandler(&$arFields)
                {
                    if($arFields["RESULT"] && $arFields['IBLOCK_ID'] == 5) {
                        $myBalance = $arFields['PREVIEW_TEXT'];
                        echo "<script>document.getElementById('balance').value ='Баланс: ".$myBalance." руб.';</script>";
                        return $myBalance;
                    }
                }
            }
            // регистрируем обработчик
            AddEventHandler("iblock", "OnBeforeIBlockElementAdd", Array("MyClass2", "OnBeforeIBlockElementAddHandler"));

            class MyClass2
            {
                // создаем обработчик события "OnBeforeIBlockElementAdd"
                function OnBeforeIBlockElementAddHandler(&$arFields)
                {
                    global $USER;
                    if($arFields["IBLOCK_ID"] == 4)
                    {
                        $arFields["NAME"] = 'Платеж на сумму '. $arFields['PREVIEW_TEXT'] .' руб. обрабатывается';
                        $arFields["ACTIVE"] = 'N';
                        $arFields["TAGS"] = $USER->GetID();
                        $arFields["CODE"] = 1;
                        $arFields["SEARCHABLE_CONTENT"] = $arFields['PREVIEW_TEXT'];
                    }
                }
            }
            //ID записи в робокассу
            $financeNow = array();

            $i = 0;
            $arSelect = Array("ID", "NAME", "ACTIVE", "PREVIEW_TEXT" , "TAGS", "CODE", "PROPERTY_ROBOKASSA");
            $arFilter = Array("IBLOCK_ID"=>4, "TAGS"=>$USER->GetID(), "ACTIVE"=>"N");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
            while($ob = $res->GetNextElement())
            {
                $arFields = $ob->GetFields();
                $financeNow[$i]['ID'] = $arFields['ID'];
                $financeNow[$i]['SUM'] = $arFields['PREVIEW_TEXT'];
                $financeNow[$i]['TAGS'] = $arFields['TAGS'];
                $financeNow[$i]['CODE'] = $arFields['CODE'];
                $financeNow[$i]['POBOKASSA'] = $arFields['PROPERTY_ROBOKASSA_VALUE'];
            }

            //страница с опдатой

            $urlRobokassa = getRobokassaLinkPay($financeNow[0]['ID'], $financeNow[0]['SUM']);
            if (strlen($urlRobokassa) > 0 &&  $financeNow[$i]['TAGS'] == $USER->GetID() && $financeNow[0]['CODE'] == 1) {
                echo "<script>location.href = '".$urlRobokassa."'; </script>";
                // здесь необходимо использовать метода модуля "Информационные блоки"
                $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
                $iblock_id = 4; // тут id вашего инфоблока

                $props = array();
                $props[10] = $urlRobokassa;

                $arLoadProductArray = Array(
                    'IBLOCK_ID' => $iblock_id, // id инфоблока
                    'CODE' => 0,
                    "PROPERTY_VALUES"=> $props,
                    'PREVIEW_TEXT' => 0,
                );
                $PRODUCT_ID = $financeNow[0]['ID'];  // изменяем элемент с кодом (ID)
                $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
                $key = true;
            }?>


            <script>
                function redirectRobokassa() {
                    location='<?=$urlRobokassa?>';
                }
            </script>

            <?$APPLICATION->IncludeComponent(
                "bitrix:iblock.element.add",
                "test_fin",
                array(
                    "AJAX_MODE" => "N",
                    "AJAX_OPTION_ADDITIONAL" => "",
                    "AJAX_OPTION_HISTORY" => "N",
                    "AJAX_OPTION_JUMP" => "N",
                    "AJAX_OPTION_STYLE" => "Y",
                    "ALLOW_DELETE" => "Y",
                    "ALLOW_EDIT" => "Y",
                    "COMPONENT_TEMPLATE" => "test_fin",
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
                    "IBLOCK_ID" => "4",
                    "IBLOCK_TYPE" => "finance",
                    "LEVEL_LAST" => "Y",
                    "MAX_FILE_SIZE" => "0",
                    "MAX_LEVELS" => "100000",
                    "MAX_USER_ENTRIES" => "100000",
                    "NAV_ON_PAGE" => "1000",
                    "PREVIEW_TEXT_USE_HTML_EDITOR" => "N",
                    "PROPERTY_CODES" => array(
                        0 => "NAME",
                        1 => "TAGS",
                        2 => "DATE_ACTIVE_FROM",
                        3 => "DATE_ACTIVE_TO",
                        4 => "IBLOCK_SECTION",
                        5 => "PREVIEW_TEXT",
                        6 => "PREVIEW_PICTURE",
                        7 => "DETAIL_TEXT",
                        8 => "DETAIL_PICTURE",
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
            <?
            if ($key = true) {
                echo "<script>document.getElementById('".$financeNow[0]['ID']."').href='".$financeNow[0]['POBOKASSA']."'; </script>";
                $key = false;
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



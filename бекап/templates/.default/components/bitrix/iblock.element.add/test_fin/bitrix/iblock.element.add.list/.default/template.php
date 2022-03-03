<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
$colspan = 5;

if ($arResult["CAN_EDIT"] == "Y") $colspan++;
if ($arResult["CAN_DELETE"] == "Y") $colspan++;
?>
<?//if ($arResult["MESSAGE"] <> ''):?>
<!--    --><?//ShowNote($arResult["MESSAGE"])?>
<?//endif?>
<div class="container_table">

<table class="table table-striped">
    <?if($arResult["NO_USER"] == "N"):?>
        <thead class="thead-dark">
        <tr>
            <th style="width: 500px;" scope="row">Наименование</th>
            <th scope="row">Дата</th>

            <th scope="row">Пополнение</th>
            <th scope="row">Списание</th>
            <th scope="row" style="text-align: right">Настройки</th>
        </tr>
        </thead>
        <tbody>
        <?if (count($arResult["ELEMENTS"]) > 0):?>
            <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                <tr>
                <!--наименование операции-->
                <td scope="row">
                    <?=$arElement["NAME"]?>
                </td>
                <td>
                    <?=$arElement["DATE_CREATE"];?>
                </td>

                <td>
                    <!--                пополнение-->
                    <?if ($arElement['CODE'] == 0):?>
                        <?
                        // здесь необходимо использовать метода модуля "Информационные блоки"
                        $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
                        $iblock_id = 4; // тут id вашего инфоблока

                        $arLoadProductArray = Array(
                            'IBLOCK_ID' => $iblock_id, // id инфоблока
                            'CODE' => 0,
                            'PREVIEW_TEXT' => 0,
                        );
                        $PRODUCT_ID = $arElement['ID'];  // изменяем элемент с кодом (ID)
                        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
                        ?>
                        <?=$arElement["PREVIEW_TEXT"];?>
                    <?else:?>
                        <?=$arElement["PREVIEW_TEXT"];?>
                    <?endif;?>
                </td>
                <td>
                    <!--                списание-->
                        <?=$arElement["DETAIL_TEXT"];?>
                </td>
                <td>
                    <!--                ссылка-->

                    <? if (strlen($arResult['PROPERTIES'][$arElement["ID"]]['ROBOKASSA']) > 0 && $arElement['CODE'] == 0):?>
                        <form style="float: right" class="form-inline" action="index.php" method="post">
                            <div class="form-group mx-sm-1 ">
                                <a id="<?=$arElement["ID"];?>" class="btn btn-primary" href="/">
                                    Повторить оплату
                                </a>
                            </div>
                        <?if ($arElement["CAN_DELETE"] == "Y"):?>
                                <div class="form-group mx-sm-1 ">
                                    <a class="btn btn-danger" href="?delete=Y&amp;CODE=<?=$arElement["ID"]?>&amp;<?=bitrix_sessid_get()?>" onClick="return confirm('<?echo CUtil::JSEscape(str_replace("#ELEMENT_NAME#", $arElement["NAME"], GetMessage("IBLOCK_ADD_LIST_DELETE_CONFIRM")))?>')">
                                        Удалить
                                    </a>
                                </div>



                        <?else:?>&nbsp;<?endif?>
                        </form>
                    <?endif;?>


                </td>





            <?endforeach?>
        <?else:?>
            <tr>
                <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
            </tr>
        <?endif?>
        </tbody>
    <?endif?>
    <tfoot>
    <tr>
        <th scope="row">
            Итого
        </th>

        <td>

        </td>
        <td >
            <?

            //баланс
            $balance = 0;
            //
            foreach ($arResult['ELEMENTS'] as $Item) {
                //сумма всех пополнений
                $arPopolnenie += $Item['PREVIEW_TEXT'];
                //сумма всех списаний
                $arSpisanie += $Item['DETAIL_TEXT'];
            }
            //баланс после списания
            $balance = $arPopolnenie - $arSpisanie;

            //ID вошедшего пользователя
            global $USER;
            $USER->GetID();

            //массив всех пользователей имеющих баланс
            $arrBalanceUsers = array();

            $arSelect = Array("ID", "NAME", "CREATED_BY");
            $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
            while($ob = $res->GetNextElement())
            {
                $arFields = $ob->GetFields();
                $arrBalanceUsers[$arFields["ID"]]['userID'] = $arFields['CREATED_BY'];
                $arrBalanceUsers[$arFields["ID"]]['balanceID'] = $arFields["ID"];
            }


            //наличие баланса
            $balanceIs = false;

            foreach ($arrBalanceUsers as $Item) {
                if ($Item['userID'] ==  $USER->GetID()) {
                    $balanceIs = true;
                    CModule::IncludeModule('iblock');
                    $el = new CIBlockElement; // подключаем класс для работы с инфоблоками

                    $arLoadProductArray = Array(
                        "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                        "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                        "ACTIVE"         => "Y",            // активен
                        'NAME' => 'Текущий баланс - '.$USER->GetLogin(), //
                        "PREVIEW_TEXT"   => $balance,
                    );

                    // ну и редактируем через метод
                    $PRODUCT_ID = $Item['balanceID'];  // изменяем элемент с кодом (ID) 2
                    $res = $el->Update($PRODUCT_ID, $arLoadProductArray);

                }
            }

            if ($balanceIs == false) {
                CModule::IncludeModule('iblock');
                $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
                $iblock_id = 5; // тут id вашего инфоблока

                $arFieldsSec = array(
                    'IBLOCK_ID' => $iblock_id, // id инфоблока
                    'NAME' => 'Текущий баланс - '.$USER->GetLogin(), //
                    'PREVIEW_TEXT' => $balance
                );

                // ну и добавляем через метод
                $el->Add($arFieldsSec);
            }
            ?>


            <?=$arPopolnenie;?>
        </td>
        <td>
            <?=$arSpisanie?>
        </td>
    </tr>
    <tr>
        <th scope="row">
            Баланс
        </th>

        <td>

        </td>
        <td colspan="3" style="text-align: center">
            <?echo $balance;?>
        </td>

    </tr>

    </tfoot>
</table>
</div>
<div style="margin-top: 40px;">
    <?if ($arParams["MAX_USER_ENTRIES"] > 0 && $arResult["ELEMENTS_COUNT"] < $arParams["MAX_USER_ENTRIES"]):?>
        <a class="btn btn-success" href="<?=$arParams["EDIT_URL"]?>?edit=Y">
            <?=GetMessage("IBLOCK_ADD_LINK_TITLE")?>
        </a>
    <?else:?>
</div>
<?=GetMessage("IBLOCK_LIST_CANT_ADD_MORE")?>
<?endif?>

<div style="margin-top: 40px;">
    <?if ($arResult["NAV_STRING"] <> ''):?><?=$arResult["NAV_STRING"]?><?endif?>
</div>

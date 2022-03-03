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
$colspan = 2;
//массив для списания
$arSpisanie = 0;
if ($arResult["CAN_EDIT"] == "Y") $colspan++;
if ($arResult["CAN_DELETE"] == "Y") $colspan++;
?>
<?if ($arResult["MESSAGE"] <> ''):?>
	<?ShowNote($arResult["MESSAGE"])?>
<?endif?>
<table class="table table-striped">
<?if($arResult["NO_USER"] == "N"):?>
	<thead class="thead-dark">
		<tr>
			<th scope="row">Наименование</th>
            <th scope="row">Дата</th>

            <th scope="row">Пополнение</th>
            <th scope="row">Списание</th>
		</tr>
	</thead>
	<tbody>
	<?if (count($arResult["ELEMENTS"]) > 0):?>
		<?foreach ($arResult["ELEMENTS"] as $arElement):?>
		<tr>
            <!--наименование операции-->
			<th scope="row">
			    <?=$arElement["NAME"]?>
            </th>
            <td>
                <?=$arElement["DATE_CREATE"];?>
            </td>

			<td>
<!--                пополнение-->
                <?if(strlen($arElement["DETAIL_TEXT"]) > 0):?>
                    <?=$arElement["PREVIEW_TEXT"];?>
                <?else:?>

                <?endif;?>
            </td>
            <td>
<!--                списание-->
                <?if(strlen($arElement["DETAIL_TEXT"]) > 0):?>

                <?else:?>
                    <?=$arElement["PREVIEW_TEXT"];?>
                    <?$arSpisanie += $arElement["PREVIEW_TEXT"];?>
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

            <?$balance = 0;?>
            <?foreach ($arResult['ELEMENTS'] as $Item):?>
                <?$balance += $Item['PREVIEW_TEXT'];?>
            <?endforeach;?>
            <?$balance = $balance - $arSpisanie;?>
            <?
            CModule::IncludeModule('iblock');
            $el = new CIBlockElement; // подключаем класс для работы с инфоблоками

            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                "ACTIVE"         => "Y",            // активен
                "PREVIEW_TEXT"   => $balance,
            );

            // ну и редактируем через метод
            $PRODUCT_ID = 40;  // изменяем элемент с кодом (ID) 2
            $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
            ?>

            <?echo $balance;?>
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
        <td colspan="2" style="text-align: center">
            <?echo $balance - $arSpisanie;?>
        </td>

    </tr>

    </tfoot>
</table>
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
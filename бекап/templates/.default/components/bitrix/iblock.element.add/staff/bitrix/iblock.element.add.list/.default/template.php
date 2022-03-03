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
$colspan = 4;
//pr($arResult);
if ($arResult["CAN_EDIT"] == "Y") $colspan++;
if ($arResult["CAN_DELETE"] == "Y") $colspan++;
?>

<?if ($arResult["MESSAGE"] <> ''):?>
	<?ShowNote($arResult["MESSAGE"])?>
<?endif?>
<div class="container_table">
    <table class="table table-striped">
        <?if($arResult["NO_USER"] == "N"):?>
            <thead class="thead-dark">
            <tr>
                <th scope="row"><?=GetMessage("IBLOCK_ADD_LIST_TITLE")?></th>
                <th scope="row">Имя</th>
                <th scope="row">Статус</th>
                <th scope="row" style="text-align: right">Настройки</th>
            </tr>
            </thead>
            <tbody>
            <?if (count($arResult["ELEMENTS"]) > 0):?>
<!--            находим имя из всех свойств-->
                <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                    <?
                       $ID =  $arElement['ID'];
                        foreach ($arResult['PROPERTIES'] as $item) {
                            if ($item['ID'] === $ID) {
                                $name_surname = $item['NAME_SURNAME'];
                                $status = $item['STATUS'];
                            }
                        }
                    ?>
                    <tr>
                        <!--            имя сотрудника-->
                        <td scope="row"><!--a href="detail.php?CODE=
			    <?=$arElement["ID"]?>"--><?=$arElement["NAME"]?><!--/a-->
                        </td>
                        <td>
                            <?=$name_surname?>
                        </td>
<!--                        результат-->

                        <!--            статус активности-->
                        <td>

                            <?=$status;?>

                            <!--                <small>-->
                            <!--                    --><?//=is_array($arResult["WF_STATUS"]) ? $arResult["WF_STATUS"][$arElement["WF_STATUS_ID"]] : $arResult["ACTIVE_STATUS"][$arElement["ACTIVE"]]?>
                            <!--                </small>-->
                        </td>

                        <!--			--><?//if ($arResult["CAN_EDIT"] == "Y"):?>
                        <!--            редактировать-->
                        <!--			<td>--><?//if ($arElement["CAN_EDIT"] == "Y"):?>
                        <!--                <a class="btn btn-secondary" href="--><?//=$arParams["EDIT_URL"]?><!--?edit=Y&amp;CODE=--><?//=$arElement["ID"]?><!--">-->
                        <!--                    --><?//=GetMessage("IBLOCK_ADD_LIST_EDIT")?><!----><?//else:?><!--&nbsp;--><?//endif?>
                        <!--                </a>-->
                        <!--            </td>-->
                        <!--			--><?//endif?>
                        <!--удалить-->
                        <?if ($arResult["CAN_DELETE"] == "Y"):?>
                            <td style="text-align: right">
                                <?if ($arElement["CAN_DELETE"] == "Y"):?>
                                    <form style="float: right" class="form-inline" action="index.php" method="post">
                                    <?if (strlen($arElement['DETAIL_TEXT']) > 0 && $status == 'Типирован' ):?>
                                        <div class="form-group mx-sm-1 ">
                                            <a class="btn btn-warning" href="/user/staff/rezult/.?id=<?=$arElement["ID"]?>">
                                                Посмотреть результат
                                            </a>
                                        </div>
                                    <?endif;?>
                                        <?
                                        $i++;
                                        $_POST['staff'][$i]['id_staff'] = $arElement['ID'];
                                        $_POST['staff'][$i]['name_staff'] = $arElement['NAME'];
                                        ?>
                                        <div class="form-group mx-sm-1 ">
                                            <input type="hidden" name="mail_to" value="<?=$i?>">
                                            <input  class="btn btn-primary hide-button" type="submit" value=" <?=GetMessage("IBLOCK_ADD_LIST_AGAIN_MAIL")?>" name="again">
                                            <input style="display: none" class="btn btn-primary btn2" type="submit" value="О" name="again">
                                        </div>
                                    <?if ($status == 'Тест пройден' || $status == 'Типирован' ):?>
                                        <div class="form-group mx-sm-1 ">
                                            <a class="btn btn-secondary" href="/user/typing/.?id=<?=$arElement["ID"]?>&name=<?=$name_surname?>">
                                                <!----><?//=GetMessage("IBLOCK_ADD_LIST_TYPE_STAFF")?>
                                            </a>
                                        </div>
                                    <?endif;?>
                                        <div class="form-group mx-sm-1 ">
                                            <a class="btn btn-danger" href="?delete=Y&amp;CODE=<?=$arElement["ID"]?>&amp;<?=bitrix_sessid_get()?>" onClick="return confirm('<?echo CUtil::JSEscape(str_replace("#ELEMENT_NAME#", $arElement["NAME"], GetMessage("IBLOCK_ADD_LIST_DELETE_CONFIRM")))?>')">
                                                <!----><?//=GetMessage("IBLOCK_ADD_LIST_DELETE")?>
                                            </a>
                                        </div>

                                    </form>

                                <?else:?>&nbsp;<?endif?>
                            </td>
                        <?endif?>
                    </tr>
                <?endforeach?>
            <?else:?>
                <tr>
                    <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
                </tr>
            <?endif?>
            </tbody>
        <?endif?>
        <!--	<tfoot>-->
        <!--		<tr>-->
        <!--			<td--><?//=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?><!----><?//if ($arParams["MAX_USER_ENTRIES"] > 0 && $arResult["ELEMENTS_COUNT"] < $arParams["MAX_USER_ENTRIES"]):?><!--<a href="--><?//=$arParams["EDIT_URL"]?><!--?edit=Y">--><?//=GetMessage("IBLOCK_ADD_LINK_TITLE")?><!--</a>--><?//else:?><!----><?//=GetMessage("IBLOCK_LIST_CANT_ADD_MORE")?><!----><?//endif?><!--</td>-->
        <!--		</tr>-->
        <!--	</tfoot>-->
    </table>
</div>





<??>
<?php
if( isset( $_POST['again'] ) ) {
    sendMail_again($_POST['staff'][$_POST['mail_to']]['name_staff']);
}
//переход к покупке типирования
if( isset( $_POST['typing'] ) ) {
    header('Location: /user/typing/');
}

//повторная отправка письма
function sendMail_again($mail_to) {
        //ID сотрудника
        $STAFF_ID = $_POST['staff'][$_POST['mail_to']]['id_staff'];
        $subject = 'Приглашение пройти тест';
        $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
        sendMail($mail_to, $mail_to, $subject, $message);
    //переадресация на страницу после вывода сообщения
    echo "<script>alert('Письмо отправлено повторно!');
    location.href='/user/staff/';</script>";
        return 1;
}

?>

<?if ($arResult["NAV_STRING"] <> ''):?><?=$arResult["NAV_STRING"]?><?endif?>
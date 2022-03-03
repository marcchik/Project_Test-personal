<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

//pr($_REQUEST);
//pr($_POST);

// проверим установлен ли модуль "Информационные блоки" и если да то подключим его
if (CModule::IncludeModule("iblock")) {
    // здесь необходимо использовать метода модуля "Информационные блоки"
    $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
    $iblock_id = 3; // тут id вашего инфоблока

    //добавление в свойство имя, проходившего тест
    $props = array();
    $props[2] = $_REQUEST['name'];
    $props[9] = $_REQUEST['tel'];
    //добавление статуса в пользовательское свойство
    $props[6] = "Тест пройден";
    $props[8] =  implode('; ', $_REQUEST['profession']);
    date_default_timezone_set("Europe/Moscow");
    $props[11] = date("d.m.Y H:i");



    if (isset($_REQUEST['chel_id'])) {
        $arFieldsSec = array(
            "MODIFIED_BY"    => trim(mb_strimwidth(base64_decode($_REQUEST['chel_id']),4, 100)), // элемент изменен текущим пользователем
            "CREATED_BY" => trim(mb_strimwidth(base64_decode($_REQUEST['chel_id']),4, 100)),
            'IBLOCK_ID' => $iblock_id, // id инфоблока
            'NAME' => $_REQUEST['email'], //

            'DETAIL_TEXT' => $_REQUEST['result'],
            "PROPERTY_VALUES"=> $props,
        );

        // ну и добавляем через метод
        $el->Add($arFieldsSec);
    }

    if (isset($_REQUEST['staff_id'])) {
        $arLoadProductArray = Array(
            "MODIFIED_BY"    => trim(mb_strimwidth(base64_decode($_REQUEST['chel_id']),4, 100)), // элемент изменен текущим пользователем
            'IBLOCK_ID' => $iblock_id, // id инфоблока
            'NAME' => $_REQUEST['email'], //

            'DETAIL_TEXT' => $_REQUEST['result'],
            "PROPERTY_VALUES"=> $props,
        );
        $PRODUCT_ID = trim(mb_strimwidth(base64_decode($_REQUEST['staff_id']),5, 100));  // изменяем элемент с кодом (ID) 2
        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
    }

    header("Location: /ts/thank/"); /* Перенаправление браузера */

}

?>

<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
//$APPLICATION->SetTitle("Пример");
?>

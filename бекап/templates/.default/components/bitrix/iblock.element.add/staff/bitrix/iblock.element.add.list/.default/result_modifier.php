<?php


$i=0;
foreach ($arResult["ELEMENTS"]as $value){ //вынимаем ид элементов
    $MassIDblocks[$i]=$value["ID"]; //это массив ИДов элементов инфоблока
    $i++;
}
unset($value);
$ELEMENTS = array();
foreach ($MassIDblocks as $value) {      //создание конечного массива данных
    $db_props = CIBlockElement::GetProperty("3", $value, "sort", "asc", array()); //вынимаем данные пользовательских полей (4- ид обрабатываемого инфоблока)
    $PROPS = array();
    $PROPS['ID'] = $value;
    while($ar_props = $db_props->Fetch()) {
        $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];
    }
    $ELEMENTS[] = $PROPS;       //конечный массив данных пользовательских свойств
}
$arResult['PROPERTIES'] = $ELEMENTS;
unset($value);

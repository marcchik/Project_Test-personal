<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");?>

<?
CModule::IncludeModule('iblock');


//добавление строки списания в финансы
$el = new CIBlockElement; // подключаем класс для работы с инфоблоками
$iblock_id = 4; // тут id вашего инфоблока
$checkedItems = isset($_POST['checked_items']) ? $_POST['checked_items'] : [];

$arFieldsSec = array(
    'IBLOCK_ID' => $iblock_id, // id инфоблока
    'NAME' => 'За типирование - '.$_POST['name'].' ('.implode(', ', $checkedItems).')', // тут к примеру POST переменная name. NAME это название поля в инфоблоке
    'DETAIL_TEXT' => $_POST['balance']
);

// ну и добавляем через метод
$el->Add($arFieldsSec);

//массив свойств элемента
$props = array();


//массив списка профессий
$arrEnumProfessions = array();
$sizes = CIBlockPropertyEnum::GetList([],[
    "IBLOCK_ID" => 3,
    "ELEMENT_ID" => 190,
    "CODE" => "TYPING"
]);

while ($size = $sizes->Fetch()){
    $arrEnumProfessions[$size["ID"]]['value'] = $size["VALUE"];
    $arrEnumProfessions[$size["ID"]]['id'] = $size["ID"];
}
pr($arrEnumProfessions);

//массив выбранных свойств типирования
$arrPropTyping = array();

foreach ($arrEnumProfessions as $Item) {
    foreach ($checkedItems as $checkedItem) {
        if ($Item['value'] == $checkedItem) {
            $arrPropTyping[] = $Item['id'];
        }
    }
}

//добавление в свойство Типирование - список профессий, на которые было типирование
$props[7] = $arrPropTyping;
//добавление статуса в пользовательское свойство
$props[6] = "Типирован";
//добавление даты прохождения теста в пользовательское свойство
date_default_timezone_set("Europe/Moscow");
$props[12] = date("d.m.Y H:i:s");
//старый результат теста на профессию
$db_props = CIBlockElement::GetProperty(3, $_POST['id'], "sort", "asc", array()); //вынимаем данные пользовательских полей (4- ид обрабатываемого инфоблока)
$PROPS = array();
while($ar_props = $db_props->Fetch()) {
    $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];

}
$props[8] = $PROPS['PROFESSION'];
//добавление в свойство имя, проходившего тест
$props[2] = $PROPS['NAME_SURNAME'];
//возращаем телефон
$props[9] = $PROPS['TEL'];


//прошлое типирование
//строка со старым типированием
$oldTyping = "";
$arSelect = Array("ID", "PREVIEW_TEXT");
$arFilter = Array("ID" => $_POST['id']);
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $oldTyping = $arFields['PREVIEW_TEXT'];
}
//добавляем специальности типирования к сотруднику
$employee = new CIBlockElement; // подключаем класс для работы с инфоблоками

$arLoadProductArray = Array(
    "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
    "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
    "ACTIVE"         => "Y",            // активен
    'PREVIEW_TEXT' => $oldTyping.", ".implode(', ', $checkedItems),
    "PROPERTY_VALUES"=> $props,
);

// ну и редактируем через метод
$PRODUCT_ID = $_POST['id'];  // изменяем элемент с кодом (ID) 2
$res = $employee->Update($PRODUCT_ID, $arLoadProductArray);



?>

<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>

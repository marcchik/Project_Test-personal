<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
CModule::IncludeModule('iblock');



//узнаем баланс по id
$balance = 0;
$arSelect = Array("ID", "PREVIEW_TEXT", "CREATED_BY");
$arFilter = Array("IBLOCK_ID"=>5, "CREATED_BY"=>CUser::GetID(), "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
    $arFields = $ob->GetFields();
    $balance = $arFields['PREVIEW_TEXT'];
}

//узнаем имя сотрудника по id
$name_staff;
$res = CIBlockElement::GetByID($_REQUEST['id']);
if($ar_res = $res->GetNext())
    $name_staff = $ar_res['NAME'];

    //поиск промокодов пользователя
    $arSelect = Array("ID", "NAME", "ACTIVE_FROM", "ACTIVE_TO", "PROPERTY_USER", "PROPERTY_PROMO_CODE", "PROPERTY_SUM_DISCOUNT", "PROPERTY_PROMO_STATUS");
    $arFilter = Array("IBLOCK_ID"=>9, "ACTIVE"=>"Y", "PROPERTY_USER" => $USER->GetLogin(), "PROPERTY_PROMO_STATUS" => "Активен");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

    $activePromocode = array();
    while($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        $activePromocode['ID'] = $arFields['ID'];
        $activePromocode['USER'] = $arFields['PROPERTY_USER_VALUE'];
        $activePromocode['CODE'] = $arFields['PROPERTY_PROMO_CODE_VALUE'];
        $activePromocode['DISCOUNT'] = $arFields['PROPERTY_SUM_DISCOUNT_VALUE'];
    }

    $SUM_DISCOUNT = 0;

    if (isset($activePromocode['ID'])) {
        pr($activePromocode);

        $el = new CIBlockElement;

        $PROP = array();

        $PROP[19] = $activePromocode['USER'];
        $PROP[20] = $activePromocode['CODE'];
        $PROP[21] = $activePromocode['DISCOUNT'];
        $PROP[22] = "Применен";

        $arLoadProductArray = Array(
            "PROPERTY_VALUES"=> $PROP,
        );

        $PRODUCT_ID = $activePromocode['ID'];
        //обновляем статус промокода на использованный
        $res = $el->Update($PRODUCT_ID, $arLoadProductArray);

        //сумма скидки
        $SUM_DISCOUNT = $activePromocode['DISCOUNT'];
    }
    //конец поиска




    if($balance >= 100 && $_REQUEST['status'] != "Типирован" && $name_staff != "19****@gmail.com") {

        //сумма типирования
        $SUM_TYPING = 100;

        //пересчет суммы типирования при наличии промокода
        if ($SUM_DISCOUNT != 0) {
            $SUM_TYPING -= $SUM_DISCOUNT;
        }

        //выбранная профессия
        $checkedItems = $_POST['professionChoose'];
        //массив свойств элемента
        $props = array();
        //добавление в свойство чека id сотрудника за которого типировали
        $props[13] = $_REQUEST['id'];

        //добавление строки списания в финансы
        $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
        $iblock_id = 4; // тут id вашего инфоблока

        $arFieldsSec = array(
            'IBLOCK_ID' => $iblock_id, // id инфоблока
            'NAME' => 'За типирование - '.$name_staff.' ('.$checkedItems.')', // тут к примеру POST переменная name. NAME это название поля в инфоблоке
            'DETAIL_TEXT' => $SUM_TYPING,
            "PROPERTY_VALUES"=> $props
        );

        // ну и добавляем через метод
        $el->Add($arFieldsSec);



        //массив свойств элемента
        $props = array();
        //добавление в свойство Типирование - список профессий, на которые было типирование
        $props[7] = $checkedItems;
        //добавление статуса в пользовательское свойство
        $props[6] = "Типирован";
        //добавление даты прохождения теста в пользовательское свойство
        date_default_timezone_set("Europe/Moscow");
        $props[12] = date("d.m.Y H:i:s");
        //старый результат теста на профессию
        $db_props = CIBlockElement::GetProperty(3, $_REQUEST['id'], "sort", "asc", array()); //вынимаем данные пользовательских полей (4- ид обрабатываемого инфоблока)
        $PROPS = array();
        while($ar_props = $db_props->Fetch()) {
            $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];
        }
        $props[8] = $PROPS['PROFESSION'];
        //добавление в свойство имя, проходившего тест
        $props[2] = $PROPS['NAME_SURNAME'];
        //возращаем телефон
        $props[9] = $PROPS['TEL'];
        //возращаем дату теста
        $props[11] = $PROPS['DATE_TEST'];


        //прошлое типирование
        //строка со старым типированием
        $oldTyping = "";
        $arSelect = Array("ID", "PREVIEW_TEXT");
        $arFilter = Array("ID" => $_REQUEST['id']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $oldTyping = $arFields['PREVIEW_TEXT'];
        }


        //добавляем специальности типирования к сотруднику
        $employee = new CIBlockElement; // подключаем класс для работы с инфоблоками

        if (empty($oldTyping)) {
            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                "ACTIVE"         => "Y",            // активен
                'PREVIEW_TEXT' => $checkedItems,
                "PROPERTY_VALUES"=> $props,
            );
        } else {
            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                "ACTIVE"         => "Y",            // активен
                'PREVIEW_TEXT' =>  $oldTyping.", ".$checkedItems,
                "PROPERTY_VALUES"=> $props,
            );
        }
        // ну и редактируем через метод
        $PRODUCT_ID = $_REQUEST['id'];  // изменяем элемент с кодом (ID) 2
        $res = $employee->Update($PRODUCT_ID, $arLoadProductArray);
        if ($res) {
            echo "<script>alert('Типирование сотрудника произведено!');
        location.href='/user/staff/profile/?id=".$_REQUEST['id']."';</script>";

        }
    }

    if($balance >= 50 && $_REQUEST['status'] == "Типирован" && $name_staff != "19****@gmail.com") {

        //сумма типирования
        $SUM_TYPING = 50;

        //пересчет суммы типирования при наличии промокода
        if ($SUM_DISCOUNT != 0) {
            $SUM_TYPING -= $SUM_DISCOUNT;
        }

        //выбранная профессия
        $checkedItems = $_POST['professionChoose'];
        //массив свойств элемента
        $props = array();
        //добавление в свойство чека id сотрудника за которого типировали
        $props[13] = $_REQUEST['id'];

        //добавление строки списания в финансы
        $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
        $iblock_id = 4; // тут id вашего инфоблока

        $arFieldsSec = array(
            'IBLOCK_ID' => $iblock_id, // id инфоблока
            'NAME' => 'За типирование - '.$name_staff.' ('.$checkedItems.')', // тут к примеру POST переменная name. NAME это название поля в инфоблоке
            'DETAIL_TEXT' => $SUM_TYPING,
            "PROPERTY_VALUES"=> $props
        );

        // ну и добавляем через метод
        $el->Add($arFieldsSec);



        //массив свойств элемента
        $props = array();
        //добавление в свойство Типирование - список профессий, на которые было типирование
        $props[7] = $checkedItems;
        //добавление статуса в пользовательское свойство
        $props[6] = "Типирован";
        //добавление даты прохождения теста в пользовательское свойство
        date_default_timezone_set("Europe/Moscow");
        $props[12] = date("d.m.Y H:i:s");
        //старый результат теста на профессию
        $db_props = CIBlockElement::GetProperty(3, $_REQUEST['id'], "sort", "asc", array()); //вынимаем данные пользовательских полей (4- ид обрабатываемого инфоблока)
        $PROPS = array();
        while($ar_props = $db_props->Fetch()) {
            $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];
        }
        $props[8] = $PROPS['PROFESSION'];
        //добавление в свойство имя, проходившего тест
        $props[2] = $PROPS['NAME_SURNAME'];
        //возращаем телефон
        $props[9] = $PROPS['TEL'];
        //возращаем дату теста
        $props[11] = $PROPS['DATE_TEST'];


        //прошлое типирование
        //строка со старым типированием
        $oldTyping = "";
        $arSelect = Array("ID", "PREVIEW_TEXT");
        $arFilter = Array("ID" => $_REQUEST['id']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $oldTyping = $arFields['PREVIEW_TEXT'];
        }

        //добавляем специальности типирования к сотруднику
        $employee = new CIBlockElement; // подключаем класс для работы с инфоблоками

        if (empty($oldTyping)) {
            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                "ACTIVE"         => "Y",            // активен
                'PREVIEW_TEXT' => $checkedItems,
                "PROPERTY_VALUES"=> $props,
            );
        } else {
            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                "ACTIVE"         => "Y",            // активен
                'PREVIEW_TEXT' =>  $oldTyping.", ".$checkedItems,
                "PROPERTY_VALUES"=> $props,
            );
        }
        // ну и редактируем через метод
        $PRODUCT_ID = $_REQUEST['id'];  // изменяем элемент с кодом (ID) 2
        $res = $employee->Update($PRODUCT_ID, $arLoadProductArray);
        if ($res) {
            echo "<script>alert('Типирование сотрудника произведено!');
            location.href='/user/staff/profile/?id=".$_REQUEST['id']."';</script>";

        }
    } else if ($name_staff == "19****@gmail.com") {
        //выбранная профессия
        $checkedItems = $_POST['professionChoose'];
        //массив свойств элемента
        $props = array();
        //добавление в свойство чека id сотрудника за которого типировали
        $props[13] = $_REQUEST['id'];


        //массив свойств элемента
        $props = array();
        //добавление в свойство Типирование - список профессий, на которые было типирование
        $props[7] = $checkedItems;
        //добавление статуса в пользовательское свойство
        $props[6] = "Типирован";
        //добавление даты прохождения теста в пользовательское свойство
        date_default_timezone_set("Europe/Moscow");
        $props[12] = date("d.m.Y H:i");
        //возращаем дату теста
        $props[11] = $PROPS['DATE_TEST'];

        //старый результат теста на профессию
        $db_props = CIBlockElement::GetProperty(3, $_REQUEST['id'], "sort", "asc", array()); //вынимаем данные пользовательских полей (4- ид обрабатываемого инфоблока)
        $PROPS = array();
        while($ar_props = $db_props->Fetch()) {
            $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];
        }
        $props[8] = $PROPS['PROFESSION'];
        //добавление в свойство имя, проходившего тест
        $props[2] = $PROPS['NAME_SURNAME'];
        //возращаем телефон
        $props[9] = $PROPS['TEL'];
        //возращаем дату теста
        $props[11] = $PROPS['DATE_TEST'];


        //прошлое типирование
        //строка со старым типированием
        $oldTyping = "";
        $arSelect = Array("ID", "PREVIEW_TEXT");
        $arFilter = Array("ID" => $_REQUEST['id']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
        while($ob = $res->GetNextElement())
        {
            $arFields = $ob->GetFields();
            $oldTyping = $arFields['PREVIEW_TEXT'];
        }

        //добавляем специальности типирования к сотруднику
        $employee = new CIBlockElement; // подключаем класс для работы с инфоблоками

        if (empty($oldTyping)) {
            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                "ACTIVE"         => "Y",            // активен
                'PREVIEW_TEXT' => $checkedItems,
                "PROPERTY_VALUES"=> $props,
            );
        } else {
            $arLoadProductArray = Array(
                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                "ACTIVE"         => "Y",            // активен
                'PREVIEW_TEXT' =>  $oldTyping.", ".$checkedItems,
                "PROPERTY_VALUES"=> $props,
            );
        }
        // ну и редактируем через метод
        $PRODUCT_ID = $_REQUEST['id'];  // изменяем элемент с кодом (ID) 2
        $res = $employee->Update($PRODUCT_ID, $arLoadProductArray);
        if ($res) {
            echo "<script>alert('Типирование сотрудника произведено!');
        location.href='/user/staff/profile/?id=".$_REQUEST['id']."';</script>";

        }
    } else {
        echo "<script>alert('Не достаточно средств!');
        location.href='/user/finance/?edit=Y';</script>";
    }


?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
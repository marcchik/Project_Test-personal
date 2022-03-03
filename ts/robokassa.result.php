<?
require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

//require_once (__DIR__.'/functions.php');

//sendMail("a_stepanjuk@tut.by", "Stepaniuk", "Тест", "Тест");

$hooklog = __DIR__."/".basename($_SERVER['SCRIPT_NAME'], ".php").".log";

myLog("stop", "", $hooklog);
myLog($_REQUEST, "RR", $hooklog);

// регистрационная информация (пароль #2)
// registration info (password #2)
$mrh_pass2 = _MRH_PASSWORD2;

//установка текущего времени
//current date
$tm = getdate(time()+9*3600);
$date = "$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

// чтение параметров
// read parameters
//сумма
$out_summ = $_REQUEST["OutSum"];
//id записи в финансах
$inv_id = $_REQUEST["InvId"];

$crc = $_REQUEST["SignatureValue"];

$crc = strtoupper($crc);

$my_crc = strtoupper(md5("$out_summ:$inv_id:$mrh_pass2"));

// проверка корректности подписи
// check signature
if ($my_crc != $crc)
{
    myLog("order_num :$inv_id; Summ :$out_summ; Date :$date", "Платеж: неверная сигнатура", $hooklog);
    die("error");
}

// признак успешно проведенной операции
// success
echo "OK$inv_id\n";

// запись в файл информации о проведенной операции
// save order info to file
myLog("order_num :$inv_id; Summ :$out_summ; Date :$date", "Платеж: успешен", $hooklog);

$order_id = $inv_id/1;


if (CModule::IncludeModule("iblock")) {
    // здесь необходимо использовать метода модуля "Информационные блоки"
    $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
    $iblock_id = 4; // тут id вашего инфоблока


    $arLoadProductArray = Array(
        'IBLOCK_ID' => $iblock_id, // id инфоблока
        'NAME' => 'Пополнение баланса',
        'TAGS' => 0,
        'CODE' => 2,
        'PREVIEW_TEXT' => $out_summ,
    );
    $PRODUCT_ID = $inv_id;  // изменяем элемент с кодом (ID)
    $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
}


myLog("end", "", $hooklog);



<?

require_once (__DIR__.'/functions.php');

$hooklog = __DIR__."/".basename($_SERVER['SCRIPT_NAME'], ".php").".log";

myLog("stop", "", $hooklog);

// регистрационная информация (пароль #2)
// registration info (password #2)
$mrh_pass2 = _MRH_PASSWORD2;

//установка текущего времени
//current date
$tm = getdate(time()+9*3600);
$date = "$tm[year]-$tm[mon]-$tm[mday] $tm[hours]:$tm[minutes]:$tm[seconds]";

// чтение параметров
// read parameters
$out_summ = $_REQUEST["OutSum"];
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

myLog("end", "", $hooklog);



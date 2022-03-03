<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


// меняем порядок следования полей
$arResult['SHOW_FIELDS'] = array(
    'NAME',
    'LAST_NAME',
    'PERSONAL_PHONE',
    'LOGIN',
    'EMAIL',
    'PASSWORD',
    'CONFIRM_PASSWORD',
);

$arResult['REQUIRED_FIELDS'] = array(
    'NAME',
    'LAST_NAME',
    'PERSONAL_PHONE',
    "EMAIL",
    "PASSWORD",
    "CONFIRM_PASSWORD",
);
//$arResult['VALUES']['LOGIN'] = $arResult['VALUES']['EMAIL'];

?>


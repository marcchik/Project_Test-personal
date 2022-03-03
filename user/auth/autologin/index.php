<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Автологин");
?>
    <br><br><br><br><br><br><br><br>
<?


echo base64_encode("11@11.11")."<br>";
echo base64_encode("M52502002s")."<br>";


    global $USER;
    $USER = new CUser;

    if ($USER->Login(base64_decode($_REQUEST['login']), base64_decode($_REQUEST['pass']), "Y")) {
        echo "<script>location.href='/user/home/'</script>";
    }

//$USER->Authorize(1); // авторизуем


?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
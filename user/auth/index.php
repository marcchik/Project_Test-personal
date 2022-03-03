<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Страница восстановления пароля");
?>
    <br/><br/><br/><br/><br/><br/><br/><br/>
<?$APPLICATION->IncludeComponent("bitrix:system.auth.form","",Array(
        "REGISTER_URL" => "/user/auth/",
        "FORGOT_PASSWORD_URL" => "/user/auth/",
        "PROFILE_URL" => "/user/profile/",
        "SHOW_ERRORS" => "Y"
    )
);?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
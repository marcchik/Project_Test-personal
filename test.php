<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");?><?$APPLICATION->IncludeComponent(
	"bitrix:system.auth.form",
	"auth",
	Array(
		"COMPONENT_TEMPLATE" => "auth",
		"FORGOT_PASSWORD_URL" => "/user/",
		"PROFILE_URL" => "/user/index.php",
		"REGISTER_URL" => "/user/index.php",
		"SHOW_ERRORS" => "Y"
	)
);?>

<br>
<br>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
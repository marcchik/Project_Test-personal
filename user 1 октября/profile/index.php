<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Профиль");
?>

    <? if($USER->IsAuthorized()):?>
        <main>
            <div class="col-auto mb-2 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <h1 class="mb-0 pb-0 display-4" id="title">Профиль</h1>
                </div>
                <br>
            </div>
            <?$APPLICATION->IncludeComponent("bitrix:main.profile","profile",Array(
                   
                )
            );?>
        </main>
    <?else:?>
        <?$APPLICATION->SetTitle("Вход в личный кабинет");?>
        <?$APPLICATION->IncludeComponent("bitrix:system.auth.form","auth",Array(
                "REGISTER_URL" => "register.php",
                "FORGOT_PASSWORD_URL" => "",
                "PROFILE_URL" => "profile.php",
                "SHOW_ERRORS" => "Y"
            )
        );?>
    <?endif;?>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
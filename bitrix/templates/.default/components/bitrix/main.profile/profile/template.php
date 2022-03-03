<?
/**
 * @global CMain $APPLICATION
 * @var array $arParams
 * @var array $arResult
 */
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
	die();

if($arResult["SHOW_SMS_FIELD"] == true)
{
	CJSCore::Init('phone_auth');
}
?>

<style>
    .form-control{
        margin-left: 10px;
    }
</style>
<div class="bx-auth-profile">

<?ShowError($arResult["strProfileError"]);?>
<?
if ($arResult['DATA_SAVED'] == 'Y')
	ShowNote(GetMessage('PROFILE_DATA_SAVED'));
?>

<?if($arResult["SHOW_SMS_FIELD"] == true):?>

<form method="post" action="<?=$arResult["FORM_TARGET"]?>">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />
<input type="hidden" name="SIGNED_DATA" value="<?=htmlspecialcharsbx($arResult["SIGNED_DATA"])?>" />
<table class="profile-table data-table">
	<tbody>
		<tr>
			<td><?echo GetMessage("main_profile_code")?><span class="starrequired">*</span></td>
			<td><input size="30" type="text" name="SMS_CODE" value="<?=htmlspecialcharsbx($arResult["SMS_CODE"])?>" autocomplete="off" /></td>
		</tr>
	</tbody>
</table>

<p><input type="submit" name="code_submit_button" value="<?echo GetMessage("main_profile_send")?>" /></p>

</form>

<script>
new BX.PhoneAuth({
	containerId: 'bx_profile_resend',
	errorContainerId: 'bx_profile_error',
	interval: <?=$arResult["PHONE_CODE_RESEND_INTERVAL"]?>,
	data:
		<?=CUtil::PhpToJSObject([
			'signedData' => $arResult["SIGNED_DATA"],
		])?>,
	onError:
		function(response)
		{
			var errorDiv = BX('bx_profile_error');
			var errorNode = BX.findChildByClassName(errorDiv, 'errortext');
			errorNode.innerHTML = '';
			for(var i = 0; i < response.errors.length; i++)
			{
				errorNode.innerHTML = errorNode.innerHTML + BX.util.htmlspecialchars(response.errors[i].message) + '<br>';
			}
			errorDiv.style.display = '';
		}
});
</script>

<div id="bx_profile_error" style="display:none"><?ShowError("error")?></div>

<div id="bx_profile_resend"></div>

<?else:?>

<script type="text/javascript">
<!--
var opened_sections = [<?
$arResult["opened"] = $_COOKIE[$arResult["COOKIE_PREFIX"]."_user_profile_open"];
$arResult["opened"] = preg_replace("/[^a-z0-9_,]/i", "", $arResult["opened"]);
if ($arResult["opened"] <> '')
{
	echo "'".implode("', '", explode(",", $arResult["opened"]))."'";
}
else
{
	$arResult["opened"] = "reg";
	echo "'reg'";
}
?>];


var cookie_prefix = '<?=$arResult["COOKIE_PREFIX"]?>';
</script>
<form method="post" name="form1" action="<?=$arResult["FORM_TARGET"]?>" enctype="multipart/form-data">
<?=$arResult["BX_SESSION_CHECK"]?>
<input type="hidden" name="lang" value="<?=LANG?>" />
<input type="hidden" name="ID" value=<?=$arResult["ID"]?> />

<div class="profile-block-<?= mb_strpos($arResult["opened"], "reg") === false ? "hidden" : "shown"?>" id="user_div_reg">
<!--    старый класс - class="form-control"-->
    <div class="row">
        <!-- Left Side Start -->
        <div class="col-12 col-xl-4 col-xxl-3">
            <!-- Biography Start -->
            <h2 class="small-title">Профиль</h2>
            <div class="card mb-5">
                <div class="card-body">
                    <div class="d-flex align-items-center flex-column mb-4">
                        <div class="d-flex align-items-center flex-column">
                            <div class="sw-13 position-relative mb-3">
                                <img src="/bitrix/templates/landing_lk/logoProfileGray.png" class="img-fluid rounded-xl" alt="photo" />
                            </div>
                            <div class="h5 mb-0"><?=$arResult["arUser"]["NAME"]." ".$arResult["arUser"]["LAST_NAME"]?></div>
                        </div>
                    </div>
                    <div class="nav flex-column" role="tablist">
                        <a class="nav-link active px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#overviewTab" role="tab">
                            <i data-cs-icon="activity" class="me-2" data-cs-size="17"></i>
                            <span class="align-middle">Информация</span>
                        </a>
                        <a class="nav-link px-0 border-bottom border-separator-light" href="/user/finance/" role="tab">
                            <i data-cs-icon="money" class="me-2" data-cs-size="17"></i>
                            <span class="align-middle">Финансы</span>
                        </a>
                        <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#permissionsTab" role="tab">
                            <i data-cs-icon="lock-off" class="me-2" data-cs-size="17"></i>
                            <span class="align-middle">Смена пароля</span>
                        </a>
                    </div>
                </div>
            </div>
            <!-- Biography End -->
        </div>
        <!-- Left Side End -->

        <!-- Right Side Start -->
        <div class="col-12 col-xl-8 col-xxl-9 mb-5 tab-content">
            <!-- Overview Tab Start -->
            <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">

                <div class="tab-pane fade active show" id="aboutTab2" role="tabpanel">
                    <h2 class="small-title">Информация</h2>
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">E-mail
                                </p>
                                <a href="#" class="d-block body-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email me-2"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                    <span class="align-middle"><?=$arResult["arUser"]["EMAIL"]?></span>
                                </a>
                            </div>
                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">Имя</p>
                                <a href="#" class="d-block body-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user me-2"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>                                    <span class="align-middle"><?=$PROPS['TEL']?></span>
                                    <span class="align-middle"><?=$arResult["arUser"]["NAME"]." ".$arResult["arUser"]["LAST_NAME"]?></span>
                                </a>
                            </div>
                            <div class="mb-2">
                                <p class="text-small text-muted mb-2">Телефон</p>
                                <a href="#" class="d-block body-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-mobile me-2"><path d="M4 5.5C4 4.09554 4 3.39331 4.33706 2.88886C4.48298 2.67048 4.67048 2.48298 4.88886 2.33706C5.39331 2 6.09554 2 7.5 2H12.5C13.9045 2 14.6067 2 15.1111 2.33706C15.3295 2.48298 15.517 2.67048 15.6629 2.88886C16 3.39331 16 4.09554 16 5.5V14.5C16 15.9045 16 16.6067 15.6629 17.1111C15.517 17.3295 15.3295 17.517 15.1111 17.6629C14.6067 18 13.9045 18 12.5 18H7.5C6.09554 18 5.39331 18 4.88886 17.6629C4.67048 17.517 4.48298 17.3295 4.33706 17.1111C4 16.6067 4 15.9045 4 14.5V5.5Z"></path><path d="M11 15H10 9M12 5H10 8"></path></svg>
                                    <span class="align-middle"><?=$arResult['arUser']['PERSONAL_PHONE']?></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Overview Tab End -->

            <!-- Projects Tab Start -->
            <div class="tab-pane fade" id="projectsTab" role="tabpanel">

                <h2 class="small-title">Расшифрока</h2>

                <div class="card mb-1">
                    <div class="card-body">
                        <h2 class="small-title">Тип энергии <?=$allResult[0]?>%: <?=$arrAnswer_E_I['name']?></h2>
                        <p class="mb-0"><?=$arrAnswer_E_I['description']?></p>
                    </div>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <h2 class="small-title">Тип мышления <?=$allResult[1]?>%: <?=$arrAnswer_N_S['name']?></h2>
                        <p class="mb-0"><?=$arrAnswer_N_S['description']?></p>
                    </div>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <h2 class="small-title"> Система ценностей <?=$allResult[2]?>%: <?=$arrAnswer_F_T['name']?></h2>
                        <p class="mb-0"><?=$arrAnswer_F_T['description']?></p>
                    </div>
                </div>

                <div class="card mb-1">
                    <div class="card-body">
                        <h2 class="small-title">Внутренняя организация <?=$allResult[3]?>%: <?=$arrAnswer_J_P['name']?></h2>
                        <p class="mb-0"><?=$arrAnswer_J_P['description']?></p>
                    </div>
                </div>

            </div>
            <!-- Projects Tab End -->


            <!-- Permissions Tab Start -->
            <div class="tab-pane fade" id="permissionsTab" role="tabpanel">
                <h2 class="small-title">Смена пароля</h2>
                <div class="card sw-lg-50">
                    <div class="card-body">
                        <?if($arResult['CAN_EDIT_PASSWORD']):?>

                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">Новый пароль</p>
                                <a href="#" class="d-block body-link">
                                        <span class="align-middle">
                                            <input type="password" class="form-control" name="NEW_PASSWORD" maxlength="50" value="" autocomplete="off" class="bx-auth-input" />
                                        </span>
                                </a>
                                <?if($arResult["SECURE_AUTH"]):?>
                                    <span class="bx-auth-secure" id="bx_auth_secure" title="<?echo GetMessage("AUTH_SECURE_NOTE")?>" style="display:none">
                                <div class="bx-auth-secure-icon"></div>
                                    </span>
                                    <noscript>
                                    <span class="bx-auth-secure" title="<?echo GetMessage("AUTH_NONSECURE_NOTE")?>">
                                        <div class="bx-auth-secure-icon bx-auth-secure-unlock"></div>
                                    </span>
                                    </noscript>
                                    <script type="text/javascript">
                                        document.getElementById('bx_auth_secure').style.display = 'inline-block';
                                    </script>
                                <?endif?>
                            </div>

                            <div class="mb-2">
                                <p class="text-small text-muted mb-2">Подтверждение нового пароля</p>
                                <a href="#" class="d-block body-link">
                                <span class="align-middle">
                                    <input type="password" class="form-control" name="NEW_PASSWORD_CONFIRM" maxlength="50" value="" autocomplete="off" />
                                </span>
                                </a>
                            </div>
                        <?endif?>
                        <?$arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"] = "Пароль должен быть не менее 8 символов длиной.";?>

                        <?// ********************* User properties ***************************************************?>
                        <?if($arResult["USER_PROPERTIES"]["SHOW"] == "Y"):?>
                            <div class="profile-link profile-user-div-link"><a title="<?=GetMessage("USER_SHOW_HIDE")?>" href="javascript:void(0)" onclick="SectionClick('user_properties')"><?=trim($arParams["USER_PROPERTY_NAME"]) <> '' ? $arParams["USER_PROPERTY_NAME"] : GetMessage("USER_TYPE_EDIT_TAB")?></a></div>
                            <div id="user_div_user_properties" class="profile-block-<?= mb_strpos($arResult["opened"], "user_properties") === false ? "hidden" : "shown"?>">
                                <table class="data-table profile-table">
                                    <thead>
                                    <tr>
                                        <td colspan="2">&nbsp;</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?$first = true;?>
                                    <?foreach ($arResult["USER_PROPERTIES"]["DATA"] as $FIELD_NAME => $arUserField):?>
                                        <tr><td class="field-name">
                                                <?if ($arUserField["MANDATORY"]=="Y"):?>
                                                    <span class="starrequired">*</span>
                                                <?endif;?>
                                                <?=$arUserField["EDIT_FORM_LABEL"]?>:</td><td class="field-value">
                                                <?$APPLICATION->IncludeComponent(
                                                    "bitrix:system.field.edit",
                                                    $arUserField["USER_TYPE"]["USER_TYPE_ID"],
                                                    array("bVarsFromForm" => $arResult["bVarsFromForm"], "arUserField" => $arUserField), null, array("HIDE_ICONS"=>"Y"));?></td></tr>
                                    <?endforeach;?>
                                    </tbody>
                                </table>
                            </div>
                        <?endif;?>
                        <?// ******************** /User properties ***************************************************?>
                        <div class="mb-2">
                            <div class="alert alert-warning" role="alert">
                                <?echo $arResult["GROUP_POLICY"]["PASSWORD_REQUIREMENTS"];?>
                            </div>
                            <p>
                                <input type="submit" name="save" class="btn btn-outline-primary" value="<?= (($arResult["ID"] > 0) ? GetMessage("MAIN_SAVE") : GetMessage("MAIN_ADD")) ?>">
                                &nbsp;&nbsp;
                                <input type="reset" class="btn btn-outline-danger" value="Стереть">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Permissions Tab End -->

            <!-- Friends Tab Start -->

            <!-- About Tab Start -->
            <div class="tab-pane fade" id="aboutTab" role="tabpanel">
                <h2 class="small-title">Сессии</h2>
                <div class="card">
                    <div class="card-body">
                        <? if(strlen($arResult["arUser"]["TIMESTAMP_X"]) > 0):?>
                            <div class="mb-5">
                                <p class="text-small text-muted mb-2">Дата обновления</p>
                                <a href="#" class="d-block body-link">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email me-2"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                    <span class="align-middle"><?=$arResult["arUser"]["TIMESTAMP_X"]?></span>
                                </a>
                            </div>
                        <? endif;?>
                        <div class="mb-2">
                            <p class="text-small text-muted mb-2">Последняя авторизация</p>
                            <a href="#" class="d-block body-link">
                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user me-2"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>                                    <span class="align-middle"><?=$PROPS['TEL']?></span>
                                <span class="align-middle"><?=$arResult["arUser"]["LAST_LOGIN"]?></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About Tab End -->
            <!-- Right Side End -->
        </div>
    </div>

</div>

</form>


<?endif?>

</div>
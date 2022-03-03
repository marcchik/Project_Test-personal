
</div>
</div>
<?if (!$USER->IsAuthorized()):?>
        <?$APPLICATION->IncludeComponent(
"bitrix:system.auth.form",
"auth",
Array(
"COMPONENT_TEMPLATE" => "auth",
"FORGOT_PASSWORD_URL" => "/user/",
"PROFILE_URL" => "/user/profile/",
"REGISTER_URL" => "/user/registration/",
"SHOW_ERRORS" => "Y"
)
);?>
    <?endif;?>
<div class="bitrix-footer">
			<span class="bitrix-footer-text">
			© 2021 <a style="color: gray; text-decoration: none" href="http://test-personal.com/">Test-personal.com</a> - All rights reserved.
            </span>
			</div>

<script type="text/javascript">if(!window.BX)window.BX={};if(!window.BX.message)window.BX.message=function(mess){if(typeof mess==='object'){for(let i in mess) {BX.message[i]=mess[i];} return true;}};</script>
<script type="text/javascript">(window.BX||top.BX).message({'JS_CORE_LOADING':'Загрузка...','JS_CORE_NO_DATA':'- Нет данных -','JS_CORE_WINDOW_CLOSE':'Закрыть','JS_CORE_WINDOW_EXPAND':'Развернуть','JS_CORE_WINDOW_NARROW':'Свернуть в окно','JS_CORE_WINDOW_SAVE':'Сохранить','JS_CORE_WINDOW_CANCEL':'Отменить','JS_CORE_WINDOW_CONTINUE':'Продолжить','JS_CORE_H':'ч','JS_CORE_M':'м','JS_CORE_S':'с','JSADM_AI_HIDE_EXTRA':'Скрыть лишние','JSADM_AI_ALL_NOTIF':'Показать все','JSADM_AUTH_REQ':'Требуется авторизация!','JS_CORE_WINDOW_AUTH':'Войти','JS_CORE_IMAGE_FULL':'Полный размер'});</script><script type="text/javascript" src="/bitrix/js/main/core/core.min.js?1620727877260438"></script><script>BX.setJSList(['/bitrix/js/main/core/core_ajax.js','/bitrix/js/main/core/core_promise.js','/bitrix/js/main/polyfill/promise/js/promise.js','/bitrix/js/main/loadext/loadext.js','/bitrix/js/main/loadext/extension.js','/bitrix/js/main/polyfill/promise/js/promise.js','/bitrix/js/main/polyfill/find/js/find.js','/bitrix/js/main/polyfill/includes/js/includes.js','/bitrix/js/main/polyfill/matches/js/matches.js','/bitrix/js/ui/polyfill/closest/js/closest.js','/bitrix/js/main/polyfill/fill/main.polyfill.fill.js','/bitrix/js/main/polyfill/find/js/find.js','/bitrix/js/main/polyfill/matches/js/matches.js','/bitrix/js/main/polyfill/core/dist/polyfill.bundle.js','/bitrix/js/main/core/core.js','/bitrix/js/main/polyfill/intersectionobserver/js/intersectionobserver.js','/bitrix/js/main/lazyload/dist/lazyload.bundle.js','/bitrix/js/main/polyfill/core/dist/polyfill.bundle.js','/bitrix/js/main/parambag/dist/parambag.bundle.js']);
BX.setCSSList(['/bitrix/js/main/lazyload/dist/lazyload.bundle.css','/bitrix/js/main/parambag/dist/parambag.bundle.css']);</script>
<script type="text/javascript">(window.BX||top.BX).message({'pull_server_enabled':'Y','pull_config_timestamp':'1604570099','pull_guest_mode':'N','pull_guest_user_id':'0'});(window.BX||top.BX).message({'PULL_OLD_REVISION':'Для продолжения корректной работы с сайтом необходимо перезагрузить страницу.'});</script>
<script type="text/javascript">(window.BX||top.BX).message({'CORE_CLIPBOARD_COPY_SUCCESS':'Скопировано','CORE_CLIPBOARD_COPY_FAILURE':'Не удалось скопировать'});</script>
<script type="text/javascript">(window.BX||top.BX).message({'MAIN_SIDEPANEL_CLOSE':'Закрыть','MAIN_SIDEPANEL_PRINT':'Печать','MAIN_SIDEPANEL_NEW_WINDOW':'Открыть в новом окне','MAIN_SIDEPANEL_COPY_LINK':'Скопировать ссылку'});</script>
<script type="text/javascript">(window.BX||top.BX).message({'LANGUAGE_ID':'ru','FORMAT_DATE':'DD.MM.YYYY','FORMAT_DATETIME':'DD.MM.YYYY HH:MI:SS','COOKIE_PREFIX':'BITRIX_SM','SERVER_TZ_OFFSET':'10800','UTF_MODE':'Y','SITE_ID':'s1','SITE_DIR':'/','USER_ID':'','SERVER_TIME':'1623862326','USER_TZ_OFFSET':'0','USER_TZ_AUTO':'Y','bitrix_sessid':'33d17fd1969f92eca0bc3afeb0cd1de6'});</script><script type="text/javascript" src="/bitrix/js/main/polyfill/customevent/main.polyfill.customevent.min.js?1544619813556"></script>
<script type="text/javascript" src="/bitrix/js/ui/dexie/dist/dexie.bitrix.bundle.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/core/core_ls.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/core/core_fx.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/core/core_frame_cache.min.js"></script>
<script type="text/javascript" src="/bitrix/js/pull/protobuf/protobuf.min.js"></script>
<script type="text/javascript" src="/bitrix/js/pull/protobuf/model.min.js"></script>
<script type="text/javascript" src="/bitrix/js/rest/client/rest.client.min.js"></script>
<script type="text/javascript" src="/bitrix/js/pull/client/pull.client.min.js"></script>
<script type="text/javascript" src="/bitrix/js/landing/metrika/dist/metrika.bundle.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/pageobject/pageobject.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/popup/dist/main.popup.bundle.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/core/core_clipboard.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/sidepanel/manager.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/sidepanel/slider.min.js"></script>
<script type="text/javascript" src="/bitrix/js/main/polyfill/intersectionobserver/js/intersectionobserver.min.js"></script>
<script type="text/javascript">var bxDate = new Date(); document.cookie="BITRIX_SM_TIME_ZONE="+bxDate.getTimezoneOffset()+"; path=/; expires=Wed, 01 Jun 2022 00:00:00 +0300"</script>
<script>
	(function(w,d,u){
		var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
		var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
	})(window,document,'https://cdn-ru.bitrix24.ru/b1445091/landing/assets/assets_webpack_8bca9e4aa3_1623844520.js');
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script type="text/javascript" src="/bitrix/templates/landing24/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/landing24/assets/vendor/jquery.easing/js/jquery.easing.min.js"></script>
<script type="text/javascript" src="/bitrix/templates/landing24/assets/js/helpers/lazyload.min.js"></script>
<script type="text/javascript" src="/bitrix/components/bitrix/landing.pub/templates/.default/script.min.js"></script>
<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
<script type="text/javascript">var _ba = _ba || []; _ba.push(["aid", "bc2cad9153cb418bb2dfd5602c3c3754"]); _ba.push(["host", "genie.bitrix24.ru"]); (function() {var ba = document.createElement("script"); ba.type = "text/javascript"; ba.async = true;ba.src = (document.location.protocol == "https:" ? "https://" : "http://") + "bitrix.info/ba.js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ba, s);})();</script>

<!--мой скрипт-->
<script type="text/javascript" src="/bitrix/js/main/myScript.js"></script>


<script>
	(function()
	{
		new BX.Landing.Metrika();
	})();
</script>

<script>
	(function(w,d,u){
		var s=d.createElement('script');s.async=true;s.src=u+'?'+(Date.now()/60000|0);
		var h=d.getElementsByTagName('script')[0];h.parentNode.insertBefore(s,h);
	})(window,document,'https://cdn-ru.bitrix24.ru/b1445091/crm/tag/call.tracker.js');
</script>
</body>
</html>
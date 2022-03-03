<?
IncludeTemplateLangFile(__FILE__);
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>

<!DOCTYPE html>
    <html lang="en" data-footer="true" data-override='{"attributes":{"layout": "boxed"}}'>
    <head>
        <?$APPLICATION->ShowHead(); ?>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <title><? $APPLICATION->ShowTitle(); ?></title>
        <meta name="description" content="Standard Profile Page" />
        <!-- Favicon Tags Start -->
        <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-57x57.png" />
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-114x114.png" />
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-72x72.png" />
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-144x144.png" />
        <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-60x60.png" />
        <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-120x120.png" />
        <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-76x76.png" />
        <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/bitrix/templates/landing_lk/img/favicon/apple-touch-icon-152x152.png" />
        <link rel="icon" type="image/png" href="/bitrix/templates/landing_lk/LOGO.png" sizes="196x196" />
        <link rel="icon" type="image/png" href="/bitrix/templates/landing_lk/LOGO.png" sizes="96x96" />
        <link rel="icon" type="image/png" href="/bitrix/templates/landing_lk/LOGO.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="/bitrix/templates/landing_lk/LOGO.png" sizes="16x16" />
        <link rel="icon" type="image/png" href="/bitrix/templates/landing_lk/LOGO.png" sizes="128x128" />
        <meta name="application-name" content="&nbsp;" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />
        <meta name="msapplication-TileImage" content="/bitrix/templates/landing_lk/img/favicon/mstile-144x144.png" />
        <meta name="msapplication-square70x70logo" content="/bitrix/templates/landing_lk/img/favicon/mstile-70x70.png" />
        <meta name="msapplication-square150x150logo" content="/bitrix/templates/landing_lk/img/favicon/mstile-150x150.png" />
        <meta name="msapplication-wide310x150logo" content="/bitrix/templates/landing_lk/img/favicon/mstile-310x150.png" />
        <meta name="msapplication-square310x310logo" content="/bitrix/templates/landing_lk/img/favicon/mstile-310x310.png" />
        <!-- Favicon Tags End -->
        <!-- Font Tags Start -->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@300;400;600&display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="/bitrix/templates/landing_lk/font/CS-Interface/style.css" />
        <!-- Font Tags End -->
        <!-- Vendor Styles Start -->
        <link rel="stylesheet" href="/bitrix/templates/landing_lk/css/vendor/bootstrap.min.css" />
        <link rel="stylesheet" href="/bitrix/templates/landing_lk/css/vendor/OverlayScrollbars.min.css" />

        <!-- Vendor Styles End -->
        <!-- Template Base Styles Start -->
        <link rel="stylesheet" href="/bitrix/templates/landing_lk/css/styles.css" />
        <!-- Template Base Styles End -->

        <link rel="stylesheet" href="/bitrix/templates/landing_lk/css/main.css" />
        <script src="/bitrix/templates/landing_lk/js/base/loader.js"></script>

        <link rel="shortcut icon" href="/bitrix/templates/landing_lk/LOGO.png" type="image/x-icon">

        <!-- Yandex.Metrika counter -->
        <script type="text/javascript" >
            (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
                m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
            (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

            ym(85924148, "init", {
                clickmap:true,
                trackLinks:true,
                accurateTrackBounce:true,
                webvisor:true
            });
        </script>
        <noscript><div><img src="https://mc.yandex.ru/watch/85924148" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
        <!-- /Yandex.Metrika counter -->

    </head>
    <?
    //данные пользователя
    $rsUser = CUser::GetByID($USER->GetID());
    $arUser = $rsUser->Fetch();

    CModule::IncludeModule('iblock');
    //получаем баланс
    $BALANCE;
    $arSelect = Array("PREVIEW_TEXT", "CREATED_BY");
    $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "CREATED_BY"=>$USER->GetID());
    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $BALANCE = $arFields['PREVIEW_TEXT'];
    }
    ?>

    <body>
    <? $APPLICATION->ShowPanel(); ?>
    <div id="root">
        <div id="nav" class="nav-container d-flex">
            <div class="nav-content d-flex">
                <!-- Logo Start -->
                <div class="logo position-relative">
                    <a href="https://testpersonal.ru">
                        <!-- Logo can be added directly -->
                        <!-- <img src="img/logo/logo-white.svg" alt="logo" /> -->

                        <!-- Or added via css to provide different ones for different color themes -->

                        <img style="padding: 10px;" src="/bitrix/templates/landing_lk/LOGO.png">
                    </a>
                </div>
                <!-- Logo End -->


                <? if($USER->IsAuthorized()):?>
                    <!-- User Menu Start -->
                    <div class="user-container d-flex">
                        <a href="#" class="d-flex user position-relative" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="profile" alt="profile" src="/bitrix/templates/landing_lk/logoProfileGray.png" />
                            <div class="name"><?=$USER->GetFullName()?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end user-menu wide">
                            <div class="row mb-1 ms-0 me-0">
                                <div class="col-12 ps-1 pe-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="/user/profile/">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user me-2"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                                                <span class="align-middle">Профиль</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="row mb-1 ms-0 me-0">
                                <div class="col-12 p-1 mb-3 pt-3">
                                    <div class="separator-light"></div>
                                </div>
                            </div>
                            <div class="row mb-1 ms-0 me-0">
                                <div class="col-6 pe-1 ps-1">
                                    <ul class="list-unstyled">
                                        <li>
                                            <a href="<?=$APPLICATION->GetCurPageParam("logout=yes&".bitrix_sessid_get(), array(
                                                "login",
                                                "logout",
                                                "register",
                                                "forgot_password",
                                                "change_password"));?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-logout me-2"><path d="M7 15 2.35355 10.3536C2.15829 10.1583 2.15829 9.84171 2.35355 9.64645L7 5M3 10H13M12 18 14.5 18C15.9045 18 16.6067 18 17.1111 17.6629 17.3295 17.517 17.517 17.3295 17.6629 17.1111 18 16.6067 18 15.9045 18 14.5L18 5.5C18 4.09554 18 3.39331 17.6629 2.88886 17.517 2.67048 17.3295 2.48298 17.1111 2.33706 16.6067 2 15.9045 2 14.5 2L12 2"></path></svg>
                                                <span class="align-middle">Выйти</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- User Menu End -->
                <?endif;?>

                <!-- Icons Menu Start -->
                <ul class="list-unstyled list-inline text-center menu-icons">
                    <? if($USER->IsAuthorized()):?>
                        <li class="list-inline-item">
                            <? if(strlen($BALANCE) == 0):?>
                                <a href="#">
                                    <input style="font-size: 15px;" id="balance" type="button" value="Баланс: 0 руб." class="btn btn-lg btn-ico">
                                </a>
                            <? else:?>
                                <a href="#">
                                    <input style="font-size: 15px;" id="balance" type="button" value="Баланс: <?=$BALANCE?> руб." class="btn btn-lg btn-icon">
                                </a>
                            <?endif?>
                        </li>
                    <?endif;?>
                    <li class="list-inline-item">
                        <a href="#" id="colorButton">
                            <i data-cs-icon="light-on" class="light" data-cs-size="18"></i>
                            <i data-cs-icon="light-off" class="dark" data-cs-size="18"></i>
                        </a>
                    </li>
                </ul>
                <!-- Icons Menu End -->

                <!-- Menu Start -->
                <div class="menu-container flex-grow-1">
                    <ul id="menu" class="menu">
                        <? if($USER->IsAuthorized()):?>
                        <li>
                            <a href="/user/home/" data-href="Dashboards.html">
                                <i data-cs-icon="home" class="icon" data-cs-size="18"></i>
                                <span class="label">Главная</span>
                            </a>
                        </li>
                        <li>
                            <a href="/user/staff/" data-href="Apps.html">
                                <i data-cs-icon="screen" class="icon" data-cs-size="18"></i>
                                <span class="label">Кандидаты</span>
                            </a>
                        </li>
                            <li>
                                <a href="/user/finance/?edit=Y">
                                    <i data-cs-icon="money" class="icon" data-cs-size="18"></i>
                                    Пополнить баланс
                                </a>
                            </li>
                            <? if ($USER->IsAdmin()): ?>
                            <li>
                                <a href="/user/admin/">
                                    <i data-cs-icon="money" class="icon" data-cs-size="18"></i>
                                   Администрирование
                                </a>
                            </li>
                            <? endif; ?>
                        <? else: ?>
                            <li style="margin: auto">
                                <a href="#" >
                                    <span class="display-3">Сервис Тестирования Персонала</span>
                                </a>
                            </li>
                        <?endif;?>
                    </ul>
                </div>
                <!-- Menu End -->

                <? if($USER->IsAuthorized()):?>
                    <!-- Mobile Buttons Start -->
                    <div class="mobile-buttons-container">
                        <!-- Scrollspy Mobile Button Start -->
                        <a href="#" id="scrollSpyButton" class="spy-button" data-bs-toggle="dropdown">
                            <i data-cs-icon="menu-dropdown"></i>
                        </a>
                        <!-- Scrollspy Mobile Button End -->

                        <!-- Scrollspy Mobile Dropdown Start -->
                        <div class="dropdown-menu dropdown-menu-end" id="scrollSpyDropdown"></div>
                        <!-- Scrollspy Mobile Dropdown End -->

                        <!-- Menu Button Start -->
                        <a href="#" id="mobileMenuButton" class="menu-button">
                            <i data-cs-icon="menu"></i>
                        </a>
                        <!-- Menu Button End -->
                    </div>
                    <!-- Mobile Buttons End -->
                <? endif; ?>
            </div>
            <div class="nav-shadow"></div>
        </div>





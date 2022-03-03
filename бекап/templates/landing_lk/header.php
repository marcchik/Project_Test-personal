<?
IncludeTemplateLangFile(__FILE__);
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
?>
<!DOCTYPE html>
<html xml:lang="ru" lang="ru" class="">
<head>
    <? $APPLICATION->ShowHead(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">
    <meta name="HandheldFriendly" content="true">
    <meta name="MobileOptimized" content="width">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--	<title>Test-personal.com Система тестирования персонала</title>-->
    <title><? $APPLICATION->ShowTitle(); ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="description" content="Тестирование сотрудников"/>
    <style type="text/css">
        :root {
            --theme-color-primary: #666666;
            --theme-color-primary-darken-1: hsl(0, 0%, 38%);
            --theme-color-primary-darken-2: hsl(0, 0%, 35%);
            --theme-color-primary-darken-3: hsl(0, 0%, 30%);
            --theme-color-primary-lighten-1: hsl(0, 0%, 50%);
            --theme-color-primary-opacity-0_1: rgba(102, 102, 102, 0.1);
            --theme-color-primary-opacity-0_2: rgba(102, 102, 102, 0.2);
            --theme-color-primary-opacity-0_3: rgba(102, 102, 102, 0.3);
            --theme-color-primary-opacity-0_4: rgba(102, 102, 102, 0.4);
            --theme-color-primary-opacity-0_6: rgba(102, 102, 102, 0.6);
            --theme-color-primary-opacity-0_8: rgba(102, 102, 102, 0.8);
            --theme-color-primary-opacity-0_9: rgba(102, 102, 102, 0.9);
            --theme-color-main: hsl(0, 20%, 20%);
            --theme-color-secondary: hsl(0, 20%, 80%);
            --theme-color-title: hsl(0, 20%, 20%);
            --theme-color-strict-inverse: #ffffff;
        }
    </style>
    <script type="text/javascript" data-skip-moving="true">(function (w, d, n) {

            var cl = "bx-core";
            var ht = d.documentElement;
            var htc = ht ? ht.className : undefined;
            if (htc === undefined || htc.indexOf(cl) !== -1) {
                return;
            }

            var ua = n.userAgent;
            if (/(iPad;)|(iPhone;)/i.test(ua)) {
                cl += " bx-ios";
            } else if (/Android/i.test(ua)) {
                cl += " bx-android";
            }

            cl += (/(ipad|iphone|android|mobile|touch)/i.test(ua) ? " bx-touch" : " bx-no-touch");

            cl += w.devicePixelRatio && w.devicePixelRatio >= 2
                ? " bx-retina"
                : " bx-no-retina";

            var ieVersion = -1;
            if (/AppleWebKit/.test(ua)) {
                cl += " bx-chrome";
            } else if ((ieVersion = getIeVersion()) > 0) {
                cl += " bx-ie bx-ie" + ieVersion;
                if (ieVersion > 7 && ieVersion < 10 && !isDoctype()) {
                    cl += " bx-quirks";
                }
            } else if (/Opera/.test(ua)) {
                cl += " bx-opera";
            } else if (/Gecko/.test(ua)) {
                cl += " bx-firefox";
            }

            if (/Macintosh/i.test(ua)) {
                cl += " bx-mac";
            }

            ht.className = htc ? htc + " " + cl : cl;

            function isDoctype() {
                if (d.compatMode) {
                    return d.compatMode == "CSS1Compat";
                }

                return d.documentElement && d.documentElement.clientHeight;
            }

            function getIeVersion() {
                if (/Opera/i.test(ua) || /Webkit/i.test(ua) || /Firefox/i.test(ua) || /Chrome/i.test(ua)) {
                    return -1;
                }

                var rv = -1;
                if (!!(w.MSStream) && !(w.ActiveXObject) && ("ActiveXObject" in w)) {
                    rv = 11;
                } else if (!!d.documentMode && d.documentMode >= 10) {
                    rv = 10;
                } else if (!!d.documentMode && d.documentMode >= 9) {
                    rv = 9;
                } else if (d.attachEvent && !/Opera/.test(ua)) {
                    rv = 8;
                }

                if (rv == -1 || rv == 8) {
                    var re;
                    if (n.appName == "Microsoft Internet Explorer") {
                        re = new RegExp("MSIE ([0-9]+[\.0-9]*)");
                        if (re.exec(ua) != null) {
                            rv = parseFloat(RegExp.$1);
                        }
                    } else if (n.appName == "Netscape") {
                        rv = 11;
                        re = new RegExp("Trident/.*rv:([0-9]+[\.0-9]*)");
                        if (re.exec(ua) != null) {
                            rv = parseFloat(RegExp.$1);
                        }
                    }
                }

                return rv;
            }

        })(window, document, navigator);</script>

    <link href="/bitrix/js/intranet/intranet-common.min.css?156700641462422" type="text/css" rel="stylesheet"/>
    <link href="/bitrix/js/ui/fonts/opensans/ui.font.opensans.min.css?16202983792409" type="text/css" rel="stylesheet"/>
    <link href="/bitrix/js/main/popup/dist/main.popup.bundle.min.css?162047417023420" type="text/css" rel="stylesheet"/>
    <link href="/bitrix/js/main/sidepanel/css/sidepanel.min.css?16222196167973" type="text/css" rel="stylesheet"/>
    <link href="/bitrix/js/landing/css/landing_public.min.css?1567508327250" type="text/css" rel="stylesheet"/>
    <link href="/bitrix/components/bitrix/landing.pub/templates/.default/style.min.css?162333711137024" type="text/css"
          rel="stylesheet"/>
    <link href="/bitrix/templates/landing24/assets/vendor/bootstrap/bootstrap.min.css?1620988921156519" type="text/css"
          data-template-style="true" rel="stylesheet"/>
    <link href="/bitrix/templates/landing24/theme.min.css?1623337111604525" type="text/css" data-template-style="true"
          rel="stylesheet"/>
    <link href="/bitrix/templates/landing24/assets/css/custom-grid.min.css?156933840138" type="text/css"
          data-template-style="true" rel="stylesheet"/>
    <link href="/bitrix/templates/landing24/template_styles.min.css?16209889212316" type="text/css"
          data-template-style="true" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" type="text/css">



    <meta name="robots" content="all"/>
    <link rel="preload" href="/bitrix/templates/landing24/assets/vendor/icon/fa/font.woff" as="font"
          crossorigin="anonymous" type="font/woff" crossorigin>
    <link rel="preload" href="/bitrix/templates/landing24/assets/vendor/icon/fa/font.woff2" as="font"
          crossorigin="anonymous" type="font/woff2" crossorigin>
    <style>
        .fa-clock-o:before {
            content: "\f017";
        }

        .fa-group:before {
            content: "\f0c0";
        }

        .fa-dashboard:before {
            content: "\f0e4";
        }

        .block-wrapper {
            height: 100px !important;
        }
        .container {
            height: 100px !important;
        }

        .row {
            height: 100px !important;
        }

    </style>
    <link rel="preload" href="/bitrix/templates/landing24/assets/vendor/icon/icon/font.woff" as="font"
          crossorigin="anonymous" type="font/woff" crossorigin>
    <link rel="preload" href="/bitrix/templates/landing24/assets/vendor/icon/icon/font.woff2" as="font"
          crossorigin="anonymous" type="font/woff2" crossorigin>
    <style>.icon-envelope:before {
            content: "\e086";
        }</style>
    <link
            rel="preload"
            as="style"
            onload="this.removeAttribute('onload');this.rel='stylesheet'"
            data-font="g-font-open-sans"
            data-protected="true"
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,900&subset=cyrillic">
    <noscript>
        <link
                rel="stylesheet"
                data-font="g-font-open-sans"
                data-protected="true"
                href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,900&subset=cyrillic">
    </noscript>
    <style>
        /*класс для заголовков страниц в личном кабинете*/
        .h3-lk{
            margin: 20px;
        }
        body {
            font-weight: 400;
            font-family: "Open Sans", Helvetica, Arial, sans-serif;

            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -moz-font-feature-settings: "liga", "kern";
            text-rendering: optimizelegibility;
        }
    </style>
    <style>
        h1, h2, h3, h4, h5, h6 {
            font-family: "Open Sans", Helvetica, Arial, sans-serif;
        }
    </style>
    <style>
        html {
            font-size: 14px;
        }

        body {
            font-size: 1.14286rem;
        }

        .g-font-size-default {
            font-size: 1.14286rem;
        }
    </style>
    <style>
        body {
            line-height: 1.6;
            font-weight: ;
        }

        .h1, .h2, .h3, .h4, .h5, .h6, .h7,
        h1, h2, h3, h4, h5, h6 {
            font-weight: ;
        }
    </style>
    <meta property="og:title" content="Test-personal.com Система тестирования персонала"/>
    <meta property="og:description" content="Выбирайте сотрудников с умом! Тестирование персонала"/>
    <meta property="og:image" content="/bitrix/images/demo/page/empty/preview.jpg"/>
    <meta property="og:type" content="website"/>
    <meta property="twitter:title" content="Test-personal.com Система тестирования персонала"/>
    <meta property="twitter:description" content="Выбирайте сотрудников с умом! Тестирование персонала"/>
    <meta property="twitter:image" content="https://cdn.bitrix24.site/bitrix/images/demo/page/empty/preview.jpg"/>
    <meta name="twitter:card" content="summary_large_image"/>
    <meta property="twitter:type" content="website"/>
    <meta property="Bitrix24SiteType" content="page"/>
    <meta property="og:url" content="https://testjobs.bitrix24.site/"/>
    <link rel="canonical" href="https://testjobs.bitrix24.site/"/>
    <link
            rel="preload"
            as="style"
            onload="this.removeAttribute('onload');this.rel='stylesheet'"
            data-font="g-font-open-sans"
            data-protected="true"
            href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,900&subset=cyrillic">
    <noscript>
        <link
                rel="stylesheet"
                data-font="g-font-open-sans"
                data-protected="true"
                href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,900&subset=cyrillic">
    </noscript>
    <link rel="icon" type="image/png"
          href="https://bitrix2.cdnvideo.ru/b1445091/resize_cache/1033154/047e4a127947eff3c7d861cc2f113186/landing/553/553d2d8743bbd2c5ec34ea66014f2d44/favicon.png?h=genie.bitrix24.ru"
          sizes="16x16">
    <link rel="icon" type="image/png"
          href="https://bitrix2.cdnvideo.ru/b1445091/resize_cache/1033154/45fd33a620da2e44653e6a92c96d9446/landing/553/553d2d8743bbd2c5ec34ea66014f2d44/favicon.png?h=genie.bitrix24.ru"
          sizes="32x32">
    <link rel="icon" type="image/png"
          href="https://bitrix2.cdnvideo.ru/b1445091/resize_cache/1033154/c8042d925d6656dd077f15192d13bb8f/landing/553/553d2d8743bbd2c5ec34ea66014f2d44/favicon.png?h=genie.bitrix24.ru"
          sizes="96x96">
    <link rel="apple-touch-icon"
          href="https://bitrix2.cdnvideo.ru/b1445091/resize_cache/1033154/eb45a9f96698d396483d7a1236fe0380/landing/553/553d2d8743bbd2c5ec34ea66014f2d44/favicon.png?h=genie.bitrix24.ru"
          sizes="120x120">
    <link rel="apple-touch-icon"
          href="https://bitrix2.cdnvideo.ru/b1445091/resize_cache/1033154/a03d95df41ccb7c2ab8a9e9ebcd4cf8a/landing/553/553d2d8743bbd2c5ec34ea66014f2d44/favicon.png?h=genie.bitrix24.ru"
          sizes="180x180">
    <link rel="apple-touch-icon"
          href="https://bitrix2.cdnvideo.ru/b1445091/resize_cache/1033154/8245e211b4cc1aeef31861f9c55143e5/landing/553/553d2d8743bbd2c5ec34ea66014f2d44/favicon.png?h=genie.bitrix24.ru"
          sizes="152x152">
    <link rel="apple-touch-icon"
          href="https://bitrix2.cdnvideo.ru/b1445091/resize_cache/1033154/26c9f99963f016735739c7de412de1e1/landing/553/553d2d8743bbd2c5ec34ea66014f2d44/favicon.png?h=genie.bitrix24.ru"
          sizes="167x167">
</head>
<body class="">
<? $APPLICATION->ShowPanel(); ?>
<main class="w-100 landing-public-mode">
    <div id="b7226" class="block-wrapper block-html">
        <section class="landing-block g-pt-0 g-pb-0 g-pl-0 g-pr-0">
            <style>
                .text_header_slogan {
                    margin-left: 10%;
                    margin-top: 0px;
                    position: absolute;
                }
                .text_header_login{
                    /*position: absolute;*/
                    float: right;
                    margin-top: auto;
                    margin-bottom: auto;
                }

                #b7224 {
                    height: 100px;
                    /*padding-top: 0px;*/
                }

                #b7224 img {
                    width: auto;
                    height: 90%;
                    /*max-width: 150px;*/
                    position: absolute;
                    margin-top: -14px;
                }

                #b7224 .landing-block-node-containerimg img {
                    width: 70% !important;
                    max-width: 70% !important;
                }

                #b7224 .container {
                    /*background-image: url('https://cdn-ru.bitrix24.ru/b1445091/landing/922/9224d8f6c45472b729419af0b0405ccd/no-problem-concept-300_1x.jpg');*/
                    background-repeat: no-repeat;
                    background-position: bottom right;
                    background-size: contain;
                    /*padding-top: 4rem;*/
                    /*padding-bottom: 2rem;*/
                    /*min-height: 300px;*/
                }

                @media (max-width: 767px) {
                    #b7224 .container {
                        background-image: none !important;
                    }
                }

                @media (max-width: 767px) {
                    #b7224 .col-md-6:nth-child(1),
                    #b7224 .col-md-6:nth-child(2) {
                        text-align: center !important;
                    }
                }

                @media (min-width: 768px) {
                    #b7224 .col-md-6:nth-child(1) {
                        max-width: 22.22% !important;
                        width: 22.22% !important;
                        text-align: center !important;
                    }

                    #b7224 .col-md-6:nth-child(2) {
                        max-width: 77.77% !important;
                        width: 77.77% !important;
                    }
                }

                #b7224 img { /*background-color:  var(--theme-color-primary) !important;*/
                }

                @media (min-width: 992px) {
                    .navbar-nav .nav-item {
                        padding-left: 1.42rem !important;
                        border-left: 1px solid #B4D3D3;
                    }

                    .navbar-nav .nav-item:first-child {
                        padding-left: 0px !important;
                        border-left: 0px !important;
                    }
                }

                .navbar-nav .nav-item a:hover {
                    text-decoration: underline !important;
                }

                #b7550 { /*margin-bottom: 2rem;*/
                }

                #b7114 .landing-block-node-card {
                    background-color: #eee !important;
                    padding-top: 1rem !important;
                    padding-bottom: 1rem !important;
                    text-align: center !important;
                }

                #b7114 .landing-block-node-card .landing-block-node-card-text {
                    display: none !important;
                }

                #b7114 .landing-block-node-card-icon-container {
                    margin-left: auto;
                    margin-right: auto;
                }

                #b7114 .landing-block-node-card:nth-child(2) { /*background-color: var(--theme-color-primary)!important;*/
                    background-color: #EB7D00 !important;
                    color: #fff !important;
                }

                #b7114 .landing-block-node-card:nth-child(2) .fa,
                #b7114 .landing-block-node-card:nth-child(2) .landing-block-node-card-number,
                #b7114 .landing-block-node-card:nth-child(2) .landing-block-node-card-number-title {
                    color: #fff !important;
                }



                .video-container iframe {
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                }</style>
        </section>
    </div>
    <div id="b7588" class="block-wrapper block-31-4-two-cols-img-text-fix">
        <section class="landing-block l-d-xs-none l-d-md-none l-d-lg-none">
            <div class="landing-block-node-container container g-pt-50 g-pb-50">
                <div class="row landing-block-node-block">
                    <div class="col-md-6 col-lg-6 order-2 order-md-1">
                        <a href="/">
                            <img class="landing-block-node-img js-animation slideInLeft img-fluid"
                                 src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iMzE2Ij48cmVjdCBpZD0iYmFja2dyb3VuZHJlY3QiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHg9IjAiIHk9IjAiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iLjciIHN0cm9rZT0ibm9uZSIvPjwvc3ZnPg=="
                                 alt="Вернуться на главную" data-fileid="1035510" data-fileid2x="1035508"
                                 data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:false}"
                                 data-lazy-img="Y"
                                 data-src="https://cdn-ru.bitrix24.ru/b1445091/landing/c16/c16672c84f0ce173ca44bb3ccdfd41e4/no-problem-concept-300_1x.jpg"
                                 loading="lazy"
                                 data-srcset="https://cdn-ru.bitrix24.ru/b1445091/landing/34d/34d776e82fd492983a394c17d1520886/no-problem-concept-300_2x.jpg 2x"/>
                        </a>
                    </div>

                    <div class="landing-block-node-text-container js-animation slideInRight col-md-6 col-lg-6 g-pb-20 g-pb-0--md order-1 order-md-2">
                        <h2 class="landing-block-node-title landing-semantic-subtitle-medium text-uppercase g-font-weight-700 mb-0 g-mb-20">
                            Quality results with us
                        </h2>
                        <div class="landing-block-node-text landing-semantic-text-medium"><p>
                                Aliquam mattis neque justo, non maximus dui ornare nec. Praesent </p></div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <div id="b7224" class="block-wrapper block-31-4-two-cols-img-text-fix">
        <section class="landing-block g-pb-10 g-pt-20">
            <div class="container">
                <div class="">
                    <div class="">
                        <a href="/">
                            <img src="/bitrix/templates/landing_lk/LOGO.jpg">
<!--                            <img class="landing-block-node-img js-animation img-fluid animation-none animated"-->
<!--                                 src="/bitrix/templates/landing_lk/LOGO.jpg"-->
<!--                                 alt="Вернуться на главную" data-fileid="1032646" data-fileid2x="1032648"-->
<!--                                 data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;/&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:true}"-->
<!--                                 data-lazy-img="Y"-->
<!--                                 title="Вернуться на главную"-->
<!--                                 data-src="https://cdn-ru.bitrix24.ru/b1445091/landing/c9b/c9b57e1d83e2fbb4cc53f2a2673bd156/log-mozg-1-2_1x.jpg"-->
<!--                                 loading="lazy"-->
<!--                                 data-srcset="https://cdn-ru.bitrix24.ru/b1445091/landing/134/134194352e4ac785e6899b259b7e6592/log-mozg-1-2_2x.jpg 2x"/>-->
                        </a>
                    </div>

                    <div class="text_header_slogan">
                        <h2 class="landing-block-node-title landing-semantic-subtitle-medium mb-0 g-mb-15 g-color-primary g-font-weight-300 g-text-transform-none g-font-size-20">
                            <a href="/" target="_self">Test-personal.com</a>
                            <span style="font-weight: normal;color: rgb(191, 54, 12);">
                                Система тестирования персонала
                            </span>
                        </h2>
                        <div class="landing-block-node-text landing-semantic-text-medium g-color-primary g-font-open-sans g-font-weight-300 g-font-size-30 text-uppercase">
                            <p>
                                <span style="color: rgb(97, 97, 97);">
                                    Выбирайте сотрудника с умом
                                </span>
                            </p>
                        </div>
                    </div>
                    <?if ($USER->IsAuthorized()):?>
                    <div class="text_header_login ">
                            <p>
                                <a class="navbar-brand" href="/user/profile/" title="Перейти в профиль">
                                     <span style="color: rgb(97, 97, 97);"><?=$USER->GetFullName();?></span>
                                </a>
                                    <?
                                        CModule::IncludeModule('iblock');
                                        $arSelect = array("ID", "NAME", "PREVIEW_TEXT");
                                        $arFilter = array("IBLOCK_ID" => 5);
                                        $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
                                        while ($ob = $res->GetNextElement()) {
                                            $arFields = $ob->GetFields();
                                            //pr($arFields['PREVIEW_TEXT']);
                                        }
                                    ?>
                                <br>
                                <span  style="color: rgb(97, 97, 97);">Баланс: <?=$arFields['PREVIEW_TEXT']?> руб</span>
                            </p>
                    </div>
                    <?endif;?>
                </div>
            </div>
        </section>
    </div>
    <div id="b7550" class="block-wrapper block-0-menu-21-wo-logo">
        <hr>
    </div>

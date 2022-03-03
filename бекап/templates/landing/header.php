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
    <!--    тест-->
    <style type="text/css">.custom-text-shadow-1 {
            text-shadow: 2px 4px 3px rgba(0, 0, 0, .3)
        }

        .custom-text-shadow-2 {
            text-shadow: 2px 2px 3px rgba(255, 255, 255, .1)
        }

        .custom-text-shadow-3 {
            text-shadow: 6px 6px 0 rgba(0, 0, 0, .2)
        }

        .custom-text-shadow-4 {
            text-shadow: 4px 3px 0 #fff, 9px 8px 0 rgba(0, 0, 0, .15)
        }

        .custom-text-shadow-5 {
            text-shadow: 0 3px 0 #b2a98f, 0 14px 10px rgba(0, 0, 0, .15), 0 24px 2px rgba(0, 0, 0, .1), 0 34px 30px rgba(0, 0, 0, .1)
        }

        .custom-text-shadow-6 {
            text-shadow: 0 4px 3px rgba(0, 0, 0, .4), 0 8px 13px rgba(0, 0, 0, .1), 0 18px 23px rgba(0, 0, 0, .1)
        }

        .custom-text-shadow-7 {
            text-shadow: 0 1px 0 #ccc, 0 2px 0 #c9c9c9, 0 3px 0 #bbb, 0 4px 0 #b9b9b9, 0 5px 0 #aaa, 0 6px 1px rgba(0, 0, 0, .1), 0 0 5px rgba(0, 0, 0, .1), 0 1px 3px rgba(0, 0, 0, .3), 0 3px 5px rgba(0, 0, 0, .2), 0 5px 10px rgba(0, 0, 0, .25), 0 10px 10px rgba(0, 0, 0, .2), 0 20px 20px rgba(0, 0, 0, .15)
        }

        .custom-text-shadow-8 {
            text-shadow: rgba(255, 255, 255, .5) 0 3px 3px
        }

        .custom-text-shadow-9 {
            text-shadow: 0 0 6px rgba(255, 255, 255, .7)
        }

        .custom-text-shadow-10 {
            text-shadow: 0 15px 5px rgba(0, 0, 0, .1), 10px 20px 5px rgba(0, 0, 0, .05), -10px 20px 5px rgba(0, 0, 0, .05)
        }

        .custom-text-shadow-11 {
            text-shadow: 2px 8px 6px rgba(0, 0, 0, .2), 0 -5px 35px rgba(255, 255, 255, .3)
        }

        [style*="line-through"] {
            text-decoration: line-through
        }

        .gm-style .gm-style-iw {
            font-weight: normal
        }

        .landing-public-mode [data-pseudo-url*="\"enabled\":true}"] {
            cursor: pointer
        }</style>
    <style type="text/css">@media all and (max-width: 9999px) {
            font[color="#f5f5f5"], font[color="#f5f5f5"] * {
                color: #f5f5f5 !important
            }

            font[color="#cfd8dc"], font[color="#cfd8dc"] * {
                color: #cfd8dc !important
            }

            font[color="#d7ccc8"], font[color="#d7ccc8"] * {
                color: #d7ccc8 !important
            }

            font[color="#ffccbc"], font[color="#ffccbc"] * {
                color: #ffccbc !important
            }

            font[color="#ffe0b2"], font[color="#ffe0b2"] * {
                color: #ffe0b2 !important
            }

            font[color="#ffecb3"], font[color="#ffecb3"] * {
                color: #ffecb3 !important
            }

            font[color="#fff9c4"], font[color="#fff9c4"] * {
                color: #fff9c4 !important
            }

            font[color="#f0f4c3"], font[color="#f0f4c3"] * {
                color: #f0f4c3 !important
            }

            font[color="#dcedc8"], font[color="#dcedc8"] * {
                color: #dcedc8 !important
            }

            font[color="#c8e6c9"], font[color="#c8e6c9"] * {
                color: #c8e6c9 !important
            }

            font[color="#b2dfdb"], font[color="#b2dfdb"] * {
                color: #b2dfdb !important
            }

            font[color="#b2ebf2"], font[color="#b2ebf2"] * {
                color: #b2ebf2 !important
            }

            font[color="#b3e5fc"], font[color="#b3e5fc"] * {
                color: #b3e5fc !important
            }

            font[color="#bbdefb"], font[color="#bbdefb"] * {
                color: #bbdefb !important
            }

            font[color="#c5cae9"], font[color="#c5cae9"] * {
                color: #c5cae9 !important
            }

            font[color="#d1c4e9"], font[color="#d1c4e9"] * {
                color: #d1c4e9 !important
            }

            font[color="#e1bee7"], font[color="#e1bee7"] * {
                color: #e1bee7 !important
            }

            font[color="#f8bbd0"], font[color="#f8bbd0"] * {
                color: #f8bbd0 !important
            }

            font[color="#ffcdd2"], font[color="#ffcdd2"] * {
                color: #ffcdd2 !important
            }

            font[color="#eeeeee"], font[color="#eeeeee"] * {
                color: #eee !important
            }

            font[color="#b0bec5"], font[color="#b0bec5"] * {
                color: #b0bec5 !important
            }

            font[color="#bcaaa4"], font[color="#bcaaa4"] * {
                color: #bcaaa4 !important
            }

            font[color="#ffab91"], font[color="#ffab91"] * {
                color: #ffab91 !important
            }

            font[color="#ffcc80"], font[color="#ffcc80"] * {
                color: #ffcc80 !important
            }

            font[color="#ffe082"], font[color="#ffe082"] * {
                color: #ffe082 !important
            }

            font[color="#fff59d"], font[color="#fff59d"] * {
                color: #fff59d !important
            }

            font[color="#e6ee9c"], font[color="#e6ee9c"] * {
                color: #e6ee9c !important
            }

            font[color="#c5e1a5"], font[color="#c5e1a5"] * {
                color: #c5e1a5 !important
            }

            font[color="#a5d6a7"], font[color="#a5d6a7"] * {
                color: #a5d6a7 !important
            }

            font[color="#80cbc4"], font[color="#80cbc4"] * {
                color: #80cbc4 !important
            }

            font[color="#80deea"], font[color="#80deea"] * {
                color: #80deea !important
            }

            font[color="#81d4fa"], font[color="#81d4fa"] * {
                color: #81d4fa !important
            }

            font[color="#90caf9"], font[color="#90caf9"] * {
                color: #90caf9 !important
            }

            font[color="#9fa8da"], font[color="#9fa8da"] * {
                color: #9fa8da !important
            }

            font[color="#b39ddb"], font[color="#b39ddb"] * {
                color: #b39ddb !important
            }

            font[color="#ce93d8"], font[color="#ce93d8"] * {
                color: #ce93d8 !important
            }

            font[color="#f48fb1"], font[color="#f48fb1"] * {
                color: #f48fb1 !important
            }

            font[color="#ef9a9a"], font[color="#ef9a9a"] * {
                color: #ef9a9a !important
            }

            font[color="#e0e0e0"], font[color="#e0e0e0"] * {
                color: #e0e0e0 !important
            }

            font[color="#90a4ae"], font[color="#90a4ae"] * {
                color: #90a4ae !important
            }

            font[color="#a1887f"], font[color="#a1887f"] * {
                color: #a1887f !important
            }

            font[color="#ff8a65"], font[color="#ff8a65"] * {
                color: #ff8a65 !important
            }

            font[color="#ffb74d"], font[color="#ffb74d"] * {
                color: #ffb74d !important
            }

            font[color="#ffd54f"], font[color="#ffd54f"] * {
                color: #ffd54f !important
            }

            font[color="#fff176"], font[color="#fff176"] * {
                color: #fff176 !important
            }

            font[color="#dce775"], font[color="#dce775"] * {
                color: #dce775 !important
            }

            font[color="#aed581"], font[color="#aed581"] * {
                color: #aed581 !important
            }

            font[color="#81c784"], font[color="#81c784"] * {
                color: #81c784 !important
            }

            font[color="#4db6ac"], font[color="#4db6ac"] * {
                color: #4db6ac !important
            }

            font[color="#4dd0e1"], font[color="#4dd0e1"] * {
                color: #4dd0e1 !important
            }

            font[color="#4fc3f7"], font[color="#4fc3f7"] * {
                color: #4fc3f7 !important
            }

            font[color="#64b5f6"], font[color="#64b5f6"] * {
                color: #64b5f6 !important
            }

            font[color="#7986cb"], font[color="#7986cb"] * {
                color: #7986cb !important
            }

            font[color="#9575cd"], font[color="#9575cd"] * {
                color: #9575cd !important
            }

            font[color="#ba68c8"], font[color="#ba68c8"] * {
                color: #ba68c8 !important
            }

            font[color="#f06292"], font[color="#f06292"] * {
                color: #f06292 !important
            }

            font[color="#e57373"], font[color="#e57373"] * {
                color: #e57373 !important
            }

            font[color="#9e9e9e"], font[color="#9e9e9e"] * {
                color: #9e9e9e !important
            }

            font[color="#607d8b"], font[color="#607d8b"] * {
                color: #607d8b !important
            }

            font[color="#795548"], font[color="#795548"] * {
                color: #795548 !important
            }

            font[color="#ff5722"], font[color="#ff5722"] * {
                color: #ff5722 !important
            }

            font[color="#ff9800"], font[color="#ff9800"] * {
                color: #ff9800 !important
            }

            font[color="#ffc107"], font[color="#ffc107"] * {
                color: #ffc107 !important
            }

            font[color="#ffeb3b"], font[color="#ffeb3b"] * {
                color: #ffeb3b !important
            }

            font[color="#cddc39"], font[color="#cddc39"] * {
                color: #cddc39 !important
            }

            font[color="#8bc34a"], font[color="#8bc34a"] * {
                color: #8bc34a !important
            }

            font[color="#4caf50"], font[color="#4caf50"] * {
                color: #4caf50 !important
            }

            font[color="#009688"], font[color="#009688"] * {
                color: #009688 !important
            }

            font[color="#00bcd4"], font[color="#00bcd4"] * {
                color: #00bcd4 !important
            }

            font[color="#03a9f4"], font[color="#03a9f4"] * {
                color: #03a9f4 !important
            }

            font[color="#2196f3"], font[color="#2196f3"] * {
                color: #2196f3 !important
            }

            font[color="#3f51b5"], font[color="#3f51b5"] * {
                color: #3f51b5 !important
            }

            font[color="#673ab7"], font[color="#673ab7"] * {
                color: #673ab7 !important
            }

            font[color="#9c27b0"], font[color="#9c27b0"] * {
                color: #9c27b0 !important
            }

            font[color="#e91e63"], font[color="#e91e63"] * {
                color: #e91e63 !important
            }

            font[color="#f44336"], font[color="#f44336"] * {
                color: #f44336 !important
            }

            font[color="#757575"], font[color="#757575"] * {
                color: #757575 !important
            }

            font[color="#546e7a"], font[color="#546e7a"] * {
                color: #546e7a !important
            }

            font[color="#6d4c41"], font[color="#6d4c41"] * {
                color: #6d4c41 !important
            }

            font[color="#f4511e"], font[color="#f4511e"] * {
                color: #f4511e !important
            }

            font[color="#fb8c00"], font[color="#fb8c00"] * {
                color: #fb8c00 !important
            }

            font[color="#ffb300"], font[color="#ffb300"] * {
                color: #ffb300 !important
            }

            font[color="#fdd835"], font[color="#fdd835"] * {
                color: #fdd835 !important
            }

            font[color="#c0ca33"], font[color="#c0ca33"] * {
                color: #c0ca33 !important
            }

            font[color="#7cb342"], font[color="#7cb342"] * {
                color: #7cb342 !important
            }

            font[color="#43a047"], font[color="#43a047"] * {
                color: #43a047 !important
            }

            font[color="#00897b"], font[color="#00897b"] * {
                color: #00897b !important
            }

            font[color="#00acc1"], font[color="#00acc1"] * {
                color: #00acc1 !important
            }

            font[color="#039be5"], font[color="#039be5"] * {
                color: #039be5 !important
            }

            font[color="#1e88e5"], font[color="#1e88e5"] * {
                color: #1e88e5 !important
            }

            font[color="#3949ab"], font[color="#3949ab"] * {
                color: #3949ab !important
            }

            font[color="#5e35b1"], font[color="#5e35b1"] * {
                color: #5e35b1 !important
            }

            font[color="#8e24aa"], font[color="#8e24aa"] * {
                color: #8e24aa !important
            }

            font[color="#d81b60"], font[color="#d81b60"] * {
                color: #d81b60 !important
            }

            font[color="#e53935"], font[color="#e53935"] * {
                color: #e53935 !important
            }

            font[color="#616161"], font[color="#616161"] * {
                color: #616161 !important
            }

            font[color="#455a64"], font[color="#455a64"] * {
                color: #455a64 !important
            }

            font[color="#5d4037"], font[color="#5d4037"] * {
                color: #5d4037 !important
            }

            font[color="#e64a19"], font[color="#e64a19"] * {
                color: #e64a19 !important
            }

            font[color="#f57c00"], font[color="#f57c00"] * {
                color: #f57c00 !important
            }

            font[color="#ffa000"], font[color="#ffa000"] * {
                color: #ffa000 !important
            }

            font[color="#fbc02d"], font[color="#fbc02d"] * {
                color: #fbc02d !important
            }

            font[color="#afb42b"], font[color="#afb42b"] * {
                color: #afb42b !important
            }

            font[color="#689f38"], font[color="#689f38"] * {
                color: #689f38 !important
            }

            font[color="#388e3c"], font[color="#388e3c"] * {
                color: #388e3c !important
            }

            font[color="#00796b"], font[color="#00796b"] * {
                color: #00796b !important
            }

            font[color="#0097a7"], font[color="#0097a7"] * {
                color: #0097a7 !important
            }

            font[color="#0288d1"], font[color="#0288d1"] * {
                color: #0288d1 !important
            }

            font[color="#1976d2"], font[color="#1976d2"] * {
                color: #1976d2 !important
            }

            font[color="#303f9f"], font[color="#303f9f"] * {
                color: #303f9f !important
            }

            font[color="#512da8"], font[color="#512da8"] * {
                color: #512da8 !important
            }

            font[color="#7b1fa2"], font[color="#7b1fa2"] * {
                color: #7b1fa2 !important
            }

            font[color="#c2185b"], font[color="#c2185b"] * {
                color: #c2185b !important
            }

            font[color="#d32f2f"], font[color="#d32f2f"] * {
                color: #d32f2f !important
            }

            font[color="#212121"], font[color="#212121"] * {
                color: #212121 !important
            }

            font[color="#263238"], font[color="#263238"] * {
                color: #263238 !important
            }

            font[color="#3e2723"], font[color="#3e2723"] * {
                color: #3e2723 !important
            }

            font[color="#bf360c"], font[color="#bf360c"] * {
                color: #bf360c !important
            }

            font[color="#e65100"], font[color="#e65100"] * {
                color: #e65100 !important
            }

            font[color="#ff6f00"], font[color="#ff6f00"] * {
                color: #ff6f00 !important
            }

            font[color="#f57f17"], font[color="#f57f17"] * {
                color: #f57f17 !important
            }

            font[color="#827717"], font[color="#827717"] * {
                color: #827717 !important
            }

            font[color="#33691e"], font[color="#33691e"] * {
                color: #33691e !important
            }

            font[color="#1b5e20"], font[color="#1b5e20"] * {
                color: #1b5e20 !important
            }

            font[color="#004d40"], font[color="#004d40"] * {
                color: #004d40 !important
            }

            font[color="#006064"], font[color="#006064"] * {
                color: #006064 !important
            }

            font[color="#01579b"], font[color="#01579b"] * {
                color: #01579b !important
            }

            font[color="#0d47a1"], font[color="#0d47a1"] * {
                color: #0d47a1 !important
            }

            font[color="#1a237e"], font[color="#1a237e"] * {
                color: #1a237e !important
            }

            font[color="#311b92"], font[color="#311b92"] * {
                color: #311b92 !important
            }

            font[color="#4a148c"], font[color="#4a148c"] * {
                color: #4a148c !important
            }

            font[color="#880e4f"], font[color="#880e4f"] * {
                color: #880e4f !important
            }

            font[color="#b71c1c"], font[color="#b71c1c"] * {
                color: #b71c1c !important
            }
        }</style>
    <style type="text/css">@charset "UTF-8";
        /*!
 * animate.css -http://daneden.me/animate
 * Version - 3.5.2
 * Licensed under the MIT license - http://opensource.org/licenses/MIT
 *
 * Copyright (c) 2017 Daniel Eden
 */
        .animated {
            animation-duration: 1s;
            animation-fill-mode: both
        }

        .animated.infinite {
            animation-iteration-count: infinite
        }

        .animated.hinge {
            animation-duration: 2s
        }

        .animated.flipOutX, .animated.flipOutY, .animated.bounceIn, .animated.bounceOut {
            animation-duration: .75s
        }

        @keyframes bounce {
            from, 20%, 53%, 80%, to {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000);
                transform: translate3d(0, 0, 0)
            }
            40%, 43% {
                animation-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                transform: translate3d(0, -30px, 0)
            }
            70% {
                animation-timing-function: cubic-bezier(0.755, 0.050, 0.855, 0.060);
                transform: translate3d(0, -15px, 0)
            }
            90% {
                transform: translate3d(0, -4px, 0)
            }
        }

        .bounce {
            animation-name: bounce;
            transform-origin: center bottom
        }

        @keyframes flash {
            from, 50%, to {
                opacity: 1
            }
            25%, 75% {
                opacity: 0
            }
        }

        .flash {
            animation-name: flash
        }

        @keyframes pulse {
            from {
                transform: scale3d(1, 1, 1)
            }
            50% {
                transform: scale3d(1.05, 1.05, 1.05)
            }
            to {
                transform: scale3d(1, 1, 1)
            }
        }

        .pulse {
            animation-name: pulse
        }

        @keyframes rubberBand {
            from {
                transform: scale3d(1, 1, 1)
            }
            30% {
                transform: scale3d(1.25, 0.75, 1)
            }
            40% {
                transform: scale3d(0.75, 1.25, 1)
            }
            50% {
                transform: scale3d(1.15, 0.85, 1)
            }
            65% {
                transform: scale3d(.95, 1.05, 1)
            }
            75% {
                transform: scale3d(1.05, .95, 1)
            }
            to {
                transform: scale3d(1, 1, 1)
            }
        }

        .rubberBand {
            animation-name: rubberBand
        }

        @keyframes shake {
            from, to {
                transform: translate3d(0, 0, 0)
            }
            10%, 30%, 50%, 70%, 90% {
                transform: translate3d(-10px, 0, 0)
            }
            20%, 40%, 60%, 80% {
                transform: translate3d(10px, 0, 0)
            }
        }

        .shake {
            animation-name: shake
        }

        @keyframes headShake {
            0% {
                transform: translateX(0)
            }
            6.5% {
                transform: translateX(-6px) rotateY(-9deg)
            }
            18.5% {
                transform: translateX(5px) rotateY(7deg)
            }
            31.5% {
                transform: translateX(-3px) rotateY(-5deg)
            }
            43.5% {
                transform: translateX(2px) rotateY(3deg)
            }
            50% {
                transform: translateX(0)
            }
        }

        .headShake {
            animation-timing-function: ease-in-out;
            animation-name: headShake
        }

        @keyframes swing {
            20% {
                transform: rotate3d(0, 0, 1, 15deg)
            }
            40% {
                transform: rotate3d(0, 0, 1, -10deg)
            }
            60% {
                transform: rotate3d(0, 0, 1, 5deg)
            }
            80% {
                transform: rotate3d(0, 0, 1, -5deg)
            }
            to {
                transform: rotate3d(0, 0, 1, 0deg)
            }
        }

        .swing {
            transform-origin: top center;
            animation-name: swing
        }

        @keyframes tada {
            from {
                transform: scale3d(1, 1, 1)
            }
            10%, 20% {
                transform: scale3d(.9, .9, .9) rotate3d(0, 0, 1, -3deg)
            }
            30%, 50%, 70%, 90% {
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, 3deg)
            }
            40%, 60%, 80% {
                transform: scale3d(1.1, 1.1, 1.1) rotate3d(0, 0, 1, -3deg)
            }
            to {
                transform: scale3d(1, 1, 1)
            }
        }

        .tada {
            animation-name: tada
        }

        @keyframes wobble {
            from {
                transform: none
            }
            15% {
                transform: translate3d(-25%, 0, 0) rotate3d(0, 0, 1, -5deg)
            }
            30% {
                transform: translate3d(20%, 0, 0) rotate3d(0, 0, 1, 3deg)
            }
            45% {
                transform: translate3d(-15%, 0, 0) rotate3d(0, 0, 1, -3deg)
            }
            60% {
                transform: translate3d(10%, 0, 0) rotate3d(0, 0, 1, 2deg)
            }
            75% {
                transform: translate3d(-5%, 0, 0) rotate3d(0, 0, 1, -1deg)
            }
            to {
                transform: none
            }
        }

        .wobble {
            animation-name: wobble
        }

        @keyframes jello {
            from, 11.1%, to {
                transform: none
            }
            22.2% {
                transform: skewX(-12.5deg) skewY(-12.5deg)
            }
            33.3% {
                transform: skewX(6.25deg) skewY(6.25deg)
            }
            44.4% {
                transform: skewX(-3.125deg) skewY(-3.125deg)
            }
            55.5% {
                transform: skewX(1.5625deg) skewY(1.5625deg)
            }
            66.6% {
                transform: skewX(-0.78125deg) skewY(-0.78125deg)
            }
            77.7% {
                transform: skewX(0.390625deg) skewY(0.390625deg)
            }
            88.8% {
                transform: skewX(-0.1953125deg) skewY(-0.1953125deg)
            }
        }

        .jello {
            animation-name: jello;
            transform-origin: center
        }

        @keyframes bounceIn {
            from, 20%, 40%, 60%, 80%, to {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000)
            }
            0% {
                opacity: 0;
                transform: scale3d(.3, .3, .3)
            }
            20% {
                transform: scale3d(1.1, 1.1, 1.1)
            }
            40% {
                transform: scale3d(.9, .9, .9)
            }
            60% {
                opacity: 1;
                transform: scale3d(1.03, 1.03, 1.03)
            }
            80% {
                transform: scale3d(.97, .97, .97)
            }
            to {
                opacity: 1;
                transform: scale3d(1, 1, 1)
            }
        }

        .bounceIn {
            animation-name: bounceIn
        }

        @keyframes bounceInDown {
            from, 60%, 75%, 90%, to {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000)
            }
            0% {
                opacity: 0;
                transform: translate3d(0, -3000px, 0)
            }
            60% {
                opacity: 1;
                transform: translate3d(0, 25px, 0)
            }
            75% {
                transform: translate3d(0, -10px, 0)
            }
            90% {
                transform: translate3d(0, 5px, 0)
            }
            to {
                transform: none
            }
        }

        .bounceInDown {
            animation-name: bounceInDown
        }

        @keyframes bounceInLeft {
            from, 60%, 75%, 90%, to {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000)
            }
            0% {
                opacity: 0;
                transform: translate3d(-3000px, 0, 0)
            }
            60% {
                opacity: 1;
                transform: translate3d(25px, 0, 0)
            }
            75% {
                transform: translate3d(-10px, 0, 0)
            }
            90% {
                transform: translate3d(5px, 0, 0)
            }
            to {
                transform: none
            }
        }

        .bounceInLeft {
            animation-name: bounceInLeft
        }

        @keyframes bounceInRight {
            from, 60%, 75%, 90%, to {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000)
            }
            from {
                opacity: 0;
                transform: translate3d(3000px, 0, 0)
            }
            60% {
                opacity: 1;
                transform: translate3d(-25px, 0, 0)
            }
            75% {
                transform: translate3d(10px, 0, 0)
            }
            90% {
                transform: translate3d(-5px, 0, 0)
            }
            to {
                transform: none
            }
        }

        .bounceInRight {
            animation-name: bounceInRight
        }

        @keyframes bounceInUp {
            from, 60%, 75%, 90%, to {
                animation-timing-function: cubic-bezier(0.215, 0.610, 0.355, 1.000)
            }
            from {
                opacity: 0;
                transform: translate3d(0, 3000px, 0)
            }
            60% {
                opacity: 1;
                transform: translate3d(0, -20px, 0)
            }
            75% {
                transform: translate3d(0, 10px, 0)
            }
            90% {
                transform: translate3d(0, -5px, 0)
            }
            to {
                transform: translate3d(0, 0, 0)
            }
        }

        .bounceInUp {
            animation-name: bounceInUp
        }

        @keyframes bounceOut {
            20% {
                transform: scale3d(.9, .9, .9)
            }
            50%, 55% {
                opacity: 1;
                transform: scale3d(1.1, 1.1, 1.1)
            }
            to {
                opacity: 0;
                transform: scale3d(.3, .3, .3)
            }
        }

        .bounceOut {
            animation-name: bounceOut
        }

        @keyframes bounceOutDown {
            20% {
                transform: translate3d(0, 10px, 0)
            }
            40%, 45% {
                opacity: 1;
                transform: translate3d(0, -20px, 0)
            }
            to {
                opacity: 0;
                transform: translate3d(0, 2000px, 0)
            }
        }

        .bounceOutDown {
            animation-name: bounceOutDown
        }

        @keyframes bounceOutLeft {
            20% {
                opacity: 1;
                transform: translate3d(20px, 0, 0)
            }
            to {
                opacity: 0;
                transform: translate3d(-2000px, 0, 0)
            }
        }

        .bounceOutLeft {
            animation-name: bounceOutLeft
        }

        @keyframes bounceOutRight {
            20% {
                opacity: 1;
                transform: translate3d(-20px, 0, 0)
            }
            to {
                opacity: 0;
                transform: translate3d(2000px, 0, 0)
            }
        }

        .bounceOutRight {
            animation-name: bounceOutRight
        }

        @keyframes bounceOutUp {
            20% {
                transform: translate3d(0, -10px, 0)
            }
            40%, 45% {
                opacity: 1;
                transform: translate3d(0, 20px, 0)
            }
            to {
                opacity: 0;
                transform: translate3d(0, -2000px, 0)
            }
        }

        .bounceOutUp {
            animation-name: bounceOutUp
        }

        @keyframes fadeIn {
            from {
                opacity: 0
            }
            to {
                opacity: 1
            }
        }

        .fadeIn {
            animation-name: fadeIn
        }

        @keyframes fadeInDown {
            from {
                opacity: 0;
                transform: translate3d(0, -100%, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInDown {
            animation-name: fadeInDown
        }

        @keyframes fadeInDownBig {
            from {
                opacity: 0;
                transform: translate3d(0, -2000px, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInDownBig {
            animation-name: fadeInDownBig
        }

        @keyframes fadeInLeft {
            from {
                opacity: 0;
                transform: translate3d(-100%, 0, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInLeft {
            animation-name: fadeInLeft
        }

        @keyframes fadeInLeftBig {
            from {
                opacity: 0;
                transform: translate3d(-2000px, 0, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInLeftBig {
            animation-name: fadeInLeftBig
        }

        @keyframes fadeInRight {
            from {
                opacity: 0;
                transform: translate3d(100%, 0, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInRight {
            animation-name: fadeInRight
        }

        @keyframes fadeInRightBig {
            from {
                opacity: 0;
                transform: translate3d(2000px, 0, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInRightBig {
            animation-name: fadeInRightBig
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translate3d(0, 100%, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInUp {
            animation-name: fadeInUp
        }

        @keyframes fadeInUpBig {
            from {
                opacity: 0;
                transform: translate3d(0, 2000px, 0)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .fadeInUpBig {
            animation-name: fadeInUpBig
        }

        @keyframes fadeOut {
            from {
                opacity: 1
            }
            to {
                opacity: 0
            }
        }

        .fadeOut {
            animation-name: fadeOut
        }

        @keyframes fadeOutDown {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(0, 100%, 0)
            }
        }

        .fadeOutDown {
            animation-name: fadeOutDown
        }

        @keyframes fadeOutDownBig {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(0, 2000px, 0)
            }
        }

        .fadeOutDownBig {
            animation-name: fadeOutDownBig
        }

        @keyframes fadeOutLeft {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(-100%, 0, 0)
            }
        }

        .fadeOutLeft {
            animation-name: fadeOutLeft
        }

        @keyframes fadeOutLeftBig {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(-2000px, 0, 0)
            }
        }

        .fadeOutLeftBig {
            animation-name: fadeOutLeftBig
        }

        @keyframes fadeOutRight {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(100%, 0, 0)
            }
        }

        .fadeOutRight {
            animation-name: fadeOutRight
        }

        @keyframes fadeOutRightBig {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(2000px, 0, 0)
            }
        }

        .fadeOutRightBig {
            animation-name: fadeOutRightBig
        }

        @keyframes fadeOutUp {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(0, -100%, 0)
            }
        }

        .fadeOutUp {
            animation-name: fadeOutUp
        }

        @keyframes fadeOutUpBig {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(0, -2000px, 0)
            }
        }

        .fadeOutUpBig {
            animation-name: fadeOutUpBig
        }

        @keyframes flip {
            from {
                transform: perspective(400px) rotate3d(0, 1, 0, -360deg);
                animation-timing-function: ease-out
            }
            40% {
                transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -190deg);
                animation-timing-function: ease-out
            }
            50% {
                transform: perspective(400px) translate3d(0, 0, 150px) rotate3d(0, 1, 0, -170deg);
                animation-timing-function: ease-in
            }
            80% {
                transform: perspective(400px) scale3d(.95, .95, .95);
                animation-timing-function: ease-in
            }
            to {
                transform: perspective(400px);
                animation-timing-function: ease-in
            }
        }

        .animated.flip {
            -webkit-backface-visibility: visible;
            backface-visibility: visible;
            animation-name: flip
        }

        @keyframes flipInX {
            from {
                transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                animation-timing-function: ease-in;
                opacity: 0
            }
            40% {
                transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                animation-timing-function: ease-in
            }
            60% {
                transform: perspective(400px) rotate3d(1, 0, 0, 10deg);
                opacity: 1
            }
            80% {
                transform: perspective(400px) rotate3d(1, 0, 0, -5deg)
            }
            to {
                transform: perspective(400px)
            }
        }

        .flipInX {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            animation-name: flipInX
        }

        @keyframes flipInY {
            from {
                transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
                animation-timing-function: ease-in;
                opacity: 0
            }
            40% {
                transform: perspective(400px) rotate3d(0, 1, 0, -20deg);
                animation-timing-function: ease-in
            }
            60% {
                transform: perspective(400px) rotate3d(0, 1, 0, 10deg);
                opacity: 1
            }
            80% {
                transform: perspective(400px) rotate3d(0, 1, 0, -5deg)
            }
            to {
                transform: perspective(400px)
            }
        }

        .flipInY {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            animation-name: flipInY
        }

        @keyframes flipOutX {
            from {
                transform: perspective(400px)
            }
            30% {
                transform: perspective(400px) rotate3d(1, 0, 0, -20deg);
                opacity: 1
            }
            to {
                transform: perspective(400px) rotate3d(1, 0, 0, 90deg);
                opacity: 0
            }
        }

        .flipOutX {
            animation-name: flipOutX;
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important
        }

        @keyframes flipOutY {
            from {
                transform: perspective(400px)
            }
            30% {
                transform: perspective(400px) rotate3d(0, 1, 0, -15deg);
                opacity: 1
            }
            to {
                transform: perspective(400px) rotate3d(0, 1, 0, 90deg);
                opacity: 0
            }
        }

        .flipOutY {
            -webkit-backface-visibility: visible !important;
            backface-visibility: visible !important;
            animation-name: flipOutY
        }

        @keyframes lightSpeedIn {
            from {
                transform: translate3d(100%, 0, 0) skewX(-30deg);
                opacity: 0
            }
            60% {
                transform: skewX(20deg);
                opacity: 1
            }
            80% {
                transform: skewX(-5deg);
                opacity: 1
            }
            to {
                transform: none;
                opacity: 1
            }
        }

        .lightSpeedIn {
            animation-name: lightSpeedIn;
            animation-timing-function: ease-out
        }

        @keyframes lightSpeedOut {
            from {
                opacity: 1
            }
            to {
                transform: translate3d(100%, 0, 0) skewX(30deg);
                opacity: 0
            }
        }

        .lightSpeedOut {
            animation-name: lightSpeedOut;
            animation-timing-function: ease-in
        }

        @keyframes rotateIn {
            from {
                transform-origin: center;
                transform: rotate3d(0, 0, 1, -200deg);
                opacity: 0
            }
            to {
                transform-origin: center;
                transform: none;
                opacity: 1
            }
        }

        .rotateIn {
            animation-name: rotateIn
        }

        @keyframes rotateInDownLeft {
            from {
                transform-origin: left bottom;
                transform: rotate3d(0, 0, 1, -45deg);
                opacity: 0
            }
            to {
                transform-origin: left bottom;
                transform: none;
                opacity: 1
            }
        }

        .rotateInDownLeft {
            animation-name: rotateInDownLeft
        }

        @keyframes rotateInDownRight {
            from {
                transform-origin: right bottom;
                transform: rotate3d(0, 0, 1, 45deg);
                opacity: 0
            }
            to {
                transform-origin: right bottom;
                transform: none;
                opacity: 1
            }
        }

        .rotateInDownRight {
            animation-name: rotateInDownRight
        }

        @keyframes rotateInUpLeft {
            from {
                transform-origin: left bottom;
                transform: rotate3d(0, 0, 1, 45deg);
                opacity: 0
            }
            to {
                transform-origin: left bottom;
                transform: none;
                opacity: 1
            }
        }

        .rotateInUpLeft {
            animation-name: rotateInUpLeft
        }

        @keyframes rotateInUpRight {
            from {
                transform-origin: right bottom;
                transform: rotate3d(0, 0, 1, -90deg);
                opacity: 0
            }
            to {
                transform-origin: right bottom;
                transform: none;
                opacity: 1
            }
        }

        .rotateInUpRight {
            animation-name: rotateInUpRight
        }

        @keyframes rotateOut {
            from {
                transform-origin: center;
                opacity: 1
            }
            to {
                transform-origin: center;
                transform: rotate3d(0, 0, 1, 200deg);
                opacity: 0
            }
        }

        .rotateOut {
            animation-name: rotateOut
        }

        @keyframes rotateOutDownLeft {
            from {
                transform-origin: left bottom;
                opacity: 1
            }
            to {
                transform-origin: left bottom;
                transform: rotate3d(0, 0, 1, 45deg);
                opacity: 0
            }
        }

        .rotateOutDownLeft {
            animation-name: rotateOutDownLeft
        }

        @keyframes rotateOutDownRight {
            from {
                transform-origin: right bottom;
                opacity: 1
            }
            to {
                transform-origin: right bottom;
                transform: rotate3d(0, 0, 1, -45deg);
                opacity: 0
            }
        }

        .rotateOutDownRight {
            animation-name: rotateOutDownRight
        }

        @keyframes rotateOutUpLeft {
            from {
                transform-origin: left bottom;
                opacity: 1
            }
            to {
                transform-origin: left bottom;
                transform: rotate3d(0, 0, 1, -45deg);
                opacity: 0
            }
        }

        .rotateOutUpLeft {
            animation-name: rotateOutUpLeft
        }

        @keyframes rotateOutUpRight {
            from {
                transform-origin: right bottom;
                opacity: 1
            }
            to {
                transform-origin: right bottom;
                transform: rotate3d(0, 0, 1, 90deg);
                opacity: 0
            }
        }

        .rotateOutUpRight {
            animation-name: rotateOutUpRight
        }

        @keyframes hinge {
            0% {
                transform-origin: top left;
                animation-timing-function: ease-in-out
            }
            20%, 60% {
                transform: rotate3d(0, 0, 1, 80deg);
                transform-origin: top left;
                animation-timing-function: ease-in-out
            }
            40%, 80% {
                transform: rotate3d(0, 0, 1, 60deg);
                transform-origin: top left;
                animation-timing-function: ease-in-out;
                opacity: 1
            }
            to {
                transform: translate3d(0, 700px, 0);
                opacity: 0
            }
        }

        .hinge {
            animation-name: hinge
        }

        @keyframes jackInTheBox {
            from {
                opacity: 0;
                transform: scale(0.1) rotate(30deg);
                transform-origin: center bottom
            }
            50% {
                transform: rotate(-10deg)
            }
            70% {
                transform: rotate(3deg)
            }
            to {
                opacity: 1;
                transform: scale(1)
            }
        }

        .jackInTheBox {
            animation-name: jackInTheBox
        }

        @keyframes rollIn {
            from {
                opacity: 0;
                transform: translate3d(-100%, 0, 0) rotate3d(0, 0, 1, -120deg)
            }
            to {
                opacity: 1;
                transform: none
            }
        }

        .rollIn {
            animation-name: rollIn
        }

        @keyframes rollOut {
            from {
                opacity: 1
            }
            to {
                opacity: 0;
                transform: translate3d(100%, 0, 0) rotate3d(0, 0, 1, 120deg)
            }
        }

        .rollOut {
            animation-name: rollOut
        }

        @keyframes zoomIn {
            from {
                opacity: 0;
                transform: scale3d(.3, .3, .3)
            }
            50% {
                opacity: 1
            }
        }

        .zoomIn {
            animation-name: zoomIn
        }

        @keyframes zoomInDown {
            from {
                opacity: 0;
                transform: scale3d(.1, .1, .1) translate3d(0, -1000px, 0);
                animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190)
            }
            60% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
                animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1)
            }
        }

        .zoomInDown {
            animation-name: zoomInDown
        }

        @keyframes zoomInLeft {
            from {
                opacity: 0;
                transform: scale3d(.1, .1, .1) translate3d(-1000px, 0, 0);
                animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190)
            }
            60% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(10px, 0, 0);
                animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1)
            }
        }

        .zoomInLeft {
            animation-name: zoomInLeft
        }

        @keyframes zoomInRight {
            from {
                opacity: 0;
                transform: scale3d(.1, .1, .1) translate3d(1000px, 0, 0);
                animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190)
            }
            60% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(-10px, 0, 0);
                animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1)
            }
        }

        .zoomInRight {
            animation-name: zoomInRight
        }

        @keyframes zoomInUp {
            from {
                opacity: 0;
                transform: scale3d(.1, .1, .1) translate3d(0, 1000px, 0);
                animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190)
            }
            60% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
                animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1)
            }
        }

        .zoomInUp {
            animation-name: zoomInUp
        }

        @keyframes zoomOut {
            from {
                opacity: 1
            }
            50% {
                opacity: 0;
                transform: scale3d(.3, .3, .3)
            }
            to {
                opacity: 0
            }
        }

        .zoomOut {
            animation-name: zoomOut
        }

        @keyframes zoomOutDown {
            40% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(0, -60px, 0);
                animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190)
            }
            to {
                opacity: 0;
                transform: scale3d(.1, .1, .1) translate3d(0, 2000px, 0);
                transform-origin: center bottom;
                animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1)
            }
        }

        .zoomOutDown {
            animation-name: zoomOutDown
        }

        @keyframes zoomOutLeft {
            40% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(42px, 0, 0)
            }
            to {
                opacity: 0;
                transform: scale(.1) translate3d(-2000px, 0, 0);
                transform-origin: left center
            }
        }

        .zoomOutLeft {
            animation-name: zoomOutLeft
        }

        @keyframes zoomOutRight {
            40% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(-42px, 0, 0)
            }
            to {
                opacity: 0;
                transform: scale(.1) translate3d(2000px, 0, 0);
                transform-origin: right center
            }
        }

        .zoomOutRight {
            animation-name: zoomOutRight
        }

        @keyframes zoomOutUp {
            40% {
                opacity: 1;
                transform: scale3d(.475, .475, .475) translate3d(0, 60px, 0);
                animation-timing-function: cubic-bezier(0.550, 0.055, 0.675, 0.190)
            }
            to {
                opacity: 0;
                transform: scale3d(.1, .1, .1) translate3d(0, -2000px, 0);
                transform-origin: center bottom;
                animation-timing-function: cubic-bezier(0.175, 0.885, 0.320, 1)
            }
        }

        .zoomOutUp {
            animation-name: zoomOutUp
        }

        @keyframes slideInDown {
            from {
                transform: translate3d(0, -100%, 0);
                visibility: visible
            }
            to {
                transform: translate3d(0, 0, 0)
            }
        }

        .slideInDown {
            animation-name: slideInDown
        }

        @keyframes slideInLeft {
            from {
                transform: translate3d(-100%, 0, 0);
                visibility: visible
            }
            to {
                transform: translate3d(0, 0, 0)
            }
        }

        .slideInLeft {
            animation-name: slideInLeft
        }

        @keyframes slideInRight {
            from {
                transform: translate3d(100%, 0, 0);
                visibility: visible
            }
            to {
                transform: translate3d(0, 0, 0)
            }
        }

        .slideInRight {
            animation-name: slideInRight
        }

        @keyframes slideInUp {
            from {
                transform: translate3d(0, 100%, 0);
                visibility: visible
            }
            to {
                transform: translate3d(0, 0, 0)
            }
        }

        .slideInUp {
            animation-name: slideInUp
        }

        @keyframes slideOutDown {
            from {
                transform: translate3d(0, 0, 0)
            }
            to {
                visibility: hidden;
                transform: translate3d(0, 100%, 0)
            }
        }

        .slideOutDown {
            animation-name: slideOutDown
        }

        @keyframes slideOutLeft {
            from {
                transform: translate3d(0, 0, 0)
            }
            to {
                visibility: hidden;
                transform: translate3d(-100%, 0, 0)
            }
        }

        .slideOutLeft {
            animation-name: slideOutLeft
        }

        @keyframes slideOutRight {
            from {
                transform: translate3d(0, 0, 0)
            }
            to {
                visibility: hidden;
                transform: translate3d(100%, 0, 0)
            }
        }

        .slideOutRight {
            animation-name: slideOutRight
        }

        @keyframes slideOutUp {
            from {
                transform: translate3d(0, 0, 0)
            }
            to {
                visibility: hidden;
                transform: translate3d(0, -100%, 0)
            }
        }

        .slideOutUp {
            animation-name: slideOutUp
        }</style>
    <style type="text/css">/*!
 * Hamburgers
 * @description Tasty CSS-animated hamburgers
 * @author Jonathan Suh @jonsuh
 * @site https://jonsuh.com/hamburgers
 * @link https://github.com/jonsuh/hamburgers
 */
        .hamburger {
            padding: 15px 15px;
            display: inline-block;
            cursor: pointer;
            transition-property: opacity, filter;
            transition-duration: .15s;
            transition-timing-function: linear;
            font: inherit;
            color: inherit;
            text-transform: none;
            background-color: transparent;
            border: 0;
            margin: 0;
            overflow: visible
        }

        .hamburger:hover {
            opacity: .7
        }

        .hamburger-box {
            width: 40px;
            height: 24px;
            display: inline-block;
            position: relative
        }

        .hamburger-inner {
            display: block;
            top: 50%;
            margin-top: -2px
        }

        .hamburger-inner, .hamburger-inner::before, .hamburger-inner::after {
            width: 40px;
            height: 4px;
            background-color: #000;
            border-radius: 4px;
            position: absolute;
            transition-property: transform;
            transition-duration: .15s;
            transition-timing-function: ease
        }

        .hamburger-inner::before, .hamburger-inner::after {
            content: "";
            display: block
        }

        .hamburger-inner::before {
            top: -10px
        }

        .hamburger-inner::after {
            bottom: -10px
        }

        .hamburger--slider .hamburger-inner {
            top: 2px
        }

        .hamburger--slider .hamburger-inner::before {
            top: 10px;
            transition-property: transform, opacity;
            transition-timing-function: ease;
            transition-duration: .15s
        }

        .hamburger--slider .hamburger-inner::after {
            top: 20px
        }

        .hamburger--slider.is-active .hamburger-inner {
            transform: translate3d(0, 10px, 0) rotate(45deg)
        }

        .hamburger--slider.is-active .hamburger-inner::before {
            transform: rotate(-45deg) translate3d(-5.71429px, -6px, 0);
            opacity: 0
        }

        .hamburger--slider.is-active .hamburger-inner::after {
            transform: translate3d(0, -20px, 0) rotate(-90deg)
        }

        .hamburger {
            padding: 0
        }

        .hamburger-inner::before, .hamburger-inner::after {
            background-color: inherit
        }

        .hamburger .hamburger-box, .hamburger .hamburger-inner, .hamburger .hamburger-inner::after, .hamburger .hamburger-inner::before {
            height: 1px;
            border-radius: 0;
            width: 25px
        }

        .hamburger .hamburger-box {
            height: 17px
        }

        .hamburger .hamburger-inner:before {
            top: 9px
        }

        .hamburger .hamburger-inner:after {
            top: 17px
        }

        .hamburger.hamburger--md .hamburger-box, .hamburger.hamburger--md .hamburger-inner, .hamburger.hamburger--md .hamburger-inner::after, .hamburger.hamburger--md .hamburger-inner::before {
            height: 1px;
            border-radius: 0;
            width: 25px
        }

        .hamburger.hamburger--md .hamburger-box {
            height: 17px
        }

        .hamburger.hamburger--md .hamburger-inner {
            top: 1px
        }

        .hamburger.hamburger--md .hamburger-inner:before {
            top: 9px
        }

        .hamburger.hamburger--md .hamburger-inner:after {
            top: 17px
        }

        .hamburger.hamburger--slider.is-active .hamburger-inner:after, .hamburger.hamburger--slider.hamburger--md.is-active .hamburger-inner:after {
            transform: translate3d(0, -17px, 0) rotate(-90deg)
        }

        .hamburger.hamburger--slider.is-active .hamburger-inner, .hamburger.hamburger--slider.hamburger--md.is-active .hamburger-inner {
            transform: translate3d(0, 9px, 0) rotate(45deg)
        }

        .hamburger.hamburger--sm .hamburger-box, .hamburger.hamburger--sm .hamburger-inner, .hamburger.hamburger--sm .hamburger-inner::after, .hamburger.hamburger--sm .hamburger-inner::before {
            height: 2px;
            border-radius: 1px;
            width: 22px
        }

        .hamburger.hamburger--sm .hamburger-box {
            height: 12px
        }

        .hamburger.hamburger--sm .hamburger-inner {
            top: 0
        }

        .hamburger.hamburger--sm .hamburger-inner:before {
            top: 6px
        }

        .hamburger.hamburger--sm .hamburger-inner:after {
            top: 12px
        }

        .hamburger.hamburger--slider.hamburger--sm.is-active .hamburger-inner:after {
            transform: translate3d(0, -12px, 0) rotate(-90deg)
        }

        .hamburger.hamburger--slider.hamburger--sm.is-active .hamburger-inner {
            transform: translate3d(0, 6px, 0) rotate(45deg)
        }

        .hamburger.hamburger--lg .hamburger-box, .hamburger.hamburger--lg .hamburger-inner, .hamburger.hamburger--lg .hamburger-inner::after, .hamburger.hamburger--lg .hamburger-inner::before {
            height: 1px;
            border-radius: 0;
            width: 40px
        }

        .hamburger.hamburger--lg .hamburger-box {
            height: 20px
        }

        .hamburger.hamburger--lg .hamburger-inner {
            top: 2px
        }

        .hamburger.hamburger--lg .hamburger-inner:before {
            top: 10px
        }

        .hamburger.hamburger--lg .hamburger-inner:after {
            top: 20px
        }

        .hamburger.hamburger--slider.hamburger--lg.is-active .hamburger-inner:after {
            transform: translate3d(0, -20px, 0) rotate(-90deg)
        }

        .hamburger.hamburger--slider.hamburger--lg.is-active .hamburger-inner {
            transform: translate3d(0, 10px, 0) rotate(45deg)
        }

        .hamburger.hamburger--rounded .hamburger-box, .hamburger.hamburger--rounded .hamburger-inner, .hamburger.hamburger--rounded .hamburger-inner::after, .hamburger.hamburger--rounded .hamburger-inner::before {
            height: 3px;
            border-radius: 1px;
            width: 23px
        }

        .hamburger.hamburger--rounded .hamburger-box {
            height: 17px
        }

        .hamburger.hamburger--rounded .hamburger-inner {
            top: 1px
        }

        .hamburger.hamburger--rounded .hamburger-inner:before {
            top: 9px
        }

        .hamburger.hamburger--rounded .hamburger-inner:after {
            top: 18px
        }

        .hamburger.hamburger--slider.hamburger--rounded.is-active .hamburger-inner:after {
            transform: translate3d(0, -18px, 0) rotate(-90deg)
        }

        .hamburger.hamburger--slider.hamburger--rounded.is-active .hamburger-inner {
            transform: translate3d(0, 9px, 0) rotate(45deg)
        }</style>
    <style type="text/css">/*!
 *  Font Awesome 4.7.0 by @davegandy - http://fontawesome.io - @fontawesome
 *  License - http://fontawesome.io/license (Font: SIL OFL 1.1, CSS: MIT License)
 */
        @font-face {
            font-family: 'FontAwesome';
            src: url('/bitrix/templates/landing24/assets/vendor/icon/fa/font.woff2') format('woff2'), url('/bitrix/templates/landing24/assets/vendor/icon/fa/font.woff') format('woff');
            font-weight: normal;
            font-style: normal
        }

        .fa {
            display: inline-block;
            font: normal normal normal 14px/1 FontAwesome;
            font-size: inherit;
            text-rendering: auto;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }

        .fa-lg {
            font-size: 1.33333333em;
            line-height: .75em;
            vertical-align: -15%
        }

        .fa-2x {
            font-size: 2em
        }

        .fa-3x {
            font-size: 3em
        }

        .fa-4x {
            font-size: 4em
        }

        .fa-5x {
            font-size: 5em
        }

        .fa-fw {
            width: 1.28571429em;
            text-align: center
        }

        .fa-ul {
            padding-left: 0;
            margin-left: 2.14285714em;
            list-style-type: none
        }

        .fa-ul > li {
            position: relative
        }

        .fa-li {
            position: absolute;
            left: -2.14285714em;
            width: 2.14285714em;
            top: .14285714em;
            text-align: center
        }

        .fa-li.fa-lg {
            left: -1.85714286em
        }

        .fa-border {
            padding: .2em .25em .15em;
            border: solid .08em #eee;
            border-radius: .1em
        }

        .fa-pull-left {
            float: left
        }

        .fa-pull-right {
            float: right
        }

        .fa.fa-pull-left {
            margin-right: .3em
        }

        .fa.fa-pull-right {
            margin-left: .3em
        }

        .pull-right {
            float: right
        }

        .pull-left {
            float: left
        }

        .fa.pull-left {
            margin-right: .3em
        }

        .fa.pull-right {
            margin-left: .3em
        }

        .fa-spin {
            -webkit-animation: fa-spin 2s infinite linear;
            animation: fa-spin 2s infinite linear
        }

        .fa-pulse {
            -webkit-animation: fa-spin 1s infinite steps(8);
            animation: fa-spin 1s infinite steps(8)
        }

        @-webkit-keyframes fa-spin {

        0
        {
            -webkit-transform: rotate(0)
        ;
            transform: rotate(0)
        }
        100
        %
        {
            -webkit-transform: rotate(359deg)
        ;
            transform: rotate(359deg)
        }
        }
        @keyframes fa-spin {

        0
        {
            -webkit-transform: rotate(0)
        ;
            transform: rotate(0)
        }
        100
        %
        {
            -webkit-transform: rotate(359deg)
        ;
            transform: rotate(359deg)
        }
        }
        .fa-rotate-90 {
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=1)";
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            transform: rotate(90deg)
        }

        .fa-rotate-180 {
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2)";
            -webkit-transform: rotate(180deg);
            -ms-transform: rotate(180deg);
            transform: rotate(180deg)
        }

        .fa-rotate-270 {
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=3)";
            -webkit-transform: rotate(270deg);
            -ms-transform: rotate(270deg);
            transform: rotate(270deg)
        }

        .fa-flip-horizontal {
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=0, mirror=1)";
            -webkit-transform: scale(-1, 1);
            -ms-transform: scale(-1, 1);
            transform: scale(-1, 1)
        }

        .fa-flip-vertical {
            -ms-filter: "progid:DXImageTransform.Microsoft.BasicImage(rotation=2, mirror=1)";
            -webkit-transform: scale(1, -1);
            -ms-transform: scale(1, -1);
            transform: scale(1, -1)
        }

        :root .fa-rotate-90, :root .fa-rotate-180, :root .fa-rotate-270, :root .fa-flip-horizontal, :root .fa-flip-vertical {
            filter: none
        }

        .fa-stack {
            position: relative;
            display: inline-block;
            width: 2em;
            height: 2em;
            line-height: 2em;
            vertical-align: middle
        }

        .fa-stack-1x, .fa-stack-2x {
            position: absolute;
            left: 0;
            width: 100%;
            text-align: center
        }

        .fa-stack-1x {
            line-height: inherit
        }

        .fa-stack-2x {
            font-size: 2em
        }

        .fa-inverse {
            color: #fff
        }

        .sr-only {
            position: absolute;
            width: 1px;
            height: 1px;
            padding: 0;
            margin: -1px;
            overflow: hidden;
            clip: rect(0, 0, 0, 0);
            border: 0
        }

        .sr-only-focusable:active, .sr-only-focusable:focus {
            position: static;
            width: auto;
            height: auto;
            margin: 0;
            overflow: visible;
            clip: auto
        }</style>
    <style type="text/css">@font-face {
            font-family: 'simple-line-icons';
            src: url('/bitrix/templates/landing24/assets/vendor/icon/icon/font.woff2') format('woff2'), url('/bitrix/templates/landing24/assets/vendor/icon/icon/font.woff') format('woff');
            font-weight: normal;
            font-style: normal
        }

        .icon-user, .icon-people, .icon-user-female, .icon-user-follow, .icon-user-following, .icon-user-unfollow, .icon-login, .icon-logout, .icon-emotsmile, .icon-phone, .icon-call-end, .icon-call-in, .icon-call-out, .icon-map, .icon-location-pin, .icon-direction, .icon-directions, .icon-compass, .icon-layers, .icon-menu, .icon-list, .icon-options-vertical, .icon-options, .icon-arrow-down, .icon-arrow-left, .icon-arrow-right, .icon-arrow-up, .icon-arrow-up-circle, .icon-arrow-left-circle, .icon-arrow-right-circle, .icon-arrow-down-circle, .icon-check, .icon-clock, .icon-plus, .icon-minus, .icon-close, .icon-event, .icon-exclamation, .icon-organization, .icon-trophy, .icon-screen-smartphone, .icon-screen-desktop, .icon-plane, .icon-notebook, .icon-mustache, .icon-mouse, .icon-magnet, .icon-energy, .icon-disc, .icon-cursor, .icon-cursor-move, .icon-crop, .icon-chemistry, .icon-speedometer, .icon-shield, .icon-screen-tablet, .icon-magic-wand, .icon-hourglass, .icon-graduation, .icon-ghost, .icon-game-controller, .icon-fire, .icon-eyeglass, .icon-envelope-open, .icon-envelope-letter, .icon-bell, .icon-badge, .icon-anchor, .icon-wallet, .icon-vector, .icon-speech, .icon-puzzle, .icon-printer, .icon-present, .icon-playlist, .icon-pin, .icon-picture, .icon-handbag, .icon-globe-alt, .icon-globe, .icon-folder-alt, .icon-folder, .icon-film, .icon-feed, .icon-drop, .icon-drawer, .icon-docs, .icon-doc, .icon-diamond, .icon-cup, .icon-calculator, .icon-bubbles, .icon-briefcase, .icon-book-open, .icon-basket-loaded, .icon-basket, .icon-bag, .icon-action-undo, .icon-action-redo, .icon-wrench, .icon-umbrella, .icon-trash, .icon-tag, .icon-support, .icon-frame, .icon-size-fullscreen, .icon-size-actual, .icon-shuffle, .icon-share-alt, .icon-share, .icon-rocket, .icon-question, .icon-pie-chart, .icon-pencil, .icon-note, .icon-loop, .icon-home, .icon-grid, .icon-graph, .icon-microphone, .icon-music-tone-alt, .icon-music-tone, .icon-earphones-alt, .icon-earphones, .icon-equalizer, .icon-like, .icon-dislike, .icon-control-start, .icon-control-rewind, .icon-control-play, .icon-control-pause, .icon-control-forward, .icon-control-end, .icon-volume-1, .icon-volume-2, .icon-volume-off, .icon-calendar, .icon-bulb, .icon-chart, .icon-ban, .icon-bubble, .icon-camrecorder, .icon-camera, .icon-cloud-download, .icon-cloud-upload, .icon-envelope, .icon-eye, .icon-flag, .icon-heart, .icon-info, .icon-key, .icon-link, .icon-lock, .icon-lock-open, .icon-magnifier, .icon-magnifier-add, .icon-magnifier-remove, .icon-paper-clip, .icon-paper-plane, .icon-power, .icon-refresh, .icon-reload, .icon-settings, .icon-star, .icon-symbol-female, .icon-symbol-male, .icon-target, .icon-credit-card, .icon-paypal, .icon-social-tumblr, .icon-social-twitter, .icon-social-facebook, .icon-social-instagram, .icon-social-linkedin, .icon-social-pinterest, .icon-social-github, .icon-social-google, .icon-social-reddit, .icon-social-skype, .icon-social-dribbble, .icon-social-behance, .icon-social-foursqare, .icon-social-soundcloud, .icon-social-spotify, .icon-social-stumbleupon, .icon-social-youtube, .icon-social-dropbox, .icon-social-vkontakte, .icon-social-steam {
            font-family: 'simple-line-icons';
            speak: none;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            line-height: 1;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale
        }</style>
    <style type="text/css">@charset "UTF-8";
        body.fancybox-active {
            overflow: hidden
        }

        body.fancybox-iosfix {
            position: fixed;
            left: 0;
            right: 0
        }

        .fancybox-is-hidden {
            position: absolute;
            top: -9999px;
            left: -9999px;
            visibility: hidden
        }

        .fancybox-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 99992;
            -webkit-tap-highlight-color: transparent;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol"
        }

        .fancybox-outer, .fancybox-inner, .fancybox-bg, .fancybox-stage {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0
        }

        .fancybox-outer {
            overflow-y: auto;
            -webkit-overflow-scrolling: touch
        }

        .fancybox-bg {
            background: #1e1e1e;
            opacity: 0;
            transition-duration: inherit;
            transition-property: opacity;
            transition-timing-function: cubic-bezier(0.47, 0, 0.74, 0.71)
        }

        .fancybox-is-open .fancybox-bg {
            opacity: .87;
            transition-timing-function: cubic-bezier(0.22, 0.61, 0.36, 1)
        }

        .fancybox-infobar, .fancybox-toolbar, .fancybox-caption-wrap {
            position: absolute;
            direction: ltr;
            z-index: 99997;
            opacity: 0;
            visibility: hidden;
            transition: opacity .25s, visibility 0s linear .25s;
            box-sizing: border-box
        }

        .fancybox-show-infobar .fancybox-infobar, .fancybox-show-toolbar .fancybox-toolbar, .fancybox-show-caption .fancybox-caption-wrap {
            opacity: 1;
            visibility: visible;
            transition: opacity .25s, visibility 0s
        }

        .fancybox-infobar {
            top: 0;
            left: 0;
            font-size: 13px;
            padding: 0 10px;
            height: 44px;
            min-width: 44px;
            line-height: 44px;
            color: #ccc;
            text-align: center;
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-touch-callout: none;
            -webkit-tap-highlight-color: transparent;
            -webkit-font-smoothing: subpixel-antialiased;
            mix-blend-mode: exclusion
        }

        .fancybox-toolbar {
            top: 0;
            right: 0;
            margin: 0;
            padding: 0
        }

        .fancybox-stage {
            overflow: hidden;
            direction: ltr;
            z-index: 99994;
            -webkit-transform: translate3d(0, 0, 0)
        }

        .fancybox-is-closing .fancybox-stage {
            overflow: visible
        }

        .fancybox-slide {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow: auto;
            outline: 0;
            white-space: normal;
            box-sizing: border-box;
            text-align: center;
            z-index: 99994;
            -webkit-overflow-scrolling: touch;
            display: none;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            transition-property: opacity, -webkit-transform;
            transition-property: transform, opacity;
            transition-property: transform, opacity, -webkit-transform
        }

        .fancybox-slide::before {
            content: '';
            display: inline-block;
            vertical-align: middle;
            height: 100%;
            width: 0
        }

        .fancybox-is-sliding .fancybox-slide, .fancybox-slide--previous, .fancybox-slide--current, .fancybox-slide--next {
            display: block
        }

        .fancybox-slide--image {
            overflow: visible
        }

        .fancybox-slide--image::before {
            display: none
        }

        .fancybox-slide--video .fancybox-content, .fancybox-slide--video iframe {
            background: #000
        }

        .fancybox-slide--map .fancybox-content, .fancybox-slide--map iframe {
            background: #e5e3df
        }

        .fancybox-slide--next {
            z-index: 99995
        }

        .fancybox-slide > * {
            display: inline-block;
            position: relative;
            padding: 24px;
            margin: 44px 0 44px;
            border-width: 0;
            vertical-align: middle;
            text-align: left;
            background-color: #fff;
            overflow: auto;
            box-sizing: border-box
        }

        .fancybox-slide > title, .fancybox-slide > style, .fancybox-slide > meta, .fancybox-slide > link, .fancybox-slide > script, .fancybox-slide > base {
            display: none
        }

        .fancybox-slide .fancybox-image-wrap {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            padding: 0;
            border: 0;
            z-index: 99995;
            background: transparent;
            cursor: default;
            overflow: visible;
            -webkit-transform-origin: top left;
            -ms-transform-origin: top left;
            transform-origin: top left;
            background-size: 100% 100%;
            background-repeat: no-repeat;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            transition-property: opacity, -webkit-transform;
            transition-property: transform, opacity;
            transition-property: transform, opacity, -webkit-transform
        }

        .fancybox-can-zoomOut .fancybox-image-wrap {
            cursor: -webkit-zoom-out;
            cursor: zoom-out
        }

        .fancybox-can-zoomIn .fancybox-image-wrap {
            cursor: -webkit-zoom-in;
            cursor: zoom-in
        }

        .fancybox-can-drag .fancybox-image-wrap {
            cursor: -webkit-grab;
            cursor: grab
        }

        .fancybox-is-dragging .fancybox-image-wrap {
            cursor: -webkit-grabbing;
            cursor: grabbing
        }

        .fancybox-image, .fancybox-spaceball {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            border: 0;
            max-width: none;
            max-height: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .fancybox-spaceball {
            z-index: 1
        }

        .fancybox-slide--iframe .fancybox-content {
            padding: 0;
            width: 80%;
            height: 80%;
            max-width: calc(100% - 100px);
            max-height: calc(100% - 88px);
            overflow: visible;
            background: #fff
        }

        .fancybox-iframe {
            display: block;
            margin: 0;
            padding: 0;
            border: 0;
            width: 100%;
            height: 100%;
            background: #fff
        }

        .fancybox-error {
            margin: 0;
            padding: 40px;
            width: 100%;
            max-width: 380px;
            background: #fff;
            cursor: default
        }

        .fancybox-error p {
            margin: 0;
            padding: 0;
            color: #444;
            font-size: 16px;
            line-height: 20px
        }

        .fancybox-button {
            box-sizing: border-box;
            display: inline-block;
            vertical-align: top;
            width: 44px;
            height: 44px;
            margin: 0;
            padding: 10px;
            border: 0;
            border-radius: 0;
            background: rgba(30, 30, 30, 0.6);
            transition: color .3s ease;
            cursor: pointer;
            outline: 0
        }

        .fancybox-button, .fancybox-button:visited, .fancybox-button:link {
            color: #ccc
        }

        .fancybox-button:focus, .fancybox-button:hover {
            color: #fff
        }

        .fancybox-button[disabled] {
            color: #ccc;
            cursor: default;
            opacity: .6
        }

        .fancybox-button svg {
            display: block;
            position: relative;
            overflow: visible;
            shape-rendering: geometricPrecision
        }

        .fancybox-button svg path {
            fill: currentColor;
            stroke: currentColor;
            stroke-linejoin: round;
            stroke-width: 3
        }

        .fancybox-button--share svg path {
            stroke-width: 1
        }

        .fancybox-button--play svg path:nth-child(2) {
            display: none
        }

        .fancybox-button--pause svg path:nth-child(1) {
            display: none
        }

        .fancybox-button--zoom svg path {
            fill: transparent
        }

        .fancybox-navigation {
            display: none
        }

        .fancybox-show-nav .fancybox-navigation {
            display: block
        }

        .fancybox-navigation button {
            position: absolute;
            top: 50%;
            margin: -50px 0 0 0;
            z-index: 99997;
            background: transparent;
            width: 60px;
            height: 100px;
            padding: 17px
        }

        .fancybox-navigation button:before {
            content: "";
            position: absolute;
            top: 30px;
            right: 10px;
            width: 40px;
            height: 40px;
            background: rgba(30, 30, 30, 0.6)
        }

        .fancybox-navigation .fancybox-button--arrow_left {
            left: 0
        }

        .fancybox-navigation .fancybox-button--arrow_right {
            right: 0
        }

        .fancybox-close-small {
            position: absolute;
            top: 0;
            right: 0;
            width: 44px;
            height: 44px;
            padding: 0;
            margin: 0;
            border: 0;
            border-radius: 0;
            background: transparent;
            z-index: 10;
            cursor: pointer
        }

        .fancybox-close-small:after {
            content: '×';
            position: absolute;
            top: 5px;
            right: 5px;
            width: 30px;
            height: 30px;
            font: 20px/30px Arial, "Helvetica Neue", Helvetica, sans-serif;
            color: #888;
            font-weight: 300;
            text-align: center;
            border-radius: 50%;
            border-width: 0;
            background-color: transparent;
            transition: background-color .25s;
            box-sizing: border-box;
            z-index: 2
        }

        .fancybox-close-small:focus {
            outline: 0
        }

        .fancybox-close-small:focus:after {
            outline: 1px dotted #888
        }

        .fancybox-close-small:hover:after {
            color: #555;
            background: #eee
        }

        .fancybox-slide--image .fancybox-close-small, .fancybox-slide--iframe .fancybox-close-small {
            top: 0;
            right: -44px
        }

        .fancybox-slide--image .fancybox-close-small:after, .fancybox-slide--iframe .fancybox-close-small:after {
            font-size: 35px;
            color: #aaa
        }

        .fancybox-slide--image .fancybox-close-small:hover:after, .fancybox-slide--iframe .fancybox-close-small:hover:after {
            color: #fff;
            background: transparent
        }

        .fancybox-is-scaling .fancybox-close-small, .fancybox-is-zoomable.fancybox-can-drag .fancybox-close-small {
            display: none
        }

        .fancybox-caption-wrap {
            bottom: 0;
            left: 0;
            right: 0;
            padding: 60px 2vw 0 2vw;
            background: linear-gradient(to bottom, transparent 0, rgba(0, 0, 0, 0.1) 20%, rgba(0, 0, 0, 0.2) 40%, rgba(0, 0, 0, 0.6) 80%, rgba(0, 0, 0, 0.8) 100%);
            pointer-events: none
        }

        .fancybox-caption {
            padding: 30px 0;
            border-top: 1px solid rgba(255, 255, 255, 0.4);
            font-size: 14px;
            color: #fff;
            line-height: 20px;
            -webkit-text-size-adjust: none
        }

        .fancybox-caption a, .fancybox-caption button, .fancybox-caption select {
            pointer-events: all;
            position: relative
        }

        .fancybox-caption a {
            color: #fff;
            text-decoration: underline
        }

        .fancybox-slide > .fancybox-loading {
            border: 6px solid rgba(100, 100, 100, 0.4);
            border-top: 6px solid rgba(255, 255, 255, 0.6);
            border-radius: 100%;
            height: 50px;
            width: 50px;
            -webkit-animation: fancybox-rotate .8s infinite linear;
            animation: fancybox-rotate .8s infinite linear;
            background: transparent;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -30px;
            margin-left: -30px;
            z-index: 99999
        }

        @-webkit-keyframes fancybox-rotate {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg)
            }
        }

        @keyframes fancybox-rotate {
            from {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(359deg);
                transform: rotate(359deg)
            }
        }

        .fancybox-animated {
            transition-timing-function: cubic-bezier(0, 0, 0.25, 1)
        }

        .fancybox-fx-slide.fancybox-slide--previous {
            -webkit-transform: translate3d(-100%, 0, 0);
            transform: translate3d(-100%, 0, 0);
            opacity: 0
        }

        .fancybox-fx-slide.fancybox-slide--next {
            -webkit-transform: translate3d(100%, 0, 0);
            transform: translate3d(100%, 0, 0);
            opacity: 0
        }

        .fancybox-fx-slide.fancybox-slide--current {
            -webkit-transform: translate3d(0, 0, 0);
            transform: translate3d(0, 0, 0);
            opacity: 1
        }

        .fancybox-fx-fade.fancybox-slide--previous, .fancybox-fx-fade.fancybox-slide--next {
            opacity: 0;
            transition-timing-function: cubic-bezier(0.19, 1, 0.22, 1)
        }

        .fancybox-fx-fade.fancybox-slide--current {
            opacity: 1
        }

        .fancybox-fx-zoom-in-out.fancybox-slide--previous {
            -webkit-transform: scale3d(1.5, 1.5, 1.5);
            transform: scale3d(1.5, 1.5, 1.5);
            opacity: 0
        }

        .fancybox-fx-zoom-in-out.fancybox-slide--next {
            -webkit-transform: scale3d(0.5, 0.5, 0.5);
            transform: scale3d(0.5, 0.5, 0.5);
            opacity: 0
        }

        .fancybox-fx-zoom-in-out.fancybox-slide--current {
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            opacity: 1
        }

        .fancybox-fx-rotate.fancybox-slide--previous {
            -webkit-transform: rotate(-360deg);
            -ms-transform: rotate(-360deg);
            transform: rotate(-360deg);
            opacity: 0
        }

        .fancybox-fx-rotate.fancybox-slide--next {
            -webkit-transform: rotate(360deg);
            -ms-transform: rotate(360deg);
            transform: rotate(360deg);
            opacity: 0
        }

        .fancybox-fx-rotate.fancybox-slide--current {
            -webkit-transform: rotate(0deg);
            -ms-transform: rotate(0deg);
            transform: rotate(0deg);
            opacity: 1
        }

        .fancybox-fx-circular.fancybox-slide--previous {
            -webkit-transform: scale3d(0, 0, 0) translate3d(-100%, 0, 0);
            transform: scale3d(0, 0, 0) translate3d(-100%, 0, 0);
            opacity: 0
        }

        .fancybox-fx-circular.fancybox-slide--next {
            -webkit-transform: scale3d(0, 0, 0) translate3d(100%, 0, 0);
            transform: scale3d(0, 0, 0) translate3d(100%, 0, 0);
            opacity: 0
        }

        .fancybox-fx-circular.fancybox-slide--current {
            -webkit-transform: scale3d(1, 1, 1) translate3d(0, 0, 0);
            transform: scale3d(1, 1, 1) translate3d(0, 0, 0);
            opacity: 1
        }

        .fancybox-fx-tube.fancybox-slide--previous {
            -webkit-transform: translate3d(-100%, 0, 0) scale(0.1) skew(-10deg);
            transform: translate3d(-100%, 0, 0) scale(0.1) skew(-10deg)
        }

        .fancybox-fx-tube.fancybox-slide--next {
            -webkit-transform: translate3d(100%, 0, 0) scale(0.1) skew(10deg);
            transform: translate3d(100%, 0, 0) scale(0.1) skew(10deg)
        }

        .fancybox-fx-tube.fancybox-slide--current {
            -webkit-transform: translate3d(0, 0, 0) scale(1);
            transform: translate3d(0, 0, 0) scale(1)
        }

        .fancybox-share {
            padding: 30px;
            border-radius: 3px;
            background: #f4f4f4;
            max-width: 90%
        }

        .fancybox-share h1 {
            color: #222;
            margin: 0 0 20px 0;
            font-size: 33px;
            font-weight: 700;
            text-align: center
        }

        .fancybox-share p {
            margin: 0;
            padding: 0;
            text-align: center
        }

        .fancybox-share p:first-of-type {
            margin-right: -10px
        }

        .fancybox-share_button {
            display: inline-block;
            text-decoration: none;
            margin: 0 10px 10px 0;
            padding: 10px 20px;
            border: 0;
            border-radius: 3px;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.16);
            background: #fff;
            white-space: nowrap;
            font-size: 16px;
            line-height: 23px;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            min-width: 140px;
            color: #707070;
            transition: all .2s
        }

        .fancybox-share_button:focus, .fancybox-share_button:hover {
            text-decoration: none;
            color: #333;
            box-shadow: 0 2px 2px 0 rgba(0, 0, 0, 0.3)
        }

        .fancybox-share_button svg {
            margin-right: 5px;
            width: 20px;
            height: 20px;
            vertical-align: text-bottom
        }

        .fancybox-share input {
            box-sizing: border-box;
            width: 100%;
            margin: 5px 0 0 0;
            padding: 10px 15px;
            border: 1px solid #d7d7d7;
            border-radius: 3px;
            background: #ebebeb;
            color: #5d5b5b;
            font-size: 14px;
            outline: 0
        }

        .fancybox-thumbs {
            display: none;
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            width: 212px;
            margin: 0;
            padding: 2px 2px 4px 2px;
            background: #fff;
            -webkit-tap-highlight-color: transparent;
            -webkit-overflow-scrolling: touch;
            -ms-overflow-style: -ms-autohiding-scrollbar;
            box-sizing: border-box;
            z-index: 99995
        }

        .fancybox-thumbs-x {
            overflow-y: hidden;
            overflow-x: auto
        }

        .fancybox-show-thumbs .fancybox-thumbs {
            display: block
        }

        .fancybox-show-thumbs .fancybox-inner {
            right: 212px
        }

        .fancybox-thumbs > ul {
            list-style: none;
            position: absolute;
            position: relative;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            overflow-x: hidden;
            overflow-y: auto;
            font-size: 0;
            white-space: nowrap
        }

        .fancybox-thumbs-x > ul {
            overflow: hidden
        }

        .fancybox-thumbs-y > ul::-webkit-scrollbar {
            width: 7px
        }

        .fancybox-thumbs-y > ul::-webkit-scrollbar-track {
            background: #fff;
            border-radius: 10px;
            box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3)
        }

        .fancybox-thumbs-y > ul::-webkit-scrollbar-thumb {
            background: #2a2a2a;
            border-radius: 10px
        }

        .fancybox-thumbs > ul > li {
            float: left;
            overflow: hidden;
            padding: 0;
            margin: 2px;
            width: 100px;
            height: 75px;
            max-width: calc(50% - 4px);
            max-height: calc(100% - 8px);
            position: relative;
            cursor: pointer;
            outline: 0;
            -webkit-tap-highlight-color: transparent;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            box-sizing: border-box
        }

        li.fancybox-thumbs-loading {
            background: rgba(0, 0, 0, 0.1)
        }

        .fancybox-thumbs > ul > li > img {
            position: absolute;
            top: 0;
            left: 0;
            max-width: none;
            max-height: none;
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }

        .fancybox-thumbs > ul > li:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            border: 4px solid #4ea7f9;
            z-index: 99991;
            opacity: 0;
            transition: all .2s cubic-bezier(0.25, 0.46, 0.45, 0.94)
        }

        .fancybox-thumbs > ul > li.fancybox-thumbs-active:before {
            opacity: 1
        }

        @media all and (max-width: 800px) {
            .fancybox-thumbs {
                width: 110px
            }

            .fancybox-show-thumbs .fancybox-inner {
                right: 110px
            }

            .fancybox-thumbs > ul > li {
                max-width: calc(100% - 10px)
            }
        }</style>


    <!--    тест-->
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
            }
            else if (/Android/i.test(ua)) {
                cl += " bx-android";
            }

            cl += (/(ipad|iphone|android|mobile|touch)/i.test(ua) ? " bx-touch" : " bx-no-touch");

            cl += w.devicePixelRatio && w.devicePixelRatio >= 2
                ? " bx-retina"
                : " bx-no-retina";

            var ieVersion = -1;
            if (/AppleWebKit/.test(ua)) {
                cl += " bx-chrome";
            }
            else if ((ieVersion = getIeVersion()) > 0) {
                cl += " bx-ie bx-ie" + ieVersion;
                if (ieVersion > 7 && ieVersion < 10 && !isDoctype()) {
                    cl += " bx-quirks";
                }
            }
            else if (/Opera/.test(ua)) {
                cl += " bx-opera";
            }
            else if (/Gecko/.test(ua)) {
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
                }
                else if (!!d.documentMode && d.documentMode >= 10) {
                    rv = 10;
                }
                else if (!!d.documentMode && d.documentMode >= 9) {
                    rv = 9;
                }
                else if (d.attachEvent && !/Opera/.test(ua)) {
                    rv = 8;
                }

                if (rv == -1 || rv == 8) {
                    var re;
                    if (n.appName == "Microsoft Internet Explorer") {
                        re = new RegExp("MSIE ([0-9]+[\.0-9]*)");
                        if (re.exec(ua) != null) {
                            rv = parseFloat(RegExp.$1);
                        }
                    }
                    else if (n.appName == "Netscape") {
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

    <meta name="robots" content="all"/>
    <link rel="preload" href="/bitrix/templates/landing24/assets/vendor/icon/fa/font.woff" as="font"
          crossorigin="anonymous" type="font/woff" crossorigin>
    <link rel="preload" href="/bitrix/templates/landing24/assets/vendor/icon/fa/font.woff2" as="font"
          crossorigin="anonymous" type="font/woff2" crossorigin>
    <style>.fa-clock-o:before {
            content: "\f017";
        }

        .fa-group:before {
            content: "\f0c0";
        }

        .fa-dashboard:before {
            content: "\f0e4";
        }</style>
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
            font-weight:;
        }

        .h1, .h2, .h3, .h4, .h5, .h6, .h7,
        h1, h2, h3, h4, h5, h6 {
            font-weight:;
        }
    </style>
    <style>
        hr {
            border: 0!important;
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

                #b7224 img {
                    width: 80%;
                    max-width: 150px;
                }

                #b7224 .landing-block-node-containerimg img {
                    width: 70% !important;
                    max-width: 70% !important;
                }

                #b7224 .container {
                    background-image: url('/bitrix/templates/landing/header_background.jpg');
                    /*https://cdn-ru.bitrix24.ru/b1445091/landing/922/9224d8f6c45472b729419af0b0405ccd/no-problem-concept-300_1x.jpg*/
                    background-repeat: no-repeat;
                    background-position: bottom right;
                    background-size: contain;
                    padding-top: 4rem;
                    padding-bottom: 2rem;
                    min-height: 300px;
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

                #b7224 img {
                    /*background-color:  var(--theme-color-primary) !important;*/
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

                #b7550 {
                    /*margin-bottom: 2rem;*/
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

                #b7114 .landing-block-node-card:nth-child(2) {
                    /*background-color: var(--theme-color-primary)!important;*/
                    background-color: #EB7D00 !important;
                    color: #fff !important;
                }

                #b7114 .landing-block-node-card:nth-child(2) .fa,
                #b7114 .landing-block-node-card:nth-child(2) .landing-block-node-card-number,
                #b7114 .landing-block-node-card:nth-child(2) .landing-block-node-card-number-title {
                    color: #fff !important;
                }

                .video-container {
                    position: relative;
                    padding-bottom: 56.25%;
                    padding-top: 30px;
                    height: 0;
                    overflow: hidden;
                    margin-bottom: 1em;
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
                        <img class="landing-block-node-img js-animation slideInLeft img-fluid"
                             src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMDAiIGhlaWdodD0iMzE2Ij48cmVjdCBpZD0iYmFja2dyb3VuZHJlY3QiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHg9IjAiIHk9IjAiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iLjciIHN0cm9rZT0ibm9uZSIvPjwvc3ZnPg=="
                             alt="" data-fileid="1035510" data-fileid2x="1035508"
                             data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:false}"
                             data-lazy-img="Y"
                             data-src="https://cdn-ru.bitrix24.ru/b1445091/landing/c16/c16672c84f0ce173ca44bb3ccdfd41e4/no-problem-concept-300_1x.jpg"
                             loading="lazy"
                             data-srcset="https://cdn-ru.bitrix24.ru/b1445091/landing/34d/34d776e82fd492983a394c17d1520886/no-problem-concept-300_2x.jpg 2x"/>
                    </div>

                    <div
                        class="landing-block-node-text-container js-animation slideInRight col-md-6 col-lg-6 g-pb-20 g-pb-0--md order-1 order-md-2">
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

        <div class="container">
            <div class="row landing-block-node-block align-items-center">
                <div class="col-md-6 col-lg-6 order-2 order-md-1">
                    <img class="landing-block-node-img js-animation img-fluid animation-none animated"
                         src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1NDAiIGhlaWdodD0iNTQwIj48cmVjdCBpZD0iYmFja2dyb3VuZHJlY3QiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHg9IjAiIHk9IjAiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iLjciIHN0cm9rZT0ibm9uZSIvPjwvc3ZnPg=="
                         alt="" data-fileid="1032646" data-fileid2x="1032648"
                         data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;/&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:true}"
                         data-lazy-img="Y"
                         data-src="https://cdn-ru.bitrix24.ru/b1445091/landing/c9b/c9b57e1d83e2fbb4cc53f2a2673bd156/log-mozg-1-2_1x.jpg"
                         loading="lazy"
                         data-srcset="https://cdn-ru.bitrix24.ru/b1445091/landing/134/134194352e4ac785e6899b259b7e6592/log-mozg-1-2_2x.jpg 2x"/>
                </div>

                <div
                    class="landing-block-node-text-container js-animation col-md-6 col-lg-6 g-pb-20 g-pb-0--md order-1 order-md-2 animation-none animated">
                    <h2 class="landing-block-node-title landing-semantic-subtitle-medium mb-0 g-mb-15 g-color-primary g-font-weight-300 g-text-transform-none g-font-size-20">
                        <a href="/" target="_self">Test-personal.com</a> <span
                            style="font-weight: normal;color: rgb(191, 54, 12);">Система тестирования персонала</span>
                    </h2>

                    <div
                        class="landing-block-node-text landing-semantic-text-medium g-color-primary g-font-open-sans g-font-weight-300 g-font-size-30 text-uppercase">
                        <p><span style="color: rgb(97, 97, 97);">Выбирайте сотрудника с умом</span></p></div>
                    <div class="landing-block-node-containerimg g-pointer-events-all text-center">
                        <img class="landing-block-node-img-8088 img-fluid"
                             src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4MDAiIGhlaWdodD0iMzAwIj48cmVjdCBpZD0iYmFja2dyb3VuZHJlY3QiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHg9IjAiIHk9IjAiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iLjciIHN0cm9rZT0ibm9uZSIvPjwvc3ZnPg=="
                             alt="" data-fileid="1035060" data-fileid2x="1035058"
                             data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:false}"
                             data-lazy-img="Y"
                             data-src="https://cdn-ru.bitrix24.ru/b1445091/landing/c03/c039291076de128b3cf094a2c523828c/lupa-1_1x.png"
                             loading="lazy"
                             data-srcset="https://cdn-ru.bitrix24.ru/b1445091/landing/ad9/ad90891f3e9d830725ce7b241c957ece/lupa-1_2x.png 2x"/>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="b7550" class="block-wrapper block-0-menu-21-wo-logo">
        <header
            class="landing-block u-header u-header--static u-header--relative landing-block-menu-store landing-semantic-background-color w-100 g-pt-25 g-pb-25 g-bg-bluegray-opacity-0_7">
            <nav
                class="g-pa-0 g-mb-0 navbar navbar-expand-lg g-brd-0 u-navbar-color-white u-navbar-color-gray-light-v4--hover u-navbar-align-left">
                <div style="margin-left: auto; margin-right: auto;">
                    <div class="collapse navbar-collapse align-items-center flex-sm-row" id="navBar7550">
                        <ul class="landing-block-node-menu-list js-scroll-nav navbar-nav text-uppercase g-font-weight-700 g-font-size-12 g-pt-20 g-pt-0--lg ml-auto">
                            <li class="landing-block-node-menu-list-item nav-item g-mr-20--lg g-ml-10 g-ml-0--lg g-mb-7 g-mb-0--lg">
                                <a href="/#b7592"
                                   class="landing-block-node-menu-list-item-link landing-semantic-menu-h-text nav-link p-0 g-font-size-18 g-font-weight-400"
                                   target="_self">О тестировании</a>
                            </li>
                            <li class="landing-block-node-menu-list-item nav-item g-mr-20--lg g-ml-10 g-ml-0--lg g-mb-7 g-mb-0--lg">
                                <a href="/#b7058"
                                   class="landing-block-node-menu-list-item-link landing-semantic-menu-h-text nav-link p-0 g-font-size-18 g-font-weight-400"
                                   target="_self">Как это работает</a>
                            </li>

                            <li class="landing-block-node-menu-list-item nav-item g-mr-20--lg g-ml-10 g-ml-0--lg g-mb-7 g-mb-0--lg">
                                <a href="/user/example/"
                                   class="landing-block-node-menu-list-item-link landing-semantic-menu-h-text nav-link p-0 g-font-size-18 g-font-weight-400"
                                   target="_self">Личный кабинет</a>
                            </li>

                        </ul>
                    </div>
                    <!-- Responsive Toggle Button -->
                    <button class="navbar-toggler btn g-line-height-1 g-brd-none g-pa-10 g-pr-20 ml-auto" type="button"
                            aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar7550"
                            data-toggle="collapse" data-target="#navBar7550">
                            <span class="hamburger hamburger--slider">
                              <span class="hamburger-box">
                                <span class="hamburger-inner">

                                </span>
                              </span>
                            </span>
                    </button>
                    <!-- End Responsive Toggle Button -->
                </div>
            </nav>
        </header>
    </div>
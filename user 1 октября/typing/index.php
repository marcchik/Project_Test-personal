<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Типирование");
?>
<?
if(!CModule::IncludeModule("iblock"))

    return;
?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" type="text/css">







            <div class="col-md-8 col-lg-9 content-container" >

                <section>
                    <div>
                        <main class="w-100 landing-public-mode">

                            <div class="landing-main">
                                <div id="b7250" class="block-wrapper block-html">
                                    <section class="landing-block g-pt-0 g-pb-0 g-pl-0 g-pr-0">
                                        <style>


                                            @media (min-width: 992px) {
                                                #b7250 {
                                                    background: transparent !important;
                                                    background-color: #fff;
                                                    animation-name: none;
                                                    background-repeat: no-repeat !important;
                                                    background-position: top left !important;
                                                }
                                            }

                                            .zate_cont_row > .col-11 {
                                                background: rgba(255, 255, 255, 0.8);
                                            }

                                            #sumza {
                                                display: inline-block;
                                                padding: 0.4rem;
                                                padding-left: 1.6rem;
                                                padding-right: 1.6rem;
                                                border: 1px solid #C4C4C4 !important;
                                                border-radius: 4px;
                                                color: red;
                                                font-size: 1.8rem;
                                                margin-bottom: 1rem;
                                            }

                                            #formZATE button {
                                                display: inline-block;
                                                width: 100% !important;
                                                padding: 0.7rem;
                                                background-color: var(--theme-color-primary) !important;
                                                color: #fff;
                                                border: 0px;
                                                border-radius: 4px !important;
                                                font-weight: 600;
                                            }

                                            .label-soglas {
                                                font-size: 0.9rem;
                                                color: #6A6A6A;
                                            }

                                            .label-all-check {
                                                color: #6A6A6A;
                                            }

                                            .row-check {
                                                margin-bottom: 0.3rem !important;
                                                padding: 5px !important;
                                            }

                                            .col-check {
                                                padding: 1rem !important;
                                                border-radius: 4px;
                                                background-color: rgba(0, 0, 0, 0.07) !important;
                                                border: 1px solid rgba(0, 0, 0, 0.05);
                                            }

                                            .col-check_all {
                                                padding: 1rem !important;
                                                padding-bottom: 0px !important;
                                                border-bottom: 1px solid rgba(0, 0, 0, 0.05);
                                            }

                                            #formZATE .formchepro {
                                                position: relative !important;
                                                margin-left: 0px !important;
                                                margin-right: 1rem !important;
                                            }

                                            #formZATE .form-all-check {
                                                position: relative !important;
                                                margin-left: 0px !important;
                                                margin-right: 1rem !important;
                                            }

                                            #formZATE input.form-control {
                                                font-size: 1.2rem !important;
                                            }

                                            #formZATE .input-group-text {
                                                font-size: 1.2rem !important;
                                            }

                                            #formZATE .zagolov {
                                                padding-top: 1rem;
                                            }

                                            #formZATE .zagolov h3 {
                                                font-size: 1.4rem !important;
                                                color: var(--theme-color-primary) !important;
                                                margin-bottom: 0px;
                                            }

                                            #formZATE .zagolov span,
                                            span.podz {
                                                color: #6A6A6A !important;
                                                font-size: 1rem !important;
                                            }

                                            #formZATE .input-group-text {
                                                width: 8rem !important;
                                            }

                                            #promokod {
                                                margin-top: 0.8rem;
                                            }

                                            #promokod_ar {
                                                display: inline-block;
                                                padding: 0.7rem;
                                                padding-left: 1.2rem !important;
                                                padding-right: 1.2rem !important;
                                                background-color: var(--theme-color-primary) !important;
                                                color: #fff;
                                                border: 0px;
                                                border-radius: 4px !important;
                                                cursor: pointer;
                                            }

                                            #seok {
                                                color: var(--theme-color-primary) !important;
                                                font-size: 2.2rem;
                                            }</style>


                                        <div class="container" id="zate_cont" style="margin-bottom: 4rem;">
                                            <div class="row zate_cont_row d-flex align-items-stretch justify-content-center " style="">
                                                <div class="col-11 col-md-9 col-lg-9 col-xl-8">


                                                    <form id="formZATE" action="/user/typing/spasybo_zakaz.php"
                                                          class="form-horizontal" autocomplete="" method="post" role="form">


                                                        <input type="hidden" id="summazak" name="summazak" value="0">

                                                        <input type="hidden" id="sale" name="sale" value="0">


                                                        <div class="form-row" style="margin-bottom: 0px;">
                                                            <div class="col-12 text-center zagolov">
                                                                <h3>Выберите профессии для проверки на соответствие</h3>
                                                            </div>
                                                        </div>


                                                        <!--                                    <div class="form-row row-check" style="">-->
                                                        <!--                                        <div class="col-12 col-check_all">-->
                                                        <!--                                            <input class="form-check-input form-all-check" type="checkbox" value=""-->
                                                        <!--                                                   id="CheckAll">-->
                                                        <!--                                            <label class="label-all-check" for="CheckAll"> Выбрать все </label>-->
                                                        <!--                                        </div>-->
                                                        <!--                                    </div>-->
                                                        <?

                                                        //прошлое типирование
                                                        CModule::IncludeModule("iblock");
                                                        $valueTyping = "";
                                                        $arSelect = Array("ID", "PREVIEW_TEXT");
                                                        $arFilter = Array("ID" => $_REQUEST['id']);
                                                        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
                                                        while($ob = $res->GetNextElement())
                                                        {
                                                            $arFields = $ob->GetFields();
                                                            $valueTyping = $arFields['PREVIEW_TEXT'];
                                                        }
                                                        //массив с типированными профессиями
                                                        $arrTyping = explode(", ", $valueTyping);

                                                        ?>

                                                        <!-- ******** 1 kolonka -->
                                                        <div class="row">
                                                            <div class="col-12 col-lg-6">
                                                                <?if (array_search('Управляющий', $arrTyping)):?>
                                                                    <div class="form-row row-check" >
                                                                        <div class="col-12 col-check" >
                                                                            <input class="form-check-input formchepro" name="pr1"
                                                                                   type="checkbox" value="Управляющий" id="Check1" disabled="disabled">
                                                                            <label class="form-check-label" for="Check1"> Управляющий</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check" style="">
                                                                        <div class="col-12 col-check" >
                                                                            <input class="form-check-input formchepro" name="pr1"
                                                                                   type="checkbox" value="Управляющий" id="Check1">
                                                                            <label class="form-check-label" for="Check1"> Управляющий</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>

                                                                <?if (array_search('Администратор', $arrTyping)):?>
                                                                    <div class="form-row row-check" >
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr2"
                                                                                   type="checkbox" value="Администратор" id="Check2" disabled="disabled">
                                                                            <label class="form-check-label" for="Check2"> Администратор</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check" ">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr2"
                                                                                   type="checkbox" value="Администратор" id="Check2">
                                                                            <label class="form-check-label" for="Check2"> Администратор</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>

                                                                <?if (array_search('Продажник', $arrTyping)):?>
                                                                    <div class="form-row row-check" >
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr3"
                                                                                   type="checkbox" value="Продажник" id="Check3" disabled="disabled">
                                                                            <label class="form-check-label" for="Check3">Продажник</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr3"
                                                                                   type="checkbox" value="Продажник" id="Check3">
                                                                            <label class="form-check-label" for="Check3">Продажник</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>

                                                                <?if (array_search('Психолог', $arrTyping)):?>
                                                                    <div class="form-row row-check" >
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr4"
                                                                                   type="checkbox" value="Психолог" id="Check4" disabled="disabled">
                                                                            <label class="form-check-label" for="Check4"> Психолог</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check" style="">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr4"
                                                                                   type="checkbox" value="Психолог" id="Check4">
                                                                            <label class="form-check-label" for="Check4"> Психолог</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>
                                                            </div>
                                                            <!-- ******** 1 kolonka end -->

                                                            <div class="col-12 col-lg-6">

                                                                <?if (array_search('Педагог', $arrTyping)):?>
                                                                    <div class="form-row row-check">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr6"
                                                                                   type="checkbox" value="Педагог" id="Check6" disabled="disabled">
                                                                            <label class="form-check-label" for="Check6"> Педагог</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check" style="">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr6"
                                                                                   type="checkbox" value="Педагог" id="Check6">
                                                                            <label class="form-check-label" for="Check6"> Педагог</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>

                                                                <?if (array_search('Методист', $arrTyping)):?>
                                                                    <div class="form-row row-check" >
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr5"
                                                                                   type="checkbox" value="Методист" id="Check5" disabled="disabled">
                                                                            <label class="form-check-label" for="Check5"> Методист</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check" >
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr5"
                                                                                   type="checkbox" value="Методист" id="Check5">
                                                                            <label class="form-check-label" for="Check5"> Методист</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>

                                                                <?if (array_search('Художественный руководитель', $arrTyping)):?>
                                                                    <div class="form-row row-check">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr7"
                                                                                   type="checkbox" value="Художественный руководитель"
                                                                                   id="Check7" disabled="disabled">
                                                                            <label class="form-check-label" for="Check7"> Художественный
                                                                                руководитель</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr7"
                                                                                   type="checkbox" value="Художественный руководитель"
                                                                                   id="Check7">
                                                                            <label class="form-check-label" for="Check7"> Художественный
                                                                                руководитель</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>

                                                                <?if (array_search('Няня', $arrTyping)):?>
                                                                    <div class="form-row row-check">
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr8"
                                                                                   type="checkbox" value="Няня" id="Check8" disabled="disabled">
                                                                            <label class="form-check-label" for="Check8"> Няня</label>
                                                                        </div>
                                                                    </div>
                                                                <?else:?>
                                                                    <div class="form-row row-check" >
                                                                        <div class="col-12 col-check">
                                                                            <input class="form-check-input formchepro" name="pr8"
                                                                                   type="checkbox" value="Няня" id="Check8">
                                                                            <label class="form-check-label" for="Check8"> Няня</label>
                                                                        </div>
                                                                    </div>
                                                                <?endif;?>


                                                            </div>
                                                        </div>


                                                        <div class="form-row" style="margin-bottom: 1rem;">
                                                            <div class="col-12 text-center zagolov">
                                                                <h3>Сумма заказа</h3>
                                                                <span></span>
                                                            </div>
                                                        </div>

                                                        <div class="form-row" style="">
                                                            <div class="col-12 text-center">
                                                                <span id="sumza">0</span>
                                                            </div>
                                                        </div>


                                                        <div class="card-body">
                                                            <button id="sendmail" type="submit" class="btn btn-lg btn-gradient-secondary">
                                                                <span>Типировать сотрудника</span>
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-suitcase"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M18 9L11.855 12.8406C11.0846 13.3221 10.6994 13.5629 10.2784 13.622C10.0937 13.648 9.90629 13.648 9.72161 13.622C9.30056 13.5629 8.91537 13.3221 8.145 12.8406L2 9"></path><path d="M11 9H10H9"></path></svg>
                                                            </button>
                                                        </div>

                                                    </form>


                                                </div>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                            </div>

                        </main>


                    </div>

                </section>

    </div>
    <script type="text/javascript"
            src="/bitrix/templates/landing24/assets/vendor/jquery/jquery-3.2.1.min.js?156750832790987"></script>
    <script type="text/javascript"
            src="/bitrix/templates/landing24/assets/vendor/jquery.easing/js/jquery.easing.min.js?15675083273583"></script>
    <script type="text/javascript"
            src="/bitrix/templates/landing24/assets/js/helpers/lazyload.min.js?15994906851713"></script>
    <script type="text/javascript"
            src="/bitrix/components/bitrix/landing.pub/templates/.default/script.min.js?16085558823456"></script>
    <script type="text/javascript">var _ba = _ba || [];
        _ba.push(["aid", "bc2cad9153cb418bb2dfd5602c3c3754"]);
        _ba.push(["host", "genie.bitrix24.ru"]);
        (function () {
            var ba = document.createElement("script");
            ba.type = "text/javascript";
            ba.async = true;
            ba.src = (document.location.protocol == "https:" ? "https://" : "http://") + "bitrix.info/ba.js";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(ba, s);
        })();</script>

    <?php
    //получение баланса из инфоблока
    CModule::IncludeModule('iblock');
    $arSelect = array("ID", "NAME", "PREVIEW_TEXT", "CREATED_BY");
    $arFilter = array("IBLOCK_ID" => 5);
    $res = CIBlockElement::GetList(array(), $arFilter, false, array("nPageSize" => 50), $arSelect);
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        if ($arFields['CREATED_BY'] == $USER->GetID())
            $myBalance = $arFields['PREVIEW_TEXT'];
    }

    echo "<script> let myBalance = ".$myBalance."; </script>"
    ?>

    <script>
        function doRedirect() {
            atTime = "1400";
            toUrl = "/user/staff/";

            setTimeout("location.href = toUrl;", atTime);
        }
    </script>
    <script>
        $(document).ready(function () {
            function sumza() {
                $nnn = 0;
                $su = 0;
                $("input.formchepro:checked").each(function (i, elem) {
                    $nnn = $nnn + 1;
                });

                $ter = parseInt($nnn, 10);
                if ($ter > 0) {
                    $su = 100;
                    $ger = 50 * ($nnn - 1);
                    $su = $su + $ger;

                    $sal = Number($("#sale").val());
                    if ($sal > 0) {
                        $su = $su - Math.round(($su / 100) * $sal);
                    }
                    $("#sumza").text($su + " руб.");
                    $("#summazak").attr("value", $su);
                } else {
                    $("#sumza").text("0");
                    $("#summazak").attr("value", "0");
                }
            }

            $(".formchepro,.form-check-label").on("click", function () {
                sumza();
            });


            $(".form-all-check").on("click", function () {
                if ($("input.form-all-check").is(":checked")) {
                    $("input.formchepro").prop("checked", true);
                    $("input.form-all-check").prop("checked", true);
                } else {
                    $("input.formchepro").prop("checked", false);
                    $("input.form-all-check").prop("checked", false);
                }
                sumza();
                return true;
            });


            $('#sendmail').on('click', function (e) {
                e.preventDefault();
                sumza();
                let summazak = parseInt($("#summazak").attr('value'));
                if (summazak === 0) {
                    toastr.error('Сумма заказа не может быть ноль.', 'Ошибка')
                    return;
                }

                if (summazak > myBalance) {
                    toastr.error('Недостаточно средств.', 'Ошибка')
                    return;
                }
                let checkedItems = $("input.formchepro").filter((index, item) => {return $(item).prop('checked') === true;});
            jQuery.ajax({
                async: false,
                url: '/user/typing/add_finance.php',
                method: 'post',
                dataType: 'json',
                data: {
                    balance: summazak,
                    id: '<?=$_REQUEST['id']?>',
                    name: '<?=$_REQUEST['name']?>',
                    checked_items: Array.from(checkedItems.map((index, item) => {return $(item).val();}))
        },
        complete(response) {

            //toastr.success('message <button type="button" class="btn clear btn-toastr" onclick="location.href = \'https://Test-personal.com/user/finance/\';">OK</button>' , 'Типирование сотрудника произведено.');
            //toastr.success('', 'Типирование сотрудника произведено.');
            alert("Типирование сотрудника произведено.");
            $("input.formchepro").prop("checked", false);
            sumza();

            doRedirect()
            // console.log('я делаю редирект');
            // document.location.href = 'https://Test-personal.com/user/finance/';
        }
        });
        });



        //promokod_ar
        $("#promokod_ar").on("click", function () {
            $ajdate = $("#promokod").val();
            $strt = $ajdate.replace(/[^a-zа-яё0-9]/gi, '');
            $strt_len = $strt.length;

            if ($strt_len >= 8) {
                jQuery.ajax({
                    type: "POST",
                    url: "https://b3x24.com/b24/dev1/genie/promocode/promocode.query.php",
                    data: "promo=" + $strt,
                    success: function (data2) {//$("#seok").text(data2);
                        $salein = Number(data2);
                        if ($salein > 0) {
                            $("#sale").attr("value", data2);
                            $("#seok").html("<i class='landing-block-node-card-icon fa fa-check-circle' ></i>");
                            sumza();
                        } else {
                            $("#sale").attr("value", 0);
                            $("#seok").html("");
                            sumza();
                        }
                    }
                });
            }
            return false;
        });
        });
    </script>


    <script>
        (function () {
            new BX.Landing.Metrika();
        })();
    </script>

    <script>
        (function (w, d, u) {
            var s = d.createElement('script');
            s.async = true;
            s.src = u + '?' + (Date.now() / 60000 | 0);
            var h = d.getElementsByTagName('script')[0];
            h.parentNode.insertBefore(s, h);
        })(window, document, 'https://cdn-ru.bitrix24.ru/b1445091/crm/tag/call.tracker.js');
    </script>










<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
//



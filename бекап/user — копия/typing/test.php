<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
$APPLICATION->SetTitle("тест");
?>


<main class="w-100 landing-public-mode">
    <div class="landing-header">
        <div id="b7274" class="block-wrapper block-html">
            <section class="landing-block g-pt-0 g-pb-0 g-pl-0 g-pr-0">
                <style>
                    #b7270 a:hover {
                        color: #fff;
                    }</style>
            </section>
        </div>
        <div id="b7270" class="block-wrapper block-35-10-header-shop-top-and-phone-bottom">
            <header class="landing-block g-pt-20 g-pb-20 g-bg-primary">
                <div class="landing-block-node-container container text-center">
                    <h3 class="landing-block-node-title landing-semantic-title-medium g-color-white g-font-weight-400 g-font-size-26">
                        <a href="https://testjobs.bitrix24.site/" target="_self">TestJobs.ru</a></h3>
                    <div class="landing-block-node-text landing-semantic-text-medium g-color-white g-font-size-26 g-font-open-sans">
                        Выбирайте сотрудника с умом
                    </div>
                </div>
            </header>
        </div>
    </div>
    <div class="landing-main">
        <div id="b7250" class="block-wrapper block-html">
            <section class="landing-block g-pt-0 g-pb-0 g-pl-0 g-pr-0">
                <style>


                    @media (min-width: 992px) {
                        #b7250 {
                            background: transparent !important;
                            background-color: #fff;
                            background-image: url("https://cdn-ru.bitrix24.ru/b1445091/landing/d6e/d6e92646f6411f37758e62bd1374ac36/444-700_1x.jpg") !important;
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


                <div class="container" id="zate_cont" style="margin-bottom: 4rem; margin-top: 2rem;">
                    <div class="row zate_cont_row d-flex align-items-stretch justify-content-center " style="">
                        <div class="col-11 col-md-9 col-lg-9 col-xl-8">


                            <form id="formZATE" action="https://b3x24.com/testjobs/spasybo_zakaz.php"
                                  class="form-horizontal" autocomplete="" method="post" role="form">

                                <H2 class="text-center">Заказать тестирование сотрудника детского центра</H2>

                                <input type="hidden" id="summazak" name="summazak" value="0">

                                <input type="hidden" id="sale" name="sale" value="0">


                                <div class="form-row" style="margin-bottom: 0px;">
                                    <div class="col-12 text-center zagolov">
                                        <h3>Выбор профессий</h3>
                                        <span>на них будут тестировать кандидата</span>
                                    </div>
                                </div>


                                <div class="form-row row-check" style="">
                                    <div class="col-12 col-check_all">
                                        <input class="form-check-input form-all-check" type="checkbox" value=""
                                               id="CheckAll">
                                        <label class="label-all-check" for="CheckAll"> Выбрать все </label>
                                    </div>
                                </div>


                                <!-- ******** 1 kolonka -->
                                <div class="row">
                                    <div class="col-12 col-lg-6">

                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr1"
                                                       type="checkbox" value="Управляющий" id="Check1">
                                                <label class="form-check-label" for="Check1"> Управляющий</label>
                                            </div>
                                        </div>

                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr2"
                                                       type="checkbox" value="Администратор" id="Check2">
                                                <label class="form-check-label" for="Check2"> Администратор</label>
                                            </div>
                                        </div>

                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr3"
                                                       type="checkbox" value="Продажник" id="Check3">
                                                <label class="form-check-label" for="Check3">Продажник</label>
                                            </div>
                                        </div>

                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr4"
                                                       type="checkbox" value="Психолог" id="Check4">
                                                <label class="form-check-label" for="Check4"> Психолог</label>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- ******** 1 kolonka end -->

                                    <div class="col-12 col-lg-6">

                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr6"
                                                       type="checkbox" value="Педагог" id="Check6">
                                                <label class="form-check-label" for="Check6"> Педагог</label>
                                            </div>
                                        </div>

                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr5"
                                                       type="checkbox" value="Методист" id="Check5">
                                                <label class="form-check-label" for="Check5"> Методист</label>
                                            </div>
                                        </div>


                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr7"
                                                       type="checkbox" value="Художественный руководитель"
                                                       id="Check7">
                                                <label class="form-check-label" for="Check7"> Художественный
                                                    руководитель</label>
                                            </div>
                                        </div>


                                        <div class="form-row row-check" style="">
                                            <div class="col-12 col-check">
                                                <input class="form-check-input formchepro" name="pr8"
                                                       type="checkbox" value="Няня" id="Check8">
                                                <label class="form-check-label" for="Check8"> Няня</label>
                                            </div>
                                        </div>

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


                                <div class="form-row" style="margin-bottom: 0px;margin-top: 2rem;">
                                    <div class="col-12 text-center zagolov">
                                        <h3>Есть промокод?</h3>
                                    </div>
                                </div>


                                <div class="row d-flex justify-content-center align-items-stretch "
                                     style="margin-bottom: 3rem; margin-top: 2rem;">
                                    <div class="col-10 col-lg-3 d-flex align-items-center"
                                         style="padding-bottom: 1rem;">
                                        <div class="w-100 text-center text-lg-right ">
                                            <input class="form-control" data-name="promokod" name="promokod"
                                                   id="promokod" type="text" maxlength="25" value=""
                                                   placeholder="Ваш промокод">
                                        </div>
                                    </div>
                                    <div class="col-10 col-lg-3 d-flex align-items-center"
                                         style="padding-bottom: 1rem;">
                                        <div class="w-100 text-center text-lg-left ">
                                            <span id="promokod_ar">Проверить</span> <span id="seok"></span>
                                        </div>
                                    </div>
                                    <div class="col-10 text-center" style="padding-bottom: 1rem;">
                                        <span class="podz">Если промокод действующий&mdash; сумма будет пересчитана.</span>
                                    </div>
                                </div>


                                <div class="form-row" style="margin-bottom: 1rem;">
                                    <div class="col-12 text-center zagolov">
                                        <h3>Ваши данные</h3>
                                        <span>на e-mail будут высланы результаты тестов</span>
                                    </div>
                                </div>


                                <div class="form-row" style="margin-bottom: 1rem;">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="namePrepend">Ваше имя</span>
                                            </div>
                                            <input class="form-control" data-name="Контактное лицо" name="name"
                                                   id="name" type="text" maxlength="255" value=""
                                                   aria-describedby="namePrepend" required="required"
                                                   placeholder="Имя Фамилия">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row" style="margin-bottom: 1rem;">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="telPrepend">Телефон</span>
                                            </div>
                                            <input class="form-control" data-name="Телефон" name="tel" id="tel"
                                                   type="tel" maxlength="25" value=""
                                                   placeholder="+7(917) 123-45-67" aria-describedby="telPrepend"
                                                   required="required">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row" style="margin-bottom: 1rem;">
                                    <div class="col-12">
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="emailPrepend">E-mail</span>
                                            </div>
                                            <input class="form-control" data-name="E-mail" name="email" id="email"
                                                   type="email" maxlength="25" value="" placeholder="Ваш E-mail"
                                                   aria-describedby="telPrepend" required="required">
                                        </div>
                                    </div>
                                </div>


                                <div class="form-row" style="margin-bottom: 1rem;">
                                    <div class="col-1 text-center">
                                        <input class="form-check-input" data-name="Согласие на обработку данных"
                                               name="soglas" id="soglas" type="checkbox"
                                               value="Даю согласие на обработку моих персональных данных"
                                               required="required" checked>
                                    </div>
                                    <label for="soglas" class="col-10 form-check-label label-soglas">Даю согласие на
                                        обработку моих персональных данных.<br>
                                        <em>Обработка персональных данных осуществляется согласно ФЗ РФ от 27 июля
                                            2006 г. № 152-ФЗ</em></label>
                                </div>


                                <div class="">
                                    <button id="sendmail" type="submit" class="">Отправить заказ</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div id="b7280" class="block-wrapper block-32-2-img-one-big">
            <section class="landing-block g-pt-100 l-d-xs-none l-d-md-none l-d-lg-none">
                <div class="container text-center">
                    <img class="landing-block-node-img js-animation zoomIn img-fluid"
                         src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI3MDAiIGhlaWdodD0iNTYwIj48cmVjdCBpZD0iYmFja2dyb3VuZHJlY3QiIHdpZHRoPSIxMDAlIiBoZWlnaHQ9IjEwMCUiIHg9IjAiIHk9IjAiIGZpbGw9IiNkZGQiIGZpbGwtb3BhY2l0eT0iLjciIHN0cm9rZT0ibm9uZSIvPjwvc3ZnPg=="
                         alt=""
                         data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;https://www.bitrix24.com/&quot;,&quot;target&quot;:&quot;_blank&quot;,&quot;enabled&quot;:true}"
                         data-fileid="1028972" data-fileid2x="1028974" data-lazy-img="Y"
                         data-src="https://cdn-ru.bitrix24.ru/b1445091/landing/d6e/d6e92646f6411f37758e62bd1374ac36/444-700_1x.jpg"
                         loading="lazy"
                         data-srcset="https://cdn-ru.bitrix24.ru/b1445091/landing/c12/c1251dda9085bc316060ac08be6fd543/444-700_2x.jpg 2x"/>
                </div>
            </section>
        </div>
        <div id="b7310" class="block-wrapper block-34-4-two-cols-with-text-and-icons">
            <section class="landing-block g-pt-30 g-pb-0 l-d-xs-none l-d-md-none l-d-lg-none">
                <div class="container">
                    <!-- Icon Blocks -->
                    <div class="row landing-block-inner">
                        <div class="landing-block-node-card js-animation fadeInUp col-md-6 col-lg-6 g-mb-30 g-mb-0--last g-px-20 landing-card">
                            <!-- Icon Blocks -->
                            <div class="media">
                                <div class="d-flex g-mt-25 g-mr-40 g-width-64 justify-content-center">
                    <span class="landing-block-node-card-icon-container g-color-primary d-block g-font-size-48 g-line-height-1">
                        <i class="landing-block-node-card-icon fa fa-check-circle"
                           data-pseudo-url="{&quot;text&quot;:&quot;&quot;,&quot;href&quot;:&quot;&quot;,&quot;target&quot;:&quot;_self&quot;,&quot;enabled&quot;:false}"></i>
                    </span>
                                </div>
                                <div class="media-body align-self-center">
                                    <h5 class="landing-block-node-card-title landing-semantic-subtitle-medium text-uppercase g-font-weight-700">
                                        Criminal law</h5>
                                    <div class="landing-block-node-card-text landing-semantic-text-small mb-0">
                                        <p>Proin dignissim eget enim id aliquam.
                                            Proin ornare dictum leo, non elementum tellus molestie et. Vivamus sit
                                            amet scelerisque
                                            leo.
                                            In eu commodo est. Sed bibendum a metus ac sollicitudin. Curabitur
                                            elementum placerat
                                            elit
                                            vel accumsan.</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Icon Blocks -->
                        </div>


                    </div>
                    <!-- End Icon Blocks -->
                </div>
            </section>
        </div>
    </div>
    <div class="landing-footer">
        <div id="b7266" class="block-wrapper block-17-copyright">
            <section class="landing-block js-animation animation-none">
                <div class="landing-semantic-text-medium text-center g-color-gray-dark-v3 g-pa-10">
                    <div class="g-width-600 mx-auto">
                        <div class="landing-block-node-text landing-semantic-text-medium js-animation animation-none g-font-size-12">
                            <p>&copy; 2020 All rights reserved.</p>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</main>


    <script type="text/javascript" src="/bitrix/templates/landing24/assets/vendor/jquery/jquery-3.2.1.min.js?156750832790987"></script>
    <script type="text/javascript" src="/bitrix/templates/landing24/assets/vendor/jquery.easing/js/jquery.easing.min.js?15675083273583"></script>
    <script type="text/javascript" src="/bitrix/templates/landing24/assets/js/helpers/lazyload.min.js?15994906851713"></script>
    <script type="text/javascript" src="/bitrix/components/bitrix/landing.pub/templates/.default/script.min.js?16085558823456"></script>
    <script type="text/javascript">var _ba = _ba || []; _ba.push(["aid", "bc2cad9153cb418bb2dfd5602c3c3754"]); _ba.push(["host", "genie.bitrix24.ru"]); (function() {var ba = document.createElement("script"); ba.type = "text/javascript"; ba.async = true;ba.src = (document.location.protocol == "https:" ? "https://" : "http://") + "bitrix.info/ba.js";var s = document.getElementsByTagName("script")[0];s.parentNode.insertBefore(ba, s);})();</script>


    <script>
        $(document).ready(function(){function sumza(){$nnn=0;
            $su=0;
            $("input.formchepro:checked").each(function(i,elem){$nnn=$nnn+1;});

            $ter=parseInt($nnn,10);
            if($ter>0){$su=100;
                $ger=50*($nnn-1);
                $su=$su+$ger;

                $sal=Number($("#sale").val());
                if($sal>0){$su=$su-Math.round(($su/100)*$sal);}$("#sumza").text($su+" руб.");
                $("#summazak").attr("value",$su);}else{$("#sumza").text("0");
                $("#summazak").attr("value","0");}}$(".formchepro,.form-check-label").on("click",function(){sumza();});


            $(".form-all-check").on("click",function(){if($("input.form-all-check").is(":checked")){$("input.formchepro").prop("checked", true);
                $("input.form-all-check").prop("checked", true);}else{$("input.formchepro").prop("checked", false);
                $("input.form-all-check").prop("checked", false);}sumza();
                return true;});




//promokod_ar
            $("#promokod_ar").on("click",function(){$ajdate=$("#promokod").val();
                $strt=$ajdate.replace(/[^a-zа-яё0-9]/gi,'');
                $strt_len=$strt.length;

                if($strt_len>=8){jQuery.ajax({type: "POST",
                    url: "https://b3x24.com/b24/dev1/genie/promocode/promocode.query.php",
                    data: "promo="+$strt,
                    success: function(data2){//$("#seok").text(data2);
                        $salein=Number(data2);
                        if($salein>0){$("#sale").attr("value",data2);
                            $("#seok").html("<i class='landing-block-node-card-icon fa fa-check-circle' ></i>");
                            sumza();}else{$("#sale").attr("value",0);
                            $("#seok").html("");
                            sumza();}}});}return false;});});
    </script>

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
<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>
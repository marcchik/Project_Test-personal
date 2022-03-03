<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Главная");
?>

<? if($USER->IsAuthorized()):?>
    <main>
        <div class="col-auto mb-2 mb-md-0 me-auto">
            <div class="w-auto sw-md-30">
                <h1 class="mb-0 pb-0 display-4" id="title">Главная</h1>
            </div>
        </div>
        <br>
<!--        ссылка для передачи через сети-->
<!--        <h2 class="small-title">Ваша ссылка</h2>-->
<!--        <div class="row">-->
<!--            <div class="col-6">-->
<!--                <div class="card mb-5">-->
<!--                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">-->
<!--                        <form class="form-inline">-->
<!--                            <div class="form-group mb-2 mt-2">-->
<!--                                <!-- The text field -->
<!--                                <small style="color: gray">Отправьте ссылку кандидату на его e-mail</small>-->
<!--                                <input class="form-control" style="width: 500px;"  readonly="readonly" type="text" value="testpersonal.ru/ts/?id=--><?//=base64_encode("user".$USER->GetID());?><!--" id="myInput">-->
<!--                                <!-- The button used to copy the text -->
<!--                            </div>-->
<!--                            <button class="btn btn-primary ml-2 mb-2"style="width: 200px;" onclick="myFunction()">Скопировать ссылку</button>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->


<!--        конец ссылка для передачи через сети-->
<!--        выборка даннх по сотрудникам-->
        <?
        $arrStaf = array();
        ?>
        <?
        CModule::IncludeModule("iblock");

        //кеоличество сотрудников
        $i = 0;
        //количество приглашенных
        $countSend = 0;
        //количество прошедших тест
        $countTest = 0;
        //количество протипированных
        $countTyping = 0;
        //свойства каждого сотрудника
        $arSelect = Array("ID", "NAME", "CREATED_BY", "PROPERTY_STATUS");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
        $arFilter = Array("IBLOCK_ID"=>3, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "CREATED_BY" => $USER->GetID());
        $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
        while($ob = $res->GetNextElement()){
            $i++;
            if ($ob->GetFields()['PROPERTY_STATUS_VALUE'] == 'Приглашен')
                $countSend++;
            elseif ($ob->GetFields()['PROPERTY_STATUS_VALUE'] == 'Тест пройден')
                $countTest++;
            elseif ($ob->GetFields()['PROPERTY_STATUS_VALUE'] == 'Типирован')
                $countTyping++;

        }
        ?>
<!--        начало помощи-->
    <section class="scroll-section" id="default">
        <h2 class="small-title">Помощь</h2>
        <div class="card mb-5">
            <div class="card-body">
                <a class="btn btn-primary mb-1 collapsed linkHelp" data-bs-toggle="collapse" href="#collapseExample1" role="button" aria-expanded="false" aria-controls="collapseExample1">
                С чего начать
                </a>
                <a class="btn btn-primary mb-1 collapsed linkHelp" data-bs-toggle="collapse" href="#collapseExample2" role="button" aria-expanded="false" aria-controls="collapseExample2">
                Как типировать
                </a>
                <a class="btn btn-primary mb-1 collapsed linkHelp" data-bs-toggle="collapse" href="#collapseExample3" role="button" aria-expanded="false" aria-controls="collapseExample3">
                Сколько стоит
                </a>
                <a class="btn btn-primary mb-1 collapsed linkHelp" data-bs-toggle="collapse" href="#collapseExample4" role="button" aria-expanded="false" aria-controls="collapseExample4">
                   Обратная связь
                </a>
                <div class="collapse textHelp" id="collapseExample1" style="">
                    <div class="card card-body no-shadow border mt-3">
                        Чтобы оценинить возможности сервиса, предлагаем вам пройти тест самостоятельно или типировать хорошо знакомого человека. В главном меню в разделе 'Действия' скопируйте ссылку.
                        Откройте ее в новой вкладке браузера. Пройдите тест. После прохождения теста результат вы увидите в меню 'Кандидаты' в разделе 'Тест пройден'.
                    </div>
                </div>
                <div class="collapse textHelp" id="collapseExample2" style="">
                    <div class="card card-body no-shadow border mt-3">
                        Зайдите в меню 'Кандидаты'. Установите фильтр на 'Тест пройден'. Откройте карточку кандидата.
                        В разделе 'Результаты тестирования' выберите группу и профессию, на которую вы хотите проверить кандидата.
                        Нажмити кнопку 'Типировать'. Вы получите результат соответствия кандидата профессии в процентах.
                        70% и выше - отличные кандидаты. Расшифровку профиля вы увидите ниже. В ней вы сможете прочитать о сильных и слабых качествах кандидата.
                    </div>
                </div>
                <div class="collapse textHelp" id="collapseExample3" style="">
                    <div class="card card-body no-shadow border mt-3">
                        Стоимость первого типирования одного кандидата - 100 рублей. В результате вы получите соответствие одной выбранной профессии и расшифровку профиля. Стоисомть последующих типирований этого же кандидата на другие профессии - 50 рублей.
                    </div>
                </div>
                <div class="collapse textHelp" id="collapseExample4" style="">
                    <div class="card card-body no-shadow border mt-3">
                        Будем рады за обратную связь по работе сервиса. В дальнейшем мы планируем добавлять группы профессий. Какую группу вы бы ходели добавить в ближайшем обновлении сервиса?
                        Ваши предложиения и комментарии направляйте по адресу welcome@testpersonal.ru
                    </div>
                </div>
            </div>
        </div>
    </section>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script>
            $(".linkHelp").click(function() {
                $(".textHelp").removeClass("show");

            })
        </script>
<!--        конец помощи-->
        <!--        статистика-->

        <h2 class="small-title">Действия</h2>
        <div class="row g-2 mb-5">
            <div class="col-sm-6 col-xxl-4">
                <div class="card">
                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                        <form class="form-inline" >
                            <div class="form-group mb-2 mt-2">
                                <!-- The text field -->
                                <small style="color: gray">Отправьте ссылку кандидату</small>
                                <div class="mb-3 filled w-100 d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-link"><path d="M7 6.00003 6.00001 6.00002C5.07004 6.00002 4.60506 6.00001 4.22356 6.10223 3.18828 6.37963 2.37962 7.18828 2.10222 8.22356 2 8.60506 2 9.07004 2 10V10C2 10.93 2 11.395 2.10222 11.7764 2.37962 12.8117 3.18827 13.6204 4.22355 13.8978 4.60505 14 5.07003 14 5.99999 14H7M13 6.00003 14 6.00002C14.93 6.00002 15.3949 6.00001 15.7764 6.10223 16.8117 6.37963 17.6204 7.18828 17.8978 8.22356 18 8.60506 18 9.07004 18 10V10C18 10.93 18 11.395 17.8978 11.7764 17.6204 12.8117 16.8117 13.6204 15.7764 13.8978 15.395 14 14.93 14 14 14H13M7 10H13"></path></svg>
                                    <input id="linkShare" class="form-control" readonly="readonly" type="text" value="https://lk.testpersonal.ru/ts/?id=<?=base64_encode("user".$USER->GetID());?>" >
                                </div>
                                <!-- The button used to copy the text -->
                            </div>
                        </form>
                        <button class="btn btn-primary ml-2 mb-2" style="width: 200px;" onclick="copyLink()">Скопировать ссылку</button>

                        <script>
                            function copyLink() {
                                /* Get the text field */
                                let copyText = document.getElementById("linkShare");

                                /* Select the text field */
                                copyText.select();
                                /* Copy the text inside the text field */
                                document.execCommand("copy");

                            }
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xxl-4">
                <div class="card">
                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                        <form class="form-inline" action="/user/home/" method="post">
                            <div class="form-group mb-2 mt-2">
                                <!-- The text field -->
                                <small style="color: gray">Отправьте ссылку кандидату на его e-mail</small>
                                <div class="mb-3 filled w-100 d-flex flex-column">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                    <input name="email" onclick="enableStartEmailBtn()" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" class="form-control" id="inputEmail" placeholder="Email" id="contactEmailModal">
                                </div>
                                <!-- The button used to copy the text -->
                            </div>
                            <input id="inviteBtn" disabled="disabled" type="submit" value="Отправить ссылку" name="invite" class="btn btn-primary ml-2 mb-2"/>
                            <script>
                                function enableStartEmailBtn() {
                                    $('#inviteBtn').removeAttr('disabled');
                                }
                                function enableStartPromokodBtn() {
                                    $('#promoBtn').removeAttr('disabled');
                                }
                            </script>


                        </form>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 col-xxl-4">
                <div class="card">
                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                        <form class="form-inline" action="/user/home/" method="post">
                            <div class="form-group mb-2 mt-2">
                                <!-- The text field -->
                                <small style="color: gray">Есть промокод?</small>
                                <div class="mb-3 filled w-100 d-flex flex-column">
                                    <input name= "promocode" onclick="enableStartPromokodBtn()" class="form-control" placeholder="Получите скидку" id="promocode">
                                </div>
                                <!-- The button used to copy the text -->
                            </div>
                            <input id="promoBtn"  disabled="disabled" name="acrivePromocode" type="submit" value="Активировать промокод" class="btn btn-primary ml-2 mb-2"/>
                        </form>
                    </div>
                </div>
            </div>
            <script>
                promoBtn.onclick = function() {
                    var val = document.getElementById('promocode').value;
                };
            </script>
            <?

            # активация промокода
            if( isset( $_POST['acrivePromocode'] ) ) {

                //промокод, который ввел пользователь
                $promo_code = $_POST['promocode'];

                if (strlen($promo_code) == 0) {
                    echo "<script>location.href='/user/home/'; alert('Вы не ввели промокод!');</script>";
                }

                //массив с данными промокода
                $arrPromoProp = array();

                //поиск промокода в базе с промокодами, есть ли, введенный пользователем промокод?
                $arSelect = Array("ID", "NAME", "ACTIVE_FROM", "ACTIVE_TO", "PROPERTY_UNIQUE_CODE", "PROPERTY_ACTIONS", "PROPERTY_VALIDITY", "PROPERTY_PERCENT_DISCOUNT", "PROPERTY_AMOUNT_DISCOUNT" , "PROPERTY_TYPE", "PROPERTY_AGENT");
                $arFilter = Array("IBLOCK_ID"=>8, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_UNIQUE_CODE" => $promo_code);
                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
                while($ob = $res->GetNextElement())
                {
                    $arFields = $ob->GetFields();

                    $arrPromoProp['id'] = $arFields['ID'];
                    $arrPromoProp['name'] = $arFields['NAME'];
                    $arrPromoProp['type'] = $arFields['PROPERTY_TYPE_VALUE'];
                    $arrPromoProp['type_id'] = $arFields['PROPERTY_TYPE_ENUM_ID'];
                    $arrPromoProp['date_start'] = $arFields['ACTIVE_FROM'];
                    $arrPromoProp['date_finish'] = $arFields['ACTIVE_TO'];
                    $arrPromoProp['code'] = $arFields['PROPERTY_UNIQUE_CODE_VALUE'];
                    $arrPromoProp['quantity'] = $arFields['PROPERTY_ACTIONS_VALUE'];
                    $arrPromoProp['quantity_id'] = $arFields['PROPERTY_ACTIONS_ENUM_ID'];
                    $arrPromoProp['discount_p'] = $arFields['PROPERTY_PERCENT_DISCOUNT_VALUE'];
                    $arrPromoProp['discount_s'] = $arFields['PROPERTY_AMOUNT_DISCOUNT_VALUE'];
                    $arrPromoProp['agent'] = $arFields['PROPERTY_AGENT_VALUE'];
                }

                //добавление агента пользователю
                $user = new CUser;

                //ID пользователя
                $ID = $USER->GetID();

                $fields = Array(
                    "PERSONAL_WWW" => $arrPromoProp['agent'],
                );

//                //массив с данными купона
//                $arrCupProp = array();
//
//                //поиск купона в базе с купонами, есть ли, введенный пользователем купон?
//                $arSelect = Array("ID", "NAME", "ACTIVE_FROM", "ACTIVE_TO", "PROPERTY_UNIQUE_CODE", "PROPERTY_SUM_REFILL");
//                $arFilter = Array("IBLOCK_ID"=>10, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_UNIQUE_CODE" => $promo_code);
//                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
//                while($ob = $res->GetNextElement())
//                {
//                    $arFields = $ob->GetFields();
//
//                    $arrCupProp['id'] = $arFields['ID'];
//                    $arrCupProp['name'] = $arFields['NAME'];
//                    $arrCupProp['date_start'] = $arFields['ACTIVE_FROM'];
//                    $arrCupProp['date_finish'] = $arFields['ACTIVE_TO'];
//                    $arrCupProp['code'] = $arFields['PROPERTY_UNIQUE_CODE_VALUE'];
//                    $arrCupProp['sum_refill'] = $arFields['PROPERTY_SUM_REFILL_VALUE'];
//                }
//
//                //вид купона
//                $type = "default";
//
//                if (!empty($arrPromoProp)) {
//                    $type = "promocode";
//                } elseif (!empty($arrCupProp)) {
//                    $type = "coupon";
//                }
//                pr($type);

                if (empty($arrPromoProp)) {
                    echo "<script>location.href='/user/home/'; alert('Не актуальный промокод');</script>";
                } else {

                    $today = date('d-m-Y');

                    //если введенный промокод - купон на скидку
                    if ( $arrPromoProp['type_id'] == 11) {
                        if(strtotime($today) > strtotime($arrPromoProp['date_finish'])) {
                            echo "<script>location.href='/user/home/'; alert('Срок действия промокода истек');</script>";
                        } else {
                            if ($arrPromoProp['quantity_id'] == 10) {

                                //старые применения промокодов
                                $arrOldActivePromo = array();

                                $arSelect = Array("ID", "NAME", "ACTIVE_FROM", "ACTIVE_TO", "PROPERTY_USER", "PROPERTY_PROMO_CODE", "PROPERTY_SUM_DISCOUNT", "PROPERTY_PROMO_STATUS");
                                $arFilter = Array("IBLOCK_ID"=> 9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PROMO_CODE" => $promo_code, "PROPERTY_USER" => $USER->GetLogin(), "PROPERTY_PROMO_STATUS" => "Активен");
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

                                while($ob = $res->GetNextElement()) {
                                    $arFields = $ob->GetFields();
                                    $arrOldActivePromo[] = $arFields;
                                }
                                if (!empty($arrOldActivePromo)) {
                                    echo "<script>location.href='/user/home/'; alert('Промокод уже был активирован');</script>";
                                } else {
                                    $el = new CIBlockElement;

                                    $PROP = array();
                                    $PROP[19] = $USER->GetLogin();
                                    $PROP[20] = $promo_code;
                                    $PROP[21] = $arrPromoProp['discount_s'];
                                    $PROP[22] = "Активен";

                                    $arLoadProductArray = Array(
                                        "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                                        "IBLOCK_ID"      => 9,
                                        "PROPERTY_VALUES"=> $PROP,
                                        "NAME"           => $USER->GetLogin()." активировал промокод ".$promo_code,
                                        "ACTIVE"         => "Y", // активен
                                    );

                                    $el->Add($arLoadProductArray);

                                    //добавление агента пользователю
                                    $user->Update($ID, $fields);

                                    //переадресация на страницу после вывода сообщения
                                    echo "<script>location.href='/user/home/'; alert('Промокод успешно активирован');</script>";
                                }
                            } elseif ($arrPromoProp['quantity_id'] == 9) {
                                //старые применения промокодов
                                $arrOldActivePromo = array();

                                $arSelect = Array("ID", "NAME", "ACTIVE_FROM", "ACTIVE_TO", "PROPERTY_USER", "PROPERTY_PROMO_CODE", "PROPERTY_SUM_DISCOUNT");
                                $arFilter = Array("IBLOCK_ID"=> 9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PROMO_CODE" => $promo_code, "PROPERTY_USER" => $USER->GetLogin());
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

                                while($ob = $res->GetNextElement()) {
                                    $arFields = $ob->GetFields();
                                    $arrOldActivePromo[] = $arFields;
                                }
                                if (!empty($arrOldActivePromo)) {
                                    echo "<script>location.href='/user/home/'; alert('Промокод уже был активирован');</script>";
                                } else {
                                    $el = new CIBlockElement;

                                    $PROP = array();
                                    $PROP[19] = $USER->GetLogin();
                                    $PROP[20] = $promo_code;
                                    $PROP[21] = $arrPromoProp['discount_s'];
                                    $PROP[22] = "Активен";

                                    $arLoadProductArray = Array(
                                        "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                                        "IBLOCK_ID"      => 9,
                                        "PROPERTY_VALUES"=> $PROP,
                                        "NAME"           => $USER->GetLogin()." воспользовался промокод ".$promo_code,
                                        "ACTIVE"         => "Y", // активен
                                    );

                                    $el->Add($arLoadProductArray);

                                    //добавление агента пользователю
                                    $user->Update($ID, $fields);

                                    //переадресация на страницу после вывода сообщения
                                    echo "<script>location.href='/user/home/'; alert('Промокод успешно активирован');</script>";
                                }

                            }
                        }
                    //если введенный промокод - купон на пополнение баланса
                    } elseif ( $arrPromoProp['type_id'] == 12) {
                        if(strtotime($today) > strtotime($arrPromoProp['date_finish'])) {
                            echo "<script>location.href='/user/home/'; alert('Срок действия купона истек');</script>";
                        } else {
                            if ($arrPromoProp['quantity_id'] == 10) {

                                //старые применения купона
                                $arrOldActivePromo = array();

                                $arSelect = Array("ID", "NAME", "ACTIVE_FROM", "ACTIVE_TO", "PROPERTY_USER", "PROPERTY_PROMO_CODE", "PROPERTY_SUM_DISCOUNT", "PROPERTY_PROMO_STATUS");
                                $arFilter = Array("IBLOCK_ID" => 9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PROMO_CODE" => $promo_code, "PROPERTY_USER" => $USER->GetLogin(), "PROPERTY_PROMO_STATUS" => "Активен");
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);


                                while($ob = $res->GetNextElement()) {
                                    $arFields = $ob->GetFields();
                                    $arrOldActivePromo[] = $arFields;
                                }
                                pr($arrOldActivePromo);
                                if (!empty($arrOldActivePromo)) {
                                    echo "<script>location.href='/user/home/'; alert('Купон уже был применен');</script>";
                                } else {

                                    $el = new CIBlockElement;

                                    //ID пользователя, которому пополняют баланс
                                    $userID = $USER->GetID();

                                    //Сумма пополнения
                                    $addSum = $arrPromoProp['discount_s'];

                                    $arLoadProductArray = Array(
                                        "CREATED_BY" => $userID,
                                        "MODIFIED_BY"    => $userID,
                                        "IBLOCK_ID"      => 4,
                                        "CODE" => 2,
                                        "NAME"           => "Пополнение баланса",
                                        "ACTIVE"         => "Y",            // активен
                                        "PREVIEW_TEXT"   => $addSum,
                                    );

                                    if($PRODUCT_ID = $el->Add($arLoadProductArray)) {
                                        recountBalance($userID);

                                        $el = new CIBlockElement;

                                        $PROP = array();
                                        $PROP[19] = $USER->GetLogin();
                                        $PROP[20] = $promo_code;
                                        $PROP[21] = $arrPromoProp['discount_s'];
                                        $PROP[22] = "Применен";

                                        $arLoadProductArray = Array(
                                            "MODIFIED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                                            "IBLOCK_ID" => 9,
                                            "PROPERTY_VALUES" => $PROP,
                                            "NAME" => $USER->GetLogin() . " воспользовался купоном " . $promo_code,
                                            "ACTIVE" => "Y", // активен
                                        );

                                        $el->Add($arLoadProductArray);

                                        //добавление агента пользователю
                                        $user->Update($ID, $fields);

                                        //переадресация на страницу после вывода сообщения
                                        echo "<script>location.href='/user/home/'; alert('Купон успешно применен');</script>";
                                    } else {
                                        echo "<script>location.href='/user/home/'; alert('Купон не был применен');</script>";
                                    }
                                }
                            } elseif ($arrPromoProp['quantity_id'] == 9) {
                                //старые применения купона
                                $arrOldActivePromo = array();

                                $arSelect = Array("ID", "NAME", "ACTIVE_FROM", "ACTIVE_TO", "PROPERTY_USER", "PROPERTY_PROMO_CODE", "PROPERTY_SUM_DISCOUNT");
                                $arFilter = Array("IBLOCK_ID"=> 9, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y", "PROPERTY_PROMO_CODE" => $promo_code, "PROPERTY_USER" => $USER->GetLogin());
                                $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);

                                while($ob = $res->GetNextElement()) {
                                    $arFields = $ob->GetFields();
                                    $arrOldActivePromo[] = $arFields;
                                }
                                if (!empty($arrOldActivePromo)) {
                                    echo "<script>location.href='/user/home/'; alert('Купон уже был применен');</script>";
                                } else {

                                    $el = new CIBlockElement;

                                    //ID пользователя, которому пополняют баланс
                                    $userID = $USER->GetID();

                                    //Сумма пополнения
                                    $addSum = $arrPromoProp['discount_s'];

                                    $arLoadProductArray = Array(
                                        "CREATED_BY" => $userID,
                                        "MODIFIED_BY"    => $userID,
                                        "IBLOCK_ID"      => 4,
                                        "CODE" => 2,
                                        "NAME"           => "Пополнение баланса",
                                        "ACTIVE"         => "Y",            // активен
                                        "PREVIEW_TEXT"   => $addSum,
                                    );

                                    if($PRODUCT_ID = $el->Add($arLoadProductArray)){
                                        recountBalance($userID);

                                        $el = new CIBlockElement;

                                        $PROP = array();
                                        $PROP[19] = $USER->GetLogin();
                                        $PROP[20] = $promo_code;
                                        $PROP[21] = $arrPromoProp['discount_s'];
                                        $PROP[22] = "Применен";

                                        $arLoadProductArray = Array(
                                            "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                                            "IBLOCK_ID"      => 9,
                                            "PROPERTY_VALUES"=> $PROP,
                                            "NAME"           => $USER->GetLogin()." воспользовался купоном ".$promo_code,
                                            "ACTIVE"         => "Y", // активен
                                        );

                                        $el->Add($arLoadProductArray);

                                        //добавление агента пользователю
                                        $user->Update($ID, $fields);

                                        //переадресация на страницу после вывода сообщения
                                        echo "<script>location.href='/user/home/'; alert('Купон успешно применен');</script>";
                                    } else {
                                        echo "<script>location.href='/user/home/'; alert('Купон не был применен');</script>";
                                    }

                                }

                            }
                        }
                    }


                }


            }
            ?>

        </div>


        <!--        конец статистики-->

        <!--        статистика-->
        <h2 class="small-title">Статистика</h2>
        <div class="row">
            <div class="col-6 col-sm-4 col-xl-3">
                <div class="card mb-5">
                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                        <div class="d-flex rounded-xl bg-gradient-primary sw-6 sh-6 mb-3 justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-flash"><path d="M11.1973 7.19592L12.6377 1.92015C12.7054 1.67201 12.3994 1.49562 12.2186 1.67863L4.42042 9.57432C4.26444 9.73226 4.37631 10 4.59829 10H8.10963C8.27674 10 8.3968 10.1608 8.34933 10.321L6.09606 17.9258C6.02017 18.182 6.34494 18.3626 6.52253 18.163L15.6297 7.92795C15.7731 7.76675 15.6587 7.51176 15.4429 7.51176H11.4385C11.2737 7.51176 11.1539 7.35497 11.1973 7.19592Z"></path></svg>
                        </div>
                        <a class="topmenulink" href="/user/staff/?tab=typedTab" title="Перейти к типированным кандидатам">
                            <p class="card-text mb-2 d-flex">Типировано</p>
                        </a>
                        <p class="h4 text-center mb-0 d-flex text-primary"><?=$countTyping?></p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-xl-3">
                <div class="card mb-5">
                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                        <? if($countTest == 0):?>
                            <div class="d-flex rounded-xl bg-gradient-primary sw-6 sh-6 mb-3 justify-content-center align-items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-like"><path d="M7 16V9.67097C7 9.23919 7.13974 8.819 7.39832 8.47321L7.83416 7.8904C8.26979 7.30784 8.53833 6.61753 8.61086 5.89373L8.83055 3.70144C8.92826 2.72635 9.76756 1.85793 10.6682 2.24409 11.8877 2.76691 12.4524 4.15875 11.9236 6.69693 11.7865 7.35486 12.2627 8.00651 12.9348 8.00651L15.8519 8.00651C17.0126 8.00651 17.9296 8.99136 17.8468 10.1491L17.6805 12.4748C17.5611 14.1456 17.1521 15.7828 16.4718 17.3135 16.2862 17.7309 15.8722 18 15.4154 18H9C7.89543 18 7 17.1046 7 16zM4.5 9C4.96466 9 5.19698 9 5.39018 9.03843 6.18356 9.19624 6.80376 9.81644 6.96157 10.6098 7 10.803 7 11.0353 7 11.5L7 15.5C7 15.9647 7 16.197 6.96157 16.3902 6.80376 17.1836 6.18356 17.8038 5.39018 17.9616 5.19698 18 4.96466 18 4.5 18V18C4.03534 18 3.80302 18 3.60982 17.9616 2.81644 17.8038 2.19624 17.1836 2.03843 16.3902 2 16.197 2 15.9647 2 15.5L2 11.5C2 11.0353 2 10.803 2.03843 10.6098 2.19624 9.81644 2.81644 9.19624 3.60982 9.03843 3.80302 9 4.03535 9 4.5 9V9z"></path></svg>
                            </div>
                        <? else:?>
                            <div class="d-flex  sw-6 sh-6 mb-3 justify-content-center align-items-center">
<!--                                <img src="/bitrix/templates/landing_lk/3F3D.gif" alt="Пример" class="mb-2" width="100%" height="100%">-->
                                <div class="spinner-grow text-primary" role="status"></div>
                            </div>
                        <?endif;?>
                        <a class="topmenulink" href="/user/staff/?tab=testTab" title="Перейти к прошедшим тест кандидатам">
                            <p class="card-text mb-2 d-flex">Прошли тест</p>
                        </a>
                        <p class="h4 text-center mb-0 d-flex text-primary"><?=$countTest?></p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-xl-3">
                <div class="card mb-5">
                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                        <div class="d-flex rounded-xl bg-gradient-primary sw-6 sh-6 mb-3 justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-send"><path d="M12.6593 16.3216L17.5346 3.86246C17.7992 3.18631 17.9315 2.84823 17.8211 2.64418C17.7749 2.55868 17.7047 2.48851 17.6192 2.44226C17.4152 2.3319 17.0771 2.46419 16.4009 2.72877L3.94174 7.60411L3.94173 7.60411C3.24079 7.87839 2.89031 8.01553 2.81677 8.23918C2.786 8.33274 2.78356 8.43332 2.80974 8.52827C2.87231 8.75522 3.2157 8.90925 3.90249 9.21731L8.53011 11.293L8.53012 11.293C8.65869 11.3507 8.72298 11.3795 8.77572 11.4235C8.79902 11.4429 8.82052 11.4644 8.83993 11.4877C8.88385 11.5404 8.91269 11.6047 8.97037 11.7333L11.0461 16.3609C11.3541 17.0477 11.5082 17.3911 11.7351 17.4537C11.8301 17.4798 11.9306 17.4774 12.0242 17.4466C12.2479 17.3731 12.385 17.0226 12.6593 16.3216Z"></path><path d="M11.8995 8.36395L9.07111 11.1924"></path></svg>
                        </div>
                        <a class="topmenulink" href="/user/staff/?tab=inviteTab" title="Перейти к приглашенным кандидатам">
                            <p class="card-text mb-2 d-flex">Отправлено приглашений</p>
                        </a>
                        <p class="h4 text-center mb-0 d-flex text-primary"><?=$countSend?></p>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-xl-3">
                <div class="card mb-5">
                    <div class="card-body text-center align-items-center d-flex flex-column justify-content-between">
                        <div class="d-flex rounded-xl bg-gradient-primary sw-6 sh-6 mb-3 justify-content-center align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-trend-up"><path d="M17.8636 5L11.2453 11.6183C10.4771 12.3865 9.23606 12.401 8.45017 11.6508L8.27708 11.4856C7.49119 10.7354 6.25016 10.7498 5.48192 11.5181L2 15"></path><path d="M14 5H18V9"></path></svg>
                        </div>
                        <a class="topmenulink" href="/user/staff/?tab=allTab" title="Перейти ко всем кандидатам">
                            <p class="card-text mb-2 d-flex">Всего кандидатов</p>
                        </a>
                        <p class="h4 text-center mb-0 d-flex text-primary"><?=$i?></p>
                    </div>
                </div>
            </div>
        </div>


        <!--        конец статистики-->
    </main>
    <!--    функции приглашения сотрудника-->
    <?
    CModule::IncludeModule('iblock');
    $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
    $iblock_id = 3; // тут id вашего инфоблока

    //массив свойств элемента
    $props = array();

    //добавление статуса в пользовательское свойство
    $props[6] = "Приглашен";

    $arFieldsSec = array(
        'IBLOCK_ID'=>$iblock_id, // id инфоблока
        'NAME' => $_POST['email'], // тут к примеру POST переменная name. NAME это название поля в инфоблоке
        "PROPERTY_VALUES"=> $props,
    );

    // ну и добавляем через метод
    $STAFF_ID = $el->Add($arFieldsSec);//ID добавленного сотрудника
    ?>
    <?
    // включаемая область для раздела
    $APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
        "MODE"      => "php",// будет редактировать в веб-редакторе
        "NAME"      => "Библиотеки для отправки email",// Библиотеки для отправки email
        "TEMPLATE"  => "mail_template.php" // имя шаблона для нового файла
    ));
    $mail_to = $_POST['email'];
    $subject = 'Приглашение пройти тест';
    $message = 'Вас приглашают пройти тест по типированию сотрудников - https://lk.testpersonal.ru/ts/?staff='.base64_encode("staff".$STAFF_ID);
    # Если кнопка нажата
    if( isset( $_POST['invite'] ) ) {
        # отправка письма на почту
        $mail = $_POST['email'];
        if (strlen($mail) == 0) {
            echo "<script>alert('Вы не ввели email!');</script>";
        } else {
            sendMail($mail, $mail, $subject, $message);
            //переадресация на страницу после вывода сообщения
            echo "<script>
                                    location.href='/user/home/';</script>";
        }
    }
    ?>

    <!--    конец функции приглашения сотрудника-->

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
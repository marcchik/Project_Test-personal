<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(false);
$colspan = 5;

if ($arResult["CAN_EDIT"] == "Y") $colspan++;
if ($arResult["CAN_DELETE"] == "Y") $colspan++;
?>




<div class="container" id="contacts">
    <!-- Title and Top Buttons Start -->
    <div class="page-title-container">
        <div class="row g-0">
            <div class="col-auto mb-2 mb-md-0 me-auto">
                <div class="w-auto sw-md-30">
                    <h1 class="mb-0 pb-0 display-4" id="title">Финансы</h1>
                </div>
            </div>
            <div class="w-100 d-md-none"></div>
            <div class="col-12 col-sm-6 col-md-auto d-flex align-items-start justify-content-end mb-2 mb-sm-0 order-sm-3">

<!--                --><?//if ($arParams["MAX_USER_ENTRIES"] > 0 && $arResult["ELEMENTS_COUNT"] < $arParams["MAX_USER_ENTRIES"]):?>
<!--                    <a class="btn btn-outline-success btn-icon btn-icon-start ms-0 ms-sm-1 w-100 w-md-auto" href="--><?//=$arParams["EDIT_URL"]?><!--?edit=Y">-->
<!--                        --><?//=GetMessage("IBLOCK_ADD_LINK_TITLE")?>
<!--                    </a>-->
<!--                --><?//endif;?>
                <div class="dropdown d-inline-block d-lg-none">
                    <button type="button" class="btn btn-outline-primary btn-icon btn-icon-only ms-1" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-sort"><path d="M6 18 6 3M14 2 14 17"></path><path d="M3 5 6 2 9 5M11 15 14 18 17 15"></path></svg>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end custom-sort">
                        <a class="dropdown-item sort" data-sort="name" href="#">Name</a>
                        <a class="dropdown-item sort" data-sort="email" href="#">Email</a>
                        <a class="dropdown-item sort" data-sort="phone" href="#">Phone</a>
                        <a class="dropdown-item sort" data-sort="group" href="#">Group</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Title and Top Buttons End -->

    <div class="row g-0">
        <div class="col">
            <!-- List Items Start -->
            <div id="checkboxTable">
                <div class="mb-4 mb-lg-3 bg-transparent no-shadow d-none d-lg-block">
                    <div class="row g-0">
                        <div class="col-auto sw-11 d-none d-lg-flex"></div>
                        <div class="col">
                            <div class="ps-0 ps-5 pe-4 pt-0 pb-0 h-100">
                                <div class="row g-0 h-100 align-content-center custom-sort">
                                    <div class="col-3 col-lg-5 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                        <div class="text-muted text-small cursor-pointer" data-sort="name">Наименование</div>
                                    </div>
                                    <div class="col-3 col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                        <div class="text-muted text-small cursor-pointer" data-sort="email">Дата</div>
                                    </div>
                                    <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                        <div class="text-muted text-small cursor-pointer" data-sort="phone">Пополнение</div>
                                    </div>


                                    <div class="col-3 col-lg-1 d-flex flex-column pe-1 justify-content-center">
                                        <div class="text-muted text-small cursor-pointer" data-sort="group">Списание</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Items Container Start -->
                <div class="list mb-5">
                    <?if (count($arResult["ELEMENTS"]) > 0):?>
                        <!--            находим имя из всех свойств-->



                            <!--карточка-->
                            <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                                <? if ($arElement['TAGS'] != 0) continue;?>
                                <div class="card mb-2">
                                    <div class="d-none id">16</div>
                                    <div class="row g-0 h-100 sh-lg-9 position-relative">
                                        <div class="col py-3 py-sm-3">
                                            <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                                <div class="row g-0 h-100 align-content-center">
                                                    <? if (strlen($arElement['DETAIL_TEXT']) > 0):?>
                                                        <a href="/user/staff/profile/?id=<?=$arResult['PROPERTIES'][$arElement['ID']]['ID_STAFF']?>" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                            <div class="name" id="contactName"><?=$arElement["NAME"]?></div>
                                                        </a>
                                                    <?else:?>
                                                        <a href="#" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                            <div class="name" id="contactName"><?=$arElement["NAME"]?></div>
                                                        </a>
                                                    <? endif;?>
                                                    <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                        <div class="lh-1 text-alternate email" id="contactEmail">
                                                            <?=$arElement["DATE_CREATE"];?>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                        <div class="lh-1 text-alternate phone" id="contactPhone">
                                                            <!--                пополнение-->
                                                            <?if ($arElement['CODE'] == 0):?>
                                                                <?
                                                                // здесь необходимо использовать метода модуля "Информационные блоки"
                                                                $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
                                                                $iblock_id = 4; // тут id вашего инфоблока

                                                                $arLoadProductArray = Array(
                                                                    'IBLOCK_ID' => $iblock_id, // id инфоблока
                                                                    'CODE' => 0,
                                                                    'PREVIEW_TEXT' => "",
                                                                );
                                                                $PRODUCT_ID = $arElement['ID'];  // изменяем элемент с кодом (ID)
                                                                $res = $el->Update($PRODUCT_ID, $arLoadProductArray);
                                                                ?>
                                                                <?=$arElement["PREVIEW_TEXT"];?>
                                                            <?else:?>
                                                                <?=$arElement["PREVIEW_TEXT"];?>
                                                            <?endif;?>
                                                        </div>
                                                    </div>

                                                    <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                        <div class="lh-1 text-alternate phone" id="contactPhone"><?=$arElement["DETAIL_TEXT"];?></div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?endforeach?>
                            <!--конец карточки-->
                        <!--карточка-->

                        <br>
                        <div class="card mb-2">
                            <div class="d-none id">16</div>
                            <div class="row g-0 h-100 sh-lg-9 position-relative">
                                <div class="col py-3 py-sm-3">
                                    <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                        <div class="row g-0 h-100 align-content-center">

                                            <a href="#" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                <div class="name" id="contactName">Итого</div>
                                            </a>
                                            <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                <div class="lh-1 text-alternate email" id="contactEmail">

                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                <div class="lh-1 text-alternate phone" id="contactPhone">
                                                    <!--                пополнение-->
                                                    <?

                                                    //баланс
                                                    $balance = 0;
                                                    //
                                                    foreach ($arResult['ELEMENTS'] as $Item) {
                                                        //сумма всех пополнений
                                                        $arPopolnenie += $Item['PREVIEW_TEXT'];
                                                        //сумма всех списаний
                                                        $arSpisanie += $Item['DETAIL_TEXT'];
                                                    }
                                                    //баланс после списания
                                                    $balance = $arPopolnenie - $arSpisanie;

                                                    //ID вошедшего пользователя
                                                    global $USER;
                                                    $USER->GetID();

                                                    //массив всех пользователей имеющих баланс
                                                    $arrBalanceUsers = array();

                                                    $arSelect = Array("ID", "NAME", "CREATED_BY");
                                                    $arFilter = Array("IBLOCK_ID"=>5, "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y");
                                                    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
                                                    while($ob = $res->GetNextElement())
                                                    {
                                                        $arFields = $ob->GetFields();
                                                        $arrBalanceUsers[$arFields["ID"]]['userID'] = $arFields['CREATED_BY'];
                                                        $arrBalanceUsers[$arFields["ID"]]['balanceID'] = $arFields["ID"];
                                                    }


                                                    //наличие баланса
                                                    $balanceIs = false;

                                                    foreach ($arrBalanceUsers as $Item) {
                                                        if ($Item['userID'] ==  $USER->GetID()) {
                                                            $balanceIs = true;
                                                            CModule::IncludeModule('iblock');
                                                            $el = new CIBlockElement; // подключаем класс для работы с инфоблоками

                                                            $arLoadProductArray = Array(
                                                                "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                                                                "IBLOCK_SECTION" => false,          // элемент лежит в корне раздела
                                                                "ACTIVE"         => "Y",            // активен
                                                                'NAME' => 'Текущий баланс - '.$USER->GetLogin(), //
                                                                "PREVIEW_TEXT"   => $balance,
                                                            );

                                                            // ну и редактируем через метод
                                                            $PRODUCT_ID = $Item['balanceID'];  // изменяем элемент с кодом (ID) 2
                                                            $res = $el->Update($PRODUCT_ID, $arLoadProductArray);

                                                        }
                                                    }

                                                    if ($balanceIs == false) {
                                                        CModule::IncludeModule('iblock');
                                                        $el = new CIBlockElement; // подключаем класс для работы с инфоблоками
                                                        $iblock_id = 5; // тут id вашего инфоблока

                                                        $arFieldsSec = array(
                                                            'IBLOCK_ID' => $iblock_id, // id инфоблока
                                                            'NAME' => 'Текущий баланс - '.$USER->GetLogin(), //
                                                            'PREVIEW_TEXT' => $balance
                                                        );

                                                        // ну и добавляем через метод
                                                        $el->Add($arFieldsSec);
                                                    }
                                                    ?>

                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                <div class="lh-1 text-alternate phone" id="contactPhone">

                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                <div class="lh-1 text-alternate phone" id="contactPhone">
                                                    <?=$balance?>
                                                </div>
                                            </div>

                                            <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                <!--                ссылка-->
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!--конец карточки-->


                    <?else:?>
                        <tr>
                            <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
                        </tr>
                    <?endif?>


                </div>
                <!-- Items Container Start -->

                <!-- Items Pagination Start -->
<!--                <div class="w-100 d-flex justify-content-center">-->
<!--                    <div class="pagination"><li class="page-item prev disabled"><a class="page page-link shadow" href="javascript:function Z(){Z=&quot;&quot;}Z()"><i class="cs-chevron-left"></i></a></li><li class="page-item active"><a class="page page-link shadow" href="javascript:function Z(){Z=&quot;&quot;}Z()">1</a></li><li class="page-item"><a class="page page-link shadow" href="javascript:function Z(){Z=&quot;&quot;}Z()">2</a></li><li class="page-item next"><a class="page page-link shadow" href="javascript:function Z(){Z=&quot;&quot;}Z()"><i class="cs-chevron-right"></i></a></li></div>-->
<!--                </div>-->
                <!-- Items Pagination End -->

                <!-- Template for the contact items start -->
                <div class="d-none">
                    <div class="card mb-2" id="contactItemTemplate">
                        <div class="d-none id"></div>
                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                            <a href="#" class="col-auto position-relative view-click">
                                <img src="" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                            </a>
                            <div class="col py-3 py-sm-3">
                                <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                    <div class="row g-0 h-100 align-content-center">
                                        <a href="#" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                            <div class="name" id="contactName"></div>
                                            <div class="text-small text-muted text-truncate position" id="contactPosition"></div>
                                        </a>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                            <div class="lh-1 text-alternate email" id="contactEmail"></div>
                                        </div>
                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                            <div class="lh-1 text-alternate phone" id="contactPhone"></div>
                                        </div>
                                        <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                            <span class="badge bg-outline-primary group" id="contactGroup"></span>
                                        </div>
                                        <div class="col-1 col-lg-1 d-flex flex-column mb-2 mb-lg-0 align-items-end order-2 order-lg-last">
                                            <label class="form-check mt-2">
                                                <input type="checkbox" class="form-check-input pe-none">
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Template for the contact items end -->
                </div>
                <!-- List Items End -->
            </div>
        </div>

<!--        <!-- New&Edit Contact Start -->
<!--        <div class="modal modal-right fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">-->
<!--            <div class="modal-dialog">-->
<!--                <div class="modal-content">-->
<!--                    <button type="button" class="btn-close position-absolute e-2 t-2 z-index-1" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--                    <div class="modal-body d-flex flex-column">-->
<!--                        <div class="mb-3 mx-auto position-relative" id="imageUpload">-->
<!--                            <img src="img/profile/profile-11.jpg" alt="user" class="rounded-xl border border-separator-light border-4 sw-11 sh-11" id="contactThumbModal">-->
<!--                            <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light position-absolute rounded-xl s-0 b-0" type="button">-->
<!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-upload text-alternate"><path d="M18 6V5.5C18 4.09554 18 3.39331 17.6629 2.88886C17.517 2.67048 17.3295 2.48298 17.1111 2.33706C16.6067 2 15.9045 2 14.5 2H5.5C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5V6"></path><path d="M6 10 9.29289 6.70711C9.68342 6.31658 10.3166 6.31658 10.7071 6.70711L14 10M10 18 10 7"></path></svg>-->
<!--                            </button>-->
<!--                            <input class="file-upload d-none" type="file" accept="image/*" id="contactThumbInputModal">-->
<!--                        </div>-->
<!--                        <div class="mb-3 filled w-100 d-flex flex-column">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>-->
<!--                            <input class="form-control" placeholder="Name" id="contactNameModal">-->
<!--                        </div>-->
<!--                        <div class="mb-3 filled w-100 d-flex flex-column">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-suitcase"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M18 9L11.855 12.8406C11.0846 13.3221 10.6994 13.5629 10.2784 13.622C10.0937 13.648 9.90629 13.648 9.72161 13.622C9.30056 13.5629 8.91537 13.3221 8.145 12.8406L2 9"></path><path d="M11 9H10H9"></path></svg>-->
<!--                            <input class="form-control" placeholder="Position" id="contactPositionModal">-->
<!--                        </div>-->
<!--                        <div class="mb-3 filled w-100 d-flex flex-column">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>-->
<!--                            <input class="form-control" placeholder="Email" id="contactEmailModal">-->
<!--                        </div>-->
<!--                        <div class="mb-3 filled w-100 d-flex flex-column">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-phone"><path d="M2.36826 7.02416C2.12342 6.39146 2.25583 5.68011 2.67964 5.15035L4.20309 3.24603C5.07376 2.1577 6.76274 2.27131 7.47982 3.46644L8.7175 5.52926C8.89341 5.82244 8.90734 6.18516 8.75444 6.49097L8.10551 7.78883C8.03608 7.92769 7.99714 8.08102 8.00909 8.2358C8.15117 10.0757 9.92426 11.8487 11.7641 11.9908C11.9189 12.0028 12.0722 11.9638 12.2111 11.8944L13.5089 11.2455C13.8148 11.0926 14.1775 11.1065 14.4707 11.2824L16.5335 12.5201C17.7286 13.2372 17.8422 14.9262 16.7539 15.7968L14.8496 17.3203C14.3198 17.7441 13.6085 17.8765 12.9758 17.6317C7.87716 15.6586 4.34135 12.1228 2.36826 7.02416Z"></path></svg>-->
<!--                            <input class="form-control" placeholder="Phone" id="contactPhoneModal">-->
<!--                        </div>-->
<!--                        <div class="mb-3 filled w-100">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-diagram-1"><path d="M4 13.5V12C4 10.8954 4.89543 10 6 10L10 10M16 13.5V12C16 10.8954 15.1046 10 14 10L10 10M10 10V6"></path><path d="M12 3.75C12 3.04777 12 2.69665 11.8315 2.44443 11.7585 2.33524 11.6648 2.24149 11.5556 2.16853 11.3033 2 10.9522 2 10.25 2H9.75C9.04777 2 8.69665 2 8.44443 2.16853 8.33524 2.24149 8.24149 2.33524 8.16853 2.44443 8 2.69665 8 3.04777 8 3.75V4.25C8 4.95223 8 5.30335 8.16853 5.55557 8.24149 5.66476 8.33524 5.75851 8.44443 5.83147 8.69665 6 9.04777 6 9.75 6H10.25C10.9522 6 11.3033 6 11.5556 5.83147 11.6648 5.75851 11.7585 5.66476 11.8315 5.55557 12 5.30335 12 4.95223 12 4.25V3.75zM6 15.75C6 15.0478 6 14.6967 5.83147 14.4444 5.75851 14.3352 5.66476 14.2415 5.55557 14.1685 5.30335 14 4.95223 14 4.25 14H3.75C3.04777 14 2.69665 14 2.44443 14.1685 2.33524 14.2415 2.24149 14.3352 2.16853 14.4444 2 14.6967 2 15.0478 2 15.75V16.25C2 16.9522 2 17.3033 2.16853 17.5556 2.24149 17.6648 2.33524 17.7585 2.44443 17.8315 2.69665 18 3.04777 18 3.75 18H4.25C4.95223 18 5.30335 18 5.55557 17.8315 5.66476 17.7585 5.75851 17.6648 5.83147 17.5556 6 17.3033 6 16.9522 6 16.25V15.75zM18 15.75C18 15.0478 18 14.6967 17.8315 14.4444 17.7585 14.3352 17.6648 14.2415 17.5556 14.1685 17.3033 14 16.9522 14 16.25 14H15.75C15.0478 14 14.6967 14 14.4444 14.1685 14.3352 14.2415 14.2415 14.3352 14.1685 14.4444 14 14.6967 14 15.0478 14 15.75V16.25C14 16.9522 14 17.3033 14.1685 17.5556 14.2415 17.6648 14.3352 17.7585 14.4444 17.8315 14.6967 18 15.0478 18 15.75 18H16.25C16.9522 18 17.3033 18 17.5556 17.8315 17.6648 17.7585 17.7585 17.6648 17.8315 17.5556 18 17.3033 18 16.9522 18 16.25V15.75z"></path></svg>-->
<!--                            <select class="select-single-no-search-filled select2-hidden-accessible" data-placeholder="Group" id="contactGroupModal" data-select2-id="contactGroupModal" tabindex="-1" aria-hidden="true">-->
<!--                                <option label="&nbsp;" data-select2-id="2"></option>-->
<!--                                <option value="Work">Work</option>-->
<!--                                <option value="Personal">Personal</option>-->
<!--                            </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-contactGroupModal-container"><span class="select2-selection__rendered" id="select2-contactGroupModal-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Group</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                    <div class="modal-footer border-0">-->
<!--                        <button class="btn btn-icon btn-icon-only btn-outline-primary" type="button" data-delay="{&quot;show&quot;:&quot;500&quot;, &quot;hide&quot;:&quot;0&quot;}" data-bs-toggle="tooltip" data-bs-placement="top" title="" id="deleteContact" data-bs-original-title="Delete">-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-bin"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>-->
<!--                        </button>-->
<!--                        <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="saveContact">-->
<!--                            <span>Save</span>-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-check"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>-->
<!--                        </button>-->
<!--                        <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="addContact">-->
<!--                            <span>Add</span>-->
<!--                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-plus"><path d="M10 17 10 3M3 10 17 10"></path></svg>-->
<!--                        </button>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--        <!-- New&Edit Contact End -->

        <!-- Delete Confirm Modal Start -->
        <div class="modal fade modal-close-out" id="deleteConfirmModal" tabindex="-1" role="dialog" aria-labelledby="deleteConfirmModal" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="verticallyCenteredLabel">Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span id="deleteConfirmDetail" class="fw-bold"></span>
                        <span>will be deleted. Are you sure?</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">No</button>
                        <button type="button" id="deleteConfirmButton" class="btn btn-outline-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Delete Confirm Modal End -->
    </div>

</div>

<div style="margin-top: 40px;">
    <?if ($arParams["MAX_USER_ENTRIES"] > 0 && $arResult["ELEMENTS_COUNT"] < $arParams["MAX_USER_ENTRIES"]):?>

    <?else:?>
</div>
<?=GetMessage("IBLOCK_LIST_CANT_ADD_MORE")?>
<?endif?>

<div style="margin-top: 40px;">
    <?if ($arResult["NAV_STRING"] <> ''):?><?=$arResult["NAV_STRING"]?><?endif?>
</div>

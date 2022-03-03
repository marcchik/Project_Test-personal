
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

<div class="col-12 col-xl-12 col-xxl-12">
    <!-- Title Tabs Start -->
    <ul class="nav nav-tabs nav-tabs-title nav-tabs-line-title responsive-tabs" role="tablist">
        <li class="nav-item" role="presentation">
            <a id="testTabLink" class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-3 active" data-bs-toggle="tab" href="#testTab" role="tab" aria-selected="true">
                <span>Тест пройден</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a id="typedTabLink" class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-3" data-bs-toggle="tab" href="#typedTab" role="tab" aria-selected="false">
                <span>Типирован</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a id="inviteTabLink" class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-3" data-bs-toggle="tab" href="#inviteTab" role="tab" aria-selected="false">
                <span>Приглашен</span>
            </a>
        </li>
        <li class="nav-item" role="presentation">
            <a id="allTabLink" class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-3 mb-3" data-bs-toggle="tab" href="#allTab" role="tab" aria-selected="false">
                <span>Все кандидаты</span>
            </a>
        </li>
        <!--
        <li class="nav-item" role="presentation">
            <a id="arhiveTabLink" class="btn btn-sm btn-icon btn-icon-end btn-outline-primary mb-3" data-bs-toggle="tab" href="#arhiveTab" role="tab" aria-selected="false">
                <span>Архив</span>
            </a>
        </li>
        -->
        <li class="nav-item dropdown ms-auto d-none responsive-tab-dropdown">
            <a class="btn btn-icon btn-icon-only btn-background pt-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-diplay="static">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-more-horizontal"><path d="M9 10C9 9.44772 9.44772 9 10 9V9C10.5523 9 11 9.44772 11 10V10C11 10.5523 10.5523 11 10 11V11C9.44772 11 9 10.5523 9 10V10zM2 10C2 9.44772 2.44772 9 3 9V9C3.55228 9 4 9.44772 4 10V10C4 10.5523 3.55228 11 3 11V11C2.44772 11 2 10.5523 2 10V10zM16 10C16 9.44772 16.4477 9 17 9V9C17.5523 9 18 9.44772 18 10V10C18 10.5523 17.5523 11 17 11V11C16.4477 11 16 10.5523 16 10V10z"></path></svg>
            </a>
            <ul class="dropdown-menu mt-2 dropdown-menu-end"></ul>
        </li>
    </ul>
    <?
    for ($i = 0; $i < (count($arResult["ELEMENTS"]) - 1); $i++) {
        //echo "i ".$i." ) ".$arResult["ELEMENTS"][$i]['DATE_CREATE']."<br>";
        for ($j = $i + 1; $j < count($arResult["ELEMENTS"]); $j++) {
            //echo "___________________________j ".$j." ) ".$arResult["ELEMENTS"][$j]['DATE_CREATE']."<br>";
            if ($arResult["ELEMENTS"][$i]['TIMESTAMP_X_UNIX'] < $arResult["ELEMENTS"][$j]['TIMESTAMP_X_UNIX']) {
                if ($j == (count($arResult["ELEMENTS"]) - 1)) {
                    //echo "=========".$arResult["ELEMENTS"][$i]['TIMESTAMP_X']." меньше ".$arResult["ELEMENTS"][$j]['TIMESTAMP_X']."<br>";
                }
                $arrK = $arResult["ELEMENTS"][$i];
                $arResult["ELEMENTS"][$i] = $arResult["ELEMENTS"][$j];
                $arResult["ELEMENTS"][$j] = $arrK;
                $arrRes[$i] = $arResult["ELEMENTS"][$i];
            }
        }
    }
    //pr( $arResult["ELEMENTS"]);
    ?>
    <!-- Title Tabs End -->
    <div class="tab-content">
        <!-- Тест пройден Tab Start -->
        <div class="tab-pane fade active show" id="testTab" role="tabpanel">
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
                                            <div class="col-3 col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                                <div class="text-muted text-small cursor-pointer" data-sort="name">Имя</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="email">Email</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="phone">Статус</div>
                                            </div>


                                            <div class="col-3 col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="group"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Items Container Start -->
                        <div class="list mb-5">
                            <?if (count($arResult["ELEMENTS"]) > 0):?>
                                <?
                                //количество сотрудников в табе
                                $countType = 0;
                                ?>
                                <!--            находим имя из всех свойств-->
                                <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                                    <?
                                    $ID =  $arElement['ID'];
                                    foreach ($arResult['PROPERTIES'] as $item) {
                                        if ($item['ID'] === $ID) {
                                            $name_surname = $item['NAME_SURNAME'];
                                            $status = $item['STATUS'];
                                        }
                                    }
                                    ?>
                                    <?

                                    if ( $status != "Тест пройден" ) {
                                        continue;
                                    } else {
                                        $countType++;
                                    }

                                    ?>

                                    <!--карточка-->
                                    <div class="card mb-2">
                                        <div class="d-none id">16</div>
                                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                                            <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-auto position-relative ">
                                                <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                            </a>
                                            <div class="col py-3 py-sm-3">
                                                <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                                    <div class="row g-0 h-100 align-content-center">
                                                        <!--                                                    для бокового слайдера view-click-->
                                                        <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1от">
                                                            <div class="name" id="contactName"><?=$name_surname?></div>
                                                            <div class="text-small text-muted text-truncate position" id="contactPosition">Кандидат</div>
                                                        </a>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                            <div class="lh-1 text-alternate email" id="contactEmail"><?=$arElement["NAME"]?></div>
                                                        </div>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                            <div class="lh-1 text-alternate phone" id="contactPhone"> <?=$status;?></div>
                                                        </div>
                                                        <!--
                                                        <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                            <?if ($arElement["CAN_DELETE"] == "Y"):?>
                                                                <div class="form-group mx-sm-1 ">
                                                                    <form  class="form-inline" action="/user/staff/?id=<?=$arElement["ID"]?>" method="post">
                                                                        <input type="submit" value="Переместить в архив" name="addArhive" class="btn btn-icon btn-icon-start btn-outline-primary"/>
                                                                    </form>
                                                                </div>
                                                            <?else:?>&nbsp;<?endif?>
                                                        </div>
                                                        -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--конец карточки-->


                                <?endforeach?>
                            <?else:?>
                                <tr>
                                    <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
                                </tr>
                            <?endif?>

                        </div>
                        <? if ($countType == 0):?>
                            <div class="card mb-2">
                                <div class="d-none id">16</div>
                                <div class="row g-0 h-100 sh-lg-9 position-relative">
                                    <a href="#" class="col-auto position-relative ">
                                        <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                    </a>
                                    <div class="col py-3 py-sm-3">
                                        <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                            <div class="row g-0 h-100 align-content-center">

                                                <a href="#" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                    <div class="name" id="contactName">Кандидатов с этим статусом нет</div>
                                                </a>
                                                <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                    <div class="lh-1 text-alternate email" id="contactEmail">

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
                        <? endif;?>

                        <!-- Items Container Start -->

                        <!--                     Items Pagination Start-->

                        <!-- Items Pagination End -->

                        <!-- Template for the contact items start -->

                        <!-- List Items End -->
                    </div>
                </div>

                <!-- New&Edit Contact Start -->
                <div class="modal modal-right fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn-close position-absolute e-2 t-2 z-index-1" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body d-flex flex-column">
                                <form  class="form-inline" action="/user/staff/" method="post">
                                    <div style="display: none;" class="mb-3 mx-auto position-relative" id="imageUpload">
                                        <img src="/user/staff/profile/logoProfile.png" alt="user" class="rounded-xl border border-separator-light border-4 sw-11 sh-11" id="contactThumbModal">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light position-absolute rounded-xl s-0 b-0" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-upload text-alternate"><path d="M18 6V5.5C18 4.09554 18 3.39331 17.6629 2.88886C17.517 2.67048 17.3295 2.48298 17.1111 2.33706C16.6067 2 15.9045 2 14.5 2H5.5C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5V6"></path><path d="M6 10 9.29289 6.70711C9.68342 6.31658 10.3166 6.31658 10.7071 6.70711L14 10M10 18 10 7"></path></svg>
                                        </button>
                                        <input class="file-upload d-none" type="file" accept="image/*" id="contactThumbInputModal">
                                    </div>
                                    <div style="visibility: hidden;"  class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                                        <input class="form-control" placeholder="Name" id="contactNameModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-suitcase"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M18 9L11.855 12.8406C11.0846 13.3221 10.6994 13.5629 10.2784 13.622C10.0937 13.648 9.90629 13.648 9.72161 13.622C9.30056 13.5629 8.91537 13.3221 8.145 12.8406L2 9"></path><path d="M11 9H10H9"></path></svg>
                                        <input class="form-control" placeholder="Position" id="contactPositionModal">
                                    </div>
                                    <label class="form-label">Введите Email кандидата</label>
                                    <div class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                        <input name="email" class="form-control" placeholder="Email" id="contactEmailModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-phone"><path d="M2.36826 7.02416C2.12342 6.39146 2.25583 5.68011 2.67964 5.15035L4.20309 3.24603C5.07376 2.1577 6.76274 2.27131 7.47982 3.46644L8.7175 5.52926C8.89341 5.82244 8.90734 6.18516 8.75444 6.49097L8.10551 7.78883C8.03608 7.92769 7.99714 8.08102 8.00909 8.2358C8.15117 10.0757 9.92426 11.8487 11.7641 11.9908C11.9189 12.0028 12.0722 11.9638 12.2111 11.8944L13.5089 11.2455C13.8148 11.0926 14.1775 11.1065 14.4707 11.2824L16.5335 12.5201C17.7286 13.2372 17.8422 14.9262 16.7539 15.7968L14.8496 17.3203C14.3198 17.7441 13.6085 17.8765 12.9758 17.6317C7.87716 15.6586 4.34135 12.1228 2.36826 7.02416Z"></path></svg>
                                        <input class="form-control" placeholder="Phone" id="contactPhoneModal">
                                    </div>
                                    <div style="display: none;" class="mb-3 filled w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-diagram-1"><path d="M4 13.5V12C4 10.8954 4.89543 10 6 10L10 10M16 13.5V12C16 10.8954 15.1046 10 14 10L10 10M10 10V6"></path><path d="M12 3.75C12 3.04777 12 2.69665 11.8315 2.44443 11.7585 2.33524 11.6648 2.24149 11.5556 2.16853 11.3033 2 10.9522 2 10.25 2H9.75C9.04777 2 8.69665 2 8.44443 2.16853 8.33524 2.24149 8.24149 2.33524 8.16853 2.44443 8 2.69665 8 3.04777 8 3.75V4.25C8 4.95223 8 5.30335 8.16853 5.55557 8.24149 5.66476 8.33524 5.75851 8.44443 5.83147 8.69665 6 9.04777 6 9.75 6H10.25C10.9522 6 11.3033 6 11.5556 5.83147 11.6648 5.75851 11.7585 5.66476 11.8315 5.55557 12 5.30335 12 4.95223 12 4.25V3.75zM6 15.75C6 15.0478 6 14.6967 5.83147 14.4444 5.75851 14.3352 5.66476 14.2415 5.55557 14.1685 5.30335 14 4.95223 14 4.25 14H3.75C3.04777 14 2.69665 14 2.44443 14.1685 2.33524 14.2415 2.24149 14.3352 2.16853 14.4444 2 14.6967 2 15.0478 2 15.75V16.25C2 16.9522 2 17.3033 2.16853 17.5556 2.24149 17.6648 2.33524 17.7585 2.44443 17.8315 2.69665 18 3.04777 18 3.75 18H4.25C4.95223 18 5.30335 18 5.55557 17.8315 5.66476 17.7585 5.75851 17.6648 5.83147 17.5556 6 17.3033 6 16.9522 6 16.25V15.75zM18 15.75C18 15.0478 18 14.6967 17.8315 14.4444 17.7585 14.3352 17.6648 14.2415 17.5556 14.1685 17.3033 14 16.9522 14 16.25 14H15.75C15.0478 14 14.6967 14 14.4444 14.1685 14.3352 14.2415 14.2415 14.3352 14.1685 14.4444 14 14.6967 14 15.0478 14 15.75V16.25C14 16.9522 14 17.3033 14.1685 17.5556 14.2415 17.6648 14.3352 17.7585 14.4444 17.8315 14.6967 18 15.0478 18 15.75 18H16.25C16.9522 18 17.3033 18 17.5556 17.8315 17.6648 17.7585 17.7585 17.6648 17.8315 17.5556 18 17.3033 18 16.9522 18 16.25V15.75z"></path></svg>
                                        <select class="select-single-no-search-filled select2-hidden-accessible" data-placeholder="Group" id="contactGroupModal" data-select2-id="contactGroupModal" tabindex="-1" aria-hidden="true">
                                            <option label="&nbsp;" data-select2-id="2"></option>
                                            <option value="Work">Work</option>
                                            <option value="Personal">Personal</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-contactGroupModal-container"><span class="select2-selection__rendered" id="select2-contactGroupModal-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Group</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" type="button" data-delay="{&quot;show&quot;:&quot;500&quot;, &quot;hide&quot;:&quot;0&quot;}" data-bs-toggle="tooltip" data-bs-placement="top" title="" id="deleteContact" data-bs-original-title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-bin"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                                </button>
                                <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="saveContact">
                                    <span>Save</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-check"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>
                                </button>


                                <input type="submit" value="Пригласить" name="invite" class="btn btn-icon btn-icon-end btn-primary"/>



                                <!--                            добавляем нового сотрудника-->
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
                                $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
                                # Если кнопка нажата
                                if( isset( $_POST['invite'] ) )
                                {
                                    # отправка письма на почту
                                    $mail = $_POST['email'];
                                    sendMail($mail, $mail, $subject, $message);
                                    //переадресация на страницу после вывода сообщения
                                    echo "<script>alert('Письмо отправлено!');
                                    location.href='/user/staff/';</script>";
                                }
                                ?>
                                <!--                            <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="addContact">-->
                                <!--                                <span>Add</span>-->
                                <!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-plus"><path d="M10 17 10 3M3 10 17 10"></path></svg>-->
                                <!--                            </button>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- New&Edit Contact End -->

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
        <!-- Тест пройден Tab End -->

        <!-- Приглашен Tab Start -->
        <div class="tab-pane fade" id="inviteTab" role="tabpanel">
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
                                            <div class="col-3 col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                                <div class="text-muted text-small cursor-pointer" data-sort="name">Имя</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="email">Email</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="phone">Статус</div>
                                            </div>


                                            <div class="col-3 col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="group"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Items Container Start -->
                        <div class="list mb-5">
                            <?if (count($arResult["ELEMENTS"]) > 0):?>
                                <?
                                //количество сотрудников в табе
                                $countType = 0;
                                ?>
                                <!--            находим имя из всех свойств-->
                                <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                                    <?
                                    $ID =  $arElement['ID'];
                                    foreach ($arResult['PROPERTIES'] as $item) {
                                        if ($item['ID'] === $ID) {
                                            $name_surname = $item['NAME_SURNAME'];
                                            $status = $item['STATUS'];
                                        }
                                    }
                                    ?>
                                    <?
                                    if ( $status != "Приглашен" ) {
                                        continue;
                                    } else {
                                        $countType++;
                                    }

                                    ?>
                                    <!--карточка-->
                                    <div class="card mb-2">
                                        <div class="d-none id">16</div>
                                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                                            <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-auto position-relative ">
                                                <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                            </a>
                                            <div class="col py-3 py-sm-3">
                                                <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                                    <div class="row g-0 h-100 align-content-center">
                                                        <!--                                                    для бокового слайдера view-click-->
                                                        <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1от">
                                                            <div class="name" id="contactName"><?=$name_surname?></div>
                                                            <div class="text-small text-muted text-truncate position" id="contactPosition">Кандидат</div>
                                                        </a>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                            <div class="lh-1 text-alternate email" id="contactEmail"><?=$arElement["NAME"]?></div>
                                                        </div>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                            <div class="lh-1 text-alternate phone" id="contactPhone"> <?=$status;?></div>
                                                        </div>
                                                        <!--
                                                        <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                            <?if ($arElement["CAN_DELETE"] == "Y"):?>
                                                                <div class="form-group mx-sm-1 ">
                                                                    <form  class="form-inline" action="/user/staff/?id=<?=$arElement["ID"]?>" method="post">
                                                                        <input type="submit" value="Переместить в архив" name="addArhive" class="btn btn-icon btn-icon-start btn-outline-primary"/>
                                                                    </form>
                                                                </div>
                                                            <?else:?>&nbsp;<?endif?>
                                                        </div>
                                                        -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--конец карточки-->


                                <?endforeach?>
                            <?else:?>
                                <tr>
                                    <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
                                </tr>
                            <?endif?>


                        </div>
                        <? if ($countType == 0):?>
                            <div class="card mb-2">
                                <div class="d-none id">16</div>
                                <div class="row g-0 h-100 sh-lg-9 position-relative">
                                    <a href="#" class="col-auto position-relative ">
                                        <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                    </a>
                                    <div class="col py-3 py-sm-3">
                                        <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                            <div class="row g-0 h-100 align-content-center">

                                                <a href="#" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                    <div class="name" id="contactName">Кандидатов с этим статусом нет</div>
                                                </a>
                                                <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                    <div class="lh-1 text-alternate email" id="contactEmail">

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
                        <? endif;?>

                        <!-- Items Container Start -->

                        <!--                     Items Pagination Start-->

                        <!-- Items Pagination End -->

                        <!-- Template for the contact items start -->

                        <!-- List Items End -->
                    </div>
                </div>

                <!-- New&Edit Contact Start -->
                <div class="modal modal-right fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn-close position-absolute e-2 t-2 z-index-1" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body d-flex flex-column">
                                <form  class="form-inline" action="/user/staff/" method="post">
                                    <div style="display: none;" class="mb-3 mx-auto position-relative" id="imageUpload">
                                        <img src="/bitrix/templates/landing_lk" alt="user" class="rounded-xl border border-separator-light border-4 sw-11 sh-11" id="contactThumbModal">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light position-absolute rounded-xl s-0 b-0" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-upload text-alternate"><path d="M18 6V5.5C18 4.09554 18 3.39331 17.6629 2.88886C17.517 2.67048 17.3295 2.48298 17.1111 2.33706C16.6067 2 15.9045 2 14.5 2H5.5C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5V6"></path><path d="M6 10 9.29289 6.70711C9.68342 6.31658 10.3166 6.31658 10.7071 6.70711L14 10M10 18 10 7"></path></svg>
                                        </button>
                                        <input class="file-upload d-none" type="file" accept="image/*" id="contactThumbInputModal">
                                    </div>
                                    <div style="visibility: hidden;"  class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                                        <input class="form-control" placeholder="Name" id="contactNameModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-suitcase"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M18 9L11.855 12.8406C11.0846 13.3221 10.6994 13.5629 10.2784 13.622C10.0937 13.648 9.90629 13.648 9.72161 13.622C9.30056 13.5629 8.91537 13.3221 8.145 12.8406L2 9"></path><path d="M11 9H10H9"></path></svg>
                                        <input class="form-control" placeholder="Position" id="contactPositionModal">
                                    </div>
                                    <label class="form-label">Введите Email кандидата</label>
                                    <div class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                        <input name="email" class="form-control" placeholder="Email" id="contactEmailModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-phone"><path d="M2.36826 7.02416C2.12342 6.39146 2.25583 5.68011 2.67964 5.15035L4.20309 3.24603C5.07376 2.1577 6.76274 2.27131 7.47982 3.46644L8.7175 5.52926C8.89341 5.82244 8.90734 6.18516 8.75444 6.49097L8.10551 7.78883C8.03608 7.92769 7.99714 8.08102 8.00909 8.2358C8.15117 10.0757 9.92426 11.8487 11.7641 11.9908C11.9189 12.0028 12.0722 11.9638 12.2111 11.8944L13.5089 11.2455C13.8148 11.0926 14.1775 11.1065 14.4707 11.2824L16.5335 12.5201C17.7286 13.2372 17.8422 14.9262 16.7539 15.7968L14.8496 17.3203C14.3198 17.7441 13.6085 17.8765 12.9758 17.6317C7.87716 15.6586 4.34135 12.1228 2.36826 7.02416Z"></path></svg>
                                        <input class="form-control" placeholder="Phone" id="contactPhoneModal">
                                    </div>
                                    <div style="display: none;" class="mb-3 filled w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-diagram-1"><path d="M4 13.5V12C4 10.8954 4.89543 10 6 10L10 10M16 13.5V12C16 10.8954 15.1046 10 14 10L10 10M10 10V6"></path><path d="M12 3.75C12 3.04777 12 2.69665 11.8315 2.44443 11.7585 2.33524 11.6648 2.24149 11.5556 2.16853 11.3033 2 10.9522 2 10.25 2H9.75C9.04777 2 8.69665 2 8.44443 2.16853 8.33524 2.24149 8.24149 2.33524 8.16853 2.44443 8 2.69665 8 3.04777 8 3.75V4.25C8 4.95223 8 5.30335 8.16853 5.55557 8.24149 5.66476 8.33524 5.75851 8.44443 5.83147 8.69665 6 9.04777 6 9.75 6H10.25C10.9522 6 11.3033 6 11.5556 5.83147 11.6648 5.75851 11.7585 5.66476 11.8315 5.55557 12 5.30335 12 4.95223 12 4.25V3.75zM6 15.75C6 15.0478 6 14.6967 5.83147 14.4444 5.75851 14.3352 5.66476 14.2415 5.55557 14.1685 5.30335 14 4.95223 14 4.25 14H3.75C3.04777 14 2.69665 14 2.44443 14.1685 2.33524 14.2415 2.24149 14.3352 2.16853 14.4444 2 14.6967 2 15.0478 2 15.75V16.25C2 16.9522 2 17.3033 2.16853 17.5556 2.24149 17.6648 2.33524 17.7585 2.44443 17.8315 2.69665 18 3.04777 18 3.75 18H4.25C4.95223 18 5.30335 18 5.55557 17.8315 5.66476 17.7585 5.75851 17.6648 5.83147 17.5556 6 17.3033 6 16.9522 6 16.25V15.75zM18 15.75C18 15.0478 18 14.6967 17.8315 14.4444 17.7585 14.3352 17.6648 14.2415 17.5556 14.1685 17.3033 14 16.9522 14 16.25 14H15.75C15.0478 14 14.6967 14 14.4444 14.1685 14.3352 14.2415 14.2415 14.3352 14.1685 14.4444 14 14.6967 14 15.0478 14 15.75V16.25C14 16.9522 14 17.3033 14.1685 17.5556 14.2415 17.6648 14.3352 17.7585 14.4444 17.8315 14.6967 18 15.0478 18 15.75 18H16.25C16.9522 18 17.3033 18 17.5556 17.8315 17.6648 17.7585 17.7585 17.6648 17.8315 17.5556 18 17.3033 18 16.9522 18 16.25V15.75z"></path></svg>
                                        <select class="select-single-no-search-filled select2-hidden-accessible" data-placeholder="Group" id="contactGroupModal" data-select2-id="contactGroupModal" tabindex="-1" aria-hidden="true">
                                            <option label="&nbsp;" data-select2-id="2"></option>
                                            <option value="Work">Work</option>
                                            <option value="Personal">Personal</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-contactGroupModal-container"><span class="select2-selection__rendered" id="select2-contactGroupModal-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Group</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" type="button" data-delay="{&quot;show&quot;:&quot;500&quot;, &quot;hide&quot;:&quot;0&quot;}" data-bs-toggle="tooltip" data-bs-placement="top" title="" id="deleteContact" data-bs-original-title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-bin"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                                </button>
                                <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="saveContact">
                                    <span>Save</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-check"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>
                                </button>


                                <input type="submit" value="Пригласить" name="invite" class="btn btn-icon btn-icon-end btn-primary"/>



                                <!--                            добавляем нового сотрудника-->
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
                                $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
                                # Если кнопка нажата
                                if( isset( $_POST['invite'] ) )
                                {
                                    # отправка письма на почту
                                    $mail = $_POST['email'];
                                    sendMail($mail, $mail, $subject, $message);
                                    //переадресация на страницу после вывода сообщения
                                    echo "<script>alert('Письмо отправлено!');
                                    location.href='/user/staff/';</script>";
                                }
                                ?>
                                <!--                            <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="addContact">-->
                                <!--                                <span>Add</span>-->
                                <!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-plus"><path d="M10 17 10 3M3 10 17 10"></path></svg>-->
                                <!--                            </button>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- New&Edit Contact End -->

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
        <!-- Приглашен Tab End -->

        <!-- Типирован Tab Start -->
        <div class="tab-pane fade" id="typedTab" role="tabpanel">
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
                                            <div class="col-3 col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                                <div class="text-muted text-small cursor-pointer" data-sort="name">Имя</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="email">Email</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="phone">Статус</div>
                                            </div>


                                            <div class="col-3 col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="group"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Items Container Start -->
                        <div class="list mb-5">
                            <?if (count($arResult["ELEMENTS"]) > 0):?>
                                <?
                                //количество сотрудников в табе
                                $countType = 0;
                                ?>
                                <!--            находим имя из всех свойств-->
                                <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                                    <?
                                    $ID =  $arElement['ID'];
                                    foreach ($arResult['PROPERTIES'] as $item) {
                                        if ($item['ID'] === $ID) {
                                            $name_surname = $item['NAME_SURNAME'];
                                            $status = $item['STATUS'];
                                        }
                                    }
                                    ?>

                                    <?

                                    if ( $status != "Типирован" ) {
                                        continue;
                                    } else {
                                        $countType++;
                                    }

                                    ?>
                                    <!--карточка-->
                                    <div class="card mb-2">
                                        <div class="d-none id">16</div>
                                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                                            <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-auto position-relative ">
                                                <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                            </a>
                                            <div class="col py-3 py-sm-3">
                                                <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                                    <div class="row g-0 h-100 align-content-center">
                                                        <!--                                                    для бокового слайдера view-click-->
                                                        <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1от">
                                                            <div class="name" id="contactName"><?=$name_surname?></div>
                                                            <div class="text-small text-muted text-truncate position" id="contactPosition">Кандидат</div>
                                                        </a>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                            <div class="lh-1 text-alternate email" id="contactEmail"><?=$arElement["NAME"]?></div>
                                                        </div>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                            <div class="lh-1 text-alternate phone" id="contactPhone"> <?=$status;?></div>
                                                        </div>
                                                        <!--
                                                        <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                            <?if ($arElement["CAN_DELETE"] == "Y"):?>
                                                                <div class="form-group mx-sm-1 ">
                                                                    <form  class="form-inline" action="/user/staff/?id=<?=$arElement["ID"]?>" method="post">
                                                                        <input type="submit" value="    Переместить в архив" name="addArhive" class="btn btn-icon btn-icon-start btn-outline-primary"/>
                                                                    </form>
                                                                </div>

                                                            <?else:?>&nbsp;<?endif?>
                                                        </div>
                                                        -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--конец карточки-->


                                <?endforeach?>
                            <?else:?>
                                <tr>
                                    <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
                                </tr>
                            <?endif?>


                        </div>
                        <? if ($countType == 0):?>
                            <div class="card mb-2">
                                <div class="d-none id">16</div>
                                <div class="row g-0 h-100 sh-lg-9 position-relative">
                                    <a href="#" class="col-auto position-relative ">
                                        <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                    </a>
                                    <div class="col py-3 py-sm-3">
                                        <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                            <div class="row g-0 h-100 align-content-center">

                                                <a href="#" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                    <div class="name" id="contactName">Кандидатов с этим статусом нет</div>
                                                </a>
                                                <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                    <div class="lh-1 text-alternate email" id="contactEmail">

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
                        <? endif;?>

                        <!-- Items Container Start -->

                        <!--                     Items Pagination Start-->

                        <!-- Items Pagination End -->

                        <!-- Template for the contact items start -->

                        <!-- List Items End -->
                    </div>
                </div>

                <!-- New&Edit Contact Start -->
                <div class="modal modal-right fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn-close position-absolute e-2 t-2 z-index-1" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body d-flex flex-column">
                                <form  class="form-inline" action="/user/staff/" method="post">
                                    <div style="display: none;" class="mb-3 mx-auto position-relative" id="imageUpload">
                                        <img src="/user/staff/profile/logoProfile.png" alt="user" class="rounded-xl border border-separator-light border-4 sw-11 sh-11" id="contactThumbModal">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light position-absolute rounded-xl s-0 b-0" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-upload text-alternate"><path d="M18 6V5.5C18 4.09554 18 3.39331 17.6629 2.88886C17.517 2.67048 17.3295 2.48298 17.1111 2.33706C16.6067 2 15.9045 2 14.5 2H5.5C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5V6"></path><path d="M6 10 9.29289 6.70711C9.68342 6.31658 10.3166 6.31658 10.7071 6.70711L14 10M10 18 10 7"></path></svg>
                                        </button>
                                        <input class="file-upload d-none" type="file" accept="image/*" id="contactThumbInputModal">
                                    </div>
                                    <div style="visibility: hidden;"  class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                                        <input class="form-control" placeholder="Name" id="contactNameModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-suitcase"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M18 9L11.855 12.8406C11.0846 13.3221 10.6994 13.5629 10.2784 13.622C10.0937 13.648 9.90629 13.648 9.72161 13.622C9.30056 13.5629 8.91537 13.3221 8.145 12.8406L2 9"></path><path d="M11 9H10H9"></path></svg>
                                        <input class="form-control" placeholder="Position" id="contactPositionModal">
                                    </div>
                                    <label class="form-label">Введите Email кандидата</label>
                                    <div class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                        <input name="email" class="form-control" placeholder="Email" id="contactEmailModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-phone"><path d="M2.36826 7.02416C2.12342 6.39146 2.25583 5.68011 2.67964 5.15035L4.20309 3.24603C5.07376 2.1577 6.76274 2.27131 7.47982 3.46644L8.7175 5.52926C8.89341 5.82244 8.90734 6.18516 8.75444 6.49097L8.10551 7.78883C8.03608 7.92769 7.99714 8.08102 8.00909 8.2358C8.15117 10.0757 9.92426 11.8487 11.7641 11.9908C11.9189 12.0028 12.0722 11.9638 12.2111 11.8944L13.5089 11.2455C13.8148 11.0926 14.1775 11.1065 14.4707 11.2824L16.5335 12.5201C17.7286 13.2372 17.8422 14.9262 16.7539 15.7968L14.8496 17.3203C14.3198 17.7441 13.6085 17.8765 12.9758 17.6317C7.87716 15.6586 4.34135 12.1228 2.36826 7.02416Z"></path></svg>
                                        <input class="form-control" placeholder="Phone" id="contactPhoneModal">
                                    </div>
                                    <div style="display: none;" class="mb-3 filled w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-diagram-1"><path d="M4 13.5V12C4 10.8954 4.89543 10 6 10L10 10M16 13.5V12C16 10.8954 15.1046 10 14 10L10 10M10 10V6"></path><path d="M12 3.75C12 3.04777 12 2.69665 11.8315 2.44443 11.7585 2.33524 11.6648 2.24149 11.5556 2.16853 11.3033 2 10.9522 2 10.25 2H9.75C9.04777 2 8.69665 2 8.44443 2.16853 8.33524 2.24149 8.24149 2.33524 8.16853 2.44443 8 2.69665 8 3.04777 8 3.75V4.25C8 4.95223 8 5.30335 8.16853 5.55557 8.24149 5.66476 8.33524 5.75851 8.44443 5.83147 8.69665 6 9.04777 6 9.75 6H10.25C10.9522 6 11.3033 6 11.5556 5.83147 11.6648 5.75851 11.7585 5.66476 11.8315 5.55557 12 5.30335 12 4.95223 12 4.25V3.75zM6 15.75C6 15.0478 6 14.6967 5.83147 14.4444 5.75851 14.3352 5.66476 14.2415 5.55557 14.1685 5.30335 14 4.95223 14 4.25 14H3.75C3.04777 14 2.69665 14 2.44443 14.1685 2.33524 14.2415 2.24149 14.3352 2.16853 14.4444 2 14.6967 2 15.0478 2 15.75V16.25C2 16.9522 2 17.3033 2.16853 17.5556 2.24149 17.6648 2.33524 17.7585 2.44443 17.8315 2.69665 18 3.04777 18 3.75 18H4.25C4.95223 18 5.30335 18 5.55557 17.8315 5.66476 17.7585 5.75851 17.6648 5.83147 17.5556 6 17.3033 6 16.9522 6 16.25V15.75zM18 15.75C18 15.0478 18 14.6967 17.8315 14.4444 17.7585 14.3352 17.6648 14.2415 17.5556 14.1685 17.3033 14 16.9522 14 16.25 14H15.75C15.0478 14 14.6967 14 14.4444 14.1685 14.3352 14.2415 14.2415 14.3352 14.1685 14.4444 14 14.6967 14 15.0478 14 15.75V16.25C14 16.9522 14 17.3033 14.1685 17.5556 14.2415 17.6648 14.3352 17.7585 14.4444 17.8315 14.6967 18 15.0478 18 15.75 18H16.25C16.9522 18 17.3033 18 17.5556 17.8315 17.6648 17.7585 17.7585 17.6648 17.8315 17.5556 18 17.3033 18 16.9522 18 16.25V15.75z"></path></svg>
                                        <select class="select-single-no-search-filled select2-hidden-accessible" data-placeholder="Group" id="contactGroupModal" data-select2-id="contactGroupModal" tabindex="-1" aria-hidden="true">
                                            <option label="&nbsp;" data-select2-id="2"></option>
                                            <option value="Work">Work</option>
                                            <option value="Personal">Personal</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-contactGroupModal-container"><span class="select2-selection__rendered" id="select2-contactGroupModal-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Group</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" type="button" data-delay="{&quot;show&quot;:&quot;500&quot;, &quot;hide&quot;:&quot;0&quot;}" data-bs-toggle="tooltip" data-bs-placement="top" title="" id="deleteContact" data-bs-original-title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-bin"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                                </button>
                                <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="saveContact">
                                    <span>Save</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-check"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>
                                </button>


                                <input type="submit" value="Пригласить" name="invite" class="btn btn-icon btn-icon-end btn-primary"/>



                                <!--                            добавляем нового сотрудника-->
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
                                $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
                                # Если кнопка нажата
                                if( isset( $_POST['invite'] ) )
                                {
                                    # отправка письма на почту
                                    $mail = $_POST['email'];
                                    sendMail($mail, $mail, $subject, $message);
                                    //переадресация на страницу после вывода сообщения
                                    echo "<script>alert('Письмо отправлено!');
                                    location.href='/user/staff/';</script>";
                                }
                                ?>
                                <!--                            <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="addContact">-->
                                <!--                                <span>Add</span>-->
                                <!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-plus"><path d="M10 17 10 3M3 10 17 10"></path></svg>-->
                                <!--                            </button>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- New&Edit Contact End -->

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
        <!-- Friends Tab End -->

        <!-- Все Tab Start -->
        <div class="tab-pane fade" id="allTab" role="tabpanel">
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
                                            <div class="col-3 col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                                <div class="text-muted text-small cursor-pointer" data-sort="name">Имя</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="email">Email</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="phone">Статус</div>
                                            </div>


                                            <div class="col-3 col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="group"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Items Container Start -->
                        <div class="list mb-5">
                            <?if (count($arResult["ELEMENTS"]) > 0):?>
                                <?
                                //количество сотрудников в табе
                                $countType = 0;
                                ?>
                                <!--            находим имя из всех свойств-->
                                <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                                    <?
                                    $ID =  $arElement['ID'];
                                    foreach ($arResult['PROPERTIES'] as $item) {
                                        if ($item['ID'] === $ID) {
                                            $name_surname = $item['NAME_SURNAME'];
                                            $status = $item['STATUS'];
                                        }
                                    }
                                    ?>
                                    <?

                                    if ( $status == "Архив" ) {
                                        continue;
                                    } else {
                                        $countType++;
                                    }

                                    ?>

                                    <!--карточка-->
                                    <div class="card mb-2">
                                        <div class="d-none id">16</div>
                                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                                            <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-auto position-relative ">
                                                <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                            </a>
                                            <div class="col py-3 py-sm-3">
                                                <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                                    <div class="row g-0 h-100 align-content-center">
                                                        <!--                                                    для бокового слайдера view-click-->
                                                        <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1от">
                                                            <div class="name" id="contactName"><?=$name_surname?></div>
                                                            <div class="text-small text-muted text-truncate position" id="contactPosition">Кандидат</div>
                                                        </a>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                            <div class="lh-1 text-alternate email" id="contactEmail"><?=$arElement["NAME"]?></div>
                                                        </div>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                            <div class="lh-1 text-alternate phone" id="contactPhone"> <?=$status;?></div>
                                                        </div>
                                                        <!--
                                                        <div class="col-12 col-lg-1 d-flex flex-column pe-1 mb-2 mb-lg-0 align-items-start justify-content-center order-5">
                                                            <?if ($arElement["CAN_DELETE"] == "Y"):?>
                                                                <div class="form-group mx-sm-1 ">
                                                                    <form  class="form-inline" action="/user/staff/?id=<?=$arElement["ID"]?>" method="post">
                                                                        <input type="submit" value="Переместить в архив" name="addArhive" class="btn btn-icon btn-icon-start btn-outline-primary"/>
                                                                    </form>
                                                                </div>
                                                            <?else:?>&nbsp;<?endif?>
                                                        </div>
                                                        -->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--конец карточки-->


                                <?endforeach?>
                            <?else:?>
                                <tr>
                                    <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
                                </tr>
                            <?endif?>


                        </div>
                        <? if ($countType == 0):?>
                            <div class="card mb-2">
                                <div class="d-none id">16</div>
                                <div class="row g-0 h-100 sh-lg-9 position-relative">
                                    <a href="#" class="col-auto position-relative ">
                                        <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                    </a>
                                    <div class="col py-3 py-sm-3">
                                        <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                            <div class="row g-0 h-100 align-content-center">

                                                <a href="#" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                    <div class="name" id="contactName">Кандидатов с этим статусом нет</div>
                                                </a>
                                                <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                    <div class="lh-1 text-alternate email" id="contactEmail">

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
                        <? endif;?>

                        <!-- Items Container Start -->

                        <!--                     Items Pagination Start-->

                        <!-- Items Pagination End -->

                        <!-- Template for the contact items start -->

                        <!-- List Items End -->
                    </div>
                </div>

                <!-- New&Edit Contact Start -->
                <div class="modal modal-right fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn-close position-absolute e-2 t-2 z-index-1" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body d-flex flex-column">
                                <form  class="form-inline" action="/user/staff/" method="post">
                                    <div style="display: none;" class="mb-3 mx-auto position-relative" id="imageUpload">
                                        <img src="/user/staff/profile/logoProfile.png" alt="user" class="rounded-xl border border-separator-light border-4 sw-11 sh-11" id="contactThumbModal">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light position-absolute rounded-xl s-0 b-0" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-upload text-alternate"><path d="M18 6V5.5C18 4.09554 18 3.39331 17.6629 2.88886C17.517 2.67048 17.3295 2.48298 17.1111 2.33706C16.6067 2 15.9045 2 14.5 2H5.5C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5V6"></path><path d="M6 10 9.29289 6.70711C9.68342 6.31658 10.3166 6.31658 10.7071 6.70711L14 10M10 18 10 7"></path></svg>
                                        </button>
                                        <input class="file-upload d-none" type="file" accept="image/*" id="contactThumbInputModal">
                                    </div>
                                    <div style="visibility: hidden;"  class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                                        <input class="form-control" placeholder="Name" id="contactNameModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-suitcase"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M18 9L11.855 12.8406C11.0846 13.3221 10.6994 13.5629 10.2784 13.622C10.0937 13.648 9.90629 13.648 9.72161 13.622C9.30056 13.5629 8.91537 13.3221 8.145 12.8406L2 9"></path><path d="M11 9H10H9"></path></svg>
                                        <input class="form-control" placeholder="Position" id="contactPositionModal">
                                    </div>
                                    <label class="form-label">Введите Email кандидата</label>
                                    <div class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                        <input name="email" class="form-control" placeholder="Email" id="contactEmailModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-phone"><path d="M2.36826 7.02416C2.12342 6.39146 2.25583 5.68011 2.67964 5.15035L4.20309 3.24603C5.07376 2.1577 6.76274 2.27131 7.47982 3.46644L8.7175 5.52926C8.89341 5.82244 8.90734 6.18516 8.75444 6.49097L8.10551 7.78883C8.03608 7.92769 7.99714 8.08102 8.00909 8.2358C8.15117 10.0757 9.92426 11.8487 11.7641 11.9908C11.9189 12.0028 12.0722 11.9638 12.2111 11.8944L13.5089 11.2455C13.8148 11.0926 14.1775 11.1065 14.4707 11.2824L16.5335 12.5201C17.7286 13.2372 17.8422 14.9262 16.7539 15.7968L14.8496 17.3203C14.3198 17.7441 13.6085 17.8765 12.9758 17.6317C7.87716 15.6586 4.34135 12.1228 2.36826 7.02416Z"></path></svg>
                                        <input class="form-control" placeholder="Phone" id="contactPhoneModal">
                                    </div>
                                    <div style="display: none;" class="mb-3 filled w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-diagram-1"><path d="M4 13.5V12C4 10.8954 4.89543 10 6 10L10 10M16 13.5V12C16 10.8954 15.1046 10 14 10L10 10M10 10V6"></path><path d="M12 3.75C12 3.04777 12 2.69665 11.8315 2.44443 11.7585 2.33524 11.6648 2.24149 11.5556 2.16853 11.3033 2 10.9522 2 10.25 2H9.75C9.04777 2 8.69665 2 8.44443 2.16853 8.33524 2.24149 8.24149 2.33524 8.16853 2.44443 8 2.69665 8 3.04777 8 3.75V4.25C8 4.95223 8 5.30335 8.16853 5.55557 8.24149 5.66476 8.33524 5.75851 8.44443 5.83147 8.69665 6 9.04777 6 9.75 6H10.25C10.9522 6 11.3033 6 11.5556 5.83147 11.6648 5.75851 11.7585 5.66476 11.8315 5.55557 12 5.30335 12 4.95223 12 4.25V3.75zM6 15.75C6 15.0478 6 14.6967 5.83147 14.4444 5.75851 14.3352 5.66476 14.2415 5.55557 14.1685 5.30335 14 4.95223 14 4.25 14H3.75C3.04777 14 2.69665 14 2.44443 14.1685 2.33524 14.2415 2.24149 14.3352 2.16853 14.4444 2 14.6967 2 15.0478 2 15.75V16.25C2 16.9522 2 17.3033 2.16853 17.5556 2.24149 17.6648 2.33524 17.7585 2.44443 17.8315 2.69665 18 3.04777 18 3.75 18H4.25C4.95223 18 5.30335 18 5.55557 17.8315 5.66476 17.7585 5.75851 17.6648 5.83147 17.5556 6 17.3033 6 16.9522 6 16.25V15.75zM18 15.75C18 15.0478 18 14.6967 17.8315 14.4444 17.7585 14.3352 17.6648 14.2415 17.5556 14.1685 17.3033 14 16.9522 14 16.25 14H15.75C15.0478 14 14.6967 14 14.4444 14.1685 14.3352 14.2415 14.2415 14.3352 14.1685 14.4444 14 14.6967 14 15.0478 14 15.75V16.25C14 16.9522 14 17.3033 14.1685 17.5556 14.2415 17.6648 14.3352 17.7585 14.4444 17.8315 14.6967 18 15.0478 18 15.75 18H16.25C16.9522 18 17.3033 18 17.5556 17.8315 17.6648 17.7585 17.7585 17.6648 17.8315 17.5556 18 17.3033 18 16.9522 18 16.25V15.75z"></path></svg>
                                        <select class="select-single-no-search-filled select2-hidden-accessible" data-placeholder="Group" id="contactGroupModal" data-select2-id="contactGroupModal" tabindex="-1" aria-hidden="true">
                                            <option label="&nbsp;" data-select2-id="2"></option>
                                            <option value="Work">Work</option>
                                            <option value="Personal">Personal</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-contactGroupModal-container"><span class="select2-selection__rendered" id="select2-contactGroupModal-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Group</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" type="button" data-delay="{&quot;show&quot;:&quot;500&quot;, &quot;hide&quot;:&quot;0&quot;}" data-bs-toggle="tooltip" data-bs-placement="top" title="" id="deleteContact" data-bs-original-title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-bin"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                                </button>
                                <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="saveContact">
                                    <span>Save</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-check"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>
                                </button>


                                <input type="submit" value="Пригласить" name="invite" class="btn btn-icon btn-icon-end btn-primary"/>



                                <!--                            добавляем нового сотрудника-->
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
                                $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
                                # Если кнопка нажата
                                if( isset( $_POST['invite'] ) )
                                {
                                    # отправка письма на почту
                                    $mail = $_POST['email'];
                                    sendMail($mail, $mail, $subject, $message);
                                    //переадресация на страницу после вывода сообщения
                                    echo "<script>alert('Письмо отправлено!');
                                    location.href='/user/staff/';</script>";
                                }
                                ?>
                                <!--                            <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="addContact">-->
                                <!--                                <span>Add</span>-->
                                <!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-plus"><path d="M10 17 10 3M3 10 17 10"></path></svg>-->
                                <!--                            </button>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- New&Edit Contact End -->

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
        <!-- Все Tab End -->

        <!-- Архив Tab Start -->
        <div class="tab-pane fade" id="arhiveTab" role="tabpanel">
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
                                            <div class="col-3 col-lg-4 d-flex flex-column mb-lg-0 pe-3 d-flex">
                                                <div class="text-muted text-small cursor-pointer" data-sort="name">Имя</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="email">Email</div>
                                            </div>
                                            <div class="col-3 col-lg-3 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="phone">Статус</div>
                                            </div>


                                            <div class="col-3 col-lg-2 d-flex flex-column pe-1 justify-content-center">
                                                <div class="text-muted text-small cursor-pointer" data-sort="group"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Items Container Start -->
                        <div class="list mb-5">
                            <?if (count($arResult["ELEMENTS"]) > 0):?>
                                <?
                                //количество сотрудников в табе
                                $countType = 0;
                                ?>
                                <!--            находим имя из всех свойств-->
                                <?foreach ($arResult["ELEMENTS"] as $arElement):?>
                                    <?
                                    $ID =  $arElement['ID'];
                                    foreach ($arResult['PROPERTIES'] as $item) {
                                        if ($item['ID'] === $ID) {
                                            $name_surname = $item['NAME_SURNAME'];
                                            $status = $item['STATUS'];
                                        }
                                    }
                                    ?>
                                    <?
                                    if ( $status != "Архив" ) {
                                        continue;
                                    } else {
                                        $countType++;
                                    }

                                    ?>
                                    <!--карточка-->
                                    <div class="card mb-2">
                                        <div class="d-none id">16</div>
                                        <div class="row g-0 h-100 sh-lg-9 position-relative">
                                            <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>&name=<?=$name_surname?>" class="col-auto position-relative ">
                                                <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                            </a>
                                            <div class="col py-3 py-sm-3">
                                                <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                                    <div class="row g-0 h-100 align-content-center">
                                                        <!--                                                    для бокового слайдера view-click-->
                                                        <a href="/user/staff/profile/?id=<?=$arElement["ID"]?>&name=<?=$name_surname?>" class="col-11 col-lg-4 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1от">
                                                            <div class="name" id="contactName"><?=$name_surname?></div>
                                                            <div class="text-small text-muted text-truncate position" id="contactPosition">Кандидат</div>
                                                        </a>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                            <div class="lh-1 text-alternate email" id="contactEmail"><?=$arElement["NAME"]?></div>
                                                        </div>
                                                        <div class="col-12 col-lg-3 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-4">
                                                            <div class="lh-1 text-alternate phone" id="contactPhone"> <?=$status;?></div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!--конец карточки-->


                                <?endforeach?>
                            <?else:?>
                                <?

                                $rsUser = CUser::GetByID($USER->GetID());
                                $arUser = $rsUser->Fetch();


                                if ($arUser['PERSONAL_PROFESSION']) {

                                    //echo $arUser['NAME']."<br>";
                                    //echo $arUser['LAST_NAME']."<br>";
                                    //echo $arUser['EMAIL']."<br>";
                                    //echo $arUser['PERSONAL_PROFESSION']."<br>";
                                    //echo $arUser['PERSONAL_PHONE']."<br>";
                                    //echo $arUser['PERSONAL_PROFESSION']."<br>";

                                    //добавление тестового сотрудника
                                    $el = new CIBlockElement;

                                    date_default_timezone_set("Europe/Moscow");
                                    $PROP = array();
                                    $PROP[2] = $arUser['LAST_NAME']." ".$arUser['NAME'];
                                    $PROP[6] = "Типирован";
                                    //$PROP[8] = "Управляющий, 55; Администратор, 53; Педагог, 38; Няня, 36; Методист, 26; Продажник, 30; Художественный руководитель, 43; Психолог, 25";
                                    $PROP[9] = $arUser['PERSONAL_PHONE'];//tel
                                    $PROP[11] = date("d.m.Y H:i");
                                    $PROP[12] = date("d.m.Y H:i");

                                    $arLoadProductArray = Array(
                                        "CREATED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                                        "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                                        "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
                                        "IBLOCK_ID"      => 3,
                                        "PREVIEW_TEXT"   => "1051, 1052, 1054, 1055, 1056, 1060, 1061, 1062",
                                        "PROPERTY_VALUES"=> $PROP,
                                        "NAME"           => $arUser['EMAIL'],
                                        "ACTIVE"         => "Y",
                                        "DETAIL_TEXT"    => $arUser['PERSONAL_PROFESSION'],
                                        "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/user/example/photoSergeyMin.png")
                                    );

                                    $el->Add($arLoadProductArray);
                                    
                                    $addSum = 100;
                                        $arLoadProductArray1 = Array(
                                            "CREATED_BY" => $USER->GetID(),
                                            "MODIFIED_BY" => $USER->GetID(),
                                            "IBLOCK_ID" => 4,
                                            'NAME' => 'Пополнение баланса',
                                            "ACTIVE" => "Y", // активен
                                            'TAGS' => 0,
                                            'CODE' => 2,
                                            "PREVIEW_TEXT" => $addSum,
                                        );
                                        $el->Add($arLoadProductArray1);

                                        recountBalance($USER->GetID());

                                        $arLoadProductArray2 = Array(
                                            "CREATED_BY" => $USER->GetID(),
                                            "MODIFIED_BY" => $USER->GetID(),
                                            "IBLOCK_ID" => 5,
                                            "NAME" => "Текущий баланс - " . $USER->GetLogin(),
                                            "ACTIVE" => "Y",            // активен
                                            "PREVIEW_TEXT" => $addSum,
                                        );
                                        $el->Add($arLoadProductArray2);
                                        
                                    //конец добавления тестового сотрудника
                                } else {

                                    function _log($title, $data)
                                    {
                                        if (true == true) {
                                            if (!file_exists(__FILE__ . '_log')) {
                                                mkdir(__FILE__ . '_log');
                                                chmod(__FILE__ . '_log', 0777);
                                            }
                                            @file_put_contents(__FILE__ . '_log' . '/log.txt', '================ ' . $title . ' ================' . PHP_EOL . print_r($data, 1) . PHP_EOL, FILE_APPEND);
                                        }
                                        if ($_REQUEST["run"]) {
                                            echo str_replace(PHP_EOL, "<br/>", '================ ' . $title . ' ================' . PHP_EOL . print_r($data, 1) . PHP_EOL);
                                        }
                                    }

                                    function callB24Method($method, $params)
                                    {
                                        $c = curl_init('https://genie.bitrix24.ru/rest/1/fb9drtkp8ko24rvh/' . $method . '.json');

                                        curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
                                        curl_setopt($c, CURLOPT_POST, true);
                                        curl_setopt($c, CURLOPT_POSTFIELDS, http_build_query($params));

                                        $response = curl_exec($c);
                                        $response = json_decode($response, true);

                                        usleep(500000);
                                        _log('REQUEST METHOD', $method);
                                        _log('REQUEST PARAMS', $params);
                                        _log('RESPONSE', $response);
                                        return $response;
                                    }

                                    function checkFirst($id, $path, $comment) {
                                        $dir = __DIR__."/process";
                                        if (!is_dir($dir)) {
                                            mkdir(__DIR__."/process");
                                        }

                                        $dir = __DIR__."/process/".$path."/";
                                        if (!is_dir($dir)) {
                                            mkdir(__DIR__."/process/".$path."/");
                                        }

                                        $process = __DIR__.'/process/'.$path.'/'.$id."_".$comment.'.txt';
                                        if (!file_exists($process)) {
                                            $fp = fopen($process, "w");
                                            fclose($fp);
                                            return 1;
                                        } else {
                                            return 0;
                                        }
                                    }

                                    $result24 = callB24Method("crm.duplicate.findbycomm", array(
                                        "entity_type" => "CONTACT",
                                        "type" => "EMAIL",
                                        "values" => array($arUser['EMAIL']),
                                    ));


                                    $contact_id24 = $result24['result']['CONTACT'][0];

                                    if(!$contact_id24) {
                                        $result24 = callB24Method("crm.contact.add", [
                                            'fields' => [
                                                "NAME" => $arUser['NAME'],
                                                "LAST_NAME" => $arUser['LAST_NAME'],
                                                "OPENED" => "Y",
                                                "UF_CRM_5EB943318E1DA" => 1, //2- Импорт 1- Обычное создание
                                                "TYPE_ID" => 2, //Пользователь TestPersonal; 3 - Сотрудник TestPersonal
                                                "PHONE" => [["VALUE" => $arUser['PERSONAL_PHONE'], "VALUE_TYPE" => "WORK"]],
                                                "EMAIL" => [["VALUE" => $arUser['EMAIL'], "VALUE_TYPE" => "WORK"]]
                                            ],
                                            'params' => ["REGISTER_SONET_EVENT" => "Y"]
                                        ]);
                                    }

                                    //добавление тестового сотрудника
                                    $el = new CIBlockElement;

                                    date_default_timezone_set("Europe/Moscow");
                                    $PROP = array();
                                    $PROP[2] = "Иванов Иван";
                                    $PROP[6] = "Тест пройден";
                                    //$PROP[8] = "Управляющий, 55; Администратор, 53; Педагог, 38; Няня, 36; Методист, 26; Продажник, 30; Художественный руководитель, 43; Психолог, 25";
                                    $PROP[9] = "+7 (916) 123 - 45 - 67";//tel
                                    $PROP[11] = date("d.m.Y H:i");

                                    /*
                                    $arLoadProductArray = Array(
                                        "CREATED_BY" => $USER->GetID(), // элемент изменен текущим пользователем
                                        "MODIFIED_BY"    => $USER->GetID(), // элемент изменен текущим пользователем
                                        "IBLOCK_SECTION_ID" => false,          // элемент лежит в корне раздела
                                        "IBLOCK_ID"      => 3,
                                        "PROPERTY_VALUES"=> $PROP,
                                        "NAME"           => "19****@gmail.com",
                                        "ACTIVE"         => "Y",
                                        "DETAIL_TEXT"    => "E3, S78, T67, J52",
                                        "DETAIL_PICTURE" => CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"]."/user/example/photoSergeyMin.png")
                                    );
                                    */

                                    $rr = checkFirst($USER->GetID(), "finance", "add100");
                                    if($rr) {
                                        $addSum = 100;
                                        $arLoadProductArray1 = Array(
                                            "CREATED_BY" => $USER->GetID(),
                                            "MODIFIED_BY" => $USER->GetID(),
                                            "IBLOCK_ID" => 4,
                                            'NAME' => 'Пополнение баланса',
                                            "ACTIVE" => "Y", // активен
                                            'TAGS' => 0,
                                            'CODE' => 2,
                                            "PREVIEW_TEXT" => $addSum,
                                        );
                                        $el->Add($arLoadProductArray1);

                                        $arLoadProductArray2 = Array(
                                            "CREATED_BY" => $USER->GetID(),
                                            "MODIFIED_BY" => $USER->GetID(),
                                            "IBLOCK_ID" => 5,
                                            "NAME" => "Текущий баланс - " . $USER->GetLogin(),
                                            "ACTIVE" => "Y",            // активен
                                            "PREVIEW_TEXT" => $addSum,
                                        );
                                        $el->Add($arLoadProductArray2);
                                        ?>
                                            <script>
                                                //location.reload() // window.location.reload()
                                                location.href='/user/home/'
                                            </script>
                                        <?
                                    }

                                    //конец добавления тестового сотрудника
                                }
                                ?>
                                <tr>
                                    <script>
                                        //location.reload() // window.location.reload()
                                    </script>
                                    <td<?=$colspan > 1 ? " colspan=\"".$colspan."\"" : ""?>><?=GetMessage("IBLOCK_ADD_LIST_EMPTY")?></td>
                                </tr>
                            <?endif?>


                        </div>
                        <? if ($countType == 0):?>
                            <div class="card mb-2">
                                <div class="d-none id">16</div>
                                <div class="row g-0 h-100 sh-lg-9 position-relative">
                                    <a href="#" class="col-auto position-relative ">
                                        <img src="/bitrix/templates/landing_lk/st.png" alt="user" class="card-img card-img-horizontal sw-11 h-100 h-100 sh-lg-9 thumb" id="contactThumb">
                                    </a>
                                    <div class="col py-3 py-sm-3">
                                        <div class="card-body ps-5 pe-4 pt-0 pb-0 h-100">
                                            <div class="row g-0 h-100 align-content-center">

                                                <a href="#" class="col-11 col-lg-5 d-flex flex-column mb-lg-0 mb-3 mb-lg-0 pe-3 d-flex order-1 view-click">
                                                    <div class="name" id="contactName">Кандидатов с этим статусом нет</div>
                                                </a>
                                                <div class="col-12 col-lg-2 d-flex flex-column pe-1 mb-2 mb-lg-0 justify-content-center order-3">
                                                    <div class="lh-1 text-alternate email" id="contactEmail">

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
                        <? endif;?>

                        <!-- Items Container Start -->

                        <!--                     Items Pagination Start-->

                        <!-- Items Pagination End -->

                        <!-- Template for the contact items start -->

                        <!-- List Items End -->
                    </div>
                </div>

                <!-- New&Edit Contact Start -->
                <div class="modal modal-right fade" id="contactModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <button type="button" class="btn-close position-absolute e-2 t-2 z-index-1" data-bs-dismiss="modal" aria-label="Close"></button>
                            <div class="modal-body d-flex flex-column">
                                <form  class="form-inline" action="/user/staff/" method="post">
                                    <div style="display: none;" class="mb-3 mx-auto position-relative" id="imageUpload">
                                        <img src="/user/staff/profile/logoProfile.png" alt="user" class="rounded-xl border border-separator-light border-4 sw-11 sh-11" id="contactThumbModal">
                                        <button class="btn btn-sm btn-icon btn-icon-only btn-separator-light position-absolute rounded-xl s-0 b-0" type="button">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-upload text-alternate"><path d="M18 6V5.5C18 4.09554 18 3.39331 17.6629 2.88886C17.517 2.67048 17.3295 2.48298 17.1111 2.33706C16.6067 2 15.9045 2 14.5 2H5.5C4.09554 2 3.39331 2 2.88886 2.33706C2.67048 2.48298 2.48298 2.67048 2.33706 2.88886C2 3.39331 2 4.09554 2 5.5V6"></path><path d="M6 10 9.29289 6.70711C9.68342 6.31658 10.3166 6.31658 10.7071 6.70711L14 10M10 18 10 7"></path></svg>
                                        </button>
                                        <input class="file-upload d-none" type="file" accept="image/*" id="contactThumbInputModal">
                                    </div>
                                    <div style="visibility: hidden;"  class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-user"><path d="M10.0179 8C10.9661 8 11.4402 8 11.8802 7.76629C12.1434 7.62648 12.4736 7.32023 12.6328 7.06826C12.8989 6.64708 12.9256 6.29324 12.9789 5.58557C13.0082 5.19763 13.0071 4.81594 12.9751 4.42106C12.9175 3.70801 12.8887 3.35148 12.6289 2.93726C12.4653 2.67644 12.1305 2.36765 11.8573 2.2256C11.4235 2 10.9533 2 10.0129 2V2C9.03627 2 8.54794 2 8.1082 2.23338C7.82774 2.38223 7.49696 2.6954 7.33302 2.96731C7.07596 3.39365 7.05506 3.77571 7.01326 4.53982C6.99635 4.84898 6.99567 5.15116 7.01092 5.45586C7.04931 6.22283 7.06851 6.60631 7.33198 7.03942C7.4922 7.30281 7.8169 7.61166 8.08797 7.75851C8.53371 8 9.02845 8 10.0179 8V8Z"></path><path d="M16.5 17.5L16.583 16.6152C16.7267 15.082 16.7986 14.3154 16.2254 13.2504C16.0456 12.9164 15.5292 12.2901 15.2356 12.0499C14.2994 11.2842 13.7598 11.231 12.6805 11.1245C11.9049 11.048 11.0142 11 10 11C8.98584 11 8.09511 11.048 7.31945 11.1245C6.24021 11.231 5.70059 11.2842 4.76443 12.0499C4.47077 12.2901 3.95441 12.9164 3.77462 13.2504C3.20144 14.3154 3.27331 15.082 3.41705 16.6152L3.5 17.5"></path></svg>
                                        <input class="form-control" placeholder="Name" id="contactNameModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-suitcase"><path d="M14.5 5C15.9045 5 16.6067 5 17.1111 5.33706C17.3295 5.48298 17.517 5.67048 17.6629 5.88886C18 6.39331 18 7.09554 18 8.5L18 14.5C18 15.9045 18 16.6067 17.6629 17.1111C17.517 17.3295 17.3295 17.517 17.1111 17.6629C16.6067 18 15.9045 18 14.5 18L5.5 18C4.09554 18 3.39331 18 2.88886 17.6629C2.67048 17.517 2.48298 17.3295 2.33706 17.1111C2 16.6067 2 15.9045 2 14.5L2 8.5C2 7.09554 2 6.39331 2.33706 5.88886C2.48298 5.67048 2.67048 5.48298 2.88886 5.33706C3.39331 5 4.09554 5 5.5 5L14.5 5Z"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M18 9L11.855 12.8406C11.0846 13.3221 10.6994 13.5629 10.2784 13.622C10.0937 13.648 9.90629 13.648 9.72161 13.622C9.30056 13.5629 8.91537 13.3221 8.145 12.8406L2 9"></path><path d="M11 9H10H9"></path></svg>
                                        <input class="form-control" placeholder="Position" id="contactPositionModal">
                                    </div>
                                    <label class="form-label">Введите Email кандидата</label>
                                    <div class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                        <input name="email" class="form-control" placeholder="Email" id="contactEmailModal">
                                    </div>
                                    <div style="visibility: hidden;" class="mb-3 filled w-100 d-flex flex-column">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-phone"><path d="M2.36826 7.02416C2.12342 6.39146 2.25583 5.68011 2.67964 5.15035L4.20309 3.24603C5.07376 2.1577 6.76274 2.27131 7.47982 3.46644L8.7175 5.52926C8.89341 5.82244 8.90734 6.18516 8.75444 6.49097L8.10551 7.78883C8.03608 7.92769 7.99714 8.08102 8.00909 8.2358C8.15117 10.0757 9.92426 11.8487 11.7641 11.9908C11.9189 12.0028 12.0722 11.9638 12.2111 11.8944L13.5089 11.2455C13.8148 11.0926 14.1775 11.1065 14.4707 11.2824L16.5335 12.5201C17.7286 13.2372 17.8422 14.9262 16.7539 15.7968L14.8496 17.3203C14.3198 17.7441 13.6085 17.8765 12.9758 17.6317C7.87716 15.6586 4.34135 12.1228 2.36826 7.02416Z"></path></svg>
                                        <input class="form-control" placeholder="Phone" id="contactPhoneModal">
                                    </div>
                                    <div style="display: none;" class="mb-3 filled w-100">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-diagram-1"><path d="M4 13.5V12C4 10.8954 4.89543 10 6 10L10 10M16 13.5V12C16 10.8954 15.1046 10 14 10L10 10M10 10V6"></path><path d="M12 3.75C12 3.04777 12 2.69665 11.8315 2.44443 11.7585 2.33524 11.6648 2.24149 11.5556 2.16853 11.3033 2 10.9522 2 10.25 2H9.75C9.04777 2 8.69665 2 8.44443 2.16853 8.33524 2.24149 8.24149 2.33524 8.16853 2.44443 8 2.69665 8 3.04777 8 3.75V4.25C8 4.95223 8 5.30335 8.16853 5.55557 8.24149 5.66476 8.33524 5.75851 8.44443 5.83147 8.69665 6 9.04777 6 9.75 6H10.25C10.9522 6 11.3033 6 11.5556 5.83147 11.6648 5.75851 11.7585 5.66476 11.8315 5.55557 12 5.30335 12 4.95223 12 4.25V3.75zM6 15.75C6 15.0478 6 14.6967 5.83147 14.4444 5.75851 14.3352 5.66476 14.2415 5.55557 14.1685 5.30335 14 4.95223 14 4.25 14H3.75C3.04777 14 2.69665 14 2.44443 14.1685 2.33524 14.2415 2.24149 14.3352 2.16853 14.4444 2 14.6967 2 15.0478 2 15.75V16.25C2 16.9522 2 17.3033 2.16853 17.5556 2.24149 17.6648 2.33524 17.7585 2.44443 17.8315 2.69665 18 3.04777 18 3.75 18H4.25C4.95223 18 5.30335 18 5.55557 17.8315 5.66476 17.7585 5.75851 17.6648 5.83147 17.5556 6 17.3033 6 16.9522 6 16.25V15.75zM18 15.75C18 15.0478 18 14.6967 17.8315 14.4444 17.7585 14.3352 17.6648 14.2415 17.5556 14.1685 17.3033 14 16.9522 14 16.25 14H15.75C15.0478 14 14.6967 14 14.4444 14.1685 14.3352 14.2415 14.2415 14.3352 14.1685 14.4444 14 14.6967 14 15.0478 14 15.75V16.25C14 16.9522 14 17.3033 14.1685 17.5556 14.2415 17.6648 14.3352 17.7585 14.4444 17.8315 14.6967 18 15.0478 18 15.75 18H16.25C16.9522 18 17.3033 18 17.5556 17.8315 17.6648 17.7585 17.7585 17.6648 17.8315 17.5556 18 17.3033 18 16.9522 18 16.25V15.75z"></path></svg>
                                        <select class="select-single-no-search-filled select2-hidden-accessible" data-placeholder="Group" id="contactGroupModal" data-select2-id="contactGroupModal" tabindex="-1" aria-hidden="true">
                                            <option label="&nbsp;" data-select2-id="2"></option>
                                            <option value="Work">Work</option>
                                            <option value="Personal">Personal</option>
                                        </select><span class="select2 select2-container select2-container--bootstrap4" dir="ltr" data-select2-id="1" style="width: auto;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-disabled="false" aria-labelledby="select2-contactGroupModal-container"><span class="select2-selection__rendered" id="select2-contactGroupModal-container" role="textbox" aria-readonly="true"><span class="select2-selection__placeholder">Group</span></span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
                                    </div>
                            </div>
                            <div class="modal-footer border-0">
                                <button class="btn btn-icon btn-icon-only btn-outline-primary" type="button" data-delay="{&quot;show&quot;:&quot;500&quot;, &quot;hide&quot;:&quot;0&quot;}" data-bs-toggle="tooltip" data-bs-placement="top" title="" id="deleteContact" data-bs-original-title="Delete">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-bin"><path d="M4 5V14.5C4 15.9045 4 16.6067 4.33706 17.1111C4.48298 17.3295 4.67048 17.517 4.88886 17.6629C5.39331 18 6.09554 18 7.5 18H12.5C13.9045 18 14.6067 18 15.1111 17.6629C15.3295 17.517 15.517 17.3295 15.6629 17.1111C16 16.6067 16 15.9045 16 14.5V5"></path><path d="M14 5L13.9424 4.74074C13.6934 3.62043 13.569 3.06028 13.225 2.67266C13.0751 2.50368 12.8977 2.36133 12.7002 2.25164C12.2472 2 11.6734 2 10.5257 2L9.47427 2C8.32663 2 7.75281 2 7.29981 2.25164C7.10234 2.36133 6.92488 2.50368 6.77496 2.67266C6.43105 3.06028 6.30657 3.62044 6.05761 4.74074L6 5"></path><path d="M2 5H18M12 9V13M8 9V13"></path></svg>
                                </button>
                                <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="saveContact">
                                    <span>Save</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-check"><path d="M16 5L7.7051 14.2166C7.32183 14.6424 6.65982 14.6598 6.2547 14.2547L3 11"></path></svg>
                                </button>


                                <input type="submit" value="Пригласить" name="invite" class="btn btn-icon btn-icon-end btn-primary"/>



                                <!--                            добавляем нового сотрудника-->
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
                                $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
                                # Если кнопка нажата
                                if( isset( $_POST['invite'] ) )
                                {
                                    # отправка письма на почту
                                    $mail = $_POST['email'];
                                    sendMail($mail, $mail, $subject, $message);
                                    //переадресация на страницу после вывода сообщения
                                    echo "<script>alert('Письмо отправлено!');
                                    location.href='/user/staff/';</script>";
                                }
                                ?>
                                <!--                            <button class="btn btn-icon btn-icon-end btn-primary" type="button" id="addContact">-->
                                <!--                                <span>Add</span>-->
                                <!--                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-plus"><path d="M10 17 10 3M3 10 17 10"></path></svg>-->
                                <!--                            </button>-->
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- New&Edit Contact End -->

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
        <!-- Архив Tab End -->
    </div>
</div>














    <?php

    if( isset( $_POST['addArhive'] ) ) {
        // Установим новое значение для данного свойства данного элемента
        CIBlockElement::SetPropertyValuesEx($_REQUEST['id'], false, array(6 => "Архив"));
        echo "<script>alert('Сотрудник перемещен в архив!');
        location.href='/user/staff/';</script>";
    }

    if( isset( $_POST['again'] ) ) {
        sendMail_again($_POST['staff'][$_POST['mail_to']]['name_staff']);
    }
    //переход к покупке типирования
    if( isset( $_POST['typing'] ) ) {
        header('Location: /user/typing/');
    }

    //повторная отправка письма
    function sendMail_again($mail_to) {
        //ID сотрудника
        $STAFF_ID = $_POST['staff'][$_POST['mail_to']]['id_staff'];
        $subject = 'Приглашение пройти тест';
        $message = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff='.base64_encode("staff".$STAFF_ID);
        sendMail($mail_to, $mail_to, $subject, $message);
        //переадресация на страницу после вывода сообщения
        echo "<script>alert('Письмо отправлено повторно!');
        location.href='/user/staff/';</script>";
        return 1;
    }

    ?>

<?if ($arResult["NAV_STRING"] <> ''):?><?=$arResult["NAV_STRING"]?><?endif?>
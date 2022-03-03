<?
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
?> <!-- Bootstrap CSS (jsDelivr CDN) -->

<?
if (!CModule::IncludeModule("iblock"))

    return;
?>

<?

//свойства пользователя
$db_props = CIBlockElement::GetProperty(3, $_REQUEST['id'], "sort", "asc", array()); //вынимаем данные пользовательских полей
$PROPS = array();
while ($ar_props = $db_props->Fetch()) {
    $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];//конечный массив данных пользовательских свойств
}
$PROPS['PROFESSION'] = explode(';', $PROPS['PROFESSION']);
$i = 0;
foreach ($PROPS['PROFESSION'] as $Item) {
    $PROPS['PROFESSION'][$i] = explode(', ', $Item);
    $i++;
}

//заголовок страницы
if (!strlen($PROPS['NAME_SURNAME']) > 0)
    $PROPS['NAME_SURNAME'] = "Новый кандидат";

$title = "Профиль -> " . $PROPS['NAME_SURNAME'];
$APPLICATION->SetTitle($title);

//массив с данными пользователя
$arrEmployee = array();
$res = CIBlockElement::GetByID($_REQUEST['id']);
if ($ar_res = $res->GetNext())
    $arrEmployee = $ar_res;

//массив с результатом
$allResult = explode(", ", $arrEmployee['DETAIL_TEXT']);
$result = preg_replace("/[^0-9]/", '', explode(", ", $arrEmployee['DETAIL_TEXT']));
$resultLetters = preg_replace("/[0-9]/", '', explode(", ", $arrEmployee['DETAIL_TEXT']));

//профиль личности без запятых
$personalityProfile = implode("", $allResult);

//массив с характеристиками о личности
$arrAnswerTest = array();

//массив с ответом
$arrAnswer = array();
//вынимаем ответы на тест из инфоблока
$arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PROPERTY_TYPE", "PROPERTY_BOTTOM", "PROPERTY_TOP");
$arFilter = Array("IBLOCK_ID" => 6, "PROPERTY_TYPE", "PROPERTY_BOTTOM", "PROPERTY_TOP");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();
    $arrAnswer[$arFields['ID']]['name'] = $arFields['NAME'];
    $arrAnswer[$arFields['ID']]['description'] = $arFields['PREVIEW_TEXT'];
    $arrAnswer[$arFields['ID']]['type'] = $arFields['PROPERTY_TYPE_VALUE'];
    $arrAnswer[$arFields['ID']]['bottom'] = $arFields['PROPERTY_BOTTOM_VALUE'];
    $arrAnswer[$arFields['ID']]['top'] = $arFields['PROPERTY_TOP_VALUE'];
}

//массив с ответом Экстраверт-Интроверт
$arrAnswer_E_I = array();

foreach ($arrAnswer as $Item) {
    if ($result[0] != 0 && $result[0] >= $Item['bottom'] && $result[0] <= $Item['top'] && $Item['type'] == $resultLetters[0]) {
        $arrAnswer_E_I['name'] = $Item['name'];
        $arrAnswer_E_I['type'] = $Item['type'];
        $arrAnswer_E_I['bottom'] = $Item['bottom'];
        $arrAnswer_E_I['top'] = $Item['top'];
        $arrAnswer_E_I['description'] = $Item['description'];
    }
    if ($Item['type'] == $resultLetters[0] && $Item['bottom'] == $result[0] && $Item['top'] == $result[0]) {
        $arrAnswer_E_I['name'] = $Item['name'];
        $arrAnswer_E_I['type'] = $Item['type'];
        $arrAnswer_E_I['bottom'] = $Item['bottom'];
        $arrAnswer_E_I['top'] = $Item['top'];
        $arrAnswer_E_I['description'] = $Item['description'];
    }
}

//массив с ответом Интуит-Сенсорик
$arrAnswer_N_S = array();

foreach ($arrAnswer as $Item) {
    if ($result[1] != 0 && $result[1] >= $Item['bottom'] && $result[1] <= $Item['top'] && $Item['type'] == $resultLetters[1]) {
        $arrAnswer_N_S['name'] = $Item['name'];
        $arrAnswer_N_S['bottom'] = $Item['bottom'];
        $arrAnswer_N_S['top'] = $Item['top'];
        $arrAnswer_N_S['description'] = $Item['description'];
    }
    if ($Item['type'] == $resultLetters[1] && $Item['bottom'] == $result[1] && $Item['top'] == $result[1]) {
        $arrAnswer_N_S['name'] = $Item['name'];
        $arrAnswer_N_S['bottom'] = $Item['bottom'];
        $arrAnswer_N_S['top'] = $Item['top'];
        $arrAnswer_N_S['description'] = $Item['description'];
    }
}

//массив с ответом Этик-Логик
$arrAnswer_F_T = array();

foreach ($arrAnswer as $Item) {
    if ($result[2] != 0 && $result[2] >= $Item['bottom'] && $result[2] <= $Item['top'] && $Item['type'] == $resultLetters[2]) {
        $arrAnswer_F_T['name'] = $Item['name'];
        $arrAnswer_F_T['bottom'] = $Item['bottom'];
        $arrAnswer_F_T['top'] = $Item['top'];
        $arrAnswer_F_T['description'] = $Item['description'];
    }
    if ($Item['type'] == $resultLetters[2] && $Item['bottom'] == $result[2] && $Item['top'] == $result[2]) {
        $arrAnswer_F_T['name'] = $Item['name'];
        $arrAnswer_F_T['bottom'] = $Item['bottom'];
        $arrAnswer_F_T['top'] = $Item['top'];
        $arrAnswer_F_T['description'] = $Item['description'];
    }
}

//массив с ответом Рационал-Иррационал
$arrAnswer_J_P = array();

foreach ($arrAnswer as $Item) {
    if ($result[3] != 0 && $result[3] >= $Item['bottom'] && $result[3] <= $Item['top'] && $Item['type'] == $resultLetters[3]) {
        $arrAnswer_J_P['name'] = $Item['name'];
        $arrAnswer_J_P['bottom'] = $Item['bottom'];
        $arrAnswer_J_P['top'] = $Item['top'];
        $arrAnswer_J_P['description'] = $Item['description'];
    }
    if ($Item['type'] == $resultLetters[3] && $Item['bottom'] == $result[3] && $Item['top'] == $result[3]) {
        $arrAnswer_J_P['name'] = $Item['name'];
        $arrAnswer_J_P['bottom'] = $Item['bottom'];
        $arrAnswer_J_P['top'] = $Item['top'];
        $arrAnswer_J_P['description'] = $Item['description'];
    }
}


?>
<style>
    textarea {
        background: transparent;
        border: none;
    }

    input.middle {
        margin: 5px;
        outline-width: 0;
        border-color: #ffffff;
    }

    input.middle:focus {
        outline-width: 0;
        border-color: #ffffff;
    }
</style>
<? if ($USER->IsAuthorized()): ?>
    <main>
        <div class="container">
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
                <div class="row">
                    <!-- Title Start -->
                    <div class="col-12 col-md-7">
                        <h1 class="mb-0 pb-0 display-4" id="title"><?= $PROPS['NAME_SURNAME'] ?></h1>
                    </div>
                    <!-- Title End -->
                </div>
            </div>
            <!-- Title and Top Buttons End -->

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
                                        <img src="/bitrix/templates/landing_lk/staffPhoto.png"
                                             class="img-fluid rounded-xl" alt="thumb"/>
                                    </div>
                                    <div class="h5 mb-0"><?= $PROPS['NAME_SURNAME'] ?></div>
                                </div>
                            </div>
                            <div class="nav flex-column" role="tablist">
                                <a class="nav-link active px-0 border-bottom border-separator-light"
                                   data-bs-toggle="tab" href="#permissionsTab" role="tab">
                                    <i data-cs-icon="lock-off" class="me-2" data-cs-size="17"></i>
                                    <span class="align-middle">Соответствие должности</span>
                                </a>
                                <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab"
                                   href="#projectsTab" role="tab">
                                    <i data-cs-icon="suitcase" class="me-2" data-cs-size="17"></i>
                                    <span class="align-middle">Расшифровка профиля</span>
                                </a>
                                <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab"
                                   href="#overviewTab" role="tab">
                                    <i data-cs-icon="activity" class="me-2" data-cs-size="17"></i>
                                    <span class="align-middle">Информация</span>
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
                    <div class="tab-pane fade" id="overviewTab" role="tabpanel">
                        <div class="tab-pane fade active show" id="aboutTab2" role="tabpanel">
                            <h2 class="small-title">О кандидате</h2>

                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-5">
                                        <p class="text-small text-muted mb-2">E-mail</p>
                                        <a href="#" class="d-block body-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                 viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                                 stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                 class="cs-icon cs-icon-email me-2">
                                                <path
                                                    d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path>
                                                <path
                                                    d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path>
                                            </svg>
                                            <span class="align-middle"><?= $arrEmployee['NAME'] ?></span>
                                        </a>
                                    </div>
                                    <? if (strlen($PROPS['TEL']) > 0): ?>
                                        <div class="mb-5">
                                            <p class="text-small text-muted mb-2">Телефон</p>
                                            <a href="#" class="d-block body-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                     viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                     class="cs-icon cs-icon-mobile me-2">
                                                    <path
                                                        d="M4 5.5C4 4.09554 4 3.39331 4.33706 2.88886C4.48298 2.67048 4.67048 2.48298 4.88886 2.33706C5.39331 2 6.09554 2 7.5 2H12.5C13.9045 2 14.6067 2 15.1111 2.33706C15.3295 2.48298 15.517 2.67048 15.6629 2.88886C16 3.39331 16 4.09554 16 5.5V14.5C16 15.9045 16 16.6067 15.6629 17.1111C15.517 17.3295 15.3295 17.517 15.1111 17.6629C14.6067 18 13.9045 18 12.5 18H7.5C6.09554 18 5.39331 18 4.88886 17.6629C4.67048 17.517 4.48298 17.3295 4.33706 17.1111C4 16.6067 4 15.9045 4 14.5V5.5Z"></path>
                                                    <path d="M11 15H10 9M12 5H10 8"></path>
                                                </svg>
                                                <span class="align-middle"><?= $PROPS['TEL'] ?></span>
                                            </a>
                                        </div>
                                    <? else: ?>
                                        <div class="mb-5">
                                            <p class="text-small text-muted mb-2">Телефон</p>
                                            <a href="#" class="d-block body-link">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17"
                                                     viewBox="0 0 20 20" fill="none" stroke="currentColor"
                                                     stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                                     class="cs-icon cs-icon-mobile me-2">
                                                    <path
                                                        d="M4 5.5C4 4.09554 4 3.39331 4.33706 2.88886C4.48298 2.67048 4.67048 2.48298 4.88886 2.33706C5.39331 2 6.09554 2 7.5 2H12.5C13.9045 2 14.6067 2 15.1111 2.33706C15.3295 2.48298 15.517 2.67048 15.6629 2.88886C16 3.39331 16 4.09554 16 5.5V14.5C16 15.9045 16 16.6067 15.6629 17.1111C15.517 17.3295 15.3295 17.517 15.1111 17.6629C14.6067 18 13.9045 18 12.5 18H7.5C6.09554 18 5.39331 18 4.88886 17.6629C4.67048 17.517 4.48298 17.3295 4.33706 17.1111C4 16.6067 4 15.9045 4 14.5V5.5Z"></path>
                                                    <path d="M11 15H10 9M12 5H10 8"></path>
                                                </svg>
                                                <span class="align-middle">Неизвестно</span>
                                            </a>
                                        </div>
                                    <? endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Overview Tab End -->

                    <!-- Projects Tab Start -->
                    <div class="tab-pane fade" id="projectsTab" role="tabpanel">
                        <!-- Stats Start -->
                        <h2 class="small-title">Статистика</h2>

                        <div class="mb-5">
                            <div class="row g-2">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Профиль</span>
                                                <i data-cs-icon="suitcase" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($personalityProfile) > 0): ?>
                                                <div class="cta-1 text-primary"><?= $personalityProfile ?></div>
                                                <div class="text-small text-muted mb-1">Типирован</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Результат</div>
                                                <div class="text-small text-muted mb-1">Не типирован</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Приглашен</span>
                                                <i data-cs-icon="check-square" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($arrEmployee['DATE_CREATE']) > 0): ?>
                                                <div class="cta-1 text-primary"><?= substr($arrEmployee['DATE_CREATE'], 0, -3); ?></div>
                                                <div class="text-small text-muted mb-1">Приглашен</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Дата</div>
                                                <div class="text-small text-muted mb-1">Отправить приглашение</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Тест пройден</span>
                                                <i data-cs-icon="file-empty" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($PROPS['DATE_TEST']) > 0): ?>
                                                <div class="cta-1 text-primary"><?= $PROPS['DATE_TEST'] ?></div>
                                                <div class="text-small text-muted mb-1">Тест пройден</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Дата</div>
                                                <div class="text-small text-muted mb-1">Тест не пройден</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Типирован</span>
                                                <i data-cs-icon="screen" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($PROPS['DATE_TYPING']) > 0): ?>
                                                <div class="cta-1 text-primary"><?= $PROPS['DATE_TYPING'] ?></div>
                                                <div class="text-small text-muted mb-1">Типирован</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Дата</div>
                                                <div class="text-small text-muted mb-1">Типировать</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Stats End -->
                        <? if ($PROPS['STATUS'] == "Типирован"): ?>
                            <h2 class="small-title">Расшифровка</h2>

                            <div class="card mb-1">
                                <div class="card-body">
                                    <h2 class="small-title">Тип энергии <?= $allResult[0] ?>
                                        %: <?= $arrAnswer_E_I['name'] ?></h2>

                                    <p class="mb-0"><?= $arrAnswer_E_I['description'] ?></p>
                                </div>
                            </div>

                            <div class="card mb-1">
                                <div class="card-body">
                                    <h2 class="small-title">Тип мышления <?= $allResult[1] ?>
                                        %: <?= $arrAnswer_N_S['name'] ?></h2>

                                    <p class="mb-0"><?= $arrAnswer_N_S['description'] ?></p>
                                </div>
                            </div>

                            <div class="card mb-1">
                                <div class="card-body">
                                    <h2 class="small-title"> Система ценностей <?= $allResult[2] ?>
                                        %: <?= $arrAnswer_F_T['name'] ?></h2>

                                    <p class="mb-0"><?= $arrAnswer_F_T['description'] ?></p>
                                </div>
                            </div>

                            <div class="card mb-1">
                                <div class="card-body">
                                    <h2 class="small-title">Внутренняя организация <?= $allResult[3] ?>
                                        %: <?= $arrAnswer_J_P['name'] ?></h2>

                                    <p class="mb-0"><?= $arrAnswer_J_P['description'] ?></p>
                                </div>
                            </div>
                        <? elseif ($PROPS['STATUS'] == "Тест пройден"): ?>
                            <h2 class="small-title">Расшифрока недоступна</h2>

                            <div class="card mb-1">
                                <div class="card-body">
                                    <h2 class="small-title">Сотрудник</h2>

                                    <p class="mb-0">Не типирован</p>
                                </div>
                            </div>
                        <? else: ?>
                            <h2 class="small-title">Расшифрока недоступна</h2>

                            <div class="card mb-1">
                                <div class="card-body">
                                    <h2 class="small-title">Сотрудник</h2>

                                    <p class="mb-0">Не прошел тест</p>
                                </div>
                            </div>
                        <? endif; ?>

                    </div>
                    <!-- Projects Tab End -->

                    <!-- Permissions Tab Start -->
                    <div class="tab-pane fade show active" id="permissionsTab" role="tabpanel">

                        <!-- Progress Start -->
                        <!-- Content Start -->
                        <div>


                            <!-- Circle Start -->
                            <section class="scroll-section" id="circle">
                                <h2 class="small-title">Профессии</h2>
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12 col-sm-12 col-lg-12">
                                                <div class="nav flex-column" role="tablist">
                                                    <a class="nav-link px-0 border-bottom border-separator-light"
                                                       data-bs-toggle="tab" href="#projectsTab" role="tab">
                                                        <i data-cs-icon="suitcase" class="me-2" data-cs-size="17"></i>
                                                        <span class="align-middle">Психологический профиль<span
                                                                class="cta-1 text-primary">  <?= $personalityProfile ?></span></span>
                                                    </a>
                                                    <?
                                                    //массив разделов профессий
                                                    $arrSectionProfessionsDefault = array();

                                                    $i = 0;
                                                    $arSelect = Array();
                                                    $arFilter = Array("IBLOCK_ID" => 7);
                                                    $res = CIBlockSection::GetList(Array(), $arFilter, false, Array(), $arSelect);
                                                    while ($ob = $res->GetNextElement()) {
                                                        $arFields = $ob->GetFields();
                                                        //pr($arFields);
                                                        $arrSectionProfessionsDefault[$i] = $arFields['NAME'];
                                                        $i++;
                                                    }



                                                    //массив с профилями профессий
                                                    $arrProfessionsDefault = array();

                                                    $i = 0;
                                                    $arSelect = Array("NAME", "PREVIEW_TEXT", "IBLOCK_SECTION_ID");
                                                    $arFilter = Array("IBLOCK_ID" => 7);
                                                    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
                                                    while ($ob = $res->GetNextElement()) {
                                                        $arFields = $ob->GetFields();
                                                        //pr($arFields);
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i] = $arFields;
                                                        $arrResult = explode(', ', $arFields['PREVIEW_TEXT']);

                                                        $letter1 = substr($arrResult[0], 0, 1); // возвращает букву
                                                        $percent1 = substr($arrResult[0], 1, 2); // возвращает цифру

                                                        $letter2 = substr($arrResult[1], 0, 1); // возвращает букву
                                                        $percent2 = substr($arrResult[1], 1, 2); // возвращает цифру

                                                        $letter3 = substr($arrResult[2], 0, 1); // возвращает букву
                                                        $percent3 = substr($arrResult[2], 1, 2); // возвращает цифру

                                                        $letter4 = substr($arrResult[3], 0, 1); // возвращает букву
                                                        $percent4 = substr($arrResult[3], 1, 2); // возвращает цифру
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'] = array();

                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][0]['letter'] = $letter1;
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][1]['letter'] = $letter2;
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][2]['letter'] = $letter3;
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][3]['letter'] = $letter4;

                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][0]['percent'] = $percent1;
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][1]['percent'] = $percent2;
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][2]['percent'] = $percent3;
                                                        $arrProfessionsDefault[$ob->GetFields()['IBLOCK_SECTION_ID']][$i]['PREVIEW_TEXT'][3]['percent'] = $percent4;

                                                        $i++;
                                                    }
                                                    //новый подсчет процентов профессий

                                                    //направление векторов в профиле кандидата
                                                    if ($resultLetters[0] == "I")
                                                        $markProfile1 = 1;
                                                    else
                                                        $markProfile1 = -1;

                                                    if ($resultLetters[1] == "N")
                                                        $markProfile2 = 1;
                                                    else
                                                        $markProfile2 = -1;

                                                    if ($resultLetters[2] == "F")
                                                        $markProfile3 = 1;
                                                    else
                                                        $markProfile3 = -1;

                                                    if ($resultLetters[3] == "P")
                                                        $markProfile4 = 1;
                                                    else
                                                        $markProfile4 = -1;

                                                    //процентры всех профессий
                                                    $FINAL = array();
                                                    $countSection = 0;

                                                    //списко профессий из админки
                                                    $arrProfessionsAdmin = array();

                                                    foreach ($arrProfessionsDefault as $Section) {
                                                        $i = 0;
                                                        $countSection++;
                                                        foreach ($Section as $Profession) {
                                                            $arrProfessionsAdmin[$countSection][] = $Profession['NAME'];

                                                            //направление векторов в профиле профессии
                                                            if ($Profession['PREVIEW_TEXT'][0]['letter'] == "I")
                                                                $mark1 = 1;
                                                            else
                                                                $mark1 = -1;

                                                            if ($Profession['PREVIEW_TEXT'][1]['letter'] == "N")
                                                                $mark2 = 1;
                                                            else
                                                                $mark2 = -1;

                                                            if ($Profession['PREVIEW_TEXT'][2]['letter'] == "F")
                                                                $mark3 = 1;
                                                            else
                                                                $mark3 = -1;

                                                            if ($Profession['PREVIEW_TEXT'][3]['letter'] == "P")
                                                                $mark4 = 1;
                                                            else
                                                                $mark4 = -1;

                                                            $Y1 = 100 - abs(($mark1 * $Profession['PREVIEW_TEXT'][0]['percent']) - ($markProfile1 * $result[0]));
                                                            $Y2 = 100 - abs(($mark2 * $Profession['PREVIEW_TEXT'][1]['percent']) - ($markProfile2 * $result[1]));
                                                            $Y3 = 100 - abs(($mark3 * $Profession['PREVIEW_TEXT'][2]['percent']) - ($markProfile3 * $result[2]));
                                                            $Y4 = 100 - abs(($mark4 * $Profession['PREVIEW_TEXT'][3]['percent']) - ($markProfile4 * $result[3]));

                                                            if ($Y1 < 0)
                                                                $Y1 = 0;

                                                            if ($Y2 < 0)
                                                                $Y2 = 0;

                                                            if ($Y3 < 0)
                                                                $Y3 = 0;

                                                            if ($Y4 < 0)
                                                                $Y4 = 0;

                                                            $FINAL = round((($Y1 + $Y2 + $Y3 + $Y4)) / 4);

                                                            $FINAL_ARRAY[$countSection][$i][0] = $Profession['NAME'];
                                                            $FINAL_ARRAY[$countSection][$i][1] = $FINAL;

                                                            $i++;

                                                        }
                                                    }
                                                    $PROPS['PROFESSION'] = array();

                                                    $PROPS['PROFESSION'] = $FINAL_ARRAY[1];

                                                    //pr( $PROPS['PROFESSION']);
                                                    //конец подсчет процентов профессий
                                                    ?>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="row">
                                            <form action="/user/staff/profile/typing/?id=<?=$_REQUEST['id']?>&status=<?=$PROPS['STATUS']?>"
                                                  method="post">
                                                <div class="row g-2">

                                                    <? if ($PROPS['STATUS'] == "Тест пройден" || $PROPS['STATUS'] == "Типирован"): ?>
                                                        <div class="col-sm-6 col-xxl-3">
                                                            <select name="professionsGroup" id="group"
                                                                    class="form-select">
                                                                <option value="bra" hidden>Выберите группу</option>
                                                                <? foreach ($arrSectionProfessionsDefault as $key => $Section): ?>
                                                                    <option value="<?=$key+1?>"><?=$Section?></option>
                                                                <? endforeach; ?>
                                                            </select>
                                                        </div>
                                                    <?
                                                    //строка со старым типированием
                                                    $oldTyping = "";
                                                    $arSelect = Array("ID", "PREVIEW_TEXT");
                                                    $arFilter = Array("ID" => $_REQUEST['id']);
                                                    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
                                                    while ($ob = $res->GetNextElement()) {
                                                        $arFields = $ob->GetFields();
                                                        $oldTyping = explode(',', $arFields['PREVIEW_TEXT']);
                                                    }

                                                    //коэффиценты
                                                    //Управляющий
                                                    $k1 = 0;
                                                    //Администратор
                                                    $k2 = 0;
                                                    //Продажник
                                                    $k3 = 0;
                                                    //Психолог
                                                    $k4 = 0;
                                                    //Педагог
                                                    $k5 = 0;
                                                    //Методист
                                                    $k6 = 0;
                                                    //Художественный руководитель
                                                    $k7 = 0;
                                                    //Няня
                                                    $k8 = 0;

                                                    //массив с не типируемыми профессиями
                                                    $arrNotTypedProfessions = array();

                                                    foreach ($arrProfessionsAdmin as $key1 => $Section) {
                                                        foreach ($Section as $key2 => $Profession) {
                                                            foreach ($oldTyping as $profTyped) {
                                                                if (trim($Profession) == trim($profTyped)) {
                                                                    unset($arrProfessionsAdmin[$key1][$key2]);
                                                                }
                                                            }
                                                        }
                                                    }


                                                    foreach ($oldTyping as $itemProfession) {
                                                        $itemProfession = trim($itemProfession);
                                                        if ($itemProfession == "Управляющий") {
                                                            $k1++;
                                                        }
                                                        if ($itemProfession == "Администратор") {
                                                            $k2++;
                                                        }
                                                        if ($itemProfession == "Продажник") {
                                                            $k3++;
                                                        }
                                                        if ($itemProfession == "Психолог") {
                                                            $k4++;
                                                        }
                                                        if ($itemProfession == "Педагог") {
                                                            $k5++;
                                                        }
                                                        if ($itemProfession == "Методист") {
                                                            $k6++;
                                                        }
                                                        if ($itemProfession == "Художественный руководитель") {
                                                            $k7++;
                                                        }
                                                        if ($itemProfession == "Няня") {
                                                            $k8++;
                                                        }
                                                    }

                                                    ?>
                                                        <script>
                                                            function enableStartBtn() {
                                                                $('#startBtn').removeAttr('disabled');
                                                            }
                                                            function checkBalance() {
                                                                var val = document.getElementById('elem1').value;
                                                            }
                                                        </script>

                                                        <div class="col-sm-6 col-xxl-3">

                                                            <select name="professionChoose" id="profession" class="form-select"></select>

                                                            <script>
                                                                var cities = {

                                                                    <? $i = 1; ?>
                                                                    <? foreach ($arrProfessionsAdmin as $key1 => $Section): ?>
                                                                    <? echo $key1.": ["?>
                                                                    <? $j = 1;?>
                                                                    <? foreach ($Section as $key2 => $Profession): ?>
                                                                    <? if ($j == count($Section)): ?>
                                                                    <? echo '"'.$Profession.'"'?>
                                                                    <? else: ?>
                                                                    <? echo ' "'.$Profession.'", '?>
                                                                    <? endif; ?>
                                                                    <? $j++; ?>
                                                                    <? endforeach; ?>
                                                                    <? if ($i == count($arrProfessionsAdmin)): ?>
                                                                    <? echo "]"?>
                                                                    <? else: ?>
                                                                    <? echo "],"?>
                                                                    <? endif; ?>
                                                                    <? $i++; ?>
                                                                    <? endforeach; ?>

                                                                };
                                                                var group = document.getElementById("group");
                                                                var profession = document.querySelector("#profession");
                                                                window.onload = selectGroup;
                                                                group.onchange = selectGroup;
                                                                function selectGroup(ev) {

                                                                    profession.innerHTML = "";
                                                                    var c = this.value, o;
                                                                    for (let i = 0; i < cities[c].length; i++) {
                                                                        o = new Option(cities[c][i], cities[c][i], false, false);
                                                                        profession.add(o);
                                                                        $('#startBtn').removeAttr('disabled');
                                                                    }
                                                                    ;
                                                                }
                                                            </script>
                                                        </div>
                                                        <div class="col-sm-6 col-xxl-3">
                                                            <button type="submit" onclick="checkBalance()"
                                                                    disabled="disabled" id="startBtn"
                                                                    class="btn btn-primary">Типировать
                                                            </button>
                                                        </div>
                                                </div>
                                            </form>
                                            </div></div></div>
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <div class="row">

                                                        <script>
                                                            function doRedirect() {
                                                                atTime = "1400";
                                                                toUrl = "/user/staff/";

                                                                setTimeout("location.href = toUrl;", atTime);
                                                            }
                                                        </script>
                                                    <? else: ?>
                                                        <div class="alert alert-warning" role="alert">Вы не можете
                                                            типировать этого кандидата, т.к. он не прошел тест!
                                                        </div>
                                                    <? endif; ?>


                                                    <div class="col-sm-6 col-xxl-3">
                                                        <label class="mb-3"></label>
                                                    </div>

                                                    <div class="col-sm-6 col-xxl-3">
                                                        <label class="mb-3"></label>
                                                    </div>
                                                    <div class="col-sm-6 col-xxl-3">
                                                        <label class="mb-3"></label>
                                                    </div>
                                                    <div class="col-sm-6 col-xxl-3">
                                                        <label class="mb-3"></label>
                                                    </div>



                                                    <?

                                                    //прошлое типирование
                                                    $valueTyping = "";
                                                    $arSelect = Array("ID", "PREVIEW_TEXT");
                                                    $arFilter = Array("ID" => $_REQUEST['id']);
                                                    $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize" => 50), $arSelect);
                                                    while ($ob = $res->GetNextElement()) {
                                                        $arFields = $ob->GetFields();
                                                        $valueTyping = $arFields['PREVIEW_TEXT'];
                                                    }
                                                    //массив с типированными профессиями
                                                    $arrTyping = explode(", ", $valueTyping);

                                                    //удаление пустых элементов
                                                    foreach ($arrTyping as $element) {
                                                        if (!empty($element)) {
                                                            $new_arrTyping[] = $element;
                                                        }
                                                    }

                                                    $arrTyping = $new_arrTyping;
                                                    ?>

                                                    <? if (isset($arrTyping)): ?>
                                                        <div class="col-sm-6 col-xxl-3">
                                                            <label class="mb-3">Группа</label>
                                                        </div>
                                                        <div class="col-sm-6 col-xxl-3">
                                                            <label class="mb-3">Должность</label>
                                                        </div>
                                                        <div class="col-sm-6 col-xxl-3">
                                                            <label class="mb-3">Соответствие должности</label>
                                                        </div>
                                                        <div class="col-sm-6 col-xxl-3">
                                                            <label class="mb-3">Результат</label>
                                                        </div>
                                                        <hr>
                                                        <? foreach ($arrTyping as $profession): ?>
                                                            <? if ($profession == "Управляющий"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Управляющий</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][0][1]; ?>%;"><?= $PROPS['PROFESSION'][0][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][0][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][0][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][0][1] >= 20 && $PROPS['PROFESSION'][0][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][0][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][0][1] >= 40 && $PROPS['PROFESSION'][0][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][0][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][0][1] >= 60 && $PROPS['PROFESSION'][0][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][0][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][0][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][0][1] ?>
                                                                            %)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                            <? if ($profession == "Администратор"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Администратор</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][1][1]; ?>%;"><?= $PROPS['PROFESSION'][1][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][1][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][1][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][1][1] >= 20 && $PROPS['PROFESSION'][1][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][1][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][1][1] >= 40 && $PROPS['PROFESSION'][1][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][1][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][1][1] >= 60 && $PROPS['PROFESSION'][1][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][1][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][1][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][1][1] ?>
                                                                            %)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                            <? if ($profession == "Педагог"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Педагог</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][2][1]; ?>%;"><?= $PROPS['PROFESSION'][2][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][2][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][2][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][2][1] >= 20 && $PROPS['PROFESSION'][2][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][2][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][2][1] >= 40 && $PROPS['PROFESSION'][2][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][2][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][2][1] >= 60 && $PROPS['PROFESSION'][2][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][2][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][2][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][2][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                            <? if ($profession == "Няня"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Няня</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][3][1]; ?>%;"><?= $PROPS['PROFESSION'][3][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][3][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][3][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][3][1] >= 20 && $PROPS['PROFESSION'][3][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][3][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][3][1] >= 40 && $PROPS['PROFESSION'][3][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][3][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][3][1] >= 60 && $PROPS['PROFESSION'][3][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][3][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][3][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][3][1] ?>
                                                                            %)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                            <? if ($profession == "Методист"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Методист</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][4][1]; ?>%;"><?= $PROPS['PROFESSION'][4][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][4][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][4][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][4][1] >= 20 && $PROPS['PROFESSION'][4][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][4][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][4][1] >= 40 && $PROPS['PROFESSION'][4][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][4][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][4][1] >= 60 && $PROPS['PROFESSION'][4][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][4][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][4][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][4][1] ?>
                                                                            %)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                            <? if ($profession == "Продажник"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Продажник</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][5][1]; ?>%;"><?= $PROPS['PROFESSION'][5][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][5][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][5][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][5][1] >= 20 && $PROPS['PROFESSION'][5][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][5][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][5][1] >= 40 && $PROPS['PROFESSION'][5][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][5][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][5][1] >= 60 && $PROPS['PROFESSION'][5][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][5][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][5][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][5][1] ?>
                                                                            %)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                            <? if ($profession == "Художественный руководитель"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Художественный
                                                                        руководитель</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][6][1]; ?>%;"><?= $PROPS['PROFESSION'][6][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][6][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][6][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][6][1] >= 20 && $PROPS['PROFESSION'][6][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][6][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][6][1] >= 40 && $PROPS['PROFESSION'][6][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][6][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][6][1] >= 60 && $PROPS['PROFESSION'][6][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][6][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][6][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][6][1] ?>
                                                                            %)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                            <? if ($profession == "Психолог"): ?>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Основная группа</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <label class="mb-3">Психолог</label>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <div class="progress sh-2">
                                                                        <div class="progress-bar" role="progressbar"
                                                                             aria-valuenow="25" aria-valuemin="0"
                                                                             aria-valuemax="100"
                                                                             style="width: <?= $PROPS['PROFESSION'][7][1]; ?>%;"><?= $PROPS['PROFESSION'][7][1]; ?>
                                                                            %
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-sm-6 col-xxl-3">
                                                                    <? if ($PROPS['PROFESSION'][7][1] < 20): ?>
                                                                        <label class="mb-3">Не подходит
                                                                            (<?= $PROPS['PROFESSION'][7][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][7][1] >= 20 && $PROPS['PROFESSION'][7][1] < 40): ?>
                                                                        <label class="mb-3">Слабо подходит
                                                                            (<?= $PROPS['PROFESSION'][7][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][7][1] >= 40 && $PROPS['PROFESSION'][7][1] < 60): ?>
                                                                        <label class="mb-3">Средне подходит
                                                                            (<?= $PROPS['PROFESSION'][7][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][7][1] >= 60 && $PROPS['PROFESSION'][7][1] < 80): ?>
                                                                        <label class="mb-3">Хорошо подходит
                                                                            (<?= $PROPS['PROFESSION'][7][1] ?>%)</label>
                                                                    <? endif; ?>
                                                                    <? if ($PROPS['PROFESSION'][7][1] >= 80): ?>
                                                                        <label class="mb-3">Идеально
                                                                            подходит(<?= $PROPS['PROFESSION'][7][1] ?>
                                                                            %)</label>
                                                                    <? endif; ?>
                                                                </div>
                                                            <? endif; ?>
                                                        <? endforeach ?>

                                                    <? else: ?>
                                                        <div class="alert alert-primary" role="alert">Кандидат еще не был типирован!</div>
                                                    <? endif; ?>
                                        </div>
                                    </div>
                                </div>

                            </section>
                            <!-- Circle End -->


                        </div>
                        <!-- Content End -->
                        <!-- Progress End -->
                    </div>
                    <!-- Permissions Tab End -->

                    <!-- Friends Tab Start -->

                    <!-- About Tab Start -->
                    <div class="tab-pane fade" id="aboutTab" role="tabpanel">
                        <!-- Stats Start -->
                        <h2 class="small-title">Статистика</h2>

                        <div class="mb-5">
                            <div class="row g-2">
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Профиль</span>
                                                <i data-cs-icon="suitcase" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($personalityProfile) > 0): ?>
                                                <div class="cta-1 text-primary"><?= $personalityProfile ?></div>
                                                <div class="text-small text-muted mb-1">Типирован</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Результат</div>
                                                <div class="text-small text-muted mb-1">Не типирован</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Приглашен</span>
                                                <i data-cs-icon="check-square" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($arrEmployee['DATE_CREATE']) > 0): ?>
                                                <div class="cta-1 text-primary"><?= $arrEmployee['DATE_CREATE'] ?></div>
                                                <div class="text-small text-muted mb-1">Приглашен</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Дата</div>
                                                <div class="text-small text-muted mb-1">Отправить приглашение</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Тест пройден</span>
                                                <i data-cs-icon="file-empty" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($PROPS['DATE_TEST']) > 0): ?>
                                                <div class="cta-1 text-primary"><?= $PROPS['DATE_TEST'] ?></div>
                                                <div class="text-small text-muted mb-1">Тест пройден</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Дата</div>
                                                <div class="text-small text-muted mb-1">Тест не пройден</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6 col-lg-3">
                                    <div class="card hover-border-primary">
                                        <div class="card-body">
                                            <div class="heading mb-0 d-flex justify-content-between lh-1-25 mb-3">
                                                <span>Типирован</span>
                                                <i data-cs-icon="screen" class="text-primary"></i>
                                            </div>
                                            <? if (strlen($PROPS['DATE_TYPING']) > 0): ?>
                                                <div class="cta-1 text-primary"><?= $PROPS['DATE_TYPING'] ?></div>
                                                <div class="text-small text-muted mb-1">Типирован</div>
                                            <? else: ?>
                                                <div class="cta-1 text-primary">Дата</div>
                                                <div class="text-small text-muted mb-1">Типировать</div>
                                            <? endif ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Stats End -->

                        <!-- Quill Bubble Start -->
                        <section class="scroll-section" id="contact">
                            <h2 class="small-title">Пригласить</h2>

                            <form class="card mb-5 tooltip-end-top" id="contactForm" novalidate="novalidate"
                                  action="/user/staff/profile/?id=<?= $arrEmployee['ID']?>" method="post">
                                <div class="card-body">
                                    <h2 class="small-title">Текст приглашения</h2>

                                    <div class="mb-3 filled">
                                        <textarea id="message" placeholder="Message" class="form-control"
                                                  name="contactMessage" rows="2"></textarea>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                             viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5"
                                             stroke-linecap="round" stroke-linejoin="round"
                                             class="cs-icon cs-icon-notebook-1">
                                            <path
                                                d="M3 5.5C3 4.09554 3 3.39331 3.33706 2.88886C3.48298 2.67048 3.67048 2.48298 3.88886 2.33706C4.39331 2 5.09554 2 6.5 2H13.5C14.9045 2 15.6067 2 16.1111 2.33706C16.3295 2.48298 16.517 2.67048 16.6629 2.88886C17 3.39331 17 4.09554 17 5.5V14.5C17 15.9045 17 16.6067 16.6629 17.1111C16.517 17.3295 16.3295 17.517 16.1111 17.6629C15.6067 18 14.9045 18 13.5 18H6.5C5.09554 18 4.39331 18 3.88886 17.6629C3.67048 17.517 3.48298 17.3295 3.33706 17.1111C3 16.6067 3 15.9045 3 14.5V5.5Z"></path>
                                            <path d="M8 6H12M8 10H12M8 14H12M2 8H4M2 12H4"></path>
                                        </svg>
                                    </div>
                                    <form class="form-inline" action="/user/staff/profile/?id=<?= $arrEmployee['ID'] ?>"
                                          method="post">
                                        <button type="button" id="sample" class="btn btn-outline-primary mb-1">Шаблон
                                        </button>
                                        <input class="btn btn-outline-primary mb-1" type="submit" value="Отправить"
                                               name="again">
                                    </form>
                                </div>
                            </form>
                        </section>
                        <!-- Quill Bubble End -->
                    </div>
                    <!-- About Tab End -->
                    <!-- Right Side End -->
                </div>
            </div>
    </main>
<? else: ?>
    <? $APPLICATION->SetTitle("Вход в личный кабинет"); ?>
    <? $APPLICATION->IncludeComponent("bitrix:system.auth.form", "auth", Array(
            "REGISTER_URL" => "register.php",
            "FORGOT_PASSWORD_URL" => "",
            "PROFILE_URL" => "profile.php",
            "SHOW_ERRORS" => "Y"
        )
    ); ?>
<? endif; ?>

<script>
    var btn1 = document.getElementById('sample');


    function sample() {
        document.getElementById('message').innerText = 'Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff=<?=base64_encode("staff".$arrEmployee['ID'])?>';

    }
    btn1.onclick = sample;
</script>



<?php
// включаемая область для раздела
$APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
    "MODE" => "php",// будет редактировать в веб-редакторе
    "NAME" => "Библиотеки для отправки email",// Библиотеки для отправки email
    "TEMPLATE" => "mail_template.php" // имя шаблона для нового файла
));


if (isset($_POST['again'])) {
    sendMail_again($arrEmployee['NAME'], $arrEmployee['ID']);
}

//повторная отправка письма
function sendMail_again($mail_to, $id_staff)
{
    //ID сотрудника
    //echo "<script>alert($mail_to)</script>";
    $subject = 'Приглашение пройти тест';
    $message = $_POST['contactMessage'];
    sendMail($mail_to, $mail_to, $subject, $message);
    //переадресация на страницу после вывода сообщения
    echo "<script>alert('Письмо отправлено повторно!');
    location.href='/user/staff/profile?id=$id_staff';</script>";
    return 1;
}


//переход к покупке типирования
if (isset($_POST['typing'])) {
    header('Location: /user/typing/');
}



?>


<? require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/footer.php"); ?>



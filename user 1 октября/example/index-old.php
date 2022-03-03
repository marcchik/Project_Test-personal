<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
?> <!-- Bootstrap CSS (jsDelivr CDN) -->

<?
if(!CModule::IncludeModule("iblock"))

    return;
?>
<?

//свойства пользователя
$db_props = CIBlockElement::GetProperty(3, 521, "sort", "asc", array()); //вынимаем данные пользовательских полей
$PROPS = array();
while($ar_props = $db_props->Fetch()) {
    $PROPS[$ar_props['CODE']] = $ar_props['VALUE'];//конечный массив данных пользовательских свойств
}
$PROPS['PROFESSION'] = explode( ';', $PROPS['PROFESSION']);
$i = 0;
foreach ($PROPS['PROFESSION'] as $Item) {
    $PROPS['PROFESSION'][$i] = explode( ', ', $Item);
    $i++;
}

//заголовок страницы
$title = "Профиль -> ".$PROPS['NAME_SURNAME'];
$APPLICATION->SetTitle($title);

//массив с данными пользователя
$arrEmployee = array();
$res = CIBlockElement::GetByID(521);
if($ar_res = $res->GetNext())
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
$arFilter = Array("IBLOCK_ID"=>6, "PROPERTY_TYPE", "PROPERTY_BOTTOM", "PROPERTY_TOP");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array(), $arSelect);
while($ob = $res->GetNextElement())
{
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

<? if($USER->IsAuthorized()):?>
    <main>
        <div class="container">
            <!-- Title and Top Buttons Start -->
            <div class="page-title-container">
                <div class="row">
                    <!-- Title Start -->
                    <div class="col-12 col-md-7">
                        <h1 class="mb-0 pb-0 display-4" id="title"><?=$PROPS['NAME_SURNAME']?></h1>
                        <nav class="breadcrumb-container d-inline-block" aria-label="breadcrumb">
                            <ul class="breadcrumb pt-0">
                                <li class="breadcrumb-item"><a href="/user/home/">Главная</a></li>
                                <li class="breadcrumb-item"><a href="/user/staff/">Кандидаты</a></li>
                                <li class="breadcrumb-item"><a href="/user/profile/">Профиль</a></li>
                            </ul>
                        </nav>
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
                                        <img src="photoSergeyMin.png" class="img-fluid rounded-xl" alt="thumb" />
                                    </div>
                                    <div class="h5 mb-0"><?=$PROPS['NAME_SURNAME']?></div>
                                </div>
                            </div>
                            <div class="nav flex-column" role="tablist">
                                <a class="nav-link active px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#overviewTab" role="tab">
                                    <i data-cs-icon="activity" class="me-2" data-cs-size="17"></i>
                                    <span class="align-middle">Информация</span>
                                </a>
                                <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#permissionsTab" role="tab">
                                    <i data-cs-icon="lock-off" class="me-2" data-cs-size="17"></i>
                                    <span class="align-middle">Соответствие должности</span>
                                </a>
                                <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#projectsTab" role="tab">
                                    <i data-cs-icon="suitcase" class="me-2" data-cs-size="17"></i>
                                    <span class="align-middle">Расшифровка профиля</span>
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
                    <div class="tab-pane fade show active" id="overviewTab" role="tabpanel">
                        <div class="tab-pane fade active show" id="aboutTab2" role="tabpanel">
                            <h2 class="small-title">Информация</h2>
                            <div class="card">
                                <div class="card-body">
                                    <div class="mb-5">
                                        <p class="text-small text-muted mb-2">CONTACT</p>
                                        <a href="#" class="d-block body-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-email me-2"><path d="M18 7L11.5652 10.2174C10.9086 10.5457 10.5802 10.7099 10.2313 10.7505C10.0776 10.7684 9.92238 10.7684 9.76869 10.7505C9.41977 10.7099 9.09143 10.5457 8.43475 10.2174L2 7"></path><path d="M14.5 4C15.9045 4 16.6067 4 17.1111 4.33706C17.3295 4.48298 17.517 4.67048 17.6629 4.88886C18 5.39331 18 6.09554 18 7.5L18 12.5C18 13.9045 18 14.6067 17.6629 15.1111C17.517 15.3295 17.3295 15.517 17.1111 15.6629C16.6067 16 15.9045 16 14.5 16L5.5 16C4.09554 16 3.39331 16 2.88886 15.6629C2.67048 15.517 2.48298 15.3295 2.33706 15.1111C2 14.6067 2 13.9045 2 12.5L2 7.5C2 6.09554 2 5.39331 2.33706 4.88886C2.48298 4.67048 2.67048 4.48298 2.88886 4.33706C3.39331 4 4.09554 4 5.5 4L14.5 4Z"></path></svg>
                                            <span class="align-middle"><?=$arrEmployee['NAME']?></span>
                                        </a>
                                    </div>
                                    <div class="mb-5">
                                        <p class="text-small text-muted mb-2">PHONE</p>
                                        <a href="#" class="d-block body-link">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="17" height="17" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-mobile me-2"><path d="M4 5.5C4 4.09554 4 3.39331 4.33706 2.88886C4.48298 2.67048 4.67048 2.48298 4.88886 2.33706C5.39331 2 6.09554 2 7.5 2H12.5C13.9045 2 14.6067 2 15.1111 2.33706C15.3295 2.48298 15.517 2.67048 15.6629 2.88886C16 3.39331 16 4.09554 16 5.5V14.5C16 15.9045 16 16.6067 15.6629 17.1111C15.517 17.3295 15.3295 17.517 15.1111 17.6629C14.6067 18 13.9045 18 12.5 18H7.5C6.09554 18 5.39331 18 4.88886 17.6629C4.67048 17.517 4.48298 17.3295 4.33706 17.1111C4 16.6067 4 15.9045 4 14.5V5.5Z"></path><path d="M11 15H10 9M12 5H10 8"></path></svg>
                                            <span class="align-middle"><?=$PROPS['TEL']?></span>
                                        </a>
                                    </div>
                                    <div>
                                        <p class="text-small text-muted mb-2">COMMENT</p>
                                        <p>

                                        </p>
                                    </div>
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
                                            <div class="cta-1 text-primary"><?=$personalityProfile?></div>
                                            <div class="text-small text-muted mb-1">Типирован</div>
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
                                            <div class="cta-1 text-primary"><?=$arrEmployee['DATE_CREATE']?></div>
                                            <div class="text-small text-muted mb-1">Приглашен</div>
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
                                            <div class="cta-1 text-primary">17.08.2021 13:46:21</div>
                                            <div class="text-small text-muted mb-1">Тест пройден</div>
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
                                            <div class="cta-1 text-primary">18.08.2021 13:46:21</div>
                                            <div class="text-small text-muted mb-1">Типирован</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Stats End -->
                        <h2 class="small-title">Расшифрока</h2>

                        <div class="card mb-1">
                            <div class="card-body">
                                <h2 class="small-title">Тип энергии <?=$allResult[0]?>%: <?=$arrAnswer_E_I['name']?></h2>
                                <p class="mb-0"><?=$arrAnswer_E_I['description']?></p>
                            </div>
                        </div>

                        <div class="card mb-1">
                            <div class="card-body">
                                <h2 class="small-title">Тип мышления <?=$allResult[1]?>%: <?=$arrAnswer_N_S['name']?></h2>
                                <p class="mb-0"><?=$arrAnswer_N_S['description']?></p>
                            </div>
                        </div>

                        <div class="card mb-1">
                            <div class="card-body">
                                <h2 class="small-title"> Система ценностей <?=$allResult[2]?>%: <?=$arrAnswer_F_T['name']?></h2>
                                <p class="mb-0"><?=$arrAnswer_F_T['description']?></p>
                            </div>
                        </div>

                        <div class="card mb-1">
                            <div class="card-body">
                                <h2 class="small-title">Внутренняя организация <?=$allResult[3]?>%: <?=$arrAnswer_J_P['name']?></h2>
                                <p class="mb-0"><?=$arrAnswer_J_P['description']?></p>
                            </div>
                        </div>

                    </div>
                    <!-- Projects Tab End -->

                    <!-- Permissions Tab Start -->
                    <div class="tab-pane fade" id="permissionsTab" role="tabpanel">

                        <!-- Progress Start -->
                        <!-- Content Start -->
                        <div>




                            <!-- Circle Start -->
                            <section class="scroll-section" id="circle">
                                <h2 class="small-title">Профессии</h2>
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-lg-12 mb-4">
                                                    <div class="nav flex-column" role="tablist">
                                                        <a class="nav-link px-0 border-bottom border-separator-light" data-bs-toggle="tab" href="#projectsTab" role="tab">
                                                            <i data-cs-icon="suitcase" class="me-2" data-cs-size="17"></i>
                                                            <span class="align-middle">Психологический профиль<span class="cta-1 text-primary">  <?=$personalityProfile?></span></span>

                                                        </a>
                                                    </div>
                                                </div>

                                            <?

                                            //прошлое типирование
                                            $valueTyping = "";
                                            $arSelect = Array("ID", "PREVIEW_TEXT");
                                            $arFilter = Array("ID" => 521);
                                            $res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
                                            while($ob = $res->GetNextElement())
                                            {
                                                $arFields = $ob->GetFields();
                                                $valueTyping = $arFields['PREVIEW_TEXT'];
                                            }
                                            //массив с типированными профессиями
                                            $arrTyping = explode(", ", $valueTyping);
                                            ?>

                                            <?foreach($arrTyping as $profession):?>
                                                <?if ($profession == "Управляющий"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Управляющий</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][0][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][0][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if ($profession == "Администратор"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Администратор</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][1][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][1][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if ($profession == "Педагог"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Педагог</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][2][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][2][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if ($profession == "Няня"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Няня</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][3][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][3][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if ($profession == "Методист"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Методист</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][4][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][4][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if ($profession == "Продажник"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Продажник</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][5][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][5][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if ($profession == "Художественный руководитель"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Художественный руководитель</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][6][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][6][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                                <?if ($profession == "Психолог"):?>
                                                    <div class="col-12 col-sm-6 col-lg-3 mb-4">
                                                        <label class="mb-3">Психолог</label>
                                                        <div class="sw-13">
                                                            <div role="progressbar" class="progress-bar-circle" id="progressCirclePercent" style="position: relative;">
                                                                <svg viewBox="0 0 100 100" style="display: block; width: 100%;">
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#dddddd" stroke-width="1" fill-opacity="0">

                                                                    </path>
                                                                    <path d="M 50,50 m 0,-49.5 a 49.5,49.5 0 1 1 0,99 a 49.5,49.5 0 1 1 0,-99" stroke="#2499e3" stroke-width="1" fill-opacity="0" style="stroke-dasharray: 311.061, 311.061; stroke-dashoffset: <?=311.06 - 3.11061*$PROPS['PROFESSION'][7][1]?>;">

                                                                    </path>
                                                                </svg>
                                                                <div class="progressbar-text" style="position: absolute; left: 50%; top: 50%; padding: 0px; margin: 0px; transform: translate(-50%, -50%); color: rgb(36, 153, 227);">
                                                                    <?=$PROPS['PROFESSION'][7][1];?>%
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?endif;?>
                                            <?endforeach?>

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
                                            <div class="cta-1 text-primary"><?=$personalityProfile?></div>
                                            <div class="text-small text-muted mb-1">Типирован</div>
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
                                            <div class="cta-1 text-primary"><?=$arrEmployee['DATE_CREATE']?></div>
                                            <div class="text-small text-muted mb-1">Приглашен</div>
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
                                            <div class="cta-1 text-primary">17.08.2021 13:46:21</div>
                                            <div class="text-small text-muted mb-1">Тест пройден</div>
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
                                            <div class="cta-1 text-primary">18.08.2021 13:46:21</div>
                                            <div class="text-small text-muted mb-1">Типирован</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Stats End -->

                        <!-- Quill Bubble Start -->
                        <section class="scroll-section" id="contact">
                            <h2 class="small-title">Пригласить</h2>
                            <form class="card mb-5 tooltip-end-top" id="contactForm" novalidate="novalidate" action="/user/staff/profile/?id=<?=$arrEmployee['ID']?>" method="post">
                                <div class="card-body">
                                    <h2 class="small-title">Текст приглашения</h2>
                                    <div class="mb-3 filled">
                                        <textarea  id="message" placeholder="Message" class="form-control" name="contactMessage" rows="2"></textarea>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="cs-icon cs-icon-notebook-1"><path d="M3 5.5C3 4.09554 3 3.39331 3.33706 2.88886C3.48298 2.67048 3.67048 2.48298 3.88886 2.33706C4.39331 2 5.09554 2 6.5 2H13.5C14.9045 2 15.6067 2 16.1111 2.33706C16.3295 2.48298 16.517 2.67048 16.6629 2.88886C17 3.39331 17 4.09554 17 5.5V14.5C17 15.9045 17 16.6067 16.6629 17.1111C16.517 17.3295 16.3295 17.517 16.1111 17.6629C15.6067 18 14.9045 18 13.5 18H6.5C5.09554 18 4.39331 18 3.88886 17.6629C3.67048 17.517 3.48298 17.3295 3.33706 17.1111C3 16.6067 3 15.9045 3 14.5V5.5Z"></path><path d="M8 6H12M8 10H12M8 14H12M2 8H4M2 12H4"></path></svg>
                                    </div>
                                    <form class="form-inline" action="/user/staff/profile/?id=<?=$arrEmployee['ID']?>" method="post">
                                        <button type="button" id ="sample" class="btn btn-outline-primary mb-1">Шаблон</button>
                                        <input  class="btn btn-outline-primary mb-1" type="submit" value="Отправить" name="again">
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
<?else:?>
    <?$APPLICATION->IncludeComponent("bitrix:system.auth.form","auth",Array(
            "REGISTER_URL" => "register.php",
            "FORGOT_PASSWORD_URL" => "",
            "PROFILE_URL" => "profile.php",
            "SHOW_ERRORS" => "Y"
        )
    );?>
<?endif;?>

<script>
    var btn1 = document.getElementById('sample');


    function sample() {
        document.getElementById('message').innerText='Вас приглашают пройти тест по типированию сотрудников - https://test-personal.com/ts/?staff=<?=base64_encode("staff".$arrEmployee['ID'])?>';

    }
    btn1.onclick = sample;
</script>



<?php
// включаемая область для раздела
$APPLICATION->IncludeFile("/bitrix/php_interface/classes_phpmailer/vendor/autoload.php", Array(), Array(
    "MODE"      => "php",// будет редактировать в веб-редакторе
    "NAME"      => "Библиотеки для отправки email",// Библиотеки для отправки email
    "TEMPLATE"  => "mail_template.php" // имя шаблона для нового файла
));


if( isset( $_POST['again'] ) ) {
    sendMail_again($arrEmployee['NAME'], $arrEmployee['ID']);
}

//повторная отправка письма
function sendMail_again($mail_to, $id_staff) {
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
if( isset( $_POST['typing'] ) ) {
    header('Location: /user/typing/');
}



?>


<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>



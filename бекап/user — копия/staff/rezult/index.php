<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Результат");
?>
<?
    if(!CModule::IncludeModule("iblock"))

    return;
?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">

<?

//свойства пользователя
$db_props = CIBlockElement::GetProperty(3, $_REQUEST['id'], "sort", "asc", array()); //вынимаем данные пользовательских полей
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


//массив с данными пользователя
$arrEmployee = array();
$res = CIBlockElement::GetByID($_REQUEST['id']);
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

?>
    <style>
        /*уменьшение поля для ввода email*/
        @media screen and (max-width: 1000px) {
            .input_email {
                width: 400px !important;
            }
        }
        @media screen and (max-width: 850px) {
            .input_email {
                width: 300px !important;
            }
        }
        @media screen and (max-width: 767px) {
            .input_email {
                width: 250px !important;
            }
        }
        /*класс для заголовков страниц в личном кабинете*/
        .h3{
            margin: 20px;
        }

        .container-fluid{
            margin-top: -14px;
        }
        @media (min-width: 768px) {
            .navbar-container {
                position: sticky;
                top: 0;
                overflow-y: auto;
                height: 100vh;
            }

            .navbar-container .navbar {
                align-items: flex-start;
                /*justify-content: flex-start;*/
                /*flex-wrap: nowrap;*/
                flex-direction: column;
                height: 100%;
            }

            .navbar-container .navbar-collapse {
                align-items: flex-start;
            }

            .navbar-container .nav {
                /*flex-direction: column;*/
                /*flex-wrap: nowrap;*/
            }

            .navbar-container .navbar-nav {
                flex-direction: column !important;
            }
        }
    </style>
    <style>

        .type {
            margin-bottom: 50px;
        }
    </style>
    <script>

        let screenWidth = document.documentElement.clientWidth; // ширина окна за вычетом полосы прокрутки

        // СООТВЕТСТВИЕ ФУНКЦИЯМ


        function draw(width, canvas) {
            if (canvas.getContext) {

                //ширина канва
                canvas.width = screenWidth * 0.7;

                //ширина секции
                let widthSection = document.querySelector('.myWidth').offsetWidth;

                while (canvas.width > widthSection) {
                    canvas.width--;
                    //alert(canvas.width);
                    if (canvas.width > widthSection - 5) {
                        canvas.width = widthSection - 50;
                        location.reload();
                    }
                }


                let scale = canvas.width / 10;

                var ctx = canvas.getContext('2d');
                ctx.lineWidth = 1; // толщина 5px
                ctx.strokeStyle = '#C1C1C1';
                //
                //отступ сверху для текста
                let margiTop = 35;

                //длина штриха длинного
                let strokeHeightLong = 40;
                //длина штриха короткого
                let strokeHeightShort = 30;

                ctx.rect(0, 2, scale, 20);
                ctx.rect(0, 2, 1, strokeHeightLong);
                ctx.fillText("100", 5, margiTop);

                ctx.rect(scale, 2, scale, 20);
                ctx.rect(scale, 2, 1, strokeHeightShort);
                //ctx.fillText("10", scale, margiTop);

                ctx.rect(2 * scale, 2, scale, 20);
                ctx.rect(2 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("20", 2 * scale, margiTop);

                ctx.rect(3* scale, 2, scale, 20);
                ctx.rect(3 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("30", 3 * scale, margiTop);

                ctx.rect(4 * scale, 2, scale, 20);
                ctx.rect(4 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("40", 4 * scale, margiTop);

                ctx.rect(5 * scale, 2, scale, 20);
                ctx.rect(5 * scale, 2, 1, strokeHeightLong);
                ctx.fillText("0", 5 * scale + 5, margiTop);

                ctx.rect(6 * scale, 2, scale, 20);
                ctx.rect(6 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("60", 6 * scale, margiTop);

                ctx.rect(7 * scale, 2, scale, 20);
                ctx.rect(7 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("70", 7 * scale, margiTop);

                ctx.rect(8 * scale, 2, scale, 20);
                ctx.rect(8 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("80", 8 * scale, margiTop);

                ctx.rect(9 * scale, 2, scale, 20);
                ctx.rect(9 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("90", 9 * scale, margiTop);

                //коэффицент для 100
                let k = 9.75
                //let widthScreen = document.querySelector('.myWidth').offsetWidth;

                let widthScreen = screen.width; // ширина
                if (widthScreen < 1200) {
                    k = 9.7;
                }
                if (widthScreen < 1100) {
                    k = 9.5;
                }
                if (widthScreen < 870) {
                    k = 9.6;
                }
                if (widthScreen < 800) {
                    k = 9.4;
                }
                if (widthScreen < 400) {
                    k = 9.3;
                }
                ctx.rect(10 * scale, 2, 1, strokeHeightLong);
                ctx.fillText("100", k * scale, margiTop);

                //оранжевый цвет для отметки
                ctx.fillStyle = '#EB7D00';
                ctx.fillRect(5 * scale, 2, canvas.width * width / 200, 20);
                ctx.stroke();
            }
        }

        function draw_match(width, canvas) {
            if (canvas.getContext) {

                canvas.width = screenWidth * 0.7;
                canvas.height = 50;

                var ctx = canvas.getContext('2d');
                ctx.lineWidth = 1; // толщина 5px
                ctx.strokeStyle = '#C1C1C1';

                // 10% длины шкалы
                let scale = canvas.width / 10;

                //отступ сверху для текста
                let margiTop = 35;

                //длина штриха длинного
                let strokeHeightLong = 40;
                //длина штриха короткого
                let strokeHeightShort = 30;

                //шрифт для надписей шкалы
                ctx.font = "10px Arial";

                ctx.rect(0, 2, scale, 20);
                ctx.rect(0, 2, 1, strokeHeightLong);
                ctx.fillText("0", 5, margiTop);

                ctx.rect(scale, 2, scale, 20);
                ctx.rect(scale, 2, 1, strokeHeightShort);
                //ctx.fillText("10", scale, margiTop);

                ctx.rect(2 * scale, 2, scale, 20);
                ctx.rect(2 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("20", 2 * scale, margiTop);

                ctx.rect(3* scale, 2, scale, 20);
                ctx.rect(3 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("30", 3 * scale, margiTop);

                ctx.rect(4 * scale, 2, scale, 20);
                ctx.rect(4 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("40", 4 * scale, margiTop);

                ctx.rect(5 * scale, 2, scale, 20);
                ctx.rect(5 * scale, 2, 1, strokeHeightLong);
                ctx.fillText("50", 5 * scale + 5, margiTop);

                ctx.rect(6 * scale, 2, scale, 20);
                ctx.rect(6 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("60", 6 * scale, margiTop);

                ctx.rect(7 * scale, 2, scale, 20);
                ctx.rect(7 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("70", 7 * scale, margiTop);

                ctx.rect(8 * scale, 2, scale, 20);
                ctx.rect(8 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("80", 8 * scale, margiTop);

                ctx.rect(9 * scale, 2, scale, 20);
                ctx.rect(9 * scale, 2, 1, strokeHeightShort);
                //ctx.fillText("90", 9 * scale, margiTop);

                //коэффицент для 100
                let k = 9.75
                let widthScreen = screen.width; // ширина
                if (widthScreen < 1200) {
                    k = 9.7;
                }
                if (widthScreen < 870) {
                    k = 9.6;
                }
                if (widthScreen < 800) {
                    k = 9.4;
                }
                if (widthScreen < 400) {
                    k = 9.3;
                }

                ctx.rect(10 * scale, 2, 1, strokeHeightLong);
                ctx.fillText("100", k * scale, margiTop);


                ctx.fillStyle = '#EB7D00';
                //ctx.fillStyle = '#EB7D00';
                ctx.fillRect(1, 2, canvas.width * width / 100, 20);
                ctx.stroke();
            }
        }
    </script>

            <div class="col-md-8 col-lg-9 content-container" >
                <h1 class="h3 text-center" >Кандидаты</h1>

                <section class="myWidth">

                    <div style="margin-top: 20px; margin-bottom: 40px;">
                        <div class="container text-center">
                            <div style="margin: 40px;">
                                <h1>
                                    <?=$PROPS['NAME_SURNAME']?>
                                </h1>
                                <p>
                                    <b>Телефон: </b><?=$PROPS['TEL']?><br>
                                    <b>E-mail: </b><?=$arrEmployee['NAME']?><br>
                                    <b>Дата прохождения: </b><?=$arrEmployee['DATE_CREATE'];?>
                                </p>
                            </div>

                            <div class="function">
                                <div class="row" style="margin-bottom: 2rem; " >
                                    <div class="col-12 text-center " >
                                        <h3 class="color-primary text-uppercase" > СООТВЕТСТВИЕ ФУНКЦИЯМ</h3>
                                    </div>
                                </div>
                                <div class="type">
                                    <?

                                    //прошлое типирование
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

                                    <?foreach($arrTyping as $profession):?>
                                        <?if ($profession == "Управляющий"):?>
                                        <h3>Управляющий <?=$PROPS['PROFESSION'][0][1];?>%</h3>
                                        <canvas id="myCanvas2_1" width=1200 height=40></canvas>
                                        <script>
                                            // Управляющий 0 1
                                            let width2_1 = <?=$PROPS['PROFESSION'][0][1];?>;
                                            var canvas2_1 = document.getElementById('myCanvas2_1');
                                            draw_match(width2_1, canvas2_1);
                                        </script>
                                    <?endif;?>
                                    <?if ($profession == "Администратор"):?>
                                        <h3>Администратор <?=$PROPS['PROFESSION'][1][1];?>%</h3>
                                        <canvas id="myCanvas2_2" width=1200 height=40></canvas>
                                        <script>
                                            // Администратор 1 1
                                            let width2_2 = <?=$PROPS['PROFESSION'][1][1];?>;
                                            var canvas2_2 = document.getElementById('myCanvas2_2');
                                            draw_match(width2_2, canvas2_2);
                                        </script>
                                    <?endif;?>
                                    <?if ($profession == "Педагог"):?>
                                        <h3>Педагог <?=$PROPS['PROFESSION'][2][1];?>%</h3>
                                        <canvas id="myCanvas2_3" width=1200 height=40></canvas>
                                        <script>
                                            // Педагог 2 1
                                            let width2_3 = <?=$PROPS['PROFESSION'][2][1];?>;
                                            var canvas2_3 = document.getElementById('myCanvas2_3');
                                            draw_match(width2_3, canvas2_3);
                                        </script>
                                    <?endif;?>
                                    <?if ($profession == "Няня"):?>
                                        <h3>Няня <?=$PROPS['PROFESSION'][3][1];?>%</h3>
                                        <canvas id="myCanvas2_4" width=1200 height=40></canvas>
                                        <script>
                                            // Няня 3 2
                                            let width2_4 = <?=$PROPS['PROFESSION'][3][1];?>;
                                            var canvas2_4 = document.getElementById('myCanvas2_4');
                                            draw_match(width2_4, canvas2_4);
                                        </script>
                                    <?endif;?>
                                    <?if ($profession == "Методист"):?>
                                        <h3>Методист <?=$PROPS['PROFESSION'][4][1];?>%</h3>
                                        <canvas id="myCanvas2_5" width=1200 height=40></canvas>
                                        <script>
                                            // Методист 4 1
                                            let width2_5 = <?=$PROPS['PROFESSION'][4][1];?>;
                                            var canvas2_5 = document.getElementById('myCanvas2_5');
                                            draw_match(width2_5, canvas2_5);
                                        </script>
                                    <?endif;?>
                                    <?if ($profession == "Продажник"):?>
                                        <h3>Продажник <?=$PROPS['PROFESSION'][5][1];?>%</h3>
                                        <canvas id="myCanvas2_6" width=1200 height=40></canvas>
                                        <script>
                                            // Продажник 5 1
                                            let width2_6 = <?=$PROPS['PROFESSION'][5][1];?>;
                                            var canvas2_6 = document.getElementById('myCanvas2_6');
                                            draw_match(width2_6, canvas2_6);
                                        </script>
                                    <?endif;?>
                                    <?if ($profession == "Художественный руководитель"):?>
                                        <h3>Художественный руководитель <?=$PROPS['PROFESSION'][6][1];?>%</h3>
                                        <canvas id="myCanvas2_7" width=1200 height=40></canvas>
                                        <script>
                                            // Художественный руководитель 6 1
                                            let width2_7 = <?=$PROPS['PROFESSION'][6][1];?>;
                                            var canvas2_7 = document.getElementById('myCanvas2_7');
                                            draw_match(width2_7, canvas2_7);
                                        </script>
                                    <?endif;?>
                                    <?if ($profession == "Психолог"):?>
                                        <h3>Психолог <?=$PROPS['PROFESSION'][7][1];?>%</h3>
                                        <canvas id="myCanvas2_8" width=1200 height=40></canvas>
                                        <script>
                                            // Психолог 7 1
                                            let width2_8 = <?=$PROPS['PROFESSION'][7][1];?>;
                                            var canvas2_8 = document.getElementById('myCanvas2_8');
                                            draw_match(width2_8, canvas2_8);
                                        </script>
                                    <?endif;?>
                                    <?endforeach?>



                                </div>
                            </div>

                            <div class="grafic">
                                <div class="row" style="margin-bottom: 2rem; " >
                                    <div class="col-12 text-center " >
                                        <h3 class="color-primary text-uppercase" > ПРОФИЛЬ ЛИЧНОСТИ <?=$personalityProfile?></h3>
                                    </div>
                                </div>
                                <?
                                //массив с ответом
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
                                ?>
<!--                                Экстраверт-Интроверт-->
                                <div class="type ">
                                    <h3>Тип энергии <?=$allResult[0];?>%: <?=$arrAnswer_E_I['name'];?></h3>
                                    <div class="row d-flex justify-content-center" style="">
                                        <div class="col-6" style="padding-right:0px; " >
                                            <div class="w-100 text-left">Экстраверт</div>
                                        </div>
                                        <div class="col-6"  style="padding-left:0px; ">
                                            <div class="w-100 text-right">Интроверт </div>
                                        </div>
                                    </div>
                                    <canvas id="myCanvas1" width=1200 height=40></canvas>
                                </div>
                                <?
                                //массив с ответом
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
                                ?>
<!--                                Интуит-Сенсорик-->
                                <div class="type">
                                    <h3>Тип мышления <?=$allResult[1]?>%: <?=$arrAnswer_N_S['name'];?></h3>
                                    <div class="row d-flex justify-content-center" style="">
                                        <div class="col-6" style="padding-right:0px; " >
                                            <div class="w-100 text-left">Интуит</div>
                                        </div>
                                        <div class="col-6"  style="padding-left:0px;">
                                            <div class="w-100 text-right">Сенсорик </div>
                                        </div>
                                    </div>
                                    <canvas id="myCanvas2" width=1200 height=40></canvas>
                                </div>
                                <?
                                //массив с ответом
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
                                ?>
<!--                                Этик-Логик-->
                                <div class="type">
                                    <h3>Система ценностей <?=$allResult[2]?>%: <?=$arrAnswer_F_T['name'];?></h3>
                                    <div class="row d-flex justify-content-center" style="">
                                        <div class="col-6" style="padding-right:0px; " >
                                            <div class="w-100 text-left">Этик</div>
                                        </div>
                                        <div class="col-6"  style="padding-left:0px;">
                                            <div class="w-100 text-right">Логик </div>
                                        </div>
                                    </div>
                                    <canvas id="myCanvas3" width=1200 height=40></canvas>
                                </div>
                                <?
                                //массив с ответом
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
<!--                                Рационал-Иррационал-->
                                <div class="type">
                                    <h3>Внутренняя организация <?=$allResult[3]?>%: <?=$arrAnswer_J_P['name'];?></h3>
                                    <div class="row d-flex justify-content-center" style="">
                                        <div class="col-6" style="padding-right:0px; " >
                                            <div class="w-100 text-left">Рационал</div>
                                        </div>
                                        <div class="col-6"  style="padding-left:0px;">
                                            <div class="w-100 text-right">Иррационал </div>
                                        </div>
                                    </div>
                                    <canvas id="myCanvas4" width=1200 height=40></canvas>
                                </div>
                            </div>



                            <div class="article">
                                <div class="type">
                                    <p>
                                        <?=$arrAnswer_E_I['description'];?>
                                    </p>
                                </div>

                                <div class="type">
                                    <p>
                                        <?=$arrAnswer_N_S['description'];?>
                                    </p>
                                </div>

                                <div class="type">
                                    <p>
                                        <?=$arrAnswer_F_T['description'];?>
                                    </p>
                                </div>

                                <div class="type">
                                    <p>
                                        <?=$arrAnswer_J_P['description'];?>
                                    </p>
                                </div>
                            </div>



                        </div>
                    </div>

                </section>
            </div>



    <script>
    // ПРОФИЛЬ ЛИЧНОСТИ ► ESTJ
    let width1 = <?=$result[0]?>;
    var canvas1 = document.getElementById('myCanvas1');
    let width2 = <?=$result[1]?>;
    var canvas2 = document.getElementById('myCanvas2');
    let width3 = <?=$result[2]?>;
    var canvas3 = document.getElementById('myCanvas3');
    let width4 = <?=$result[3]?>;
    var canvas4 = document.getElementById('myCanvas4');

    //ISTP

    <?if($resultLetters[0] == "I"):?>
        draw(width1, canvas1);//Интроверт
    <?else:?>
        draw(-width1, canvas1);//Экстраверт
    <?endif;?>

    <?if($resultLetters[1] == "S"):?>
        draw(width2, canvas2);//Сенсорик
    <?else:?>
        draw(-width2, canvas2);//Интуит
    <?endif;?>

    <?if($resultLetters[2] == "T"):?>
        draw(width3, canvas3);//Логик
    <?else:?>
        draw(-width3, canvas3);//Этик
    <?endif;?>

    <?if($resultLetters[3] == "P"):?>
        draw(width4, canvas4);//Иррационал
    <?else:?>
        draw(-width4, canvas4);//Рационал
    <?endif;?>

    window.onresize = function(){
        location.reload();
    }
</script>



<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
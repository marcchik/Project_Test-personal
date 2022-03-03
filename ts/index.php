<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Тест на профиль личности");
?>



<?php

require_once (__DIR__.'/testjobs.config.db.php');
;
$deal_id = 0;
if(!empty($_REQUEST['order'])) {
    $deal_id = trim($_REQUEST['order']);
    $deal_id = base64_decode($deal_id);
}


    $filter = array();
    $rsUsers = CUser::GetList(($by="ID"), ($order="desc"), $filter);


    $userFrom = trim(mb_strimwidth(base64_decode($_REQUEST['id']),4, 100));

    //массив с id всех зарегистрированных пользователей
    $arrLoginUser = array();

    while ($arUser = $rsUsers->Fetch())
    {
        $arrLoginUser[] = $arUser["ID"];
    }
?>

<?if(in_array($userFrom, $arrLoginUser) || isset($_REQUEST['staff'])):?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Тест для сотрудников детских центров</title>
        <meta name="description" content="Тест для сотрудников детских центров">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <base href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/">

        <!--
        <link rel="stylesheet" href="assets/components/arti/bootstrap-4.3.1/css/bootstrap.min.css">
		<script src="assets/components/arti/jquery/jquery-3.3.1.min.js"></script>
		-->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>


<link rel="stylesheet" href="css/bootstrap/css/bootstrap.min.css">
<script src="css/jquery-3.6.0.min.js"></script>
<script src="css/bootstrap/js/bootstrap.bundle.js"></script>




<link rel="apple-touch-icon" sizes="180x180" href="/testjobs/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="/testjobs/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="/testjobs/favicon-16x16.png">
<link rel="manifest" href="site.webmanifest">
<link rel="mask-icon" href="safari-pinned-tab.svg" color="#5bbad5">
<meta name="msapplication-TileColor" content="#da532c">
<meta name="theme-color" content="#ffffff">


<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">


<script type="text/javascript">
    $(document).ready(function() {

    $("#FormVop")[0].reset();


    $("#btn_start").on("click", function() {
    	$obrow=$(this).parents(".avtoForm_row");
    	$(".row_nachal").css("display","none");
    	$obrow.next(".avtoForm_row").css("display","block");
    	return false;
	});


	function numvopros(numvo){
		$numrow=0;
    	$(".row_vopros").each(function() {
    		$numrow=$numrow+1;
    	});
    	//$("#numrow").text(numvo);
    	//#ind
    	$ke=Math.floor((numvo/$numrow)*100);
    	$("#numrow").css("visibility","visible");
    	$("#ind").css("width",$ke+"%");
    }
	//numvopros();

	$(".avtoForm_row input[type='radio']").change(function() {
    	/*alert("select");*/
    	$obrow=$(this).parents(".avtoForm_row");
    	$obrow.css("display","none");
    	$obrow.next(".avtoForm_row").css("display","block");

    	$teplu=$(this).val();
    		$numvo=$teplu.split("_");
    		numvopros($numvo[0]);
    	$itit=$("#itogstrok").val();
    	/* alert($itit); */
    	if($itit===""){
    		$teres=$teplu;
    	}else{
    		$teres=$("#itogstrok").val()+" : "+$teplu;
    	}
    	$("#itogstrok").val($teres);
    	/*alert($("#itogstrok").val()); */

    	return false;
	});

    });
</script>



<style>


:root{
	--theme-color-main: #4B4B4B !important;
	--theme-color-primary: #1aa5a2 !important;

	--theme-color-primary-darken-1: hsl(178.71, 73%, 35%);
    --theme-color-primary-darken-2: hsl(178.71, 73%, 32%);
    --theme-color-primary-darken-3: hsl(178.71, 73%, 27%);
    --theme-color-primary-lighten-1: hsl(178.71, 73%, 47%);
    --theme-color-primary-opacity-0_1: rgba(26, 165, 162, 0.1);
    --theme-color-primary-opacity-0_2: rgba(26, 165, 162, 0.2);
    --theme-color-primary-opacity-0_3: rgba(26, 165, 162, 0.3);
    --theme-color-primary-opacity-0_4: rgba(26, 165, 162, 0.4);
    --theme-color-primary-opacity-0_6: rgba(26, 165, 162, 0.6);
    --theme-color-primary-opacity-0_8: rgba(26, 165, 162, 0.8);
    --theme-color-primary-opacity-0_9: rgba(26, 165, 162, 0.9);
}

html{
	font-size: 14px;
}

body{
	font-family: 'Open Sans', sans-serif;
	background-color: #fff;
	padding-top: 0px;
	color: #2E2E2E;
	font-weight: 400;
	line-height: 1.6;
	font-size: 1.14286rem;
}

.avtoForm{

}
.avtoForm .avtoForm_row{
	display: none;
}

.avtoForm_row.row_nachal{
	display: block;
}

.avtoForm .avtoForm_row label{
	display: block;
}
.avtoForm_row{
	margin-left: 0px !important;
	margin-right: 0px !important;
}

#numrow{
	width: 100%;
	margin-top: 40px;
	border: 1px solid var(--theme-color-primary) !important;
	visibility: hidden;
	margin-bottom: 2rem;
}
#numrow #ind{
	height: 20px;
	width: 0.1%;
	background-color: var(--theme-color-primary) !important;
}
.b24-form-btn,
.btn-success{
	border: 0px !important;
	border-radius: 4px !important;
	background-color: var(--theme-color-primary) !important;
	padding: 0.8rem !important;
	padding-left: 1.2rem !important;
	padding-right: 1.2rem !important;
	color: #fff !important;
	font-weight: bold !important;
	font-size: 1.12rem !important;
}
.b24-form-btn:hover,
.btn-success:hover{
	background-color: var(--theme-color-primary-darken-2) !important;
}

.b24-form-control-container{
	padding-left: 3rem;
}

.row_vopros .b24-form-control-label{
	padding: 1rem;
	border: 1px solid #D8D8D8;
	border-radius: 4px;
	background-color: #EDEDED;
}
.row_vopros .b24-form-control-label:hover{
	background-color:  var(--theme-color-primary-opacity-0_3);
	border: 1px solid var(--theme-color-primary-opacity-0_6);
}
.row_vopros .b24-form-control-label input{
	margin-right: 1.6rem;
}

input.form-control,
.input-group-text{
	font-size: 1.2rem;
	color: #8B8B8B;
}

.input-group-text{
	width: 8rem !important;
}

.col_top_te{
	background-color: var(--theme-color-primary) !important;
	padding-top: 1.4rem;
	padding-bottom: 1.4rem;
	color: #fff;
}
.col_top_te h3,
.col_top_te a:link,
.col_top_te a:visited{
	text-decoration: none;
	font-size: 26px;
	color: #fff;
}
.col_top_te .tzo{
	font-size: 26px;
}

h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
    margin-bottom: .5rem;
    font-weight: 500;
    line-height: 1.2;
}

</style>


</head>
    <body>







    <div class="container avtoForm" style="margin-bottom: 6rem;">
    <div class="row d-flex justify-content-center">
    <div class="col-12 col-lg-10 col-xl-7 ">

    <div class="" id="numrow" ><div id="ind"></div></div>
    <div class="" id="it_str" ></div>


    <form method="post" action="/ts/spas.php" id="FormVop"  novalidate="novalidate">
    <input type="hidden" id="itogstrok" name="itogstrok" value="">

    <?php
        if( ( isset($_REQUEST['id']) )&&( mb_strlen($_REQUEST['id'])>6 ) ){
            $tryui=filter_var($_REQUEST['id'], FILTER_SANITIZE_STRING);
            $name_id = "chel_id";
            if(mb_strlen($tryui)>6){
                $chel_id=$tryui;
            }else{
                $chel_id="0";
            }
        }else{
            $chel_id="0";
        }
        if( ( isset($_REQUEST['staff']) )&&( mb_strlen($_REQUEST['staff'])>6 ) ){
            $name_id = "staff_id";
            $tryui=filter_var($_REQUEST['staff'], FILTER_SANITIZE_STRING);
            if(mb_strlen($tryui)>6){
                $staff_id=$tryui;
            }else{
                $staff_id="0";
            }
        }else{
            $staff_id="0";
        }
        ?>
        <?if ($name_id == "chel_id"):?>
            <input type="hidden" id="chel_id" name="chel_id" value="<?php echo $chel_id; ?>">
        <?else:?>
            <input type="hidden" id="staff_id" name="staff_id" value="<?php echo $staff_id; ?>">
        <?endif?>

<!--style="height: 100vh"-->
    <div class="row avtoForm_row row_nachal" >
        <div class="avtoForm_row_zag text-center "><h3>Начать прохождение теста?</h3></div>
        <br>
        <div class="b24-form-control text-center ">
            <a id="btn_start" class="btn  btn-success " >Начать!</a>
        </div>
    </div>

    <?php

        /* *********** цикл вывода вопросов ************* */


        $vopr_name=""; /* сам вопрос, текст */
        $vopr_num="";  /* номер вопроса начало 1 */

        $query = "SELECT * FROM `" . _DB_TBL_QUESTIONS . "` ORDER BY sort ASC";
        $result = $mysqli->query($query);

        if ($result) {
            $questions = $result->fetch_all(MYSQLI_ASSOC);
        }

        if (!empty($questions)) {
            foreach ($questions as $quest) {
                echo "<div  class=\"row avtoForm_row  row_vopros \">
                    <div class=\"avtoForm_row_zag\"><h3>".$quest['sort'].". ".$quest['quest'].":</h3></div>
                    <div class=\"b24-form-control-container \">";

                /* *********** цикл вывода ответов данного вопроса ************* */
                $q_id = $quest['id'];
                $vopr_num = $quest['sort'];  /* номер ответа начало 1 */

                $query = "SELECT * FROM `" . _DB_TBL_ANSWERS . "` WHERE quest_id = $q_id ORDER BY sort ASC";
                $result = $mysqli->query($query);

                if ($result) {
                    $answers = $result->fetch_all(MYSQLI_ASSOC);
                }

                if(!empty($answers)) {
                    foreach ($answers as $answer) {
                        $vopr_otv_name = $answer['answer'];  /* текст ответа */
                        $vopr_otv_name = trim($vopr_otv_name);
                        $vopr_otv = $answer['sort'];  /* номер ответа начало 1 */

                        echo "<label class=\"b24-form-control-label\">
                <input name=\"answers[".$q_id."]\" type=\"radio\" value=\"".$q_id."_".$vopr_otv."\" class=\"b24-form-control\"> ".$vopr_otv_name." </label>";
                    }
                    echo "<input name=\"deal_id\" type=\"hidden\" value=\"".$deal_id."\" class=\"b24-form-control\">";
                }

                /* *********** цикл вывода ответов данного вопроса конец ************* */

                echo "</div></div>";

            }
        }

        /* *********** цикл вывода вопросов конец ************* */
        ?>



    <div class="row avtoForm_row">
        <div class="avtoForm_row_zag"><h3>Ваши личные данные</h3></div>

        <div class="form-row"  style="margin-bottom: 1rem;">
        <div class="col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                      <span class="input-group-text" id="namePrepend">Ваше имя*</span>
                </div>
                <input class="form-control" data-name="Контактное лицо" name="name" id="name" type="text" maxlength="255" value="" aria-describedby="namePrepend" required="required" placeholder="Имя Фамилия">
            </div>
        </div>
    </div>

    <div class="form-row"  style="margin-bottom: 1rem;">
        <div class="col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                      <span class="input-group-text" id="telPrepend">Телефон*</span>
                </div>
                <input class="form-control" data-name="Телефон" name="tel" id="tel" type="tel" maxlength="25" value="" placeholder="+7(917) 123-45-67" aria-describedby="telPrepend" required="required" >
            </div>
        </div>
    </div>

    <div class="form-row"  style="margin-bottom: 1rem;">
        <div class="col-12">
            <div class="input-group">
                <div class="input-group-prepend">
                      <span class="input-group-text"  id="emailPrepend">E-mail*</span>
                </div>
                <input class="form-control"  data-name="E-mail"  name="email" id="email" type="email" maxlength="50" value="" placeholder="Ваш E-mail" aria-describedby="telPrepend" required="required">
            </div>
        </div>
    </div>
        <input name="deal_id" type="hidden" value="<?=$deal_id?>" class="b24-form-control">
        <div class="b24-form-btn-block">
        <button type="submit" class="b24-form-btn"  onClick="return Formdata(this.form)">Отправить</button></div>
    </div>




    </form>



    </div>
    </div>
    </div>

    <script>
        function Formdata(data){
            /* если не заполнено поле Ваше имя, длина менее 3-x*/
            if (data.name != null && data.name.value.length < 3 ) {
                document.getElementById('namePrepend').style.backgroundColor = "#FFA07A";
                return false;
            }
            else
                document.getElementById('namePrepend').style.backgroundColor = "#e9ecef";

            //телефон
            if (data.tel != null && data.tel.value.length < 3 ) {
                document.getElementById('telPrepend').style.backgroundColor = "#FFA07A";
                return false;
            }
            else
                document.getElementById('telPrepend').style.backgroundColor = "#e9ecef";

             //email
            if (data.email != null && data.email.value.length < 3 ) {
                document.getElementById('emailPrepend').style.backgroundColor = "#FFA07A";
                return false;
            }
            else
                document.getElementById('emailPrepend').style.backgroundColor = "#e9ecef";


        }
    </script>


    </body>
</html>
<?else:?>
<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Невозможно оформить заказ!</title>
    <meta name="description" content="Тест для сотрудников детских центров">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- <base href="https://b3x24.com/"> -->

    <!--
    <link rel="stylesheet" href="assets/components/arti/bootstrap-4.3.1/css/bootstrap.min.css">
    <script src="assets/components/arti/jquery/jquery-3.3.1.min.js"></script>
    -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>



    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,400;0,600;1,400;1,600&display=swap" rel="stylesheet">




    <style>


        :root{
            --theme-color-main: #4B4B4B !important;
            --theme-color-primary: #1aa5a2 !important;

            --theme-color-primary-darken-1: hsl(178.71, 73%, 35%);
            --theme-color-primary-darken-2: hsl(178.71, 73%, 32%);
            --theme-color-primary-darken-3: hsl(178.71, 73%, 27%);
            --theme-color-primary-lighten-1: hsl(178.71, 73%, 47%);
            --theme-color-primary-opacity-0_1: rgba(26, 165, 162, 0.1);
            --theme-color-primary-opacity-0_2: rgba(26, 165, 162, 0.2);
            --theme-color-primary-opacity-0_3: rgba(26, 165, 162, 0.3);
            --theme-color-primary-opacity-0_4: rgba(26, 165, 162, 0.4);
            --theme-color-primary-opacity-0_6: rgba(26, 165, 162, 0.6);
            --theme-color-primary-opacity-0_8: rgba(26, 165, 162, 0.8);
            --theme-color-primary-opacity-0_9: rgba(26, 165, 162, 0.9);
        }

        html{
            font-size: 14px;
        }

        body{
            font-family: 'Open Sans', sans-serif;
            background-color: #fff;
            padding-top: 0px;
            color: #2E2E2E;
            font-weight: 400;
            line-height: 1.6;
            font-size: 1.14286rem;
        }

        .avtoForm{

        }
        .avtoForm .avtoForm_row{
            display: none;
        }

        .avtoForm_row.row_nachal{
            display: block;
        }

        .avtoForm .avtoForm_row label{
            display: block;
        }
        .avtoForm_row{
            margin-left: 0px !important;
            margin-right: 0px !important;
        }

        #numrow{
            width: 100%;
            border: 1px solid var(--theme-color-primary) !important;
            visibility: hidden;
            margin-bottom: 2rem;
        }
        #numrow #ind{
            height: 20px;
            width: 0.1%;
            background-color: var(--theme-color-primary) !important;
        }
        .b24-form-btn,
        .btn-success{
            border: 0px !important;
            border-radius: 4px !important;
            background-color: var(--theme-color-primary) !important;
            padding: 0.8rem !important;
            padding-left: 1.2rem !important;
            padding-right: 1.2rem !important;
            color: #fff !important;
            font-weight: bold !important;
            font-size: 1.12rem !important;
        }
        .b24-form-btn:hover,
        .btn-success:hover{
            background-color: var(--theme-color-primary-darken-2) !important;
        }

        .b24-form-control-container{
            padding-left: 3rem;
        }

        .row_vopros .b24-form-control-label{
            padding: 1rem;
            border: 1px solid #D8D8D8;
            border-radius: 4px;
            background-color: #EDEDED;
        }
        .row_vopros .b24-form-control-label:hover{
            background-color:  var(--theme-color-primary-opacity-0_3);
            border: 1px solid var(--theme-color-primary-opacity-0_6);
        }
        .row_vopros .b24-form-control-label input{
            margin-right: 1.6rem;
        }

        input.form-control,
        .input-group-text{
            font-size: 1.2rem;
            color: #8B8B8B;
        }

        .input-group-text{
            width: 8rem !important;
        }

        .col_top_te{
            background-color: var(--theme-color-primary) !important;
            padding-top: 1.4rem;
            padding-bottom: 1.4rem;
            color: #fff;
        }
        .col_top_te h3,
        .col_top_te a:link,
        .col_top_te a:visited{
            text-decoration: none;
            font-size: 26px;
            color: #fff;
        }
        .col_top_te .tzo{
            font-size: 26px;
        }

        h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6 {
            margin-bottom: .5rem;
            font-weight: 500;
            line-height: 1.2;
        }

    </style>


</head>
<body>









<div class="container avtoForm" style="margin-bottom: 6rem;">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-lg-10 col-xl-7 text-center">


            <img src="no_zakaz-400.jpg" style="width: 100%; max-width: 400px;">
            <h1>Вы не можете пройти тест<br />У вас неверная ссылка</h1>


        </div>
    </div>
</div>




</body>
</html>
<?endif;?>





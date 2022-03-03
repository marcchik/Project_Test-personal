

<?php
//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

//require_once $_SERVER['DOCUMENT_ROOT'] . '/bitrix/modules/main/include/prolog_before.php';

//require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");


require_once ('testjobs.config.db.php');
require_once ('functions.php');

$hooklog = basename($_SERVER['SCRIPT_NAME'], ".php").".log";
$hooklog = __DIR__."/".$hooklog;

$deal_id = trim($_REQUEST['order']);
$deal_id = base64_decode($deal_id);

if(empty($deal_id)) {
    echo "Вы не можете пройти тест, у вас нет оплаченного заказа на тестирование";
    //die;
}

$name = trim($_REQUEST['name']);
$name = strip_tags($name);

$phone = trim($_REQUEST['tel']);
$phone = strip_tags($phone);

$email = trim($_REQUEST['email']);
$email = strip_tags($email);

$answers = $_REQUEST['answers'];





if(!empty($answers)) {
    $name = "'{$mysqli->real_escape_string($name)}'";
    $phone = "'{$mysqli->real_escape_string($phone)}'";
    $email = "'{$mysqli->real_escape_string($email)}'";

    $query = "SELECT * FROM `" . _DB_TBL_USERS . "` WHERE email = $email LIMIT 1";
    $result = $mysqli->query($query);

    $query_insert = "INSERT INTO `" . _DB_TBL_USERS . "` VALUES (null, $name, $phone, $email)";
    $query_update = "UPDATE "._DB_TBL_USERS." SET name = $name, phone = $phone, email = $email WHERE email = $email";

    if ($result) {
        $users_data = $result->fetch_all(MYSQLI_ASSOC);

        if(empty($users_data)) {
            $result_insert = $mysqli->query($query_insert);
            myLog($query_insert, "INSERT $email", $hooklog);

            $user_id = $mysqli->insert_id;
        } else {
            $result_update = $mysqli->query($query_update);
            myLog($query_update, "UPDATE $email", $hooklog);

            $user_id = $users_data[0]['id'];
        }
    } else {
        $result_insert = $mysqli->query($query_insert);
        myLog($query_insert, "INSERT $email", $hooklog);
    }

    $rows = [];
    foreach ($answers as $q_id => $answer) {
        $answer = trim($answer);
        $answer = strip_tags($answer);
        $pos = strpos($answer, '_');
        $answer = substr($answer, $pos+1);



        $q_id = "'{$mysqli->real_escape_string($q_id)}'";
        $answer = "'{$mysqli->real_escape_string($answer)}'";

        $query = "SELECT * FROM `" . _DB_TBL_KEYS . "` WHERE quest_id = $q_id AND answer = $answer LIMIT 1";
        $result = $mysqli->query($query);

        if ($result) {
            $answer_data = $result->fetch_all(MYSQLI_ASSOC);

            if(!empty($answer_data)) {
                $answer_data = $answer_data[0];
                $key = $answer_data['key'];
                $ball = $answer_data['ball'];
                $rows[$key] += $ball;
            }
        }
    }
}

$results = getResultTestJobs($rows);

//строка с результатом тесттирования
$stringResult;
//сбор результата
$stringResult =  implode(", ", $results);

$_REQUEST['result'] = $stringResult;

$profession = [];
foreach ($results as $key => $item) {
    echo $item."<br>";
//            $_REQUEST['result'][] = $item;

    $key = "'{$mysqli->real_escape_string($item)}'";

    $query = "SELECT * FROM `" . _DB_TBL_PROFESSION . "` WHERE `key` = $key";
    $result = $mysqli->query($query);

    //echo $query;
    //echo "<hr>";


    if ($result) {
        $data = $result->fetch_all(MYSQLI_ASSOC);

        //print_r($data);
        //echo "<hr>";

        if(!empty($data)) {
            foreach ($data as $prof) {
                $name = $prof['name'];
                $ball = $prof['ball'];
                $profession[$name]['sum'] += $ball;
                $profession[$name]['k'] += 1;
            }
        }
    }


}

//массив с профессиями
$arrResultTypingProf = array();
foreach ($profession as $name => $item) {
    $done = round($item['sum'] / $item['k']);
    echo $name." -> ".$item['sum']."/".$item['k']."<b> = ".$done." %</b><br>";
    $arrResultTypingProf[] = $name.", ".$done;
    //$arrResultTypingProf[$name]['percent'] = $done;
}
//добавляем массив с результатом профессий в REQUEST
$_REQUEST['profession'] = $arrResultTypingProf;


$redirect = "/ts/processing?".http_build_query($_REQUEST, PHP_QUERY_RFC3986);
//$redirect = "/ts/file2.php";

?>
<script type="text/javascript"
        src="/bitrix/templates/landing24/assets/vendor/jquery/jquery-3.2.1.min.js?156750832790987"></script>
<script type="text/javascript"
        src="/bitrix/templates/landing24/assets/vendor/jquery.easing/js/jquery.easing.min.js?15675083273583"></script>
<script type="text/javascript"
        src="/bitrix/templates/landing24/assets/js/helpers/lazyload.min.js?15994906851713"></script>
<script type="text/javascript"
        src="/bitrix/components/bitrix/landing.pub/templates/.default/script.min.js?16085558823456"></script>

<?header("Location: $redirect"); /* Перенаправление браузера */?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Тест для сотрудников детских центров</title>
        <meta name="description" content="Тест для сотрудников детских центров">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- <base href="https://<?php echo $_SERVER['HTTP_HOST'] ?>/"> -->
        
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





<div class="container-fluid" style="margin-bottom: 2rem;">
<div class="row">
<div class="col-12 text-center col_top_te">

<h3 class=""><a href="/" target="_self">Test-personal.com</a></h3>
<div class="tzo">Выбирайте сотрудника с умом</div>

</div>
</div>
</div>



<div class="container-fluid" style="margin-bottom: 2rem;">
<div class="row">
<div class="col-12 text-center ">



</div>
</div>
</div>





<div class="container avtoForm" style="margin-bottom: 6rem;">
<div class="row d-flex justify-content-center">
<div class="col-12 col-lg-10 col-xl-7 text-center">


<!-- <img src="http://test2.arti-ufa.ru/img/yago.jpg" style="width: 100%; max-width: 600px;"> -->
<img src="thank/yago.jpg" style="width: 100%; max-width: 600px;">
<h1>Спасибо за прохождение теста!</h1>

    <h2>
        <?php
        $profession = [];
        foreach ($results as $key => $item) {
            echo $item."<br>";
//            $_REQUEST['result'][] = $item;

            $key = "'{$mysqli->real_escape_string($item)}'";

            $query = "SELECT * FROM `" . _DB_TBL_PROFESSION . "` WHERE `key` = $key";
            $result = $mysqli->query($query);

            //echo $query;
            //echo "<hr>";


            if ($result) {
                $data = $result->fetch_all(MYSQLI_ASSOC);

                //print_r($data);
                //echo "<hr>";

                if(!empty($data)) {
                    foreach ($data as $prof) {
                        $name = $prof['name'];
                        $ball = $prof['ball'];
                        $profession[$name]['sum'] += $ball;
                        $profession[$name]['k'] += 1;
                    }
                }
            }


        }

        //массив с профессиями
        $arrResultTypingProf = array();
        foreach ($profession as $name => $item) {
            $done = round($item['sum'] / $item['k']);
            echo $name." -> ".$item['sum']."/".$item['k']."<b> = ".$done." %</b><br>";
            $arrResultTypingProf[$name]['profession'] = $name;
            $arrResultTypingProf[$name]['percent'] = $done;
        }
        //добавляем массив с результатом профессий в REQUEST
        $_REQUEST['$profession'] = $arrResultTypingProf;

        ?>
    </h2>

    <hr>
    <?php
    //массив с профессиями
    $arrResultTypingProf = array();
    foreach ($profession as $name => $item) {
        $done = round($item['sum'] / $item['k']);
        echo $name." -> ".$item['sum']."/".$item['k']."<b> = ".$done." %</b><br>";
        $arrResultTypingProf[$name]['profession'] = $name;
        $arrResultTypingProf[$name]['percent'] = $done;
    }
    //добавляем массив с результатом профессий в REQUEST
    $_REQUEST['$profession'] = $arrResultTypingProf;

    ?>
    <hr>
    <?php
    foreach ($rows as $key => $item) {
        echo $key."= ".$item."<br>";
    }
    ?>

    <hr>
    <?php
    foreach ($answers as $key => $item) {
        echo $item."<br>";
    }
    ?>

</div>
</div>
</div>



<div class="container-fluid" style="margin-top: 6rem;">
<div class="row">
<div class="col-12 text-center ">
<a href="https://ru.freepik.com/photos/people" style="color: silver;font-size: 8px;">People фото создан(а) stockking - ru.freepik.com</a>
</div>
</div>
</div>



</body>
</html>



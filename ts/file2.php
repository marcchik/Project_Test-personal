<?php
require($_SERVER["DOCUMENT_ROOT"] . "/bitrix/header.php");
//$APPLICATION->SetTitle("Пример");
?>

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


<hr>


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
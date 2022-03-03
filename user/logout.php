<?php
echo"<pre>";
print_r($_POST);
echo "</pre";
print_r($_SESSION);
$_SESSION['SESS_AUTH']['AUTHORIZED'] = 'N';
print_r($_SESSION);
global $USER;
$USER->Logout();
header('Location: /');
//die();

//print_r($_GET['logout']);
//if ($_GET['logout'] === 'y') {
//    $USER->Logout();
//    LocalRedirect('/');
//}

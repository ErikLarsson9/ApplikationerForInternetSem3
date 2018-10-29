<?php
namespace View;
use\Controller;
require ('Classes/Controller/Controller.php');
Controller\Controller::classLoader();
$controller = new Controller\Controller();
$username = $_POST['username'];

$userPassword = $_POST['password'];

$previousPage = $controller->getPreviousPage();
//$message = "";
//if(!$previousPage){
//    $message = "\n\n\n\nValidation error!";
//}
//else{
    $message = $controller->login($username, $userPassword);
//}


require ('resources/Views/statusPage.php');
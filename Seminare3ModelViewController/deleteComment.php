<?php
namespace View;
use\Controller;
use\SecurityUtility;
require ('Classes/Controller/Controller.php');
Controller\Controller::classLoader();
$controller = new Controller\Controller();
$previousPage = $controller->getPreviousPage();
if(false == (SecurityUtility\Validator::validateStringPrintable($_POST['user'])
        && SecurityUtility\Validator::validateStringPrintable($_POST['commentId']) &&
        SecurityUtility\Validator::validateStringPrintable($_POST['recipe']))){
         $message = "Invalid Client data!";


}
else{
    $user = $_POST['user'];
    $commentId = $_POST['commentId'];
    $recipe = $_POST['recipe'];
    $message = $controller->deleteComment($user, $commentId, $recipe);
}

require ('resources/Views/statusPage.php');





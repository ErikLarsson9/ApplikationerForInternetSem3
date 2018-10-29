<?php
namespace View;
use\Controller;
use\SecurityUtility;
require ('Classes/Controller/Controller.php');
Controller\Controller::classLoader();
$controller = new Controller\Controller();
$previousPage = $controller->getPreviousPage();

if( false === (SecurityUtility\Validator::validateComment($_POST["comment"]) &&
        SecurityUtility\Validator::validateUsername($_POST["user"]) &&
            SecurityUtility\Validator::validateRecipe($_POST["recipe"])
    ))

{


    $message = "Invalid Client data!";
//    echo "bl";
//    echo preg_match ("/[a-zA-Z0-9()!#]\>/", "rodarummet");

    }
else{
//    echo "bl";
//    echo preg_match ("/[a-zA-Z0-9()!#]\>/", "rodarummet");
    $user = $_POST['user'];


    $comment = $_POST["comment"];
    $comment = htmlentities($comment,ENT_QUOTES);

    $recipe = $_POST['recipe'];
    $message = $controller->addComment($user, $comment, $recipe);



}
require ('resources/Views/statusPage.php');


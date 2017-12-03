<?php
namespace View;
use\Controller;
require ('Classes/Controller/Controller.php');
Controller\Controller::classLoader();
$controller = new Controller\Controller();
$controller->setPreviousPage();
$recipe = 'pancakes';
$commentsData =$controller->getComments($recipe);

require ('resources/Views/pancakesRecipePage.php');
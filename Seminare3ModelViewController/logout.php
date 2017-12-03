<?php
namespace View;
use\Controller;
require ('Classes/Controller/Controller.php');
Controller\Controller::classLoader();
$controller = new Controller\Controller();
$previousPage = $controller->getPreviousPage();
$message = $controller->logout();

require ('resources/Views/statusPage.php');

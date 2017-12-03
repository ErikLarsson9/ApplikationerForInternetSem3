<?php
namespace View;
use\Controller;
require ('Classes/Controller/Controller.php');
Controller\Controller::classLoader();
$controller = new Controller\Controller();
$controller->setPreviousPage();
require ('resources/Views/calendarPage.php');
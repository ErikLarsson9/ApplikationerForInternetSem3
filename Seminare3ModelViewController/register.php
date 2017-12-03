<?php
namespace View;
use\Controller;
require ('Classes/Controller/Controller.php');
Controller\Controller::classLoader();
$controller = new Controller\Controller();
$previousPage = $controller->getPreviousPage();

$username = $_POST['username'];
$password = $_POST['password'];
$repeatPassword = $_POST['passwordRepeat'];

$message = $controller->register($username, $password, $repeatPassword);
require ('resources/Views/statusPage.php');

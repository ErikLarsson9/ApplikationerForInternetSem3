<?php
namespace Model;
use\SecurityUtility;
Class SessionFunctions{
    public function __construct()
    {
        session_start();


    }

    public function  getPreviousPage(){

        return $_SESSION['previousPage'];

    }
    public function setPreviousPage(){
        if(!SecurityUtility\Validator::validateURI($_SERVER['REQUEST_URI'])){
            $_SESSION['previousPage'] =  "/~Likecoke/Seminare3ModelViewController/index.php";
        }
        else{
            $_SESSION['previousPage'] = $_SERVER['REQUEST_URI'];
        }
        //echo $_SESSION['previousPage'];

    }

}
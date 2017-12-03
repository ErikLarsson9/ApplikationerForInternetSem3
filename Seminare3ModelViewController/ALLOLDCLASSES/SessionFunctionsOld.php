<?php
namespace Model;
Class SessionFunctionsOld{

    public static function sessionStart(){
        session_start();
    }
    public static function  getPreviousPage(){

        return $_SESSION['previousPage'];

    }
    public static function setPreviousPage(){

        $_SESSION['previousPage'] = $_SERVER['REQUEST_URI'];

    }

}
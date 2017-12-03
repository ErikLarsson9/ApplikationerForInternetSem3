<?php
namespace Model;
Class SessionFunctions{
    public function __construct()
    {
        session_start();


    }

    public function  getPreviousPage(){

        return $_SESSION['previousPage'];

    }
    public function setPreviousPage(){

        $_SESSION['previousPage'] = $_SERVER['REQUEST_URI'];

    }

}
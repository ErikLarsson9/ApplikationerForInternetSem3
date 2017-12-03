<?php
namespace Controller;
use \Integration;
use \Model;
Class ControllerOld{
    private $sqlConnection;


    public function __construct()
    {
        $this->sqlConnection = new Integration\SQL();


    }
    public static function classLoader(){
        spl_autoload_register(function($class){
            //echo $class;
            require ('Classes/'. \str_replace('\\', '/', $class) . '.php');

        });
    }




    public function login($username, $password){
        return Model\UserFunctions::login($username, $password, $this->sqlConnection);

    }
    public function logout(){
        return Model\UserFunctions::logout();
    }
    public function register($username, $password, $repeatPassword){
        return Model\UserFunctions::register($username, $password, $repeatPassword, $this->sqlConnection);
    }

    public function sessionStart(){
        Model\SessionFunctions::sessionStart();

    }
    public function  getPreviousPage(){
        return Model\SessionFunctions::getPreviousPage();
    }
    public function setPreviousPage(){
        Model\SessionFunctions::setPreviousPage();
    }

    public function getComments($recipe){
        $recipe = $recipe."comments";
        return Model\CommentFunctions::getComments($recipe, $this->sqlConnection);

    }
    public function deleteComment($user, $commentId, $recipe){
        $recipe = $recipe."comments";
        return Model\CommentFunctions::deleteComment($user, $commentId, $recipe, $this->sqlConnection);

    }
    public function addComment($user, $comment, $recipe){
        $recipe = $recipe."comments";
        return Model\CommentFunctions::addComment($user, $comment, $recipe, $this->sqlConnection);

    }









}
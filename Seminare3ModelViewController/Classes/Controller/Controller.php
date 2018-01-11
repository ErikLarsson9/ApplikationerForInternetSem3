<?php
namespace Controller;
use \Integration;
use \Model;
Class Controller{
    private $sqlConnection;
    private $session;


    public function __construct()
    {
        //Establish connection with SQl-server and start the session
        $this->sqlConnection = new Integration\SQL();
        $this->session = new Model\SessionFunctions();


    }
    public static function classLoader(){
        spl_autoload_register(function($class){
            //echo $class;
            require ('Classes/'. \str_replace('\\', '/', $class) . '.php');

        });
    }




    public function login($username, $password){
        $commentsFunction = new Model\UserFunctions($this->sqlConnection);
        return $commentsFunction->login($username, $password);

    }
    public function logout(){
        $commentsFunction = new Model\UserFunctions(null);
       return $commentsFunction->logout();
    }
    public function register($username, $password, $repeatPassword){
        $commentsFunction = new Model\UserFunctions($this->sqlConnection);
        return $commentsFunction->register($username, $password, $repeatPassword);
    }


    public function getPreviousPage(){
        return $this->session->getPreviousPage();
    }
    public function setPreviousPage(){
        $this->session->setPreviousPage();
    }

    public function getComments($recipe){
        $recipe = $recipe."commentsold";
        $commentsFunction = new Model\CommentFunctions($this->sqlConnection);
        return $commentsFunction->getComments($recipe);

    }
    public function deleteComment($user, $commentId, $recipe){
        $recipe = $recipe."commentsold";
        $commentsFunction = new Model\CommentFunctions($this->sqlConnection);
        return $commentsFunction->deleteComment($user, $commentId, $recipe);

    }
    public function addComment($user, $comment, $recipe){
        $recipe = $recipe."commentsold";
        $commentsFunction = new Model\CommentFunctions($this->sqlConnection);
        return $commentsFunction->addComment($user, $comment, $recipe);

    }









}

<?php
namespace {
    include('/Users/Likecoke/ACCESSME/SQLLogin.php');
}
namespace Controller {
    use \Integration;
    use \Model;
    use\SecurityUtility;


    Class Controller
    {
        private $sqlConnection;
        private $session;


        public function __construct()
        {
            global $server;
            global $mySQLUsername;
            global $mySQLPassword;
            global $database;
            //Establish connection with SQl-server and start the session
//            echo $server;
//            echo $mySQLUsername;
//            echo $mySQLPassword;
//            echo $database;
            $this->sqlConnection = new Integration\SQL($server,$mySQLUsername,$mySQLPassword, $database);
            //$this->sqlConnection = new Integration\SQL();
            $this->session = new Model\SessionFunctions();


        }

        public static function classLoader()
        {
            spl_autoload_register(function ($class) {
                //echo $class;
                require('Classes/' . \str_replace('\\', '/', $class) . '.php');

            });
        }


        public function login($username, $password)
        {
            if(!(SecurityUtility\Validator::validateUsername($username) &&  SecurityUtility\Validator::validatePassword($password))){
                return "Validation error";
            }
            $commentsFunction = new Model\UserFunctions($this->sqlConnection);
            return $commentsFunction->login($username, $password);

        }

        public function logout()
        {
            $commentsFunction = new Model\UserFunctions(null);
            return $commentsFunction->logout();
        }

        public function register($username, $password, $repeatPassword)
        {
            if(!(SecurityUtility\Validator::validateUsername($username) &&  SecurityUtility\Validator::validatePassword($password)
                &&  SecurityUtility\Validator::validatePassword($repeatPassword)
            )){
                return "Validation error";
            }
            $commentsFunction = new Model\UserFunctions($this->sqlConnection);
            return $commentsFunction->register($username, $password, $repeatPassword);
        }


        public function getPreviousPage()
        {
            return $this->session->getPreviousPage();
        }

        public function setPreviousPage()
        {
            $this->session->setPreviousPage();
        }

        public function getComments($recipe)
        {
            if(!SecurityUtility\Validator::validateRecipe($recipe)){
                return "Validation error";
            }
            $recipe = $recipe . "commentsold";
            $commentsFunction = new Model\CommentFunctions($this->sqlConnection);
            return $commentsFunction->getComments($recipe);

        }

        public function deleteComment($user, $commentId, $recipe)
        {
            if(false === (SecurityUtility\Validator::validateUsername($user)
                    && SecurityUtility\Validator::validateInt($commentId) &&
                    SecurityUtility\Validator::validateRecipe($recipe))){

                return "Validation error";

            }
            $recipe = $recipe . "commentsold";
            $commentsFunction = new Model\CommentFunctions($this->sqlConnection);
            return $commentsFunction->deleteComment($user, $commentId, $recipe);

        }

        public function addComment($user, $comment, $recipe)
        {
            if(false === (SecurityUtility\Validator::validateUsername($user)
                    && SecurityUtility\Validator::validateComment($comment) &&
                    SecurityUtility\Validator::validateRecipe($recipe))){

                return "Validation error";

            }
            $recipe = $recipe . "commentsold";
            $commentsFunction = new Model\CommentFunctions($this->sqlConnection);
            return $commentsFunction->addComment($user, $comment, $recipe);

        }


    }
}
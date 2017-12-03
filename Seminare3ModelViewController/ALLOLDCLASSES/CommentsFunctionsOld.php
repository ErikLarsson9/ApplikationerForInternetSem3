<?php
namespace Model;
Class CommentFunctionsOld{


    public static function getComments($recipe, $sqlConnection){
        If(null !=$sqlConnection->checkConnection()){
            //Login unsuccessful
            $error = array('id'=>1, 'username'=>'Error', 'text'=>"Couldn't Connect to database!");
            return $error;
        }
        else{
            return $sqlConnection->getComments($recipe);
        }


    }
    public static function deleteComment($user, $commentId, $recipe, $sqlConnection){
        If(null !=$sqlConnection->checkConnection()){

            return "Couldn't Connect to database!";
        }
        else{
            if($_COOKIE["user"]==$user){
                $sqlConnection->deleteComment($commentId, $recipe);
                return "Comment deleted!";
            }
            else{
                return "You don't have permission to delete this comment!";

            }

        }

    }
    public static function addComment($user, $comment, $recipe, $sqlConnection){

        If(null !=$sqlConnection->checkConnection()){

            return "Couldn't Connect to database!";
        }
        else{
            $sqlConnection->addComment($user, $comment, $recipe);
            return "Comment Posted!";
        }


    }

}

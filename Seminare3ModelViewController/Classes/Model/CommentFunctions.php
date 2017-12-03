<?php
namespace Model;
Class CommentFunctions{
    private $sqlConnection;

    public function __construct($sqlConnection)
    {
        $this->sqlConnection = $sqlConnection;


    }

    public function getComments($recipe){

        return $this->sqlConnection->getComments($recipe);
    }

    public function deleteComment($user, $commentId, $recipe){
        If(null !=$this->sqlConnection->checkConnection()){

            return "Couldn't Connect to database!";
        }
        else{
            if($_COOKIE["user"]==$user){
                $this->sqlConnection->deleteComment($commentId, $recipe);
                return "Comment deleted!";
            }
            else{
                return "You don't have permission to delete this comment!";

            }

        }

    }
    public function addComment($user, $comment, $recipe){

        If(null !=$this->sqlConnection->checkConnection()){

            return "Couldn't Connect to database!";
        }
        else{
            $this->sqlConnection->addComment($user, $comment, $recipe);
            return "Comment Posted!";
        }


}

}

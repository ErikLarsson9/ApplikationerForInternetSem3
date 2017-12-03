<?php
namespace Integration;
Class SQL{
    private  $server = 'localhost';
    private $mySQLUsername = 'php';
    private $mySQLPassword = 'pa$$W00RD';
    private $database = 'sem2login';
    private $mysqli;

    public function __construct()
    {
        $this->mysqli = new \mysqli($this->server, $this->mySQLUsername, $this->mySQLPassword);
        //Convert so we can use in query
        $this->database = $this->mysqli->real_escape_string($this->database);

    }
    public function getUserData($username){
        $username = $this->mysqli->real_escape_string($username);
        $this->mysqli->query("USE $this->database");
        $userInformation = $this->mysqli->query("SELECT username,password FROM user WHERE username = '$username' ");
        $data = $userInformation->fetch_object();
        //Free resources
        $userInformation->close();
        //Return requested data
        return $data;

    }
    public function insertUserData($username, $password){
        $username = $this->mysqli->real_escape_string($username);
        $password = $this->mysqli->real_escape_string($password);
        $this->mysqli->query("USE $this->database");
        $this->mysqli->query("INSERT INTO user (username, password) VALUES('$username', '$password') ");
    }
    public function getComments($recipe){
        $recipe = $this->mysqli->real_escape_string($recipe);
        $this->mysqli->query("USE $this->database");
        $commentsInformation = $this->mysqli->query("SELECT id,username,text FROM $recipe ");
        $data= array();
        while($row = $commentsInformation->fetch_object()){
            $data[$row->id] = $row;
        }
        //Free resources
        $commentsInformation->close();
        return $data;


    }
    public function deleteComment($commentId, $recipe){
        $commentId = $this->mysqli->real_escape_string($commentId);
        $recipe = $this->mysqli->real_escape_string($recipe);
        $this->mysqli->query("USE $this->database");
        $this->mysqli->query("DELETE FROM $recipe WHERE id=$commentId");
    }

    public function addComment($user, $comment, $recipe){
        $user = $this->mysqli->real_escape_string($user);
        $comment = $this->mysqli->real_escape_string($comment);
        $recipe = $this->mysqli->real_escape_string($recipe);
        $this->mysqli->query("USE $this->database");
        $this->mysqli->query("INSERT INTO $recipe (username, text) VALUES('$user', '$comment')");

    }

    public function checkConnection(){
        return $this->mysqli->connect_error;
    }


    public function __destruct()
    {
        $this->mysqli->close();
    }


}
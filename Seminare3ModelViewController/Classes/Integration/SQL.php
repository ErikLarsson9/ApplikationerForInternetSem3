<?php
namespace {
    include('/Users/Likecoke/ACCESSME/SQLLogin.php');
}
namespace Integration{
    use\SecurityUtility;
//include('/Users/Likecoke/ACCESSME/SQLLogin.php');
Class SQL{
    private $server;
    private $mySQLUsername;
    private $mySQLPassword;
    private $database;
    private $mysqli;

    public function __construct($server,$mySQLUsername,$mySQLPassword, $database)
        //public function __construct($server,$mySQLUsername,$mySQLPassword, $database)
    {
        global $server;
        global $mySQLUsername;
        global $mySQLPassword;
        global $database;

//        require('/Users/Likecoke/ACCESSME/SQLLogin.php');
        //echo $server."a";
//        echo $mySQLUsername."a";
        //echo $mySQLPassword."a";
//        echo $database."a";

        $this->server = $server;
        $this->mySQLUsername = $mySQLUsername;
        $this->mySQLPassword = $mySQLPassword;
        $this->database = $database;
//
        $this->mysqli = new \mysqli($this->server, $this->mySQLUsername, $this->mySQLPassword);
//        //Convert so we can use in query
        $this->database = $this->mysqli->real_escape_string($this->database);

    }
    public function getUserData($username){
        if(!SecurityUtility\Validator::validateUsername($username)){
            return "Validation Error!";
        }
        $username = $this->mysqli->real_escape_string($username);
        $this->mysqli->query("USE $this->database");
//        $userInformation = $this->mysqli->query("SELECT username,password FROM user WHERE username = '$username' ");
        $prepStatement = $this->mysqli->prepare("SELECT username,password FROM user WHERE username = ? ");
        $prepStatement->bind_param("s", $username);
        $prepStatement->execute();
        $prepStatement->bind_result($usernameResult, $passwordResult);
//        $userInformation = $this->mysqli->query("SELECT username,password FROM user WHERE username = '$username' ");
        $prepStatement->fetch();
        $data = array(
            "username" => $usernameResult,
            "password" => $passwordResult,
        );
//        echo $data["username"];
//        echo $data->password;
//        echo $data->username;
//        echo $data->password;
//        echo $data->username;
//        echo $data->password;
//        echo $data->username;
//        echo $data->password;
//        echo $data->username;
//        echo $data->password;

        //Free resources
        $prepStatement->close();
        //Return requested data
        return $data;

    }
    public function insertUserData($username, $password){
        if(!(SecurityUtility\Validator::validateUsername($username) &&  SecurityUtility\Validator::validatePassword($password))){
            return "Validation error";
        }
        $username = $this->mysqli->real_escape_string($username);
        $password = $this->mysqli->real_escape_string($password);
        $this->mysqli->query("USE $this->database");
//        $this->mysqli->query("INSERT INTO user (username, password) VALUES('$username', '$password') ");
        $prepStatement = $this->mysqli->prepare("INSERT INTO user (username, password) VALUES(?, ?) ");
        $prepStatement->bind_param("ss", $username, $password);
        $prepStatement->execute();
    }
    public function getComments($recipe){
        if(!SecurityUtility\Validator::validateRecipe($recipe)){
            return "Validation error";
        }
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
        if(!(SecurityUtility\Validator::validateInt($commentId) &&  SecurityUtility\Validator::validateRecipe($recipe))){
            return "Validation error";
        }

        $commentId = $this->mysqli->real_escape_string($commentId);
        $recipe = $this->mysqli->real_escape_string($recipe);
        $this->mysqli->query("USE $this->database");
//        $this->mysqli->query("DELETE FROM $recipe WHERE id=$commentId");
        $prepStatement = $this->mysqli->prepare("DELETE FROM $recipe WHERE id=?");
        $prepStatement->bind_param("i", $commentId);
        $prepStatement->execute();
    }

    public function addComment($user, $comment, $recipe){
        if(false === (SecurityUtility\Validator::validateUsername($user)
                && SecurityUtility\Validator::validate($comment) &&
                SecurityUtility\Validator::validateRecipe($recipe))){

            return "Validation error";

        }
        //$user = $this->mysqli->real_escape_string($user);
        //$comment = $this->mysqli->real_escape_string($comment);
        //$recipe = $this->mysqli->real_escape_string($recipe);
        $this->mysqli->query("USE $this->database");
        //$this->mysqli->query("INSERT INTO $recipe (username, text) VALUES('$user', '$comment')");
        $prepStatement = $this->mysqli->prepare("INSERT INTO $recipe (username, text) VALUES(?, ?)");
        //$prepStatement = $this->mysqli->prepare("INSERT INTO ? (username, text) VALUES(?, ?)");
        //$prepStatement->bind_param("sss", $recipe, $user, $comment);
        $prepStatement->bind_param("ss", $user, $comment);
        $prepStatement->execute();

    }

    public function checkConnection(){
        return $this->mysqli->connect_error;
    }


    public function __destruct()
    {
        $this->mysqli->close();
    }


}

}
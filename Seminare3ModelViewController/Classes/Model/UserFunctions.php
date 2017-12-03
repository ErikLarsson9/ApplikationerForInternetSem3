<?php
namespace Model;
Class UserFunctions{
    private $sqlConnection;

    public function __construct($sqlConnection)
    {
        $this->sqlConnection = $sqlConnection;


    }

    public function login($username, $userPassword){

        If(null !=$this->sqlConnection->checkConnection()){
            //Login unsuccessful
            return "Database server is offline!";
        }
        else{
            //if data is not empty we can test it
            if($userData = $this->sqlConnection->getUserData($username)){
                //Check if successful login and if so set cookie
                //if ($userData->username == $username && $userData->password == $userPassword) {
                if ($userData->username == $username && password_verify ( $userPassword, $userData->password )) {

                                    //Cookie lifetime is 30 min
                    $cookie_name = "user";
                    setcookie($cookie_name, $username, time() + 30 * 60);
                    return "Logged in successfully!";
                }
                //If username entered is the same but different case
                else if($userData->username != $username){

                    return "Username doesn't exist!";
                }
                //Password incorrect
                else{
                    return "Incorrect password!";

                }

            }
            //Username doesn't exist
            else{
                return "Username doesn't exist!";
            }

        }
    }
    public function logout(){

        setcookie("user", "", time() - 3600);
        return "Logged out successfully!";


    }
    public function register($username, $password, $repeatPassword){

        If(null !=$this->sqlConnection->checkConnection()){
            //Registration unsuccessful
            return "Database server is offline!";
        }

        if($username==null){
            return "You must enter a username!";
        }
        else{
            $userData = $this->sqlConnection->getUserData($username);

            if (null != $userData){

                return "Username already exists!";

            }
            else{
                if($password==null){
                    return "You must enter a password!";
                }
                elseif($password==$repeatPassword){
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                    $this->sqlConnection->insertUserData($username, $hashedPassword);
                    return "You are now registered!";
                }
                else{
                    return "Passwords don't match!";
                }


            }


        }

    }
}

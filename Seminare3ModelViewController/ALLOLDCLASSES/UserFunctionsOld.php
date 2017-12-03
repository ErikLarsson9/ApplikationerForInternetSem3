<?php
namespace Model;
Class UserFunctionsOld{



    public static function login($username, $userPassword, $sqlConnection){

        If(null !=$sqlConnection->checkConnection()){
            //Login unsuccessful
            return "Database server is offline!";
        }
        else{
            //if data is not empty we can test it
            if($userData = $sqlConnection->getUserData($username)){
                //Check if successful login and if so set cookie
                if ($userData->username == $username && $userData->password == $userPassword) {
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
    public static function logout(){

        setcookie("user", "", time() - 3600);
        return "Logged out successfully!";


    }
    public static function register($username, $password, $repeatPassword, $sqlConnection){

        If(null !=$sqlConnection->checkConnection()){
            //Registration unsuccessful
            return "Database server is offline!";
        }

        if($username==null){
            return "You must enter a username!";
        }
        else{
            $userData = $sqlConnection->getUserData($username);

            if (null != $userData){

                return "Username already exists!";

            }
            else{
                if($password==null){
                    return "You must enter a password!";
                }
                elseif($password==$repeatPassword){

                    $sqlConnection->insertUserData($username, $password);
                    return "You are now registered!";
                }
                else{
                    return "Passwords don't match!";
                }


            }


        }

    }
}

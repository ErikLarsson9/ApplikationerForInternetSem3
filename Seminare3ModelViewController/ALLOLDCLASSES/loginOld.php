

<?php


session_start();
$server = 'localhost';
$mySQLUsername = 'php';
$mySQLPassword = 'pa$$W00RD';
$database = 'sem2login';

$loggedIn = False;
$incorrectPw= False;
$previousPage = $_SESSION['previousPage'];
//$previousPage = $_POST['site'];








$mysqli = new mysqli($server, $mySQLUsername, $mySQLPassword);
if($mysqli->connect_error){


    //echo "<h1>Connection failed!!</h1>";

    //echo "<div ><a href='loginOld.php'>Retry?</div>";

}
else {
    //echo 'Connected successfully to user database';
    //Retrieve username and password from post
    $username = $_POST['username'];
    $userPassword = $_POST['password'];
    $databaseQ = $mysqli->real_escape_string($database);
    //convert so we can use in query
    $mysqli->query("USE $databaseQ");

    //convert so we can use in query
    $usernameQ = $mysqli->real_escape_string($username);
    //$userPassword = $mysqli->real_escape_string($userPassword);

    //if query is successful (Don't use semicolon to end query)
    if ($userInformation = $mysqli->query("SELECT username,password FROM user WHERE username = '$usernameQ' ")) {

        //fetch_object fetches the next row object from the query result
        // Attempt to fetch the row with the username and check if the password is correct
        if ($row = $userInformation->fetch_object()) {
            if ($row->username == $username && $row->password == $userPassword) {
                $loggedIn = True;



                //echo 'Logged in as user:'.$username;
                //Cookie lifetime should be 30 min
                $cookie_name = "user";
                setcookie($cookie_name, $username, time() + 30 * 60);


//                echo "<a href=\"".$previousPage."\">Continue</a>";


            } //            elseif($row->username == $username && $row->password != $userPassword){
            else {
                $incorrectPw= True;
                // echo 'Incorrect password, please try again!';


            }
            //Free resources
            $userInformation->close();


        } else {
            //The query returned nothing
            //echo "No such user: ".$username;
        }


    } else {
        //echo("$mysqli->error");
    }

}

?>
<!DOCTYPE html>
<html>
<head>

    <link rel = "stylesheet" type = "text/css" href = "../resources/css/reset.css"/>
    <link rel = "stylesheet" type = "text/css" href = "../resources/css/main.css"/>
    <link rel = "stylesheet" type = "text/css" href = "../resources/css/recipesAndIndex.css"/>
    <meta charset="UTF-8">


</head>
<body>
<?php
    $usernameHtml = htmlspecialchars($username);
    if($mysqli->connect_error){
        echo "<h1>Connection failed!!</h1>";
        echo "<div ><a href='loginOld.php'>Retry?</div>";
    }
    else{
        echo "<h1>Connected successfully to user database<br/></h1>";


    }
    if(!$userInformation){

        echo "<h1>Invalid database query</h1>";

    }
    if($loggedIn){

        echo "<h1>Logged in as user: $usernameHtml</h1>";


    }
    if($incorrectPw){
        echo "<h1>Incorrect password, please try again!</h1>";
    }
    if(!$row){
        echo "<h1>No such user: </h1>";
    }
    echo "<a class='continue' href=\"".$previousPage."\">Continue</a>";



?>



</body>
</html>

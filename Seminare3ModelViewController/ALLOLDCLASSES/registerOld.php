<?php
session_start();

$server = 'localhost';
$mySQLUsername = 'php';
$mySQLPassword = 'pa$$W00RD';
$database = 'sem2login';
$mysqli = new mysqli($server, $mySQLUsername, $mySQLPassword);
//convert so we can use in query
$databaseQ = $mysqli->real_escape_string($database);
$username = $_POST['username'];
$password = $_POST['password'];
$repeatPassword = $_POST['passwordRepeat'];
$previousPage = $_SESSION['previousPage'];
//$previousPage = $_POST['site'];
$usernameQ = $mysqli->real_escape_string($username);
$passwordQ = $mysqli->real_escape_string($password);
//$textQ = $mysqli->real_escape_string($text);
//$recipeQ = $mysqli->real_escape_string($recipe);
if($username==null){
    $message = "You must enter a valid username!";


}
else{

    $mysqli->query("USE $databaseQ");
    $userNameQuery = $mysqli->query("SELECT username FROM user WHERE username = '$usernameQ' ");

    //if
    if (null != $userNameQuery->fetch_object()){
        $message ="Username already exists!";


    }
    else{
        if($password==$repeatPassword){
            $mysqli->query("INSERT INTO user (username, password) VALUES('$usernameQ', '$passwordQ') ");
            $message ="You are now registered!";
        }
        else{
            $message ="Passwords don't match!";
        }


    }
    //Free resources
    $userNameQuery->close();

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
echo "<h1>".$message."</h1>";
echo "<a class='continue' href=\"".$previousPage."\">Continue</a>";
?>



</body>
</html>

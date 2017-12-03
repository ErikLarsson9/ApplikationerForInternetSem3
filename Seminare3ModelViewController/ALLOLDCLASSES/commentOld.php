<?php
$server = 'localhost';
$mySQLUsername = 'php';
$mySQLPassword = 'pa$$W00RD';
$database = 'sem2login';
$mysqli = new mysqli($server, $mySQLUsername, $mySQLPassword);
//convert so we can use in query
$databaseQ = $mysqli->real_escape_string($database);
$user = $_POST['user'];
$text = $_POST['comment'];
$recipe = $_POST['recipe'];
$previousPage = $_POST['site'];
$userQ = $mysqli->real_escape_string($user);
$textQ = $mysqli->real_escape_string($text);
$recipeQ = $mysqli->real_escape_string($recipe);


$mysqli->query("USE $databaseQ");
$commentsQuery = $mysqli->query("INSERT INTO $recipeQ (username, text) VALUES('$userQ', '$textQ')");




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
    echo "<h1>Comment Posted!</h1>";
    echo "<a class='continue' href=\"".$previousPage."\">Continue</a>";
?>



</body>
</html>

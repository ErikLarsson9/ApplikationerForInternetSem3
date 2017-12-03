<?php
$server = 'localhost';
$mySQLUsername = 'php';
$mySQLPassword = 'pa$$W00RD';
$database = 'sem2login';
$mysqli = new mysqli($server, $mySQLUsername, $mySQLPassword);
//convert so we can use in query
$databaseQ = $mysqli->real_escape_string($database);
$user = $_POST['user'];
$commentId = $_POST['commentId'];
$recipe = $_POST['recipe'];
$previousPage = $_POST['site'];
$userQ = $mysqli->real_escape_string($user);
$commentIdQ = $mysqli->real_escape_string($commentId);
$recipeQ = $mysqli->real_escape_string($recipe);
$permissionToDelete=True;


$mysqli->query("USE $databaseQ");
//if the user whos comment we want to delete is logged in delete the comment
if($_COOKIE["user"]==$user){
//    $commentsQuery = $mysqli->query("INSERT INTO $recipeQ (username, text) VALUES('$userQ', '$textQ')");
    $commentsQuery = $mysqli->query("DELETE FROM $recipeQ WHERE id=$commentIdQ");
    echo("$mysqli->error");
}
else{
    $permissionToDelete=False;
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
if($permissionToDelete){
    echo "<h1>Comment deleted!</h1>";
}
else{
    echo "<h1>You don't have permission to delete this comment!</h1>";
}
echo "<a class='continue' href=\"".$previousPage."\">Continue</a>";
?>



</body>
</html>
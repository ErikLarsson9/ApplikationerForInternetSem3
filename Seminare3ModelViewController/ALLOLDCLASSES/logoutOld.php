<?php
session_start();


$previousPage = $_SESSION['previousPage'];
//$previousPage = $_POST['site'];
setcookie("user", "", time() - 3600);


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
echo "<h1>You are now logged out!</h1>";
echo "<a class='continue' href=\"".$previousPage."\">Continue</a>";
?>



</body>
</html>

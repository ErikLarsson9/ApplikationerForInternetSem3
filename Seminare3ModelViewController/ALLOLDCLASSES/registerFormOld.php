<?php
session_start();

$previousPage = $_SESSION['previousPage'];
?>
<!DOCTYPE html>
<html>
<head>

    <link rel = "stylesheet" type = "text/css" href = "resources/css/reset.css"/>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/main.css"/>
    <link rel = "stylesheet" type = "text/css" href = "resources/css/recipesAndIndex.css"/>
    <meta charset="UTF-8">
    <title>Document Title</title>

</head>
<body>


<form action="register.php" method="post">
    <h1>Register</h1>
    <p class="loginRegisterpara">Username: </p>
    <input type="text" name="username"  />
    <p class="loginRegisterpara">Password:</p>
    <input type="password" name="password" " />
    <p class="loginRegisterpara">Repeat Password:</p>
    <input type="password" name="passwordRepeat" " />


    <input type="submit" value="Register" />
    <a class='continue' href="<?php echo "$previousPage"; ?>" >Cancel</a>


</form>






</body>
</html>
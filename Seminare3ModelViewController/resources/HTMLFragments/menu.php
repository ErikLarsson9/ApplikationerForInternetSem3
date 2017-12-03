<script src="http://localhost/~Likecoke/Seminare3ModelViewController/resources/JavaScript/login.js">
</script>













<ul class="menu">
    <li class="menu-list" ><a href="http://localhost/~Likecoke/Seminare3ModelViewController/index.php" class="button">Home</a></li>
    <li class="menu-list" ><a href="http://localhost/~Likecoke/Seminare3ModelViewController/calendar.php" class="button">Calendar</a></li>
    <li class="dropdown menu-list displayonhover">
        <!-- The javascript:void(0) returns undefined so the browser does nothing since it can't replace the content with undefined.   -->
        <a href="javascript:void(0)"  class="dropbtn">Recipes</a>
        <div class="dropdown-content">
            <a  href="http://localhost/~Likecoke/Seminare3ModelViewController/meatballsRecipe.php" >Meatballs Recipe</a>
            <a  href="http://localhost/~Likecoke/Seminare3ModelViewController/pancakesRecipe.php" >Pancakes Recipe</a>
        </div>
    </li>
<!--    <li class="menu-list" ><a href="loginForm.php" class="button">Login</a></li>-->
    <li class="dropdown menu-list" >
        <a href="javascript:showLogin();"  class="dropbtn">
            <?php
            if(isset($_COOKIE["user"])){
                //echo 'Welcome '.$_COOKIE["user"].'!';
                echo 'User: '.$_COOKIE["user"];
            }
            else{
                echo 'Click here to login';
            }
            ?></a>
        <?php
        if(isset($_COOKIE["user"])){
            //Display logout menu
            echo"<form id=\"form\" class=\"dropdown-content\" action=\"logout.php\" method=\"post\">";
            echo"<h1 class=\"logout\"".">Logout </h1>";
            echo"<h1 class=\"logout\">".$_COOKIE["user"]."</h1>";
            //echo"<input type=\"hidden\" name=\"site\" value=\"".htmlspecialchars(basename($_SERVER['REQUEST_URI']))."\" />";
            echo"<input class=\"loginButton\" type=\"submit\" value=\"Log out\" />";
            echo"<button class=\"cancelButton\"  type=\"button\" onclick=\"javascript:hideLogin()\">Cancel</button>";
            echo" </form>";


        }
        else{
            //Display login menu
            echo"<form id=\"form\" class=\"dropdown-content\" action=\"login.php\" method=\"post\">";
            echo"<h1 class=\"login\">Log In</h1>";
            echo"<p class=\"loginRegisterpara\">Username: </p>";
            echo" <input type=\"text\" name=\"username\"  />";
            echo"<p class=\"loginRegisterpara\">Password:</p>";
            echo"<input class = \"displayblock\" type=\"password\" name=\"password\" \" />";
            //echo"<input type=\"hidden\" name=\"site\" value=\"".htmlspecialchars(basename($_SERVER['REQUEST_URI']))."\" />";
            echo"<input class=\"loginButton\" type=\"submit\" value=\"Log In\" />";
            echo"<button class=\"cancelButton\"  type=\"button\" onclick=\"javascript:hideLogin()\">Cancel</button>";
            echo" </form>";
        }

        ?>






    </li>
<!--        <form id="form" class="menu-list" action="login.php" method="post">-->
<!--        <li  class="menu-list" ><a type="submit" class="button">Register</a></li>-->
<!--        </form>-->
<!--        <li class="titles">Recipe Site </li>-->
    <li class="menu-list" ><a href="http://localhost/~Likecoke/Seminare3ModelViewController/registerForm.php" class="button">Register</a></li>
    <li class="titles"> Recipe Site </li>
</ul>



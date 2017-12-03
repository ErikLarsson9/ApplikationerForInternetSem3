
<!DOCTYPE html>
<html>
<head>

    <link rel = "stylesheet" type = "text/css" href = "http://localhost/~Likecoke/Seminare3ModelViewController/resources/css/reset.css"/>
    <link rel = "stylesheet" type = "text/css" href = "http://localhost/~Likecoke/Seminare3ModelViewController/resources/css/main.css"/>
    <link rel = "stylesheet" type = "text/css" href = "http://localhost/~Likecoke/Seminare3ModelViewController/resources/css/recipesAndIndex.css"/>
    <meta charset="UTF-8">
    <title>Document Title</title>

</head>
<body class="test recipe">
<?php
require(__DIR__.'/../HTMLFragments/menu.php');
?>
<section>
    <h1>Delicious Meatballs With Mashed Potatoes </h1>
    <img class="recipe-image" src="http://localhost/~Likecoke/Seminare3ModelViewController/resources/images/meatballs.jpg" style="width:80%" alt=meatballs/>
</section>

<div class="recipeContainer">
    <aside class ="ingredients">
        <h2>Ingredients </h2>
        <h3>Meatballs </h3>
        <ol>
            <li class="ingredients"> 1 1/2 dl milk </li>
            <li class="ingredients">5 tbsp bread crumbs "ströbröd" </li>
            <li class="ingredients">1/2 onion (peeled and grated)</li>
            <li class="ingredients">One egg </li>
            <li class="ingredients">1 tsp salt </li>
            <li class="ingredients">one pinch of pepper </li>
            <li class="ingredients">1/2 tsp sugar </li>
            <li class="ingredients">butter or margarine </li>


        </ol>
        <h3>Mashed potatoes </h3>
        <ol>
            <li class="ingredients"> 1 kg potatoes </li>
            <li class="ingredients">Water </li>
            <li class="ingredients">salt</li>
            <li class="ingredients">2 1/4 dl milk</li>
            <li class="ingredients">1 tbsp butter or margarin </li>
            <li class="ingredients">two pinches of white pepper </li>
            <li class="ingredients">one pinch of sugar </li>


        </ol>
    </aside>
    <section class="subsection">
        <h2>Directions </h2>
        <h3> Meatballs </h3>
        <p> Mix the milk and bread crumbs. Let swell for 10 minutes.
            Add minced meat, onion, egg, salt, pepper, and sugar in the bread crumb mix. Work the mince smooth.
        </p>
        <p> Moisten your hands with cold water and shape the meatballs. Fry a few at a time in the butter/margarine, shaking the pan once in awhile.				 </p>
        <h3> Mashed potatoes </h3>
        <p> Peel and wash the potatoes. Cut them into smaller pieces. Boil them in salted water until soft (about 15 min). Pour off the water.															</p>
        <p> Mash the potatoes with a potato masher. Thin the mix with warm milk and put in the margarine or butter. Season with salt, pepper and sugar. Mix until smooth and porous.
        </p>
        <h3 class = "reference"> References </h3>
        <p>
            https://www.ica.se/recept/potatismos-grundrecept-399/
        </p>
        <p> https://www.ica.se/recept/klassiska-kottbullar-712807/
        </p>
        <?php
            require(__DIR__.'/../HTMLFragments/comments.php');
        ?>
        <?php
        require(__DIR__.'/../HTMLFragments/commentingUI.php');

//        if(isset($_COOKIE["user"])){
//            echo 'Comment as: '.$_COOKIE["user"];
//            echo "<form class=\"formComment\" action=\"commentOld.php\" method=\"post\">";
//            echo "<input  type=\"text\" name=\"comment\"  />";
//            echo "<input  type=\"hidden\" name=\"recipe\" value=\"meatballscomments\" />";
//            echo "<input  type=\"hidden\" name=\"user\" value=\"".$_COOKIE["user"]."\" />";
//            echo "<input type=\"hidden\" name=\"site\" value=\"".htmlspecialchars(basename($_SERVER['REQUEST_URI']))."\" />";
//            echo "<input  type=\"submit\" value=\"Post comment\" />";
//            echo "</form>";
//
//
//
//
//        }
        ?>
    </section>

</div>
</body>
</html>


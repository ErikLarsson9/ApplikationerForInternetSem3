
<!DOCTYPE html>
<html>
<head>

    <link rel = "stylesheet" type = "text/css" href = "http://localhost/~Likecoke/Seminare3ModelViewController/resources/css/reset.css"/>
    <link rel = "stylesheet" type = "text/css" href = "http://localhost/~Likecoke/Seminare3ModelViewController/resources/css/main.css"/>
    <link rel = "stylesheet" type = "text/css" href = "http://localhost/~Likecoke/Seminare3ModelViewController/resources/css/calender.css"/>
    <meta charset="UTF-8">
    <title>Document Title</title>


</head>
<body>
<?php
require(__DIR__.'/../HTMLFragments/menu.php');
?>


<h1>Calendar</h1>
<div class="calender-section">
    <div class="calender-Innersection">
        <ul class="calender-row calendarTopRow">
            <li class=calender-weekday> Sun </li>
            <li class=calender-weekday> Mon </li>
            <li class=calender-weekday> Tue </li>
            <li class=calender-weekday> Wed </li>
            <li class=calender-weekday> Thu </li>
            <li class=calender-weekday> Fri </li>
            <li class=calender-weekday> Sat </li>

        </ul>
        <ul class="calender-row">
            <li class=calender-element>  </li>
            <li class=calender-element> 1 </li>
            <li class=calender-element> 2 </li>
            <li class=calender-element> 3 </li>
            <li class=calender-element> 4 </li>
            <li class=calender-element> 5 </li>
            <li class=calender-element>
                <a class="calender-link" href="http://localhost/~Likecoke/Seminare3ModelViewController/meatballsRecipe.php" >
                    <p class="calender-link"> 6</p>
                    <img class="calender-image" src="http://localhost/~Likecoke/Seminare3ModelViewController/resources/images/meatballs.jpg" alt="meatballs"/>
                </a>
            </li>
        </ul>
        <ul class="calender-row">
            <li class=calender-element> 7 </li>
            <li class=calender-element> 8 </li>
            <li class=calender-element> 9 </li>
            <li class=calender-element> 10 </li>
            <li class=calender-element> 11 </li>
            <li class=calender-element> 12 </li>
            <li class=calender-element> 13 </li>
        </ul>
        <ul class="calender-row">
            <li class=calender-element> 14 </li>
            <li class=calender-element> 15 </li>
            <li class=calender-element> 16 </li>
            <li class=calender-element> 17 </li>
            <li class=calender-element>
                <a class="calender-link" href="http://localhost/~Likecoke/Seminare3ModelViewController/pancakesRecipe.php" >
                    <p class="calender-link"> 18</p>
                    <img class="calender-image"  src="http://localhost/~Likecoke/Seminare3ModelViewController/resources/images/pancakes.jpg"
                         alt="pancakes" />
                </a>
            </li>
            <li class=calender-element> 19 </li>
            <li class=calender-element> 20 </li>

        </ul>
        <ul class="calender-row">
            <li class=calender-element> 21 </li>
            <li class=calender-element> 22 </li>
            <li class=calender-element> 23 </li>
            <li class=calender-element> 24 </li>
            <li class=calender-element> 25 </li>
            <li class=calender-element> 26 </li>
            <li class=calender-element> 27 </li>
        </ul>
        <ul class="calender-row">
            <li class=calender-element> 28 </li>
            <li class=calender-element> 29</li>
            <li class=calender-element> 30 </li>
            <li class=calender-element> 31</li>
            <li class=calender-element>  </li>
            <li class=calender-element>  </li>
            <li class=calender-element>  </li>
        </ul>
    </div>
</div>
</body>

</html>
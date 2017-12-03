<?php
if(isset($_COOKIE["user"])){
    echo 'Comment as: '.$_COOKIE["user"];
    echo "<form class=\"formComment\" action=\"comment.php\" method=\"post\">";
    echo "<input  type=\"text\" name=\"comment\"  />";
    echo "<input type=\"hidden\" name=\"recipe\" value=\"".$recipe."\" />";
    echo "<input  type=\"hidden\" name=\"user\" value=\"".$_COOKIE["user"]."\" />";
    echo "<input  type=\"submit\" value=\"Post comment\" />";
    echo "</form>";
}
?>



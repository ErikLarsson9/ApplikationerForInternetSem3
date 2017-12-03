<h3 class = "reference">  Comments </h3>
<div class="commentsContainer">
    <?php
    foreach ($commentsData as $value){
    //while($row = $commentsQuery->fetch_object()){
        echo "<div class=\"singleComment\">";
        echo "<aside class=\"comments\">";
        //echo "<p>".$row->username."</p>";
        echo "<p>".$value->username."</p>";
        echo "</aside>";
        echo "<div class=\"comments\">";
        echo "<p>".$value->text."</p>";
////If user is logged in
        if(isset($_COOKIE["user"])){
            ////if comment was written by current user show delete
            if($_COOKIE["user"] == $value->username) {

                echo "<form class=\"formComment\" action=\"deleteComment.php\" method=\"post\">";
                echo "<input type=\"hidden\" name=\"recipe\" value=\"".$recipe."\" />";
                echo "<input type=\"hidden\" name=\"commentId\" value=\"".$value->id."\" />";
                echo "<input type=\"hidden\" name=\"user\" value=\"".$value->username."\" />";
                echo "<input type=\"submit\" value=\"Delete Comment\" />";
                echo "</form>";
            }
        }
        ////
        echo "</div>";
        echo "</div>";



    }
    ?>
</div>
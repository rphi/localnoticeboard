<?php
    if (!isset($_GET['id'])) {
        echo "<script>window.alert(\"No post ID set, this is a website fault. Please report this to an administrator.\")</script>";
        echo "<script>self.close()</script>";
    } else {
        $ID = $_GET['id'];
    };

    if (isset($_GET['direction'])) {
        $direction = $_GET['direction'];
    } else {
        $direction = "up";
    };
?>

<h1>Do you want to vote for this post?</h1>

<?php

    include ("engine/sql/sqlconnect.php");

    $postdetails = mysqli_fetch_array( mysqli_query($conn,"SELECT * FROM posts WHERE ID='".$ID."'") );

    echo "<h2>".$postdetails['Title']."</h2>";
    echo "<p>By ".$postdetails['User']."</p>";

    echo "<a class=\"btn btn-primary\" href=\"?loc=engine/voting/votehandler&ispage=false&id=".$ID."&direction=".$direction."\">Yes</a>";


?>


<button type="button" class="btn btn-default" onclick="self.close()">Cancel</button>

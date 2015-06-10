<html>
    <head>
        <title>Voting | Please wait</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>

    <body>

        <?php
            if (! ( ( isset($_GET['id']) ) & ( isset( $_GET['direction'] ) ) ) ) {
                echo "<script>window.alert(\"No post ID and/or direction set, this is a website fault. Please report this to an administrator.\")</script>";
                echo "<script>self.close()</script>";
            } else {
                $ID = $_GET['id'];
                $direction = $_GET['direction'];
            };
        ?>

        <h1>Your vote is being processed</h1>

        <?php

            include ("sqlcreds.php");
            include ("sqlconnect.php");

            $postdetails = mysqli_fetch_array( mysqli_query($conn,"SELECT * FROM posts WHERE ID='".$ID."'") );

            $currentVotes = $postdetails['Votes'];

            if ($direction == "down") {
                $voteChange = -1;
            } else if ($direction == "up") {
                $voteChange = 1;
            } else {
                echo "<script>window.alert(\"Unknown vote parameter. Something must have gone wrong. Please try again or contact a site administrator.\")</script>";
                echo "<script>self.close()</script>";
            };

            $newVotes = $currentVotes + $voteChange;

            mysqli_query($conn, "UPDATE posts
            SET Votes='".$newVotes."'
            WHERE ID='".$ID."'");

            echo "<h4>Your vote has been processed<h4>";
            echo "<button type=\"button\" class=\"btn btn-primary\" onclick=\"self.close()\">Close</button>";

        ?>

    </body>


    <script>

        onClose() {
         window.opener.popUpClosed = true;
        };

    </script>


</html>

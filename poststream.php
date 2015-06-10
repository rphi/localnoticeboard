<!-- Slightly nicer, post by post stream instead of the original table -->

<html>
    <head>
        <!-- Bootstrap for basic styling -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>
        <?php

        include ("sqlcreds.php");

        echo "Connecting to SQL server @ ".$servername." into database ".$dbname."<br/>";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        echo "Connected successfully";

        $result = mysqli_query($conn,"SELECT * FROM posts");

        ?>

        <br/>

        <a class="btn btn-default" href="writepost.php">Add post</a>
        <a class="btn btn-default" href="listposts.php">Table of posts</a>

        <hr/>

        <div class="row">

            <?php
            while($row = mysqli_fetch_array($result))
            {
            echo "<div class=\"col-md-3 panel\">";
            echo "<strong>Post ID:</strong>  " . $row['ID'] . "<br/>";
            echo "<h2>" . $row['Title'] . "</h2>";
            echo "<strong>Category:</strong>  " . $row['Category'] . "<br/>";
            echo "<strong>Timestamp:</strong>  " . $row['Timestamp'] . "<br/>";
            echo "<strong>User:</strong>  " . $row['User'] . "<br/>";
            echo "<strong>Post:</strong><br/>" . $row['Content'] . "</br>";
            echo "<strong>Image:</strong>  " . $row['Image'] . "</br>";
            echo "<img src=\"" . $row['Image'] . "\" class=\"img-responsive\"></img><br/>";
            echo "<strong>Votes:</strong> " . $row['Votes'] . "<br/>";
            echo "<button type=\"button\" class=\"btn btn-default\" onClick=\"voteUp(" . $row['ID'] .", 'up')\">Vote Up</button>";
            echo "<button type=\"button\" class=\"btn btn-default\" onClick=\"voteUp(" . $row['ID'] .", 'down')\">Vote Down</button>";
            echo "</div>";
            }

            mysqli_close($conn);

            ?>

        </div>
    </body>

    <!-- Voting JS -->

    <script>

        function voteUp(ID, direction) {
            votepopup = window.open("voteconfirm.php?id=" + ID + "&direction=" + direction,'Voter','height=300,width=400');
            if (window.focus) {
                votepopup.focus()
            };
        };

    </script>


</html>

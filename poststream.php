<!-- Slightly nicer, post by post stream instead of the original table -->

<html>
    <head>
        <!-- Bootstrap for basic styling -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/custom.css">
    </head>
    <body>
        <?php

        include ("servercreds.php");

        echo "Connecting to SQL server @ ".$servername." into database ".$dbname."<br/>";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        echo "Connected successfully";

        echo "<hr/>";

        $result = mysqli_query($conn,"SELECT * FROM posts"); ?>

        <div class="row">

            <?php
            while($row = mysqli_fetch_array($result))
            {
            echo "<div class=\"col-md-3 panel\">";
            echo "<strong>Post ID:</strong>  " . $row['ID'] . "<br/>";
            echo "<strong>Title:</strong><br/><h3>" . $row['Title'] . "</h3>";
            echo "<strong>Category:</strong>  " . $row['Category'] . "<br/>";
            echo "<strong>Timestamp:</strong>  " . $row['Timestamp'] . "<br/>";
            echo "<strong>User:</strong>  " . $row['User'] . "<br/>";
            echo "<strong>Post:</strong><br/>" . $row['Content'] . "</br>";
            echo "<strong>Image:</strong>  " . $row['Image'] . "</br>";
            echo "</div>";
            }

            mysqli_close($conn);

            ?>

        </div>
    </body>
</html>

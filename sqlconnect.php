<!-- Quick SQL connection code -->

<?php
    echo "Connecting to SQL server @ ".$servername." into database ".$dbname."<br/>";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    echo "Connected successfully";
?>

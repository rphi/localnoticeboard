<?php

include ("/servercreds.php");

echo "Connecting to SQL server @ ".$servername." into database ".$dbname."<br/>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

echo "<hr/>";
echo "Writing responses to table<br/>";

$lastIDobject = mysqli_query($conn,"SELECT valueint FROM sys WHERE setting='lastPost'");

$lastIDarray = mysqli_fetch_array($lastIDobject);

$nextID = $lastIDarray['valueint'] + 1;

$ID = $nextID;
$Title = addslashes($_POST["Title"]);
$Category = addslashes($_POST["Category"]);
$User = addslashes($_POST["User"]);
$Content = addslashes($_POST["Content"]);
$Image = addslashes($_POST["Image"]);

$sql = "INSERT INTO posts (ID, Title, Category, User, Content, Image)
VALUES ('".$ID."', '".$Title."', '".$Category."', '".$User."', '".$Content."', '".$Image."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    mysqli_query($conn, "UPDATE sys
            SET valueint='".$nextID."'
            WHERE setting='lastPost'");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

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
echo "Writing responses to table<br/>";

$Title = addslashes($_POST["Title"]);
$Category = addslashes($_POST["Category"]);
$User = addslashes($_POST["User"]);
$Content = addslashes($_POST["Content"]);
$Image = addslashes($_POST["Image"]);

$sql = "INSERT INTO posts (Title, Category, User, Content, Image)
VALUES ('".$Title."', '".$Category."', '".$User."', '".$Content."', '".$Image."')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>

<?php

include ("servercreds.php");

// Run this to initialise the MySQL database

echo "Connecting to SQL server @ ".$servername." into database ".$dbname."<br/>";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";

// sql to create table
$sql = "CREATE TABLE posts (
ID INT(5) PRIMARY KEY AUTO_INCREMENT,
Title text,
Category text,
Timestamp TIMESTAMP default CURRENT_TIMESTAMP,
User text,
Content text,
Image text,
Rank INT(5) default '0'
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'posts' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

echo "<br/> Creating 'sys' table";

// sql to create table
$sql = "CREATE TABLE sys (
setting text NOT NULL,
valuetxt text default NULL,
valueint int(11) default NULL,
valuebool boolean default NULL
)";

if ($conn->query($sql) === TRUE) {
    echo "Table 'sys' created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

?>

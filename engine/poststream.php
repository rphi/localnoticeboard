<?php
// Generates posts in "col-md-3 panel" <div> tags

include ("engine/sql/sqlconnect.php"); // Include SQL connection script

$result = mysqli_query($conn,"SELECT * FROM posts");

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

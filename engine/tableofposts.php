<?php

    include ("engine/sql/sqlconnect.php");

    $result = mysqli_query($conn,"SELECT * FROM posts");

    echo "<table border='1'>
    <tr>
    <th>ID</th>
    <th>Title</th>
    <th>Category</th>
    <th>Timestamp</th>
    <th>User</th>
    <th>Content</th>
    <th>Image</th>
    <th>Votes</th>
    <th>Delete?</th>
    </tr>";

    while($row = mysqli_fetch_array($result))
    {
    echo "<tr>";
    echo "<td>" . $row['ID'] . "</td>";
    echo "<td>" . $row['Title'] . "</td>";
    echo "<td>" . $row['Category'] . "</td>";
    echo "<td>" . $row['Timestamp'] . "</td>";
    echo "<td>" . $row['User'] . "</td>";
    echo "<td>" . $row['Content'] . "</td>";
    echo "<td>" . $row['Image'] . "</td>";
    echo "<td>" . $row['Votes'] . "</td>";
    echo "<td><a class=\"btn btn-default\" href=\"?loc=engine/admin/deletepost&ispage=false&id=" . $row['ID'] . "\">Yes</a></td>" ;
    echo "</tr>";
    }
    echo "</table>";

    mysqli_close($conn);

?>

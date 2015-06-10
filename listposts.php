<html>
    <body>
        <?php

        $servername = "localhost";
        $username = "admin";
        $password = "xxxxx";
        $dbname = "noticeboard";

        echo "Connecting to SQL server @ ".$servername." into database ".$dbname."<br/>";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        echo "Connected successfully";

        echo "<hr/>";

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
        echo "</tr>";
        }
        echo "</table>";

        mysqli_close($conn);

        ?>
    </body>
</html>

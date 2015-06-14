<?php
    if (! ( isset($_GET['id']) ) ) {
        echo "<script>window.alert(\"No post ID set, this is a website fault. Please report this to an administrator.\")</script>";
        echo "<script>self.close()</script>";
    } else {
        $ID = $_GET['id'];
    };
?>

<h1>Your vote is being processed</h1>

<?php

    include ("engine/sql/sqlconnect.php");

    mysqli_query($conn, "DELETE FROM posts
        WHERE ID=" . $ID . ";");

    mysqli_close($conn);

    echo "<h4>Your vote has been processed<h4>";
    echo "<script> window.location.href = '?loc=list';</script>";

?>


<script>

onClose() {
 window.opener.popUpClosed = true;
};

</script>

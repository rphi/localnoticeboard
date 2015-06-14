<?php

// Deals with pop-up alerts

if (isset($_GET['lastaction'])) {

    $lastaction = $_GET['lastaction'];

    switch ($lastaction) {

        case "voted":
            echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Great!</strong> Your vote has been counted.</div>" ;
            break;

        case "composed":
            echo "<div class=\"alert alert-success\" role=\"alert\"><strong>Great!</strong> Your post has been processed.</div>" ;
            break;

        default:
            break;

    }

};

?>

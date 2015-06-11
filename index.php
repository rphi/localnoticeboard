<!DOCTYPE html>
<html lang="en">

<?php
    if(isset($_GET['loc'])) {
        $loc = $_GET['loc'];
    } else {
        $loc = "home";
    };

    if (!(isset($_GET['ispage']))) {
        $ispage = true;
    } else if ($_GET['ispage'] == ("true" or "false"))  {
        $ispage = $_GET['ispage'];
    } else {
        $ispage = "true";
    };

    if(isset($_GET["type"])) {
        $type = $_GET["type"];
    } else {
        $type = "php";
    };

    $extn = ".".$type;

    if ($ispage == "true") {
        $loc = strtolower($loc);

        $loc = "pages/".$loc;

        // Put HTML only pages in this array
        $htmlpages = array("");
        if(in_array($loc , $htmlpages)) {
            $extn = ".html";
        } else {
            $extn = ".php";
        };
    };

    if(file_exists($loc.$extn)) { $validloc = True; }
        else { $validloc = False; };
?>
<head>
    <?php
    readfile("theme/modules/head.html");
    ?>
    <title>LocalNoticeboard | Development Site</title>
    <meta name="description" content="">
    <meta name="author" content="">
</head>
<body>
    <?php
        include("theme/modules/navbar.php");

        if($validloc == True) {
            include $loc.$extn;
        } else {
            readfile("pages/404.html");
            echo $loc;
        };

        readfile("theme/modules/footer.html");
        readfile("theme/modules/corejs.html");

        if( ($ispage == true) & ( file_exists("pages/page-js/".$loc."-js.html") ) ) {
            readfile ($page."-js.html") ;
        } else {
            print("<!-- No page specific JS to load -->\n") ;
        };
    ?>
</body>

<?php
    include ("theme/modules/analytics.php") ;
?>

</html>

<?php
session_start();
if(!isset($_SESSION["name"])){
    die("Name parameter missing.");
}
?>


<html>
<head>
    <meta charset="utf-8" />
    <title>Muhammad Hassaan Saeed</title>
</head>
<body>
<?php
if(isset($_REQUEST["name"])){
    echo "<h1>Tracking Autos For  ".htmlentities($_SESSION["name"])."</h1>";
}
if(isset($_SESSION["success"])){
    echo('<p style="color: green">'.$_SESSION["success"]."</p>\n");
    unset($_SESSION["success"]);
}
?>
<a href="add.php?name="<?php htmlentities($_REQUEST["name"]) ?>>Add New </a>|
<a href="login.php"> Logout</a>
</body>
</html>
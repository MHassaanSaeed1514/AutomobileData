<?php
require_once "pdo.php";

if(isset($_POST["logout"])){
    header("Location: login.php");
}

session_start();
if(!isset($_SESSION["name"])){
    die("Name parameter missing.");
}
if(isset($_POST["make"]) & isset($_POST["year"]) & isset($_POST["mileage"])){
    if(!is_numeric($_POST["year"]) || !is_numeric($_POST["mileage"])){
    $_SESSION["failure"]="Year and Mileage MUST be numeric!";
    header("Location: add.php");
    return;
    }
    elseif (strlen($_POST["make"])<1){
	$_SESSION["failure"]="Make is REQUIRED!";
    header("Location: add.php");
    return;
    }
    else{
        $sql="INSERT INTO users (make, year, mileage) VALUES (:make, :year, :mileage)";
        $stmt=$pdo->prepare($sql);
        $stmt->execute(array(
            ":make" => $_POST["make"],
            ":year" => $_POST["year"],
            ":mileage" => $_POST["mileage"]
        ));
        $_SESSION["success"]="Your data has been added successfully!";
    }

}
?>


<html>
<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<?php
  echo "<h1>Tracking Autos For  ".htmlentities($_SESSION["name"])."</h1>";
?>
<form method="post">
<p>MAKE:
<input type="text" name="make"></p>
<p>YEAR:
<input type="text" name="year"></p>
<p>MILEAGE:
<input type="text" name="mileage"></p>
<input type="submit" value="Add" name="add">
<input type="submit" value="Logout" name="logout">
<?php
if(isset($_SESSION["failure"])){
    echo('<p style="color: red">'.htmlentities($_SESSION["failure"])."</p>\n");
    unset($_SESSION["failure"]);
}
if(isset($_SESSION["success"])){
    echo('<p style="color: green">'.htmlentities($_SESSION["success"])."</p>\n");
    unset($_SESSION["success"]);
}
 echo '<li>';
 echo htmlentities($_POST["make"]). ' ' .$_POST["year"]. ' \ ' .$_POST['mileage'];
 echo '</li></br>';
?>
</form>

</body>
</html>
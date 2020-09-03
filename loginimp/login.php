<?php if(isset($_POST["cancel"]))
{
    header("Location: index.php");
    return;
}
session_start();
if(isset($_POST["email"]) & isset($_POST["pass"])){
     unset($_SESSION["email"]);

    if($_POST["pass"]=="php123"){
         $_SESSION["name"]=$_POST["email"];
         $_SESSION["success"]="LOGGED IN SUCCESSFULLY!";
         header("Location: view.php?name=".urlencode($_POST["email"]));
         return;
    }else{
        $_SESSION["error"]="Incorrect Password";
        header("Location: login.php");
        return;
    }
}
else{
    
}
?>
 <html>

<head>
    <meta charset="utf-8" />
    <title></title>
</head>
<body>
<h1>Please Log In</h1>

<form method="post">
<p>Email:
<input type="text" name="email"></p>
<p>Password:
<input type="password" name="pass"></p>
<input type="submit" value="Log In" name="login">
<input type="submit" value="Cancel" name="cancel">
<?php
if(isset($_SESSION["error"])){ 
    echo('<p style="color: red">'.$_SESSION["error"]."</p>\n");
    unset($_SESSION["error"]);
}

?>
</form>
</body>
</html>
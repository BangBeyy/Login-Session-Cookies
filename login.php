<?php
session_start();

if (isset($_COOKIE["Id"]) && isset($_COOKIE["username"])){
    $Id = $_COOKIE["id"];
    $key = $_COOKIE["key"];

    $result = mysqli_query($conn,"SELECT username From user Where Id=$Id");
    $row = mysqli_fetch_assoc($result);
 
    if($key === hash("sha256",$row["username"])){
        $_SESSION['login']=true;
    }
}
if(isset($_SESSION["login"])){
    header("Location:index.php");
    exit;
}

    require 'functions.php';

    if(password_verify($password,$row["password"])){
        $_SESSION["login"]=true;
        if(isset($_POST["remember"])){
            setcookie("id",$row["id"],time()+60);
            setcookie("key",hash(sha256,$row["username"]),time()+60);
        }
        header("Location:index.php");
        exit;
    }


    if(isset($_POST["login"]))
    {
        $username=$_POST["username"];
        $password=$_POST["password"];

        $result=mysqli_query($conn,"SELECT * FROM user WHERE username='$username'");

        if(mysqli_num_rows($result)===1)
        {
            $row=mysqli_fetch_assoc($result);

            if(password_verify($password,$row["password"]))
            {
                $_SESSION["login"]=true;

                if(isset($_POST['remember'])){
                    setcookie('login','true',time()+60);
                }

                header("Location:index.php");
                exit;
            }
        }
        $error=true;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Halaman Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>
<body>
    <h1>Halaman Login</h1>
    <?php if(isset($error)):?>
        <p style="color:red;font-style=bold">
        username dan password salah</p>

        <?php endif ?>

        <form action="" method="POST" >
        <ul>
            <li>
                <label for="username">username</label>
                <input type="text"  id="username" name="username">
                </li>
                <li>
                <label for="password">password</label>
                <input type="password"  id="password" name="password">
                </li>
                <li>
                    <input type="checkbox" name="remember" id="remember">
                    <label for="remember">Remember Me</label>
                </li>
            
            <button type="submit" name="login">Login</button>
            </li>
            </ul>
        </form>
</body>
</html>
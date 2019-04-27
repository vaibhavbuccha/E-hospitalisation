<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ARNHOSPITAL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div>
        <div align="center" class="phone">
            <div align=center class="outer">
                <div class="inner">
                <img class="img" src="image/site.jpg">
                <div class="login-box">
                <?php

error_reporting(1);
session_start();
$con = mysqli_connect("localhost","root","","arnhospital");
   if(isset($_POST['login']))
    {
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $password_1 = md5($password);
        $errors= array();
        if(empty($username))
        {
           array_push($errors,'<p style="color: red; border: 1px solid red">username is required</p>');
           echo '<p style="color: red; border: 1px solid red">username is required</p>';
        }
        if(empty($password))
        {
           array_push($errors,'<p style="color: red; border: 1px solid red">password is required</p>');
           echo '<p style="color: red; border: 1px solid red">password is required</p>';
        }

        if(count($errors)==0)
        {
            $sql = "SELECT * FROM admin WHERE username ='".$username."'AND password='".$password_1."' LIMIT 1";
            $result = mysqli_query($con,$sql);
            if(mysqli_num_rows($result)==1)
            {   
                $_SESSION['admin'] = $username;
                echo '<p style="color: green; border: 1px solid green">welcome!</p>';
                header('Location: dashboard.php');
            }
            else
            {
                echo '<p style="color: red; border: 1px solid red">wrong username password try again</p>';
            }
        }
       
    }
   
/*
$con = mysqli_connect("localhost","root","","way2shopping");

if(isset($_POST['login']))
{
    $username = mysqli_real_escape_string($con,$_POST['username']);
    $password = mysqli_real_escape_string($con,$_POST['password']);
    $password_1 = md5($password);
    $sql = "SELECT * FROM user WHERE username ='".$username."'AND password='".$password_1."' LIMIT 1";
    $result = mysqli_query($con,$sql);
    if(mysqli_num_rows($result)==1)
    {
        echo "welcome";
        exit();
    }
    else
    {
        echo " there is some issue";
    }
}
*/


?>
                    <table align="center">
                        <form action="#" method="post">
                            <tr>

                            <p class="s"><span>Admin Pannel</span><br><span class="s1">ARNHO</span><span class="s2">SPITAL</span></p>
                            </tr>
                        
                            <tr>
                                <input class="input-con" type="text" name="username" required placeholder="Userame">
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <input class="input-con" type="password" name="password" required placeholder="Password">
                            </tr><br>
                            <br> 
                            <tr>
                                <input class="btn btn-success" type="submit" name="login" value="Login">
                            </tr>
                        </form>
                        <br>
                        
                    </table>
                </div>
                </div>
            </div>
                <div align=center class="stand"></div>
            <div class="bottom"></div>
        </div>
    </div>
    <script src="bootstrap/bootstarp-popper.js"></script>
    <script src="bootstrap/bootstarp.js"></script>
    <script src="bootstrap/bootstrap-min.js"></script>
</body>
</html>
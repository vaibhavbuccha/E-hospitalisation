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
$con = mysqli_connect("localhost","root","","arnhospital") ;

if($con)
{
    if(isset($_POST['signup']))
    {
        $username = mysqli_real_escape_string($con,$_POST['username']);
        $email = mysqli_real_escape_string($con,$_POST['email']);
        $password = mysqli_real_escape_string($con,$_POST['password']);
        $password_1 = md5($password);
        $errors= array();
        if(empty($username))
        {
           array_push($errors,'<p style="color: red; border: 1px solid red">username is required</p>');
           echo '<p style="color: red; border: 1px solid red">username is required</p>';
        }
        if(empty($email))
        {
           array_push($errors,'<p style="color: red; border: 1px solid red">email is required</p>');
           echo '<p style="color: red; border: 1px solid red">email is required</p>';
        }
        if(empty($password))
        {
           array_push($errors,'<p style="color: red; border: 1px solid red">password is required</p>');
           echo '<p style="color: red; border: 1px solid red">password is required</p>';
        }

        $user_check_query = "SELECT * FROM user WHERE username ='".$username."'OR email='".$email."' LIMIT 1";
        if(mysqli_query($con,$user_check_query)==false)
        {
            array_push($errors,'<p style="color: red; border: 1px solid red">the username and email is always registered </p>');
            echo '<p style="color: red; border: 1px solid red">the username and email is always registered </p>';
        }

        
        if(Count($errors)==0)
        {   
            $query = "INSERT INTO user(username, email, password) VALUES ('$username','$email','$password_1')";
            
            if(mysqli_query($con,$query))
            {
                echo '<p style="color: green; border: 1px solid green">you are registered now you can login <a href="login.php">click here!</a></p>';
            }
            else
            {
                foreach($errors as $error)
                {
                    echo '$error';
                }
            }
        }
        

        

    }
}


?>
                    <table align="center">
                        <form action="#" method="post">
                            <tr>
                            <p class="s"><span class="s1">ARNHO</span><span class="s2">SPITAL</span></p>
                            </tr>
                        
                            <tr>
                                <input class="input-con" type="text" name="username" required placeholder="Userame">
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <input class="input-con" type="email" name="email" required placeholder="email">
                            </tr>
                            <br>
                            <br>
                            <tr>
                                <input class="input-con" type="password" name="password" required placeholder="Password">
                            </tr><br>
                            <br> 
                            <tr>
                                <input class="btn btn-success" type="submit" name="signup" value="Signup">
                            </tr>
                        </form>
                        <br>
                        <br>
                        <p><a href="login.php">Already Have An Account</a></p>
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
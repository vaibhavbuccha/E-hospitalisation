<?php

session_start();

if(empty($_SESSION['admin'])){
    header("location : index.php");
}



?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <title>ARNHOSPITAL</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/doctor.css">
    <style>
    
    input{
 width: 300px;
 height: 30px;
 text-align: center;
 background-color: rgba(0, 0, 0, 0.796);
 border-radius: 20px;
 color: white;
}
th{
    color:white;
    background: black;
    padding:10px;
}
    td{
        padding: 10px;

    }
    tr:nth-child(odd){
        background: grey;
    }
    tr:hover{
        background:black;
        color: white;
    }
    #doctors,#account{
        display: none;
    }
    </style>
  </head>
  <body>
    <div class="container-fluid top-nav">
        <span class="s1">ARNHO</span><span class="s2">SPITAL</span>
        <span class="home">
            <a class="nav-nam" href="dashboard.php">Dashboard</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="content.php">Content</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="user.php">User's</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="appointment.php">Appointment</a>
        </span>
        <span class="nav-tag">
        <a class="nav-nam" href="doctor.php">Doctor's</a>
        </span>
        <span class="btn btn-light dropdown nav-tag">
            <a class="nav-nam dropbtn" href="login.php"><?php echo  "Hi ".$_SESSION['admin']; ?></a>
            <div class="dropdown-content">
                <a href="#">Response</a>
                <a href="#">Notification</a>
                <a href="index.php">Logout</a>
            </div>
        </span>
    </div>

    <div class="container">
        <div  align="center" class="jumbotron">
        <h2><i><q>Please Select The Field To Show Details</q></i></h2>
        <p><i><q> Here You Can See The Doctor's And Create New Account For Doctor </q></i></p>
            <button class="btn btn-outline-primary mt-2">
                <select id="change" onchange="change()" class="btn btn-primary">
                    <option value="account">Create New Account Of Doctor.</option>
                    <option value="doctor">All Doctor's</option>
                </select>
            </button>
        </div>
    </div>
<!-- create doctor account -->
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

        $user_check_query = "SELECT * FROM doctor WHERE name ='".$username."'OR email='".$email."' LIMIT 1";
        if(mysqli_query($con,$user_check_query)==false)
        {
            array_push($errors,'<p style="color: red; border: 1px solid red">the username and email is always registered </p>');
            echo '<p style="color: red; border: 1px solid red">the username and email is always registered </p>';
        }

        
        if(Count($errors)==0)
        {   
            $query = "INSERT INTO doctor(name, email, password) VALUES ('$username','$email','$password_1')";
            
            if(mysqli_query($con,$query))
            {
                echo '<p style="color: green; border: 1px solid green">Resgistered Successfully </p>';
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
    <div id="account" class="container jumbotron text-center">
        <table align="center">
         <form action="#" method="post">
               <tr>
                    <p class="s"><span class="s1">ARNHO</span><span class="s2">SPITAL</span></p>
                    <p>Create New Doctor's Account</p>
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
                    <button class="btn btn-success" type="submit" name="signup" >Signup</button>
                </tr>
                    </form>
                   <br>
            <br>
            </table>
    </div>
    <!-- create user end here! -->


    <!-- doctor table starts from here! -->

    <div id="doctors" class="container jumbotron text-center">
    <h4 class="mb-4"><i><q>All Doctor's</q></i></h4>
    <div align="center" >
            <table width="800px" cellspacing="1" cellpadding="1">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $sql = "select * from doctor";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                <tr>
                   
                    <td><?php echo @$row[id]; ?></td>
                    <td><?php echo @$row[name]; ?></td>
                    <td><?php echo @$row[email];?></td>
                    <form action="#"  method="post" >
                    <td><button type="submit" class="btn btn-dark" name="delete" value="<?php echo @$row[id];?>" >Delete</button></td>
                    </form>
                </tr>
                <?php
                    }
                    
                    if(isset($_POST['delete']))
                    {
                        $delete = $_POST['delete'];
                        $del_query = "DELETE FROM `user` WHERE id='".$delete."'";
                        if(mysqli_query($con,$del_query))
                        {
                            header("location : #");
                        }
                    }
                ?>
            </table>
        </div>

    </div>
    <script>
    
    function change(){
        var x = document.getElementById('change').value;
        if(x == "account")
        {
            document.getElementById('account').style.display = "block";
            document.getElementById('doctors').style.display = "none;";
        }
        if(x == "doctor")
        {
            document.getElementById('account').style.display = "none";
            document.getElementById('doctors').style.display = "block";
        }
    }
    
    </script>
    <script src="bootstrap/bootstarp-popper.js"></script>
    <script src="bootstrap/bootstarp.js"></script>
    <script src="bootstrap/bootstrap-min.js"></script>
</body>
</html>
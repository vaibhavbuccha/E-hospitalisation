<?php

session_start();

if(empty($_SESSION['admin'])){
    header("location : index.php");
}

$con = mysqli_connect("localhost","root","","arnhospital");


?>

<!DOCTYPE html>
<html lang="en">
  <head>
      <title>ARNHOSPITAL</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/dashboard.css">
    <link rel="stylesheet" href="css/content.css">
    <link rel="stylesheet" href="css/user.css">
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
    <div class="usertable text-center container jumbotron">
    <h4 class="mb-4"><i><q>All User's</q></i></h4>
        <div align="center" >
            <table width="800px" cellspacing="1" cellpadding="1">
                <tr>
                    <th>Id</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Delete</th>
                </tr>
                <?php
                    $sql = "select * from user";
                    $result = mysqli_query($con,$sql);
                    while($row = mysqli_fetch_array($result))
                    {
                    ?>
                <tr>
                   
                    <td><?php echo @$row[id]; ?></td>
                    <td><?php echo @$row[username]; ?></td>
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
        </div><br>
        <div align="center">
                <form action="#" method="post"> 
                    <button name="delall" class="btn btn-warning" type="submit">delete all</button>
                </form>
                <?php
                
                    if(isset($_POST['delall']))
                    {
                        $truncate = "TRUNCATE TABLE user";
                        if(mysqli_query($con,$truncate))
                        {
                            echo '<h3>All records Are Deleted.</h3>';
                            header("location : user.php");
                        }
                    }
                
                ?>
            </div>
    </div>


<script src="bootstrap/bootstarp-popper.js"></script>
<script src="bootstrap/bootstarp.js"></script>
<script src="bootstrap/bootstrap-min.js"></script>
</body>
</html>
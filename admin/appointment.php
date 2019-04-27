<?php

session_start();

if(empty($_SESSION['admin'])){
    header("location : index.php");
}

$con = mysqli_connect("localhost","root","","arnhospital");

error_reporting(0);
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
            <a class="nav-nam" href="#">Appointment</a>
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
    <div class="usertable jumbotron">
        <div align="center" >
        <h4 class="mb-4"><i><q>All Appointment's</q></i></h4>
            <table width="100%" cellspacing="1" cellpadding="1">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Issue</th>
                    <th>Current time</th>
                    <th>Dr. Name</th>
                    <th>Doctor</th>
                    <th>Updated Time</th>
                    <th>Delete</th>
                    <th>Update</th>
                </tr>
                <?php
                    $appointments = "SELECT * FROM appointment";

                    $result = mysqli_query($con,$appointments);

                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
                <tr>
                    <td><?php echo @$row[id];?></td>
                    <td><?php echo @$row[name];?></td>
                    <td><?php echo @$row[date];?></td>
                    <td><?php echo @$row[issue];?></td>
                    <td><?php echo @$row[time];?></td>
                    <td><?php echo @$row[Doctor];?></td>
                    <form action="#"  method="post" >
                    <td><input type="text" class="btn btn-dark"  name="doctor"></td>
                    <td><input type="time" class="btn btn-dark"  name="time"></td>
                    <td><button type="submit" class="btn btn-danger" name="delete" value="<?php echo @$row[id];?>" >Delete</button></td>
                    <td><button type="submit" class="btn btn-info" name="update" value="<?php echo @$row[id];?>">Update</button></td>
                    </form>
                </tr>
                <?php
                }
        
                if(isset($_POST['delete']))
                {
                    $delete = $_POST['delete'];
                    $del_query = "DELETE FROM `appointment` WHERE id='".$delete."'";
                    if(mysqli_query($con,$del_query))
                    {
                        header("location : appointment.php");
                    }
                }
                
                if(isset($_POST['update']))
                {
                    $doc = $_POST['doctor'];
                    $time =$_POST['time'];
                    $update = $_POST['update'];
                    $up_query = "UPDATE `appointment` SET `time`='".$time."',`Doctor`='".$doc."' WHERE id='".$update."'";
                    if(mysqli_query($con,$up_query))
                    {
                        header("location : appointment.php");
                    }
                }
                
                ?>
            </table>
            <br>
            <div>
                <form action="#" method="post"> 
                    <button name="delall" class="btn btn-warning" type="submit">delete all</button>
                </form>
                <?php
                
                    if(isset($_POST['delall']))
                    {
                        $truncate = "TRUNCATE TABLE appointment";
                        if(mysqli_query($con,$truncate))
                        {
                            echo '<h3>All records Are Deleted.</h3>';
                            header("location : appointment.php");
                        }
                    }
                
                ?>
            </div>
        </div>
    </div>



    
<script src="bootstrap/bootstarp-popper.js"></script>
<script src="bootstrap/bootstarp.js"></script>
<script src="bootstrap/bootstrap-min.js"></script>
</body>
</html>
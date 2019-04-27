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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
<style>

.box{
    border: 1px solid white;
    width: 250px;
    height: 200px;
    border-radius: 10px;
    color: white;
}

td{
    padding: 10px;
}
.clr{
    background: rgb(28, 173, 28);
}
.clr2{
    background: rgb(156, 28, 173);
}
.clr3{
    background: rgb(173, 57, 28);
}
.clr4{
    background: rgb(215, 218, 43);
}
.clr5{
    background: rgb(78, 22, 209);
}
.clr6{
    background: rgb(28, 173, 113);
}
p{
    font-size: 30px;
    padding: 20px;
}
.fa-desktop{
    font-size: 60px;
    padding-left: 160px;
}
.fa-user-circle{
    font-size: 60px;
    padding-left: 160px;
}
.fa-user-md{
    font-size: 60px;
    padding-left: 160px;
}
.fa-address-card{
    font-size: 60px;
    padding-left: 160px;
}
.fa-accusoft{
    font-size: 60px;
    padding-left: 160px;
}
.log{
    position: relative;
    left: 950px;
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

    <div class="mt-4" align="center">
                <table align="center" width="1000px">
                    <tr>
                        <td><a href="content.php">
                            <div class="box clr">
                                <p>Content</p><br>
                                <span class="fas fa-desktop"></span>
                            </div></a>
                        </td>
                        <td><a href="user.php">
                            <div class="box clr2">
                            <p>User</p><br>
                                <span class="fa fa-user-circle"></span>
                            </div></a>
                        </td>
                        <td><a href="doctor.php">
                            <div class="box clr3">
                            <p>Doctor</p><br>
                                <span class="fa fa-user-md"></span>
                            </div></a>
                        </td>
                    </tr>
                    <tr>
                        <td><a href="doctor.php">
                        <div class="box clr4">
                        <p>Dr. Account</p><br>
                                <span class="fa fa-address-card"></span>
                        </div></a>
                        </td>
                        <td><a href="appointment.php">
                        <div class="box clr5">
                        <p>Appointment</p><br>
                                <span class="fab fa-accusoft"></span>
                        </div></a>
                        </td>
                        <td><a href="report.php">
                        <div class="box clr6">
                        <p>Report</p><br>
                                <span class="fa fa-file-text"></span>
                        </div></a>
                        </td>
                    </tr>
                </table>
            </div>


    <script src="bootstrap/bootstarp-popper.js"></script>
    <script src="bootstrap/bootstarp.js"></script>
    <script src="bootstrap/bootstrap-min.js"></script>
</body>
</html>
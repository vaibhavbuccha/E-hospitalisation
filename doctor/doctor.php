<?php


error_reporting(1);
session_start();

if(empty($_SESSION['doctor']))
{
    header("location: index.php");
}

$con = mysqli_connect("localhost","root","","arnhospital");



?>



<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/doctor.css">
  </head>
  <body>

    <div class="container-fluid">
        <span class="s1">ARNHO</span><span class="s2">SPITAL</span>
    </div>
    <div align="right" class="container-fluid">
        <a href="logout.php">
        <button class="btn btn-danger">logout</button>
        </a>
    </div>

    <div class="container">
        <div class="jumbotron text-center">
            <h4 class="text-info"><q><i>Apppointment's</i></q></h4>
            <q><i><p class="text-primary">HI <br> <b><?php echo $_SESSION['doctor']; ?></b> <br>Your Pending Apppointment's.</p></i></q>

            <table class="table">
                <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Issue</th>
                    <th>Current time</th>
                    <th>Dr. Name</th>
                </thead>
                <?php
                    $appointments = "SELECT * FROM appointment WHERE Doctor='".$_SESSION['doctor']."'";

                    $result = mysqli_query($con,$appointments);

                    while($row=mysqli_fetch_assoc($result))
                    {
                ?>
                <tbody>
                <td><?php echo @$row[id];?></td>
                    <td><?php echo @$row[name];?></td>
                    <td><?php echo @$row[date];?></td>
                    <td><?php echo @$row[issue];?></td>
                    <td><?php echo @$row[time];?></td>
                    <td><?php echo @$row[Doctor];?></td>
                </tbody>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>

    <script src="bootstrap/bootstarp-popper.js"></script>
    <script src="bootstrap/bootstarp.js"></script>
    <script src="bootstrap/bootstrap-min.js"></script>
  </body>
</html>
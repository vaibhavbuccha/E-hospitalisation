<?php
error_reporting(0);
session_start();

if(empty($_SESSION['user'])){
    header("location : home.php");
}
$con = mysqli_connect("localhost","root","","arnhospital");


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/report.css">
    <title>ARNHOSPITAL</title>
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h4 class="text-center text-primary"><i><q>Report's</q></i></h4>
        </div>
        <div class="row">
            <div class="col text-center">
                <?php
                    echo '<h4 class="text-info">Hi '.$_SESSION['user'].'</h4>';
                ?>
                <p class='text-danger'><i><q>All Appointment informations.</q></i></p>
                <?php
                $name = $_SESSION['user'];
                $app = "SELECT * FROM appointment where name='".$name."'";
                $query = mysqli_query($con,$app);
                while($row = mysqli_fetch_assoc($query))
                {
                
                ?>
                <div>
                    <table width="100%" class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Issue</th>
                            <th>Time</th>
                            <th>Doctor</th>
                        </thead>
                        <tbody>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['date'];?></td>
                            <td><?php echo $row['issue'];?></td>
                            <td><?php echo $row['time'];?></td>
                            <td><?php echo $row['Doctor'];?></td>
                        </tbody>
                    </table>
                </div>
                <?php } ?>
            </div>
            <div class="col text-center">
                <p class='text-danger'><i><q>All Report's</q></i></p>  
                 <div class="jumbotron text-center">
                    <?php
                    
                    $fetch = "select * from report where name='".$_SESSION['user']."'";
                    $res = mysqli_query($con,$fetch);
                    while($data = mysqli_fetch_assoc($res))
                    {
                        echo "<hr>";
                        echo '<p><b>Report Description:<br></b> '.$data["report_desc"].'</p>';
                        echo '<embed src="pdf/'.$data[report].'" width="300px" height="200px"/>' ;
                    }
                    ?>
                 </div>
            </div>
        </div>
    </div>
</body>
</html> 
<?php

session_start();

if(empty($_SESSION['admin'])){
    header("location : index.php");
}

$con = mysqli_connect("localhost","root","","arnhospital");


if(isset($_POST['upload']))
{
    $name = $_POST['pname'];
    $desc = $_POST['desc'];
    $date = date("d-M-Y");
    $report = $_FILES['report']['name'];
    $loc = $_FILES['report']['tmp_name'];
    $dest = "../pdf/".$report;
    move_uploaded_file($loc,$dest);
    $sql = "INSERT INTO `report`(`name`, `report`, `date`, `report_desc`) VALUES ('".$name."','".$report."','".$date."','".$desc."')";
    $query = mysqli_query($con,$sql);
    if($query)
    {
        echo '<p style="color: lime;">Report Uploaded SuccessFully</p>';
    }
    else
    {
        echo '<P style="color: red;">Getting Error Try Again</P>';
    }
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
    <link rel="stylesheet" href="css/content.css">
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
    <div class="main">
        <div class="container">
            <div class="jumbotron text-center">
                <p class="text-danger"> <i><q>Provide Report's</q></i></p>
                <br>
                <form action="#" method="post" enctype="multipart/form-data">
                    <table class="table table-hover">
                        <tr>
                            <th>
                                <label for="Patient Name"> Patient Name: </label>
                            </th>
                            <td>
                                <input type="text" name="pname" required >
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="Report Description"> Report Description: </label>
                            </th>
                            <td>
                                <textarea name="desc"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <th>
                                <label for="Report Upload"> Report Upload: </label>
                            </th>
                            <td>
                                <input type="file" name="report"required>
                            </td>
                        </tr>
                    </table>
                    <button name="upload" type="submit" class="btn btn-warning"> 
                        upload
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="bootstrap/bootstarp-popper.js"></script>
    <script src="bootstrap/bootstarp.js"></script>
    <script src="bootstrap/bootstrap-min.js"></script>
</body>
</html>
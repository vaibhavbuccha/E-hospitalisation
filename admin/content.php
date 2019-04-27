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
  </head>
  <style>
  #img,#img2,#img3,#img4,#servtitle,#servtitle2,#servtitle3,#servcon,#servcon2,#servcon3,#about{
      display: none;
  }

  
  </style>
  <body>
    <div class="container-fluid top-nav">
        <span class="s1">ARNHO</span><span class="s2">SPITAL</span>
        <span class="home">
            <a class="nav-nam" href="dashboard.php">Dashboard</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="#">Content</a>
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
        <div  align="center" class="jumbotron">
        <h2><i><q>Please Select The Field Which You Want To Update</q></i></h2>
        <p><i><q> Here You Can Change The Content And The Images Of Your Websites Appereance Part</q></i></p>
            <button class="btn btn-outline-primary mt-2">
                <select id="change" onchange="change()" class="btn btn-primary">
                    <option value="Images">Images</option>
                    <option value="Service_Titles">Service Titles</option>
                    <option value="Service_Contents">Service Contents</option>
                    <option value="About">About</option>
                </select>

            </button>
        </div>
    </div>

        <div id="img" class="jumbotron topimg">
            
            <form action="#" method="post" enctype="multipart/form-data" >
            <h3>Top Image</h3>
                Select Image : <input id="input" type="file" required name="img1">
                <br>
                <input type="submit" name="post1">
            </form>
            <?php
                if(isset($_POST['post1']))
                {
                    $name = $_FILES['img1']['name'];
                    $location = $_FILES['img1']['tmp_name'];
                    $destination = "image/".$name ;
                    if(move_uploaded_file($location,$destination))
                    {
                        $sql = "UPDATE `view` SET `topbg`='".$destination."' WHERE id='1'";
                        if(mysqli_query($con,$sql))
                        {
                            echo "success";
                        }
                        else
                        {
                            echo "get error";
                        }
                    }
                }
            ?>
        </div>
        <div id="img2" class="topimg jumbotron">
            
            <form action="#" method="post" enctype="multipart/form-data" >
            <h3>Doctor's Image</h3>
                Select Image1 : <input id="input" type="file" required name="img2">
                <br>
                <input type="submit" name="post2">
            </form>
            <?php
                if(isset($_POST['post2']))
                {
                    $name = $_FILES['img2']['name'];
                    $location = $_FILES['img2']['tmp_name'];
                    $destination = "image/".$name ;
                    if(move_uploaded_file($location,$destination))
                    {
                        $sql = "UPDATE `view` SET `doc1`='".$destination."' WHERE id='1 '";
                        if(mysqli_query($con,$sql))
                        {
                            echo "success";
                        }
                        else
                        {
                            echo "get error";
                        }
                    }
                }
            ?>
        </div>
        <div id="img3" class="topimg jumbotron">
            
            <form action="#" method="post" enctype="multipart/form-data" >
            <h3>Doctor's Image</h3>
                Select Image2 : <input id="input" type="file" required name="img3">
                <br>
                <input type="submit" name="post3">
            </form>
            <?php
                if(isset($_POST['post3']))
                {
                    $name = $_FILES['img3']['name'];
                    $location = $_FILES['img3']['tmp_name'];
                    $destination = "image/".$name ;
                    if(move_uploaded_file($location,$destination))
                    {
                        $sql = "UPDATE `view` SET `doc2`='".$destination."' WHERE id='1 '";
                        if(mysqli_query($con,$sql))
                        {
                            echo "success";
                        }
                        else
                        {
                            echo "get error";
                        }
                    }
                }
            ?>
        </div>
        <div id="img4" class="topimg jumbotron">
            
            <form action="#" method="post" enctype="multipart/form-data" >
            <h3>Doctor's Image</h3>
                Select Image2 : <input id="input" type="file" required name="img4">
                <br>
                <input type="submit" name="post4">
            </form>
            <?php
                if(isset($_POST['post4']))
                {
                    $name = $_FILES['img4']['name'];
                    $location = $_FILES['img4']['tmp_name'];
                    $destination = "image/".$name ;
                    if(move_uploaded_file($location,$destination))
                    {
                        $sql = "UPDATE `view` SET `doc3`='".$destination."' WHERE id='1 '";
                        if(mysqli_query($con,$sql))
                        {
                            echo "success";
                        }
                        else
                        {
                            echo "get error";
                        }
                    }
                }
            ?>
        </div>
        

        <div id="servtitle" class="topimg jumbotron">
            
            <form action="#" method="post" >
            <h3>Service 1 title</h3>
                title :<br> <textarea required name="title1"></textarea>
                <br>
                <input type="submit" name="tit_sub1">
            </form>
            <?php
                if(isset($_POST['tit_sub1']))
                {
                    $ser1_tit = $_POST['title1'];
                    $ser1_con = "UPDATE `view` SET `service1_title`='".$ser1_tit."' WHERE id='1'";
                    if(mysqli_query($con,$ser1_con))
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "getting error";
                    }
                }
            ?>
        </div>

        <div id="servtitle2" class="topimg jumbotron">
            
            <form action="#" method="post" >
            <h3>Service 2 title</h3>
                title :<br> <textarea required name="title2"></textarea>
                <br>
                <input type="submit" name="tit_sub2">
            </form>
            <?php
                if(isset($_POST['tit_sub2']))
                {
                    $ser2_tit = $_POST['title2'];
                    $ser2_con = "UPDATE `view` SET `service2_title`='".$ser2_tit."' WHERE id='1'";
                    if(mysqli_query($con,$ser2_con))
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "getting error";
                    }
                }
            ?>
        </div>

            
        <div id="servtitle3" class="topimg jumbotron">
            
            <form action="#" method="post" >
            <h3>Service 3 title</h3>
                title : <br><textarea required name="title3"></textarea>
                <br>
                <input type="submit" name="tit_sub3">
            </form>
            <?php
                if(isset($_POST['tit_sub3']))
                {
                    $ser3_tit = $_POST['title3'];
                    $ser3_con = "UPDATE `view` SET `service3_title`='".$ser3_tit."' WHERE id='1'";
                    if(mysqli_query($con,$ser3_con))
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "getting error";
                    }
                }
            ?>
        </div>


        <div id="servcon" class="topimg jumbotron">
            
            <form action="#" method="post" >
            <h3>Service 1 content</h3>
                content :<br> <textarea required name="service1"></textarea>
                <br>
                <input type="submit" name="submit1">
            </form>
            <?php
                if(isset($_POST['submit1']))
                {
                    $service1 = $_POST['service1'];
                    $content1 = "UPDATE `view` SET `service1_content`='".$service1."' WHERE id='1'";
                    if(mysqli_query($con,$content1))
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "getting error";
                    }
                }
            ?>
        </div>
        <div id="servcon2" class="topimg jumbotron">
            
            <form action="#" method="post" >
            <h3>Service 2 content</h3>
                content :<br> <textarea required name="service2"></textarea>
                <br>
                <input type="submit" name="submit2">
            </form>
            <?php
                if(isset($_POST['submit2']))
                {
                    $service2 = $_POST['service2'];
                    $content2 = "UPDATE `view` SET `service2_content`='".$service2."' WHERE id='1'";
                    if(mysqli_query($con,$content2))
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "getting error";
                    }
                }
            ?>
        </div>
        <div id="servcon3" class="topimg jumbotron">
            
            <form action="#" method="post" >
            <h3>Service 3 content</h3>
                content :<br> <textarea required name="service3"></textarea>
                <br>
                <input type="submit" name="submit3">
            </form>
            <?php
                if(isset($_POST['submit3']))
                {
                    $service3 = $_POST['service3'];
                    $content3 = "UPDATE `view` SET `service3_content`='".$service3."' WHERE id='1'";
                    if(mysqli_query($con,$content3))
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "getting error";
                    }
                }
            ?>
        </div>
        <div id="about" class="topimg jumbotron">
            
            <form action="#" method="post" >
            <h3>About</h3>
                content : <br><textarea required name="about"></textarea>
                <br>
                <input type="submit" name="about_submit">
            </form>
            <?php
                if(isset($_POST['about_submit']))
                {
                    $about = $_POST['about'];
                    $abt = "UPDATE `view` SET `about`='".$about."' WHERE id='1'";
                    if(mysqli_query($con,$abt))
                    {
                        echo "success";
                    }
                    else
                    {
                        echo "getting error";
                    }
                }
            ?>
        </div>
    </div>

    <script>
    function change(){
        var x = document.getElementById('change').value;

        if(x == "Images")
        {
            document.getElementById('img').style.display = "block";
            document.getElementById('img2').style.display = "block";
            document.getElementById('img3').style.display = "block";
            document.getElementById('img4').style.display = "block";
            document.getElementById('servtitle').style.display = "none";
            document.getElementById('servtitle2').style.display = "none";
            document.getElementById('servtitle3').style.display = "none";
            document.getElementById('servcon').style.display = "none";
            document.getElementById('servcon2').style.display = "none";
            document.getElementById('servcon3').style.display = "none";
            document.getElementById('about').style.display = "none";
        }
        if(x == "Service_Titles" )
        {
            document.getElementById('img').style.display = "none";
            document.getElementById('img2').style.display = "none";
            document.getElementById('img3').style.display = "none";
            document.getElementById('img4').style.display = "none";
            document.getElementById('servtitle').style.display = "block";
            document.getElementById('servtitle2').style.display = "block";
            document.getElementById('servtitle3').style.display = "block";
            document.getElementById('servcon').style.display = "none";
            document.getElementById('servcon2').style.display = "none";
            document.getElementById('servcon3').style.display = "none";
            document.getElementById('about').style.display = "none";
        }
        if(x == "Service_Contents" )
        {
            document.getElementById('img').style.display = "none";
            document.getElementById('img2').style.display = "none";
            document.getElementById('img3').style.display = "none";
            document.getElementById('img4').style.display = "none";
            document.getElementById('servtitle').style.display = "none";
            document.getElementById('servtitle2').style.display = "none";
            document.getElementById('servtitle3').style.display = "none";
            document.getElementById('servcon').style.display = "block";
            document.getElementById('servcon2').style.display = "block";
            document.getElementById('servcon3').style.display = "block";
            document.getElementById('about').style.display = "none";
        }
        if(x == "About" )
        {
            document.getElementById('img').style.display = "none";
            document.getElementById('img2').style.display = "none";
            document.getElementById('img3').style.display = "none";
            document.getElementById('img4').style.display = "none";
            document.getElementById('servtitle').style.display = "none";
            document.getElementById('servtitle2').style.display = "none";
            document.getElementById('servtitle3').style.display = "none";
            document.getElementById('servcon').style.display = "none";
            document.getElementById('servcon2').style.display = "none";
            document.getElementById('servcon3').style.display = "none";
            document.getElementById('about').style.display = "block";
        }

    }
    
    </script>

    <script src="bootstrap/bootstarp-popper.js"></script>
    <script src="bootstrap/bootstarp.js"></script>
    <script src="bootstrap/bootstrap-min.js"></script>
</body>
</html>
<?php
error_reporting(0);
session_start();

if(empty($_SESSION['user'])){
    header("location : login.php");
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
    <link rel="stylesheet" href="css/emergency.css">
    <title>arnhospital</title>
    <style>
    
.doc1{
    border-radius: 50%;
    position: relative;
    left: 400px;
    top: -300px;
}
.doc2{
    border-radius: 50%;
    position: relative;
    left: 450px;    
    top: -250px;
}
.doc3{
    border-radius: 50%;
    position: relative;
    left: 400px;
    top: -200px;
}
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h4 class="text-center text-info"><i><q>Our Emergency Services</q></i></h4>
            <div class="row">
            <div class="col">
                <div class="main_img">
                    <img src="image/site.jpg" width="400px" height="250px">
                </div>
                <div>
                    <img class="doc1" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b7/Mid_Essex_Hospital_Services_NHS_Trust_A%26E_performance_2005-18.png/220px-Mid_Essex_Hospital_Services_NHS_Trust_A%26E_performance_2005-18.png" width="70px" height="70px" alt="">
                </div>
                <div >
                    <img class="doc2" src="http://sheffieldsaveournhs.co.uk/images/HSRrecommendations.png" width="70px" height="70px" alt="">
                </div>
                <div >
                    <img class="doc3" src="https://images.locanto.net/3881578808/Hospital-services-at-home-hyderabad_2.jpg" width="70px" height="70px" alt="">
                </div>
            </div>
            <div class="col">
                <div>
                    <div class="ser ser1 text-center">
                        <div class="line"></div>
                        1
                    </div>
                   <p class="text"> We provide Ambulance Services.<br>
                    call on: 8888880000
                </p>
                </div>
                <div>
                    <div class="ser ser2 text-center">
                        <div class="line"></div>
                        2
                    </div>
                   <p class="text2"> Online Appointment & bad Booking .<br>
                    try it
                </p>
                </div>
                <div>
                    <div class="ser ser1 text-center">
                        <div class="line"></div>
                        3
                    </div>
                   <p class="text"> We provide online Report System<br>
                    And you can Also in touch with doctor's.
                </p>
                </div>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
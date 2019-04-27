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
      <title>ARNHOSPITAL</title>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
    html {
    overflow: scroll;
    overflow-x: hidden;
}
::-webkit-scrollbar {
    width: 0px;  /* Remove scrollbar space */
    background: transparent;  /* Optional: just make scrollbar invisible */
}
/* Optional: show position indicator in red */
::-webkit-scrollbar-thumb {
    background: #FF0000;
}
    </style>
  </head>
  <body>
    <div class="container-fluid top-nav">
        <span class="s1">ARNHO</span><span class="s2">SPITAL</span>
        <span class="home">
            <a class="nav-nam" href="#">Home</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="#services">Services</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="#doc">Our Doctors</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="#abt">About Us</a>
        </span>
        <span class="nav-tag">
            <a class="nav-nam" href="#contact">contact US</a>
        </span>
        <span class="btn btn-light dropdown nav-tag">
            <a class="nav-nam dropbtn" href="login.php"><?php echo  "Hi ".$_SESSION['user']; ?></a>
            <div class="dropdown-content">
                <a href="#" class="btn btn-primary">Response</a>
                <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Notification</a>
                <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>
            
<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="background:black; color:rgba(255, 255, 255, 0.979);">
        <h4 class="modal-title">Response</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="background:black;">
        <div class="modal-temp" style="width: 100%; height: 250px; background-color: rgb(15, 24, 36);
        overflow: scroll;
        color: rgba(255, 255, 255, 0.644);
        ">
            <?php
                @$select_query = "select * from appointment where name='".$_SESSION['user']."'";
                @$result_time = mysqli_query($con,$select_query);
                if($row = mysqli_fetch_assoc($result_time))
                {
                    if(isset($row[time]))
                    {
                       echo '<br><img src="image/schedule.png" width="70px" height="70px" ><br>';
                       echo '<h5><q>Your Appointment Is Confirmed</q></h5>';
                       echo '<p>Name : '.$_SESSION['user']."</p><br>";
                       echo '<p>Time : '.$row[time]."</p><br>";
                       echo '<p><i>Please Be On Time</i></p>';
                    }
                    else
                    {
                        echo "blank";
                    }
                    
                }
                else
                {
                    echo '<br><p><i>Nothing Should Be Find</i></p>'; 
                }
                ?>
        </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer" style="background:black;">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
        </span>
    </div>
    <div class="main">
        <div id="home">
           <?php
            $img = "select * from view";

            $result = mysqli_query($con,$img);
            
            while($row = mysqli_fetch_assoc($result)){
           ?>
            <img class="home-img" align="center" src="<?php echo "admin/".@$row['topbg']; ?>">
           <div class="img-txt">
                <table>
                    <tr>
                        <td>
                            <div align="center" class="div1">
                                <img src="image/appointment.png" width="70%" height="110px;">
                                <!-- Appointment Form-->
                                <form action="#" method="post">
                                    <!--<p style="color:white; padding: 20px; font-size: 30px;">Fix Appointment</p>-->
                                   
                                        <input type="text" name="name" value="<?php echo $_SESSION['user']; ?>" placeholder="Name" class="input-con">
                                        <br>
                                        <br>
                                        <input type="date" name="date" placeholder="Name" class="input-con">
                                        <br>
                                        <br>
                                        <textarea name="issue" placeholder="appointment for what?" class="input-text"></textarea>
                                        <br>
                                        <br>
                                        <input type="submit" name="appointment" value="Take Appointment" class="btn btn-danger">
                                </form>
                                <!--Appointment submition-->
                                <?php
                                if(isset($_POST['appointment'])){
                                    $name = mysqli_real_escape_string($con,$_POST['name']);
                                    $date = mysqli_real_escape_string($con,$_POST['date']);
                                    $issue = mysqli_real_escape_string($con,$_POST['issue']);
                                    $take =  "INSERT INTO appointment(name,date,issue) values ('".$name."','".$date."','".$issue."')";
                                    if(mysqli_query($con,$take))
                                    {
                                        echo '<p style="color:white;"><br>you will get response soon</p>';
                                    }
                                }
                                ?>
                            </div>
                        </td>
                        <td>
                            <div class="div3"></div>
                        </td>
                        <td>
                            <div align="center" class="div2">
                            <p style="color:white; padding: 20px; font-size: 30px;">More Services</p>
                            <div class="d2">Emergency <a href="emergency.php" class="btn btn-danger"><b>-></b></a></div>
                            <br><br>
                            <div class="d2">Report's <a href="report.php" class="btn btn-danger"><b>-></b></a></div>
                            <br>
                            <br>
                            <div class="d2">book A Bad<a href="book.php" class="btn btn-danger"><b>-></b></a></div>
                            </div>
                            
                        </td>
                        <td>
                            <div></div>
                        </td>
                    </tr>
                </table>
           </div>
            <!--
            <div class="img-txt text-center"><h1 ><span class="sp1">ARNHO</span><span class="sp2">SPITAL</span></h1>
                <p class="tag-line"><q>Hospital on phone</q></p>
        </div>-->

        </div>
        <div id="services">
            <div align="center" class="sbox">
                <p>Services</p>
                <div class="under-line"></div>
            </div>
            <div align="center">
                <table align="center" >
                    <td>
                        <div align="center" id="scontent">
                            <b><h3><?php echo @$row[service1_title];?></h3></b>
                            <img src="image/phone_appoint2.png" width="90px" height="90px">
                            <p><?php echo @$row[service1_content];?></p>
                        </div>
                    </td>
                    <td>
                        <div id="vline">
                            
                        </div>
                    </td>
                    <td>
                        <div align="center" id="scontent">
                        <b><h3><?php echo @$row[service2_title];?></h3></b>
                        <img src="image/bed.png" width="90px" height="90px">
                        <p><?php echo @$row[service2_content];?></p>

                        </div>
                    </td>
                    <td>
                        <div id="vline">

                        </div>
                    </td>
                    <td>
                        <div align="center" id="scontent">
                        <b><h3><?php echo @$row[service3_title];?></h3></b>
                        <img src="image/report.png" width="90px" height="90px">
                        <p><?php echo @$row[service3_content];?></p>

                        </div>
                    </td>
                </table>
            </div>
            <div id="doc">
                <div align="center" class="obox">
                    <p>Our Doctor's</p>
                    <div class="under-line"></div>
                    <div>
                        <p style="font-size: 20px;">We have the best in field Doctor's in city, with good experience in the field.</p>
                    </div>
                </div>
                
                <div align="center">
                <table align="center" >
                    <td>
                        <div align="center" id="scontent">
                            <?php
                                                            
                                //$img2 = "select * from view";

                               // $result2 = mysqli_query($con,$img2);

                                //while($row = mysqli_fetch_assoc($result2))
                                //{
                            
                            ?>
                            <img class="doc-img" src="<?php echo "admin/".@$row[doc1];?>">
                            <h3>Valentina nappi</h3>
                        </div>
                    </td>
                    <td>
                        <div id="vline">
                            
                        </div>
                    </td>
                    <td>
                        <div align="center" id="scontent">
                        <?php
                                                            
                         // $img3 = "select * from view";
                            
                         // $result3 = mysqli_query($con,$img3);
                            
                         //while($row = mysqli_fetch_assoc($result3))
                           // {
                                                        
                            ?>
                        <img class="doc-img" src="<?php echo "admin/".@$row[doc2];?>">
                        <h3>Valentina nappi</h3>
                        <p></p>
                        </div>
                    </td>
                    <td>
                        <div id="vline">

                        </div>
                    </td>
                    <td>
                        <div  align="center" id="scontent">
                        <?php
                                                            
                        // $img4 = "select * from view";
                                                              
                         //$result4 = mysqli_query($con,$img4);
                                                              
                          // while($row = mysqli_fetch_assoc($result4))
                           // {
                                                                                          
                             ?>
                        <img class="doc-img" src="<?php echo "admin/".@$row[doc3];?>">
                        <h3>torry black</h3>
                        </div>
                    </td>
                </table>

                </div>
            </div>
         <div id="abt">
            <div align="center" class="abox">
                    <p>About Us</p>
                    <div class="under-line"></div>
            </div>
            <div  id="abtcon" align="center">
            <?php echo @$row[about];}?>
            </div>
         </div>
         <div id="contact">
             <!--
            <div class="img-con-ani">
                <img class="contact-img" src="image/contact.png">
                <div align="center" class="contact-txt">
                    <p>Contact Us</p>
                </div>
            </div>
                -->

            <div class="img-con-ani">
                <div align="center" class="contact-txt">
                    <p>Contact Us</p>
                    <div class="under-line"></div>
                </div>
            </div>
            <div align="center" class="contact-form">
                <table align="center">
                    <form>
                        <tr>
                           <h3> Contact</h3>
                        </tr>
                    
                        <tr>
                            <input class="input-con" type="text" placeholder="Name">
                        </tr>
                        <br>
                        <br>
                        <tr>
                            <input class="input-con" type="email" placeholder="email">
                        </tr><br>
                        <br>
                        <tr>
                            <input class="input-con" type="mobile" placeholder="contact" >
                        </tr>
                        <br>
                        <br>
                        <tr>
                            <textarea class="input-text" placeholder="Message us!" ></textarea>
                        </tr>
                        <br> <br>   
                        <tr>
                            <button class="btn btn-success">Submit</button>
                        </tr>
                    </form>
                </table>
            </div>
            <div align="center" class="contact-form2">
                <table align="center">
                    <tr>
                        <h3>location:</h3>
                    </tr>
                    <tr>
                        <div>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d7122.628795899343!2d75.8170672!3d26.79811609999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1554472324086!5m2!1sen!2sin" width="500" height="150" frameborder="0" style="border:0" allowfullscreen></iframe>
                        </div>
                    </tr>
                    <br>
                    <tr>
                        <b>address :</b>
                    </tr>
                    <tr>
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum, explicabo natus, esse culpa doloremque amet omnis ab temporibus officiis error reiciendis at cumque, mollitia ullam impedit neque expedita ad distinctio.
                    </tr>
                </table>
            </div>
         </div>
            
        </div>
    </div>
    <script src="bootstrap/bootstarp-popper.js"></script>
    <script src="bootstrap/bootstarp.js"></script>
    <script src="bootstrap/bootstrap-min.js"></script>
  </body>
</html>
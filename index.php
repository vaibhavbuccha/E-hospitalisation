<?php



if(!empty($_SESSION['user'])){
    header("location : home.php");
}
$con = mysqli_connect("localhost","root","","arnhospital");


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link rel="stylesheet" href="css/home.css">
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
        <span class="btn btn-light nav-tag">
            <a class="nav-nam" href="login.php">Login</a>
        </span>
    </div>
    <div class="main">
        <div id="home">
        <?php
            $img = "select * from view";

            $result = mysqli_query($con,$img);
            
            while($row = mysqli_fetch_assoc($result)){
           ?>
            <img class="home-img" src="<?php echo "admin/".@$row['topbg']; ?>">
            <div class="img-txt text-center"><h1 ><span class="sp1">ARNHO</span><span class="sp2">SPITAL</span></h1>
                <p class="tag-line"><q>Hospital on phone</q></p>
        </div>
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
                        <img class="doc-img" src="<?php echo "admin/".@$row[doc1];?>">
                            <h3>Dr. Dhriti Agarwal </h3>
                        </div>
                    </td>
                    <td>
                        <div id="vline">
                            
                        </div>
                    </td>
                    <td>
                        <div align="center" id="scontent">
                        <img class="doc-img" src="<?php echo "admin/".@$row[doc2];?>">
                        <h3>Dr. U S Agarwal</h3>
                        <p></p>
                        </div>
                    </td>
                    <td>
                        <div id="vline">

                        </div>
                    </td>
                    <td>
                        <div  align="center" id="scontent">
                        <img class="doc-img" src="<?php echo "admin/".@$row[doc3];?>">
                        <h3>Dr. Anjana</h3>
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
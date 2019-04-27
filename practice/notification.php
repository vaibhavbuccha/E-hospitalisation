<?php

error_reporting(0);

$con = mysqli_connect("localhost","root","","arnhospital");

$select_query = "select time from appointment where name='vaibhav'";

$result = mysqli_query($con,$select_query);

while($row = mysqli_fetch_assoc($result))
{
    if(isset($row[time]))
    {
        echo $row[time];
    }
    else
    {
        echo "blank";
    }
    
}


?>
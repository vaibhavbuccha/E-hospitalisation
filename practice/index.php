<?php

$con = mysqli_connect("localhost","root","","arnhospital");
if(isset($_POST['submit'])){
    $name = mysqli_real_escape_string($con,$_POST['name']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $issue = mysqli_real_escape_string($con,$_POST['issue']);
    $take =  "INSERT INTO appointment(name,date,issue) values ('".$name."','".$date."','".$issue."')";
    if(mysqli_query($con,$take))
    {
        echo "success";
    }
    else{
        echo "getting error";
    }
}


?>

<form action="#" method="post">
    <input type="text" name="name">
    <input type="date" name="date">
    <input type="text" name="issue">
    <input type="submit" name="submit">
</form>
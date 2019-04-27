<?php

$con= mysqli_connect("localhost","root","","arnhospital");

$appointments = "SELECT * FROM appointment";

$result = mysqli_query($con,$appointments);

while($row=mysqli_fetch_assoc($result))
{

?>
<table>
    <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Date</th>
        <th>Issue</th>
        <th>Current time</th>
        <th>Updated Time</th>
        <th>Delete</th>
        <th>Update</th>
    </tr><br>
    <tr>
        <td><?php echo @$row[id];?></td>
        <td><?php echo @$row[name];?></td>
        <td><?php echo @$row[date];?></td>
        <td><?php echo @$row[issue];?></td>
        <td><?php echo @$row[time];?></td>
        <form action="#" method="post" >
        <td><input type="time" name="time"></td>
        <td><button type="submit" name="delete" value="<?php echo @$row[id];?>" >Delete</button></td>
        <td><button type="submit" name="update" value="<?php echo @$row[id];?>">Update</button></td>
        </form>
    </tr>

        <?php }
        
        if(isset($_POST['delete']))
        {
            $delete = $_POST['delete'];
            $del_query = "DELETE FROM `appointment` WHERE id='".$delete."'";
            if(mysqli_query($con,$del_query))
            {
                header("location : admin.php");
            }
        }
        
        if(isset($_POST['update']))
        {
            $time =$_POST['time'];
            $update = $_POST['update'];
            $up_query = "UPDATE `appointment` SET `time`='".$time."' WHERE id='".$update."'";
            if(mysqli_query($con,$up_query))
            {
                header("location : admin.php");
            }
        }
        
        ?>

</table>
<form action="#" method="post"> 
    <button name="delall" type="submit">delete all</button>
</form>

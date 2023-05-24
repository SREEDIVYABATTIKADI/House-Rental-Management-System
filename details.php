<?php
include_once 'sdatabase.php';
// retrieve form data
$result=mysqli_query($con,"SELECT * FROM owners where house_area='kukatpally'");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 <link rel="stylesheets" href="style.css">
 <style>
table, th, td {
  border: 1px solid white;
  border-collapse: collapse;
}
th, td {
  background-color: #96D4D4;
}
</style>
 </head>
<body  bgcolor="plum">
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table align="center" style="width:70%";>
  
  <tr align="center">
  
    <td>Name</td>
    <td>Email</td>
    <td>Phone number</td>
    <td>Address</td>
    <td>Rent</td>
    <td>housearea</td>
    <!-- <td>Password</td> -->
  </tr>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<tr align="center">
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["phone_no"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["rent"]; ?></td>
    <td><?php echo $row["House_area"];?></td>
    
</tr>
<?php

}
?>
</table>
 <?php
}
else{
    echo "No result found";
}
?>
 </body>
</html>
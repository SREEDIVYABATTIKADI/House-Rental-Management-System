<?php
include_once 'sdatabase.php';
// retrieve form data
$result=mysqli_query($con,"SELECT * FROM owners where location='patancheru'");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>s
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
<body bgcolor="plum">
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table align="center" style="width=70%";>
  
  <tr>
    <td>Id</td>
    <td>Name</td>
    <td>Email</td>
    <td>Phone number</td>
    <td>Address</td>
    <td>Rent</td>
    <td>Location</td>
    <!-- <td>Password</td> -->
  </tr>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<tr>
    <td><?php echo $row["id"];?></td>
    <td><?php echo $row["name"]; ?></td>
    <td><?php echo $row["email"]; ?></td>
    <td><?php echo $row["phoneno"]; ?></td>
    <td><?php echo $row["address"]; ?></td>
    <td><?php echo $row["rent"]; ?></td>
    <td><?php echo $row["location"];?></td>
    
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

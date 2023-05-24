<?php
include_once 'sdatabase.php';
// retrieve form data
$id=$_POST['id'];
$pwd=$_POST['pwd'];
$captch=$POST['captcha'];
$result = mysqli_query($con,"SELECT * FROM owners where captcha==phoneno like %____ and id=$id and password='$pwd '");
?>
<!DOCTYPE html>
<html>
 <head>
 <title> Retrive data</title>
 <link rel="stylesheets" href="style.css">
 </head>
<body>
<?php
if (mysqli_num_rows($result) > 0) {
?>
  <table>
  
  <tr>
    <td>ID</td>
    <td>Name</td>
    <td>Email</td>
    <td>Phone number</td>
    <td>Address</td>
    <td>Rent</td>
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

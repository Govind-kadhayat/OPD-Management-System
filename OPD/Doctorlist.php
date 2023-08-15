<?php

include "connect.php";
session_start();
if (!isset($_SESSION['Email'])) {
    header('location:login.php');
}
$Email = $_SESSION['Email'];
$sql="SELECT Name FROM register where Email ='$Email'";
$result =$con->query($sql);
$final = $result -> fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/list.css">
    <link rel="stylesheet" href="css/dashboard.css">

</head>
<body>
    <div>

<div class="submenu">
<?php
include ('./partial/side_menu.php')
?>
<?php
include ('./partial/_nav.php')
?>

</div>


<div class="innertable">
    <h1>Doctor list</h1>
<table>
<tr alignitem="center">
    <?php
include 'connect.php';

    $sql = "SELECT * FROM doctor_detail";
    $result = $con->query($sql);

?>
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  
}
table.center {
  margin-left: auto;
  margin-right: auto;
}

</style>
<?php
if($result->num_rows > 0){
?>

<table>
   <span > <a href="./register_doctor.php"><button  style="color:blue;"> <img src="icons/add.png" alt="imag enot found" height="12px">Register Doctor</button></span>
</a><tr>
 
    <th> S.n </th>
    <th>Name</th>
    <th>Phno</th>
    <th>Specialist</th>
    <th>Address</th>
    <th>Action</th>
  </tr>
  <tr>
    <?php 
    $i =0;
    while($row = mysqli_fetch_array($result)){
    ?>
    </tr>
<!-- <td><?php echo $row['Dr_id']?></td> -->
 <td> <?php echo $i+1?></td>
 <td> <?php echo $row['name'] ?></td> 
 <td> <?php echo $row['Phno'] ?></td> 
 <td> <?php echo $row['Specialist'] ?></td>
 <td> <?php echo $row['address'] ?></td> 
<td>
  <span><a href="update_doctor_list.php ?id=<?php echo $row['id'];?>">Edit</a>  ||  <span><a href="delete_doctor_list.php ?deleteid=<?php echo $row['id'];?>">Delete</a> </span>
</td>
    </tr>
    <?php
    $i++;
    }
    ?>
</table>
<?php

  }
  else{
    echo "No result found";
  }
?>
</dvi>

    </div>
    
</body>
</html>
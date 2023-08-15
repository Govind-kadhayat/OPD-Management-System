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
      include('./partial/side_menu.php')
      ?>
      <?php
      include('./partial/_nav.php')
      ?>

    </div>


    <div class="innertable">
      <h1>User list</h1>
      <table>
        <tr alignitem="center">
          <?php
          include 'connect.php';

          $sql = "SELECT * FROM register";
          $result = $con->query($sql);

          ?>
          <?php
          if ($result->num_rows > 0) {
          ?>

            <table>
              <a href="./register_user.php"> <span> <button style="color:blue;"> <img src="icons/add.png" alt="imag enot found" height="12px">Register User</button></span></a>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Mobile.No</th>
                <th>Address</th>
                <th>Action</th>
              </tr>
              <tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
              </tr>
              <td><?php echo $i + 1;   ?></td>
              <td> <?php echo $row['Name'] ?></td>
              <td> <?php echo $row['Email'] ?></td>
              <td> <?php echo $row['MNumber'] ?></td>
              <td> <?php echo $row['Address'] ?></td>

              <td>
                <span><a href="delete_user_list.php ?deleteid=<?php echo $row['id']; ?>" class='btn'>Delete</a> </span>


                <!-- <a href="update.php ? id=<?php echo $row['id']; ?> &user=<?php echo $row['Name'] ?> &add=<?php echo $row['Address'] ?>
  &doc=<?php echo $row['MNUmber'] ?> &dep=<?php echo $row['Email'] ?> ">Update</a>
              </td> -->
        </tr>
      <?php
                  $i++;
                }
      ?>
      </table>
    <?php

          } else {
            echo "No result found";
          }
    ?>
    </dvi>

    </div>

</body>

</html>
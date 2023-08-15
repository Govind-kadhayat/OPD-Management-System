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
      include('partial/side_menu.php')
      ?>
      <?php
      include('partial/_nav.php')
      ?>
    </div>


    <div class="innertable">
      <h1>Patient list</h1>
      <table>
        <tr alignitem="center">
          <?php
          include 'connect.php';

          $sql = "SELECT * FROM patient_list";
          $result = $con->query($sql);

          ?>
          <?php
          if ($result->num_rows > 0) {
          ?>

            <table>
              <a href="./Patient/registere_patient.php"> <span> <button style="color:blue;"> <img src="icons/add.png" alt="imag enot found" height="12px">Register Patient</button></span></a>
              <tr>
                <th>S.n</th>
                <th>Name</th>
                <th>Address</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
              </tr>
              <td><?php echo $i + 1; ?></td>
              <td> <?php echo $row['name'] ?></td>
              <td> <?php echo $row['address'] ?></td>
              <td> <?php echo $row['Doctor'] ?></td>
              <td> <?php echo $row['Department'] ?></td>
              <td> <?php echo $row['Status'] ?></td>

              <td>
                <span><a href="delete_patientlist.php ?deleteid=<?php echo $row['id']; ?>" class='btn'>Delete</a> </span>
                <span><a href="f_particular_add.php ?sid=<?php echo $row['id'];?>"class='btn'>Print</a> </span>

                <a href="update.php ? id=<?php echo $row['id']; ?>">Update</a>
              </td>
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OPD Management</title>
    <link rel="stylesheet" href="../css/fdashboard.css">
    <link rel="stylesheet"  type="text/css" href="../css/fpage.css">
</head>
<body>
<?php include 'f_nav_bar.php'   ?>
<table >
        <tr alignitem="center">
          <?php
          include '../connect.php';

          $sql = "SELECT * FROM patient_list";
          $result = $con->query($sql);

          ?>
          <?php
          if ($result->num_rows > 0) {
          ?>

            <table class="data">
              <div class="butnreg">
   </div>       
  <tr>
                <th>S.no</th>
                <th>Name</th>
                <th>Address</th>
                <th>Doctor</th>
                <th>Department</th>
                <th>DOB</th>
                <th>Action</th>
            </tr>
              <tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?>
              </tr>
              <td><?php echo  $i+1;  ?></td>
              <td> <?php echo $row['name'] ?></td>
              <td> <?php echo $row['address'] ?></td>
              <td> <?php echo $row['Doctor'] ?></td>
              <td> <?php echo $row['Department'] ?></td>
              <td> <?php echo $row['dob'] ?></td>
              <td>
                <span><a href="f_delete_patient.php ?deleteid=<?php echo $row['id'];?>"class='btn'>Delete</a> </span>
                <span><a href="f_particular_add.php ?sid=<?php echo $row['id'];?>"class='btn'>Print</a> </span>
               
                <a href="f_update_patientlist.php ?id=<?php echo $row['id'];?> ">Update</a>
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
</body>
<footer class="footer">
  <div class="flogo" style="color: red;">

  </div>

</footer>

</html>
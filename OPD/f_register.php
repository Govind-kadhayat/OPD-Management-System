<?php
include 'connect.php';
$Err = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $Name = mysqli_real_escape_string($con, $_POST['Name']);
  $phno = mysqli_real_escape_string($con, $_POST['phno']);
  $Doctor = mysqli_real_escape_string($con, $_POST['Doctor']);
  $Department   = mysqli_real_escape_string($con, $_POST['Department']);
  $user   = mysqli_real_escape_string($con, $_POST['user']);
  $D_O_B   = mysqli_real_escape_string($con, $_POST['birthday']);
  $addr  = mysqli_real_escape_string($con, $_POST['Address']);
  $Status = mysqli_real_escape_string($con, $_POST['Status']);

  if (empty($Name)) {
    $Err = "Enter the name feild";
  } elseif (empty($phno)) {
    $Err = "Phno field is required";
  } elseif (empty($Doctor)) {
    $Err = "Doctor field   is required";
  } elseif (empty($Department)) {
    $Err = "Department.no field  is required";
  } elseif (empty($user)) {
    $Err = "User field is required";
  } elseif (empty($Status)) {
    $Err = "Status field is required";
  } elseif (empty($addr)) {
    $Err = "Address field is required";
  } else {

    $query = "INSERT INTO patient_list (name,phno,Doctor,Department,user,Status,dob,address) VALUES('$Name','$phno','$Doctor','$Department','$user','$Status','$D_O_B','$addr')";
    $data = mysqli_query($con, $query);
    if ($data) {
?>
      <script style="color: green;">
        alert("Insert Sucessfull");
        header("location:f_que_list.php");
      </script>
    <?php

    } else {   ?>
      <script style="color:red;">
        alert("Data insert fail");
      </script>
<?php
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register Patient</title>
  <link rel="stylesheet" type="text/css" href="css/register.css" />
</head>

<body>
  <p style="color: red;">
    <?php if (isset($Err)) {
      echo $Err;
    }  ?>
  </p>
  <form action="#" method="POST">
    <div class="submenu">


    </div>
    <div class="container">
      <h1>Register</h1>Please fill in this form to Register the Patient details.
      <p></p>

      <label for="Name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" name="Name" value="<?php if (isset($Err)) {
                                                                        echo $Name;
                                                                      } ?>">


      <label for="phno"><b>Phno no</b></label>
      <input type="number" placeholder="Enter ph.no" name="phno" maxlength="10" value="<?php if (isset($Err)) {
                                                                                          echo $phno;
                                                                                        } ?>">

      <label for="Doctor"><b>Doctor</b> <select name="Doctor" id="Doctor">
          <?php
          include 'connect.php';

          $sql = "SELECT Name FROM doctor_detail";
          $result = $con->query($sql);

          ?>
          <?php
          if ($result->num_rows > 0) {
          ?>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
              <?php echo $row['Name'] ?>

              <option value=" <?php echo $row['Name'] ?>"> <?php echo $row['Name'] ?></option>
            <?php
              $i++;
            }
            ?>
          <?php

          } else {
            echo "No result found";
          }
          ?>
        </select>
      </label>
      <!-- <input type="text" placeholder="Enter Doctor Name" value="<?php if (isset($Err)) {
                                                                        echo $Doctor;
                                                                      } ?>" name="Doctor" > -->

      <label for="dept"><b>Department</b> <select name="Department" id="Department">
          <option value=" General Physican">General Physican</option>
          <option value="Cardiologists">Cardiologists</option>
          <option value="Audiologists">Audiologists</option>
          <option value="Dentist">Dentist</option>
          <option value="Gynecologist">Gynecologist</option>
          <option value="Radiologist">Radiologist</option>
          <option value="Endocrinologist">Endocrinologist</option>
          <option value="Cardiothoracic Surgeon">Cardiothoracic Surgeon</option>
          <option value="ENT Specialist"> ENT Specialist</option>
          <option value="Orthopedic Surgeon">Orthopedic Surgeon</option>
          <option value="Veterinarian">Veterinarian</option>
          <option value="Psychiatrists">Psychiatrists</option>
          <option value="Pulmonologist">Pulmonologist</option>
          <option value="Oncologist">Oncologist</option>
          <option value="Neurologist">Neurologist</option>
          <option value="Paediatrician">Paediatrician</option>
        </select></label>
      <!-- <input type="text" placeholder="Enter Department" value="<?php if (isset($Err)) {
                                                                      echo $Department;
                                                                    } ?>" name="Department" > -->
      </br>
      </br>
      </br>
      <label for="Register BY">Register BY:</label>
      <input type="text" id="Register" name="user" value="<?php if (isset($Err)) {
                                                            echo $user;
                                                          } ?>" name="user">

      </br>
      <label for=" Status">Status:</label>
      <input type="text" id="Status" name="Status" value="<?php if (isset($Err)) {
                                                            echo $Status;
                                                          } ?>" name="Status">

      </br>
      <label for="birthday">Birthday:</label>
      <input type="date" id="birthday" name="birthday">
      </br>
      </br>
      </br>
      <label for="Address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" value="<?php if (isset($Err)) {
                                                              echo $addr;
                                                            } ?>" name="Address">

      </br>


      <hr>
      <button type="submit" class="registerbtn" name="register">Register</button>
    </div>
  </form>
</body>

</html>
<?php

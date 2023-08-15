<?php


if (is_numeric($id = $_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('location:patient_list.php');
}
include 'connect.php';

$qury = "SELECT * FROM patient_list WHERE id='$id'";
$result = $con->query($qury);
$row = $result->fetch_assoc();




if (isset($_POST['submit'])) {
  $name =  $_POST['Name'];
  $doctor = $_POST['Doctor'];
  $department =  $_POST['Department'];
  $address = $_POST['Address'];
  $user = $_POST['user'];
  $status = $_POST['Status'];
  $sql = "UPDATE patient_list SET name='$name',address='$address',Doctor='$doctor', Department='$department',Status='$status',user='$user'  WHERE id= '$id'";
  $result = mysqli_query($con, $sql);
  print_r($result);
  if ($result) {
    //echo '<script> alert("Data Update")</script>';
    header('location:patient_list.php');
  } else {
    echo '<script> alert("Data Update Fail")</script>';
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
  <link rel="stylesheet" type="text/css" href="./css/register.css" />
</head>

<body>
  <form action="update.php?id=<?php echo $row['id'] ?>" method="POST">
    <div class="submenu">


    </div>
    <div class="container">
      <h1>Update</h1>Please fill in this form .
      <p></p>

      <hr>

      <label for="Name"><b>Name</b></label>
      <input type="text" placeholder="Enter Name" value="<?php echo  $row['name']; ?>" name="Name">


      <!-- <label for="phno"><b>Mobile no</b></label>
    <input type="number" placeholder="Enter Mobile.no" name="MNumber" maxlength="10"  >
    -->
      <label for="Doctor"><b>Doctor</b></label>
      <input type="text" placeholder="Enter Doctor Name" value="<?php echo $row['Doctor']; ?>" name="Doctor">

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
        </br>
      </br>
      </br>      <label for="Register BY">Register BY:</label>
      <input type="text" id="Register" name="user" value=" <?php echo $row['user'];?>">
      </br>
      </br>
      <label for="status"><b>Status</b> <select name="Status" id="Status">
          <option value="Pending">Pending</option>
          <option value="Accepted">Accepted</option>
          
        </select></label>
        </br>
</br></br>
      <!-- <label for=" Status">Status:</label>
      <input type="text" id="Status" name="Status" value=" <?php echo $row['Status']; ?>" name="Status"></br> -->
      <label for="Address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" value=" <?php echo $row['address']; ?>" name="Address">


      <hr>
      <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
      <button type="submit" class="registerbtn" name="submit">Update</button>
    </div>
  </form>
</body>

</html>
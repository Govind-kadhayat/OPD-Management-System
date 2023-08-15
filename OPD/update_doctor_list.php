<?php


if (is_numeric($id = $_GET['id'])) {
  $id = $_GET['id'];
} else {
  header('location:Doctorlist.php');
}
include 'connect.php';

$qury = "SELECT * FROM doctor_detail WHERE id='$id'";
$result = $con->query($qury);
$row = $result->fetch_assoc();




if (isset($_POST['submit'])) {
  $Name = mysqli_real_escape_string($con, $_POST['Name']);
  $Phno = mysqli_real_escape_string($con, $_POST['Phno']);
  $Specialist   = mysqli_real_escape_string($con, $_POST['Specialist']);
  $addr  = mysqli_real_escape_string($con, $_POST['Address']);


      
  if (empty($_POST["Name"])) {
    $Err = "You Forgot to Enter Your First Name!"; }

    elseif (!preg_match("/^[a-zA-Z ]*$/", $Name)) {
      $Err = "Only letters and white space allowed in Full name";
    }

    elseif (empty($Phno)) {
      $Err = "Mobile.no field  is required";
    } 
    elseif(!preg_match('/^[0-9]{10}+$/', $numb)) {
        $Err ="Invalid Phone Number";
        }
    elseif (empty($addr)) {
      $Err = "Address field is required";
    } 
    elseif(!preg_match("/^[a-zA-Z ]*$/", $Specialist)){
      $Err = "Only letters and white space allowed in Specialist";
    }else{




  $sql = "UPDATE patient_list SET Name='$Name',Address='$addr',Specialist='$Specialist', Phno='$Phno','Specialist=Specialist' WHERE id= '$id'";
  $result = mysqli_query($con, $sql);
  // print_r($result);
  if ($result) {
    //echo '<script> alert("Data Update")</script>';
    header('location:Doctorlist.php');
  } else {
    echo '<script> alert("Data Update Fail")</script>';
  }
}}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Update list</title>
  <link rel="stylesheet" type="text/css" href="./css/register.css" />
</head>

<body>
  <form action="update.php?id=<?php echo $row['id'] ?>" method="POST">

    <body>
      <p style="color: red;">
        <?php if (isset($Err)) {
          echo $Err;
        }  ?>
      </p>

      </div>
      <div class="container">
        <h1>Register</h1>Please fill in this form to Update the Doctor details.
        <p></p>

        <hr>

        <label for="Name"><b>Full Name</b></label>
        <input type="text" placeholder="Enter your full Name" name="Name" value="<?php if (isset($Err)) {
                                                                                    echo $Name;
                                                                                  } ?>">


        <!-- <label for="phno"><b>Mobile no</b></label>
    <input type="number" placeholder="Enter Mobile.no" name="MNumber" maxlength="10"  >
    -->
        <label for="Doctor"><b>Phno</b></label>
        <input type="text" placeholder="Enter  Phone no " value="<?php if (isset($Err)) {
                                                                    echo $Phno;
                                                                  } ?>" name="Phno">

        <label for="Specialist"><b>specialist</b></label>
        <input type="text" placeholder="Enter the Dr.Specialist" value="<?php if (isset($Err)) {
                                                                          echo $Specialist;
                                                                        } ?>" name="Specialist">
        </br>
        <label for="Address"><b>Address</b></label>
        <input type="text" placeholder="Enter Address" value="<?php if (isset($Err)) {
                                                                echo $addr;
                                                              } ?>" name="Address">


        <hr>

        <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
        <button type="submit" class="registerbtn" name="register">Register</button>
      </div>
  </form>
</body>

</html>
<?php

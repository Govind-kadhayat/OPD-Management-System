<?php


// $sqlquery = "INSERT INTO pharmecy(name, email, password) VALUES ('$name','$email','$password')"
// if($conn->query($sql) == TRUE){
//   echo"record inserted sucessfully";

// }else{

// }
// $NameErr=$EmailErr=$PasswordErr="";
// $Name=$Email=$Password="";
// if($_SERVER["REQUEST_METHOD"]=="POST"){
//   if(empty($_POST['Name'])){
//     $NameErr="Full name is required";

//   }else{
//     $Name = input($_POST["Name"]);
//   }
//   if(empty($_POST['Email'])){
//     $EmailErr="Email field is required or invlaid";
//   }
//   else{
//     $Email = input($_POST["Email"]);
//   }
//   if(empty($_POST["Password"])){
//     $PaswwrodErr="Password is required";
//   }else{
//   $Password=input($_POST['Password']);

// }
// }



?>


<?php

include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    elseif(!preg_match('/^[0-9]{10}+$/', $Phno)) {
        $Err ="Invalid Phone Number";
        }
    elseif (empty($addr)) {
      $Err = "Address field is required";
    } 
    elseif(!preg_match("/^[a-zA-Z ]*$/", $Specialist)){
      $Err = "Only letters and white space allowed in Specialist";
    }else{




    $query = "INSERT INTO doctor_detail (name,Phno,Specialist,address) VALUES('$Name','$Phno','$Specialist','$addr')";
    $data = mysqli_query($con, $query);
    if ($data) {
?>
      <script style="color: green;">
        alert("Insert Sucessfull");
        header("location:./Doctorlist.php");
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
  <title>Register Doctor Details</title>
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
      <?php
      // include ('../partial/side_menu.php')
      ?>

    </div>
    <div class="container">
      <h1>Register</h1>Please fill in this form to Register the Patient details.
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

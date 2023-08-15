<?php

include('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {





  $fname = mysqli_real_escape_string($con, $_POST['Name']);
  $email = mysqli_real_escape_string($con, $_POST['Email']);
  $psw   = mysqli_real_escape_string($con, $_POST['Password']);
  $numb  = mysqli_real_escape_string($con, $_POST['MNumber']);
  $addr  = mysqli_real_escape_string($con, $_POST['Address']);
  $type  = mysqli_real_escape_string($con, $_POST['user_type']);


  if (empty($_POST["Email"])) {
    $Err = "You Forgot to Enter Your Email!";
  }
   elseif (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email)){
    // check if e-mail address syntax is valid
      $Err = "You Entered An Invalid Email Format";}

      
  elseif (empty($_POST["Name"])) {
    $Err = "You Forgot to Enter Your First Name!"; }

    elseif (!preg_match("/^[a-zA-Z ]*$/", $fname)) {
      $Err = "Only letters and white space allowed in Full name";
    }

    elseif (empty($numb)) {
      $Err = "Mobile.no field  is required";
    } 
    elseif(!preg_match('/^[0-9]{10}+$/', $numb)) {
        $Err ="Invalid Phone Number";
        }
    elseif (empty($addr)) {
      $Err = "Address field is required";
    } 
  //   elseif (!preg_match('/^[^@]{1,63}@[^@]{1,255}$/', $addr)) {
  //   $Err = "Please provide the proper address";
  // } 
    elseif (strlen($fname) < 3 || strlen($fname) > 30) {
      $Err = "Username must be between 3 to 30 character";
    } 
    elseif (strlen($psw) < 8) {
      $Err = "Password must be atleast 8 character";
    } 
    else {
      $check_email = "SELECT * FROM register WHERE Email ='$email'";
      $result = mysqli_query($con, $check_email);
      $numExitRows = mysqli_num_rows($result);

      if ($numExitRows > 0) {
        $Err = "Email alrady exit";
      } else {

        $hash = password_hash($psw, PASSWORD_DEFAULT);
        $query = "INSERT INTO register (Name,Email,Password,MNumber,Address,user_type) VALUES('$fname','$email','$hash',$numb,'$addr','$type')";
        $data = mysqli_query($con, $query);
        if ($data) {
?>
          <script style="color: green;">
            alert("Insert Sucessfull");
            header("location:user_list.php");
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
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register page</title>
  <link rel="stylesheet" type="text/css" href="./css/register.css" />
</head>

<body>
  <p style="color: red;">
    <?php if (isset($Err)) {
      echo $Err;
    }  ?>
  </p>
  <form action="#" method="POST">
    <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr>
      <label for="Name"><b> Full Name</b></label>
      <input type="text" placeholder="Enter Name" value="<?php if (isset($Err)) {
                                                            echo $fname;
                                                          } ?>" name="Name">

      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" value="<?php if (isset($Err)) {
                                                            echo $email;
                                                          } ?>" name="Email">

      <label for="phno"><b>Mobile no</b></label>
      <input type="text" placeholder="Enter Mobile.no" name="MNumber" value="<?php if (isset($Err)) {
                                                                              echo $numb;
                                                                            } ?>" maxlength="10" required>
      </br>
      <label for="Address"><b>Address</b></label>
      <input type="text" placeholder="Enter Address" value="<?php if (isset($Err)) {
                                                              echo $addr;
                                                            } ?>" name="Address">

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" value="<?php if (isset($Err)) {
                                                                    echo $psw;
                                                                  } ?>" name="Password">

      <label for="user_type"><b>User Type</b> <select name="user_type" id="user_type" value="user_type">
          <option value=" Super Admin">Admin</option>
          <option value="User">User</option>
          </select></label>
      


      <hr>

      <!-- <p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p> -->
      <button type="submit" class="registerbtn" name="register">Register</button>
    </div>
  </form>
</body>

</html>
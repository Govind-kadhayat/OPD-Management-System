<?php
session_start();
$EmailErr = $PasswordErr ="";
$Email = $Password ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include ('connect.php');
    $Email = $_POST['Email'];
    $pas = $_POST['Password'];



    $sql = "SELECT * FROM test WHERE Email = '$Email' ";
    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
//     $row = mysqli_fetch_assoc($result); 
//   echo $row['password'];

   
print_r($num);


if ($num > 0) {
        $row = mysqli_fetch_array($result);

 if ($row['type'] == 'Admin'){
        header('location:admin.php');
 }
 elseif ($row['type'] == 'User'){
        header('location:user.php');
 
 }

    }

    function input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>

<body>

    <form action="log.php" method="post">
        <fieldset class="login">
            <div>
                <h1>Login</h1>
                
                <div class="l-email">
                    <label for="Email">Email<img src="icons/mail_FILL0_wght400_GRAD0_opsz48.png" alt="Image not found" width="20" height="20"></label>
                    <input type="text" placeholder="Enter you Email" name="Email" value="<?php echo isset($Email) ? $Email : '' ?>">
                    <?php if (isset($err['Email'])) { ?>
                        <span class='err'> <?php echo $err['Email'] ?></span>

                    <?php  } ?>
                </div>
                <div class="l-password">
                    <label for="Password">Password</label>
                    <input type="Password" id="typepass" placeholder="Enter your Password" name="Password" value="<?php echo isset($Password) ? $Password : '' ?>">
                    <input type="checkbox" onclick="Toggle()"><?php if (isset($err['Password'])) { ?>
                        <span class='err'> <?php echo $err['Password'] ?></span>

                    <?php  } ?>

                    <!-- <script>
                        // Change the type of input to password or text
                        function Toggle() {
                            let temp = document.getElementById("typepass");

                            if (temp.type === "password") {
                                temp.type = "text";
                            } else {
                                temp.type = "password";
                            }
                        }
                    </script> -->
                </div class="l-login">

                <div>
                    <span>
                        <input type="submit" name="loginb" id="Login" value="Login ">
                    </span>
                </div>
        </fieldset>
    </form>

</body>
<style>

</style>

</html>
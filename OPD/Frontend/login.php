<?php
// include_once "./connect.php";
// session_start();
// if(isset($_SESSION['Email'])){
//     header('location:./Dashboard.php');
// }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];


    $sql = "SELECT * FROM register WHERE Email = '$Email'";
    $result = $con->query($sql);
    $user = $result->fetch_assoc();
    if ($result) {
        $sql = "SELECT * FROM register WHERE Email ='$Email'";
        $result = $con->query($sql);
        if ($result->num_rows > 0) {
            $_SESSION['Email'] = $Email;
            header('location:fdashboard.php');
            echo "LOGIN SUCESSFULLY";
        } else {
            echo "Email not Found ";
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
    <title>OPD Management</title>
    <link rel="stylesheet" type="text/css" href="../css/fpage.css">
</head>

<body class="b_l_image">
    <nav>
        <label class="logo">OPD Management</label>
        <ul>
            <li> <a href="#"> Home</a></li>
            <li> <a href="#"> Contact</a></li>
            <li> <a href="#"> Admission</a></li>
            <li> <a href="./register.php" class="btnn"> Register</a></li>
        </ul>
    </nav>

    <middle class="login_f">
        <form action="login.php" class="bak_login" method="post">
            <div>
                <div class="l-email">
                    <label for="Email">Email</label>
                    <input type="Email" placeholder="Enter you Email" name="Email">
                </div>
                <div class="l-password">
                    <label for="Password">Password</label>
                    <input type="Password" placeholder="Enter your Password" name="Password">
                </div class="l-login">
                <div>
                    <button type="Submit" class="loginb" name="loginb">Login</button>
                </div>

        </form>
    </middle>

</body>

</html>
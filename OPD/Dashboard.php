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
    <title>Dashboard of OPD</title>
    <link rel="stylesheet" href="css/dashboard.css">
</head>

<body>

    <?php include "partial/side_menu.php" ?>
    <div class="main_content">


        <?php include "partial/_nav.php" ?>

        <main>
            <div class="cards">
                <div class="card_single">
                    <div>
                        <h1>
                           
                        <?php
                        include ('connect.php');
                        $query="SELECT * FROM patient_list";
                        $data = mysqli_query($con,$query);
                        if($data_row = mysqli_num_rows($data)){
                            echo $data_row;
                        }  else{
                            echo "No data found";
                        } 
                        ?>
                        </h1>
                        <span>
                           Queue patient
                        </span>
                    </div>
                    <div>
                        <span class="la_users">

                        </span>
                    </div>
                </div>
                <div class="card_single">
                    <div>
                        <h1>
                            79
                        </h1>
                        <span>
                            Cured patient
                        </span>
                    </div>
                    <div>
                        <span class="la_users">

                        </span>
                    </div>
                </div>
                <div class="card_single">
                    <div>
                        <h1>
                            100
                        </h1>
                        <span>
                            Total Patient
                        </span>
                    </div>
                    <div>
                        <span class="la_users">

                        </span>
                    </div>
                </div>
                <div class="card_single">
                    <div>
                        <h1>
                            NRP=110
                        </h1>
                        <span>
                            Total Income
                        </span>
                    </div>
                    <div>
                        <span class="la_users">

                        </span>
                    </div>
                </div>
            </div>
        </main>
    </div>

</body>

</html>
<?php
include('../connect.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Invoice = $_POST['Invoice'];
    $name = $_POST['name'];
    $add = $_POST['address'];
    $Phno = $_POST['Phno'];
    $con_dr = $_POST['consultant'];
    $admin = $_POST['user'];
    $dob = $_POST['birthday'];

    $query = "INSERT INTO  bill (invoce_no, name, address,phno,consultant,user,dob) VALUES ('$Invoice','$name','$add','$Phno','$con_dr','$admin','$dob')";
    $data = mysqli_query($con, $query);
    $row = mysqli_fetch_array($data);
    if ($data) {
?>
        <script style="color: green;">
            alert("Insert Sucessfull");
            header("location:f_register.php");
        </script>
    <?php

    } else {   ?>
        <script style="color:red;">
            alert("Data insert fail");
        </script>

<?php
    }
}



?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill_register</title>
    <link rel="stylesheet" type="text/css" href="../css/f_register_bill.css">
</head>

<body>
    <h2>
        <p align="center">
            Please provide the details for Bill print
        </p>
    </h2>
    <form action="#" method="POST">
        <fieldset class="s_sub">
            <div class="mainclass">

                <label for="Invoice"><b>Invoice No</b></label>
                <input type="text" placeholder="Please enter your Invoice number" name="Invoice">
                </br>
                </br>
                <label for="Name"><b>Name</b></label>
                <input type="text" placeholder="Please enter your Full name" name="name">
                </br>
                </br>
                <label for="sex"><b>Sex</b></label>
                <select id="name" name="sex">

                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select>
                </br>
                </br>
                <label for="Address"><b>Address</b></label>
                <input type="text" placeholder="Please enter your Address" name="address">

                </br>
                </br>
                <label for="Phno"><b>Phno</b></label>
                <input type="tel" placeholder="Please enter Phno" name="Phno">
                </br>
                </br>
                <label for="Consultant Dr"><b>Consultant Dr</b></label>
                <input type="text" placeholder="Please enter Consultant Dr" name="consultant">
                </br>
                </br>
                <label for="birthday">Birthday:</label>
                <input type="date" id="birthday" name="birthday">
                </br>
                </br>
                <label for="Printed by"><b>Printed by</b></label>
                <input type="text" placeholder="Please enter Printed by username" name="user">
                </br>
                </br>

                <label for=" particular"><b>Particular </b></label>
                <input type="text" placeholder="Please enter the particular items" name="particular">

               </a><span> <a href="./f_particular_add.php ?id=<?php echo $row['id'];?> "class='btn'>Add</a> </span>
                <button type="submit" class="registerbtn" name="register">Register</button>

            </div>

        </fieldset>


    </form>


</body>

</html>
<?php

include '../connect.php';
if(isset($_GET['id'])){

    $id = $_GET['id'];}
$qury = "SELECT * FROM patient_list WHERE id='$id'";
$result = $con->query($qury);
$row = $result->fetch_assoc();
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bill print</title>
    <link rel="stylesheet" type="text/css" href="../css/bill.css">
</head>

<body>
    <header>
        <div class="header">
            <div align="right">
                Contact:- +9779868585585 </br>982312232
            </div>
            <div class="center">
                CASE HOSPITAL </br>
                Pulchowk, Lalitpur, Nepal, Kathmandu, Lalitpur, Bagmati </br>
                OPD Bill
            </div>
        </div>
    </header>





    <div class="main_page">



        <div class="patient_details">
            <ul>
                <div class="logo">
                    <img src="../icons/f_logo.jpg" alt="imag enot found" height="80px">
                </div>

                <li>Hospital NO : <?php echo $row['hospital_no']; ?></li>
                <li>Invoice NO : <?php echo uniqid(); ?></li>
                <li>patient name :<?php echo $row['name']; ?></li>
                <li>Consultant Dr :<?php echo $row['Doctor']; ?></li>
                <li>Date of birth:<?php echo $row['dob']; ?></li>
                <li>Ph NO :<?php echo $row['phno']; ?></li>
                <li>Printed Date :<?php echo  date("Y/m/d"); ?></li>
                <li>Time: <?php
                            date_default_timezone_set("Asia/Kathmandu");
                            echo  date("h:i:sa");
                            ?></li>

                <li>Printed BY : <?php echo $row['user']; ?></li>
            </ul>
        </div>
        <div class="table_data">
            <table border="1" width="60%" clas="middle_group">
                <?php

                $sql = "SELECT * FROM  particular WHERE id='$id' ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
              

                ?> <?php

        ?>
                <tr>
                    <th> S.n</th>
                    <th>Particular</th>
                    <th> Rate</th>
                    <th> Qty</th>
                    <th> Amount</th>
                </tr>
                <?php
                $i = 0;
                while ($row = mysqli_fetch_array($result)) {
                ?><tr height="50">
                        <th width="10%"> <?php echo $i + 1; ?></th>
                        <th width="40%"><?php echo $row['paticular'] ?> </th>
                        <th> <?php echo $row['price']; ?></th>
                        <th padding> <?php echo $row['qty']; ?></th>
                        <th width="20%"> <?php $amount = $row['qty'] * $row['price'];
                                            $newamount = 0 ;
                                            $newamount = $newamount + $amount ; 
                                            echo $amount;
                                            ?></th>
                        <?php ?>

                    </tr>
                <?php
                    $i++;
                }

                ?>
                <tr>

                    <th colspan="3">Total</th>

                    <th colspan="2"><?php
                                    echo $newamount; ?></th>
                </tr>
              



        </div>

        </table>

        </br>
    </div>
    <div class="print_b"> <input type="button" onclick="window.print()" value="Print now" class="print_b"> </br></div>

    <div class="print">

        <footer>
            <!-- <input type="button" onclick="window.print()" value="Print now" class="print_b"  > -->
            <p>

                ***We wish you a good health**
            </P>
        </footer>
    </div>

</body>

</html>
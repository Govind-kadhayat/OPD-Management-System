<?php
include('connect.php');
if (isset($_GET['sid'])) {

    $id = $_GET['sid'];


    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $paticular = $_POST['paticular'];
        $qty = $_POST['qty'];
        $price = $_POST['price'];

        $sql = "INSERT INTO particular (id, paticular, qty, price)  VALUES ('$id','$paticular','$qty','$price')";
        $resut = $con->query($sql);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add particular</title>
    <link rel="stylesheet" type="text/css" href="../css/add_particular.css" >
</head>

<body>


    <form action="#" method="POST">
        <div class="particular_add">
            <label for="paticular">Particular </label>
            <input type="text" placeholder="Please provide the partiuclar data" name="paticular">
</br>

            <label for="qty"> Quantity </label>
            <input type="number" placeholder="Enter the quantity" name="qty">
</br>

            <label for="price">Price</label>
            <input type="number" placeholder="Enter the price " name="price">
</br>

            <button tpe="submit" name="Add" value="Add">Save</button>

        </div>
    </form>
    <?php

                $sql = "SELECT * FROM  particular WHERE id='$id' ";
                $result = $con->query($sql);
                $row = $result->fetch_assoc();
                ?>

        <table width="50%">

            <style>
                table,
                th,
                td {
                    border: 1px solid black;
                    border-collapse: collapse;

                }
            </style>

            <tr>
                <th>S.n</th>
                <th>paricular</th>
                <th>Price</th>
                <th>Qty</th>
                <th>Action</th>
                <th>Toatl Amount</th>
            </tr>
            <?php
            $i = 0;
            while ($row = mysqli_fetch_array($result)) {
            ?>
                <tr>
                    <td><?php echo  $i + 1;  ?></td>

                    <th><?php
                        if ($row) {

                            echo $row['paticular'];
                        } else {
                            echo 'no data found';
                        }


                        ?></th>

                    <th><?php if ($row) {

                            echo $row['price'];
                        } else {
                            echo 'No data found';
                        }

                        ?></th>
                    <th><?php if ($row) {
                            echo $row['qty'];
                        } else {
                            echo 'NO data found';
                        }

                        ?>
                    </th>

                    <th><span><a href="f_particular_delete.php ?deleteid=<?php echo $row['invoice_no']; ?>">Delete</a> </span></th>

<th>
                    <?php if ($row) {
                        $amount = $row['qty'] * $row['price'];

                        echo $amount;
                    } else {
                        echo 'NO data found';
                    }

                    ?>
                    </th>
                    </script>


                </tr>
            <?php
                $i++;
            }
            ?>
            <button> <span><a href="f_bill.php ?id=<?php echo $id; ?>">Print</a> </span></button>

        </table>

   

</body>

</html>
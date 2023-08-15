<?php
include '../connect.php';
$id = $_GET['deleteid'];
echo $id;
$query ="DELETE from particular WHERE invoice_no='$id'";

$result = mysqli_query($con,$query);
if($result){
    echo '<script> alert("Data Deleted")</script>';
    header('location:f_particular_add.php');

}else{
    echo '<script> alert("Data delete Fail")</script>';
}


?>
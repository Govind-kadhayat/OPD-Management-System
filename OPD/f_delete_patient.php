<?php
include '../connect.php';
if(isset($_GET['deleteid'])){

$id = $_GET['deleteid'];

$query ="DELETE from patient_list WHERE id='$id'";

$result = mysqli_query($con,$query);
if($result){
    echo '<script> alert("Data Deleted")</script>';
    header('location:f_particular_add.php');

}else{
    echo '<script> alert("Data delete Fail")</script>';
}
}


?>
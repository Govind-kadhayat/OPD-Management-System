<?php
include 'connect.php';
if(isset($_GET['deleteid'])){

$id = $_GET['deleteid'];

$query ="DELETE from doctor_detail WHERE id='$id'";

$result = mysqli_query($con,$query);
if($result){
    echo '<script> alert("Data Deleted")</script>';
    header('location:Doctorlist.php');

}else{
    echo '<script> alert("Data delete Fail")</script>';
}
}

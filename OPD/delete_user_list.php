<?php
include 'connect.php';
if(isset($_GET['deleteid'])){

$id = $_GET['deleteid'];

$query ="DELETE from register WHERE id='$id'";

$result = mysqli_query($con,$query);
if($result){
    echo '<script> alert("Data Deleted")</script>';
    header('location:user_list.php');

}else{
    echo '<script> alert("Data delete Fail")</script>';
}
}

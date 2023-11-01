<?php
include 'cfg.php';
$id=$_GET['deleteid'];

//deleting from database
$sql = "delete FROM `myguests` where id='$id'";
$result = mysqli_query($conn,$sql);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}

if($result){
    header('location:search.php');
} else {
    die("Error in SQL query: " . mysqli_error($conn));
}

?>
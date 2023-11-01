<?php
$con = mysqli_connect("localhost","root","","myDB");
if(!$con){
    die("Connection failed: " . mysqli_connect_error());
}

?>
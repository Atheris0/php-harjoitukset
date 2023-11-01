<?php
require_once 'db.php';

function display_data(){
    global $con;
    $query = "SELECT * FROM myGuests"; // Change the table name here
    $result = mysqli_query($con,$query);
    return $result;
}

?>
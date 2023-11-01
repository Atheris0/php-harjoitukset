<!DOCTYPE html>
<html>
<head>
    <title>Tulokset</title>
    <link rel="stylesheet" href="style.css">
    <style>
        button{
        text-transform: uppercase;
        background: #af564c;
        width: 50%;
        padding: 15px;
        color: #FFFFFF;
        cursor: pointer;
        border-radius: 5px;
        }
        button a{
        text-decoration: none;
        color: #FFFFFF;
        }
        button:hover,button:active,button:focus {
        background: #d25a22;
        }
    </style>
</head>
<body>
    <div class="login-page">
        <div class="button-wrapper">
            <p>Kiitos viestistäsi.</p>
<?php
include 'cfg.php';

$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$message = $_POST['message'];
$currentDate = date("Y-m-d");

// Insert data into the table, setting the date to the current date
$sql = "INSERT INTO MyGuests (date, firstname, lastname, email, message) VALUES ('$currentDate', '$firstname', '$lastname', '$email', '$message')";

if (mysqli_query($conn, $sql)) {
    echo "<p>Nimi: " . htmlspecialchars($firstname) . "</p>";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);
?>
            <div class="buttons">
            <button><a href="insert_lomake.html">Palaa lomakkeelle</a></button>
            <button><a href="select.php">Näytä asiakkaita</a></button>
            </div>
        </div>
    </div>
</body>
</html>
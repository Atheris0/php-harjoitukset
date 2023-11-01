<?php
include 'connect.php';
$login = $_GET['deletelog'];

// Deleting from the database
$sql = "DELETE FROM `henkilotietokanta` WHERE login = '$login'";
$result = mysqli_query($con, $sql);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($con));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Deleting Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
    <?php
    if ($result) {
        echo "Henkilön poisto onnistui";
        echo "<br><br>";
        echo '<a href="index.php" class="btn btn-primary">Palaa takaisin</a>';
    } else {
        die("Error in SQL query: " . mysqli_error($con));
    }
    ?>
    </div>
    
</body>
</html>
<?php
include 'cfg.php';
$id=$_GET['updateid'];
//selecting only the email from database
$sql = "SELECT * FROM `myguests` where id='$id'";
$result = mysqli_query($conn,$sql);
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}
$row = mysqli_fetch_assoc($result);
$email = $row['email'];
//echo $row['email'];

//button's name is update and new variable will be posted here
if(isset($_POST['update'])){
    $email = $_POST['email'];
    $sql = "update `myguests` set email='$email' where id='$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:search.php');
    } else {
        die("Error in SQL query: " . mysqli_error($conn));
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update email</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-group">
            <input type="email" name="email" class="form-control" placeholder="Enter new email" autocomplete="off"
            value=<?php echo $email?>
            >
            </div>
            <button type="submit" class="btn btn-primary my-2" name="update">Update</button>
        </form>
    </div>
</body>
</html>
<?php
include 'connect.php';

if(isset($_POST['lisaa'])){
    $login = $_POST['login'];
    $sukunimi = $_POST['sukunimi'];
    $etunimi = $_POST['etunimi'];
    $salasana = $_POST['salasana'];
    $email = $_POST['email'];
    $sql = "INSERT INTO `henkilotietokanta` (sukunimi, etunimi, email, login, salasana) VALUES ('$sukunimi','$etunimi', '$email', '$login','$salasana')";
    $result = mysqli_query($con,$sql);
    if($result){
        header('location:index.php');
    } else {
        die("Error in SQL query: " . mysqli_error($con));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Lisaa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container my-5">
        <form action="" method="post">
            <div class="form-group">
            <label class="form-label">Sukunimi</label>
            <input type="text" name="sukunimi" class="form-control" placeholder="Enter new surname" autocomplete="off">
            <label class="form-label">Etunimi</label>
            <input type="text" name="etunimi" class="form-control" placeholder="Enter new firstname" autocomplete="off">
            <label class="form-label">Sähköposti</label>
            <input type="email" name="email" class="form-control" placeholder="Enter new email" autocomplete="off">
            <label class="form-label">Login</label>
            <input type="text" name="login" class="form-control" placeholder="Enter new login" autocomplete="off">
            <label class="form-label">Salasana</label>
            <input type="text" name="salasana" class="form-control" placeholder="Enter new password" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary my-2" name="lisaa">Lisää</button>
        </form>
    </div>
</body>
</html>
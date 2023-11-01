<?php
include 'connect.php';
if(isset($_GET['updatelog'])) {
    $login = $_GET['updatelog'];
    echo "Login: $login"; // Check the value


    $sql = "SELECT * FROM `henkilotietokanta` where login = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "s", $login);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (!$result) {
        die("Error in SQL query: " . mysqli_error($con));
    }

    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $sukunimi = $row['sukunimi'];
    $etunimi = $row['etunimi'];
    $salasana = $row['salasana'];

    mysqli_stmt_close($stmt);
}

if(isset($_POST['update'])){
    $newLogin = $_POST['login'];
    $newSukunimi = $_POST['sukunimi'];
    $newEtunimi = $_POST['etunimi'];
    $newSalasana = $_POST['salasana'];
    $newEmail = $_POST['email'];

    $sql = "UPDATE `henkilotietokanta` SET sukunimi=?, etunimi=?, email=?, login=?, salasana=? WHERE login=?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, "ssssss", $newSukunimi, $newEtunimi, $newEmail, $newLogin, $newSalasana, $login);
    $result = mysqli_stmt_execute($stmt);

    if($result){
        header('location: index.php');
    } else {
        die("Error in SQL query: " . mysqli_error($con));
    }

    mysqli_stmt_close($stmt);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Muokkaus</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form action="" method="post">
            <div class="form-group">
            <label class="form-label">Sukunimi</label>
            <input type="text" name="sukunimi" class="form-control" placeholder="Enter new surname" autocomplete="off" value="<?php echo $sukunimi; ?>">
            <label class="form-label">Etunimi</label>
            <input type="text" name="etunimi" class="form-control" placeholder="Enter new firstname" autocomplete="off" value="<?php echo $etunimi; ?>">
            <label class="form-label">Sähköposti</label>
            <input type="email" name="email" class="form-control" placeholder="Enter new email" autocomplete="off" value="<?php echo $email; ?>">
            <label class="form-label">Login</label>
            <input type="text" name="login" class="form-control" placeholder="Enter new login" autocomplete="off" value="<?php echo $login; ?>">
            <label class="form-label">Salasana</label>
            <input type="text" name="salasana" class="form-control" placeholder="Enter new password" autocomplete="off" value="<?php echo $salasana; ?>">
            </div>
            <button type="submit" class="btn btn-primary my-2" name="update">Muokkaa</button>
        </form>
    </div>
</body>
</html>
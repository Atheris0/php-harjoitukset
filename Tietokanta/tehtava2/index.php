<?php
include 'connect.php';
$sql = "SELECT * FROM `henkilotietokanta`";
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
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="bg-dark">
    <div class="container">
        <div class="row mt-5">
            <div class="col">
                <div class="card mt-5">
                    <div class="card-header">
                        <h2 class="display-6 text-center">Updating and upgrading the data</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>ID</td>
                                <td>Sukunimi</td>
                                <td>Etunimi</td>
                                <td>Email</td>
                                <td>Login</td>
                                
                            </tr>
                            <tr>
                            <?php
                            while ($row = mysqli_fetch_assoc($result)) {
        
                            ?>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['sukunimi']; ?></td>
                            <td><?php echo $row['etunimi']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['login']; ?></td>
                            <td><a href="muokkaa.php?updatelog=<?php echo $row['login']; ?>" class="btn btn-info">Muokkaa</a></td>
                            <td><a href="poista.php?deletelog=<?php echo $row['login']; ?>" class="btn btn-danger">Poista</a></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                        <a href="lisaa.php" class="btn btn-primary">Lisää</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
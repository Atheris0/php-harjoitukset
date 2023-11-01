<?php
include 'connect.php';

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
                    <div class="card-body">
                        <table class="table table-bordered text-center">
                            <tr class="bg-dark text-white">
                                <td>ID</td>
                                <td>Sukunimi</td>
                                <td>Etunimi</td>
                                <td>Email</td>
                            </tr>
                            <tr>
                                <?php
                                $sql = "SELECT * FROM `henkilotietokanta` ORDER BY sukunimi";
                                $result = mysqli_query($con,$sql);
                                while($row = mysqli_fetch_assoc($result))
                                {
                                ?>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['sukunimi']; ?></td>
                                <td><?php echo $row['etunimi']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                            </tr>
                            <?php
                                }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
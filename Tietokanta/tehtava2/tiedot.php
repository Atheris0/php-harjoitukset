<?php
include 'connect.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searching data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <form action="" method="post">
            <input type="text" name="search" placeholder="Etsi henkilö">
            <button class="btn btn-dark btn-sm" name="submit">Etsi</button>
        </form>
        <div class="container my-5">
            <table class="table">
                <?php
                    if(isset($_POST['submit'])){
                        $search = $_POST['search'];
                        //searching for the name in the database
                        $sql = "SELECT * FROM `henkilotietokanta` where sukunimi='$search' or etunimi='$search'";
                        $result = mysqli_query($con,$sql);
                        if($result){
                            //if the result is greater than zero it'll display
                            if(mysqli_num_rows($result) > 0){
                                echo '<thead>
                                <tr>
                                <th>Sukunimi</th>
                                <th>Etunimi</th>
                                <th>Email</th>
                                <th>Login</th>
                                </tr>
                                </thead>
                                ';
                                //if the name matches the data will be shown
                                $row = mysqli_fetch_assoc($result);
                                echo '<tbody>
                                <tr>
                                <td>'.$row['sukunimi'].'</td>
                                <td>'.$row['etunimi'].'</td>
                                <td>'.$row['email'].'</td>
                                <td>'.$row['login'].'</td>
                                <td>
                                <a href="muokkaa.php?updatelog='.$row['login'].'" class="btn btn-info">Muokkaa</a>
                                </td>
                                </tr>
                                </tbody>
                                ';
                            } else {
                                echo '<h2 class=text-danger>Data not found</h2>';
                            }
                        }
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>
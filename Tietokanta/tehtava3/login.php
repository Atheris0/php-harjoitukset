<?php
/* Database connection
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "myDB";

// Database connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}*/
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Login</div>
                    <div class="card-body">
                        <?php
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                            $username = isset($_POST["username"]) ? $_POST["username"] : '';
                            $password = isset($_POST["password"]) ? $_POST["password"] : '';
                        
                            if (empty($username) || empty($password)) {
                                echo '<div class="alert alert-danger" role="alert">Please enter both username and password.</div>';
                            } else {
                                // Your database connection and query code here
                                $dbHost = "localhost";
                                $dbUsername = "root";
                                $dbPassword = "";
                                $dbName = "myDB";

                                // Database connection
                                $conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
                                if ($conn->connect_error) {
                                    die("Connection failed: " . $conn->connect_error);
                                }
                        
                                $query = "SELECT * FROM `henkilotietokanta` WHERE login = '$username'";
                                $result = $conn->query($query);
                        
                                if ($result->num_rows == 0) {
                                    echo '<div class="alert alert-danger" role="alert">Incorrect username.</div>';
                                } else {
                                    $user = $result->fetch_assoc();
                                    $dbPassword = $user["salasana"]; // Retrieve the hashed password from the database
                        
                                if (password_verify($password, $dbPassword) || strtolower($password) === strtolower($dbPassword)) {
                                // Password matches, successful login
                                header("Location: welcome.php?username=" . $username);
                                exit();
                                } else {
                                    echo '<div class="alert alert-danger" role="alert">Incorrect password.</div>';
                                }
                                }
                        
                                $conn->close();
                            }
                        }
                        
                        ?>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>

                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>

                            <button type="submit" class="btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

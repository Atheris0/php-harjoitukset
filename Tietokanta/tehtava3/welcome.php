<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <div class="card">
                    
                    <div class="card-body">
                        <h2>Welcome, <?php echo $_GET["username"]; ?>!</h2>
                        <p>Here's your free cookies</p>
                        <div class="card">
                        <img src="https://images.huffingtonpost.com/2016-04-15-1460758377-9211126-mmcookies415001.jpg" alt="cookies">
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php require('dbconnect.php');




?>

<!DOCTYPE html>

<head>
    <title>Login page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>

<body>
    <div class="container vh-100">
        <div class="row justify-content-center h-100">
            <div class="card w-25 my-auto shadow">
                <div class="card-header text-center">
                    <h2>Login</h2>
                </div>
                <div class="card-body">
                    <form action="Login.php" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" required />
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" required />
                        </div>
                        <input type="submit" class="btn btn-outline-warning w-100 " value="LOGIN" name=""><br><br>
                        <a href="Signup.php" class="btn btn-outline-warning w-100" role="button" aria-pressed="true">SIGN UP</a>
                    </form>
                </div>
                <div class="footer">

                </div>
            </div>
        </div>
    </div>

</body>

</html>
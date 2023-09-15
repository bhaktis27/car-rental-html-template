<?php require('dbconnect.php');
session_start();
//Registration
if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM `registered_users` WHERE `username`='$_POST[username]' OR `email`='$_POST[email]'";
    $result = mysqli_query($con, $user_exist_query);
    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['username'] == $_POST['username']) {
                echo "
                <script>
                alert('$result_fetch[username] - Username already exist');
                window.location.href='index.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('$result_fetch[email] - E-mail already exist');
                window.location.href='index.php';
                </script>
                ";
            }
        } else {
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $query = "INSERT INTO `registered_users`(`full_name`, `username`, `email`, `password`) VALUES ('$_POST[fullname]','$_POST[username]','$_POST[email]','$password')";
            if (mysqli_query($con, $query)) {
                echo "
                <script>
                alert('Registration Successfully');
                window.location.href='index.php';
                </script>
                ";
            } else {
                echo "
                <script>
                alert('Cannot Run Query');
                window.location.href='index.php';
                </script>
                ";
            }
        }
    } else {
        echo "
        <script>
        alert('Cannot Run Query');
        window.location.href='index.php';
        </script>
        ";
    }
}


//for login
if (isset($_POST['login'])) {
    $query = "SELECT * FROM `registered_users` WHERE `email`='$_POST[email_username]' OR `username`='$_POST[email_username]'";
    $result = mysqli_query($con, $query);
    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);
            if (password_verify($_POST['password'], $result_fetch['password'])) {
                $_SESSION['logged_in']=true;
                $_SESSION['username']=$result_fetch['username'];
                header("location: index.php");
            } else {
                echo "
                <script>
                alert('Incorrect Password');
                window.location.href='index.php';
                </script>
                ";
            }
        } else {
            echo "
        <script>
        alert('Email or username no registred');
        window.location.href='index.php';
        </script>
        ";
        }
    } else {
        echo "
        <script>
        alert('Cannot Run Query');
        window.location.href='index.php';
        </script>
        ";
    }
}


?>




<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Online Maid booking</title>
    <link rel="stylesheet" href="Login.css">
</head>

<body>
    <header>
        <div class="container"></div>
        <nav class="navbar sticky-top navbar-light navbar-expand-lg navbar-scrolled" style="background-color: #f7d022;">
            <a class="navbar-brand" href="#">MagicMaid</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">
                <ul class="navbar-nav mb-2 mb-lg-0">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Servies
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item text-nowrap bd-highlight" href="Services.php" style="width: 8rem;">Services<span class="badge badge-primary">All</span></a>
                            <a class="dropdown-item" href="House_maid.html">House Maid</a>
                            <a class="dropdown-item" href="Cooking_maid.html">Cooking Maid</a>
                            <a class="dropdown-item" href="Baby_sitters.html">Baby Caretaker</a>
                            <a class="dropdown-item" href="#">Elderly & Parent Care</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="AboutUs.html">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact Us</a>
                    </li>


                </ul>
            </div>
            <?php

            if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true)
            {
                echo "<span style='text-transform:uppercase;'>WELCOME $_SESSION[username] &nbsp; </span> <a href='Logout.php' class='btn btn-dark' tabindex='-1' role='button' aria-disabled='true'>LOGOUT</a>";
            }
            else
            {
                echo "
                <div class='sign-in-up'>
                    <button type='button' onclick=\"popup('login-popup')\">LOGIN</button>
                    <button type='button' onclick=\"popup('register-popup')\">REGISTER</button>
                </div>";
            }

            ?>
        </nav>

        <div class="popup-container" id="login-popup">
            <div class="popup">
                <form method="POST" action="index.php">
                    <h2>
                        <span>USER LOGIN</span>
                        <button type="reset" onclick="popup('login-popup')">X</button>
                    </h2>
                    <input type="text" placeholder="E-mail or Username" name="email_username">
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit" class="login-btn" name="login">LOGIN</button>
                </form>
            </div>
        </div>
        <div class="popup-container" id="register-popup">
            <div class="register popup">
                <form method="POST" action="index.php">
                    <h2>
                        <span>USER REGISTER</span>
                        <button type="reset" onclick="popup('register-popup')">X</button>
                    </h2>
                    <input type="text" placeholder="Full Name" name="fullname">
                    <input type="text" placeholder="Username" name="username">
                    <input type="email" placeholder="E-mail" name="email">
                    <input type="password" placeholder="Password" name="password">
                    <button type="submit" class="register-btn" name="register">REGISTER</button>
                </form>
            </div>
        </div>
    </header>
    <div class="content text-center m-0">
        <div>
            <p class="content1"><span style="color: #f7d022;"><b>Best</b></span> Maid <span style="color:skyblue;">Booking</span>Platform</span> </p>
        </div>
    </div>
    <div id="banner" class="container">
        <h2 class="heading">India's <span class="highlight">Trusted</span> Home Makers</h2>
        <span>
            <div class="card w-50" style="max-width: 350px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="All-Rounder.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">All-Rounder</h5>
                            <p class="card-text">Choose a combination of cooking, baby care, odd jobs, cleaning,
                                etc!
                            </p>
                            <a href="#" class="card-link">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </span>
        <span>
            <div class="card1 w-50" style="max-width: 350px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="Baby-Sitters.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Baby-Sitters</h5>
                            <p class="card-text">Experienced babysitters and japa for all your child-care needs!
                            </p>
                            <a href="Baby_sitters.html" class="card-link">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </span>
        <span>
            <div class="card2 w-50" style="max-width: 350px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="Cook.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Cooking Maid</h5>
                            <p class="card-text">Choose between basic home-style or fancy cooking at affordable
                                rates!
                            </p>
                            <a href="Cooking_maid.html" class="card-link">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </span>
        <span>
            <div class="card3 w-50" style="max-width: 350px;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="House-Maid.jpg" class="img-fluid rounded-start" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">House-Maid</h5>
                            <p class="card-text">Trained, punctual & verified housekeepers for everyday home
                                cleaning!
                            </p>
                            <a href="House_maid.html" class="card-link">See more</a>
                        </div>
                    </div>
                </div>
            </div>
        </span>
        <p class="description"><span id="">MagicMaid is the simplest way to get your life in order with
                the</span><span id="newline"> right domestic help</span></p>
        <a href="Services.php" class="btn btn-dark" role="button">BOOK NOW</a>
        <br>
        <br>
    </div>
    <div class="why_choose_us">
        <h2 class="h">Why Choose us</h2>
        <div class="card-group">
            <div class="card5" style="width: 18rem;">
                <img src="Tranned.jpg" class="card-img-top" alt="...">
                <div class="card-body-5">
                    <h5 class="card-title-5">Trained and Reliable</h5>
                    <p class="card-text-5">We’re not an agency, but a young startup run by a passionate group of
                        professionals. We train our workers at certified training centers.</p>
                </div>
            </div>
            <div class="card6" style="width: 18rem;">
                <img src="Pricing.jpg" class="card-img-top" alt="...">
                <div class="card-body-6">
                    <br>
                    <br>
                    <br>
                    <br>
                    <h5 class="card-title-5">Transparent Pricing</h5>
                    <p class="card-text-5">You get what you pay for. Additionally, you get replacement guarantee,
                        Covid-19 test reports, verification documents and more!</p>
                </div>
            </div>
            <div class="card7" style="width: 18rem;">
                <img src="Support.jpg" class="card-img-top" alt="...">
                <div class="card-body-7">
                    <h5 class="card-title-5">Customer Support</h5>
                    <p class="card-text-5">Our executives will always be there to hear you out and solve your issues
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="feedback">
        <br><br>
        <p>"I have been using HomeMaid Connect for more than<br> a year now and have never been disappointed.
            The<br>
            platform
            is easy-to-use and connects me with<br> professional and trustworthy homemakers who<br> provide quality
            services."<br>
            <span class="User">Rekha Joshi</span>
        </p><br><br>
    </div>
    <div id="footer" class="container6">
        <footer class="socialmedia">
            <a href="https://www.instagram.com/" target="_blank">
                <ion-icon name="logo-instagram"></ion-icon>
            </a>
            <a href="https://twitter.com/" target="_blank">
                <ion-icon name="logo-twitter"></ion-icon>
            </a></span>
            <a href="https://www.facebook.com/" target="_blank">
                <ion-icon name="logo-facebook"></ion-icon>
            </a>
            <a href="https://www.youtube.com/" target="_blank">
                <ion-icon name="logo-youtube"></ion-icon>
            </a><br>
            <a href="tel:9325823612">
                +91 9325823612
            </a>

            <p class="rights">&copy; 2023 All rights reserved</p>
        </footer>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function popup(popup_name) {
            get_popup = document.getElementById(popup_name);
            if (get_popup.style.display == "flex") {
                get_popup.style.display = "none";
            } else {
                get_popup.style.display = "flex";
            }
        }
    </script>



</body>

</html>
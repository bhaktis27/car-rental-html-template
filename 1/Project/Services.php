<?php require('dbconnect.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Services</title>
    <link rel="stylesheet" href="Services.css">
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
    <div class="services">
        <h2 class="h1"><span>Services</span></h2>
    </div>
    <div class="card-group">
        <div class="card1 bg-light mb-3" style="width: 18rem;">
            <img src="Baby Caretaker_Services.png" class="card-img-top" alt="...">
            <div class="card-body-5">
                <h5 class="card-title-5">Baby Caretaker</h5>
                <p class="card-text-5">The baby caretaker we provided on MaidMaster are responsible for taking care of
                    infants and toddlers, including feeding, bathing, and changing diapers. They ensure the safety and
                    well-being of the child while providing a nurturing and stimulating environment.</p><br>
                    <a class="btn btn-outline-warning" href="Baby_sitters.html" role="button">Book Now</a>
            </div>
        </div>
        <div class="card2 bg-light mb-3" style="width: 18rem;">
            <img src="Cook_services.png" class="card-img-top" alt="...">
            <div class="card-body-6">
                <h5 class="card-title-5">Cooking Maid</h5>
                <p class="card-text-5">The cook we provide on MaidMaster is responsible for preparing meals according to
                    the preferences and dietary requirements of the household. They ensure that the kitchen is clean and
                    hygienic and may also be responsible for grocery shopping and menu planning.</p>
                    <a class="btn btn-outline-warning" href="Cooking_maid.html" role="button">Book Now</a>
            </div>
        </div>
        <div class="card3 bg-light mb-3" style="width: 18rem;">
            <img src="House_maid_Services.png" class="card-img-top" alt="...">
            <div class="card-body-6">
                <h5 class="card-title-5">House Maid</h5>
                <p class="card-text-5">The housemaid we provided on MaidMaster is responsible for general housekeeping
                    duties, including cleaning, laundry, and organizing. They ensure that the house is clean and tidy
                    and may also assist with meal preparation and other household tasks as needed.</p><br>
                    <a class="btn btn-outline-warning" href="House_maid.html" role="button">Book Now</a>
            </div>
        </div>
        <div class="card4 bg-light mb-3" style="width: 18rem;">
            <img src="Domestic_helper_services.jpg" class="card-img-top" alt="...">
            <div class="card-body-6">
                <h5 class="card-title-5">Domestic Helper</h5>
                <p class="card-text-5">The domestic helper we provided on MaidMaster is a multi-skilled worker
                    responsible for a wide range of household tasks, including cleaning, cooking, laundry, and
                    childcare. They provide flexible support for the household's day-to-day needs and may also assist
                    with errands and shopping.</p>
                    <a class="btn btn-outline-warning" href="#" role="button">Book Now</a>
            </div>
        </div>
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
                    <p class="card-text-5">Our executives will always be there to hear you out and solve your issues</p>
                </div>
            </div>
        </div>
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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx"
        crossorigin="anonymous"></script>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
        function popup(popup_name) 
        {
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
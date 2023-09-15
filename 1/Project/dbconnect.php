<?php
    $server = "localhost";
    $username= "root";
    $password ="";
    $database = "project";

    $con = mysqli_connect($server,$username,$password,$database);
    if($con)
    {
        echo "";
    }
    else
    {
        die("Error".mysqli_connect_errno());
    }
?>
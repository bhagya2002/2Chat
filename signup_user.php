<?php
include("include/connection.php")

if(isset($_POST['sign_up'])) {
    $name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
    $country = htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
    $gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
    $rand = rand(1,2);

    if($name =='') {
        echo"<scipt>alert('We can not verify your name')</script>";
    }
    if(strlen($pass) < 8) {
        echo"<scipt>alert('Password should be a minimum 8 characters!')</script>";
        exit();
    }

    $check_email = "SELECT * from users where user_email = '$email'";
    $run_email = mysqli_query($con, $check_email);

    $check = mysqli_num_rows($run_email);

    if($check == 1) {
        echo"<scipt>alert('Email already exists, please try again!')</script>";
        echo"<scipt>window.open('signup.php', '_self')</script>";
        exit();
    }

    if ($rand == 1)
}
?>
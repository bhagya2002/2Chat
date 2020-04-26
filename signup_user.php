<?php
// Starts session
session_start();

// connects to the database
include("include/connection.php");

// get information and run when the submit button is clicked
if(isset($_POST['sign_up'])) {
    // get values and make sure it is safe
    $name = htmlentities(mysqli_real_escape_string($con, $_POST['user_name']));
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['user_pass']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['user_email']));
    $country = htmlentities(mysqli_real_escape_string($con, $_POST['user_country']));
    $gender = htmlentities(mysqli_real_escape_string($con, $_POST['user_gender']));
    $rand = rand(1,2);

    // run form validation
    if($name =='') {
        echo"<scipt>alert('We can not verify your name')</script>";
    }
    if(strlen($pass) < 8) {
        echo"<script>alert('Password should be a minimum 8 characters!')</script>";
        exit();
    }

      // first sql query to check if a user exists when a specific email and password combination is entered
    $check_email = "SELECT * from users where user_email = '$email'";
    // this is used to run the search 
    $run_email = mysqli_query($con, $check_email);
// data returned with a user with the same information
    $check = mysqli_num_rows($run_email);

    // if a user exists execute this code
    if($check == 1) {
        echo"<scipt>alert('Email already exists, please try again!')</script>";
        echo"<scipt>window.open('index.php', '_self')</script>";
        exit();
    }

    // choose a random profile picture for the user
    if ($rand == 1)
        $profile_pic = "images/avatar1.png";
     else if ($rand == 2) 
        $profile_pic = "images/avatar2.png";

        // insert into the database
        $sql = "INSERT into users(user_name, user_pass, user_email, user_profile, user_country, user_gender) VALUES('$name', '$pass', '$email', '$profile_pic', '$country', '$gender')";
// query that data
        $query = mysqli_query($con, $sql);

        // once it runs successfully then execute this
        if ($query) {
            echo "<script>alert('Congratulations $name, your account has been created successfully')</script>";
            echo "<script>window.open('signin.php', '_self')</script>";
        } // if not run this
        else {
            echo "<script>alert('Registration failed, try again!')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
?>
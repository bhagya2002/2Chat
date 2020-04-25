<?php
// Starts session
session_start();

// connects to the database
include("include/connection.php");

// get information and run when the submit button is clicked
if (isset($_POST['sign_in'])) {
    // get values and make sure it is safe
    $pass = htmlentities(mysqli_real_escape_string($con, $_POST['pass']));
    $email = htmlentities(mysqli_real_escape_string($con, $_POST['email']));

    // first sql query to check if a user exists when a specific email and password combination is entered
    $select_user = "SELECT * from users WHERE user_email = '$email' AND user_pass = '$pass'";
// this is used to run the search 
$query = mysqli_query($con, $select_user);
// data returned with a user with the same information
$check_user = mysqli_num_rows($query);

// if a user exists execute this code
if($check_user == 1) {
    // storing a $_SESSION variable in $email
    $_SESSION['user_email'] = $email;

    // update user infomraiont and change them to online status
    $update_msg = mysqli_query($con, "UPDATE users SET log_in='Online' WHERE user_email='$email'");

    // stores email $_SESSION in another variable
    $user = $_SESSION['user_email'];
    // get the specific user
    $get_user = "SELECT * FROM users where user_email = '$user'";
    // run this query search
    $run_user = mysqli_query($con, $get_user);
    // data returned in an array
    $row = mysqli_fetch_array($run_user);

    // select data from returned array
    $user_name = $row['user_name'];

    // run this code after to redirect user
    echo"<script>window.open('home.php?user_name=$user_name', '_self')</script>";
} else {
    // run this when the data is INCORRECT
    echo"

<div class='alert alert-danger'>
<strong>Check your email and password.</strong>
</div>

    ";
}
}

?>
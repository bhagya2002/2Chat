<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to MyChat</title>
    <!-- jQuery JS file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- bootstrap CSS file -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- bootstrap JS file -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container main-section">
        <div class="row">
            <div class="col-md col-sm-3 col-xs-12 left-sidebar">
                <div class="input-group searchbox">
                    <div class="input-group-btn">
                        <center>
                            <a href="include/find_friends.php">
                                <button class="btn btn-default search-icon" name="search_user" type="submit">Add new
                                    user</button>
                            </a>
                        </center>
                    </div>
                </div>
                <div class="left-chat">
                    <ul>
                        <?php include("include/get_user_data.php") ?>
                    </ul>
                </div>
            </div>
            <div class="col-md-9 col-sm-9 col-xs-12 right-sidebar">
                <div class="row">
                    <!-- getting the user that is logged in -->
                    <?php
                    $user = $_SESSION['user_email'];
                    $get_user = "SELECT * from users where user_email = '$user'";
                    $run_user = mysqli_query($con, $get_user);
                    $row = mysqli_fetch_array($run_user);

                    $user_id = $row['user_id'];
                    $user_name  =$row['user_name'];
                    ?>

                    <!-- getting the user data on which the user clicked -->
                    <?php
if (isset($_GET['user_name'])) {
    
    global $con;

    $get_username = $_GET['user_name'];
    $get_user = "SELECT * from users where user_name = '$get_username'";

    $run_user = mysqli_query($con, $get_user);

    $row_user =  mysqli_fetch_array($run_user);

    $username = $row_user['user_name'];
    $user_profile_image = $row_user['user_profile'];
}

$total_messages = "SELECT * from users_chat where (sender_username='$user_name' AND reveiver_username='$username') OR (reveiver_username ='$user_name' AND sender_user = '$username')";

$run_messages = mysqli_query($con, $total_messages);
$total = mysqli_num_rows($run_messages);
                    ?>
                    <div class="col-md-12 right-header">
                        <div class="right-header-img">
                            <img scr="<?php echo "user_profile_image"; ?>">
                        </div>
                        <div class="right-header-detail">
                            <form action="#" method="post">
                                <p>
                                    <?php echo "$username"; ?></p>
                                <span>
                                    <?php echo $total; ?> messages
                                </span>&nbsp; &nbsp;
                                <button name="logout" class="btn btn-danger">Logout</button>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </div>

</html>
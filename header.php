<!-- nav bar  -->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <a href="#" class="navbar-brand">
            <?php

// sessions to store info
$user = $_SESSION['user_email'];

// search query to get info on user
$get_user = "SELECT * from users where user_email='$user'"; 
$run_user = mysqli_query($con,$get_user);
$row=mysqli_fetch_array($run_user);

// returned info
$user_name = $row['user_name'];

// this makes the link directly for the specific user
echo" <a class='navbar-brand' href='home.php?user_name=$user_name'>MyChat</a>";
            ?>
        </a>

        <!-- settings nav bar -->
        <ul class="navbar-nav">
            <li><a style="color: white; text-decoration: none; font-size: 20px;"
                    href="account_settings.php">Settings</a></li>
        </ul>
    </nav><br>
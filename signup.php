<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create an Account</title>
    <!-- jQuery JS file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- bootstrap CSS file -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- bootstrap JS file -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Courgette|Pacifico|Roboto:400,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/signup.css">
</head>

<body>
    <!-- sign in form -->
    <div class="signup-form">

        <!-- form -->
        <form action="" method="post">
            <!-- entire header -->
            <div class="form-header">
                <!-- sign in title -->
                <h2>Sign Up</h2>
                <!-- description for page -->
                <p>Fill this form out and start chatting with your friends.</p>
            </div>

            <!-- username input -->
            <div class="form-group">
                <label for="user_name">Username</label>
                <input type="text" name="user_name" class="form-control" placeholder="John_Doe" autocomplete="off"
                    required>
            </div>
            <!-- password input -->
            <div class="form-group">
                <label for="user_pass">Password</label>
                <input type="password" name="user_pass" class="form-control" placeholder="Password" autocomplete="off"
                    required>
            </div>
            <!-- email input -->
            <div class="form-group">
                <label for="user_email">Email Address</label>
                <input type="email" name="user_email" class="form-control" placeholder="JohnDoe@email.com"
                    autocomplete="off" required>
            </div>
            <!-- country -->
            <div class="form-group">
                <label for="user_country">Country</label>
                <select name="user_country" class="form-control" required>
                    <option disabled>Select a Country</option>
                    <option>USA</option>
                    <option>Canada</option>
                    <option>India</option>
                    <option>Autralia</option>
                    <option>UK</option>
                    <option>Other</option>
                </select>
            </div>
            <!-- country -->
            <div class="form-group">
                <label for="user_gender">Gender</label>
                <select name="user_gender" class="form-control" required>
                    <option disabled>Select your Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                </select>
            </div>
            <!-- terms and conditions -->
            <div class="form-group">
                <label class="checkbox-inline"><input type="checkbox" required>I accept the <a href="#"> Terms of
                        Use </a>&amp; <a href="#">Privacy Policy</a></label>
            </div>

            <!-- submit form -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_up">Sign up</button>
            </div>
            <?php include("signup_user.php"); ?>
        </form>

        <!-- no account? make one -->
        <div class="text-center small" style="color: black;">Alrady have an account? <a href="index.php">Signin
                here</a></div>
    </div>

</body>

</html>
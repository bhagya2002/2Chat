<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyChat</title>
    <!-- jQuery JS file -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- bootstrap CSS file -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- bootstrap JS file -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Courgette|Pacifico|Roboto:400,700&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="css/signin.css">
</head>

<body>
    <!-- sign in form -->
    <div class="signin-form">

        <!-- form -->
        <form action="" method="post">
            <!-- entire header -->
            <div class="form-header">
                <!-- sign in title -->
                <h2>Sign in</h2>
                <!-- description for page -->
                <p>Login to MyChat</p>
            </div>

            <!-- email input -->
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" placeholder="JohnDoe@email.com" autocomplete="off"
                    required>
            </div>
            <!-- password input -->
            <div class="form-group">
                <label for="pass">Password</label>
                <input type="password" name="pass" class="form-control" placeholder="password" autocomplete="off"
                    required>
            </div>
            <!-- forgot my password help -->
            <div class="small">Forgot password? <a href="forgot_pass.php">Click here</a>
            </div>
            <!-- break -->
            <br>

            <!-- submit form -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-lg" name="sign_in">Sign in</button>
            </div>
            <!-- this PHP is run -->
            <!-- I WANT TO MAKE THIS MORE EFFICIENT. LOOK AT THE WBSITE CODE!!! -->
            <?php include("index_user.php"); ?>
        </form>

        <!-- no account? make one -->
        <div class="text-center small" style="color: black;">Don't have an account? <a href="signup.php"> Create
                one</a></div>
    </div>

</body>

</html>
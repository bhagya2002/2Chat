<!DOCTYPE html>
<?php
// session starts
session_start();

// include files
include("include/connection.php");
include("header.php");
?>
<?php 
// is the user is not logged in or signed out then redirect
if(!isset($_SESSION['user_email'])){
  
  header("location: index.php");

}
else { ?>
<html>
<head>
	<title>Change Profile Picture</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<style type="text/css">
.card {
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
	max-width: 400px;
	margin: auto;
	text-align: center;
	font-family: arial;
}
.card img{
	height: 200px;
}

.title {
	color: grey;
	font-size: 18px;
}

button {
	border: none;
	outline: 0;
	display: inline-block;
	padding: 9px;
	color: white;
	background-color: #000;
	text-align: center;
	cursor: pointer;
	width: 100%;
	font-size: 18px;
}
#update_profile{
	position: absolute;
	cursor: pointer;
	padding: 10px;
	border-radius: 4px;
	color: white;
	background-color: #000;

}
label{
    padding: 7px;
    display: table;
    color: #fff;
}
input[type="file"] {
    display: none;
}
</style>
<body>
	<?php
	// stores sessions variable
	  $user = $_SESSION['user_email'];
	//   query for a USER
      $get_user = "SELECT * from users where user_email='$user'"; 
      $run_user = mysqli_query($con,$get_user);
      $row=mysqli_fetch_array($run_user);
			
	//   get the user's name and profile picture from the query
      $user_name = $row['user_name'];
	  $user_profile = $row['user_profile'];
	//   user card
	// shows the user profile picture along with the user's name
// an input field to insert a file is present hence the presense of "enctype='multipart/form-data'" in the form 
// a button is present to submit the update request 

      echo"
		<div class='card'>
			<img src='$user_profile'>
			<h1>$user_name</h1>
			<form method='post' enctype='multipart/form-data'>
			<label id='update_profile'><i class='fa fa-user-circle-o' aria-hidden='true'></i> Select Profile
            <input type='file' name='u_image' size='60' />
            </label>
            <button id='button_profile' name='update'>&nbsp; &nbsp; &nbsp;<i class='fa fa-heart' aria-hidden='true'></i> Update Profile</button>
			</form>
		</div><br><br>
		";
	?>

  	<?php 
// this runs when the update button is pressed
        if(isset($_POST['update'])){

			// $_FILES['where the file is being uploaded(the name of the input)']['temp name']
          $u_image = $_FILES['u_image']['name'];
		  $image_tmp = $_FILES['u_image']['tmp_name'];
		//   to avoid getting the same name
          $random_number = rand(1,100);

		//   if the input field is left empty then run this...
          if($u_image==''){
            echo "<script>alert('Please Select Profile')</script>";
            echo "<script>window.open('upload.php','_self')</script>";
            exit();
          }else{
		  
			// move the newly uploaded file to a folder
			// (the file to move, where the file needs to be moved and wht its called)
          move_uploaded_file($image_tmp,"images/$u_image.$random_number");

        //   update the database for the profile
          $update = "UPDATE users set user_profile='images/$u_image.$random_number' where user_email='$user'";
        //   update the database
          $run = mysqli_query($con,$update); 
		  
		//   if it is valid and the update is successful then run this...
          if($run){
        //   let the user know the profile has been updated
          echo "<script>alert('Your Profile Updated!')</script>";
          echo "<script>window.open('upload.php','_self')</script>";
          }
        }
        }
      ?>
</body>
</html>
<?php } ?>
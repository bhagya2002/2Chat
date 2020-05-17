<?php
// connect to database
$con = mysqli_connect('localhost', 'bhagya', 'test1234', 'mychat');

// query user
	$user = "SELECT * from users";
			
	// get info
	$run_user = mysqli_query($con,$user);
			
	// while there is info do this..
	while ($row_user=mysqli_fetch_array($run_user)){
			// get the users data from database 
	$user_id = $row_user['user_id'];
	$user_name = $row_user['user_name'];
	$user_profile = $row_user['user_profile'];
	$login = $row_user['log_in'];
	// display the users information in a user card
	// the profile picture of the user along with the name
	// then check is the user is online or offline and display that data
	echo"
	<li>
		<div class='chat-left-img'>
			<img src='$user_profile'>
		</div>
		<div class='chat-left-detail'>
			<p><a href='home.php?user_name=$user_name'>$user_name</a></p>";
			if($login == 'Online'){
			echo "<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
			}else{
			echo "<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
			}
			"
		</div>
	</li>

	";
	}
?>			
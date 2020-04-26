<?php
// Starts session
session_start();
// connect to database
$con = mysqli_connect('localhost', 'bhagya', 'test1234', 'mychat');

$run_user = mysqli_query($con, $user);

while ($row_user = mysqli_fetch_array($run_user)) {
    $user_id = $run_user['user_id'];
    $user_name = $run_user['user_name'];
    $user_profile = $run_user['user_profile'];
    $login = $run_user['log_in'];

    echo"
<li>
<div class='chat-left-img'>
<img scr='$user_profile'>
</div>
<div class='chat-left-details'>
<p>
<a href='home.php?user_name = $user_name'></a></p>";
if($login == "Online") {
    echo"<span><i class='fa fa-circle' aria-hidden='true'></i> Online</span>";
} else {
    echo"<span><i class='fa fa-circle-o' aria-hidden='true'></i> Offline</span>";
}
"
</div>
</li>

";
}

?>
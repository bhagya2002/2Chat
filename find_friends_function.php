<?php
// connect to database
$con = mysqli_connect('localhost', 'bhagya', 'test1234', 'mychat');

// check connection 
if (!$con) {
    // if the conncetion fails to conenct to the server
    echo 'Connection error: ' . mysqli_connect_error();
}
function search_user() {
    // variables
    global $con;

    if(isset($_GET['search_btn'])) {
        $search_qurey = htmlentities($_GET['search_query']);
        $get_user = "SELECT * from users where user_name like '%$search_qurey%' or user_country like '%$search_qurey%'";
    }else {
        $get_user = "SELECT * from users order by user_country, user_name DESC LIMIT 5";
    }
    $run_user = mysqli_qurey($con, $get_user);

    while($row = mysqli_fetch_array($un_user)) {
        $user_name = $row['user_name'];
        $user_profile = $row['user_profile'];
        $user_country = $row['user_country'];
        $user_gender = $row['user_gender'];
    }
}

?>
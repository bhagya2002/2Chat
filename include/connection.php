<?php
// connect to database
$con = mysqli_connect('localhost', 'bhagya', 'test1234', 'todolist');

// check connection 
if (!$con) {
    // if the conncetion fails to conenct to the server
    echo 'Connection error: ' . mysqli_connect_error();
}

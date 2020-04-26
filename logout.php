<?php
// sessions start and end
session_start();
session_destroy();

// redirect
header("Location: index.php");
?>
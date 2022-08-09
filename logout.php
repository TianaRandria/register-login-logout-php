<?php   
session_destroy(); //destroy the session
setcookie('username', '');
header('location: /index.php'); //to redirect back to "index.php" after logging out
exit();

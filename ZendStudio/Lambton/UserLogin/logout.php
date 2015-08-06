<?php
//Use session_start() to create a session
session_start();

session_destroy();

echo " You have been logged out Successfully".'<br>';
echo '<a href="index.php">'."Go back to log in page" .'</a>';
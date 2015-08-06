<?php

session_start();
if(!empty($_SESSION['user'])){
session_destroy();
//unset($_SESSION['user']);
echo 'You have been logged out';
header('location:..//Project/login.php?logout=You have successfully loged out');
}
else {
    include ('templates/head.php');
    include('templates/nav.php');
    echo '<div class="error">It\'s too funny, while looking for Log Out before Logging In! And at the same time i knew it is also  funny from my side that i\'m showing a Log Out option before Logging In!</div>';
    include('templates/foot.php');
}
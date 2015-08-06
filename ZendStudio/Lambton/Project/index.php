<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

include('navigation/script.php');
include('navigation/header.php');
//include('navigation/listofcars.php');
//include('navigation/contactus.php');
//include('navigation/signup.php');
include("navigation/$page.php");
//include("navigation/home.php");
//include('navigation/bookacar.php');

include('navigation/footer.php');
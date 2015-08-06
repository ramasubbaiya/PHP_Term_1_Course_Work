<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

include('Navigation/header.php');

include('Navigation/nav.php');

include("Navigation/$page.php");

include('Navigation/footer.php');
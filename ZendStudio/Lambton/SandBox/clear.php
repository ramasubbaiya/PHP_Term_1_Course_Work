<?php
session_start();
if($_GET['do']=='clear'){
session_destroy();
unset($_SESSION['note']);
}
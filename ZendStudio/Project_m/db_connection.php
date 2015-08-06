<?php
$conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");

if(mysqli_connect_errno()){
    echo "The following error number occured".mysqli_connect_error();
    exit();
} #else
    #echo'Succeded';
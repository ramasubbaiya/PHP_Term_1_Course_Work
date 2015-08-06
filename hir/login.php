<?php

session_start();

$msg = "";
if (isset($_POST)) {
    $connection = mysqli_connect("127.0.0.1", "PHP00", "PHP00", "PHP00");
  
    if (mysqli_connect_errno($connection)) {
        die("Error:" . mysql_error());
    }
    $userName = mysqli_real_escape_string($connection, $_POST['username']);
    $password = mysqli_real_escape_string($connection, $_POST['passwd']);

    $query = "select * from user where username='{$userName}' and passwd='{$password}'";
    $result = mysqli_query($connection, $query);
    
    if ($result) {
        $row = mysqli_fetch_array($result);
        if ($row > 0) {
                                 
            $_SESSION['login'] = $row['username'];
            header("location:index.php");
        }
        else {
       
        echo "Invalid username or password";
        }
    
    } 
    
   
}
?>
<?php
//Use session_start() to create a session
session_start();


//Connect to the MySQL server using mysqli_connect() with error checking
$conn = mysqli_connect("127.0.0.1", "PHP02", "PHP02", "PHP02");


// error checking
if (mysqli_connect_errno()) {
    printf("Connect failed :%s\n", mysqli_connect_error());
    exit();
} else {
    echo "Connected to DB" . '<br>';
}




if (isset($_POST['login'])) {

    // Use mysqli_escape_string() to sanitize the username, password, and email
    $username = mysqli_escape_string($conn, $_POST['username']);
    $passwd = mysqli_escape_string($conn, $_POST['passwd']);
    //$email = mysqli_escape_string($conn, $_POST['email']);
    //$confirmpasswd = mysqli_escape_string($conn, $_POST['confirmPasswd']);
}

//Create an SQL statement to SELECT the username and email matching the passwd AND username
//$query1 = "SELECT * FROM users.username AND users.email WHERE username='$username' AND passwd='$passwd' ";
$query1 = "SELECT username,email FROM users WHERE username='$username' AND passwd='$passwd' ";
$result1 = mysqli_query($conn, $query1);

//Use mysqli_fetch_array() to retrieve the row from the result

//$_SESSION['user']=array();
//$user['username']=array();
if(mysqli_fetch_array($result1)){
    $_SESSION['user']=$_POST['username'];
    header('location:index1.php');
}
else{
    echo "Username or Password Incorrect";
    
}
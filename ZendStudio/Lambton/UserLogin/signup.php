
<?php

// Connect to the MySQL server using mysqli_connect() with error checking
$conn = mysqli_connect("127.0.0.1", "PHP02", "PHP02", "PHP02");

// error checking
if (mysqli_connect_errno()) {
    printf("Connect failed :%s\n", mysqli_connect_error());
    exit();
} else {
    echo "Connected to DB" . '<br>';
}

// Retrieve the username, email, passwd, and confirmPasswd from the $_POST array
$uName = $_POST['username'];
$pWord = $_POST['passwd'];
$mail = $_POST['email'];
$conPsWord = $_POST['confirmPasswd'];

if (isset($_POST['submit'])) {
    
    // Use mysqli_escape_string() to sanitize the username, password, and email
    $username = mysqli_escape_string($conn, $_POST['username']);
    $passwd = mysqli_escape_string($conn, $_POST['passwd']);
    $email = mysqli_escape_string($conn, $_POST['email']);
    $confirmpasswd = mysqli_escape_string($conn, $_POST['confirmPasswd']);
}

// Create an SQL statement to SELECT rows matching the email OR username
$query1 = "SELECT * FROM users WHERE username='$username' OR email='$email' ";
$result1 = mysqli_query($conn, $query1);

$numOfRows = mysqli_num_rows($result1);
if ($numOfRows > 0) {
    echo "Username already exists" . '<br>';
}

$len = strlen($passwd);

if((($passwd != $confirmpasswd) || ($len < 6)) && ($numOfRows == 0) ){
    
    echo "Password mismatch or less than 6 Characters ";
}

// Verify that the user's password matches and least 6 characters long
if (($passwd == $confirmpasswd) && ($len >= 6) && ($numOfRows == 0)) {
    $query = "INSERT INTO users(username,passwd,email) VALUES('$username','$passwd','$email')";
    $result = mysqli_query($conn, $query);
    echo "Your account has been created!!";
} else {
    
    ?>
<html>
<head></head>
<body>

	<a href="index.php "><b><?php echo"Try Again!"; ?></b></a>
</body>
</html>
<?php
}

?>



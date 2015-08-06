<?php
// $mysql=mysqli_connect('127.0.0.1','PHP02','PHP02','PHP02');
session_start();
if (isset($_GET['do'])) {
    if ($_GET['do'] === 'clear') {
        session_destroy();
        unset($_SESSION['notes']);
    }
}
?>
<!DOCTYPE>
<html>
<head>
</head>
<body>

<form method="post" action="index.php">
		Name <input type="text" name="name"> Add Note <input type="text"
			name="note"> <input type="submit" name="submit">
	</form>
	<a href="index.php?do=clear"> Clear </a><br/>
<?php

if (isset($_POST['submit'])) {
    if (isset($_POST['name'])) {
        if (strlen($_POST['name']) < 3 || strlen($_POST['note']) < 3) {
            // echo"hi";
            echo "<p style='color:red'><strong>ERROR!!!</strong>Please enter more than 3 character</p>";
        } 
            else if(isset($_SESSION['notes'])){
            
                $_SESSION['notes'][] = array(
                    'name' => $_POST['name'],
                    'note' => $_POST['note']
                );
        } 
        else  if(!isset($_SESSION['notes'])){
            $_SESSION['notes'] = array();
            $_SESSION['notes'][] = array(
                'name' => $_POST['name'],
                'note' => $_POST['note']
            );
        }
       }
        
    }

if (isset($_SESSION['notes'])) {
    foreach ($_SESSION['notes'] as $n) {
        echo "Name :" . $n['name'] . "Note :" . $n['note'] . '<br>';
    }
}
?>





</body>
</html>
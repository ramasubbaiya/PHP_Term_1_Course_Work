<?php
session_start();
$conn=mysqli_connect('127.0.0.1', 'PHP20', 'PHP20', 'PHP20');
echo $_SESSION['user'].' is the user who have logged in';
$query2="SELECT username FROM p_users";
$result_1=mysqli_query($conn, $query2);



echo '<form action="" method="post">';
echo '<select name="user">';
echo '<option value="">Choose a user</option>';
while($resu=mysqli_fetch_assoc($result_1)){

echo '<option value=\"$resu[\'username\']"> $resu[\'username\']</option>';
echo "</select>";
}

echo '<input type="text" name="message" /><br>';

echo '<input type="submit" value="send"/>';


echo '</form>';

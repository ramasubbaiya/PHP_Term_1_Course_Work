<?php
$conn=mysqli_connect('127.0.01','PHP02','PHP02','PHP02');

$query= "   SELECT * FROM users";

$result=mysqli_query($conn,$query);
$row = mysqli_fetch_array($result);
do{
    
    echo "Username :".$row['username']."<br>Password :".$row['passwd'].'<br> Email :' . $row['email'] .'<br><br>';
    
    
}while($row);
mysqli_close($conn);

?>
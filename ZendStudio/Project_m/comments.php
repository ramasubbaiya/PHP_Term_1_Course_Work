<?php
session_start();
if(isset ($doctor['doctorname'])){
    $doctorname=$doctor['doctorname'];
    $displayquery="SELECT username,comments FROM p_comments_ratings WHERE doctorname='$doctorname'";
    $conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
    $rows=mysqli_query($conn, $displayquery);
    while($array=mysqli_fetch_assoc($rows)){
        echo  '<h3>'.$rows['username'].'</h3>';
        echo '<p>'.$rows['comments'].'</p>';       
    }
}


<?php  include ('templates/head.php');
include('templates/nav.php');
session_start();
if(!empty($_SESSION['user'])){
echo $_SESSION['user'].' have logged in';
// echo $row_count;
//echo $_SESSION['user'].' is the user';
$displayquery="SELECT *
                    FROM p_articles
                    WHERE CONVERT( dateupdated, DATE ) = CONVERT( current_date, DATE )";
#echo 'Hi';
$conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
$result2=mysqli_query($conn, $displayquery);
echo '<div id="leftside">';
while ($display=mysqli_fetch_assoc($result2)){

    echo '<h3>Title of the Article: '.$display['title'].'</h3>';
    echo '<p>'.$display['article'].'</p>';
    echo '<p>The article posted by Dr.'.$display['username'];
    echo 'at '.$display['dateupdated'].'</p>';
}
echo '</div>';
//Administrator Page


}
else 
    echo  '<div class="error">Please Log In!</div>';
include('templates/foot.php');
//http://174.79.32.158:10088/students/PHP20/Project/addingarticle.php
?>


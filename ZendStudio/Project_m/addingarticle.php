<?php 
include ('templates/head.php');
include('templates/nav.php');
session_start();
$user=$_SESSION['user'];
$conn=mysqli_connect('127.0.0.1', 'PHP20', 'PHP20', 'PHP20');
$checkquery="SELECT affiliation FROM p_users WHERE username='$user'";
$result=mysqli_query($conn,$checkquery);
$row=mysql_fetch_assoc($result,MYSQLI_ASSOC);
#PRINT_R($row);
echo $row[0];
    if($row[0]='Administrator'){
       
echo $_SESSION['user'];

echo '<h2 >Adding Article </h2>';
echo '<form action="addingarticle.php" method="post">';
echo '<label for="title">Title:</label>';
echo '<input type="text" name="title" id="title" required /><br>';
echo '<label for="message">Article:</label>';
echo '<textarea cols="40" rows="5" name="message" id="message" required></textarea><br>';

echo '<input type="submit" name="submit" value="Post" id="button"/>';
echo '</form>';
 
if(isset($_POST['submit'])){
    $conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
    $title=mysqli_escape_string($conn, $_POST['title']);
    $article=mysqli_escape_string($conn,$_POST['message']);
    $username=$_SESSION['user'];
    echo $title.$article.$username;
    
    $query="INSERT INTO p_articles (title,article,username)
            VALUES('$title','$article','$username')";
    mysqli_query($conn, $query);
}
   }else 
         echo '<div class="error">Please Log In as Admin!</div>';
    
    include('templates/foot.php');
?>
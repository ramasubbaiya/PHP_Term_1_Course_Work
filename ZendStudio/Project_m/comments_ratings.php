<?php
include ('templates/head.php');
include('templates/nav.php');

session_start();
if(!empty($_SESSION['user'])){


try {
    $conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
    #echo  'Hi';
} catch (PDOException $e) {
    print "Error!". $e->getMessage()."<br>";
    die();
}

#print_r($_POST);

$query="SELECT * FROM p_doctors";
$result=mysqli_query($conn, $query);

echo '<div style="display: block">';
    
  echo   '<h3>Please post ur Reviews and rate the Doctors, which will help us to improve the quality</h3>';
    
echo '</div>';

while($doctor=mysqli_fetch_assoc($result)){
echo '<form action="" method="post">';
    echo '<div style="display: block">';
    echo '<div style="display: inline-block; width: 140px;"><input type="hidden" value="';
    echo $doctor['departmentname'];
    echo '" name="Department" /><a href="">'.$doctor['departmentname'].'</a></div>';
    echo '<div style="display: inline-block; width: 140px;"><input type="hidden" value="';
    echo $doctor['doctorname'];
    echo '" name="doctorname" /><a href="http://174.79.32.158:10088/students/PHP20/Project/comments.php">'.$doctor['doctorname'].'</a></div>';
    echo '<div style="display: inline-block; width: 240px;">'.'<input type="text" name="comments" placeholder="Place ur comments here" id="comments"/>'.'</div>';
    echo '<div style="display: inline-block; width: 140px;">'.'<input type="number" name="Rating" min="1" max="5" value="1"/>'.'</div>';
    echo '<div style="display: inline-block; width: 140px;">'.'<input type="submit" name="submit" value="submit" required/>'.'</div>';
    echo '</div>';
echo '</form>';
}
if(isset($_POST['submit'])){
    $department=$_POST['Department'];
    #echo $department;
    $doctorname=$_POST['doctorname'];
    #echo $doctorname;
    $comments=$_POST['comments'];

    $Rating=$_POST['Rating'];

    $username=$_SESSION['user'];
     

    $query=" INSERT INTO p_comments_ratings VALUES ('$department','$doctorname','$comments','$Rating','$username',NULL) ";
    $result=mysqli_query($conn,$query);
    //$result1=mysqli_query($conn,"SELECT * FROM  p_comments_ratings");
    //print_r($result1);
    #echo 'Last';
    if($result)
        echo'<div class="error">Your reviews have been submitted. Thanks for your support</div>';
}






 
if(isset($_POST['submit'])){
    echo $doctor['Doctor'];
}

}else
    echo '<div class="error">Please Log In!</div>';
include('templates/foot.php');
    ?>
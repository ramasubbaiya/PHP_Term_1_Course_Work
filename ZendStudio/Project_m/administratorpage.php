
<?php
include ('templates/head.php');
include('templates/nav.php');
session_start();
echo '<form action="administratorpage.php" method="post" enctype="multipart/form-data"/>';
echo 'To change the Logo of the website add the title as "Logo"<br>';
echo 'Title';
echo '<input type="text" name="title" /><br>';
echo 'Choose an Image ';
echo '<input type="file" name="file" /><br>';
echo '<input type="submit" value="upload"/>';
echo '</form>';


if(isset($_FILES['file'])){
    $title=$_POST['title'];
    $name=$_FILES['file']['name'];
    $tmp_name=$_FILES['file']['tmp_name'];
    $type=$_FILES['file']['type'];
    $size=$_FILES['file']['size'];
    $destination='templates/logo/'.$name;
    $des1='logo/'.$name;
    echo $destination;

    echo $title.'<br>';
    echo $name.'<br>';
    echo $tmp_name.'<br>';
    echo $type.'<br>';
    echo $size.'<br>';
    if(move_uploaded_file($tmp_name, $destination)){
        $user=$_SESSION['user'];

        $query="INSERT INTO p_images (imagename,imagelocation,user)
        VALUES('$title','$destination','$user')";
        mysqli_query($conn,$query);
        echo 'File is uploaded';
    }else
        echo 'File is not uploaded due to some fucking reasons';

}
include('templates/foot.php');

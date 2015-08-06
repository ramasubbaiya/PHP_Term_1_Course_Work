<?php
include ('templates/head.php');
include('templates/nav.php');
session_start();
if(!empty($_SESSION['user'])){
try {
    $conn=mysqli_connect('127.0.0.1', 'PHP20', 'PHP20', 'PHP20');
    #echo 'Hi';
} catch (Exception $e) {
    echo $e->getMessage();
}




echo '<form action="uploadfile.php" method="post" enctype="multipart/form-data">';



echo '<input type="file" name="file" /><br>';

echo '<input type="submit" name="submit" value="Upload">';
echo '</form>';


echo '<br><br><br><br>';
echo '<a href="http://174.79.32.158:10088/students/PHP20/Project/addingarticle.php">Adding An Article</a>';
echo '<br><br><br><br>';
echo '<a href="http://174.79.32.158:10088/students/PHP20/Project/administratorpage.php">Adding An Image</a>';
echo '<br><br><br><br>';



if(isset($_FILES['file'])){
    $file=$_FILES['file'];
    //print_r($file);
   $file_name=$file['name'];
   $file_type=$file['type'];
   $file_size=$file['size'];
   $file_location=$file['tmp_name'];
   $file_error=$file['error'];
   #echo $file_name.$file_type." with ".$file_size." size have been uploaded in ".$file_location;

   $file_extension=explode('.', $file_name);
   //print_r($file_extension);
   $file_extension=end($file_extension);
   $not_allowed=array('php','html','css');
   
   if(!(in_array($file_extension, $not_allowed))){
       if($file_error===0){
           $file_destination='uploadedfiles/'.$file_name;
           if(move_uploaded_file($file_location , $file_destination)){
               echo '<div class="error">Your file have been uploaded in the following location '.$file_destination.'</div>';
           }
       }
   } else 
       echo '<div class="error">These type of files are not allowed to upload</div>';
   
   
}
echo '</body>';

}else 
    echo '<div class="error">Please Log In!</div>';
include('templates/foot.php');
?>
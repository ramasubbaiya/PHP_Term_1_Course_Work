<?php

//Connect to the MySQL server using mysqli_connect() with error checking
$conn = mysqli_connect("127.0.0.1", "PHP02", "PHP02", "PHP02");

session_start();
// error checking
if (mysqli_connect_errno()) {
    printf("Connect failed :%s\n", mysqli_connect_error());
    exit();
} else {
    
}
$_SESSION['user']="bayb";

if(isset($_SESSION['user'])){
    $user=$_SESSION['user'];
}else{
    
    echo"Please login";
}

?>
<form method="post" action="">
<label>Add Note</label>
<input type="text" name="addnote">
<input type="submit" value="Submit" name="submit">
</form>
<?php 
if(isset($_POST['submit'])){
    $addnote=$_POST['addnote'];
    
    /* $query = "INSERT INTO user(user_name,notes) VALUES('$user','$addnote') ";
    
    $result=mysqli_query($conn, $query); */
    
    $query1 = "SELECT * from notes_table WHERE username='bayb' ";
    
    $result1=mysqli_query($conn, $query1);
    if($result1){
    
    while($row=mysqli_fetch_assoc($result1)){
        echo'<pre>';
        print_r($row);
        echo'</pre>';
    }
    }
    
}
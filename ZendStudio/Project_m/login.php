<?php  include ('templates/head.php');
include('templates/nav.php');?>
<h2 >Log In</h2>
<form action="" method="post">
<label for="email">E-mail:</label>
<input type="email" name="email" id="email" required/><br>
<label for="passwd">Password:</label>
<input type="password" name="passwd" id="passwd"   required/><br>
<!-- <input type="submit" name="passwdcheck" value="Password Strngth"/> -->
<input type="submit" name="submit" value="submit"  id="button"/>
</form>
</body>
</html>

<?php 
session_start();
$msg="";
if(isset($_GET['logout']))
{
   $msg=$_GET['logout']; 
   echo $msg;
}




if(isset($_POST['submit'])){
    $conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
    $email=mysqli_escape_string($conn, $_POST['email']);
    $passwd=mysqli_escape_string($conn,$_POST['passwd']);
    $query="SELECT username FROM p_users WHERE emailid='$email' and password='$passwd' ";
    $result1=mysqli_query($conn, $query);
    //PRINT_R($result1);
    
   $row_count=mysqli_num_rows($result1);
    
   // PRINT_R($row_count);
    
    //echo $row_count;
        if(($row_count)!=0){
            $query1="SELECT username FROM p_users WHERE emailid='$email' and password='$passwd' ";
            $result=mysqli_query($conn, $query1);
    
            #echo"hi";
            $array_result = mysqli_fetch_array($result,MYSQLI_ASSOC);
            #echo"hi";
            #print_r($array_result);
            $_SESSION['user']=$array_result['username'];
            #session_start();
            echo $_SESSION['user'].' have logged in';
            
                 
            }else 
            echo '<div class="error">Username Or Password is Invalid</div>';
    
    }
    include('templates/foot.php');
?>
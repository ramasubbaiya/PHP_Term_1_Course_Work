<html><head></head>
<body>
<?php
session_start();
if(isset($_SESSION['access'])){
    $_SESSION['access'][]=time();
}else{
      $_SESSION['access']=array(time());
      
  }
  foreach($_SESSION['access'] as $v){
        echo "Session time".$v.'<br>';
  }
  echo "My session id ". session_id().'</br>';
  echo "Count ".count($_SESSION['access']).'<br>';
  ?>
  <a href='clear_access.php'>Clear Acess</a>
</body>
 </html>
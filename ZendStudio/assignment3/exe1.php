<?php
include "pizza.php";
echo"<h1>Ramasubbaiya's Pizza Generator</h1>";
echo"Order from one these fine establishments<br><br>";
foreach($places as $k)
{
   echo 'NAME  : '.$k['name'].'<br>';
   echo 'PHONE  : '.$k['phone'].'<br>';
   if($k['url'])
  echo 'WebSite : '.'<a href="">'.$k['url'].'</a><br><br>';
  else
       echo"WebSite : N/A<br><br>";
   
}
?>
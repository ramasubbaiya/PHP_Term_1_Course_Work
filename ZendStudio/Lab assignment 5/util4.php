<?php
function loadComments()
{
    $array=array();
    
    $file=glob("*.comment");
   foreach($file as $k=>$v)
    $array[]=explode('|',file_get_contents($v));
    //foreach($load as $x=>$y)
       // foreach($array as $x=>$y)
  //  $load[$x]=explode("|",$array[$y]);
   // print_r($load);
print_r ($array);        
     return $array;
}loadComments();
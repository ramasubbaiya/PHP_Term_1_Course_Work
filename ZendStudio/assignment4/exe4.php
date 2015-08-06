<?php
include"exe3.php";
function outputComment($array){
     
    echo 'Name: '.$array['name'].'<br>';
    echo 'Comment: '.$array['comment'].'<br>';
    echo 'Time: '.timeAgo($array['time']).' ago'.'<br>'.'<br>';
    
    
}
//outputComment($output);

?>
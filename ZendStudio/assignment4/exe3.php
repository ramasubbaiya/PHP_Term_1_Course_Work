<?php
include"exe2.php";
function createComment($name,$comment,$time){
     
    $result=array(
        'name'=>$name,
        'comment'=>$comment,
        'time'=>$time

    );
    return $result;
}



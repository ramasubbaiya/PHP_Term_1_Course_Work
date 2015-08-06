<?php
include"exe3.php";
function outputComment($output){
     
    $arr=createComment('Ram','Awesome Program!','6:30');
    echo 'Name : '.$arr[0].'<br>';
    echo 'Comment : '.$arr[1].'<br>';
    echo 'Time : '.$arr[2].'<br>';
}
outputComment($output);

$time1 = new time('07:08:00');
$time2 = new time();
$interval = $time1->diff($time2);
echo $interval->format('%R%a days');
?>
<?php

function timeAgo($time){
    
    $curtime = time();

    $timediff = $curtime - $time;


   
    return $timediff;
}
$totaltimedifference= timeAgo((strtotime('01-01-2015 04:30:00 PM')));

if(($totaltimedifference/(3600*24))>1)

    echo intval(($totaltimedifference/(3600*24))).'days';

else if(($totaltimedifference/(3600))>1)

    echo intval(($totaltimedifference/(3600))).'minutes';
else
    echo intval((($totaltimedifference/60))).'seconds';


?>
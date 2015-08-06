<?php
include"exe1.php";
function timeAgo($time){
    
    $curtime = time();

    $timediff = $curtime - $time;


   


/*  $totaltimedifference= timeAgo((strtotime('01-01-2015 04:30:00 PM')));

if(($totaltimedifference/(3600*24))>1)

    echo intval(($totaltimedifference/(3600*24))).' days ago';

else if(($totaltimedifference/(3600))>1)

    echo intval(($totaltimedifference/(3600))).' minutes ago';
else
    echo intval((($totaltimedifference/60))).' seconds ago';  */

if(($timediff/(3600*24))>1)

$totaltimediff= intval(($timediff/(3600*24))).' days';

else if(($timediff/(3600))>1)

$totaltimediff= intval(($timediff/(3600))).' minutes';
else if(($timediff/(60))>1)

$totaltimediff= intval((($timediff/60))).' seconds';

return $totaltimediff;
}
$actualtimedifference= timeAgo((strtotime('04-01-2014 08:30:55 AM')));

echo $actualtimedifference;


?>
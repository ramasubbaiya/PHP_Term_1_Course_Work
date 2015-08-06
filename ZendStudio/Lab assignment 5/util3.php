<?php
function timeAgo($time)
{
     

    $get_time = time() - $time;

    if( $get_time < 1 )
    {
        return 'less than 1 second ago';
    }

    $condition = array(
        12 * 30 * 24 * 60 * 60  =>  'year',
        30 * 24 * 60 * 60       =>  'month',
        24 * 60 * 60            =>  'day',
        60 * 60                 =>  'hour',
        60                      =>  'minute',
        1                       =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $get_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return 'about ' . $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}
function saveComment($name,$comment,$times)
{
   $string=$name.'|'.$comment.'|'.$times; 
   $file="$times.comment";
   file_put_contents($file, $string);
   
}
saveComment('Ram', 'Awesome Program!', strtotime('04-08-2015 06:30'));
saveComment('Carom',  'Awesome Program!', strtotime('12-11-2015 04:25'));
saveComment('Edwin',  'Awesome Program!', strtotime('08-09-2015 05:50'));


function outputComment(array $comment1)
{
    printLine("Name: " . $comment1[0]);
    printLine("Comment: " . $comment1[1]);
    printLine("Time: " . $comment1[2]);
    $stars="***********************";
    printLine($stars);

    echo "Name: ".  $comment1[0].'<br>';

    echo "comment: ".  $comment1[1].'<br>';

    echo "time: ".  $comment1[2].'<br>';
    echo "****************************<br>";
}
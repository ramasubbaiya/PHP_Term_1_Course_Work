<?php
include 'util.php';

saveComment("Rama", 'Awesome Program!', strtotime('2015/08/05 06:40:00'));
saveComment("Leo", 'Awesome Program!', strtotime('2012/12/11 07:50:00'));
saveComment("Matt", 'Awesome Program!', strtotime('2010/11/12 08:35:00'));
saveComment("Nike", 'Awesome Program!', strtotime('2012/06/05 09:25:00'));

//echo $saveComment();

$comments = loadComment();

foreach($comments as $key=> $val)
{
outputComment($val);


}
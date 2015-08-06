<?php
include('exe4.php');
displayHeader('Heading h1','Sub Heading h2');
$comment=array([0],[1],[2],[3]);
$comment[0]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('30-07-2014 06:30:55 AM')));
$comment[1]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('04-03-2014 06:30:55 PM')));
$comment[2]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('23-12-2014 06:30:55 AM')));
$comment[3]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('07-04-2010 06:30:55 PM')));
foreach ($comment as $k=>$v) {
    outputComment($v).'<br>';
}?>
<?php

$myfile='web.txt';
$data="'hare','rama','hare','rama'";
file_put_contents($myfile,$data,FILE_APPEND);
?>
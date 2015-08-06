<?php


function printLine($line)
{
    $file= fopen('all_lines.txt', 'a+');
    date_default_timezone_set('UTC');
    $dateline= date("Y-m-d h:i:sa"). ": $line"."\r\n ";
    fputs($file, $dateline);
   // $stars= "************************************************\r\n";
   // fputs($file, $stars);
    fclose($file);
}
 
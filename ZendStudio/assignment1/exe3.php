<?php 
function formatstatus($status){
    $valid_values=getstatuscodes();
    if (in_array(strtlower($status),$valid_values))
    {
       return strtolower($status);}
       return false;}
?>
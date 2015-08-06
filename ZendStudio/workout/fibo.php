<?php
//echo"Enter the number to get no. of fibonacci series";

function fibo($num){
$num1=0;
$num2=1;
if($num==0)
   return 0;
if($num==1)
    echo"$num2";
for($i=0;$i<=$num;$i++)
{
$sum=$num1+$num2;
$num1=$num2;
$num2=$sum;
echo$sum.'</br>';}
}

echo fibo(6);
?>
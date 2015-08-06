<?php
include"exe1.php";
$no_of_toppings=rand(3,9);

$pizza=array('toppings'=>array());
$random_toppings=array_rand($toppings,$no_of_toppings);
echo"<pre>";
print_r($pizza);
echo"</pre>";
foreach($random_toppings as $x=>$y)
{
    $pizza['toppings'][]=$toppings[$y];
  
}

$pizza['size']=$sizes[rand(0,count($sizes)-1)];

echo"<pre>";
print_r($pizza);
echo"</pre>";
?>
<?php
include 'exe3.php';
foreach ($random_toppings as $key=>$val){
    for($i=0;$i<=count($random_toppings);$i++)
    {
        $k=$pizza['toppings'][$i];
        if($val==$k){
            echo $val.'<br>';
            break;
        }else 
            if($i==$random_toppings){
            echo"<strike>".$val.'</strike>'.'<br>';
        }
    }
}
echo'<h3>Your pizza is ready </h3>';
echo"Your pizza size is \n   ".$pizza['size']."  \n and the number of toppings are\n  ".count($random_toppings).'<br>';

if($pizza['price']<10){
    echo " This is not eligible for delivery".'<br>';
    $tax=$pizza['price']*0.13;
    $total=$pizza['price']+$tax;
    echo ' Your pizza subtotal is '.$pizza['price'].'and tax is '.$tax.'and total amount due is '.$total;
    
}else if($pizza['price']>25){
    echo " This pizza is qualify for delivery".'<br>';
    $tax=$pizza['price']*0.13;
    $total=$pizza['price']+$tax;
    echo ' Your pizza subtotal is '.$pizza['price'].'and tax is '.$tax.'and total amount due is '.$total;
    
}else{
    $ext=3;
    $subtotal=$pizza['price']+$ext;
    $tax = $subtotal*0.13;
    $total = $subtotal+$tax;
    echo'Your pizza subtotal is '.$subtotal.'and tax is '.$tax.'and total is '.$total;
}
?>
<?php
include"exe2.php";
switch($pizza['size']){
    case"personal":
        $pizza['price'] = 5+ 0.75 * count ($pizza['toppings']);
        break;
        echo'<br>';
   case"small":
        $pizza['price'] = 9+ 0.75 * count ($pizza['toppings']);
        break;
        echo'<br>';
   case"medium":
        $pizza['price'] = 11+ 1.00 * count ($pizza['toppings']);
        break;
        echo'<br>';
   case"large":
        $pizza['price'] = 14+ 1.50 * count ($pizza['toppings']);
        break;
        echo'<br>';
   case"extra large":
        $pizza['price'] = 16+ 1.50 * count ($pizza['toppings']);
        break;        
        echo'<br>';
   default: 
       echo"Select your favourite Pizza";
}

echo"<pre>";
print_r($pizza);
echo"</pre>";
?>
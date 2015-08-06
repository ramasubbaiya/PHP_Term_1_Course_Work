<?php

    $shopping_cart = array('SKU'=>array(
    '10200' => array(
        'item_price' => 7.99,
        'quantity' => 4,
       ),
        '29305' => array(
            'item_price' => 29.99,
            'quantity' => 2,
        ),
        '13402'=>array(
            'item_price' => 14.39,
            'quantity' =>1,
        )));
    echo 'Total of SKU "10200": '.$shopping_cart['SKU']['10200']['Total']=$shopping_cart['SKU']['10200']['item_price'] * $shopping_cart['SKU']['10200']['quantity'].'<br>';
    echo 'Total of SKU "29305": '.$shopping_cart['SKU']['29305']['Total']=$shopping_cart['SKU']['29305']['item_price'] * $shopping_cart['SKU']['29305']['quantity'].'<br>';
    echo 'Total of SKU "13402": '.$shopping_cart['SKU']['13402']['Total']=$shopping_cart['SKU']['13402']['item_price'] * $shopping_cart['SKU']['13402']['quantity'].'<br>';
  
?>
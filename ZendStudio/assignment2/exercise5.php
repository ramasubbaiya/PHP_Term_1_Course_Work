<?php
include "exercise2.php";
include "exercise4.php";
foreach($planets as $k=>$v){
    echo 'Name :'.$k.'<br>';
    echo 'Mass :'.$v['mass'].'<br>';
    echo 'Radius :'.$v['radius'].'<br>'.'<br>';
    ;
}
    
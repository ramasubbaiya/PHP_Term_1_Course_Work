<?php
include "exercise1.php";
include "exercise4.php";

foreach($planets As $k=>$v){
   $val=( (au*$v['distance'])*pow(10,7) );
  echo  'Distance_in_km :'.$val.'<br>';
}
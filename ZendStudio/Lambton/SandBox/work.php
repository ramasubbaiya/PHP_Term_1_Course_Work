<?php
/*
$EnteredValue="123";
if(is_numeric($EnteredValue)){
    $NumericValue=$EnteredValue;
    echo is_numeric($EnteredValue).'<br>';
}
else{
   $NumericValue=intval($EnteredValue);
   echo 'hi'.intval($EnteredValue).'<br>';
    
}


echo $EnteredValue;

$round=297;

echo 'Rounded value '.round($round).'<br>';

echo 'Remainder'.$round%2 .'<br>';


$string = "i like to program in PHP".'<br>';
$a = strtoupper($string);
$b = strtolower($string);
$c = ucfirst($string);
$d = ucwords($string);
$e = ucwords(strtolower($string));


echo  "Str to upr  ".$a.'<br>';

echo  "Str to lower  ".$b.'<br>';

echo  "ucfirst  ".$c.'<br>';

echo  "ucwords  ".$d.'<br>';

echo  "ucwords to str to lower ".$e.'<br>';

echo "Trim  ".trim($string);

*/
$notes=array();

function notes_func(){

    
    $notes=array(
        "0"=>array(
    "Name"=>"ram",
    "Age"=>12,
    "Add"=>"125 coll ave"
    ),
        "1"=>array(
            "Name"=>"rama",
            "Age"=>12,
            "Add"=>"125 coll ave"
        )
        
    );
    
    return $notes;
    
    
}


function get_notes(){
    $no = notes_func();
    
    echo'<pre>'.$no;
    foreach($no as $not){
        //echo "Name ".$not['Name']."<br>";
        echo $not['Name'];
    }
   
}

get_notes();



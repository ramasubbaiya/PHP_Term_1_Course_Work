<?php
//function basics

function getSortBy($sort)
switch($sort) {
    case'date':
        $orderby='order_date';
        break;
    case'status':
         $orderby='order_status';
         break;
    case'amount':
         $orderby='amount';
         break;
    case'customer':
         $orderby='last_name';
         break;
    default:
        $orderby='id';
}


//fibonacci series";

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

//include file
include 'filename.php';


//file basics
$myfile='web.txt';
$data="'hare','rama','hare','rama'";
file_put_contents($myfile,$data,FILE_APPEND);

//********************
//assignment  No.2
//********************

//define
define("au","1.496");
$astronomical_unit=au;

//array -0
$planets = array(
    'Mercury',
    'Venus',
    'Earth',
    'Mars',
    'jupiter',
    'Saturn',
    'Uranus',
    'Neptune',
    'Pluto'
);
foreach ($planets as $k=> $v)
    echo "$v<br>";
	
//array-1
$planets = array(
    'Mercury' => array(
        'mass' => 3.303,
        'radius' => 2439,
        'distance' => 1.429
    ),
    'Venus' => array(
        'mass' => 4.870,
        'radius' => 6050,
        'distance' => 0.277
    ),
    'Earth' => array(
        'mass' => 5.976,
        'radius' => 6378,
        'distance' => 0
    ),
    'Mars' => array(
        'mass' => 6.418,
        'radius' => 3397,
        'distance' => 1.354
    ),
    'Jupiter' => array(
        'mass' => 1.899,
        'radius' => 7140,
        'distance' => 4.212
    ),
    'Saturn' => array(
        'mass' => 5.686,
        'radius' => 6000,
        'distance' => 10.468
    ),
    'Uranus' => array(
        'mass' => 8.66,
        'radius' => 2615,
        'distance' => 20.060
    ),
    'Neptune' => array(
        'mass' => 1.030,
        'radius' => 243,
        'distance' => 30.576
    ),
    'Pluto' => array(
        'mass' => 1.0,
        'radius' => 12,
        'distance' => 33.555
    )
);

//array-2

foreach($planets as $k=>$v){
    echo 'Name :'.$k.'<br>';
    echo 'Mass :'.$v['mass'].'<br>';
    echo 'Radius :'.$v['radius'].'<br>'.'<br>';
    ;
}

//array-3
foreach($planets As $k=>$v){
   $val=( (au*$v['distance'])*pow(10,7) );
  echo  'Distance_in_km :'.$val.'<br>';
}

//array -4 multi dimension array
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

//****************
//assignment No. 3 - PIZZA
//*************	
$places = array(
    array(
        "name" => "Giresi's Pizza",
        "phone" => "519-336-1415",
        "url" => "http://www.giresispizza.com"
    ),
    array(
        "name" => "Firenze's Pizza",
        "phone" => "519-337-7546",
        "url" => "http://www.firenzespizza.com"
    ),
    array(
        "name" => "Kenny's Pizza",
        "phone" => "519-344-1100",
        "url" => ""
    ),
    array(
        "name" => "Italia Pizza",
        "phone" => "519-332-0081",
        "url" => "http://www.italiapizza.ca"
    ),
    array(
        "name" => "Napoli Pizza",
        "phone" => "519-542-1491",
        "url" => "http://www.napolipizza.com"
    )
);


$toppings = array(
    "pepperoni",
    "ham",
    "bacon",
    "chicken",
    "ground beef",
    "italian sausage",
    "mushrooms",
    "extra cheese",
    "green olives",
    "black olives",
    "onions",
    "green peppers",
    "pineapple",
    "anchovies"
);

$sizes = array(
    "personal",
    "small",
    "medium",
    "large",
    "extra large"
);

//display array
echo"<h1>Ramasubbaiya's Pizza Generator</h1>";
echo"Order from one these fine establishments<br><br>";
foreach($places as $k)
{
   echo 'NAME  : '.$k['name'].'<br>';
   echo 'PHONE  : '.$k['phone'].'<br>';
   if($k['url'])
  echo 'WebSite : '.'<a href="">'.$k['url'].'</a><br><br>';
  else
       echo"WebSite : N/A<br><br>";
   
}

//random

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

//array calculation

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
//pizza size
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
//************************
//Assignmnet 4 - Function
//***********************

//function -calling

function printLine($head){ 
   
    echo $head.'<br>';
   
}

printline('I am a printline statement');

function displayHeader($head,$subhead){
    echo '<h1>'.$head.'</h1>';
    echo '<h2>'.$subhead.'</h2>';
}
displayHeader('Heading h1','Sub Heading h2');

//time function

function timeAgo($time){
    
    $curtime = time();

    $timediff = $curtime - $time;


   


/*  $totaltimedifference= timeAgo((strtotime('01-01-2015 04:30:00 PM')));

if(($totaltimedifference/(3600*24))>1)

    echo intval(($totaltimedifference/(3600*24))).' days ago';

else if(($totaltimedifference/(3600))>1)

    echo intval(($totaltimedifference/(3600))).' minutes ago';
else
    echo intval((($totaltimedifference/60))).' seconds ago';  */

if(($timediff/(3600*24))>1)

$totaltimediff= intval(($timediff/(3600*24))).' days';

else if(($timediff/(3600))>1)

$totaltimediff= intval(($timediff/(3600))).' minutes';
else if(($timediff/(60))>1)

$totaltimediff= intval((($timediff/60))).' seconds';

return $totaltimediff;
}
$actualtimedifference= timeAgo((strtotime('04-01-2014 08:30:55 AM')));

echo $actualtimedifference;

//function - createComment assign array

function createComment($name,$comment,$time){
     
    $result=array(
        'name'=>$name,
        'comment'=>$comment,
        'time'=>$time

    );
    return $result;
}

//outputComment- display array

function outputComment($array){
     
    echo 'Name: '.$array['name'].'<br>';
    echo 'Comment: '.$array['comment'].'<br>';
    echo 'Time: '.timeAgo($array['time']).' ago'.'<br>'.'<br>';
    
    
}

//array - enter values

displayHeader('Heading h1','Sub Heading h2');
$comment=array([0],[1],[2],[3]);
$comment[0]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('30-07-2014 06:30:55 AM')));
$comment[1]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('04-03-2014 06:30:55 PM')));
$comment[2]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('23-12-2014 06:30:55 AM')));
$comment[3]=createComment('Ramasubbaiya', 'Awesome Program!', (strtotime('07-04-2010 06:30:55 PM')));
foreach ($comment as $k=>$v) {
    outputComment($v).'<br>';
	
//********************
//Assignment -5 Files
//********************

function printLine($line)
{
    $file= fopen('all_lines.txt', 'a+');
    $dateline= date("Y-m-d G:i:s"). ": $line"."\n ";
    fputs($file, $dateline);
    fclose($file);
}


function displayHeader($heading1, $heading2)
{
    $file=fopen('title.txt', 'a+');
    $str=$heading1."\n".$heading2;
    fputs($file, $str);
    fclose($file);
     
}
echo displayHeader("Main h1 heading","Sub h2 heading");

//time function
function timeAgo($time)
{
     

    $get_time = time() - $time;

    if( $get_time < 1 )
    {
        return 'in seconds';
    }

    $condition = array(
        12 * 30 * 24 * 60 * 60  =>  'year',
        30 * 24 * 60 * 60 =>  'month',
        24 * 60 * 60  =>  'day',
        60 * 60  =>  'hour',
        60 =>  'minute',
        1 =>  'second'
    );

    foreach( $condition as $secs => $str )
    {
        $d = $get_time / $secs;

        if( $d >= 1 )
        {
            $r = round( $d );
            return  $r . ' ' . $str . ( $r > 1 ? 's' : '' ) . ' ago';
        }
    }
}


function loadComment()
{
    $arraycomment = array();
    $commentfiles=glob("*.comment");  //get all comment files

    foreach($commentfiles as $k)
    {
        $arraycomment[] = explode('|', file_get_contents($k)); //separate the files "|"
         
    }
    return $arraycomment;
    var_dump($arraycomment);
}





//function save comment
function saveComment($name,$hour,$mycomment)
{
    $atime=timeAgo($hour);

    $putComment= $name.' | '.$mycomment.' | '.$atime;
    $filename=$hour.".comment";

    file_put_contents($filename, $putComment);

}

//Comment file created - IN connection with loadComment

saveComment("Rama", 'Awesome Program!', strtotime('2015/08/05 06:40:00'));
saveComment("Leo", 'Awesome Program!', strtotime('2012/12/11 07:50:00'));
saveComment("Matt", 'Awesome Program!', strtotime('2010/11/12 08:35:00'));
saveComment("Nike", 'Awesome Program!', strtotime('2012/06/05 09:25:00'));

//echo $saveComment();

$comments = loadComment();

foreach($comments as $key=> $val)
{
outputComment($val);
}

//output the comment 

function outputComment(array $getComment)
{
    printLine("Name: " . $getComment[0]);    
    printLine("Time: " . $getComment[1]);
    printLine("Comment: " . $getComment[2]);

 //   printLine($stars);

    echo "Name: ".  $getComment[0].'<br>';  
    echo "comment: ".  $getComment[1].'<br>';    
    echo "time: ".  $getComment[2].'<br>';
    
    echo "**********************************".'<br>';
    

}


//*************************
//******************************

//time and date
date_default_timezone_set("America/New_York");
echo "The time is " . date("h:i:sa");

//today dateecho "Today is " . date("Y/m/d") . "<br>";
echo "Today is " . date("Y.m.d") . "<br>";
echo "Today is " . date("Y-m-d") . "<br>";
echo "Today is " . date("l");

//date uder defined
$d=mktime(11, 14, 54, 8, 12, 2014);
echo "Created date is " . date("Y-m-d h:i:sa", $d);

//string to time
strtotime(time,now)

$d=strtotime("10:30pm April 15 2014");
echo "Created date is " . date("Y-m-d h:i:sa", $d);

$d=strtotime("tomorrow");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("next Saturday");
echo date("Y-m-d h:i:sa", $d) . "<br>";

$d=strtotime("+3 Months");
echo date("Y-m-d h:i:sa", $d) . "<br>";


//multidimensional array
$cars = array
  (
  array("Volvo",22,18),
  array("BMW",15,13),
  array("Saab",5,2),
  array("Land Rover",17,15)
  );
  
echo $cars[0][0].": In stock: ".$cars[0][1].", sold: ".$cars[0][2].".<br>";
echo $cars[1][0].": In stock: ".$cars[1][1].", sold: ".$cars[1][2].".<br>";
echo $cars[2][0].": In stock: ".$cars[2][1].", sold: ".$cars[2][2].".<br>";
echo $cars[3][0].": In stock: ".$cars[3][1].", sold: ".$cars[3][2].".<br>";

//with for loop
for ($row = 0; $row <  4; $row++) {
   echo "<p><b>Row number $row</b></p>";
   echo "<ul>";
   for ($col = 0; $col <  3; $col++) {
     echo "<li>".$cars[$row][$col]."</li>";
   }
   echo "</ul>";
}

//file handling

//file read
echo readfile("webdictionary.txt");

//file open
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("webdictionary.txt"));
fclose($myfile);

//read single line

echo fgets($myfile);

//end of file
$myfile = fopen("webdictionary.txt", "r") or die("Unable to open file!");
// Output one line until end-of-file
while(!feof($myfile)) {
  echo fgets($myfile) . "<br>";
}

//read single char_from_digit reads char by char
while(!feof($myfile)) {
  echo fgetc($myfile);
}

//write into file
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "John Doe\n";
fwrite($myfile, $txt);
$txt = "Jane Doe\n";
fwrite($myfile, $txt);
fclose($myfile);

//file overwriting
$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
$txt = "Mickey Mouse\n";
fwrite($myfile, $txt);
$txt = "Minnie Mouse\n";
fwrite($myfile, $txt);
fclose($myfile);


//preg_match

// define variables and set to empty values
$nameErr = $emailErr = $genderErr = $websiteErr = "";
$name = $email = $gender = $comment = $website = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["name"])) {
    $nameErr = "Name is required";
  } else {
    $name = test_input($_POST["name"]);
    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
      $nameErr = "Only letters and white space allowed"; 
    }
  }

  if (empty($_POST["email"])) {
    $emailErr = "Email is required";
  } else {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "Invalid email format"; 
    }
  }

  if (empty($_POST["website"])) {
    $website = "";
  } else {
    $website = test_input($_POST["website"]);
    // check if URL address syntax is valid (this regular expression also allows dashes in the URL)
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
      $websiteErr = "Invalid URL"; 
    }
  }

  if (empty($_POST["comment"])) {
    $comment = "";
  } else {
    $comment = test_input($_POST["comment"]);
  }

  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}
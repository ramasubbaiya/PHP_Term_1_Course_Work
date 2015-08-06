<?php
include'moviedb.php';
function displayMovie($movie){
   // foreach($movie as $k=>$v)
    
    echo "Name:".'<h2>'.$movie['name'].'</h2>'."Year".'<h3>'.$movie['year'].'</h3>'.'</br>';
    
    
}
//displayMovie($movies);

function saveMovie($movie){
    
    $filename="movies-".$movie['year'].".txt"; 
    
    
    //echo $fileput;
    $file=fopen($filename,'a+');
    $fileput=$movie['name'].",".$movie['year']."\r\n" ;
    fputs($file,$fileput);
    fclose($file);
}
//saveMovie($movies);


echo"<h1>Movie Ratings Database</h1>";
echo "Movies in database: ".count($movies)."<br>";

$kidsMovieCount=0;
$restrictedMovieCount=0;
$recommendedMovieCount=0;

foreach($movies as $k=>$v)
    if($v['rating']=="G"){
    echo $v['name']." is a kids Movie.".'<br>';
    $kidsMovieCount++;
}
else if($v['rating']=="PG"){
   saveMovie($v);
    displayMovie($v);
    $recommendedMovieCount++;
}
 else if($v['rating']=="R"){  
     echo $v['name']." is a Restricted Movie.".'<br>';
     $restrictedMovieCount++;
 }     
 $stringfile="movie_counts.txt";
 $data= "Children movies :".$kidsMovieCount."\n"."Restricted movies :".$restrictedMovieCount."\n"."Recommended movies : ".$recommendedMovieCount."\n";
 file_put_contents($stringfile,$data);
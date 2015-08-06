<?php
include'moviedb.php';
function displayMovie($movie){
   // foreach($movie as $k=>$v)
    
    echo "Name:".'<h2>'.$movies['name'].'</h2>'."Year".'<h3>'.$movies['year'].'</h3>'.'</br>';
    
    
}
//displayMovie($movies);

function saveMovie($movie){
    
    $filename="movies-".$movie['year'].".txt"; 
    
    
    //echo $fileput;
    $file=fopen($filename,'a+');
    $fileput=$movies['name'].",".$movies['year']."\r\n" ;
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
   saveMovie($movies);
    displayMovie($v['name']);
    $recommendedMovieCount++;
}
 else if($v['rating']=="R"){  
     echo $v['name']." is a Restricted Movie.".'<br>';
     $restrictedMovieCount++;
 }     
 $stringfile="movie_counts.txt";
 $data= "Children movies :".$kidsMovieCount."\n"."Restricted movies :".$restrictedMovieCount."\n"."Recommended movies : ".$recommendedMovieCount."\n";
 file_put_contents($stringfile,$data,FILE_APPEND);
 

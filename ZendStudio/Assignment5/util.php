

<?php


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

function saveComment($name,$hour,$mycomment)
{
    $atime=timeAgo($hour);

    $putComment= $name.' | '.$mycomment.' | '.$atime;
    $filename=$hour.".comment";

    file_put_contents($filename, $putComment);

}
function outputComment(array $getComment)
{
    printLine("Name: " . $getComment[0]);    
    printLine("Time: " . $getComment[1]);
    printLine("Comment: " . $getComment[2]);

    printLine($stars);

    echo "Name: ".  $getComment[0].'<br>';  
    echo "comment: ".  $getComment[1].'<br>';    
    echo "time: ".  $getComment[2].'<br>';
    
    echo "**********************************".'<br>';
    

}

?>
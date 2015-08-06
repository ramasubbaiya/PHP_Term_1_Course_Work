<?php
//Using define functions
define("DATABASE_HOST", "174.79.32.158");
define("DATABASE_USER", "phpExam");
define("DATABASE_PASS", "hunter2");
define("DATABASE_HOME", "phpExam");

//startApp function
function startApp()
{
    session_id(finalExam);
    session_start();
    if (isset($_SESSION['runCounter'])) {
        
        $_SESSION['runCounter'] ++;
    } else {
        $_SESSION['runCounter'] = 1;
    }
    
    if (! isset($_SESSION['firstRunTime'])) {
        $_SESSION['firstRunTime'] = time();
    }
}

//database_connect function
function database_connect()
{
    $link = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_HOME);
    
    if ($link) {
        echo "<p> Connected Successfully</p>";
    } else {
        echo "<p> Not Connected</p>";
    }
    
    return $link;
}

//database_disconnect function
function database_disconnect($conn)
{
    if (mysqli_close($conn)) {
        echo "<p> DisConnected</p>";
    } else {
        echo "<p> Not DisConnected</p>";
    }
}

//outputStudents function
function outputStudents()
{
    $conn=database_connect();
    //$conn = mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_HOME);
    $query = "SELECT seatNumber,name,md5hash FROM students";
    $result = mysqli_query($conn, $query);
    
    if (mysqli_errno($conn)) {
        echo mysqli_error($conn);
    }
    
    echo '<pre>';
    while ($row = mysqli_fetch_array($result)) {
        // print_r($row);
        if ($row['seatNumber'] == $_SESSION['runCounter']) {
            echo "CURRENT:\t";
        } else 
            if ($row['seatNumber'] % 2 == 1) {
                echo "ODD:\t" ;
            } else {
                echo "EVEN:\t" ;
            }
        echo $row['seatNumber'] . "\t" . $row['name'] . '<br>';
    }
    echo '</pre>';
    
    $numRows = mysqli_num_rows($result);
    
    if ($_SESSION['runCounter'] > $numRows) {
        $_SESSION['runCounter'] = 1;
    }
    database_disconnect($conn);
}

// calling functions
startApp();
outputStudents();

// Use the date() function
$_SESSION['firstRunTime'] = date('Y-m-d G:i:s');



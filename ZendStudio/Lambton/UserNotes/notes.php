<?php
session_start();
// SQL connection
include 'sqlconn.php';

// $conn = mysqli_connect("127.0.0.1", "PHP02", "PHP02", "PHP02");

$msg = "";
if (isset($_GET['do'])) {
    
    if ($_GET['do'] == "new") {
        
        if ($_POST) {
            $user = $_SESSION['user'];
            $note = $_POST['notes'];
            
            addNotes($user, $note);
        }
    } else 
        if ($_GET['do'] == "delete") {
            
            $user = $_SESSION['user'];
            $time = $_GET['time'];
            
            deleteNotes($user, $time);
        }
}

// echo "FG D DFG DFGDF G".$_SESSION['user']."GFF FSG SRG ";
function retrieveNotes()
{
    $conn = mysqli_connect("127.0.0.1", "PHP02", "PHP02", "PHP02");
    
    $query = "SELECT * FROM notes_table";
    $result = mysqli_query($conn, $query);
    // print_r($result);
    // $result1 = mysqli_num_rows($conn);
    // print_r($result1);
    if ($result) {
        $notes = array();
        // $row = mysqli_fetch_assoc($result);y
        // print_r($row);
        while ($row = mysqli_fetch_assoc($result)) {
            $notes[] = array(
                "user" => $row['username'],
                "note" => $row['note'],
                "time" => $row['time']
            );
            // ini_set('memory_limit', '-1');
        }
    }
    return $notes;
    
    mysqli_close($conn);
}

function addNotes($user, $notes)
{
    include 'sqlconn.php';
    
    $query = "INSERT INTO notes_table (username,note) VALUES ('{$user}','{$notes}');";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            mysqli_close($conn);
            return true;
        }
    }
    mysqli_close($conn);
    return false;
}

function deleteNotes($user, $time)
{
    include 'sqlconn.php';
    
    $query = "DELETE FROM notes_table WHERE username='{$user}' and time='{$time}'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        if (mysqli_affected_rows($conn) > 0) {
            header("location:index.php");
        }
    }
    mysqli_close($conn);
}

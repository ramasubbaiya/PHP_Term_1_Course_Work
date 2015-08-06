<?php
session_start();


$msg="";
if (isset($_GET['action'])) {
    if ($_GET['action'] == "new") {
        
        if($_POST)
        {
            $user = $_SESSION['login'];
            $note = $_POST['txtNotes'];

            addNotes($user, $note);
            
        }
        
    } else if ($_GET['action'] == "delete") {

        $user = $_SESSION['login'];
        $time = $_GET['timestamp'];

        deleteNotes($user, $time);
    }
   
}

function retrieveNotes() {
    $connection = mysqli_connect("127.0.0.1", "PHP00", "PHP00", "PHP00");
    
        $query = "select * from user_notes";
        $result = mysqli_query($connection, $query);
        if ($result) {
            $notes = array();
            while ($row = mysqli_fetch_array($result)) {
                $notes[] = array("user" => $row['username'], "note" => $row['note'], "timestamp" => $row['timestamp']);
            }
        }
        mysqli_close($connection);
       
    
}

function deleteNotes($user, $time) {
    $connection = mysqli_connect("127.0.0.1", "PHP00", "PHP00", "PHP00");
    
        $query = "delete from user_notes where username='{$user}' and timestamp='{$time}'";
        $result = mysqli_query($connection, $query);
        if ($result) {
            if (mysqli_affected_rows($connection) > 0) {
                mysqli_close($connection);
                
            }
        }
        mysqli_close($connection);
        
    
}

function addNotes($user, $notes) {
    $connection = mysqli_connect("127.0.0.1", "PHP00", "PHP00", "PHP00");
    
        $query = "insert into user_notes (username,note)values('{$user}','{$notes}');";
        $result = mysqli_query($connection, $query);
        if ($result) {
            if (mysqli_affected_rows($connection) > 0) {
                mysqli_close($connection);
                return true;
            }
        }
        mysqli_close($connection);
        return $false;
    
}

?>

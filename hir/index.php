<?php
include_once 'notes.php';

$user = "";
if (!isset($_SESSION['login'])) {
   echo "please login to add data";
}
$user = $_SESSION['login'];

$notesList = retrieveNotes();




foreach ($notesList as $note) {
    echo"$note['note']";
    if ($_SESSION['login'] == $note['username']) {
        echo "<a href='notes.php?action=delete&timestamp={$note['timestamp']}'>Delete note</a>";
    }
    echo "<br>";
}

?>

<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        if (isset($_GET['msg'])) {
            echo"<h4>{$msg}</h4>";
        }
        ?>
        <form method="post" action="notes.php?action=new" >
            Notes:<input type="text" name="txtNotes">
			<input type="submit" value="Add Notes">
                
           
        </form>
    </body>
</html>

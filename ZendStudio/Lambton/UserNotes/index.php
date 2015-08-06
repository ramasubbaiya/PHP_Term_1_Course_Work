<?php

/*
 * connect to the database
 * check for connection errors
 */
include ('sqlconn.php');

include_once 'notes.php';
// echo $_SESSION['user'];

if (isset($_SESSION['user'])) {
    $user_name = $_SESSION['user'];
    echo "Welcome!, " . $user_name . '</br></br>';
} else {
    echo "<p><b>Please Login </b></p></br></br>";
}

?>
<!DOCTYPE>
<html>
<head>
</head>
<body>
	<!-- // comment // -->
	<form method="post" action="index.php?do=new">
		Add Note <input type="text" name="notes" /> <input type='submit'
			value="Add Note" name='addnote'> <br />

	</form>
<?php
// echo "Bye" . $user_name;
  
$getNotes = retrieveNotes();

foreach ($getNotes as $notes) {
    // echo "hii..r";
    
    if ($user_name == $notes['user']) {
        echo $notes['note'] . '&nbsp;&nbsp;';
        echo "<a href='notes.php?do=delete&time={$notes['time']}'>Delete Note</a></br>";
    } else {
        echo "No notes to display";
    }
}

?>
<?php

/* if (isset($_GET['msg'])) {
    echo "<h4>{$msg}</h4>";
} */
?>

<?php

?>





</body>
</html>
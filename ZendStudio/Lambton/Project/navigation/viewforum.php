
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    die("Error");
}

if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
} else {
    $user = "Guest";
}

//$_SERVER['PHP_SELF'];
//$r=$_POST['forumcomment'];
//$idUpdate = $conn->query("UPDATE forum_post SET forumpost='$r' WHERE post_id='$id' ");

$idCheck = $conn->query("SELECT * FROM forum_post WHERE post_id='$id' ");

// $idCheck= mysqli_fetch_array($idCheck);
$var = 1;
while ($array = mysqli_fetch_array($idCheck)) {
    // print_r($array);
    
    ?>



	<div class="clear"></div>

	<div class="clear"></div>

	<div class="grid_6 prefix_1"><?php
    if ($var == 1) {
        echo '<p id="pheading">' . $array['post_title'] . '</p>';
    }
    echo '<p id="psubheading">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $array['post_body'] . '</p><p id="pcontent">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Posted by:' . $array['post_author'] . '</p></br>';
    
    ?>

	<div class="clear"></div>

	<div class="clear"></div>

</div>


<?php
    $var ++;
}

if ($idCheck->num_rows < 1) {
    die("Error");
}
?>
	<div class="clear"></div>
<div class="container_12">
	<div class="grid_5">
		<form id="bookingForm" action="" method="post">

			<div class="clear"></div>

			<div class="tmTextarea">
				<textarea name="forumcomment" placeHolder="Post your Comments"
					data-constraints='@NotEmpty @Required'></textarea>
			</div>
			<input type="submit" name="psubmit" value="Submit"
				onclick="refresh()">
			<script language="javascript" type="text/javascript">

	
				

</script>
		</form>
	</div>
</div>
<div class="clear"></div>
</br>
</br>
</br>
<div class="grid_6 prefix_1">
	<a href="index.php?page=webforum"><p id="psubheading">Go Back</p></a>
</div>
<div class="clear"></div>


<?php
if (isset($_POST['psubmit'])) {
    // $fname = mysqli_escape_string($conn, $_POST['forumtitle']);
    $fdesc = mysqli_escape_string($conn, $_POST['forumcomment']);
    
    if (strlen($fdesc) > 3) {
        
        $query2 = "INSERT INTO forum_post (post_id,post_author,post_body) VALUES ('$id','$user','$fdesc');";
        // $query1 = "INSERT INTO forum_table (forum_name,forum_description) VALUES ('$fname','$fdesc');";
        
        $result1 = mysqli_query($conn, $query2);
    } else {
        echo "<p style='color:red'><strong>ERROR!!! </strong>Input Invalid</p>";
    }
}


?>
<?php
/*
 * $query = "SELECT forum_id,forum_name FROM forum_table";
 * $result = mysqli_query($conn, $query);
 * $num_result = mysqli_num_rows($result);
 * if ($num_result != 0) {
 *
 * $print = mysqli_fetch_array($result);
 *
 * ?>
 * <table>
 * <tr>
 * <td><a href="index.php?page=<?php echo $print['forum_id'] ?>"> <?php echo $print['forum_name'];?></a></td>
 *
 *
 * </tr>
 * </table>
 * <?php
 * }
 */
?>


<?php
if(isset($_SESSION['user'])){
    $user = $_SESSION['user'];
}
else
{
    $user = "Guest";
}


if (isset($_POST['fsubmit'])) {
    $fname = mysqli_escape_string($conn, $_POST['forumtitle']);
    $fdesc = mysqli_escape_string($conn, $_POST['forumcomment']);
    
    if (strlen($fname) > 3 && strlen($fdesc) > 3) {
        $query1 = "INSERT INTO forum_table (forum_name,forum_description) VALUES ('$fname','$fdesc');";
        
        //$query2 = "INSERT INTO forum_post (post_title,post_author,post_body) VALUES ('$fname','$user','$fdesc');";
        // $query1 = "INSERT INTO forum_table (forum_name,forum_description) VALUES ('$fname','$fdesc');";
        $result = mysqli_query($conn, $query1);
        
        if(mysqli_errno($conn))
            echo mysqli_error($conn);
        $rowid=mysqli_affected_rows($conn);
        print_r($rowid);
        if ($rowid==1){
            $query3 = "SELECT LAST_INSERT_ID() as forum_id";
             
            $result2 = mysqli_query($conn, $query3);
            $rowid1=mysqli_fetch_assoc($result2);
            print_r($rowid1);
            $postid = $rowid1['forum_id'];
            
            $query2 = "INSERT INTO forum_post (post_id,post_title,post_author,post_body) VALUES ('$postid','$fname','$user','$fdesc');";
            $result3 = mysqli_query($conn, $query2);
        }
        
        
    } else {
        echo "<p style='color:red'><strong>ERROR!!! </strong>Input Invalid</p>";
    }
}





?>

    <?php
    $sql = "SELECT forum_id,forum_name,time FROM forum_table";
    if ($query = $conn->prepare($sql)) {
        $query->bind_result($f_id, $f_name, $time);
        $query->execute();
        $query->store_result();
    } else {
        echo $conn->error;
    }
    
    ?>


<form action="" method="post">

    
    <label for="criteria">Search for Desired Results</label>
    <input type="text" name="criteria" id="criteria"/>
    <input type="submit" name="submit" value="Go"/>
</form>
<table>
<tr>
<th>
</th>

<?php 
if(isset($_POST['submit'])){
    //$category= $_POST['category'];
    $criteria= $_POST['criteria'];
    $query1="SELECT forum_id,forum_name,forum_description FROM forum_table WHERE forum_name  LIKE '%".$criteria."%' OR forum_description  LIKE '%".$criteria."%' ";
    $result1=mysqli_query($conn, $query1);
    $num_rows=mysqli_num_rows($result1);
    echo $num_rows.' row(s) have been found';
    while ($rows=mysqli_fetch_assoc($result1)){
        echo'<tr>';
        //print_r($rows);
        echo '<td><a href="index.php?page=viewforum&id='.$rows['forum_id'].'"><p id="psubheading" >'.$rows['forum_name'].'</p></a></td>';
       
        echo '<td><a href="index.php?page=viewforum&id='.$rows['forum_id'].'"><p id="pcontent">'.$rows['forum_description'].'</p></a></td>';
        echo'</tr>';
    }
}

?>
</tr></table>
</br>
</br>



<div>
	<table align="center" width="80%">
		<tr>
			<td><p id="pheading">Title</p></td>
			<td><p id="pheading">Created On</p></td>
		</tr>
	</table>
</div>

<div>
	<table align="center" width="80%">
        <?php
        
        if ($query->num_rows != 0) :
            while ($row = $query->fetch()) :
                ?>
               
            
		<tr>
			<td><a href="index.php?page=viewforum&id=<?php echo $f_id; ?>">
					<p id="psubheading"> &nbsp;&nbsp;&nbsp;&nbsp; <?php echo $f_name; ?></p>
			</a></td>
			<td><a href="index.php?page=viewforum&id=<?php echo $f_id; ?>">
					<p id="psubheading"> <?php echo $time; ?></p></td>
			<!-- target="_blank" onclick="window.open('?id=<?php //echo $f_id; ?>') -->
		</tr>
            <?php endwhile; endif;?>
    </table>
</div>
<div class="container_12">
	<div class="grid_5">
		<form id="bookingForm" action="" method="post">
			<input type="text" name="forumtitle" placeHolder="Title"
				data-constraints='@NotEmpty @Required'>
			<div class="clear"></div>

			<div class="tmTextarea">
				<textarea name="forumcomment" placeHolder="Post your Comments"
					data-constraints='@NotEmpty @Required'></textarea>
			</div>
			<input type="submit" name="fsubmit" value="Submit">
		</form>
	</div>
</div>
<div class="clear"></div>
</br>
</br>
</br>





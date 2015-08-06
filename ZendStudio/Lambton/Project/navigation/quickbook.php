<?php
if (isset($_SESSION['user'])) {
    echo '<p class="fcaps" id="psubheading">' . $_SESSION['user'] . '!, have logged in</p></p>';
} else {
    echo "<p id='psubheading'>No need to login.. Just rent it, Quick</p>";
}
?>

<div class="content">
	<div class="ic"></div>
	<div class="container_12">
		<div class="grid_5">
			<h3>Quick Booking Form</h3>
			<form id="bookingForm" action="" method="post" enctype="multipart/form-data">
				<div class="fl1">
					<div class="tmInput">
						<input name="qname" placeHolder="Name:" type="text"
							data-constraints='@NotEmpty @Required @AlphaSpecial'>
					</div>
					<div class="tmInput">
						<input name="qfrom" placeHolder="From:" type="text"
							data-constraints="@NotEmpty @Required ">
					</div>
				</div>
				<div class="fl1">
					<div class="tmInput">
						<input name="qemail" placeHolder="Email:" type="text"
							data-constraints="@NotEmpty @Required @Email">
					</div>
					<div class="tmInput mr0">
						<input name="qto" placeHolder="To:" type="text"
							data-constraints="@NotEmpty @Required">
					</div>
				</div>
				<div class="clear"></div>
				<strong>Time</strong>
				<div class="tmInput">
					<input name="Time" placeHolder="" type="text"
						data-constraints="@NotEmpty @Required">
				</div>
				<div class="clear"></div>
				<strong>Date</strong> <label class="tmDatepicker"> <input
					type="text" name="Date" placeHolder='20/05/2014'
					data-constraints="@NotEmpty @Required @Date">
				</label>
				<div class="clear"></div>
				<div class="tmRadio">
					<p>Comfort</p>
					<input name="Comfort" type="radio" id="tmRadio0" value="cheap"
						checked /> <span>Cheap</span> <input name="Comfort" type="radio"
						id="tmRadio1" value="standard" /> <span>Standard</span> <input
						name="Comfort" type="radio" id="tmRadio2" value="lux" /> <span>Lux</span>
				</div>
				<div class="clear"></div>
				<div class="fl1 fl2">
					<em>Adults</em> <select name="qadults" class="tmSelect auto"
						data-class="tmSelect tmSelect2" data-constraints="" value="1">
						<option>1</option>
						<option>1</option>
						<option>2</option>
						<option>3</option>
					</select>
					<div class="clear height1"></div>
				</div>
				<div class="fl1 fl2">
					<em>Children</em> <select name="qchildren" class="tmSelect auto"
						data-class="tmSelect tmSelect2" data-constraints="" value="0">
						<option>0</option>
						<option>0</option>
						<option>1</option>
						<option>2</option>
					</select>
				</div>
				<div class="clear"></div>
				<div class="tmTextarea">
					<textarea name="qaddress" placeHolder="Address"
						data-constraints='@NotEmpty @Required'></textarea>
				</div>



				<div class="clear"></div>
				<div class="tmTextarea">
					<input type="file" name="file" data-constraints="@NotEmpty">

				</div>






				<a href="#" class="btn" data-type="submit">Validate</a> <br> <input
					type="submit" name="qsubmit" value="Submit">

			</form>
		</div>
		<div class="grid_6 prefix_1">
			<a href="index.php?page=listofcars" class="type"><img
				src="images/page1_img1.jpg" alt=""><span class="type_caption">Economy</span></a>
			<a href="index.php?page=listofcars" class="type"><img
				src="images/page1_img2.jpg" alt=""><span class="type_caption">Standard</span></a>
			<a href="index.php?page=listofcars" class="type"><img
				src="images/page1_img3.jpg" alt=""><span class="type_caption">Lux</span></a>
		</div>
		<div class="clear"></div>
	</div>
</div>

<?php
if (isset($_POST['qsubmit'])) {
    $qname = mysqli_escape_string($conn, $_POST['qname']);
    $qfrom = mysqli_escape_string($conn, $_POST['qfrom']);
    $qemail = mysqli_escape_string($conn, $_POST['qemail']);
    
    $qto = mysqli_escape_string($conn, $_POST['qto']);
    $qadd = mysqli_escape_string($conn, $_POST['qaddress']);
    
    if (strlen($qname) < 1 || strlen($qfrom) < 1 || strlen($qemail) < 1 || strlen($qto) < 1 || strlen($qadd) < 1 ) {
        
        // echo"hi";
        echo "<p style='color:red'><strong>ERROR!!! </strong>Please fill All the fields</p></br></br>";
    } else if(!isset($_FILES['file'])){
        echo "<p style='color:red'><strong>ERROR!!! </strong>Please submit valid proof</p></br></br>";
    }
        
            if (isset($_FILES['file'])) {
                $file = $_FILES['file'];
                // print_r($file);
                $file_name = $file['name'];
                $file_type = $file['type'];
                $file_size = $file['size'];
                $file_location = $file['tmp_name'];
                $file_error = $file['error'];
                // echo $file_name.$file_type." with ".$file_size." size have been uploaded in ".$file_location;
                
                $file_extension = explode('.', $file_name);
                // print_r($file_extension);
                $file_extension = end($file_extension);
             
                    if ($file_error === 0) {
                        $file_destination = 'uploadedfiles/' . $file_name;
                        if (move_uploaded_file($file_location, $file_destination)) {
                            echo "<p style='color:black'><strong>You Made it!!! </strong>Thank You!</p></br></br>";
                        }
                    }
 
            }
            
            ?>
             <script> location.replace("index.php?page=exit"); </script>
            
            <?php 
            
        }else{
            
        }

?>
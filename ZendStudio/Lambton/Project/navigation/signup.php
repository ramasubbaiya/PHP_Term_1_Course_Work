
<?php
if (isset($_SESSION['user'])) {
    echo  '<p class="fcaps" id="psubheading">'.$_SESSION['user'] . '!, have logged in</p>';
    echo "Man!! Why you are here..You can start renting!! ";
} else {
    echo "<p id='psubheading'>You Are at the right place..Sign In or Sign Up<p>";
}
?>
<div class="content">
	<div class="ic"></div>
	<div class="container_12">
		<div class="grid_5">
			<h3>Registration Form</h3>
			<form id="bookingForm" method="post">
				<div class="fl1">
					<div class="tmInput">
						<input name="username" placeHolder="Username" type="text"
							data-constraints='@NotEmpty @Required @AlphaSpecial'>
					</div>
					<div class="tmInput">
						<input name="password" placeHolder="Password" type="text"
							data-constraints="@NotEmpty @Required ">
					</div>
				</div>
				<div class="fl1">
					<div class="tmInput">
						<input name="email" placeHolder="Email" type="text"
							data-constraints="@NotEmpty @Required @Email">
					</div>
					<div class="tmInput mr0">
						<input name="confirmpassword" placeHolder="Confirm Password"
							type="text" data-constraints="@NotEmpty @Required">
					</div>
				</div>
				<div class="clear"></div>
				<strong>Name</strong>
				<div class="tmInput">
					<input name="fullname" placeHolder="Full Name" type="text"
						data-constraints="@NotEmpty @Required">
				</div>
				<div class="clear"></div>
				<strong>D O B</strong> <input type="date" name="dob"
					placeHolder='20/05/2014'
					data-constraints="@NotEmpty @Required @Date"> <br> <br>
				<div class="clear"></div>
				<div class="tmRadio">
					<p>Gender</p>
					<input name="gender" value="male" type="radio" id="tmRadio0"
						checked /> <span>Male</span> <input name="gender" value="female"
						type="radio" id="tmRadio1" /> <span>Female</span> <input
						name="gender" value="other" type="radio" id="tmRadio2" /> <span>Other</span>
				</div>
				<div class="clear"></div>
				<div class="tmTextarea">
					<textarea name="address" placeHolder="Address"
						data-constraints='@NotEmpty @Required '></textarea>
				</div>
				<div class="fl1 fl2">


					<div class="clear height1"></div>
				</div>
				<div class="fl1 fl2"></div>
				<div class="clear"></div>

				<!-- <a class="btn" data-type="submit" name="submit"  ></a> -->
				<input type="submit" name="submit" value="Submit" data-type="submit"
					data-constraints="@NotEmpty @Required">
			</form>
		</div>





		<div class="grid_6 prefix_1">


			<div class="content">
				<div class="ic"></div>

				<div class="container_12"></div>
				<div class="grid_5">
					<h3>Sign In</h3>
					<form id="bookingForm" action="" method="post">


						<div class="">
							<input name="uname" placeHolder="User Name" type="text"
								data-constraints="@NotEmpty @Required">
						</div>
						<br>

						<div class="">
							<input name="upassword" placeHolder="Password" type="text"
								data-constraints="@NotEmpty @Required">
						</div>
						<div class="clear"></div>
						<!--  <a href="#" class="btn" data-type="submit" name="submit">Submit</a>-->
						<br> <input type="submit" name="usubmit" value="Submit">


					</form>
				</div>
			</div>
					
					<?php
    if (isset($_POST['submit'])) {
        $uname = mysqli_escape_string($conn, $_POST['username']);
        $pword = mysqli_escape_string($conn, $_POST['password']);
        $cpword = mysqli_escape_string($conn, $_POST['confirmpassword']);
        
        $email = mysqli_escape_string($conn, $_POST['email']);
        $fullname = mysqli_escape_string($conn, $_POST['fullname']);
        $dob = mysqli_escape_string($conn, $_POST['dob']);
        $gender = mysqli_escape_string($conn, $_POST['gender']);
        $address = mysqli_escape_string($conn, $_POST['address']);
        if (strlen($uname) < 1 || strlen($pword) < 1 || strlen($email) < 1 || strlen($fullname) < 1 || strlen($dob) < 1 || strlen($gender) < 1 || strlen($address) < 1) {
            
            // echo"hi";
            echo "<p style='color:red'><strong>ERROR!!! </strong>Please fill All the fields</p>";
        } else 
            if ($pword != $cpword) {
                
                echo "<p style='color:red'><strong>ERROR!!! </strong>Password Doesn't  match</p>";
            } 

            else {
                
                $query = "INSERT INTO registration_form(username,password,email,name,dob,gender,address) VALUES ('$uname','$pword','$email','$fullname','$dob','$gender','$address') ";
                
                $result = mysqli_query($conn, $query);
                
                
                // echo"hi";
                //$array_result = mysqli_fetch_array($result3, MYSQLI_ASSOC);
                // echo"hi";
                //print_r($array_result);
                               //     $_SESSION['user'] = $uname;
                                 //   $_SESSION['userid'] = $array_result['user_id'];
                                  //  $_SESSION['email'] = $array_result['email'];
                 
                // session_start();
                // header('location:index.php');
                ?>
                               
                
               
                <script> location.replace("index.php"); </script>
        
              <?php
                // onclick="document.forms['name_of_your_form'].submit(); <noscript><input type="submit" ... /></noscript>
            }
    } 

    else 
        if (isset($_POST['usubmit'])) {
            
            $uname = mysqli_escape_string($conn, $_POST['uname']);
            $upasswd = mysqli_escape_string($conn, $_POST['upassword']);
            $query1 = "SELECT username FROM registration_form WHERE email='$uname' and password='$upasswd' ";
            $result1 = mysqli_query($conn, $query1);
            // PRINT_R($result1);
            
            $row_count = mysqli_num_rows($result1);
            
            // echo $row_count;
            if (($row_count) != 0) {
                
                $query2 = "SELECT username,user_id,email FROM registration_form WHERE email='$uname' and password='$upasswd' ";
                $result2 = mysqli_query($conn, $query2);
                
                // echo"hi";
                $array_result = mysqli_fetch_array($result2, MYSQLI_ASSOC);
                // echo"hi";
                //print_r($array_result);
                $_SESSION['user'] = $array_result['username'];
                $_SESSION['userid'] = $array_result['user_id'];
                $_SESSION['email'] = $array_result['email'];
               
                // session_start();
                // header('location:index.php');
                ?>
                <script> location.replace("index.php"); </script>
              <?php
                
                echo '<p>' . $_SESSION['user'] . ' have logged in</p>';
            } 

            else
                
                echo "<p style='color:red'><strong>ERROR!!! </strong>Username or Password Invalid</p>";
        }
    ?>
							</div>
		<div class="grid_6 prefix_1">
			<a
				href="https://www.facebook.com/dialog/oauth?client_id=541457832663644&amp;redirect_uri=http%3A%2F%2F174.79.32.158%3A10088%2Fstudents%2Fphp02%2Fproject%2Ffacebook%2Fexamples%2Fexample.php&amp;state=ea0269bcb485af971fe832394299ac1f&amp;sdk=php-sdk-3.2.3"
				
				      
				
				class="type"><img src="images/facebook.jpg" alt=""><span
				class="type_caption">Login With Facebook</span></a>

		</div>


		<div class="clear"></div>
	</div>
</div>
</div>
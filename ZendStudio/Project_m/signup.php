<?php
include ('templates/head.php');
include ('templates/nav.php');
?>

<h2>Sign Up</h2>
<form action="signup.php" method="post">
	<label for="name">Name:</label> <input type="text" name="name"
		id="name" required
		<?php if(isset($_POST['name'])) echo "value='{$_POST['name']}' "; ?> /><br>
	<label for="email">E-mail:</label> <input type="email" name="email"
		id="email" required
		<?php if(isset($_POST['email'])) echo "value='{$_POST['email']}'" ?> /><br>
	<label for="age">Age:</label> <input type="text" name="age" id="age"
		pattern="[0-9]{2}" required
		<?php if(isset($_POST['age'])) echo "value='{$_POST['age']}'"?> /><br>
	<label for="Gender">Gender:</label> <input type="radio" name="Gender"
		id="Gender" value="M"
		<?php if(isset($_POST['Gender']) && $_POST['Gender'] === 'M') echo 'checked="true"'; ?>
		required />Male <input type="radio" name="Gender" id="Gender"
		value="F" required
		<?php  if(isset($_POST['Gender']) &&  $_POST['email']==='F') echo 'Checked="true"';?> />Female<br>
	<label for="passwd">Password:</label> <input type="password"
		name="passwd" id="passwd" min="6" max="30" required
		<?php if(isset($_POST['passwd'])) echo "value='{$_POST['passwd']}'"?> />
	<input type="submit" name="password" value="Check Password" required /><br>
	<label for="confirmpasswd">Confirm Password:</label> <input
		type="password" name="confirmpasswd" id="confirmpasswd" min="6"
		max="30" required
		<?php  if(isset($_POST['confirmpasswd'])) echo  "value='{$_POST['confirmpasswd']}'"?> /><br>

	<input type="submit" name="submit" value="submit" id="button" />
</form>


<?php
$conn = mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
// if(($_POST['passwd']=$_POST['confirmpasswd'])){
if (isset($_POST['password'])) {
    $password = $_POST['passwd'];
    if (strlen($password) < 8) {
        echo "<div class='error'><p id='red'>Password  must be greater than 8 characters. Password strength is week </p></div>";
    } else 
        if (is_numeric($password)) {
            echo "<div class='error'><p id='red'>Password must contain atleast one alphabet. Password strength is medium</p></div>";
        } else 
            if (! preg_match('#[0-9]#', $password)) {
                echo "<div class='error'><p id='red'>Password must contain atleast one number. Password strength is medium</p></div>";
            } else 
                if (! preg_match('#[A-Z]#', $password)) {
                    echo "<div class='error'><p id='red'>Password must contain atleast one upper case letter. Password strength is medium</p></div>";
                } else 
                    if (! preg_match('#[a-z]#', $password)) {
                        echo "<div class='error'><p id='red'>Password must contain atleast one lower case letter. Password strength is medium</p></div>";
                    } else {
                        echo "Password is strong and parsed.";
                    }
}
// } else echo "Your Password and Confirm Password mismatches";
if ((isset($_POST['submit']))) {
    if (($_POST['passwd'] == $_POST['confirmpasswd'])) {
        $r = $_POST['email'];
        $checkexisting = "select emailid from p_users where emailid='$r'";
        
        mysqli_query($conn, $checkexisting);
        
        if (mysqli_num_rows(mysqli_query($conn, $checkexisting))) {
            echo '<div class="error"><p>Your email-id have an account already</p></div>';
        } else {
            $password = $_POST['passwd'];
           
            
            $name = mysqli_escape_string($conn, $_POST['name']);
            $email = mysqli_escape_string($conn, $_POST['email']);
            $age = mysqli_escape_string($conn, $_POST['age']);
            $gender = mysqli_escape_string($conn, $_POST['Gender']);
            $passwd = mysqli_escape_string($conn, $_POST['passwd']);
            
            $query = "SELECT COUNT(*) FROM workout_user WHERE email_id='$email'  ";
            $result1 = mysqli_query($conn, $query);
            // $rowcount1=mysqli_num_rows($result1);
            // echo'hello';
            if ($result1 == 0) {
                if (strlen($password) < 8) {
                    echo "<div class='error'><p id='red'>Password  must be greater than 8 characters. Password strength is week </p></div>";
                } else
                    if (is_numeric($password)) {
                        echo "<div class='error'><p id='red'>Password must contain atleast one alphabet. Password strength is medium</p></div>";
                    } else
                        if (! preg_match('#[0-9]#', $password)) {
                            echo "<div class='error'><p id='red'>Password must contain atleast one number. Password strength is medium</p></div>";
                        } else
                            if (! preg_match('#[A-Z]#', $password)) {
                                echo "<div class='error'><p id='red'>Password must contain atleast one upper case letter. Password strength is medium</p></div>";
                            } else
                                if (! preg_match('#[a-z]#', $password)) {
                                    echo "<div class='error'><p id='red'>Password must contain atleast one lower case letter. Password strength is medium</p></div>";
                                } else {
                                    echo "Password is strong and parsed.";
                                               // echo 'fuck';
                $query1 = "INSERT INTO p_users (emailid,username,age,gender,password)
        VALUES('$email','$name','$age','$gender','$passwd')";
                $result2 = mysqli_query($conn, $query1);
                $result2;
                echo 'Your account has been created. Please Login and enjoy';
                                }  // echo 'hi';
            } else
                echo ' <div class="error"><p>You are having an account already</p></div>';
        }
    } else
        echo ' <div class="error"><p>Your Password and Confirm Password Mismatches</p></div>';
}
include ('templates/foot.php');
?>



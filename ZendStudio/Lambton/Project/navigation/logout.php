<?php
//Use session_start() to create a session
if(isset($_SESSION['user'])){
unset($user);
session_destroy();?>
<div align='center'>
<br>&nbsp;</br>
<p>

<br>&nbsp;</br>
<p id="psubheading"><b>You have been logged out Successfully</b></p><br>
<a href="index.php">Go back to log in page</a>
</p></div>
<?php }else{ ?>
    <div align='center'>
    <br>&nbsp;</br>
    <p>
    
    <br>&nbsp;</br>
   <p id="psubheading"><b>You Should first Login!! To Log Out!</b></p><br>
    <a href="index.php?page=signup">Go back to log in page</a>
    </p></div>

<?php }

?>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>

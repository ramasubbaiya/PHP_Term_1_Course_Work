
<div align='center'>
<br>&nbsp;</br>
<p>

<br>&nbsp;</br>
<b>You have Booked the car Successfully! Check mail<br></b>
<a href="index.php">Go back to log in page</a>
</p></div>



<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<br>&nbsp;</br>
<?php 

//$mail = new PHPMailer();
//$mail->IsSMTP();
//$mail->CharSet = 'UTF-8';

/*     $mail->Host       = "http://174.79.32.158:10088/"; // SMTP server example
    $mail->SMTPDebug  = 0;                     // enables SMTP debug information (for testing)
    $mail->SMTPAuth   = true;                  // enable SMTP authentication
    $mail->Port       = 22;                    // set the SMTP port for the GMAIL server
    $mail->Username   = "php02"; // SMTP account username example
    $mail->Password   = "php02";        // SMTP account password example
 */
$to = 'ramasubbaiya@gmail.com';
$subject = "Booking Details";
$txt = "You have rented a car successfully";
$headers = "From: ramasubbaiya@gmail.com" . "\r\n" ;
    

mail($to,$subject,$txt,$headers);





?>
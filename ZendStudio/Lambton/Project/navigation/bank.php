<div class="content">

	
		<div class="grid_5">
			<h3>Payment</h3>
			<form id="bookingForm" method="post" action="">


				<div class="clear"></div>
				<strong>Name</strong>
				<div class="tmInput">
					<input name="cardname" placeHolder="Name on Card" type="text"
						data-constraints="@NotEmpty @Required">
				</div>
				<div class="clear"></div>
				<strong>Card Type</strong>
				<div class="tmInput">
					<select name="cardtype" >
						<option value="visa">Visa</option>
						<option value="master">Master</option>
						<option value="maestro">Maestro</option>
						<option value="americanexpress">American Express</option>
					</select>
				</div>
                <div class="clear"></div>
				<strong>Card Number</strong>
				<div class="tmInput">
					<input name="cardnumber" placeHolder="Card Number" type="text"
						data-constraints="@NotEmpty @Required">
				</div>
				<div class="clear"></div>
				<strong>CVV</strong>
				<div class="tmInput">
					<input name="cvv" placeHolder="Secret Pin Number" type="text"
						data-constraints="@NotEmpty @Required">
				</div>
				<div class="clear"></div>
							<div class="fl1 fl2">
								<em>Month</em>
								<select name="Adults" value="1" class="tmSelect auto" data-class="tmSelect tmSelect2" data-constraints="">
									<option>1</option>
									<option>2</option>
									<option>3</option>
									<option>4</option>
									<option>5</option>
									<option>6</option>
									<option>7</option>
									<option>8</option>
									<option>9</option>
									<option>10</option>
									<option>11</option>
									<option>12</option>
								</select>
								<div class="clear height1"></div>
							</div>
							<div class="fl1 fl2">
								<em>Year</em>
								<select name="Children" class="tmSelect auto" value="2015" data-class="tmSelect tmSelect2" data-constraints="">
									<option>2015</option>
									<option>2014</option>
									<option>2013</option>
									<option>2012</option>
									<option>2011</option>
									<option>2010</option>
									<option>2009</option>
									<option>2008</option>
									<option>2007</option>
									<option>2006</option>
									<option>2005</option>
									<option>2004</option>
								</select>
							</div>
							
				<input type="submit" name="bsubmit" value="Submit" data-type="submit"
					data-constraints="@NotEmpty @Required">
				<div class="clear"></div></br>
			</form>
		
	</div>
</div>
<div class="clear"></div>

<?php
    if (isset($_POST['bsubmit'])) {
        $cname = mysqli_escape_string($conn, $_POST['cardname']);
        $ctype = mysqli_escape_string($conn, $_POST['cardtype']);
        $cnumber = mysqli_escape_string($conn, $_POST['cardnumber']);
        
        $cvv = mysqli_escape_string($conn, $_POST['cvv']);
   
        if (strlen($cname) < 1 || strlen($ctype) < 1 || strlen($cnumber) < 1 || strlen($cvv) < 1 ) {
            
            // echo"hi";
            echo "<p style='color:red'><strong>ERROR!!! </strong>Please fill All the fields</p>";
        } else 
            if (strlen($cnumber) < 16) {
                
                echo "<p style='color:red'><strong>ERROR!!! </strong>Invalid Card Number</p>";
            } 

            else {
                
                $query = "INSERT INTO card_details(name,card_type,card_number,cvv) VALUES ('$cname','$ctype','$cnumber','$cvv') ";
                
                $result = mysqli_query($conn, $query);
                ?>
                <script> location.replace("index.php?page=exit"); </script>
 
              <?php
                // onclick="document.forms['name_of_your_form'].submit(); <noscript><input type="submit" ... /></noscript>
            }
    } 

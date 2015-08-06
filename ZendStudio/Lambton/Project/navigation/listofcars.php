<?php
if (isset($_SESSION['user'])) {
    echo  '<p class="fcaps" id="psubheading">'.$_SESSION['user'] . '!, have logged in</p>';
} else {
    echo "<p id='psubheading'>Please login to book cars</p>";
}
?>
<div class="content">
	<div class="ic">Website</div>
	<div class="container_12">
		<div class="grid_12">
			<h3>Economy</h3>
		</div>
		<div class="clear"></div>
		<div class="gallery">
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/page3_img1.jpg" class="gal"><img
					src="images/page3_img1.jpg" alt=""></a>
			</div>
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big2.jpg" class="gal"><img
					src="images/page3_img2.jpg" alt=""></a>
			</div>
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big3.jpg" class="gal"><img
					src="images/page3_img3.jpg" alt=""></a>
			</div>
		</div>
		<div class="grid_12">
			<h3>Standard</h3>
		</div>
		<div class="clear"></div>
		<div class="gallery">
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big4.jpg" class="gal"><img
					src="images/page3_img4.jpg" alt=""></a>
			</div>
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big5.jpg" class="gal"><img
					src="images/page3_img5.jpg" alt=""></a>
			</div>
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big6.jpg" class="gal"><img
					src="images/page3_img6.jpg" alt=""></a>
			</div>
		</div>
		<div class="grid_12">
			<h3>Lux</h3>
		</div>
		<div class="clear"></div>
		<div class="gallery">
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big7.jpg" class="gal"><img
					src="images/page3_img7.jpg" alt=""></a>
			</div>
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big8.jpg" class="gal"><img
					src="images/page3_img8.jpg" alt=""></a>
			</div>
			<div class="grid_4">
				<a href="index.php?page=cart&image=images/big9.jpg" class="gal"><img
					src="images/page3_img9.jpg" alt=""></a>
			</div>
		</div>
		<div class="clear"></div>
	</div>
</div>
</div>
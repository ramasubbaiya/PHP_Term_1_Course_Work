<?php
if(isset($_SESSION['userid'])){
$i = $_SESSION['userid'];
$_SESSION['user_id'] = (int) $i;
}
else{
    echo'Please login';
    
}
$articleQuery = $conn->query("
     SELECT 
     cart_like.id,
     cart_like.car_name,
     COUNT(like_table.id) as likes
    
     
     FROM cart_like
     
     LEFT JOIN like_table
     ON cart_like.id = like_table.car
     
     LEFT JOIN registration_form
     ON like_table.luser = registration_form.user_id
     
     
     GROUP BY cart_like.id 
     ");// GROUP_CONCAT(registration_form.name SEPARATOR '|') AS liked_by

while ($row = $articleQuery->fetch_object()) {
    //$row->liked_by = $row->liked_by ? explode('|', $row->liked_by) :[];
    $articles[] = $row;
}
//echo '<pre>';
//print_r($articles);
//echo '</pre>';
// die();
?>
 <?php
foreach ($articles as $art) :
    ?>
<div>
	<p id="psubheading"><?php echo $art->car_name; ?></p>
	<a href="index.php?page=like&type=art&like=<?php echo $art->id; ?>">Like</a>
	<p> <?php echo $art->likes;?></p>
</div>
<?php endforeach;?>
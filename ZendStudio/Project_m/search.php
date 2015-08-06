<?php
include ('templates/head.php');
include('templates/nav.php');
session_start();
define('dbhost', "127.0.0.1");
define('dbname', 'PHP20');
define('dbuser','PHP20');
define('dbpass', 'PHP20');

try {
    $conn=mysqli_connect(dbhost, dbuser, dbpass, dbname);
    #echo 'Hi';
} catch (Exception $e) {
    print 'Error! '.$e->getMessage();
}
?>

<!DOCTYPE>
<html>
<head>
<title>SEARCH
</title>
<style type="text/css">
table{
	background-color:"yellow";
	width:600px;
	text-align:left;
}
</style>
</head>
<body>

<form action="search.php" method="post">
<label for="category">Search By Category</label>
<select name="category">
    <option value="departmentname">Department</option>
    <option value="doctorname">Doctor</option>
    </select><br>
    
    <label for="criteria">Criteria</label>
    <input type="text" name="criteria" id="criteria"/>
    <input type="submit" name="submit" value="Go"/>
</form>
<table>
<tr>
<th>
</th>

<?php 
if(isset($_POST['submit'])){
    $category= $_POST['category'];
    $criteria= $_POST['criteria'];
    $query="SELECT * FROM p_doctors WHERE $category LIKE '%".$criteria."%'";
    $result=mysqli_query($conn, $query);
    $num_rows=mysqli_num_rows($result);
    echo $num_rows.' row(s) have been found';
    while ($rows=mysqli_fetch_assoc($result)){
        //echo 'Hi';
        echo '<tr><td>'.$rows['departmentname'].'</td>';
        echo '<td>'.$rows['doctorname'].'</td></tr>';
    }
}

?>



</table>
<?php include('templates/foot.php');?>
</body>
</html>

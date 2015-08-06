<?php

include ('templates/head.php');
include('templates/nav.php');
session_start();
if(!empty($_SESSION['user'])){
try {
    $conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
    #echo  'Hi';
} catch (PDOException $e) {
    print "Error!". $e->getMessage()."<br>";
    die();
}

#print_r($_POST);

$query="SELECT d.departmentname, d.doctorname, CAST(IFNULL( AVG( c.ratings ) , 0 ) as UNSIGNED) Ratings
        FROM p_doctors d
        LEFT OUTER JOIN p_comments_ratings c ON d.doctorname = c.doctorname
        AND d.departmentname = c.department
        GROUP BY d.departmentname, d.doctorname
        ORDER BY IFNULL( AVG( c.ratings ) , 0 ) DESC";
$result=mysqli_query($conn, $query);
print_r(mysqli_error($conn));




echo '<table>';
echo '<tr>';
    echo '<th>Department</th>';
    echo '<th>Doctor</th>';
    echo '<th>Rating given by Patients</th>';
    
echo '</tr>';

while($doctor=mysqli_fetch_assoc($result)){
    #print_r(mysqli_fetch_assoc($result));
    
    echo '<tr><td>'.$doctor['departmentname'].'</td>';
    echo '<td>'.$doctor['doctorname'].'</td>';
    echo '<td id="left">'.$doctor['Ratings'].'</td></tr>';    
}


echo '</table>';
}else
    echo '<div class="error">Please Log In!</div>';
include('templates/foot.php');

?>

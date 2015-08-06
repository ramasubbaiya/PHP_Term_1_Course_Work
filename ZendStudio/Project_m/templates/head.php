<!DOCTYPE>
<html>
<head>
    <title>
        The Best Doctors
    </title>
    <link rel="stylesheet" href="css/styles.css"/>
</head>
<body>
    <header>
        <?php  
        //echo"hi";
        $conn=mysqli_connect("127.0.0.1", "PHP20", "PHP20", "PHP20");
        $query="SELECT  imagelocation FROM p_images WHERE imagename='Logo' ORDER BY dateuupdated DESC LIMIT 1 ";
        $result=mysqli_query($conn, $query);
        $array=mysqli_fetch_array($result);
        $target=$array[0];
        ?>
        <a href="http://174.79.32.158:10088/students/PHP20/Project/Home.php" title="Home"><img src="<?php echo $target; ?>"  alt="Logo"></a>
        <h1>The Best Doctors</h1>
    </header>


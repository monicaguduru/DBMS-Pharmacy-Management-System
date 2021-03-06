<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
    $id=$_SESSION['manager_id'];
    $fname=$_SESSION['first_name'];
    $lname=$_SESSION['last_name'];
    $sid=$_SESSION['staff_id'];
    $user=$_SESSION['username'];
}
else{
    header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title><?php $user?> Pharmacy Sys</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<script src="js/function1.js" type="text/javascript"></script>
   <style>#left-column {height: 477px;}
 #main {height: 477px;}
</style>
</head>
<body>
<div id="content">
<div id="header"><br>
<h1 align="center"><a href="#">Pharmacy System</a></h1></div>
<div id="left_column">
<div id="button">
		<ul>
			<li><a href="view.php">View Users</a></li>
			<li><a href="view_prescription.php">View Prescriptions</a></li>
			<li><a href="stock.php">Manage Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>View Prescription</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">Prescription </a></li>  
                          
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message1;
		include_once('connect_db.php');
        $result = mysqli_query($con,"SELECT * FROM prescription")or die(mysqli_error());
		echo "<table border='1' cellpadding='5'>";
        echo "<tr> <th>Customer</th><th>Prescription N<sup>o</sup></th> <th>Date </th></tr>";
        while($row = mysqli_fetch_array( $result )) {
                echo "<tr>";
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['prescription_id'] . '</td>';		
				echo '<td>' . $row['date'] . '</td>';
				?>
				
				<?php
		} 
        echo "</table>";
?> 
        </div>  

    </div>  
</div>
</div>
</div>
</body>
</html>
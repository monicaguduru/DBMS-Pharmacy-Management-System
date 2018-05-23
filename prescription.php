<?php
session_start();
include_once('connect_db.php');
if(isset($_SESSION['username'])){
	$id=$_SESSION['pharmacist_id'];
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
<title><?php echo $user;?> -Pharmacy System</title>
<link rel="stylesheet" type="text/css" href="style/mystyle.css">
<link rel="stylesheet" href="style/style.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="style/table.css" type="text/css" media="screen" /> 
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="js/function.js" type="text/javascript"></script>
<script type="text/javascript" SRC="js/jquery-1.4.2.min.js"></script>
	<script type="text/javascript" SRC="js/superfish/hoverIntent.js"></script>
	<script type="text/javascript" SRC="js/superfish/superfish.js"></script>
	<script type="text/javascript" SRC="js/superfish/supersubs.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){ 
			$("ul.sf-menu").supersubs({ 
				minWidth:    12, 
				maxWidth:    27, 
				extraWidth:  1    
								  
			}).superfish();
							
		}); 
	</script>
	<script>
function validateForm() {
    var value = document.myform.customer_name.value;
	if(value.match(/^[a-zA-Z]+(\s{1}[a-zA-Z]+)*$/)) {
        return true;
    }
    else {
        alert('Name Cannot contain numbers');
        return false;
    }
}
</script>
	<script SRC="js/cufon-yui.js" type="text/javascript"></script>
	<script SRC="js/Liberation_Sans_font.js" type="text/javascript"></script>
	<script SRC="js/jquery.pngFix.pack.js"></script>
	<script type="text/javascript">
		Cufon.replace('h1,h2,h3,h4,h5,h6');
		Cufon.replace('.logo', { color: '-linear-gradient(0.5=#FFF, 0.7=#DDD)' }); 
	</script>
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
			<li><a href="prescription.php">Prescription</a></li>
			<li><a href="stock_pharmacist.php">Stock</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>	
</div>
</div>
<div id="main">
<div id="tabbed_box" class="tabbed_box">  
    <h4>Prescription</h4> 
<hr/>	
    <div class="tabbed_area">  
      
        <ul class="tabs">  
            <li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">View </a></li>              
        </ul>  
          
        <div id="content_1" class="content">  
		<?php echo $message1;
		include_once('connect_db.php');
        $result = mysqli_query($con,"SELECT * FROM prescription")or die(mysqli_error());
		echo "<table border='1' cellpadding='5'align='center'>";
        echo "<tr> <th>Customer</th><th>Prescription N<sup>o</sup></th> <th>Date </th><th>Delete</th></tr>";
        while($row = mysqli_fetch_array( $result )) {
                echo "<tr>";
                echo '<td>' . $row['customer_name'] . '</td>';
                echo '<td>' . $row['prescription_id'] . '</td>';				
				echo '<td>' . $row['date'] . '</td>';
				?>
				<td><a href="delete_prescription.php?prescription_id=<?php echo $row['prescription_id']?>">
				<button type="button" class="btn btn-danger">Delete</button></a></td>
				<?php
		} 
        echo "</table>";
?> 
        </div>  
        <div id="content_2" class="content">   
</div>
</div>
</div>
</body>
</html>

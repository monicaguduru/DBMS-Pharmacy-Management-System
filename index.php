<?php
include_once 'connect_db.php';
if(isset($_POST['submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$position=$_POST['position'];
	switch($position){
	case 'Admin':
	$result=mysqli_query($con,"SELECT admin_id, username FROM admin WHERE username='$username' AND password='$password'");
	$row=mysqli_fetch_array($result);
	if($row>0){
		session_start();
		$_SESSION['admin_id']=$row[0];
		$_SESSION['username']=$row[1];
		header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/admin_pharmacist.php");
	}
	else{
		$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	case 'Pharmacist':
	$result=mysqli_query($con,"SELECT pharmacist_id, first_name,last_name,staff_id,username FROM pharmacist WHERE username='$username' AND password='$password'");
	$row=mysqli_fetch_array($result);
	if($row>0){
		session_start();
		$_SESSION['pharmacist_id']=$row[0];
		$_SESSION['first_name']=$row[1];
		$_SESSION['last_name']=$row[2];
		$_SESSION['staff_id']=$row[3];
		$_SESSION['username']=$row[4];
		header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/prescription.php");
	}
	else{
		$message="<font color=red>Invalid login Try Again</font>";
	}
		break;
		
	case 'Manager':
	$result=mysqli_query($con,"SELECT manager_id, first_name,last_name,staff_id,username FROM manager WHERE username='$username' AND password='$password'");
	$row=mysqli_fetch_array($result);
	if($row>0){
		session_start();
		$_SESSION['manager_id']=$row[0];
		$_SESSION['first_name']=$row[1];
		$_SESSION['last_name']=$row[2];
		$_SESSION['staff_id']=$row[3];
		$_SESSION['username']=$row[4];
		header("location:http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/view.php");
	}
	else{
	$message="<font color=red>Invalid login Try Again</font>";
	}
	break;
	}
}
echo <<<LOGIN
<!DOCTYPE html>
<html>
<head>
<title>Pharmacy</title>
<link rel="stylesheet" type="text/css" href="style/mystyle_login.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<style>
#content {
height: auto;
}
#main{
height: auto;}
</style>
</head>
<body>
<div id="content">
<div id="header"><br>
<h1 align="center"><a href="#"> Pharmacy System</a></h1></div>
</div><center>
<div id="main">

  <section class="container">
  
     <div class="login">
      <h1>Login here</h1><br><br>
	  $message
      <form method="post" action="index.php">
		 <p><input type="text" name="username" value="" placeholder="Username"></p>
        <p><input type="password" name="password" value="" placeholder="Password"></p>
		<p><select name="position">
		<option>--Select position--</option>
			<option>Admin</option>
			<option>Pharmacist</option>
			<option>Manager</option>
			</select></p>
        <p class="submit"><input type="submit" name="submit" value="Login" class="btn btn-success"></p>
      </form>
    </div>
    </section>
</div>
</div></center>
</body>
</html>
LOGIN;
?>

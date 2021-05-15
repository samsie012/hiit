
<?php

if($_POST){

	// Database configuration
	$dbHost     = "localhost";
	$dbUsername = "root";
	$dbPassword = "";
	$dbName     = "auth";

	 // Create database connection
	$db = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);


	    //database query with variables
	    $username= $_POST['username'];
	    $password= $_POST['password'];

      //database query
	    $query="SELECT * FROM users where username ='$username' and password='$password'";
	    //$result=mysqli_query($db, $query);
	    $result = $db->query($query);

       
     // Start session if query is true
	    if(mysqli_num_rows($result)==1){
	    session_start();
	    $_SESSION['auth'] = 'true';
	    header('location:index.php');
	    }
	    else{
	    echo "<script> alert('Wrong username or password')</script>";
	    }
	


}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Modsl test</title>
	<script type="text/javascript" src="jquery-3.5.1.js"></script>
	<link rel="stylesheet" href="bootstrap.css">

	
		<script type="text/javascript" src="bootstrap.js"></script>
<style>
	.bd{
		background-color: black;
	}
	#fm{
		
		border-radius: 5px;
    background-color: #f2f2f2;
    padding: 30px;}

</style>
	</head>
	

<body class="bd">


	<br><br><br>
	<div class="container">
	<div class="row">
		<div class="col-sm-6 mx-auto">
		
			<div id="fm">






	<form method="POST" >
	  <div class="form-group">
		<label for="exampleInputEmail1">Username</label>
		<input name="username" type="text" class="form-control" >
		
	  </div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input name="password" type="password" class="form-control" id="exampleInputPassword1">
	  </div>
	  
	 <input type="submit" value="Login"> </form>
	</div>
	</div>  
</div>
</div>


	
  
</body>

</html>

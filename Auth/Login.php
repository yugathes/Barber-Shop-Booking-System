<?php include('DataBase.php') ?>
<html>
<head>
	<title> Login Page </title>
	<link rel="stylesheet" type="text/css" href="../CSS/topNav.css"> </link>
</head>
<body>
	<div class="wrapper">
		<div class="middle">
			<div class="contentnew">
			<form class= "content" method = "post">
				<h1 class="header">Login Here</h1>
					<div class="input-group">
						<?php include('Errors.php');?><br>
						<input type="text" placeholder="Username" name = "username"/></br></br>
						<input type="password" placeholder="Password" name = "password"/></br></br>
						<button type="submit" class="btn" name="login_user">Login</button>
						<p>Don't have an account? <a href="register.php">Register</a> </p>
						<p>Home Page <a href="../index.php">Home</a> </p>
					</div> 
			</form>
			</div>
		</div> 	
	</div>    
</body>
</html>









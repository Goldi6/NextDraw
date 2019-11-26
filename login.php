<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<header>
	<h1>NEXT DRAW</h1>

</header>
<hr>
<button id="signin-btn">Signin</button><button id="signup-btn"><a href="registration.php">Signup</a></button>
<hr>
<div class="bg-modal">
	<div class="modal-content">
		<div class="header">
			<span class="close">&times;</span>
  			<h2>Login</h2>
		</div>
	 
		<form method="post" action="login.php">
  			<?php include('errors.php'); ?>
			<div class="input-group">
  				
  				<input type="text" name="username" placeholder="Username">
			</div>
  			<div class="input-group">
  				
  				<input type="password" name="password" placeholder="Password">
  			</div>
  			<div class="input-group">
  				<button type="submit" class="btn" name="login_user" value="1">Login</button>
  			</div>
  				<p>Not yet a member? <a href="registration.php">Sign up</a></p>
		</form>
	</div>
</div>
</body>
<script>
	document.getElementById('signin-btn').addEventListener('click',function() {
		document.querySelector('.bg-modal').style.display = 'flex';
	});
	document.querySelector('.close').addEventListener('click',function() {
		document.querySelector('.bg-modal').style.display = 'none'
	});
</script>
</html>
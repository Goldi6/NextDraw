<?php include('server.php') ?>
<?php 	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must login first";
		//header("location: index.php");
		}
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['username']);
		header("location: index.php");
		}
?>
<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
	<div id="welcome" style="margin:20px 15px 0 15px;">
		<span style="color:red; ">Welcome <strong><?php echo $_SESSION['username']; ?></strong></span>
		<span style="color:red; float:right; "><?php echo "Today is " . date("d.m.Y") . "<br>"; ?></span><br>
    	<span> <a href="index.php?logout='1'" style="color: blue;">Logout</a> </span>
		<span style="color:red; float:right;"><?php echo "and it's " . date("l") ?> </span>
	</div>
    <?php endif ?>
	
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Mansalva&display=swap" rel="stylesheet">
    <link href="NextDraw.css" rel="stylesheet" type="text/css" />

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	
    <title>Next Draw</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />
	<meta name="keywords" content="ND,draw,next, art, artist, painter, contest, drawing , battle,
	!!!, war, mart, extra, tera, ext, rex, raw, net, xet, rat, max, ad, den, da, text, era,rem, man, atem, mer, ">
	<meta name="description" content="">
</head>
<body>
    <div id="layout" >
        <header class="webtop">
            <div id="header">
			
                <h1>
					<a href="index.php">Next Draw</a>
                </h1>
            </div>
			
            <hr />
            <div id="members">

			 <?php if(!isset($_SESSION['username'])) : ?>
				
				
               <button type="button" id="signin-btn"><b>Sign in</b></button>
				<div class="bg-modal">
					<div class="modal-content">
						<div class="header">
							<span class="close">&times;</span>
  							<h2>Login</h2>
						</div>
	 
						<form method="post" action="index.php">
  							<?php include('errors.php'); ?>
							<div class="input-group">
  				
  								<input type="text" class="login" name="username" placeholder="Username" >
							</div>
  							<div class="input-group">
  				
  								<input type="password" class="login" name="password" placeholder="Password">
  							</div><!--
							<div class="input-group">
								<input class="rememberme" type="checkbox" name="rememberme" value="1"><label>Remember me</label>
							</div> -->
							
								
  							<div class="input-group">
  								<button type="submit" class="btn" name="login_user" value="1">Login</button>
  							</div>
  							<p>Not yet a member? <a href="index.php?page=registration" class="login-links">Sign up</a></p>
							<p>Forgot <a href="#" class="login-links">username</a> or <a href="#" class="login-links">password</a>?
						</form>
					</div>
				</div>
				
				 
			
                
                <button id="signup-btn"><b><a href="index.php?page=registration">Sign Up</a></b></button>

				
				<?php endif ?>
			

            </div>
		
			<hr />
			<?php 
			if (isset($_SESSION ['username'])) : ?>
			<nav id="menunav" class="navbar navbar-inverse" data-spy="affix" data-offset-top="250" >
				 <button onclick="window.location.href='index.php?page=main'" class="menubtn active" >Home</button>
				 <button onclick="window.location.href='index.php?page=gallery'" class="menubtn">Gallery</button>
				 <button class="menubtn">Music</button>
				 <button class="menubtn" onclick="window.location.href='index.php?page=record'">Leaderboard</button>

			</nav>
			<!--if there will be an option to view whitout registration
			<div class="2nav">
				<button class="nav2"><a hraf="index.php?page=main">main</a></button>
				<button class="nav2"><a href="index.php?page=gallery">gallery</a></bitton>
			</div>-->
			<?php endif ?>
		</header>
		<?php if (!isset($_SESSION ['username'])) : ?>

		<div class="intro" style="color:black; text-align: center;">
			<p style="color:white; text-align: center;">this is the intro</p>
			<h3>Hello everyone!</h3>
			<p>Yoe came to a brand new website! witch is a base for artists and painters.</p>
			<p>for now you can sign up and create your own gallery.</p>
			<p>With a few updates you will be able to see other users page,with public galleries ,
			leave comment's and offer a battle!</p>
		</div>
		<?php endif ?>

		<?php
			if (isset($_SESSION ['username'])) : ?>
			<div class="index">
				<aside class="infoaside">
				<p>this is an aside</p>
				</aside>
				<!--<div class="centered">-->
					<div class="main">
            <?php
				include isset($_GET['page']) ? $_GET['page'].'.php' : 'main.php';?>
					</div>
				<!--</div>-->
				<aside id="addsaside">
					<div class="add">
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>

					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>
					<p>add..........................</p>

					</div>
				 </aside>
			</div>
		<?php endif ?>

        <footer>
            Contact us on <a href="mailto:nextdraw.arts@gmail.com?subject=enter your subject please">nextdraw.arts@gmail.com</a>
        </footer>
    </div>

   
	<script>
		
		document.getElementById('signin-btn').addEventListener('click',function() {
			document.querySelector('.bg-modal').style.display = 'flex';
			
		});
		document.querySelector('.close').addEventListener('click',function() {
			document.querySelector('.bg-modal').style.display = 'none'
		});
	</script>
	<script>
		window.onscroll = function() {myFunction()};

		var manunav = document.getElementById("manunav");
		var sticky = adds.offsetTop;

		function myFunction() {
		 if (window.pageYOffset >= sticky) {
		 manunav.classList.add("sticky")
		 } else {
		  manunav.classList.remove("sticky");
		}
		}
	</script>
	<script>
	// Add active class to the current button (highlight it)
		var header = document.getElementById("menunav");
		var btns = header.getElementsByClassName("menubtn");
		for (var i = 0; i < btns.length; i++) {
		  btns[i].addEventListener("click", function() {
		  var current = document.getElementsByClassName("active");
		  current[0].className = current[0].className.replace(" active", "");
		  this.className += " active";
		  });
		}
	</script>
	<script>
	
	</script>

</body>
</html>
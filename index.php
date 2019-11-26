<?php include('server.php') ?>
<?php 	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}
	if (!isset($_SESSION['username'])) {
		$_SESSION['msg'] = "You must login first";
		header("location:index.php");
		
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
    	<p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
    	<p> <a href="index.php?logout='1'" style="color: red;">logout</a> </p>
    <?php endif ?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="https://fonts.googleapis.com/css?family=Mansalva&display=swap" rel="stylesheet">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
    <link href="NextDraw.css" rel="stylesheet" />
	
    <title>Next Draw</title>
    <meta name="viewport" content="width=device-width,initial-scale=1" />

</head>
<body>
    <div id="layout">
        <header>
            <div id="header">
                <h1>
					Next Draw
                </h1>
            </div>
			
            <hr />
            <div id="members">
                <button type="button" id="signin-btn"<b>Sign in</b></button>
				<div class="bg-modal">
					<div class="modal-content">
						<div class="header">
							<span class="close">&times;</span>
  							<h2>Login</h2>
						</div>
	 
						<form method="post" action="index.php">
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
  							<p>Not yet a member? <a href="index.php?page=registration">Sign up</a></p>
						</form>
					</div>
				</div>
				
				 
			
                
                <button type="button" id="signup-btn"><b><a href="index.php?page=registration">Sign Up</b></a></button>
                
            </div>
		</header>
			<hr />
			<nav>
				 <button class="menubtn">Home</button>
				 <button  class="menubtn"><a href="index.php?page=gallery">Gallery</a></button>
				 <button class="menubtn">Music</button>
				 <button class="menubtn">Leaderboard</button>

			</nav>
		</header>
        <div class="main">
            <?php
				include isset($_GET['page']) ? $_GET['page'].'.php' : 'main.php';
			?>
		</div>	
        <aside>
            <div class="add">add</div>
        </aside>

        <footer>
            <button id="contactus">Contact us</button>
        </footer>
    </div>
    <!--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>-->
	<script>
		document.getElementById('signin-btn').addEventListener('click',function() {
			document.querySelector('.bg-modal').style.display = 'flex';
		});
		document.querySelector('.close').addEventListener('click',function() {
			document.querySelector('.bg-modal').style.display = 'none'
		});
	</script>
</body>
</html>


<?php 
	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	$username = "";
	$email = "";
	$errors = array();
	//connect to the database
	$db = mysqli_connect('localhost', 'root', '', 'nextdraw_db');

	//register user
	if (isset($_POST['reg_user'])) {
		//recive input values
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
		
		//form validation
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
		if ($password_1 != $password_2) {array_push($errors, "The two passwords do not match"); }

		//check if the user is already exists
		$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1 ";
		$result = mysqli_query($db, $user_check_query);
		$user = mysqli_fetch_assoc($result);

		if ($user) {//if user exists
			if ($user['username'] === $username) {
				array_push($errors, "Username already exists") ;
			}
			if ($user['email'] === $email) {
				array_push($errors, "Email already exists");
			}
		}

		//register if there are no errors
		if (count($errors) == 0) {
		
			$password = password_hash($password_1, PASSWORD_DEFAULT);
			$query= "INSERT INTO users (username, email, password)
				VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: index.php');
		}
	}

	//login
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']);
		$password_plain = mysqli_real_escape_string($db, $_POST['password']);

		if (empty($username)) {
			array_push($errors, "Username is required");
		}
		if (empty($password_plain)) {
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$query = "SELECT * FROM users WHERE username='$username'";
			$result = mysqli_query($db, $query);
			$data = mysqli_fetch_assoc($result);

			if (password_verify($password_plain, $data['password'])) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: index.php');
			}
			else {
				array_push($errors, "Wrong username/password combination");
			}
		
		}
	}
	?>
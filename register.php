<?php session_start(); include_once 'function.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title>Register</title>
	</head>
	<body>
		<?php
			if (isset($_POST['register'])) {
				Register($_POST['username'], $_POST['password'], $_POST['repassword']);
			}
		?>

		<?php 
		if (isset($_SESSION['username'])) header('location: '.BaseUrl()); 
		else { 
		?>
			<form method="POST" action="<?php echo BaseUrl().'register.php'; ?>" id="register-form">
				<h1>Register</h1>
			    <?php if (isset($_GET['rmsg'])) { ?>
			       <p>
			          <?php echo $_GET['rmsg']; ?>
			       </p>
			    <?php } ?>
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="repassword" placeholder="Re-Password">
				<button type="submit" name="register">Register</button>
			</form>
			
			<p>Do you already have an account? <a style="color:#f1c40f;" href="<?php echo BaseUrl(); ?>">Login!</a></p>
		<?php } ?>
	</body>
</html>
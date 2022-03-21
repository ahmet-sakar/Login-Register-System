<?php session_start(); include_once 'function.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="style.css">
		<title>Login</title>
	</head>
	<body>
		<?php
			if (isset($_POST['login'])) {
				Login($_POST['username'], $_POST['password']);
			}
		?>

		<?php if (isset($_SESSION['username'])) { ?>
			<div class="welcome">
				<?php echo "Welcome ".$_SESSION['username']; ?>
			    <a href="logout.php">Logout</a>
			</div>
		<?php } else { ?>
			<form method="POST" action="<?php echo BaseUrl(); ?>" id="login-form">
			    <h1>Login</h1>
			    <?php if (isset($_GET['lmsg'])) { ?>
			       <p>
			          <?php echo $_GET['lmsg']; ?>
			       </p>
			    <?php } ?>
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
			    <button type="submit" name="login">Login</button>
			</form>
			
			<p>Don't you have an account? <a style="color:#f1c40f;" href="<?php echo BaseUrl().'register.php'; ?>">Register!</a></p>
		<?php } ?>
	</body>
</html>
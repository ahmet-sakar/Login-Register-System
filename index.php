<?php session_start(); include_once 'function.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Login Or Register</title>
	</head>
	<body>
		<?php
			if (isset($_POST['login'])) {
				Login($_POST['username'], $_POST['password']);
			}

			if (isset($_POST['register'])) {
				Register($_POST['username'], $_POST['password'], $_POST['repassword']);
			}
		?>

		<?php if (isset($_SESSION['username'])) { ?>
			<p>
				<?php echo "Welcome ".$_SESSION['username']; ?>
			</p>

			<a href="logout.php">Logout</a>
		<?php } else { ?>
			<form method="POST" action="/">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<button type="submit" name="login">Login</button>
			</form>

			<form method="POST" action="/">
				<input type="text" name="username" placeholder="Username">
				<input type="password" name="password" placeholder="Password">
				<input type="password" name="repassword" placeholder="Re-Password">
				<button type="submit" name="register">Register</button>
			</form>
		<?php } ?>
	</body>
</html>

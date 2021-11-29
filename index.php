<?php session_start(); include_once 'function.php'; ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Ana Sayfa</title>
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
				<?php echo 'Hoş Geldin '.$_SESSION['username']; ?>
			</p>

			<a href="logout.php">Çıkış Yap</a>
		<?php } else { ?>
			<form method="POST" action="/">
				<input type="text" name="username" placeholder="Kullanıcı adı">
				<input type="password" name="password" placeholder="Şifre">
				<button type="submit" name="login">Giriş Yap</button>
			</form>

			<form method="POST" action="/">
				<input type="text" name="username" placeholder="Kullanıcı adı">
				<input type="password" name="password" placeholder="Şifre">
				<input type="password" name="repassword" placeholder="Şifre Tekrar">
				<button type="submit" name="register">Kayıt Ol</button>
			</form>
		<?php } ?>
	</body>
</html>

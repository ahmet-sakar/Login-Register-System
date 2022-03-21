<?php
	function Connect($ServerName, $dbUsername, $dbPassword, $dbName) 
	{
		$connect = mysqli_connect($ServerName, $dbUsername, $dbPassword, $dbName);
		if (!$connect) echo "Database Error!";
	}

	function Login($username, $password)
	{
		if (!empty($username) && !empty($password)) {
			$connect = mysqli_connect('localhost', 'root', '', 'ahmet');
			$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$query = mysqli_query($connect, $sql);

			if (mysqli_num_rows($query) > 0) {
				$row = mysqli_fetch_array($query);
				
				if ($row['username'] == $username && $row['password'] == $password) {
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					header("location: /");
					die();
				} else echo 'Username or password is incorrect!';
			} else echo 'Such a user is not registered!';
		}
	}

	function Register($username, $password, $repassword)
	{
		if (!empty($username) && !empty($password) && !empty($repassword)) {
			$connect = mysqli_connect('localhost', 'root', '', 'ahmet');
			$sql = "INSERT INTO users(username, password) VALUES('$username', '$password')";
			$query = mysqli_query($connect, $sql);
			if ($query) echo 'Registration Successful!';
			else echo 'Registration failed!';
		}
	}
?>

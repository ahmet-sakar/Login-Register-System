<?php
  	function Connect($ServerName, $dbUsername, $dbPassword, $dbName) {
		$connect = mysqli_connect($ServerName, $dbUsername, $dbPassword, $dbName);
		if (!$connect) echo "Database Error!";
		return $connect;
	}

	function Login($username, $password) {
		if (!empty($username) && !empty($password)) {
			$connect = Connect('Your Hostname/Address', 'Your Username', 'Your Password', 'DbName');
			$sql = "SELECT * FROM users WHERE username='$username'";
			$query = mysqli_query($connect, $sql);

			if (mysqli_num_rows($query) > 0) {
				$row = mysqli_fetch_array($query);
				
				if ($row['username'] == $username && $row['password'] == $password) {
					$_SESSION['id'] = $row['id'];
					$_SESSION['username'] = $row['username'];
					header("location: ".BaseUrl());
					die();
				} else $_GET['lmsg'] = 'Password is incorrect!';
			} else $_GET['lmsg'] = 'User not registered!';
		}
	}

	function Register($username, $password, $repassword) {
		if (!empty($username) && !empty($password) && !empty($repassword)) {
			$connect = Connect('Your Hostname/Address', 'Your Username', 'Your Password', 'DbName');
			$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$query = mysqli_query($connect, $sql);
			if (mysqli_num_rows($query) == 0) {
			   $sql = "INSERT INTO users(username, password) VALUES('$username', '$password')";
			   $query = mysqli_query($connect, $sql);
			   if ($query) echo 'Registration Successful!';
			   else $_GET['rmsg'] = 'Registration failed!';
			} else $_GET['rmsg'] = 'User already registered';
		} 
	}
	
	function BaseUrl() {
		return Domain().Path();
	} 
	
	function Path() {
        $path = '';
	    $dir = array_reverse(explode('/', __DIR__));
	    $output = ['/'];

	    for ($i = 0; $i < count($dir); $i++) {
	        if ($dir[$i] == 'htdocs' || $dir[$i] == 'public_html') break;
	        else array_push($output, $dir[$i], '/');
	    }
		    
	    $reverse = array_reverse($output);
        for ($i = 0; $i < count($output); $i++) $path .= $reverse[$i];
        return $path;
	}
	
	function Domain() {
	    if ($_SERVER['HTTPS'] == 'on') return "https://".$_SERVER['HTTP_HOST'];
	    else return "http://".$_SERVER['HTTP_HOST'];
	}
?>
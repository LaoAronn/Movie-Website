<?php

	session_start();

	// prevent users from accessing this file directly
	if (!isset($_POST["Login"])) {
		header("Location: login.php");
	} else {
		
		// handle the form submission
		$error_user = "Username not entered!<br>";
		$error_pass = "Password not entered!<br>";
		if ($_POST["username"] == "") {
			$_SESSION["error_Uentry"] = $error_user;
			header("Location: login_check.php");
		} else if ($_POST["password"] == "") {
			$_SESSION["error_Pentry"] = $error_pass;
			header("Location: login_check.php");
		} else {
			$hostname = "localhost";
			$dbname   = "Aronnhw";
			$root = "root";
			$pass = "";
			
			$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $root, $pass);
			$username = $_POST["username"];
			$error = "username/password incorrect.<br>";
			$password = $_POST["password"];
			
			$sql = "SELECT username, password FROM users WHERE username=:u AND password=md5(:p)";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(":u"=>$username,":p"=>$password));
			$db_username = $stmt->fetchColumn();
			var_dump($db_username);
			if ($db_username == false) {
				$_SESSION["error"] = $error;
				header("Location: login_check.php");
			} else {
				$_SESSION["user_id"] = $db_username;
				setcookie("uid", $db_username, time() + 60 * 60);
				header("Location: home.php?user_id=" . $db_username); 
			}
		}
	}
?>
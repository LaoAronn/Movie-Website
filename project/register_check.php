<?php

	session_start();

	// prevent users from accessing this file directly
	if (!isset($_POST["Submit"])) {
		header("Location: register2.php");
	} else {

		$hostname = "localhost";
		$dbname   = "Aronnhw";
		$root = "root";
		$pass = "";

		$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $root, $pass);
		
		$username = $_POST["username"];
		$password = $_POST["password"];

		$findusername = $pdo->prepare("SELECT * FROM users WHERE username=?");
		$findusername->execute(array($username));
		$result = $findusername->fetchAll();

		// handle the form submission
		if (!empty($result)){
			$_SESSION["error_usertaken"] = "Username taken!<br>";
			header("Location: register.php");
		} else if ($_POST["username"]=="") {
			$_SESSION["error_Userid"] = "Username not set!<br>";
			header("Location: register.php");
		} else if ($_POST["password"]=="") {
			$_SESSION["error_pass"] = "Password not set!<br>";
			header("Location: register.php");
		} else if ($_POST["password"]!=$_POST["cpassword"]) {
			$_SESSION["error_cpass"] = "Passwords don't match!<br>";
			header("Location: register.php"); 
		} else {		
			$sql = "insert into users (username, password) VALUES (:u, md5(:p))";
			$stmt = $pdo->prepare($sql);
			$stmt->execute(array(":u"=>$username,":p"=>$password));
			header("Location: login.php");
		}
	}
?>


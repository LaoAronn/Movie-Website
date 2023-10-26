<?php
	session_start();

	// prevent users from accessing this file directly
	if (!isset($_POST["submit"])) {
        header("Location: movies.php");
	} else {
		
        // handle the form submission (IF ANY BUTTONS ARE NOT SELECTED / MOVIES UNRATED)
		if (isset($_POST["but_1"]) || isset($_POST["but_2"]) || isset($_POST["but_3"]) || isset($_POST["but_4"]) || isset($_POST["but_5"])) {
			$_SESSION["error_unrated"] = "You haven't give any ratings yet, Please try again!";
			header("Location: rating_check.php");
		} else {
			
            $hostname = "localhost";
            $dbname   = "Aronnhw";
            $root = "root";
            $pass = "";

            $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $root, $pass);
            
            // FINDING OUT MOVIE ID
            $selected_movie = $_POST["movies"];
            $movieid = "SELECT movie_id FROM movies WHERE title = '$selected_movie'";
            $movie_stmt = $pdo->prepare($movieid);
            $movie_stmt->execute();
            $movie_stmt2 = $movie_stmt->fetch();
            var_dump($movie_stmt2);

            // FINDING OUT USER ID
            $u = $_COOKIE["uid"];
            $userid = "SELECT user_id FROM users WHERE username = '$u'";
            $user_stmt = $pdo->prepare($userid);
            $user_stmt->execute();
            $user_stmt2 = $user_stmt->fetch();

            // FINDING OUT THE RATING
            $rating = $_POST["but"];
            
            
            $sql = "insert into ratings (movie_id, user_id, rating) VALUES (:m, :u, :r)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(":m"=>$movie_stmt2[0], ":u"=>$user_stmt2[0], ":r"=>$rating));
            var_dump($stmt);
            header("Location: home.php");
            
		}
	}
?>
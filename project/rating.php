<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login</title>
  <link rel="shortcut icon" type="images/png" href="images/popcorn.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
	.form-container{
		background: #FFFFFF;
		padding: 30px;
		border-radius: 15px;
		box-shadow: 0px 0px 10px 0px #000000;
		position: absolute;
		top: 15vh;
	}

	body{
		background: url(images/stars.jpg);
		background-size: 100%;
	}

	.navbar{
	margin: 0;
	}

	.form-group{
		text-align: center;
	}
	
	pre {
		border: 0; 
		background-color: transparent;
	}

	/* HIDE RADIO */
	[type=radio]{
		position: absolute;
		opacity: 0;
		width: 0;
		height: 0;
	}

	/* IMAGE STYLES */
	[type=radio] + img{
		cursor: pointer;
		width: 30px; 
		height: 30px;
	}

	/* CHECKED STYLES */
	[type=radio]:checked + img{
		width: 40px; 
		height: 40px; 
		border: #ffffff00;
	}


  </style>
</head>

<body>


<nav class="navbar navbar-inverse">
	<div class="container-fluid">

	<div class="navbar-header">
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>                        
	</button>

	<!-- LOG IN / ANONYMOUS USER-->
	<?php if (isset($_COOKIE["uid"])){ ?>
	<a class="navbar-brand" href="#"> <span class="glyphicon glyphicon-user"></span> <?php echo $_COOKIE["uid"]?> </a>
	<?php } else { ?>
	<a class="navbar-brand" href="#">Rate a Movie!</a>
	<?php }?>

	</div>

	<!-- UL -->
	<div class="collapse navbar-collapse" id="myNavbar">
		<ul class="nav navbar-nav">
		<li><a href="home.php"> <span class="glyphicon glyphicon-home"\> Home</a></li>
		
		<li> <a href="movies.php"> <span class = "glyphicon glyphicon-facetime-video"\> Movies </a></li>

		<li><a href="search.php"> <span class="glyphicon glyphicon-search"></span> Search Movie </a></li>

		<li><a href="user_ratings.php"> <span class="glyphicon glyphicon-star-empty"></span> Your Rated Movies </a></li>
		<li><form name="f3" method="post" action="signout.php" class="form-contain"> <button type="submit" class="btn btn-default" name="Logout" value="Logout" style="margin:6px;"><span class="glyphicon glyphicon-log-out"\> Logout</button> </form></li>
		
		
	</ul>
	</div>
	</div>

</nav>

<div class="container">

  <section class="row">

    <section class="col-md-4 col-md-offset-4">

	  <form name="f2" method="POST" action="rating_check.php" class="form-container">
	  		<div class="form-group">
				<!-- Header -->
				<h3> Rate a Movie!!! </h3> 
				<div class="mb-1 text-muted" style="color: red;">You can only rate a movie ONCE</div> <br>

				<select name="movies" required>
					
					<?php 
					$hostname = "localhost";
					$dbname = "Aronnhw";
					$root = "root";
					$pass = "";

					
					$pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $root, $pass);
					$u = $_COOKIE["uid"];
					$movies = "SELECT title FROM movies WHERE movies.movie_id NOT IN (SELECT r.movie_id FROM ratings as r WHERE r.user_id = (SELECT u.user_id FROM users as u WHERE username = '$u' ))";
					$stmt = $pdo->prepare($movies);
					$stmt->execute();
					$movies = $stmt->fetchAll();

					foreach($movies as $movie){ 
						echo "<option value='$movie[0]'>$movie[0]</option>";	
					}?>
					
					
				</select>


				<!-- Rating (in stars) -->
				<br><br>
				<pre style="margin-bottom: 0; font-size: 17px;"> 1   2   3   4   5</pre>

				<!-- 1 Star  -->
				<label>
					<input type="radio" name="but" value="1" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
					<img src="images/star.jpg">
				</label>

				<label>
					<input type="radio" name="but" value="2" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
					<img src="images/star.jpg">
				</label>

				<label>
					<input type="radio" name="but" value="3" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
					<img src="images/star.jpg">
				</label>

				<label>
					<input type="radio" name="but" value="4" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
					<img src="images/star.jpg">
				</label>

				<label>
					<input type="radio" name="but" value="5" class="btn btn-warning btn-sm rateButton" aria-label="Left Align">
					<img src="images/star.jpg">
				</label>


				<br><br><button type="submit" class="btn btn-default" name="submit" value="submit">Submit</button>
				
				<!-- ERROR CHECKING-->
				<?php
				if(isset($_SESSION["error_unrated"])){
					$error = $_SESSION["error_unrated"];
					echo "<span>$error</span>";
				}
				?>
				
			</div>

      </form>

    </section>

  </section>

</div>
  
</body>
</html>

<?php
    unset($_SESSION["error_unrated"]);
?>





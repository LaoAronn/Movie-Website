<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <link rel="shortcut icon" type="images/png" href="images/popcorn.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>
    .upcoming_movies{
      min-width: 600px;
      height: 340px;
    }

    body{
      background: rgb(254,215,232);
      background: radial-gradient(circle, rgba(254,215,232,1) 0%, rgba(165,188,214,1) 95%);
    }
    
    .title {
      display: inline-block;
      background-image: URL(images/sign.png);
      height: 200px;
      width: 420px;
      margin-left: 50px;
      margin-right: 50px;
      background-size: 100%;
      background-repeat: no-repeat;
    }

    .column_title{
      padding-top: 65px;
      padding-left: 80px;
      width: 330px;
      margin: none;
    }

    .column_img img{
      position: relative;
      float: right;
      width: 100px;
      height: 100px;
      margin-right: 50px;
    }

    .column {
      display: inline-block;
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
        <li class="active"><a href="home.php"> <span class="glyphicon glyphicon-home"\> Home</a></li>
        
        <li> <a href="movies.php"> <span class = "glyphicon glyphicon-facetime-video"\> Movies </a></li>

        <li><a href="search.php"> <span class="glyphicon glyphicon-search"></span> Search Movie </a></li>

        <!-- User Account LOGGED IN / LOGGED OUT SITUAION-->
        <?php if (isset($_COOKIE["uid"])){ ?>
        <li><a href="user_ratings.php"> <span class="glyphicon glyphicon-star-empty"></span> Your Rated Movies </a></li>
        <li><form name="f3" method="post" action="signout.php" class="form-container"> <button type="submit" class="btn btn-default" name="Logout" value="Logout" style="margin:6px;"><span class="glyphicon glyphicon-log-out"\> Logout</button> </form></li>
        <?php } else { ?>
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Account
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="login.php">Login</a></li>
              <li><a href="register.php">Sign Up</a></li>
            </ul>
        </li>
        <?php }?>
 
    </ul>
    </div>
  </div>

</nav>

<div class="container">
  <div class="row">

    <div class="col-sm-4">

      <?php if (isset($_COOKIE["uid"])){?>
      <h2> Welcome, <?php echo $_COOKIE["uid"]?>!</h2>
      <p>Click below to start rating movies!</p>
      <ul class="nav nav-pills nav-stacked">
        <li><a href="rating.php">RATE MOVIES!</a></li>
        <li><a href="user_ratings.php">View your Rated Movies</a></li>
      </ul>
      <?php } else {?>
        <h3>Welcome!</h3>
        <p>In order to rate movies, please login first. If you do not have an account, you can click our Sign up button to start!</p>
        <ul class="nav nav-pills nav-stacked">
        <li><a href="login.php">Login</a></li>
        <li><a href="register.php">Sign up</a></li>
      </ul>
      <?php }?>
      
      <hr class="hidden-sm hidden-md hidden-lg">
    </div>

    <!-- New -->
    <div class="col-sm-8">
      <div class="title">
        <div class="column_title"> <h2> Upcoming movies! </h2> </div>
        <div class="column_img"> <img src="images/eat_popcorn.gif"\> </div>
      </div>

      <h2>Monster hunter</h2>
      <img src="images/monster_hunter.jpg" class="upcoming_movies"\>
      <h4>Release Date:  Dec 3, 2020</h4>
      <p>A portal transports Lt. Artemis and an elite unit of soldiers to a strange world where powerful monsters rule with deadly ferocity. Faced with relentless danger, the team encounters a mysterious hunter who may be their only hope to find a way home.</p>
      <br>

      <h2>SpaceJam 2</h2>
      <img src="images/spacejam2.jpg" class="upcoming_movies"\>
      <h4>Release Date: July 16, 2021</h4>
      <p>Basketball superstar and 2020 NBA Champion MVP, LeBron James, finds adventure with the Looney Tunes gang. After Michael Jordan's retirement in SPACEJAM1, he is abducted by Bugs Bunny from the Looney Tunes group and is asked to play a match to defeat the Nerdlucks, a criminal alien group led by Mister Swackhammer.</p>
      <br>
    </div>

  </div>
</div>

<!-- Footer -->
<div class="jumbotron text-center" style="margin-bottom:0">
  <p>Made by: Aronn Grant Laurel Y. </p>
</div>

</body>
</html>
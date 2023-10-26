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
      <a class="navbar-brand" href="#">Rate a Movie!</a>
    </div>

    <!-- UL -->
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
        <li><a href="home.php"> <span class="glyphicon glyphicon-home"\> Home</a></li>
        
        <li> <a href="movies.php"> <span class = "glyphicon glyphicon-facetime-video"\> Movies </a></li>

        <li><a href="search.php"> <span class="glyphicon glyphicon-search"></span> Search Movie </a></li>

        <!-- User Account -->
        <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> Account
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
            <li class="active"><a href="login.php">Login</a></li>
            <li><a href="register.php">Sign Up</a></li>
            </ul>
        </li>
    </ul>
    </div>
  </div>

</nav>

<div class="container">

  <section class="row">

    <section class="col-md-4 col-md-offset-4">

      <form name="f2" method="post" action="login_check.php" class="form-container">

        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" name="username" placeholder="Username here">
        </div>

        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Enter password">
        </div>
                
        <button type="submit" class="btn btn-default" name="Login" value="Login">Submit</button>

        <!-- ERROR CHECKING-->
        <?php
          if(isset($_SESSION["error"])){
            $error = $_SESSION["error"];
            echo "<span>$error</span>";
          }

          if(isset($_SESSION["error_Uentry"])){
            $error_CID = $_SESSION["error_Uentry"];
            echo "<span>$error_CID</span>";
          }

          if(isset($_SESSION["error_Pentry"])){
            $error_PWD = $_SESSION["error_Pentry"];
            echo "<span>$error_PWD</span>";
          }
        ?>
        Not a user? <a href="register.php">Register</a>
      
      </form>

    </section>

  </section>

</div>

  <script>
    function rate_alert(){
      alert('You need to create an account to rate movies!');
      window.location.href='register.php';
    }
  </script>
  
</body>

</html>

<?php 
    unset($_SESSION["error"]);
    unset($_SESSION["error_Uentry"]);
    unset($_SESSION["error_Pentry"]);
?>
<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Registration</title>
  <link rel="shortcut icon" type="images/png" href="images/popcorn.png">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <!-- CSS STYLE -->
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
            <li><a href="login.php">Login</a></li>
            <li class="active"><a href="register.php">Sign Up</a></li>
            </ul>
        </li>

    </ul>
    </div>
  </div>

</nav>

<div class="container">

    <section class="row">
        <section class="col-md-4 col-md-offset-4">

            <form name="f1" method="post" action="register_check.php" class="form-container">


                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" class="form-control" name="username" placeholder="Username here">
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>

                <div class="form-group">
                    <label for="cpassword">Confirm Password:</label>
                    <input type="password" class="form-control" name="cpassword" placeholder="Confirm password">
                </div>

                <button type="submit" class="btn btn-default" name="Submit" value="Submit">Submit</button>
                
                <?php 
                    if(isset($_SESSION["error_usertaken"])){
                    $error_1 = $_SESSION["error_usertaken"];
                    echo "<span>$error_1</span>";
                    }

                    if(isset($_SESSION["error_Userid"])){
                        $error_2 = $_SESSION["error_Userid"];
                        echo "<span>$error_2</span>";
                    }

                    if(isset($_SESSION["error_pass"])){
                        $error_3 = $_SESSION["error_pass"];
                        echo "<span>$error_3</span>";
                    }

                    if(isset($_SESSION["error_cpass"])){
                        $error_4 = $_SESSION["error_cpass"];
                        echo "<span>$error_4</span>";
                    }
                ?>
            </form>

        </section>
    </section>

</div>

</body>

  
</html>

<?php
    unset($_SESSION["error_usertaken"]);
    unset($_SESSION["error_Userid"]);
    unset($_SESSION["error_pass"]);
    unset($_SESSION["error_cpass"]);
?>
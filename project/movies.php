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

        body{
            background-image: url("images/curtains.jpg");
            size: 100%;    
        }

        .jumbotron{
            background: rgba(0, 0, 0, 0.0001);
        }

        .row_movie{
            position: relative;
            overflow: hidden;
            flex-direction: row;
            border-radius: .25rem;
            border: 1px solid;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            box-shadow: 0 0 10px 5px blue;
            background-color: rgba(255, 255, 255, 0.8);
        }

        .col_movieinfo{
            padding: 10px;
            flex-direction: column;
            display:flex;
            max-width: 100%;
            flex-basis: 0;
            flex-grow: 1;
        }

        .col_movieimg{
            position: relative;
            box-sizing: border-box;
            display: block;
            padding: 0;
            flex: 0 0 auto;
            width: auto;
            max-width: 100%;
            flex-basis: 0;
        }
        
        .col_movieimg > img {
            width: 250px;
            height: 100%;
            float: right;
        }

        a.rate_href {
            border: 2px solid green;
            text-align: center;
            padding: 2.5px 2.5px;
        }

        a.rate_href:hover {
            background-color: green;
            color: white;
            text-decoration: none;
        }
    </style>

    </head>
    <body>

        <nav class="navbar navbar-inverse" style="margin: 0">
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
                
                <li class="active"> <a href="movies.php"> <span class = "glyphicon glyphicon-facetime-video"\> Movies </a></li>

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
        <div class="jumbotron vertical-center" id="movielist" style="padding: 0; margin: 10px;">
            <div class="container">
                <div class="row">
                    <?php
                        $hostname = "localhost";
                        $dbname = "Aronnhw";
                        $root = "root";
                        $pass = "";

                        $pdo = new PDO("mysql:host=$hostname;dbname=$dbname", $root, $pass);

                        // DISPLAY MOVIE INFO
                        $display = "SELECT * FROM movies";
                        $stmt1 = $pdo->prepare($display);
                        $stmt1->execute();
                        $movies = $stmt1->fetchAll();

                        foreach($movies as $movie){
                    ?>

                    <div class="row mb">
                        
                        <div class="col-md">
                            <div class="row_movie">

                                <div class="col_movieimg">
                                    <?php echo '<img src=images/'. $movie['movie_img'].' class="Movie_Pic"/>'?>
                                </div>

                                <div class="col_movieinfo">
                                    <h1 style="margin-top: 10px;"> <?php echo $movie ['title'] ?> </h1>

                                    <!-- DISPLAY MOVIE OVERALL RATING -->
                                    <?php
                                        // QUERY CONSTRUCTOR
                                        $id = $movie['movie_id'];
                                        $overall = "SELECT ROUND(AVG(rating), 1) FROM ratings WHERE movie_id = $id GROUP BY movie_id";
                                        $stmt2 = $pdo->prepare($overall);
                                        $stmt2->execute();
                                        $moverall = $stmt2->fetchAll();

                                        // FINAL DISPLAY 
                                        if (!isset($moverall[0][0])){
                                            echo "<h3 style='margin-top: 0px;''>Overall User Rating: Not Reviewed Yet</h3>";
                                        } else {
                                            $m = $moverall[0][0];
                                            echo "<h3 style='margin-top: 0px;''>Overall User Rating: $m </h3>";
                                        }
                                        
                                        
                                    ?>    

                                    <div class="text">Released Date: <?php echo $movie ['release_date'] ?></div> 
                                    <div class="text">Running Time: <?php echo $movie ['running_time'] ?> minutes</div>
                                    <div class="text">Genre: <?php echo $movie['genre']?> </div>

                                    <p class="card-text mb-auto" style="font-size: 18px;"><?php echo $movie['description'] ?></p>

                                    <!-- LOCKING ANONYMOUS USERS TO RATE MOVIES -->
                                    <?php if(isset($_COOKIE["uid"])){ ?>
                                    <a href="rating.php" class="rate_href" style="font-size: 15px;">Rate this movie!</a>
                                    <?php } else { ?>
                                    <a href="rating.php" onclick="doClick(); return false;" class="rate_href" style="font-size: 15px;">Rate this movie!</a>
                                    <script>
                                        function doClick() {
                                            alert("You MUST log into an account to rate movies!");
                                        }
                                    </script>
                                    <?php }?>

                                </div>
                                
                            </div>
                        </div> 
                    </div>


                    <?php
                        echo "<br><br>";
                        }
                    ?>

                </div>
            </div>
        </div>


        <!-- Footer -->
        <div class="jumbotron text-center" style="margin-bottom: 0; background-color: rgba(255, 255, 255, 0.8);">
        <p>Made by: Aronn Grant Laurel Y.</p>
        </div>

    </body>
</html>

<!-- -->
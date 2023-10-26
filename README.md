# Movie-Website
Inspired by Rotten Tomatoes, this is a movie website where users can make an account and give personal ratings on movies. The website composes on the use of html, css, mySql, php, ajax, and bootstrap.


# First steps: Setting up your local server

In order to open up the files, you will need to install a web server application (XAMPP) for web application testing. In the web server app, start up the MySQL and Apache HTTP Server and go to your browser to open up the local host and open the 'home.php' file to begin.

# How to start the website

First, it is necessary to import the database_dump.sql into the phpMyAdmin since it contains the
database with the necessary tables (users, movies, ratings) and values (Movies) needed for the 
website.

Once the database is uploaded, you can begin entering the website through "localhost/project/home.php"
From there on, a navigation bar is shown above the guide you throughout the whole website.

ALREADY ACTIVATED ACCOUNTS
Aronn -1234
Grant -123

1) Login Instructions
	In order to login, you can either click the 'Login' button at the home page (home.php) or
	simply select 'Account' at the navigation bar and select the 'Login' Choice. Once you are
	in the login page (login.php), simply input your login details and you will be able to access
	your account.

2) Sign up Instructions
	In order to sign up, you can either click the 'Login' button at the home page (home.php) or
	simply select 'Account' at the navigation bar and select the 'Login' Choice. Errors will 
	occur if the username is taken or empty and if your password is not matching. Once you have
	finished signing up, it will redirect you to the login page to log in.
	

3) Movie lists
	You can view the entire database of movies in this tab. The more movies you add into the table
	(movies), the more results you will receive in the Movies directory. In addition, every movie
	listed will have an overall user rating and a button below for users to go rate movies. However
	this is only available for users with accounts.

4) Search Movie(s)
	In search movies, you can search a specific movie based on the movie's title, genre, release
	date, and running_time. You can see the rate button as well in every movie listed.

5) Rate Movies
	To BEGIN rating movies, you must have an account and be logged in to do so. Otherwise, the 
	website will prompt a message that deny your request to rate a movie anonymously. If you are
	logged in and ready to rate movies, users can rate movies by clicking the 'RATE MOVIE' button
	that is shown in the Movies (movies.php) and Search movie (search.php) tabs.

6) Already rated Movies
	Once you're logged in, you will find a special navigation "Your Rated Movies" which is only
	visible for users with accounts. You can find all the movies you have rated and its ratings.

drop database if exists Aronnhw;
create database Aronnhw;
use Aronnhw;


CREATE TABLE users (
	user_id INT PRIMARY KEY AUTO_INCREMENT,
	username VARCHAR(40) NOT NULL UNIQUE,
	password VARCHAR(40) NOT NULL
);

CREATE TABLE movies (
    movie_id INT PRIMARY KEY AUTO_INCREMENT,
    title VARCHAR(40) NOT NULL,
    description VARCHAR(500) NOT NULL,
    running_time INT(3) NOT NULL,
    release_date INT(4) NOT NULL,
    genre VARCHAR(20) NOT NULL,
    movie_img VARCHAR(100)
);

INSERT INTO movies (title, description, running_time, release_date, genre, movie_img)
VALUES  ("The Disaster Artist", "An aspiring filmmaker Tommy Wiseau and actor Greg Sestero move to Los Angeles to look for Hollywood stardom. Using his own money, Wiseau writes, directs and stars in `The Room,' a critically maligned movie that becomes a cult classic.", 104, 2017, "Drama", "disaster_artist.jpg"),
        ("Coco", "Despite his family's generations-old ban on music, young Miguel dreams of becoming an accomplished musician like his idol Ernesto de la Cruz. Desperate to prove his talent, Miguel finds himself in the stunning and colorful Land of the Dead. After meeting a charming trickster named Héctor, the two new friends embark on an extraordinary journey to unlock the real story behind Miguel's family history.", 109, 2017, "Animation", "coco.png");

CREATE TABLE ratings (
    user_id INT NOT NULL,
    movie_id INT NOT NULL,
    rating INT(1) NOT NULL
);

-- user_id FOREIGN KEY REFERENCES users(user_id),
-- movie_id FOREIGN KEY REFERENCES movies(movie_id),
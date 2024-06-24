CREATE DATABASE IF NOT EXISTS rabit_db;
USE rabit_db;

DROP TABLE IF EXISTS users;
CREATE TABLE users
(
    id   INT          NOT NULL AUTO_INCREMENT,
    name VARCHAR(128) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO users (name)
VALUES ('metz.alena'),
       ('orion.trantow'),
       ('rosenbaum.zelda'),
       ('kautzer.danielle'),
       ('erdman.janie'),
       ('nitzsche.kara'),
       ('dayne.hessel'),
       ('janessa.zieme'),
       ('schaefer.keyshawn'),
       ('script.kiddie');


DROP TABLE IF EXISTS advertisements;
CREATE TABLE advertisements
(
    id      INT          NOT NULL AUTO_INCREMENT,
    user_id INT          NOT NULL,
    title   VARCHAR(128) NOT NULL,
    PRIMARY KEY (id)
);
INSERT INTO advertisements(user_id, title)
VALUES (1, 'Omnis id qui laboriosam eius.'),
       (2, 'Quam harum at et.'),
       (3, 'Expedita delectus officia ipsa eos.'),
       (4, 'Itaque corrupti et cupiditate cumque.'),
       (5, 'Adipisci in error accusantium ut.'),
       (6, 'Quis maxime quia.'),
       (7, 'Id veniam ipsa et.'),
       (8, 'Vero corrupti sit ut sed amet.'),
       (9, 'Nihil minima aut excepturi adipisci.'),
       (10, '<script>alert("1337 h4xx0r")</script>');

CREATE USER IF NOT EXISTS rabit@localhost IDENTIFIED BY 'rabit';
GRANT ALL PRIVILEGES ON rabit_db.* TO rabit@localhost;
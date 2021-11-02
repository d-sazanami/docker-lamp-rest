CREATE DATABASE IF NOT EXISTS test;
USE test;

CREATE TABLE user
(id INT AUTO_INCREMENT,
 name VARCHAR(10),
 index(id)
)ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user
 (name) vALUES
 ('Reimu'),
 ('Marisa') ;
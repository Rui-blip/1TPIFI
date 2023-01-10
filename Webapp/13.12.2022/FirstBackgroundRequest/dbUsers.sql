CREATE DATABASE Users;
use Users;


CREATE table Users (
    UserId int NOT NULL AUTO_INCREMENT,
    UserName VARCHAR (30) UNIQUE,
    UserPassword VARCHAR(255),
    PRIMARY KEY (UserId)
);

INSERT INTO Users (UserName, UserPassword) VALUES("John","123");
INSERT INTO Users (UserName, UserPassword) VALUES("Angelina","000");
INSERT INTO Users (UserName, UserPassword) VALUES("Peppa","111");
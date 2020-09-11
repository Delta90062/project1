-- gooit de database weg
DROP DATABASE project1;
-- creëert de database 
CREATE DATABASE project1;
-- creëert tables en de columns
CREATE TABLE Account (
    id int not null primary key AUTO_INCREMENT,
    email varchar(255) unique,
    password varchar(255)
);
CREATE TABLE Persoon (
    id int not null primary key AUTO_INCREMENT,
    voornaam varchar(255),
    tussenvoegsel varchar(255),
    achternaam varchar(255),
    username varchar(255),
    account_id int not null,
    FOREIGN KEY (account_id) REFERENCES Account(id)
);
-- creëert de database 
CREATE DATABASE project1;
-- selecteert de project1 database.
USE project1;
-- creëert tables en de columns
CREATE TABLE account (
    id int not null primary key auto_increment,
    email varchar(255) not null unique,
    password varchar(255) not null
);
CREATE TABLE persoon (
    id int not null primary key auto_increment,
    voornaam varchar(255) not null,
    tussenvoegsel varchar(255),
    achternaam varchar(255) not null,
    username varchar(255) not null,
    account_id int,
    foreign key (account_id) references Account(id)
);
-- creëert de admin gegevens in account
INSERT INTO account (email, password)
VALUES ('admin@live.nl', '1234Ss');
-- creëert de admin gegevens in persoon
INSERT INTO persoon (voornaam, achternaam, username)
VALUES ('Aart','Aloserij','Delta062');
-- verbindt de id primary key van account met de id foreign key in persoon
UPDATE persoon 
SET account_id = (select id from account where email = "admin@live.nl")
WHERE voornaam = 'Aart';
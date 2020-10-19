-- DROP DATABASE IF EXISTS project1;
-- creëert de database 
CREATE DATABASE project1;
-- selecteert de project1 database.
USE project1;
-- creëert tables en de columns
CREATE TABLE usertype (
    id int not null primary key auto_increment,
    type varchar(255) not null,
    created date not null,
    last_updated date not null
);
CREATE TABLE account (
    id int not null primary key auto_increment,
    username varchar(255) not null,
    email varchar(255) not null unique,
    password varchar(255) not null,
    usertype_id int,
    foreign key (usertype_id) references usertype(id),
    created date not null,
    last_updated date not null
);
CREATE TABLE persoon (
    id int not null primary key auto_increment,
    voornaam varchar(255) not null,
    tussenvoegsel varchar(255),
    achternaam varchar(255) not null,
    account_id int,
    foreign key (account_id) references account(id),
    created date not null,
    last_updated date not null
);

-- creëert de admin gegevens in account
INSERT INTO account (email, password, username, created, last_updated)
VALUES ('admin@live.nl', '$2y$10$PfFbpAbExrrDDxSrrseK2eCNHV9.sE6u.Tt.iZxdZKlk/72YNhiRK', 'admin', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
-- creëert de admin gegevens in persoon
INSERT INTO persoon (voornaam, achternaam, created, last_updated)
VALUES ('Aart','Aloserij', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
-- creëert de admin gegevens in usertype
INSERT INTO usertype (type, created, last_updated)
VALUES ('Admin', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
-- creëert de user gegevens in usertype
INSERT INTO usertype (type, created, last_updated)
VALUES ('User', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP);
-- verbindt de id primary key van account met de id foreign key in persoon
UPDATE persoon 
SET account_id = (select id from account where email = "admin@live.nl")
WHERE voornaam = 'Aart';
-- verbindt de id primary key van usertype met de id foreign key in account
UPDATE account
SET usertype_id = (select id from usertype where type = "admin")
WHERE email = 'admin@live.nl';
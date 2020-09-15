-- creëert de database 
CREATE DATABASE project1;
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
    account_id int not null,
    foreign key (account_id) references Account(id)
);
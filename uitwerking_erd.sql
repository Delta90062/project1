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
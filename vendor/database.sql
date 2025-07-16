
use remindate;
create table if not exists users (
	id int primary key auto_increment,
    name varchar(40) not null,
    email varchar(50) not null unique,
    password varchar(50) not null,
    email_verified_at datetime,
    created_at datetime default current_timestamp
    );
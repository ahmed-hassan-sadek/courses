create table products
(
    id int UNSIGNED not null AUTO_INCREMENT ,
    `name` varchar(255) not null ,
    created_at  datetime not null default now(),


    primary key (id)
);

create table courses
(
    id int UNSIGNED not null AUTO_INCREMENT ,
    `name` varchar(255) not null ,
    `desc` text not null,
    img varchar(50) not null,
    cat_id  int unsigned not null,
    created_at  datetime not null default now(),
    primary key (id) ,
    foreign key (cat_id) references cats(id)
);

create table reservation
(
    id int UNSIGNED not null AUTO_INCREMENT ,
    `name` varchar(255) not null ,
    `email` varchar(255) not null ,
    `phone` varchar(255) not null ,
    `spec` varchar(255) ,
    course_id int unsigned not null, 
    created_at  datetime not null default now(),
    primary key (id) ,
    foreign key (course_id) references courses(id)
);

create table admins
(
    id int UNSIGNED not null AUTO_INCREMENT ,
    `name` varchar(255) not null ,
    `email` varchar(255) not null ,
    `password` varchar(255) not null ,
    created_at  datetime not null default now(),
    primary key (id) 
);

create table enroll
(
    id BIGINT UNSIGNED not null AUTO_INCREMENT ,
    `name` varchar(255) not null ,
    `email` varchar(255) not null ,
    `phone` varchar(255) not null ,
    `specification` varchar(255) not null ,
    course_id  BIGINT UNSIGNED not null,
    primary key (id) ,
    foreign key (course_id) references courses(id)
);





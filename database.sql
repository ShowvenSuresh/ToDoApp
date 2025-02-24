create database todoapp;

use todoapp;

create table users(
    uid int not null auto_increment primary key,
    email varchar(255) not null,
    password varchar(255) not null,
    first_name varchar(255) not null,
    last_name varchar(255) not null,
    phone_num varchar(20) not null 
    );

create table tasks (
    task_id int not null auto_increment primary key,
    uid int not null,
    task_name varchar(255) not null,
    description text not null,
    due_date date not null,
    priority varchar(255) not null,
    category varchar(255) not null,
    status varchar(255) not null,
    date_created date,
    foreign key (uid) references users(uid)
);

create table reminders(
    reminder_id int not null auto_increment primary key,
    task_id int not null,
    reminder_date date not null,
    reminder_message text not null,
    foreign key (task_id) references tasks(task_id)
);


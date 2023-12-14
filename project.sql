CREATE DATABASE test;
USE test;

CREATE TABLE login_user(id int primary key auto_increment,user_name varchar(20),password varchar(20));

CREATE TABLE gold(id int primary key auto_increment,status smallint);

CREATE TABLE orders(id int,userorder varchar(500),amount int);

CREATE TABLE feedback(id int,feedback varchar(500));

INSERT INTO login_user values(1,"kushal","kushal");

INSERT INTO gold values(1,1);
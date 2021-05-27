/*------------------------- DATATEST DATABASE ------------------------*/
--
DROP DATABASE IF EXISTS datatest;

CREATE DATABASE datatest;

USE datatest;

--
/*--------------------------- INIT TABLES ------------------------------*/
--
-- USERS TABLE
--
DROP TABLE IF EXISTS users;

CREATE TABLE users (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    pass VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);
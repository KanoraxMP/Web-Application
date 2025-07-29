/*
  Name: MySQL Sample Database bikeshop
  Link: http://www.mysqltutorial.org/mysql-sample-database.aspx
*/


/* Create the database */
CREATE DATABASE  IF NOT EXISTS demo01;

/* Switch to the demo01 database */
USE bikeshop;

/* Drop existing tables  */
DROP TABLE IF EXISTS students;


/* Create the tables */
CREATE TABLE students (
  student_id varchar(50),
  prefix varchar(10) DEFAULT NULL,
  fname varchar(50),
  lname varchar(50),
  birthday DATE NOT NULL,
  year INT NOT NULL, 
  gpa DECIMAL(3,2) NOT NULL, 
  PRIMARY KEY (student_id)
);

INSERT INTO students (student_id, prefix, fname, lname, year, gpa, birthday) 
VALUES 
('S6601', 'นาย', 'ประยุทธ์', 'จันทร์โอชา', 1, 2.59, '2001-03-21'),
('S6702', 'นางสาว', 'แพทองทาน', 'ชินวัตร', 2, 3.90, '2003-08-09'),
('S6503', 'นางสาว', 'ทักษิณ', 'ชินวัตร', 4, 3.62, '2006-07-01');
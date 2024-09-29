CREATE database tnn;
USE tnn;


CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,         
    full_name VARCHAR(50) NOT NULL,          
    email VARCHAR(55) NOT NULL,                
    phone_number VARCHAR(20) NOT NULL,          
    birth_date DATE NOT NULL,                 
    grade_level INT CHECK (grade_level BETWEEN 1 AND 5) NOT NULL, 
    gender ENUM('Male', 'Female') NOT NULL     
);

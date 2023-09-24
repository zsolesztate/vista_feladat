CREATE DATABASE IF NOT EXISTS vista_teszt;
USE vista_teszt;

CREATE TABLE IF NOT EXISTS contacts (
    Id INT AUTO_INCREMENT PRIMARY KEY,
    contact_name VARCHAR(100) NOT NULL,
    contact_tel VARCHAR(50) NOT NULL,
    contact_address VARCHAR(100) NOT NULL
);
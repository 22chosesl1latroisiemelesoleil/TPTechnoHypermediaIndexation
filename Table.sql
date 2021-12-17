-- Céline Lecomte - 18909721 - M1 Informatique Université Paris 8

CREATE DATABASE IF NOT EXISTS tpindexation CHARACTER SET 'utf8';
USE tpindexation; 




CREATE TABLE IF NOT EXISTS mots (
    id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    mot VARCHAR(100),
    occurence INT,
    source VARCHAR(100)
)
ENGINE=InnoDB;  
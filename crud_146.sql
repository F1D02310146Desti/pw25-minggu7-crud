CREATE DATABASE IF NOT EXISTS crud_db;
USE crud_db;
CREATE TABLE crud_146 (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100),
    email VARCHAR(100),
    alamat TEXT,
    no_hp VARCHAR(20),
    jurusan VARCHAR(50)
);

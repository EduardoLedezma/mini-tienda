CREATE DATABASE tienda;
USE tienda;
CREATE TABLE products(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),price DECIMAL(10,2));
INSERT INTO products(name,price) VALUES('Playera',199),('Pantalón',399),('Sudadera',499);
CREATE TABLE users(id INT AUTO_INCREMENT PRIMARY KEY,name VARCHAR(100),email VARCHAR(100),password VARCHAR(255),role VARCHAR(20));
INSERT INTO users(name,email,password,role) VALUES('Admin','admin@demo.com',PASSWORD('admin123'),'admin');


CREATE DATABASE blog;
USE blog;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
INSERT INTO users (username, password) 
VALUES ('admin', '$2y$10$abcdefghijklmnopqrstuv');


CREATE TABLE categories (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

INSERT INTO categories (name) VALUES ('Moda'), ('Naturaleza'), ('Tecnología'), ('Comida'), ('Deportes');


CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    summary TEXT NOT NULL,
    image VARCHAR(255) NOT NULL,
    created_at DATETIME NOT NULL,
    category_id INT NOT NULL,
    FOREIGN KEY (category_id) REFERENCES categories(id)
);

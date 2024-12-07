CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(25) NOT NULL
);

INSERT INTO users (email, password)
VALUES
('yahya@gmail.com', 'idkman@#'),

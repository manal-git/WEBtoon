-- Create database if not exists
CREATE DATABASE IF NOT EXISTS webtoon;
USE webtoon;

-- Create utilisateur (user) table
CREATE TABLE IF NOT EXISTS utilisateur (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(50) NOT NULL UNIQUE,
    email VARCHAR(100) NOT NULL UNIQUE,
    mdp VARCHAR(255) NOT NULL,
    age INT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create webtoon table
CREATE TABLE IF NOT EXISTS webtoon (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(100) NOT NULL,
    description TEXT,
    genre VARCHAR(50) NOT NULL,
    author_id INT NOT NULL,
    cover_image VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (author_id) REFERENCES utilisateur(id)
);

-- Create chapter table
CREATE TABLE IF NOT EXISTS chapter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    webtoon_id INT NOT NULL,
    chapter_number INT NOT NULL,
    title VARCHAR(100) NOT NULL,
    content_path VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (webtoon_id) REFERENCES webtoon(id),
    UNIQUE KEY unique_chapter (webtoon_id, chapter_number)
);

-- Create comment table
CREATE TABLE IF NOT EXISTS comment (
    id INT AUTO_INCREMENT PRIMARY KEY,
    webtoon_id INT NOT NULL,
    user_id INT NOT NULL,
    content TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (webtoon_id) REFERENCES webtoon(id),
    FOREIGN KEY (user_id) REFERENCES utilisateur(id)
);
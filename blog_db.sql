CREATE DATABASE IF NOT EXISTS blog_db;
USE blog_db;

-- Buang dulu kalau tabel posts sudah ada
DROP TABLE IF EXISTS posts;

-- Baru buat tabel posts
CREATE TABLE posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    image VARCHAR(255),
    date DATE NOT NULL,
    content TEXT NOT NULL
);

-- Data dummy
INSERT INTO posts (title, image, date, content) VALUES
  ('Belajar PHP',    'php.png',  '2025-04-27', 'Ini adalah artikel tentang belajar PHP.'),
  ('Belajar MySQL',  'mysql.png','2025-04-28', 'Ini adalah artikel tentang belajar MySQL.'),
  ('Membuat Blog',   'blog.jpg', '2025-04-29', 'Ini adalah artikel tentang membuat blog dengan PHP dan MySQL.');

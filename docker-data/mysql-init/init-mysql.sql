CREATE SCHEMA `lehrmittel` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- CREATE USER 'root'@'%' IDENTIFIED WITH mysql_native_password BY 'geheim';
-- GRANT ALL PRIVILEGES ON *.* TO 'root'@'%';


CREATE USER 'lehrmittel'@'%' IDENTIFIED WITH mysql_native_password BY 'geheim';
GRANT ALL PRIVILEGES ON lehrmittel.* TO 'lehrmittel'@'%';

CREATE DATABASE ucode_web;
CREATE USER 'ntaran'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
GRANT ALL PRIVILEGES ON * . * TO 'ntaran'@'localhost' WITH GRANT OPTION;
CREATE DATABASE IF NOT EXISTS ucode_web;
CREATE USER IF NOT EXISTS 'ntaran'@'localhost' IDENTIFIED WITH mysql_native_password BY 'securepass';
GRANT ALL PRIVILEGES ON * . * TO 'ntaran'@'localhost' WITH GRANT OPTION;

USE ucode_web;
CREATE TABLE IF NOT EXISTS `ucode_web`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `login` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `password` VARCHAR(40) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `full_name` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `email` VARCHAR(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    PRIMARY KEY (`id`), UNIQUE (`login`), UNIQUE (`email`) 
) ENGINE = InnoDB;

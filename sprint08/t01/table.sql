CREATE TABLE IF NOT EXISTS `ucode_web`.`heroes` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `name` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `description` TEXT CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `race` VARCHAR(30) NOT NULL DEFAULT 'human' , 
    `class_role` ENUM('tankman','healer','dps') NOT NULL , 
    PRIMARY KEY (`id`), UNIQUE (`name`) 
) ENGINE = InnoDB;
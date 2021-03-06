CREATE TABLE IF NOT EXISTS `ucode_web`.`users` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `room` INT NOT NULL , 
    `username` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `avatar` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `health` INT(2) NOT NULL , 
    `mana` INT(2) NOT NULL , 
    `cards` VARCHAR(1024) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `ucode_web`.`rooms` (
    `id` INT NOT NULL AUTO_INCREMENT , 
    `room` INT NOT NULL , 
    `user_move` INT(1) NOT NULL , 
    `card_id` INT(2) DEFAULT NULL, 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

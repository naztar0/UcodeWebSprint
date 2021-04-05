USE ucode_web;

CREATE TABLE IF NOT EXISTS `ucode_web`.`powers` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `hero_id` INT NOT NULL , 
    `name` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    `points` INT NOT NULL , 
    `type` ENUM('attack','defense') NOT NULL , 
    PRIMARY KEY (`id`) ,
    FOREIGN KEY (`hero_id`) REFERENCES heroes(`id`) 
) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `ucode_web`.`races` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `hero_id` INT NOT NULL , 
    `name` VARCHAR(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL , 
    PRIMARY KEY (`id`) , 
    FOREIGN KEY (`hero_id`) REFERENCES heroes(`id`) 
) ENGINE = InnoDB;
CREATE TABLE IF NOT EXISTS `ucode_web`.`teams` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `hero_id` INT NOT NULL , 
    `name` VARCHAR(30) NOT NULL , 
    PRIMARY KEY (`id`) , 
    FOREIGN KEY (`hero_id`) REFERENCES heroes(`id`) 
) ENGINE = InnoDB;

-- INSERT DATA
INSERT INTO `powers` (`hero_id`, `name`, `points`, `type`) VALUES ('6', 'iron shield', '200', 'defense');
INSERT INTO `powers` (`hero_id`, `name`, `points`, `type`) VALUES ('7', 'bloody fist', '110', 'attack');
INSERT INTO `races` (`hero_id`, `name`) VALUES ('6', 'Human');
INSERT INTO `races` (`hero_id`, `name`) VALUES ('7', 'Kree');
INSERT INTO `teams` (`hero_id`, `name`) VALUES ('6', 'Avengers');
INSERT INTO `teams` (`hero_id`, `name`) VALUES ('7', 'Hydra');
INSERT INTO `teams` (`hero_id`, `name`) VALUES ('10', 'Avengers');
INSERT INTO `teams` (`hero_id`, `name`) VALUES ('10', 'Hydra');

USE ucode_web;

SELECT `heroes`.`name`, `teams`.`name` FROM `heroes` 
LEFT JOIN `teams` ON `heroes`.`id`=`teams`.`hero_id`;

SELECT `heroes`.`name`, `powers`.`name` FROM `heroes` 
LEFT JOIN `powers` ON `heroes`.`id`=`powers`.`hero_id`
UNION ALL
SELECT `heroes`.`name`, `powers`.`name` FROM `heroes` 
RIGHT JOIN `powers` ON `heroes`.`id`=`powers`.`hero_id`;

SELECT `heroes`.`name`, `powers`.`name`, `teams`.`name` FROM `heroes` 
INNER JOIN `powers` ON `heroes`.`id`=`powers`.`hero_id`
INNER JOIN `teams` ON `heroes`.`id`=`teams`.`hero_id`;

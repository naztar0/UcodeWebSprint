USE ucode_web;

-- THAT SHIT DOES NOT WORK FUCK THAT SHIT MTHFK
-- SELECT @Hero := `heroes`.`name` FROM `heroes` WHERE (SELECT COUNT(*) FROM  `teams` WHERE `teams`.`hero_id`=@Hero) > 1 
-- AND `heroes`.`race` <> 'human' AND `heroes`.`name` LIKE '%a%' AND `heroes`.`class_role` IN ('tankman', 'healer')

SELECT `heroes`.`name` FROM `heroes`
LEFT JOIN `teams` ON `heroes`.`id`=`teams`.`hero_id`
WHERE `heroes`.`name` LIKE '%a%' AND `heroes`.`race` <> 'human' AND `heroes`.`class_role` IN ('tankman','healer')
GROUP BY `heroes`.`id` HAVING COUNT(`teams`.`hero_id`) > 1
ORDER BY `heroes`.`id` DESC LIMIT 1;

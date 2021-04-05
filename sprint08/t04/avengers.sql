USE ucode_web;

SELECT `sum_of_skills`, `name` FROM (
    SELECT `heroes`.`name` AS name, SUM(`powers`.`points`) AS `sum_of_skills` FROM `heroes`
    JOIN `powers` ON `powers`.`hero_id`=`heroes`.`id`
    GROUP BY `heroes`.`id`
) Q1
ORDER BY `sum_of_skills` DESC LIMIT 1;

SELECT  `sum_of_skills`, `name` FROM (
    SELECT `heroes`.`name` AS `name`, SUM(`powers`.`points`) AS `sum_of_skills` FROM `heroes`
    JOIN `powers` ON `powers`.`hero_id`=`heroes`.`id` WHERE `powers`.`type`='defense'
    GROUP BY `heroes`.`id`
) Q2
ORDER BY `sum_of_skills` ASC LIMIT 1;

SELECT `sum_of_skills` AS `total_power`, `name` FROM (
    SELECT `heroes`.`name` as `name`, SUM(`powers`.`points`) AS `sum_of_skills` FROM `heroes`
    JOIN (SELECT `hero_id` FROM `teams` WHERE name='Avengers') `table1` ON `table1`.`hero_id`=`heroes`.`id`
    JOIN `powers` ON `powers`.`hero_id`=`heroes`.`id`
    GROUP BY `heroes`.`id`
) Q3
ORDER BY `total_power` DESC;

SELECT `t`.`name`, SUM(`p`.`points`) AS `sum_of_points`
FROM `teams` `t` JOIN `powers` `p` ON `t`.`hero_id`=`p`.`hero_id`
WHERE `t`.`name` IN ('Avengers', 'Hydra') GROUP BY `t`.`name`
ORDER BY SUM(`p`.`points`);

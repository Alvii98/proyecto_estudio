/***********************
SE CREO PARA HACER UN CHECK SI DEBE O NO EL MES PASADO
***********************/
ALTER TABLE `alumnos` ADD `debemes` INT(11) NOT NULL DEFAULT '0' AFTER `baja`;

ALTER TABLE `vinculos` ADD `debemes` INT(11) NOT NULL DEFAULT '0' AFTER `vinculo`;

ALTER TABLE `alumnos` ADD `info_deuda` VARCHAR(255) NOT NULL DEFAULT '' AFTER `debemes`;

ALTER TABLE `vinculos` ADD `info_deuda` VARCHAR(255) NOT NULL DEFAULT '' AFTER `debemes`;
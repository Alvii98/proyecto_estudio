/***********************
SE CREO PARA HACER UN CHECK SI DEBE O NO EL MES PASADO
***********************/
ALTER TABLE `alumnos` ADD `debemes` INT(11) NOT NULL DEFAULT '0' AFTER `baja`;
CREATE TABLE `e-flash_card_schema`.`users` 
( `Username` VARCHAR(15) NULL , 
`Password` VARCHAR(20) NULL , 
PRIMARY KEY (`Username`), 
UNIQUE (`Password`)) 
ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `e-flash_card_schema`.`card_text` 
( `Username` VARCHAR(15) NOT NULL, 
`Front_Text` MEDIUMTEXT NULL, 
`Back_Text` MEDIUMTEXT NULL, 
PRIMARY KEY (`Username`), 
CONSTRAINT `FK_User_Card` 
FOREIGN KEY (`Username`) 
REFERENCES `e-flash_card_schema`.`users` (`Username`) 
ON DELETE NO ACTION 
ON UPDATE NO ACTION) 
ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin; 
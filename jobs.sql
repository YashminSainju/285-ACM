CREATE TABLE `acmsite`.`jobs` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `title` TINYTEXT NOT NULL , 
    `description` TINYTEXT NOT NULL , 
    `contact` VARCHAR(100) NOT NULL , PRIMARY KEY (`id`)) 
    ENGINE = InnoDB;

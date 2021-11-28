CREATE DATABASE ejercicio_php;

CREATE TABLE `ejercicio_php`.`users` (
    `id` INT(11) NOT NULL AUTO_INCREMENT,
    `first_name` VARCHAR(100) NOT NULL,
    `last_name` VARCHAR(100) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `date_of_birth` DATE NOT NULL,
    `user_name` VARCHAR(100) NOT NULL,
    `password` VARCHAR(50) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
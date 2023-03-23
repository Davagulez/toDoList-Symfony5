CREATE DATABASE IF NOT EXISTS `tasksSymfony` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;


CREATE TABLE IF NOT EXISTS `users` (
  `id` INT(255) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255),
  `surname` VARCHAR(255),
  `role` VARCHAR(255),
  `email` VARCHAR(255),
  `password` VARCHAR(255),
  `created_at` datetime,

  PRIMARY KEY `pk_users`(`id`)
) ENGINE = InnoDB;


INSERT INTO `users` SET
`name` = 'davi',
`surname` = 'lesca',
`role` = 'ROLE_USER',
`email` = 'david123@gmail.com',
`password` = '12345',
`created_at` = CURTIME()
;
INSERT INTO `users` SET
`name` = 'belen',
`surname` = 'gal',
`role` = 'ROLE_USER',
`email` = 'bel123@gmail.com',
`password` = '12345',
`created_at` = CURTIME()
;
INSERT INTO `users` SET
`name` = 'mag',
`surname` = 'gal',
`role` = 'ROLE_USER',
`email` = 'mag123@gmail.com',
`password` = '12345',
`created_at` = CURTIME()
;


CREATE TABLE IF NOT EXISTS `tasks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255),
  `userId` INT(255) NOT NULL,
  `content` text,
  `priority` VARCHAR(255),
  `hours` INT(100),
  created_at datetime,

  PRIMARY KEY `pk_tasks`(`id`),
  CONSTRAINT `fk_tasks_users`
    FOREIGN KEY (`userId`)
    REFERENCES `users` (`id`)
    ON DELETE SET NULL
    ON UPDATE SET NULL
) ENGINE = InnoDB;

INSERT INTO `tasks` SET
`title` = 'tarea 1',
`userId` = '1',
`content` = 'Contenido de prueba 1',
`priority` = 'high',
`hours` = 40,
`created_at` = CURTIME()
;
INSERT INTO `tasks` SET
`title` = 'tarea 2',
`userId` = '2',
`content` = 'Contenido de prueba 2',
`priority` = 'medium',
`hours` = 2,
`created_at` = CURTIME()
;
INSERT INTO `tasks` SET
`title` = 'tarea 3',
`userId` = '3',
`content` = 'Contenido de prueba 3',
`priority` = 'low',
`hours` = 1,
`created_at` = CURTIME()
;
INSERT INTO `tasks` SET
`title` = 'tarea 4',
`userId` = '1',
`content` = 'Contenido de prueba 4',
`priority` = 'low',
`hours` = 4,
`created_at` = CURTIME()
;
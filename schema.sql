CREATE DATABASE taskforce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE taskforce;

CREATE TABLE `categories`
(
    `cat_id` INT AUTO_INCREMENT PRIMARY KEY,
    `name`   VARCHAR(128) NOT NULL UNIQUE,
    `icon`   VARCHAR(128)
);

CREATE TABLE `cities`
(
    `city_id`   INT AUTO_INCREMENT PRIMARY KEY,
    `city` VARCHAR(128) NULL,
    `lat`  VARCHAR(128),
    `long` VARCHAR(128)
);

CREATE TABLE `opinions`
(
    `opinion_id`  INT AUTO_INCREMENT PRIMARY KEY,
    `dt_add`      DATE NOT NULL,
    `rate`        VARCHAR(128) NULL,
    `description` TEXT NULL
);

CREATE TABLE `profiles`
(
    `profile_id` INT AUTO_INCREMENT PRIMARY KEY,
    `address`    VARCHAR(128) NOT NULL,
    `bd`         DATE NULL,
    `about`      TEXT NULL,
    `phone`      VARCHAR(128),
    `skype`      VARCHAR(128)
);

CREATE TABLE `replies`
(
    `reply_id`    INT AUTO_INCREMENT PRIMARY KEY,
    `dt_add`      DATE         NOT NULL,
    `rate`        VARCHAR(128) NOT NULL UNIQUE,
    `description` TEXT NULL
);

CREATE TABLE `tasks`
(
    `task_id`     INT AUTO_INCREMENT PRIMARY KEY,
    `dt_add`      DATE NOT NULL,
    `category_id` int  NOT NULL,
    `description` TEXT NULL,
    `expire`      DATE NOT NULL,
    `name`        VARCHAR(255) NULL,
    `address`     TEXT NULL,
    `budget`      VARCHAR(255) NULL,
    `lat`         VARCHAR(255) NULL,
    `long`        VARCHAR(255) NULL
);

CREATE TABLE `users`
(
    `user_id`  INT AUTO_INCREMENT PRIMARY KEY,
    `email`    VARCHAR(128),
    `name`     VARCHAR(128),
    `password` VARCHAR(128),
    `dt_add`   DATE NOT NULL
);






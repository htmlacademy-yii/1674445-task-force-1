CREATE DATABASE taskforce
    DEFAULT CHARACTER SET utf8
    DEFAULT COLLATE utf8_general_ci;

USE taskforce;

CREATE TABLE `categories`
(
    cat_id          INT AUTO_INCREMENT PRIMARY KEY,
    cat_publishdate DATE         NOT NULL,
    cat_name        VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE `locations`
(
    location_id   INT AUTO_INCREMENT PRIMARY KEY,
    location_name VARCHAR(128) NOT NULL UNIQUE
);

CREATE TABLE `reviews`
(
    review_id          INT AUTO_INCREMENT PRIMARY KEY,
    review_publishdate DATE         NOT NULL,
    review_title       VARCHAR(128) NOT NULL UNIQUE,
    review_rating      INT,
    review_text        TEXT NULL
);

CREATE TABLE `chat_messages`
(
    message_id          INT AUTO_INCREMENT PRIMARY KEY,
    message_publishdate DATE         NOT NULL,
    message_userid      INT          NOT NULL,
    message_taskid      INT          NOT NULL,
    message_title       VARCHAR(128) NOT NULL UNIQUE,
    message_text        TEXT NULL
);

CREATE TABLE `responses`
(
    response_id          INT AUTO_INCREMENT PRIMARY KEY,
    response_publishdate DATE         NOT NULL,
    response_userid      INT          NOT NULL,
    response_taskid      INT          NOT NULL,
    response_title       VARCHAR(128) NOT NULL UNIQUE,
    response_text        TEXT NULL
);

CREATE TABLE `users`
(
    user_id              INT AUTO_INCREMENT PRIMARY KEY,
    user_status          VARCHAR(128) NOT NULL,
    user_publishdate     DATE         NOT NULL,
    user_email           VARCHAR(128) NOT NULL,
    user_name            VARCHAR(32)  NOT NULL,
    user_password        VARCHAR(128) NOT NULL,
    user_info            TEXT NULL,
    user_role            VARCHAR(32)  NOT NULL,
    user_birthday        DATE         NOT NULL,
    user_categories      TEXT NULL,
    user_cover_image     VARCHAR(255) NULL,
    user_projects_images TEXT NULL,
    user_contacts        TEXT NULL,
    user_notifications   TEXT NULL,
    user_show_cotacts    BOOLEAN DEFAULT false,
    user_hidden          BOOLEAN DEFAULT false,
    user_messages        TEXT NULL,
    user_projects        TEXT NULL
);

CREATE TABLE `tasks`
(
    task_id              INT AUTO_INCREMENT PRIMARY KEY,
    task_status          VARCHAR(128) NOT NULL,
    task_publishdate     DATE         NOT NULL,
    task_editdate        DATE         NOT NULL,
    task_closedate       DATE         NOT NULL,
    task_customer_id     int          NOT NULL,
    task_developer_id    int,
    task_title           VARCHAR(32)  NOT NULL,
    task_info            TEXT NULL,
    task_categories      TEXT NULL,
    task_cover_image     VARCHAR(255) NULL,
    task_projects_images TEXT NULL,
    task_projects_files  TEXT NULL,
    task_notifications   TEXT NULL,
    task_responses       BOOLEAN DEFAULT false,
    task_messages        TEXT NULL
);

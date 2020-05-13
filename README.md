# TWSMMiniProject

We are creating a forum. The website has a log-in page, and a chat-room. 
The users should be able to create private chats, upload images, files, and post text messages.
The website will be developed with PHP+MySQL+JS(incl. jQuery)

We're using XAMPP, and due to scripts the whole thing should be put in a folder called TWSMMiniProject in the htdocs folder in the XAMPP folder. 
My current path: D:\xampp\htdocs\TWSMMiniProject\

Currently tries to connecto to a database called chat_users with two tables:
Create table using SQL:

--- chat ---

CREATE TABLE `chat_users`.`chat` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `message` TEXT NOT NULL , `from` VARCHAR(255) NOT NULL , `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;

--- users ---

CREATE TABLE `chat_users`.`users` ( `ID` INT(11) NOT NULL AUTO_INCREMENT , `Username` VARCHAR(255) NOT NULL , `Pw` VARCHAR(255) NOT NULL , `Email` VARCHAR(255) NOT NULL , PRIMARY KEY (`ID`)) ENGINE = InnoDB;

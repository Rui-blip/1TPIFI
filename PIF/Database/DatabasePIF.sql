DROP DATABASE DatabasePIF;
CREATE DATABASE DatabasePIF;
USE DatabasePIF;

CREATE TABLE `Groups_Permissions`( 
    `group_id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT, 
    `group_name` VARCHAR(255) NOT NULL, 
    `admin` INT NOT NULL, 
    `open_doors_when_free` INT NOT NULL, 
    `make_reservations` INT NOT NULL, 
    `view_sensitive_data` INT NOT NULL 
);

CREATE TABLE `Users`(
    `user_email` VARCHAR(255) NOT NULL PRIMARY KEY,
    `group_id` INT NOT NULL,
    `firstname` VARCHAR(255) NOT NULL,
    `surname` VARCHAR(255) NOT NULL,
    `password` VARCHAR(255) NOT NULL,
    `RFIDBadge_id` INT NOT NULL
);

CREATE TABLE `Rooms`(
    `room_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `numroom` VARCHAR(255) NOT NULL,
    `date` DATE NOT NULL,
    `user_email` VARCHAR(255) NOT NULL
);

CREATE TABLE `Reserve_Details`(
    `reservation_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `purpose` VARCHAR(255) NOT NULL,
    `room_id` INT NOT NULL,
    `date` DATE NOT NULL,
    `user_email` VARCHAR(255) NOT NULL
);

CREATE TABLE `Reserved_Hour`(
    `reserve_time_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `start_time` INT NOT NULL,
    `end_time` INT NOT NULL
);

CREATE TABLE `Badges`(
    `RFIDBadge_id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    `key` VARCHAR(255) NOT NULL UNIQUE
);

CREATE TABLE `Reserve_List`(
    `id` INT PRIMARY KEY NOT NULL,
    `reservation_id` INT NOT NULL,
    `reserve_time_id` INT NOT NULL
);

ALTER TABLE
    `Users` ADD CONSTRAINT `user_group_id_foreign` FOREIGN KEY(`group_id`) REFERENCES `Groups_Permissions`(`group_id`);
ALTER TABLE
    `Reserve_Details` ADD CONSTRAINT `reserve_details_user_email_foreign` FOREIGN KEY(`user_email`) REFERENCES `Users`(`user_email`);
ALTER TABLE
    `Reserve_Details` ADD CONSTRAINT `reserve_details_room_id_foreign` FOREIGN KEY(`room_id`) REFERENCES `Rooms`(`room_id`);
ALTER TABLE
    `Reserve_List` add CONSTRAINT `reserve_list_reservation_id_foreign` FOREIGN KEY(`reservation_id`) REFERENCES `Reserve_Details`(`reservation_id`);
ALTER TABLE
    `Reserve_List` add CONSTRAINT `reserve_list_reserve_time_id_foreign` FOREIGN KEY(`reserve_time_id`) REFERENCES `reserved_Hour`(`reserve_time_id`);
ALTER TABLE
    `Users` add CONSTRAINT `users_rfidbadge_id_foreign` FOREIGN KEY(`RFIDBadge_id`) REFERENCES `Badges`(`RFIDBadge_id`);

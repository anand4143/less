ALTER TABLE `lesssuperstars`.`trans_votings` CHANGE `ratings` `ipAddress` VARCHAR(16) NOT NULL, ADD COLUMN `deviceID` VARCHAR(64) NULL AFTER `ipAddress`; 
ALTER TABLE `users` ADD `isPasswordSet` TINYINT(1) UNSIGNED NOT NULL DEFAULT '1' AFTER `updatedData`;
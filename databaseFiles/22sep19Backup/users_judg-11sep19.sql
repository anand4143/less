ALTER TABLE `users_judge` ADD `userContestReportID` INT(10) NULL DEFAULT NULL COMMENT 'user_contest_report table id is available then assign other song to judge' AFTER `judgementTime`;

ALTER TABLE `users_judge` CHANGE `userContestReportID` `userContestReportID` INT(10) NOT NULL DEFAULT '0' COMMENT 'user_contest_report table id is available then assign song to judge';

CREATE TABLE `newsletter_campaign` (
	`campaignid` INT(100) NOT NULL AUTO_INCREMENT,
	`list_id` INT(50) NOT NULL,
	`campaign_title` varchar(200) NOT NULL,
	`email_subject` varchar(200) NOT NULL,
	`email_message` varchar(200) NOT NULL,
	`start_date` DATE NOT NULL,
	`start_time` TIME NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT '0',
	`created_at` DATETIME NOT NULL DEFAULT '0',
	PRIMARY KEY (`campaignid`)
);

CREATE TABLE `newsletter_list` (
	`list_id` INT(100) NOT NULL AUTO_INCREMENT,
	`list_title` varchar(255) NOT NULL,
	`created_at` DATETIME NOT NULL,
	PRIMARY KEY (`list_id`)
);

CREATE TABLE `list_user` (
	`luid` INT(200) NOT NULL AUTO_INCREMENT,
	`list_id` INT(240) NOT NULL AUTO_INCREMENT,
	`user_id` INT(240) NOT NULL AUTO_INCREMENT,
	`status` BOOLEAN NOT NULL DEFAULT '0',
	`subscribe_date_time` DATETIME NOT NULL AUTO_INCREMENT,
	`unsubscribe_date_time` DATETIME NOT NULL,
	PRIMARY KEY (`luid`)
);

CREATE TABLE `campaign_queue` (
	`queueid` INT(200) NOT NULL AUTO_INCREMENT,
	`campaign_id` INT(100) NOT NULL,
	`list_id` INT(100) NOT NULL,
	`user_id` INT(200) NOT NULL,
	`start_date` DATE NOT NULL,
	`start_time` TIME NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT '0',
	`sent_at` DATETIME NOT NULL,
	PRIMARY KEY (`queueid`)
);


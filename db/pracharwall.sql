CREATE TABLE `business_category` (
	`id` int AUTO_INCREMENT,
	`category_name` varchar,
	`sub_category` varchar,
	`status` BOOLEAN,
	`createdOn` TIMESTAMP,
	`createdBy` varchar,
	`updaredOn` TIMESTAMP,
	`updatedBy` varchar,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user_type` (
	`id` int AUTO_INCREMENT,
	`userType` varchar,
	`userRole` varchar,
	`status` BOOLEAN,
	`createdOn` TIMESTAMP,
	`createdBy` varchar,
	`updatedOn` TIMESTAMP,
	`updatedBy` varchar,
	PRIMARY KEY (`id`)
);

CREATE TABLE `userRegistration` (
	`id` int AUTO_INCREMENT,
	`userType` varchar,
	`userName` varchar,
	`userMobile` varchar,
	`userEmail` varchar,
	`userPass` varchar,
	`status` BOOLEAN,
	`createdOn` TIMESTAMP,
	`createdBy` varchar,
	`updatedOn` TIMESTAMP,
	`updatedBy` varchar,
	PRIMARY KEY (`id`)
);

CREATE TABLE `user_profile` (
	`id` int AUTO_INCREMENT,
	`userId` varchar,
	`businessCategory` varchar,
	`subCategory` varchar,
	`userAddress` varchar,
	`businessName` varchar,
	`establishmentYear` varchar,
	`paymentMode` varchar,
	`businessTiming` varchar,
	`userServices` varchar,
	`aboutUser` varchar,
	`status` BOOLEAN,
	`createdOn` TIMESTAMP,
	`createdBy` varchar,
	`updatedOn` TIMESTAMP,
	`updatedBy` varchar,
	PRIMARY KEY (`id`)
);

CREATE TABLE `walluploads` (
	`id` int AUTO_INCREMENT,
	`userId` varchar,
	`businessCategory` varchar,
	`subCategory` varchar,
	`wallImg` varchar,
	`status` BOOLEAN,
	`createdOn` TIMESTAMP,
	`createdBy` varchar,
	`updatedOn` TIMESTAMP,
	`updatedBy` varchar,
	PRIMARY KEY (`id`)
);

ALTER TABLE `user_type` ADD CONSTRAINT `user_type_fk0` FOREIGN KEY (`userType`) REFERENCES `undefined`(`undefined`);

ALTER TABLE `userRegistration` ADD CONSTRAINT `userRegistration_fk0` FOREIGN KEY (`id`) REFERENCES `user_profile`(`userId`);

ALTER TABLE `userRegistration` ADD CONSTRAINT `userRegistration_fk1` FOREIGN KEY (`userType`) REFERENCES `user_type`(`userType`);

ALTER TABLE `user_profile` ADD CONSTRAINT `user_profile_fk0` FOREIGN KEY (`userId`) REFERENCES `walluploads`(`userId`);

ALTER TABLE `walluploads` ADD CONSTRAINT `walluploads_fk0` FOREIGN KEY (`userId`) REFERENCES `user_profile`(`userId`);







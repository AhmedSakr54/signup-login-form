CREATE TABLE `user` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `NAME` varchar(255) NOT NULL,
    `PASSWORD` varchar(255) NOT NULL,
    `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `email` (`email`)
)

CREATE TABLE `department` (
    `dept_id` int(11) NOT NULL AUTO_INCREMENT,
    `dept_name` varchar(255) NOT NULL,
    `description` varchar(1024) NOT NULL,
    PRIMARY KEY (`dept_id`)
)

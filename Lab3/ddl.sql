-- creating the user table
CREATE TABLE `user` (
    `user_id` int(11) NOT NULL AUTO_INCREMENT,
    `email` varchar(255) NOT NULL,
    `NAME` varchar(255) NOT NULL,
    `PASSWORD` varchar(255) NOT NULL,
    `registration_date` timestamp NOT NULL DEFAULT current_timestamp(),
    PRIMARY KEY (`user_id`),
    UNIQUE KEY `email` (`email`)
);

-- creating the department table
CREATE TABLE `department` (
    `dept_id` int(11) NOT NULL AUTO_INCREMENT,
    `dept_name` varchar(255) NOT NULL,
    `description` varchar(1024) NOT NULL,
    PRIMARY KEY (`dept_id`)
);


-- inserting the name and description of a department into the department table
INSERT INTO `department`(`dept_name`, `description`) 
VALUES ("Computer and Communications Engineering","Computer and Communication Engineering gives expertise in
Computer Engineering and Electronics Communication. It
covers subjects in computer Engineering, communication
Engineering, cloud computing, big data analytics and Artificial
Intelligence.");

INSERT INTO `department`(`dept_name`, `description`)
VALUES ("Architectural and Construction Engineering","The field of architecture and construction is one of the relatively
modern areas of design, engineering and management of
architectural and construction projects. This includes all aspects
related to design efficiency, understanding of the professional and
legal issues related to the construction industry, understanding of
construction process, methods, materials, systems and related
equipment, planning, cost analysis, As well as safety and
management systems.");

INSERT INTO `department`(`dept_name`, `description`)
VALUES ("Electromechanical Engineering","Prepares skilful engineers with distinct competencies, in
the field of Electromechanical engineering, capable of
competing in the local, regional and international markets.");
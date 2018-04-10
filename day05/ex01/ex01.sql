CREATE TABLE ft_table (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
login VARCHAR(8) DEFAULT 'toto' NOT NULL,
`group` ENUM('student', 'staff', 'other') NOT NULL,
email VARCHAR(50) NOT NULL,
creation_date DATE NOT NULL
);
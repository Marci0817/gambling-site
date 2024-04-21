DROP DATABASE IF EXISTS grandle;

CREATE DATABASE grandle
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
	
USE grandle;

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `magic_number` int(11) NOT NULL DEFAULT 923821625,
  `admin` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_hungarian_ci;

INSERT INTO users (username, password_hash, admin)
VALUES ('admin', '$2y$10$RrimLkl.j7ydKiqccdI3lelD3UfsZAiW3CVxQ9Qu3ap4gLcAsByCi', 1);

CREATE TABLE `history` (
	`id` INTEGER UNSIGNED auto_increment NOT NULL,
	`username` varchar(100) NOT NULL,
	`game` varchar(100) NOT NULL,
	`amount` decimal(10,2) NOT NULL,
	`timestamp` TIMESTAMP DEFAULT current_timestamp() NOT NULL,
	PRIMARY KEY (`id`),
	CONSTRAINT history_users_FK FOREIGN KEY (`username`) REFERENCES users(`username`) ON DELETE CASCADE
)
ENGINE=InnoDB
DEFAULT CHARSET=utf8mb4
COLLATE=utf8mb4_hungarian_ci;

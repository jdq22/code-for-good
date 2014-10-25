# Team 14: iMentor Challenge Documentation

## Team Members
* Martin Berlove (martin@mberlove.com)
* John Miritello (jrm217@lehigh.edu)
* Neha Patel (npatel.npatel@gmail.com)
* Jenna Quindica (jdq22@cornell.edu)
* Di Ren (rendi6668@gmail.com)

## Scorer Class Architecture

## Application Program Interface

## Database Design
    CREATE TABLE `Curriculum` ( // Typo corrected here but not in the API
      `C_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `C_text` varchar(10000) NOT NULL,
      `C_name` varchar(200) NOT NULL,
      PRIMARY KEY (`C_id`),
      KEY `C_id` (`C_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

    CREATE TABLE `Score` (
      `S_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `S_score` tinyint(1) NOT NULL COMMENT '1, 2, 3, 4, 5',
      `S_date` datetime NOT NULL,
      PRIMARY KEY (`S_id`),
      KEY `S_score` (`S_score`),
      KEY `S_id` (`S_id`)
    ) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8;

    CREATE TABLE `User` (
      `U_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `U_level` tinyint(1) DEFAULT NULL,
      `U_name` varchar(20) NOT NULL,
      `U_pass` varchar(12) NOT NULL,
      `U_points` int(11) unsigned NOT NULL,
      PRIMARY KEY (`U_id`),
      KEY `U_id` (`U_id`),
      KEY `U_name` (`U_name`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE `User_Curriculum` (
      `UC_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `U_id` int(11) unsigned NOT NULL,
      `C_id` int(11) unsigned NOT NULL,
      `UC_date` datetime NOT NULL COMMENT 'Date created',
      `UC_duration` int(3) unsigned NOT NULL COMMENT 'Number of days',
      PRIMARY KEY (`UC_id`),
      KEY `UC_id` (`UC_id`),
      KEY `U_id` (`U_id`),
      KEY `C_id` (`C_id`),
      CONSTRAINT `User_Curriculum_ibfk_2` FOREIGN KEY (`C_id`) REFERENCES `Curriculim` (`C_id`),
      CONSTRAINT `User_Curriculum_ibfk_1` FOREIGN KEY (`U_id`) REFERENCES `User` (`U_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

    CREATE TABLE `User_Score` (
      `US_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
      `UC_id` int(11) unsigned NOT NULL,
      `S_id` int(11) unsigned NOT NULL,
      PRIMARY KEY (`US_id`),
      KEY `US_id` (`US_id`),
      KEY `U_id` (`UC_id`),
      KEY `S_id` (`S_id`),
      CONSTRAINT `User_Score_ibfk_2` FOREIGN KEY (`S_id`) REFERENCES `Score` (`S_id`),
      CONSTRAINT `User_Score_ibfk_1` FOREIGN KEY (`UC_id`) REFERENCES `User_Curriculum` (`UC_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
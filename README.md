# Team 14: iMentor Challenge Documentation

## Team Members
* Martin Berlove (martin@mberlove.com)
* John Miritello (jrm217@lehigh.edu)
* Neha Patel (npatel.npatel@gmail.com)
* Jenna Quindica (jdq22@cornell.edu)
* Di Ren (rendi6668@gmail.com)

## Introduction
We're lucky to have an incredibly diverse team. We all have solid Java backgrounds, but we've all developed specialties, in frontend, backend, database design, UI design, and so forth. It was clear how we'd delegate tasks.  

We started the night by whiteboarding our goals. We asked ourselves, what does iMentor expect as a proof of concept? Answer: We need to provide a platform on which mentors, mentees, and staff can go to send, read, and score emails. The difficulty in this challenge lies in the natural language processing necessary for the automatic scoring, but we can also focus on the user experience and user engagement aspects.

### How We Tackled NLP
We couldn't generate a scorer if we didn't know what we were scoring, so we started off by reading the emails and curriculum texts provided. Then, deducing trends, we diagrammed differences in the emails with lower scores and the emails with higher scores. Highly scored emails tend to be longer, have more complex sentences, ask more questions, and paraphrase the curriculum more often. Emails with low scores tend to be brief, don't mention the curriculum very much, but still indicate an effort at maintaining a relationship. In every email the mentee or mentor queried about the other's life. It's obvious that the mentees and mentors enjoy hearing from each other.  

Based off our deductions, we generated an algorithm that counted the total number of pronouns, questions, temporal phrases, and topic mentions (in this case, the topic was "growth mindset") and returned a score inclusively between 0 and 2. The first three were characteristics of the "touching base" portion of the emails. Engaged writers asked how the other was doing, what had been challenging over the last week. When replying, engaged writers tended to use "I" a lot and phrases like "last night" or "this past Monday". As an easy measurement of how well the writer referenced the curriculum, we tallied the number of times the topic ("growth mindset") was mentioned. The more times the topic is mentioned, the higher score the writer gets.  

We also attempted to implement keyword matching between the emails and curriculum. A LinkedList of arrays of strings stored the keywords of the questions and commands in the paragraphs portion of the curriculum (Every paragraph has one to three actionable items either a question or command). Every sentence in an email was parsed, choosing all the subjects, verbs, direct objects, indirect objects, and adjectives as keywords, and then matched to an array in the LinkedList. The LinkedList also stored a boolean "checked" property set to true when a sentence in the email was matched to the array. The scorer tries to match unchecked arrays in the LinkedList to sentences in the email first. If a sentence doesn't match anything in the LinkedList, that sentence isn't included in the score. We made sure to have an additive scoring system; we shouldn't deduct points for verbose and friendly writers.  

The minimum score a writer can get is 1, with a maximum of 5.  

We wanted to use the Stanford Part-Of-Speech Tagger but didn't have enough time to finish implementing it. In the future, the parser would also be able to tell the difference between a writer's opinions and examples. The higher scored emails tend to elaborate more, saying "I think" and then "because." The parser should somehow remember what was discussed in the past to detect longstanding themes of discussion. What is the mentee interested in? What keeps him more engaged? How does the mentor keep engaging the mentee? Are there certain topics that are more engaging?

## Scorer Class Architecture

## Application Program Interface

## Database Design

Below you'll find the sql statements to recreate our database. We decided on MySQL because it's what we're most familiar with. The database mainly stores scores tied to a user and curriculum. Because there are fewer curriculums than emails, we only provided the support for curriculum storage.


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
CREATE database todoapp;
use todoapp;

CREATE TABLE `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone_num` varchar(20) NOT NULL,
  PRIMARY KEY (`uid`)
);


INSERT INTO `users` VALUES (1,'example@gmail.com','naruto1201','Kenji','Chong','+60122127455'),(2,'i23024773@student.newinti.edu.my','showven1201','Thea','Malloc','+60163287455'),(3,'ninetails@example.com','minato','kushina','namikaze','+60163287455'),(4,'toxicaura0@gmail.com','nut123','Jason','Loh the gay','01111542310');




CREATE TABLE `tasks` (
  `task_id` int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `uid` int NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `due_date` date NOT NULL,
  `priority` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `isarchive` tinyint(1) NOT NULL,
 FOREIGN KEY (`uid`) REFERENCES `users` (`uid`)
) ;

INSERT INTO `tasks` VALUES (2,2,'PHP individual assignment','need to do loh y want description','2025-04-22','Medium','Assignments & Homework','To-Do',1),(3,1,'wsl install and configuration','help norman','2025-03-03','Low','Assignments & Homework','Doing',0),(4,1,'Complete PHP ','Finish the PHP assignment for practice.','2025-04-25','Low','Assignments & Homework','Completed',1),(5,1,'Prepare for Java Quiz','Review Java topics for the upcoming quiz.','2025-04-26','Medium','Exams & Quizzes','Completed',1),(6,1,'Group Project: Website Redesign','Collaborate with the team to redesign the website.','2025-04-27','High','Projects & Group Work','Completed',1),(8,2,'Write Essay for fun','Draft and finalize the English essay.','2025-05-01','Medium','Personal & Extracurricular','To-Do',0),(9,2,'Study for Math Quiz','Review algebra and geometry topics for the quiz.','2025-05-02','Low','Exams & Quizzes','Doing',0),(10,2,'Team Project: App Development','Work with team members to develop a mobile app.','2025-05-03','High','Projects & Group Work','Completed',0),(11,2,'Join Art Workshop','Participate in a local art workshop to boost creativity.','2025-05-04','Medium','Personal & Extracurricular','Completed',1),(12,3,'Submit Lab Report','Complete and submit the lab report on time.','2025-05-05','High','Assignments & Homework','To-Do',0),(13,3,'Review Chemistry Quiz','Study key concepts for the upcoming chemistry quiz.','2025-05-06','Medium','Exams & Quizzes','Completed',1),(14,3,'Collaborate on Robotics Project','Assist in building and programming the robot.','2025-05-07','Low','Projects & Group Work','Doing',0),(20,2,'Learn solidity','learn the solidity programming language for the hackathon','2025-03-03','High','Projects & Group Work','To-Do',0),(23,3,'PHP individual assignment','fuck this shit','2025-03-04','High','Projects & Group Work','Completed',1),(25,3,'wsl','dddddddd','2025-03-07','Medium','Projects & Group Work','To-Do',0),(26,1,'PHP individual assignment','just test sucesss','2025-03-14','High','Personal & Extracurricular','To-Do',0),(27,1,'hackathon','apubcc hackathon','2025-03-05','Medium','Projects & Group Work','Doing',0),(28,4,'Research History Assignment','Gather information and write the history assignment.','2025-05-09','Medium','Assignments & Homework','Completed',1),(29,4,'Prepare for Geography Quiz','Review maps and geographical facts for the quiz.','2025-03-10','Medium','Exams & Quizzes','To-Do',0),(30,4,'Plan Group Presentation','Organize and prepare slides for the group presentation.','2025-05-11','Low','Projects & Group Work','Completed',1),(31,4,'Enroll in Fitness Class','Sign up for a fitness class to stay active.','2025-05-12','Medium','Personal & Extracurricular','Doing',0),(32,1,'Install ZROK','Help norman install zrok in his computer','2025-03-02','High','Projects & Group Work','Completed',1),(33,4,'Halo','heiheiboy','0025-04-15','Low','Assignments & Homework','Completed',1),(34,1,'Submit Lab ','submmit networking lab','2025-03-18','Medium','Assignments & Homework','Completed',1),(35,4,'Review Chemistry ','do a review for class','2025-03-19','High','Assignments & Homework','Completed',0),(36,4,'test task','this is a testing task','2025-03-10','High','Projects & Group Work','To-Do',0),(37,4,'Submit Lab jjj','ddddddd','2025-03-13','High','Exams & Quizzes','Doing',0);







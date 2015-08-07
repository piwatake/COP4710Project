SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema ProjectDB
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema ProjectDB
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `ProjectDB` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `ProjectDB` ;

-- -----------------------------------------------------
-- Table `ProjectDB`.`User`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`User` (
  `userID` INT NOT NULL AUTO_INCREMENT,
  `password` VARCHAR(45) NULL,
  `Username` VARCHAR(45) NULL,
  `Email` VARCHAR(45) NULL,
  PRIMARY KEY (`userID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`University`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`University` (
  `UniversityID` INT NOT NULL AUTO_INCREMENT,
  `Name` VARCHAR(45) NULL,
  `Location` VARCHAR(45) NULL,
  `Description` VARCHAR(45) NULL,
  `numStudents` INT NULL,
  PRIMARY KEY (`UniversityID`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`Student`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`Student` (
  `StudentID` INT NOT NULL AUTO_INCREMENT,
  `User_userID` INT NOT NULL,
  `University_UniversityID` INT NOT NULL,
  PRIMARY KEY (`StudentID`),
  INDEX `fk_Student_User1_idx` (`User_userID` ASC),
  INDEX `fk_Student_University1_idx` (`University_UniversityID` ASC),
  CONSTRAINT `fk_Student_User1`
    FOREIGN KEY (`User_userID`)
    REFERENCES `ProjectDB`.`User` (`userID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Student_University1`
    FOREIGN KEY (`University_UniversityID`)
    REFERENCES `ProjectDB`.`University` (`UniversityID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`Admin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`Admin` (
  `AdminID` INT NOT NULL AUTO_INCREMENT,
  `Student_StudentID` INT NOT NULL,
  PRIMARY KEY (`AdminID`),
  INDEX `fk_Admin_Student1_idx` (`Student_StudentID` ASC),
  CONSTRAINT `fk_Admin_Student1`
    FOREIGN KEY (`Student_StudentID`)
    REFERENCES `ProjectDB`.`Student` (`StudentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`SuperAdmin`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`SuperAdmin` (
  `SuperAdminID` INT NOT NULL AUTO_INCREMENT,
  `Admin_AdminID` INT NOT NULL,
  `University_UniversityID` INT NOT NULL,
  PRIMARY KEY (`SuperAdminID`, `University_UniversityID`),
  INDEX `fk_SuperAdmin_Admin1_idx` (`Admin_AdminID` ASC),
  INDEX `fk_SuperAdmin_University1_idx` (`University_UniversityID` ASC),
  CONSTRAINT `fk_SuperAdmin_Admin1`
    FOREIGN KEY (`Admin_AdminID`)
    REFERENCES `ProjectDB`.`Admin` (`AdminID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_SuperAdmin_University1`
    FOREIGN KEY (`University_UniversityID`)
    REFERENCES `ProjectDB`.`University` (`UniversityID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;




-- -----------------------------------------------------
-- Table `ProjectDB`.`RSO`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`RSO` (
  `rsoname` VARCHAR(45) NOT NULL,
  `type` VARCHAR(45) NULL,
  `description` VARCHAR(45) NULL,
  `Admin_AdminID` INT NOT NULL,
  PRIMARY KEY (`rsoname`, `Admin_AdminID`),
  INDEX `fk_RSO_Admin1_idx` (`Admin_AdminID` ASC),
  CONSTRAINT `fk_RSO_Admin1`
    FOREIGN KEY (`Admin_AdminID`)
    REFERENCES `ProjectDB`.`Admin` (`AdminID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`Location`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`Location` (
  `Name` VARCHAR(45) NOT NULL,
  `Address` VARCHAR(45) NULL,
  `Building` VARCHAR(45) NULL,
  PRIMARY KEY (`Name`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`Event`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`Event` (
  `EventID` INT NOT NULL AUTO_INCREMENT,
  `EventCat` VARCHAR(45) NULL,
  `EventName` VARCHAR(60) NULL,
 -- `description` VARCHAR(90) NULL,
  `description` TEXT NULL,
  `ContactPhone` VARCHAR(12) NULL,
  `ContactEmail` VARCHAR(45) NULL,
  `Admin_AdminID` INT NOT NULL,
  `Location_Name` VARCHAR(45) NOT NULL,
  `DateTime` VARCHAR(45) NULL,
  `Visibility` VARCHAR(45) NULL,
  `Link` VARCHAR(90) NULL,
  PRIMARY KEY (`EventID`, `Admin_AdminID`, `Location_Name`),
  INDEX `fk_Event_Admin1_idx` (`Admin_AdminID` ASC),
  INDEX `fk_Event_Location1_idx` (`Location_Name` ASC),
  CONSTRAINT `fk_Event_Admin1`
    FOREIGN KEY (`Admin_AdminID`)
    REFERENCES `ProjectDB`.`Admin` (`AdminID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Event_Location1`
    FOREIGN KEY (`Location_Name`)
    REFERENCES `ProjectDB`.`Location` (`Name`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`NonRSOEvent`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`NonRSOEvent` (
  `Event_EventID` INT NOT NULL,
  `SuperAdmin_SuperAdminID` INT NOT NULL,
  `SuperAdmin_University_UniversityID` INT NOT NULL,
  PRIMARY KEY (`Event_EventID`, `SuperAdmin_SuperAdminID`, `SuperAdmin_University_UniversityID`),
  INDEX `fk_NonRSOEvent_SuperAdmin1_idx` (`SuperAdmin_SuperAdminID` ASC, `SuperAdmin_University_UniversityID` ASC),
  CONSTRAINT `fk_NonRSOEvent_Event2`
    FOREIGN KEY (`Event_EventID`)
    REFERENCES `ProjectDB`.`Event` (`EventID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_NonRSOEvent_SuperAdmin1`
    FOREIGN KEY (`SuperAdmin_SuperAdminID` , `SuperAdmin_University_UniversityID`)
    REFERENCES `ProjectDB`.`SuperAdmin` (`SuperAdminID` , `University_UniversityID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- -----------------------------------------------------
-- Table `ProjectDB`.`Rating`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`Rating` (
  `RatingID` INT NOT NULL AUTO_INCREMENT,
  `Rating` INT NULL,
  `Event_EventID` INT NOT NULL,
  PRIMARY KEY (`RatingID`),
   INDEX `fk_Rating_Event1_idx` (`Event_EventID` ASC),
   CONSTRAINT `fk_Rating_Event1`
    FOREIGN KEY (`Event_EventID`)
    REFERENCES `ProjectDB`.`Event` (`EventID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `ProjectDB`.`Comment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `ProjectDB`.`Comment` (
  `CommentID` INT NOT NULL AUTO_INCREMENT,
  `commentcontent` TEXT NULL,
  `Event_EventID` INT NOT NULL,
  `Student_StudentID` INT NOT NULL,
  PRIMARY KEY (`CommentID`),
   INDEX `fk_Comment_Event1_idx` (`Event_EventID` ASC),
   INDEX `fk_Comment_Student1_idx` (`Student_StudentID` ASC),
   CONSTRAINT `fk_Comment_Event1`
    FOREIGN KEY (`Event_EventID`)
    REFERENCES `ProjectDB`.`Event` (`EventID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
   CONSTRAINT `fk_Comment_Student1`
    FOREIGN KEY (`Student_StudentID`)
    REFERENCES `ProjectDB`.`Student` (`StudentID`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


insert into User(Username, password, Email)
    values('Stu', 'pass', 'stewie@knights.ucf.edu' );
	
insert into User(Username, password, Email)
    values('May', '123', 'mday@knights.ucf.edu' );

insert into User(Username, password, Email)
    values('Willis', '987', 'willie@knights.ucf.edu' );
	
insert into User(Username, password, Email)
    values('Ashley', '2323', 'ash@gmail.com' );
	
insert into User(Username, password, Email)
    values('June', 'ssap', 'jun@hotmail.com' );
	
insert into User(Username, password, Email)
    values('Luis', 'letmein', 'looie@yahoo.com' );
	
insert into University(Name, Location, Description, numStudents)
    values('University of Central Florida','FL','Go knights!', 10);
	
insert into University(Name, Location, Description, numStudents)
    values('Valencia College','FL','We say you can', 5);
	
insert into University(Name, Location, Description, numStudents)
    values('University of Florida','FL','There be gators!', 7);
	
insert into Student(User_userID, University_UniversityID)
    values(1, 1);
	
insert into Student(User_userID, University_UniversityID)
    values(2, 1);
	
insert into Student(User_userID, University_UniversityID)
    values(3, 1);	
	
insert into Student(User_userID, University_UniversityID)
    values(4, 3);
	
insert into Student(User_userID, University_UniversityID)
    values(5, 3);
	
insert into Student(User_userID, University_UniversityID)
    values(6, 2);
	
-- ucf
insert into Admin(Student_StudentID)
    values(1);
-- ucf 
insert into Admin(Student_StudentID)
    values(2);

-- valencia
insert into Admin(Student_StudentID)
    values(6);
-- uf 
insert into Admin(Student_StudentID)
    values(4);
	
insert into SuperAdmin(Admin_AdminID, University_UniversityID)
    values(1,1);
	
insert into RSO(rsoname, type, description, Admin_AdminID)
    values('Cyber Defense Club','Technology','Learn how to be secure on the Internet!',1);
	
insert into RSO(rsoname, type, description, Admin_AdminID)
    values('Intramurals','Recreational','Because having fun is fun.',2);

insert into RSO(rsoname, type, description, Admin_AdminID)
    values('Valencia is cool club','Recreational','We da best!',3);

insert into RSO(rsoname, type, description, Admin_AdminID)
    values('Overgrown reptile club','Recreational','Omg, these guys are so scaly. I love it!',4);
	
insert into Location (Name, Address, Building)
    values('University of Central Florida','4000 Central Florida Blvd',1000);

insert into Location (Name, Address, Building)
    values('Valencia College','1800 South Kirkman Road, Orlando, FL 32811',3000);

insert into Location (Name, Address, Building)
    values('University of Florida','Gainesville, FL 32611',2000);

insert into Event(EventCat, EventName, description, ContactPhone, ContactEmail, Admin_AdminID, Location_Name, DateTime, Visibility)
    values('General','First Meeting!', 'First general meeting to discuss our club this semester!', 4071213232, 'someguy@mail.com', 1, 'University of Central Florida', '4/16/15', 'Public');

insert into Rating(Rating, Event_EventID)
    values(5, 1);
	
insert into Rating(Rating, Event_EventID)
    values(4, 1);
	
insert into Event(EventCat, EventName, description, ContactPhone, ContactEmail, Admin_AdminID, Location_Name, DateTime, Visibility)
    values('General','Cool Meeting', 'First cool meeting to discuss our cool club this semester', 4077875454, 'someoneelse@mail.com', 3, 'Valencia College', '4/14/15', 'Public');

insert into Rating(Rating, Event_EventID)
    values(3, 2);
	
insert into Rating(Rating, Event_EventID)
    values(4, 2);
	
insert into Event(EventCat, EventName, description, ContactPhone, ContactEmail, Admin_AdminID, Location_Name, DateTime, Visibility)
    values('General','Repetitive Reptiles', 'Join us to discuss reptiles! ', 4072329898, 'lizzylizard@mail.com', 4, 'University of Florida', '4/11/15', 'Public');
	
insert into Rating(Rating, Event_EventID)
    values(1, 3);
	
insert into Rating(Rating, Event_EventID)
    values(2, 3);
	
 insert into Comment(commentcontent, Event_EventID, Student_StudentID)
	values('Yay!', 1, 1);
	
 insert into Comment(commentcontent, Event_EventID, Student_StudentID)
	values('This event was the best!', 1, 2);
	
 insert into Comment(commentcontent, Event_EventID, Student_StudentID)
	values('Double post. Oops.', 1, 1);
	
 insert into Comment(commentcontent, Event_EventID, Student_StudentID)
	values('It was cold.', 2, 6);
	
 insert into Comment(commentcontent, Event_EventID, Student_StudentID)
	values('Cold blooded ftw.', 3, 5);
	
 insert into Comment(commentcontent, Event_EventID, Student_StudentID)
	values('First.', 1, 3);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

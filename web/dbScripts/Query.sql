CREATE TABLE tbl_event (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
Title VARCHAR(40) NOT NULL,
Participants INT(6) NOT NULL,
Image VARCHAR(1000) NOT NULL,
Start_End_Date DATETIME,
Category VARCHAR(40),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)


CREATE TABLE tbl_category (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(40) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

CREATE TABLE tbl_gallery (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
path VARCHAR(1000) NOT NULL,
event_id INT(6) UNSIGNED NOT NULL,
FOREIGN KEY (event_id) REFERENCES tbl_event(id),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)

------------------------------------------------------------------------
INSERT INTO `tbl_event`(`Title`, `Participants`, `Image`, `Start_End_Date`, `Category`, `reg_date`) 
VALUES 
('Title One',100,'Battlefield 4 HD-933e636ce92167e1088c740bffb9538d_0.jpg','2020-07-07','birthday',NULL)
------------------------------------------------------------------------
INSERT INTO `tbl_category`(`name`, `reg_date`) 
VALUES 
('Birthday',NULL),('Convocation',NULL),('Match',NULL),('Price Distribution',NULL),('Seminar',NULL)
------------------------------------------------------------------------
INSERT INTO `tbl_gallery`(`path`, `event_id`, `reg_date`) 
VALUES 
('happy-birthday-image-10.jpg.jpg',1,NULL),
('matchEvent.jpg',1,NULL),
('seminarEvent.jpg',1,NULL),
('birthdayEvent_0.jpg',1,NULL)
------------------------------------------------------------------------
SELECT event.Title,event.Participants,event.Image,event.Start_End_Date,event.Category,gallery.path as 'Event_Gallery' 
FROM tbl_event event
INNER JOIN 
tbl_gallery gallery
ON 
event.id = gallery.event_id;
------------------------------------------------------------------------
DELETE FROM tbl_event
DELETE FROM tbl_gallery





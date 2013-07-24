# since July 12.2013 
# list of email that submmit in index page.
CREATE TABLE IF NOT EXISTS prefix_email 
(
	id INT NOT NULL AUTO_INCREMENT ,
	email VARCHAR(50) NOT NULL ,
	create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY (id) 
)
ENGINE = MyISAM CHARACTER SET = UTF8 ;
# Author:Jimages
# Since: July 18.2013
# link of others website.
CREATE TABLE IF NOT EXISTS prefix_link (
id INT NOT NULL AUTO_INCREMENT,
url VARCHAR(50) NOT NULL ,
name VARCHAR(20) NOT NULL ,
description VARCHAR(50) ,
type enum('1','2','3') NOT NULL,
PRIMARY KEY(id),
create_time TIMESTAMP DEFAULT current_timestamp
) 
ENGINE = MyISAM CHARACTER SET = UTF8;
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
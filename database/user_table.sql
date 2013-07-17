# design of blog database table 记录数据库设计 
# June 9. 2013

-- table of user
CREATE TABLE IF NOT EXISTS prefix_user
(
	id INT NOT NULL AUTO_INCREMENT ,
	name VARCHAR(20) NOT NULL UNIQUE ,
	password CHAR(32) NOT NULL ,
	latest_ip VARCHAR(15) NOT NULL ,
	latest_time DATETIME,
	create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
	INDEX (name),
    PRIMARY KEY ( id )
)
ENGINE = InnoDB CHARACTER SET  = UTF8 ;
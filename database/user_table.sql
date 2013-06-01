# design of blog database table 记录数据库设计 
# June 1. 2013

-- table of user
CREATE TABLE IF NOT EXISTS prefix_user
(
	id INT NOT NULL AUTO_INCREMENT ,
	name VARCHAR(11) NOT NULL UNIQUE ,
	password CHAR(20) NOT NULL ,
	latest_ip VARCHAR(15) NOT NULL ,
	latest_time TIMESTAMP ON UPDATE CURRENT_TIMESTAMP ,
	create_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ,
	INDEX (name),
        PRIMARY KEY ( id )
)
ENGINE = InnoDB CHARACTER SET  = UTF8 ;
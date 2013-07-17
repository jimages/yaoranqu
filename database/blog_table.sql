# design of blog database table 记录数据库设计 
# June 9. 2013


-- table of article kind
CREATE TABLE IF NOT EXISTS prefix_article_kind
(
	id INT NOT NULL AUTO_INCREMENT ,
	name VARCHAR(20) NOT NULL ,
	create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	PRIMARY KEY ( id )
)
ENGINE = InnoDB CHARACTER SET  = UTF8 ;
-- table of article 
CREATE TABLE IF NOT EXISTS prefix_blog_article
(
	id INT NOT NULL AUTO_INCREMENT  ,
	title VARCHAR(200) NOT NULL ,
	body LONGTEXT NOT NULL ,
	create_time TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
	author_id INT NOT NULL ,
	change_time DATETIME,
	kind_id INT NOT NULL ,
    PRIMARY KEY (id),
	FOREIGN KEY (author_id) REFERENCES prefix_user (id),
	FOREIGN KEY (kind_id) REFERENCES prefix_article_kind (id)
)
ENGINE = InnoDB CHARACTER SET  = UTF8 ;
-- removed article
CREATE TABLE IF NOT EXISTS prefix_blog_article_remove
(
	id INT NOT NULL AUTO_INCREMENT  ,
	title VARCHAR(200) NOT NULL UNIQUE,
	body LONGTEXT NOT NULL ,
	create_time TIMESTAMP NOT NULL,
	author_id INT NOT NULL ,
	remove_time DATETIME,
	kind_id INT NOT NULL ,
    PRIMARY KEY (id),
	FOREIGN KEY (author_id) REFERENCES prefix_user (id),
	FOREIGN KEY (kind_id) REFERENCES prefix_article_kind (id)
)
ENGINE = InnoDB CHARACTER SET  = UTF8;
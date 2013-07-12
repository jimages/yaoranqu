<?php
/* Auhor:jimages
 * Date:July 12.2013 
 * It is for article.
 */
 class Blog_article_model extends CI_Model {
	//construct function.
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	//The function is that load 3 articles for index.
	public function index_load() {
	//get 3 articles 
	$query = $this->db->query('SELECT title,body,create_time FROM prefix_blog_article ORDER BY id DESC LIMIT 0 ,3;');
	return $query->result();
	}
}
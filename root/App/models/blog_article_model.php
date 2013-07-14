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
		$query = $this->db->query('SELECT article.title,article.body,article.create_time,article.id,user.name FROM prefix_blog_article AS article,prefix_user AS user WHERE article.author_id = user.id ORDER BY article.id DESC LIMIT 0 ,3;');
		return $query->result();
	}
	public function alist($page,$number) {
		//compute data.
		$page = intval($page);
		//caculate LIMIT.
		$limit_start = $page * $number;
		//If the limit_start is not 0,reduce 1 to be friendly.
		if($limit_start != 0)
				$limit_start -= 1;
		//get $number of article title and id
		$sql = 'SELECT article.title, article.id, article.create_time, user.name
				FROM prefix_blog_article as article, prefix_user as user 
				WHERE article.author_id = user.id 
				ORDER BY id DESC 
				LIMIT ?,?;';
		$query = $this->db->query($sql,array($limit_start,$number));
		return $query->result();
	}
	//Count article
	public function acount() {
		$sql='SELECT COUNT(*) AS count FROM prefix_blog_article';
		$query = $this->db->query($sql);
		$result =  $query->result();
		$count = $result[0];
		return intval($count->count);
	}
	public function article($id=0) {
		$sql = 'SELECT article.title,article.body, article.create_time, user.name, kind.name AS kind
				FROM prefix_blog_article AS article, prefix_article_kind AS kind, prefix_user AS user
				WHERE article.id = ?
				AND article.kind_id = kind.id
				AND article.author_id = user.id
				LIMIT 0 , 1;';
		$query = $this->db->query($sql,array($id));
		return $query->result();
	}
}
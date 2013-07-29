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
		//start cache.
		$this->load->driver('cache',array('adapter' => 'file'));
		//get 3 articles 
		if(! $result = $this->cache->get('index_articles')) {
			$query = $this->db->query('SELECT article.title,article.body,article.create_time,article.id,user.name FROM prefix_blog_article AS article,prefix_user AS user WHERE article.author_id = user.id ORDER BY article.id DESC LIMIT 0 ,3;');
			$result = $query->result();
			$this->cache->save('index_articles',$result,10);
		}
		$data['articles'] = $result;
		//get day day say
		if (! $result = $this->cache->get('day_day_say')) {
		$query = $this->db->query('SELECT content,DATE(create_time) AS create_time 
									FROM prefix_day_day_say
									ORDER BY id DESC
									LIMIT 0,1;');
			$result = $query->result();
			$result = $result[0];
			$this->cache->save('day_day_say',$result,60);
		}
		$data['day_day_say'] = $result;
		return $data;
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
		$sql = 'SELECT article.title,article.body, article.create_time, user.name, kind.name AS kind , article.id
				FROM prefix_blog_article AS article, prefix_article_kind AS kind, prefix_user AS user
				WHERE article.id = ?
				AND article.kind_id = kind.id
				AND article.author_id = user.id
				LIMIT 0 , 1;';
		$query = $this->db->query($sql,array($id));
		return $query->result();
	}
	//Function: create_article.
	// This function will create a now article.
	//It need 3 arguments,including titile,article type,content.
	//It return TRUE or FALSE.Explain seccess or fail.
	public function create_article ($title,$type,$content) {
		//find type first
		$find_sql = 'SELECT id FROM prefix_article_kind WHERE name=? LIMIT 0,1';
		$query = $this->db->query($find_sql,array($type));
		$result = $query->result();
		if(count($result) == 0)
			return FALSE;
		$type_id = $result[0]->id;
		//load session.
		$this->load->library('session');
		//Set creation sql
		$sql = 'INSERT INTO prefix_blog_article (title,kind_id,author_id,body) VALUES ( ? ,?, ?, ?)';
		$insert = array(
			$title,
			$type_id,
			$this->session->userdata('user_id'),
			$content);
		//insert data.
		if($this->db->query($sql,$insert)) {
			return TRUE;
		}else{
			return FALSE;
		}	
	}
}
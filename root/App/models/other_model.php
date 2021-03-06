<?php
	/* Author:jimages
	 * Since July 19.2013
	 */
	class Other_model extends CI_Model {
	//check user's browser.If it is ie6 or ie7 go to saygoodbye page.
	function check_browser() {
		//load library.
		$this->load->library('user_agent');
		$browser = $this->agent->browser();
		if(strcasecmp('Internet Explorer',$browser) == 0) {
			$version = $this->agent->version();
			$version = (double)$version;
			if($version < 8.0) {
				//If ie version is wrong.go to saygoodbye page.
				$this->load->helper('url');
				redirect('http://www.yaoranqu.com/say_goodbye/');
			}
		}
	}
	//Get footer link data.
	public function get_links() {
		//Will get cache,if it exists.
		$this->load->driver('cache',array('adapter' => 'file', 'backup' => 'apc'));
		$data = $this->cache->get('footer_links');
			if ( $data === FALSE ) {
				//if cache does't esists.Get it from database.
				$sql = 'SELECT name,url,description,type
						FROM prefix_link 
						ORDER BY id ASC;';
				$query = $this->db->query($sql);
				$data = $query->result();
				//cache it.
				$this->cache->save('footer_links',$data,3600);
			}
		return $data;
	}
	public function add_link($name,$url,$description,$position) {
		//change position value.
		if(empty($description))
			$description = NULL;
		if(strcasecmp($position,'') == 0)
			$position = NULL;
		switch($position) {
			case '上' :
				$position = '1';
				break;
			case '中' :
				$position = '2';
				break;
			case '下';
				$position = '3';
				break;
			default:
				//If don't have correct argument。
				return FALSE;
		}
		$sql= 'INSERT INTO prefix_link (name,url,description,type) VALUES (?,?,?,?);';
		return $this->db->query($sql,array( $name,$url,$description,$position)); 
	}
	public function day_day_say($content) {
		$sql = 'INSERT INTO prefix_day_day_say (content) VALUES (?);';
		return $this->db->query($sql,array($content));
	}
	//Function: get_day_day_say.
	//The function will load  and return day day say.
	public function get_day_day_say() {
		if ( FALSE ==  ($result = $this->cache->get('day_day_say'))) {
		$query = $this->db->query('SELECT content,DATE(create_time) AS create_time 
									FROM prefix_day_day_say
									ORDER BY id DESC
									LIMIT 0,1;');
			$result = $query->result();
			$result = $result[0];
			$this->cache->save('day_day_say',$result,60);
		}
		 return $result;
	}
}
//End Of File 
//App/models/other_model.php
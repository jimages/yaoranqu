<?php
 /* Author:jimages
  * Since:July 13.2013
  * admin of yaoranqu
  */
  class Admin extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model('user_model','user');
		//Check user whether has logined.
		if(!$this->user->check_login()) {
			//go to login and set where come
			$this->load->library('session');
			$this->session->set_userdata('where_come','http://www.yaoranqu.com/admin/');
			//redirect
			$this->load->helper('url');
			redirect('http://www.yaoranqu.com/login/','location',302);
		}
	}
	public function index() {
		$this->load->view('admin/index.php');
	}
	//This is a Ajax function. Insert article.
	public function create_article (){
		//load user model
		$this->load->model('user_model','user');
		//check user Whether has logined.
		//If user hasn't logined.return error.
		if (!$this->user->check_login()) {
			$data['code'] = 1;
			$data['error'] = 'E003';
			$this->load->view('admin/return_article',$data);
			return FALSE;
		}
		//Get post data.Set short name.
		$title = $this->input->post('title');
		$type = $this->input->post('textType');
		$content = $this->input->post('content');
		if(empty($title) || empty($type) || empty($content) ) {
			$data = array (
				 'code' => '1',
				'error' => 'E000');
			$this->load->view('admin/return_article',$data);
			return FALSE;
		}
		//load article model.
		$this->load->model('blog_article_model','article');
		if($this->article->create_article($title,$type,$content)) {
			//If create successful.
			$data['code'] = 0;
			$this->load->view('admin/return_article',$data);
		} else {
			//If fail
			$data['code'] = 1;
			$data['error'] = 'E004';
			$this->load->view('admin/return_article',$data);
			/* view varibles list 
			 * code --> If it is  0. explain success.If it is 1.Explain fail.
			 * error -->If code is 1,error will include error number.
			 */
			 
			 /* error list 
			  * E003 -->user hssn't logined.
			  * E004 -->create fail.
			  * E000 -->one or more is empty.
			  */
		}
	}
	//the function is to add a link to other website.
	public function add_link() {
		//create shoet name
		$name = $this->input->post('name');
		$url =$this->input->post('url');
		$position = $this->input->post('position');
		$description = $this->input->post('description');
		//check data.
		if($name == FALSE || $url == FALSE || $position == FALSE) {
			$data = array('code'=>1,
						'message'=>'除描述外其余不能为空');
			$this->load->view('admin/add_link.php',$data);
			return FALSE;
		}
		//If ok.load model.write into database.
		$this->load->model('other_model','other');
		if ($this->other->add_link($name,$url,$description,$position)) {
			$data = array ('code'=>0);
		} else {
			$data = array ('code'=>1,'message'=>'数据存储时发生错误');
		}
		//sent data to view.
		$this->load->view('admin/add_link.php',$data);
	}
	//Create a now day day say.
	public function day_day_say() {
		//Create short name
		$content = $this->input->get('content');
		//load library
		$this->load->model('other_model','other');
		//clean xss.
		$content = $this->security->xss_clean($content);
		//check data 
		if(empty($content)) {
			$data['code'] = 1;
			$data['message'] = '你的输入为空，或者含有非法字符';
			$this->load->view('admin/day_day_say',$data);
			return false;

		}
		if ($this->other->day_day_say($content)) {
			$data['code'] = 0;
		} else {
			$data = array( 'code'=>1,
							'message'=>'数据在存储过程中出现错误');
		}
		$this->load->view('admin/day_day_say',$data);
	}
}
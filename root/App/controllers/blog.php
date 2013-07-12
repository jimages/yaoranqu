<?php
/* Author:Jimaes 
 * Date:July 11.2013
 * The class is blog 
 */
class Blog extends CI_Controller {
	//Index page of blog.
	public function index() {
	//Load 3 articles.
	$this->load->model('blog_article_model','article');
	$data['articles'] =  $this->article->index_load();
	// Load view.
	$this->load->view('blog/index.php',$data);
	/* viwe varibles map
	 * articles --> 3 latest article.It is a array inludeing object
	 *	| article[?]->title  --> Article title.
	 *  | article[?]->body 	-->Content of article.
	 *  | article[?]->create_time -->time of article be created.
	 */
	}
	//When user submit email address.
	public function getEmail() {
		//load email helper function 
		$this->load->helper('email');
		//create shrot varible 
		$email = $this->input->get('email');
		if ($email == FALSE || !valid_email($email) ) {
			//If don't have any character or address is wrong .Return E000.It explain that email is empty or incorrect.
			$data['code'] = 'E000';
			$data['message'] = '您输入的地址为错或者为空，请检查。';
		} else {
			//Load email Model.
			$this->load->model('email_model','email');
			if ( FALSE == $this->email->insert($email)) {
				// If fail to insert.
				 //E001 explain that insertion has a error.
				$data['code'] = 'E001';
				$data['message'] = '出现了错误，请重试，或者向我们报告。';
			} else {
				// If don't have any error.
				// 200 explain that insertion succeed.
				$data['code'] = '200';
			}
		}
		//load views.
		$this->load->view('blog/emailReturn',$data);
		/* view varibles map
		 * code --> It is code of state.there is value possibly below.
		 *  |	E000 -->It explain that email is empty or incorrect.
		 *  |	E001 -->Insertion has a error.
		 *	|	200  -->It seems that all things are OK.
		 * message --> If has error,the error message will be here.
		 */
	}
}
// End of file 
// File:App/controllers/blog.php
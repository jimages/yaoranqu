<?php
/* Author:Jimaes 
 * Date:July 11.2013
 * The class is blog 
 */
class Blog extends CI_Controller {
	//check user browner.
	public function __construct() {
	parent::__construct();
	//load check model.
	$this->load->model('other_model','other');
	$this->other->check_browser();
	}
	//Index page of blog.
	public function index() {
		//Load 3 articles.
		$this->load->model('blog_article_model','article');
		$data =  $this->article->index_load();
		// Load view.
		$this->load->view('blog/index.php',$data);
		/* viwe varibles map
		* articles --> 3 latest article.It is a array inludeing object
		*  | article[?]->id -->id of article. 
		*  | article[?]->title  --> Article title.
		*  | article[?]->body 	-->Content of article.
		*  | article[?]->name -->author's name.
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
	//The list of articles.If don't have any argument.display first page.
	// 0 explain first page And so on.
	public function alist($page = 0) {
		$this->load->model('blog_article_model','article');
		//How many articles in this page.
		define('NUMBER_OF_A_PAGE',20);
		//Count article.		
		$count = ($this->article->acount());
		//caculate max page number.
		$max_page = (($count - ($count % NUMBER_OF_A_PAGE)) / NUMBER_OF_A_PAGE)+1;
		$data['list'] = $this->article->alist($page,NUMBER_OF_A_PAGE);

		//count the data.if it is'not 20 and the $page is not 0 ,won't display pageNext.
		$count = count($data['list']);
		$data['is_display_pageNext'] =(($count == 20 || $page != 0) ?TRUE:FALSE);
		// set item of div pageNext.
		// $page add 1 be equal to page number.There is page number.be not the same as $page.
		// If the useful pages litter than 9,It only display useful page.
		 $now_page = $data['now_page'] = $page + 1;
		if ($now_page <= 5 && $max_page >= 9) { 
			$page_start = 1;
			$page_end = 9;
		} 
		if ($now_page > 5 && $max_page >= $now_page +4) {
			$page_start = $now_page -4;
			$page_end = $now_page +4;
		}
		if ($max_page < 9) {
			$page_start = 1;
			$page_end = $max_page;
		}
		if ( $max_page >= 9 && ($max_page - $now_page) < 4) {
			$page_start = $max_page - 8;
			$page_end = $max_page;
		}
		$data['page_item'] = range($page_start,$page_end);
		// if now page is max page.don't display next page.
		$data['is_display_next_page'] = $now_page == $max_page? FALSE:TRUE;
		$data['max_page'] = $max_page;
		$this->load->view('blog/list',$data);
		/* view varible map
		 * list --> list of articles title and other.It is a array.Each item is a stdclass.
		 *  | list[?]->id  --> Id of article.That make the URL of the article need id.
		 *  | list[?]->title -->Title of the article.
		 *  | list[?]->author --> name of author.
		 *  | list[?]->create_time --> time of creating article.
		 * is_display_pageNext -->If display the div nemed pageNext.
		 * is_display_next_page --> wherer display next page button.
		 * now_page --> The page number that visitor visit now.
		 * page_item -->(array) All of the div '#pageNext' number.
		 * max_page -->number of max page.
		 */
 	}
	public function article($id = 1) {
		//Load model.
		$this->load->model('blog_article_model','article');
		//Get article data.
		$data['article'] = $this->article->article($id);
		$data['article'] = $data['article'][0];
		$this->load->view('blog/article',$data);
	}
}
// End of file 
// File:App/controllers/blog.php
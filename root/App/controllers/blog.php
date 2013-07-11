<?php
/* Author:Jimaes 
 * Date:July 11.2013
 * The class is blog 
 */
class Blog extends CI_controller {
	//Index page of blog.
	public function index() {
	$this->load->view('blog/index.php');
	}
}
// End of file 
// File:blog.php
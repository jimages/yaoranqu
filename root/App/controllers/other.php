<?php 
	/* Author:jimages
	 * Since July 19.2013
	 */
	class other extends CI_controller {
	//page is for ie6 ie7.
	public function say_goodbye() {
		$this->load->view('other/say_goodbye');
	}	
}
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
}
//End Of File 
//App/models/other_model.php
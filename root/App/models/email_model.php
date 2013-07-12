<?php 
/* Author:jimages
 * Since:July 12.2013
 */
class Email_model extends CI_Model {
	public function __construct ()
	{
		parent::__construct();
		$this->load->database();
	}
		
	//Insert email address into email.
	public function insert($email) {
		//set sql statement.
		$sql = "INSERT INTO prefix_email (email) VALUES (?)";
		return $this->db->query($sql,array($email));
	}		
}
//End Of File
//File Name:App/models/email_model.php
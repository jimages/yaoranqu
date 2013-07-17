<?php 
/* Author:Jimages
 * Since: July 14.2013
 */
 	//user's message list.
	// user_id --> id of user.
	// user_name -->user's name.
	// user_token --> It is for check user.
	// user_salt --> Tt is for check user.
	
	
	
	class User_model extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
	}
	//check user's password if correct.
	//If right, will return message about user and set session.If wrong,will return FALSE.
	
	 //values that are returned  list.
	// user_id --> id of user.
	// user_name -->user's name.
	// user_token --> It is for check user.
	// user_salt --> Tt is for check user.
	
	public function login($username,$password) {
		$sql = 'SELECT id,name,password FROM prefix_user WHERE name = ? LIMIT 0,1;';
		$query = $this->db->query($sql,array($username));
		$result = $query->result();
		if (count($result) == 0)
			return FALSE;
		$db_password = $result[0] -> password;
		if ($db_password != $password)
			return FALSE;
		//If check that password is right.
		//return user's information and set session.
		$this->load->library('session');
		//set rand function.
		srand(time()%100000);
		$salt = (string)rand();
		$hash_password = hash('md5',$password.$salt);
		$data = array (
			'user_id' => $result[0]->id,
			'user_name' => $result[0]->name,
			'user_token' => $hash_password,
			'user_salt' => $salt
			);
		$this->session->set_userdata($data);
		$data['user_token'] = hash('md5',$hash_password.$_SERVER['REMOTE_ADDR']);
		return $data;
	}
	/* Author:Jimages
	 * Since:July 15.2013
	 * action about psssword.
	 */
	 
	//Function:mcrypt($username,$password)
	//The username is clearly.just is username
	//The password is string that has been hashed twice.
	//The function return a value.Just like this.
	//	 |-password -->a string that be encrpted.
	
	function encrypt($a_username,$a_password) {
		$username = $a_username;
		$password = $key = $a_password;
		//Encrypt username.
		//setup Encryption
		$mc = mcrypt_module_open('rijndael-256','',MCRYPT_MODE_ECB,'');
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($mc),MCRYPT_RAND);
		$key_lengh = mcrypt_enc_get_key_size($mc);
		
		//complet key.
		$key = substr($key,0,$key_lengh);
		// Intialize encryption 
		mcrypt_generic_init($mc,$key,$iv);
		// Encrypt data 
		$username = base64_encode(mcrypt_generic($mc,$username));
		//Close encrypt.
		mcrypt_generic_deinit($mc);
		mcrypt_module_close($mc);
		
		//create password.
		$password = hash('md5',$username.$password);
		
		
		return $password;
	}
	//Function:checo_login(void)
	//The function will check if user has logined.
	//It return false or true.If is true.explain that user has logined.
	//	|-TRUE or FALSE
	public function check_login() {
		//load library
		$this->load->library('session');
		$this->load->model('user_model');
		//Frst.check wheher session exists.
		//Create short name.
		$user_id = $this->session->userdata('user_id');
		$user_name = $this->session->userdata('user_name');
		$user_token = $this->session->userdata('user_token');
		$user_salt = $this->session->userdata('user_salt');
		if(!$user_id || !$user_name || !$user_token || !$user_salt)
			return FALSE;
		//get client token and ip.
		$cl_token = $this->input->cookie('token');
		$cl_ip = $_SERVER['REMOTE_ADDR'];
		//Start caculate token.
		$token = hash('md5',$user_token.$cl_ip);
		if($token == $cl_token) {
			return TRUE;
		}else{
			return FALSE;
		}
	}
}
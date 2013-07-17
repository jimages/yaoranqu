<?php 
/* Author:Jimages
 * Since July 14.2013
 * These action all are about user.
 */
 class user extends CI_Controller {
	//user login.
	public function login() { 
		$this->load->view('user/login');
	}
	public function check_login () {
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		//load user model and session.
		$this->load->model('user_model','user');
		$this->load->library('session');
			if (!$username   ||  !$password  ) {
				//If don't have any input.It will return error.
				$data['code'] = 1;
				$data['err_message'] = '你没有输入用户名或者密码，请重试';
				$this->load->view('user/login_check',$data);
				return FALSE;
			}
			//encrypt password in order to check password.
			$password = $this->user->encrypt($username,$password);
			$user = $this->user->login($username,$password);
			if(FALSE === $user) {
				$data = array(
					'code'=>1,
					'error'=>'E002');
				$this->load->view('user/login_check',$data);
				return FALSE;
			}
			$data = array (
				'code' => '0',
				'token' => $user['user_token']
				);
			$where_come = $this->session->userdata('where_come');
			if(FALSE === $where_come)
				//If don't have comming address.go index.
				$where_come = 'http://www.yaoranqu.com/';
			$data['where_to_go'] = $where_come;
			$this->load->view('user/login_check',$data);
			/* error list 
			 *  |-E002 -->the password is wrong or empty.
			 */
	}
	public function test () {
		echo time ( );
	}
}
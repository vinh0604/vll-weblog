<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		session_start();
		$this->load->library('util');
		if(!isset($_SESSION['mataikhoan'])){
			if($this->input->post(username)){
				$u = $this->input->post(username);
				$has_pw = $this->input->post(password);
				$pw = sha1($has_pw);
				$this->load->model('Login_model');
				$this->Login_model->verifyUser($u,$pw);
				if(isset($_SESSION['mataikhoan'])){
					redirect(base_url().'index.php/sample');
				}else{
					$data['error'] = $_SESSION['error'];
					$data['username'] = $u;
				}
			}
			$this->load->view('login_view', $data);	
		}else{
			redirect(base_url().'index.php/sample');		
		}
	}
	
	
}
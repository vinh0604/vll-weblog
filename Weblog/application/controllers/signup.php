<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signup extends CI_Controller {

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
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		
		$this->util->connect();
		//$this->load->model('Poll_model');
		//$data['polls'] = $this->Poll_model->getBinhchons($mataikhoan);
		$this->load->view('signup_view',$data);
		//$this->load->view('captcha');
	}
	
	
}
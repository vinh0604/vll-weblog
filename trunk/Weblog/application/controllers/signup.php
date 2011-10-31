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
		
		//$this->output->enable_profiler(TRUE);
		$this->util->connect();
		
		if($this->input->post(account)){
			$acc = $this->input->post(account);
			$pw = $this->input->post(password);
			$ve_pw = $this->input->post(verify_password);
			$ema = $this->input->post(email);
			$add = $this->input->post(address);
			$pho = $this->input->post(phone_no);
			$nam = $this->input->post(name);
			$sn = $this->input->post(sn);
			
			$this->load->model("Signup_model");
			if($this->Signup_model->addAccount($acc, $pw, $ve_pw, $ema, $add, $pho, $nam, $sn)){
				redirect(base_url().'index.php/login');
			}
			$data['alert'] = $_SESSION['alert'];
			
		}
		$this->load->view('signup_view',$data);
		//$this->load->view('captcha');
	}
	
	public function checkUser(){
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$acc = $_POST['name'];
		if($acc != ""){
			$this->load->model("Signup_model");
			echo $this->Signup_model->checkUser($acc);
		}
	}
	
}

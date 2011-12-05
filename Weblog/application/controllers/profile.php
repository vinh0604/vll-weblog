<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {
	
	public function index()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->util->connect();
		$this->load->model('Profile_model');
		
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		if(isset($_POST['name']))
			$this->Profile_model->updateAccount($this->input->post('name'),$this->input->post('address'),$this->input->post('email'),$this->input->post('phone'), $mataikhoan);
		$data['thongtins'] = $this->Profile_model->getAccount($mataikhoan);
				
		$this->load->view('manageprofile_view',$data);
	}
	
	public function changeprofile()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->util->connect();
		$this->load->model('Profile_model');
		
		$data['thongtins'] = $this->Profile_model->getAccount($mataikhoan);
		
		$this->load->view('ajax/ajax.changeprofile.php',$data);
	}
	
	public function changepassword()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->util->connect();
		$this->load->model('Profile_model');
		
		$data['thongtins'] = $this->Profile_model->getAccount($mataikhoan);
		
		$this->load->view('ajax/ajax.changepassword.php',$data);
	}
	
	public function password()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->util->connect();
		$this->load->model('Profile_model');
		
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		if(isset($_POST['pass_cu']) && isset($_POST['pass_moi']) && isset($_POST['pass_moi_re']))
			$this->Profile_model->updatePassword($this->input->post('pass_cu'),$this->input->post('pass_moi'),$this->input->post('pass_moi_re'), $mataikhoan);
		$data['thongtins'] = $this->Profile_model->getAccount($mataikhoan);
				
		$this->load->view('managepassword_view',$data);
	}
	
	public function display()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->util->connect();
		$this->load->model('Profile_model');
		
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		$data['sobai'] = $this->Profile_model->getSobai($mataikhoan);
		
		$this->load->view('display_view',$data);
	}
	
	public function changedisplay()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$sobai = intval($this->input->post('sobai'));
		if($sobai>0)
		{
			$this->util->connect();
			$this->load->model('Profile_model');
			$this->Profile_model->updateSobai($mataikhoan,$sobai);
		}
		redirect(base_url('index.php/profile/display'));
	}
}
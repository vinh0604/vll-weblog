<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Poll extends CI_Controller {

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
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->util->connect();
		$this->load->model('Poll_model');
		$data['polls'] = $this->Poll_model->getBinhchons($mataikhoan);
		$this->load->view('poll_view',$data);
	}
	
	public function addnew() 
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}

		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->load->view('addpoll_view',$data);
	}
	
	public function submitadd()
	{
		session_start();
		$this->load->library('util');
		$this->load->library('form_validation');
		$this->lang->load('form_validation','vietnamese');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$this->form_validation->set_rules('cauhoi','Câu hỏi','required');
		$this->form_validation->set_rules('dapan[]','Các đáp án','required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['bar'] = $this->load->view('bar_view',null,true);
			$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
			$this->load->view('addpoll_view',$data);
		}
		else 
		{
			$this->util->connect();
			$this->index();
		}
	}
}

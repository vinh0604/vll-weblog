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
		$mataikhoan = $_SESSION['mataikhoan'];
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
		$mataikhoan = $_SESSION['mataikhoan'];
		
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
			$poll['cauhoi']=$this->input->post('cauhoi');
			if($this->input->post('trangthai')=='on')
			{
				$poll['trangthai']=1;
			}
			else 
			{
				$poll['trangthai']=0;
			}
			$poll['dapans']=$this->input->post('dapan');
			$this->load->model('Poll_model');
			if ($this->Poll_model->addBinhchon($mataikhoan,$poll)==false) 
			{
				show_error("Rất tiếc! Có lỗi đã xảy ra!");
			}
			else 
			{
				redirect(base_url('index.php/poll'));
			}
		}
	}
	
	public function delete()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$mabinhchon = 0;
		if(isset($_POST['mabinhchon'])) {
			$mabinhchon = intval($_POST['mabinhchon']);
		}
		$this->util->connect();
		$this->load->model('Poll_model');
		if ($this->Poll_model->deleteBinhchon($mataikhoan,$mabinhchon)==false) 
		{
			show_error("Rất tiếc! Có lỗi đã xảy ra!");
		}
		else 
		{
			redirect(base_url('index.php/poll'));
		}
	}
	
	public function modify($mabinhchon)
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$mabinhchon = intval($mabinhchon);
		$this->util->connect();
		$this->load->model('Poll_model');
		if ($this->Poll_model->checkBinhchon($mataikhoan,$mabinhchon) == 0) {
			show_error("Bình chọn không tồn tại!");
		}
		else {
			$data['bar'] = $this->load->view('bar_view',null,true);
			$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
			
			$poll = $this->Poll_model->getBinhchon($mabinhchon);
			$data['poll'] = $poll;
			$this->load->view('modifypoll_view',$data);
		}
	}
	
	public function submitmodify()
	{
		session_start();
		$this->load->library('util');
		$this->load->library('form_validation');
		$this->lang->load('form_validation','vietnamese');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->form_validation->set_rules('mabinhchon','Mã bình chọn','required');
		$this->form_validation->set_rules('cauhoi','Câu hỏi','required');
		if ($this->form_validation->run() == FALSE)
		{
			$data['bar'] = $this->load->view('bar_view',null,true);
			$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
			$this->load->view('modifypoll_view',$data);
		}
		else 
		{
			$mabinhchon = $this->input->post('mabinhchon');
			$this->util->connect();
			$poll['cauhoi']=$this->input->post('cauhoi');
			if($this->input->post('trangthai')=='on')
			{
				$poll['trangthai']=1;
			}
			else 
			{
				$poll['trangthai']=0;
			}
			$poll['dapans']=$this->input->post('dapan');
			$poll['dapanxoa']='('.substr($this->input->post('dapanxoa'),1,-1).')';
			$this->load->model('Poll_model');
			if ($this->Poll_model->updateBinhchon($mataikhoan,$mabinhchon,$poll)==false) 
			{
				show_error("Rất tiếc! Có lỗi đã xảy ra!");
			}
			else 
			{
				redirect(base_url('index.php/poll'));
			}
		}
	}
}

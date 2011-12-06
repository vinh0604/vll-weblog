<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends CI_Controller {
	
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
		$this->load->Model('Page_model');
		
		$data['pages'] = $this->Page_model->getPages($mataikhoan);
		
		$this->load->view('managepage_view',$data);	
	}
	
	public function insert()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->load->view('insertpage_view',$data);	
	}
	
	public function submitinsert()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$this->util->connect();
		$this->load->Model('Page_model');
		
		$tieude = $this->input->post('tieude');
		$tacgia = $this->input->post('tacgia');
		$noidung = $this->input->post('noidung');
		
		$this->Page_model->insertPage($mataikhoan, $tieude, $noidung, $tacgia);
		redirect(base_url().'index.php/page');
	}
	
	public function edit()
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
		$this->load->Model('Page_model');
		
		$matrang = $this->uri->segment(3,0);
		$data['trangs'] = $this->Page_model->getPage($mataikhoan, $matrang);
		$result = $this->load->view('editpage_view', $data, true);
		echo $result;
	}
	
	public function submitedit()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$this->util->connect();
		$this->load->Model('Page_model');
		
		$matrang = $this->uri->segment(3,0);
		$tieude = $this->input->post('tieude');
		$tacgia = $this->input->post('tacgia');
		$noidung = $this->input->post('noidung');
		
		$this->Page_model->updatePage($mataikhoan, $matrang, $tieude, $noidung, $tacgia);
		redirect(base_url().'index.php/page');
	}
	
	public function delete()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->util->connect();
		$this->load->Model('Page_model');
		
		$matrang = $this->input->post('trang');
		$this->Page_model->deletePage($mataikhoan, $matrang);
		
		redirect(base_url().'index.php/page');		
	}
	
}
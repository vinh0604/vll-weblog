<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tag extends CI_Controller {
	
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
		$this->load->Model('Tag_model');
		
		$data['tags'] = $this->Tag_model->getTags($mataikhoan);
		
		$this->load->view('managetag_view',$data);
	}
	
	public function insert()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->load->view('ajax/ajax.inserttag.php');
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
		$this->load->Model('Tag_model');
		
		$tentag = $this->input->post('tentag');
		$mota = $this->input->post('mota');
		$this->Tag_model->insertTag($mataikhoan, $tentag, $mota);
		
		$data['tags'] = $this->Tag_model->getTags($mataikhoan);
		$this->load->view('ajax/ajax.managetag.php',$data);
	}
	
	public function edit()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		
		$this->util->connect();
		$this->load->Model('Tag_model');
		
		$matag = $this->input->post('matag');
		$data['tags'] = $this->Tag_model->editTag($mataikhoan, $matag);
		
		$this->load->view('ajax/ajax.edittag.php',$data);
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
		$this->load->Model('Tag_model');
		
		$matag = $this->input->post('matag');
		$tentag = $this->input->post('tentag');
		$mota = $this->input->post('mota');
		$this->Tag_model->updateTag($mataikhoan, $matag, $tentag, $mota);
		
		$data['tags'] = $this->Tag_model->getTags($mataikhoan);
		$this->load->view('ajax/ajax.managetag.php',$data);
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
		$this->load->Model('Tag_model');
		
		$matag = $this->input->post('matag');
		$this->Tag_model->deleteTag($mataikhoan, $matag);
		
		$data['tags'] = $this->Tag_model->getTags($mataikhoan);
		$this->load->view('ajax/ajax.managetag.php',$data);
	}
}
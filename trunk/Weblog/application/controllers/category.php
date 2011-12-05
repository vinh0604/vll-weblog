<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Category extends CI_Controller {
	
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
		$this->load->model('Category_model');
		
		$data['chuyenmucs'] = $this->Category_model->getCategorys($mataikhoan);
		
		$this->load->view('managecategory_view',$data);
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
		$this->load->model('Category_model');
		
		$tenchuyenmuc = $this->input->post('tenchuyenmuc');
		$mota = $this->input->post('mota');
		$this->Category_model->insertCategory($mataikhoan, $tenchuyenmuc, $mota);
		
		$data['chuyenmucs'] = $this->Category_model->getCategorys($mataikhoan);
		$this->load->view('ajax/ajax.managecategory.php',$data);
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
		$this->load->model('Category_model');
		
		$machuyenmuc = $this->input->post('machuyenmuc');
		$this->Category_model->deleteCategory($mataikhoan, $machuyenmuc);
		
		$data['chuyenmucs'] = $this->Category_model->getCategorys($mataikhoan);
		$this->load->view('ajax/ajax.managecategory.php',$data);
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
		$this->load->model('Category_model');
		
		$machuyenmuc = $this->input->post('machuyenmuc');
		$data['chuyenmucs'] = $this->Category_model->editCategory($mataikhoan, $machuyenmuc);
		
		$this->load->view('ajax/ajax.editcategory.php',$data);
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
		$this->load->model('Category_model');
		
		$machuyenmuc = $this->input->post('machuyenmuc');
		$tenchuyenmuc = $this->input->post('tenchuyenmuc');
		$mota =$this->input->post('mota');
		$data['chuyenmucs'] = $this->Category_model->updateCategory($mataikhoan, $machuyenmuc, $tenchuyenmuc, $mota);
		
		$this->load->view('ajax/ajax.insertcategory.php');
	}
	
	public function manage()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$this->util->connect();
		$this->load->model('Category_model');
		
		$data['chuyenmucs'] = $this->Category_model->getCategorys($mataikhoan);
		$this->load->view('ajax/ajax.managecategory.php',$data);
	}
}
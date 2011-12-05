<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Link extends CI_Controller {
	
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
		$this->load->model('Link_model');
		
		$data['links'] = $this->Link_model->getLinks($mataikhoan);
		
		$this->load->view('managelink_view',$data);
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
		$this->load->model('Link_model');
		
		$this->Link_model->deleteLink($mataikhoan, $this->input->post('lienket'));
		
		redirect(base_url().'index.php/link');
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
		$this->load->model('Link_model');
		
		$malienket = $this->uri->segment(3,0);
		$data['malienket'] = $malienket;
		$data['links'] = $this->Link_model->getLink($mataikhoan, $malienket);
				
		$this->load->view('editlink_view',$data);
	}
	
	public function submitedit()
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
		$this->load->model('Link_model');
		$malienket = $this->uri->segment(3,0);
		$tenlink = $this->input->post('name');
		$duongdan = $this->input->post('link');
		$this->Link_model->updateLink($mataikhoan, $malienket, $tenlink, $duongdan);
		
		redirect(base_url().'index.php/link');	
	}
	
	public function insertlink()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		
		$this->load->view('insertlink_view',$data);
	}
	
	public function submitinsert()
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
		$this->load->model('Link_model');
		
		$tenlink = $this->input->post('name');
		$duongdan = $this->input->post('link');
		$this->Link_model->insertLink($mataikhoan, $tenlink, $duongdan);
		
		redirect(base_url().'index.php/link');		
	}
}
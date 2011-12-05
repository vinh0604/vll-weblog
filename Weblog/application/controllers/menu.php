<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Menu extends CI_Controller {
	
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
		$this->load->model('Menu_model');
		$data['listmenu'] = $this->Menu_model->getListMenu($mataikhoan);
		
		$this->load->view('managemenu_view',$data);
	
	} 
	
	public function insertmenu()
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
		$this->load->model('Menu_model');
		$data['catagorys'] = $this->Menu_model->getCategorys($mataikhoan);
		$data['pages'] = $this->Menu_model->getPages($mataikhoan);
		
		$this->load->view('insertmenu_view', $data);
	}
	
	public function insertsubmit()
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
		$this->load->model('Menu_model');
		$tenmenu = $_POST["tenmenu"];
		$items = json_decode($this->input->post('danhsachitem'), true);
		$this->Menu_model->insertMenu($mataikhoan, $tenmenu);
		$mamenus = $this->Menu_model->idMenu($mataikhoan);
		if(count($items)!=0)
		{
			$mamenus = $this->Menu_model->idMenu($mataikhoan);
			$mamenu = 0;
			foreach($mamenus as $id):
				$mamenu = $id['id'];
			endforeach;
			foreach($items as $item):
				$this->Menu_model->insertItem($mamenu, $item['tenitem'], $item['loai'], $item['thongtin_ma'], $item['thongtin']);
			endforeach;
		}	
		redirect(base_url().'index.php/menu');
	}
	
	public function editmenu()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);		
		
		$mamenu = $this->uri->segment(3,0);
		$this->util->connect();		
		$this->load->model('Menu_model');
		$data['catagorys'] = $this->Menu_model->getCategorys($mataikhoan);
		$data['pages'] = $this->Menu_model->getPages($mataikhoan);
		$data['imenu'] = $this->Menu_model->getMenu($mataikhoan, $mamenu);
		$data['items'] = $this->Menu_model->getItems($mamenu);		
		
		$this->load->view('editmenu_view', $data);
	}
	
	public function submiteditmenu()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);		
		
		$mamenu = $this->uri->segment(3,0);
		$this->util->connect();		
		$this->load->model('Menu_model');
		
		$tenmenu = $this->input->post('tenmenu');
		$this->Menu_model->updateMenu($mataikhoan, $mamenu, $tenmenu);
		$del_items =  json_decode($this->input->post('danhsachitemxoa'), true);
		foreach($del_items as $item):
			$this->Menu_model->deleteItem($mamenu, $item['maitem']);
		endforeach;
		$items = json_decode($this->input->post('danhsachitem'), true);
		foreach($items as $item):
				$this->Menu_model->insertItem($mamenu, $item['tenitem'], $item['loai'], $item['thongtin_ma'], $item['thongtin']);
		endforeach;
		redirect(base_url().'index.php/menu');
	}
	
	public function deletemenu()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		
		$mataikhoan = $_SESSION['mataikhoan'];
		$mamenu = $this->input->post('mamenu');
		$this->util->connect();		
		$this->load->model('Menu_model');
		$this->Menu_model->deleteItems($mamenu);
		$this->Menu_model->deleteMenu($mataikhoan, $mamenu);
		redirect(base_url().'index.php/menu');
	}
	
	public function ajaxmenu()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		$this->util->connect();		
		$this->load->model('Menu_model');
		
		$mamenu = $this->input->post('mamenu');
		$this->Menu_model->updateStatusMenus($mataikhoan);
		$this->Menu_model->updateStatus($mataikhoan, $mamenu);
		
		$data['listmenu'] = $this->Menu_model->getListMenu($mataikhoan);
		$this->load->view('ajax/ajax.managermenu.php', $data);
	}
	
}
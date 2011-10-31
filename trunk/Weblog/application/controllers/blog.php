<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends CI_Controller {

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
	
	public function _remap($user,$params=array())
	{
		$this->load->library('session');
		$this->load->library('util');
		$this->util->connect();
		$this->load->model('Blog_model');
		$mataikhoan = $this->Blog_model->getMataikhoan($user);
		
		if($mataikhoan==0)
		{
			show_404();
			return;
		}
		
		if($this->session->userdata('visit')==false)
		{
			$this->Blog_model->updateLuotxem($mataikhoan);
			$data = array('visit'=>true,'postread'=>array());
			$this->session->set_userdata($data);
		}
		if(count($params)==0)
		{
			$this->page($mataikhoan,0);
			return;
		}
		if(count($params)==1)
		{
			switch ($params[0]) {
				case 'search':
					$this->search($mataikhoan);
					break;
				case 'page':
					$this->page($mataikhoan,0);
					break;
				case 'vote':
					$this->vote($mataikhoan);
					break;
				case 'comment':
					$this->comment($mataikhoan);
					break;
				case 'like':
					$this->like($mataikhoan);
					break;	
				default:
					show_404();
			}
			return;
		}
		switch ($params[0]) {
			case 'post':
				$this->post($mataikhoan,$params[1]);
				break;
			case 'page':
				$this->page($mataikhoan,$params[1]);
				break;
			case 'view':
				$this->view($mataikhoan,$params[1]);
				break;
			default:
				show_404();
		}
	}
	
	public function page($mataikhoan, $page)
	{
		$data = $this->loadcomponent($mataikhoan);
	}
	
	public function post($mataikhoan, $mabaiviet)
	{
		
	}
	public function view($mataikhoan, $matrang)
	{
		
	}
	public function search($mataikhoan)
	{
		
	}
	public function vote($mataikhoan)
	{
		
	}
	public function comment($mataikhoan)
	{
		
	}
	public function like($mataikhoan)
	{
		
	}
	private function loadcomponent($mataikhoan)
	{
		
	}
}
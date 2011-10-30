<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Template extends CI_Controller {

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
		$this->load->model('Template_model');
		$data['giaodiens'] = $this->Template_model->getGiaodiens();
		$this->load->view('template_view',$data);
	}
	
	public function activate()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$magiaodien = 1;
		if($this->input->post('magiaodien'))
		{
			$magiaodien = intval($this->input->post('magiaodien'));
		}
		$this->util->connect();
		$this->load->model('Template_model');
		if($this->Template_model->updateGiaodien($mataikhoan,$magiaodien)==false)
		{
			show_error('Rất tiếc! Có lỗi xảy ra!');
			return;
		}
		redirect(base_url('index.php/template'));
	}
}
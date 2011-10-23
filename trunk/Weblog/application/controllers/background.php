<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Background extends CI_Controller {

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
	public function index($flag=FALSE)
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		$data['bar'] = $this->load->view('bar_view',null,true);
		$data['sidemenu'] = $this->load->view('sidemenu_view',null,true);
		$data['ispreview']=$flag;
		
		$this->util->connect();
		$this->load->model('Background_model');
		if($flag)
		{
			$data['anhnen'] =  $this->Background_model->getAnhnentam($mataikhoan);
		}
		else 
		{
			$data['anhnen'] =  $this->Background_model->getAnhnen($mataikhoan);
		}
		$this->load->view('background_view',$data);
	}
	
	public function delete()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$this->util->connect();
		$this->load->model('Background_model');
		if ($this->Background_model->deleteAnhnen($mataikhoan)==false)
		{
			show_error('Rất tiếc! Có lỗi xảy ra!');
		}
		$this->index();
	}
	
	public function upload()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$config['upload_path'] = './images/temporary';
		$config['allowed_types'] = 'gif|jpg|png|jpge';
		$config['max_size']	= '1024';
		$config['overwrite']  = TRUE;
		$config['file_name'] = 'anhnen'.$mataikhoan;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('imagefile'))
		{
			show_error($this->upload->display_errors());
		}
		else
		{
			$data = $this->upload->data();
			$this->util->connect();
			$this->load->model('Background_model');
			if ($this->Background_model->updateAnhnentam($mataikhoan,$data['file_name'])==false)
			{
				show_error('Rất tiếc! Có lỗi xảy ra!');
			}
			$this->index(true);
		}
	}
	
	public function submit()
	{
		session_start();
		$this->load->library('util');
		
		if($this->util->checkLogin()==false) {
			return;
		}
		$mataikhoan = 1;
		
		$this->util->connect();
		$this->load->model('Background_model');
		$anhnen = $this->Background_model->getAnhnentam($mataikhoan);
		copy('./images/temporary/'.$anhnen, './images/background/'.$anhnen);
		if ($this->Background_model->updateAnhnen($mataikhoan,$anhnen)==false)
		{
			show_error('Rất tiếc! Có lỗi xảy ra!');
		}
		$this->index();
	}
}
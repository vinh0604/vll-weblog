<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Avatar extends CI_Controller {

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
		$this->load->model('Avatar_model');
		if($flag)
		{
			$data['avatar'] =  $this->Avatar_model->getAvatartam($mataikhoan);
		}
		else 
		{
			$data['avatar'] =  $this->Avatar_model->getAvatar($mataikhoan);
		}
		$this->load->view('avatar_view',$data);
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
		$this->load->model('Avatar_model');
		if ($this->Avatar_model->deleteAvatar($mataikhoan)==false)
		{
			show_error('Rất tiếc! Có lỗi xảy ra!');
		}
		redirect(base_url('index.php/avatar'));
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
		$config['file_name'] = 'avatar'.$mataikhoan;

		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('imagefile'))
		{
			show_error($this->upload->display_errors());
		}
		else
		{
			$data = $this->upload->data();
			$this->util->connect();
			$this->load->model('Avatar_model');
			if ($this->Avatar_model->updateAvatartam($mataikhoan,$data['file_name'])==false)
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
		$this->load->model('Avatar_model');
		$avatar = $this->Avatar_model->getAvatartam($mataikhoan);
		copy('./images/temporary/'.$avatar, './images/avatar/'.$avatar);
		if ($this->Avatar_model->updateAvatar($mataikhoan,$avatar)==false)
		{
			show_error('Rất tiếc! Có lỗi xảy ra!');
		}
		redirect(base_url('index.php/avatar'));
	}
}
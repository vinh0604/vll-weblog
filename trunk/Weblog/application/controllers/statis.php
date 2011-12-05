<?php 
	if ( ! defined('BASEPATH')) exit('No direct script access allowed');
	
	class Statis extends CI_Controller {
	
		function index()
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
			$this->load->Model('Statis_model');
			
			$data['post'] = $this->Statis_model->getCountPost($mataikhoan);
			$data['page'] = $this->Statis_model->getCountPage($mataikhoan);
			$data['category'] = $this->Statis_model->getCountCategory($mataikhoan);
			$data['tag'] = $this->Statis_model->getCountTag($mataikhoan);
			$data['comment'] =  $this->Statis_model->getCountComment($mataikhoan);
			$data['draft'] = $this->Statis_model->getCountDraft($mataikhoan);
			$data['chuyenmucs'] =$this->Statis_model->getListCategory($mataikhoan);
			
			$data['nhaps'] = $this->Statis_model->getListPostDraft($mataikhoan);
			$data['phanhois'] = $this->Statis_model->getListComment($mataikhoan);
			
			$this->load->view('statis_view.php', $data);				
		}
		
		function post()
		{
			session_start();
			$this->load->library('util');
			
			if($this->util->checkLogin()==false) {
				return;
			}
			$mataikhoan = 1;
			$this->util->connect();
			$this->load->Model('Statis_model');
			
			$tieude = $this->input->post('tieude');
			$chuyenmuc = $this->input->post('chuyenmuc');
			$noidung = $this->input->post('noidung');
			
			$this->Statis_model->insertPost($mataikhoan, $tieude, $chuyenmuc, $noidung);
		}
		
		function draftpost()
		{
			session_start();
			$this->load->library('util');
			
			if($this->util->checkLogin()==false) {
				return;
			}
			$mataikhoan = 1;
			$this->util->connect();
			$this->load->Model('Statis_model');
			
			$tieude = $this->input->post('tieude');
			$chuyenmuc = $this->input->post('chuyenmuc');
			$noidung = $this->input->post('noidung');
			
			$this->Statis_model->insertPostDraft($mataikhoan, $tieude, $chuyenmuc, $noidung);
			
			$data['nhaps'] = $this->Statis_model->getListPostDraft($mataikhoan);
			$this->load->view('ajax/ajax.draft.php', $data);
		}
		
	}
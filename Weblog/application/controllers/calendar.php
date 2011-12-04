<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar extends CI_Controller {
	public function index()
	{
		
	}
	public function show($mataikhoan,$year,$month)
	{
		$this->load->library('util');
		$this->util->connect();
		$this->load->model('Blog_model');
		$prefs = array (
               'show_next_prev'  => TRUE,
               'next_prev_url'   => base_url('index.php/calendar/show/'.$mataikhoan)
             );
		$prefs['template'] = '

   				{table_open}<table id="wp-calendar">{/table_open}

   				{heading_row_start}<tr>{/heading_row_start}

   				{heading_previous_cell}<th><a id="prevmon" href="{previous_url}">&lt;&lt;</a></th>{/heading_previous_cell}
   				{heading_title_cell}<th colspan="{colspan}">{heading}</th>{/heading_title_cell}
			   	{heading_next_cell}<th><a id="nextmon" href="{next_url}">&gt;&gt;</a></th>{/heading_next_cell}
			
			   	{heading_row_end}</tr>{/heading_row_end}
			
			   	{week_row_start}<tr>{/week_row_start}
			   	{week_day_cell}<td scope="col">{week_day}</td>{/week_day_cell}
			   	{week_row_end}</tr>{/week_row_end}
			
			   	{cal_row_start}<tr>{/cal_row_start}
			   	{cal_cell_start}{/cal_cell_start}
			
			   	{cal_cell_content}<td><a href="{content}">{day}</a></td>{/cal_cell_content}
			   	{cal_cell_content_today}<td id="today"><a href="{content}">{day}</a></td>{/cal_cell_content_today}
			
			   	{cal_cell_no_content}<td>{day}</td>{/cal_cell_no_content}
			   	{cal_cell_no_content_today}<td id="today">{day}</td>{/cal_cell_no_content_today}
			
			   	{cal_cell_blank}<td class="pad">&nbsp;</td>{/cal_cell_blank}
			
			   	{cal_cell_end}{/cal_cell_end}
			   	{cal_row_end}</tr>{/cal_row_end}
			
			   	{table_close}</table>{/table_close}
			';
		$this->load->library('calendar', $prefs);
		$postdata = $this->Blog_model->getBaivietByMonth($mataikhoan,$year,$month);
		echo $this->calendar->generate($year,$month,$postdata);
	}
}
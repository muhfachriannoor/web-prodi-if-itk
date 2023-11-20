<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_penelitian extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Hasil Penelitian',
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'hasil_penelitian' => $this->db->where('status',1)->order_by('id_penelitian','desc')->get('sm_hasilpenelitian'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Penelitian & Pengabdian'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('penelitian/hasil_penelitian');
		$this->load->view('partial/footer_datatable');
	}

	public function detail($slug)
	{
		$data = array(
					'title' => 'Hasil Penelitian',
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Penelitian & Pengabdian'))->row(),
					'datanya' => $this->db->get_where('sm_hasilpenelitian',array('slug_penelitian' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('penelitian/detail_hasil_penelitian');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}
}

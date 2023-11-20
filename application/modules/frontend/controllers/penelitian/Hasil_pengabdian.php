<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_pengabdian extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Hasil Pengabdian',
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'hasil_pengabdian' => $this->db->where('status','1')->order_by('id_pengabdian','desc')->get('sm_hasilpengabdian'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Penelitian & Pengabdian'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('penelitian/hasil_pengabdian');
		$this->load->view('partial/footer_datatable');
	}

	public function detail($slug)
	{
		$data = array(
					'title' => 'Hasil Pengabdian',
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Pengabdian',
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Penelitian & Pengabdian'))->row(),
					'datanya' => $this->db->get_where('sm_hasilpengabdian',array('slug_pengabdian' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('penelitian/detail_hasil_pengabdian');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pkm extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Program Kreativitas Mahasiswa',
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'pkm' => $this->db->where('status',1)->order_by('idPKM','DESC')->get('sm_pkm'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('kemahasiswaan/pkm');
		$this->load->view('partial/footer_datatable');
	}

	public function detail($slug)
	{
		$data = array(
					'title' => 'Program Kreativitas Mahasiswa',
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Program Kreativitas Mahasiswa',
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
					'datanya' => $this->db->get_where('sm_pkm',array('slug_pkm' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('kemahasiswaan/detail_pkm');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}
}

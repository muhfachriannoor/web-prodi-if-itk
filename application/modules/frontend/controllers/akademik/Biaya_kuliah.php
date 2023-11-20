<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya_kuliah extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('tanggal_helper');
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Biaya Kuliah',
					'menunya' => 'Akademik',
					'sub_menunya' => 'Biaya Kuliah',
					'biaya_kuliah_snm_sbm' => $this->db->where('jalur_biaya','SBMPTN/SNMPTN')->get('sm_biayakuliah'),
					'biaya_kuliah_mandiri' => $this->db->where('jalur_biaya','mandiri')->get('sm_biayakuliah'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Akademik'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('akademik/biaya_kuliah');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}
}

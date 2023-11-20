<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ormas extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Organisasi Kemahasiswaan',
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Organisasi Kemahasiswaan',
					'ormas' => $this->db->get('sm_ormas'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Kemahasiswaan'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('kemahasiswaan/ormas');
		$this->load->view('partial/footer2');
		$this->load->view('partial/footer');
	}
}

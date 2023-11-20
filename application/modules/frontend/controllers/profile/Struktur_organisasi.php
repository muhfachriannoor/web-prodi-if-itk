<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_organisasi extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Struktur Organisasi',
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Struktur Organisasi',
					'struktur_organisasi' => $this->db->get('sm_strukturorganisasi')->row(),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Profile Prodi'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('profile/struktur_organisasi');
		$this->load->view('partial/footer_datatable');
	}
}

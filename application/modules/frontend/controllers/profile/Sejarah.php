<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sejarah extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Sejarah',
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Sejarah',
					'sejarah' => $this->db->get('sm_sejarah')->row(),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Profile Prodi'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('profile/sejarah');
		$this->load->view('partial/footer_datatable');
	}
}

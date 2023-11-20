<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjasama extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Kerjasama',
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Kerjasama',
					'kerjasama' => $this->db->get('sm_kerjasama'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Profile Prodi'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('profile/kerjasama');
		$this->load->view('partial/footer_datatable');
	}
}

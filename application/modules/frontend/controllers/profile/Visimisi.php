<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visimisi extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        
    }

	public function index()
	{
		$data = array(
					'title' => 'Visi, Misi, Tujuan, dan Moto',
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Visi, Misi, Tujuan, dan Moto',
					'visimisi' => $this->db->get('sm_visimisitujuanmotto')->row(),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Profile Prodi'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('profile/visimisi');
		$this->load->view('partial/footer_datatable');
	}
}

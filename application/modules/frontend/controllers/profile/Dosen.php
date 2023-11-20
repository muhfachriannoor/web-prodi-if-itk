<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('tanggal_helper');
    }

	public function index()
	{
		$data = array(
					'title' => 'Dosen dan Tenaga Pendidik',
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'dosen' => $this->db->order_by('idDosen','DESC')->get('sm_dosen'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Profile Prodi'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('profile/dosen');
		$this->load->view('partial/footer_datatable');
	}

	public function detail($slug)
	{
		$query = $this->db->get_where('sm_dosen',array('slug_dosen' => $slug))->row();
		$data = array(
					'title' => 'Dosen dan Tenaga Pendidik',
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Dosen dan Tenaga Pendidik',
					'datanya' => $query,
					'pendidikan' => $this->db->get_where('sm_dosen_pendidikan',array('idDosen' => $query->idDosen)),
					'keahlian' => $this->db->get_where('sm_dosen_keahlian',array('idDosen' => $query->idDosen)),
					'minatpenelitian' => $this->db->get_where('sm_dosen_minatpenelitian',array('idDosen' => $query->idDosen)),
					'publikasi' => $this->db->get_where('sm_dosen_publikasi',array('idDosen' => $query->idDosen)),
					'penelitian' => $this->db->get_where('sm_dosen_penelitian',array('idDosen' => $query->idDosen)),
					'pengalaman' => $this->db->get_where('sm_dosen_pengalaman',array('idDosen' => $query->idDosen)),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Profile Prodi'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('profile/detail_dosen');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}
}

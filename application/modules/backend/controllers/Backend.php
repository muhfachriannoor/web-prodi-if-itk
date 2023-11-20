<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Backend extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        if($this->session->userdata('logged') == FALSE)
        {
        	$alert =
				'<div class="notification is-danger">
					Login Dulu!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
            redirect('login');
        }
    }

	public function index()
	{
		$data = array(
					'menunya' => 'Dashboard',
					'sub_menunya' => '',
					'banner' => $this->db->count_all('banner'),
					'galeri' => $this->db->count_all('galeri'),
					'beasiswa' => $this->db->where('status',1)->from('beasiswa')->count_all_results(),
					'bidangminat' => $this->db->count_all('sm_bidangminat'),
					'pengumuman' => $this->db->count_all('pengumuman'),
					'kegiatan' => $this->db->count_all('kegiatan'),
					'berita' => $this->db->count_all('m_berita'),
					'dosen' => $this->db->count_all('sm_dosen'),
					'laboratorium' => $this->db->count_all('sm_laboratorium'),
					'profilelulusan' => $this->db->count_all('sm_profillulusan'),
					'ormas' => $this->db->count_all('sm_ormas'),
					'prestasi' => $this->db->count_all('sm_prestasi'),
					'alumni' => $this->db->where('status',1)->from('sm_alumni')->count_all_results(),
					'hasilpenelitian' => $this->db->where('status',1)->from('sm_hasilpenelitian')->count_all_results(),
					'hasilpengabdian' => $this->db->where('status',1)->from('sm_hasilpengabdian')->count_all_results(),
					'user' => $this->db->count_all('user'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('index');
		$this->load->view('partial/footer');
	}
}

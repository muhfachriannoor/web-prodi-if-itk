<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beranda extends MY_Controller {
	public function __construct() 
    {
        parent::__construct();
        $this->load->helper('tanggal_helper');
    }

	public function index()
	{
		$query_snm 		= $this->db->where('jalur_keketatan','SNMPTN')->order_by('tahun_keketatan','DESC')->get('keketatan',1)->row();
		$snm 			= ($query_snm != '') ? ($query_snm->kuota_keketatan / $query_snm->peminat_keketatan) * 100 : '0';
		$query_sbm 		= $this->db->where('jalur_keketatan','SBMPTN')->order_by('tahun_keketatan','DESC')->get('keketatan',1)->row();
		$sbm 			= ($query_sbm != '') ? ($query_sbm->kuota_keketatan / $query_sbm->peminat_keketatan) * 100 : '0';
		$query_mandiri 	= $this->db->where('jalur_keketatan','Mandiri')->order_by('tahun_keketatan','DESC')->get('keketatan',1)->row();
		$mandiri 		= ($query_mandiri != '') ? ($query_mandiri->kuota_keketatan / $query_mandiri->peminat_keketatan) * 100 : '0';
		$query_utbk 	= $this->db->where('jalur_keketatan','UTBK')->order_by('tahun_keketatan','DESC')->get('keketatan',1)->row();
		$utbk 			= $query_utbk->nilai;
		$data = array(
					'title' => 'Beranda',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
					'banner' => $this->db->order_by('id_banner','DESC')->get('banner'),
					'logo' => $this->db->join('sm_dosen', 'overview_prodi.idDosen = sm_dosen.idDosen', 'inner')->get('overview_prodi')->row(),
					'bidangminat' => $this->db->order_by('idBidangminat', 'desc')->get('sm_bidangminat'),
					'testimoni' => $this->db->order_by('idTestimoni', 'desc')->get('testimoni'),
					'jumlah_bidangminat' => $this->db->count_all('sm_bidangminat'),
					'jumlah_dosen' => $this->db->count_all('sm_dosen'),
					'jumlah_alumni' => $this->db->where('status',1)->from('sm_alumni')->count_all_results(),
					'jumlah_mahasiswa' => $this->db->join('sm_dosen', 'overview_prodi.idDosen = sm_dosen.idDosen', 'inner')->get('overview_prodi')->row(),
					'berita' => $this->db->join('m_berita_kategori', 'm_berita.idKategori = m_berita_kategori.idKategori', 'inner')->order_by('m_berita.idBerita', 'desc')->limit(4)->get('m_berita'),
					'pengumuman' => $this->db->order_by('idPengumuman', 'desc')->limit(2)->get('pengumuman'),
					'kegiatan' => $this->db->order_by('idKegiatan', 'desc')->limit(2)->get('kegiatan'),
					'k_snm' => ceil($snm),
					'k_sbm' => ceil($sbm),
					'k_mandiri' => ceil($mandiri),
					'utbk' => $utbk,
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/index');
		$this->load->view('partial/footer');
	}

	public function overview()
	{
		$data = array(
					'title' => 'Overview',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
					'overview' => $this->db->join('sm_dosen', 'overview_prodi.idDosen = sm_dosen.idDosen', 'inner')->get('overview_prodi')->row(),
					'galeri' => $this->db->order_by('id_galeri','DESC')->get('galeri'),
					'jumlah_bidangminat' => $this->db->count_all('sm_bidangminat'),
					'jumlah_dosen' => $this->db->count_all('sm_dosen'),
					'jumlah_alumni' => $this->db->where('status',1)->from('sm_alumni')->count_all_results(),
					'jumlah_prestasi' => $this->db->count_all('sm_prestasi'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/overview');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}

	public function calonmahasiswa()
	{
		$data = array(
					'title' => 'Calon Mahasiswa',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/calonmahasiswa');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}

	public function beasiswa()
	{	
		$data = array(
					'title' => 'Beasiswa',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
					'beasiswa' => $this->db->where('status', 1)->order_by('idBeasiswa', 'DESC')->get('beasiswa'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/beasiswa');
		$this->load->view('partial/footer_datatable');
	}

	public function detail_beasiswa($slug)
	{
		$data = array(
					'title' => 'Beasiswa',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
					'datanya' => $this->db->get_where('beasiswa',array('slug_beasiswa' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/detail_beasiswa');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}

	public function faq()
	{
		$data = array(
					'title' => 'FAQ',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
					'faq' => $this->db->order_by('idfaq', 'ASC')->get('faq'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/faq');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}

	public function pengumuman()
	{
		$data = array(
					'title' => 'Pengumuman',
					'menunya' => 'Beranda',
					'sub_menunya' => 'Pengumuman',
					'pengumuman' => $this->db->order_by('idPengumuman', 'desc')->get('pengumuman'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Beranda'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/pengumuman');
		$this->load->view('partial/footer_datatable');
	}

	public function detail_pengumuman($slug)
	{
		$data = array(
					'title' => 'Pengumuman',
					'menunya' => 'Beranda',
					'sub_menunya' => 'Pengumuman',
					'datanya' => $this->db->get_where('pengumuman',array('slug_pengumuman' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/detail_pengumuman');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}

	public function kegiatan()
	{
		$data = array(
					'title' => 'Kegiatan',
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'kegiatan' => $this->db->order_by('idKegiatan', 'desc')->get('kegiatan'),
					'id_menunya' => $this->db->get_where('menu', array('nameMenu' => 'Beranda'))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/kegiatan');
		$this->load->view('partial/footer_datatable');
	}

	public function detail_kegiatan($slug)
	{
		$data = array(
					'title' => 'Kegiatan',
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'datanya' => $this->db->get_where('kegiatan',array('slug_kegiatan' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/detail_kegiatan');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}

	public function detail_bidangminat($slug)
	{
		$data = array(
					'title' => 'Bidang Minat',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
					'datanya' => $this->db->get_where('sm_bidangminat',array('slug_bidangminat' => $slug))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/detail_bidangminat');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}

	public function keketatan()
	{	
		$data = array(
					'title' => 'Keketatan',
					'menunya' => 'Beranda',
					'sub_menunya' => '',
					'snm' => $this->db->where('jalur_keketatan','SNMPTN')->get('keketatan'),
					'sbm' => $this->db->where('jalur_keketatan','SBMPTN')->get('keketatan'),
					'mandiri' => $this->db->where('jalur_keketatan','Mandiri')->get('keketatan'),
					'utbk' => $this->db->where('jalur_keketatan','UTBK')->get('keketatan'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('partial/header2', $data);
		$this->load->view('beranda/keketatan');
		$this->load->view('partial/footer');
		$this->load->view('partial/footer2');
	}
}

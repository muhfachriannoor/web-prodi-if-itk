<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori_berita extends MY_Controller {
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
					'menunya' => 'Berita',
					'sub_menunya' => 'Kategori Berita',
					'datanya' => $this->db->order_by('idKategori','DESC')->get('m_berita_kategori'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('berita/kategori_berita/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Kategori Berita',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('berita/kategori_berita/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_kategori','Nama Kategori','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_kategori = $this->input->post('nama_kategori');
			$data = array(
						'nama_kategori' => $nama_kategori,
					);
			$execute = $this->db->insert('m_berita_kategori',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/berita/kategori_berita');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/berita/kategori_berita');
			}
		}else{
			$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Kategori Berita',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('berita/kategori_berita/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Kategori Berita',
					'datanya' => $this->db->get_where('m_berita_kategori',array('idKategori' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('berita/kategori_berita/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('nama_kategori','Nama Kategori','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$nama_kategori = $this->input->post('nama_kategori');
			$data = array(
						'nama_kategori' => $nama_kategori,
					);
			$execute = $this->db->update('m_berita_kategori',$data,array('idKategori' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/berita/kategori_berita');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/berita/kategori_berita');
			}
		}else{
			$data = array(
						'menunya' => 'Berita',
						'sub_menunya' => 'Kategori Berita',
						'datanya' => $this->db->get_where('m_berita_kategori',array('idKategori' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('berita/kategori_berita/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('m_berita_kategori',array('idKategori' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/berita/kategori_berita');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/berita/kategori_berita');
		}
	}
}

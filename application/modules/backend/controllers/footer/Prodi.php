<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prodi extends MY_Controller {
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
        if($this->session->userdata('akses') != '1')
        {
        	$alert =
				'<div class="box-header">
			      <div class="alert alert-warning alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			            <h4><i class="icon fa fa-warning"></i> Gagal!</h4>
			            Tidak boleh mengakses!
			      </div>
			    </div>';
			$session = $this->session->set_flashdata('alert', $alert);
            redirect('backend');
        }
    }

	public function index()
	{
		$data = array(
					'menunya' => 'Footer',
					'sub_menunya' => 'Sosial Media',
					'datanya' => $this->db->order_by('nomor_prodi','DESC')->get('prodi_lain'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('footer/prodi/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Footer',
					'sub_menunya' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('footer/prodi/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_prodi','Nama Prodi','required');
		$this->form_validation->set_rules('nomor_prodi','Nomor Prodi','required');
		$this->form_validation->set_rules('url_prodi','Link','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_prodi 	= $this->input->post('nama_prodi');
			$nomor_prodi 	= $this->input->post('nomor_prodi');
			$url_prodi  	= $this->input->post('url_prodi');
			$data = array(
						'nama_prodi' => $nama_prodi,
						'nomor_prodi' => $nomor_prodi,
						'url_prodi' => $url_prodi,
					);
			$execute = $this->db->insert('prodi_lain',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/footer/prodi/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/footer/prodi/');
			}
		}else{
			$data = array(
						'menunya' => 'Footer',
						'sub_menunya' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('footer/prodi/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Footer',
					'sub_menunya' => '',
					'datanya' => $this->db->get_where('prodi_lain',array('id_prodi' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('footer/prodi/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('nama_prodi','Nama Prodi','required');
		$this->form_validation->set_rules('nomor_prodi','Nomor Prodi','required');
		$this->form_validation->set_rules('url_prodi','Link','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$nama_prodi 	= $this->input->post('nama_prodi');
			$nomor_prodi 	= $this->input->post('nomor_prodi');
			$url_prodi  	= $this->input->post('url_prodi');
			$data = array(
						'nama_prodi' => $nama_prodi,
						'nomor_prodi' => $nomor_prodi,
						'url_prodi' => $url_prodi,
					);
			$execute = $this->db->update('prodi_lain',$data,array('id_prodi' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/footer/prodi/');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/footer/prodi/');
			}
		}else{
			$data = array(
						'menunya' => 'Footer',
						'sub_menunya' => '',
						'datanya' => $this->db->get_where('prodi_lain',array('id_prodi' => $id))->row(),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('footer/prodi/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('prodi_lain',array('id_prodi' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/footer/prodi/');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/footer/prodi/');
		}
	}
}

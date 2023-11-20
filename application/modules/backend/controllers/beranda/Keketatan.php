<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Keketatan extends MY_Controller {
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
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
					'datanya' => $this->db->order_by('idKeketatan','DESC')->get('keketatan'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/keketatan/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/keketatan/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('jalur_keketatan','Jalur','required|callback_select_validate');
		$this->form_validation->set_rules('tahun_keketatan','Tahun','required');
		$this->form_validation->set_rules('kuota_keketatan','Kuota','required');
		$this->form_validation->set_rules('peminat_keketatan','Peminat','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$jalur_keketatan 	= $this->input->post('jalur_keketatan');
			$tahun_keketatan 	= $this->input->post('tahun_keketatan');
			$kuota_keketatan 	= $this->input->post('kuota_keketatan');
			$peminat_keketatan 	= $this->input->post('peminat_keketatan');
			$data = array(
						'jalur_keketatan' => $jalur_keketatan,
						'tahun_keketatan' => $tahun_keketatan,
						'kuota_keketatan' => $kuota_keketatan,
						'peminat_keketatan' => $peminat_keketatan,
					);
			$execute = $this->db->insert('keketatan',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}      
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/keketatan/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
					'datanya' => $this->db->get_where('keketatan',array('idKeketatan' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/keketatan/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('jalur_keketatan','Jalur','required|callback_select_validate');
		$this->form_validation->set_rules('tahun_keketatan','Tahun','required');
		$this->form_validation->set_rules('kuota_keketatan','Kuota','required');
		$this->form_validation->set_rules('peminat_keketatan','Peminat','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$jalur_keketatan 	= $this->input->post('jalur_keketatan');
			$tahun_keketatan 	= $this->input->post('tahun_keketatan');
			$kuota_keketatan 	= $this->input->post('kuota_keketatan');
			$peminat_keketatan 	= $this->input->post('peminat_keketatan');
			$data = array(
						'jalur_keketatan' => $jalur_keketatan,
						'tahun_keketatan' => $tahun_keketatan,
						'kuota_keketatan' => $kuota_keketatan,
						'peminat_keketatan' => $peminat_keketatan,
					);
			$execute = $this->db->update('keketatan',$data,array('idKeketatan' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
					'datanya' => $this->db->get_where('keketatan',array('idKeketatan' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/keketatan/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('keketatan',array('idKeketatan' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/keketatan');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/keketatan');
		}
	}

	public function create2()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/keketatan/create2');
		$this->load->view('partial/footer');
	}

	public function up2()
	{
		$this->form_validation->set_rules('tahun_keketatan','Tahun','required');
		$this->form_validation->set_rules('nilai','Nilai','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$tahun_keketatan 	= $this->input->post('tahun_keketatan');
			$nilai 				= $this->input->post('nilai');
			$data = array(
						'jalur_keketatan' => 'UTBK',
						'tahun_keketatan' => $tahun_keketatan,
						'nilai' => $nilai,
					);
			$execute = $this->db->insert('keketatan',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}      
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/keketatan/create2');
			$this->load->view('partial/footer');
		}
	}

	public function update2($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
					'datanya' => $this->db->get_where('keketatan',array('idKeketatan' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/keketatan/update2');
		$this->load->view('partial/footer');
	}

	public function down2($id)
	{
		$this->form_validation->set_rules('tahun_keketatan','Tahun','required');
		$this->form_validation->set_rules('nilai','Nilai','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$tahun_keketatan 	= $this->input->post('tahun_keketatan');
			$nilai 				= $this->input->post('nilai');
			$data = array(
						'jalur_keketatan' => 'UTBK',
						'tahun_keketatan' => $tahun_keketatan,
						'nilai' => $nilai,
					);
			$execute = $this->db->update('keketatan',$data,array('idKeketatan' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/keketatan');
			}
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Keketatan',
					'datanya' => $this->db->get_where('keketatan',array('idKeketatan' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/keketatan/update2');
			$this->load->view('partial/footer');
		}
	}

	public function delete2($id)
	{
        $execute = $this->db->delete('keketatan',array('idKeketatan' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/keketatan');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/keketatan');
		}
	}


	function select_validate()
	{
		$jalur_keketatan = $this->input->post('jalur_keketatan');
		if($jalur_keketatan == 'none') {
			$this->form_validation->set_message('select_validate', 'Pilih Jalu!');
			return false;
		}else{
			return true;
		}
	}
}

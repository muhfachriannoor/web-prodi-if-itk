<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visimisi extends MY_Controller {
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
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Visi, Misi, Tujuan, dan Moto',
					'datanya' => $this->db->get('sm_visimisitujuanmotto'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/visimisi/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Visi, Misi, Tujuan, dan Moto',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/visimisi/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('text_visi','Text Visi','required');
		$this->form_validation->set_rules('text_misi','Text Misi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$text_visi 		= $this->input->post('text_visi');
			$text_misi 		= $this->input->post('text_misi');
			$text_tujuan 	= $this->input->post('text_tujuan');
			$text_motto 	= $this->input->post('text_motto');
			$data = array(
						'visi_text' => $text_visi,
						'misi_text' => $text_misi,
						'tujuan_text' => $text_tujuan,
						'motto_text' => $text_motto,
					);
			$cek = $this->db->get('sm_visimisitujuanmotto')->num_rows();
			if($cek > 0) {
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Text Visi, Misi, Tujuan, dan Moto Sudah Ada!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/visimisi');
			}else{
				$execute = $this->db->insert('sm_visimisitujuanmotto',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/visimisi');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Text Visi, Misi, Tujuan, dan Moto Sudah Ada!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/visimisi');
				}
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Visi, Misi, Tujuan, dan Moto',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/visimisi/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Visi, Misi, Tujuan, dan Moto',
					'datanya' => $this->db->get_where('sm_visimisitujuanmotto',array('id_visimisi' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/visimisi/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('text_visi','Text Visi','required');
		$this->form_validation->set_rules('text_misi','Text Misi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$text_visi 		= $this->input->post('text_visi');
			$text_misi 		= $this->input->post('text_misi');
			$text_tujuan 	= $this->input->post('text_tujuan');
			$text_motto 	= $this->input->post('text_motto');
			$data = array(
						'visi_text' => $text_visi,
						'misi_text' => $text_misi,
						'tujuan_text' => $text_tujuan,
						'motto_text' => $text_motto,
					);
			$execute = $this->db->update('sm_visimisitujuanmotto',$data,array('id_visimisi' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/visimisi');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/visimisi');
			}
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Visi, Misi, Tujuan, dan Moto',
						'datanya' => $this->db->get_where('sm_visimisitujuanmotto',array('id_visimisi' => $id))->row(),
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/visimisi/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$execute = $this->db->delete('sm_visimisitujuanmotto',array('id_visimisi' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/visimisi');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/visimisi');
		}
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends MY_Controller {
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
					'sub_menunya' => 'FAQ',
					'datanya' => $this->db->order_by('idfaq','DESC')->get('faq'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/faq/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'FAQ',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/faq/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('question','Pertanyaan','required');
		$this->form_validation->set_rules('answer','Jawaban','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$question 	= $this->input->post('question');
			$answer 	= $this->input->post('answer');
			$data = array(
						'question' => $question,
						'answer' => $answer,
					);
			$execute = $this->db->insert('faq',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/faq');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/faq');
			}      
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'FAQ',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/faq/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'FAQ',
					'datanya' => $this->db->get_where('faq',array('idfaq' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/faq/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('question','Pertanyaan','required');
		$this->form_validation->set_rules('answer','Jawaban','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$question 	= $this->input->post('question');
			$answer 	= $this->input->post('answer');
			$data = array(
						'question' => $question,
						'answer' => $answer,
					);
			$execute = $this->db->update('faq',$data,array('idfaq' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/faq');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/beranda/faq');
			}
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'FAQ',
					'datanya' => $this->db->get_where('faq',array('idfaq' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/faq/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('faq',array('idfaq' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/faq');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/faq');
		}
	}

	public function detail($id)
	{
		$this->load->helper('tanggal_helper');
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'FAQ',
					'datanya' => $this->db->get_where('faq',array('idfaq' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/faq/detail');
		$this->load->view('partial/footer');
	}
}

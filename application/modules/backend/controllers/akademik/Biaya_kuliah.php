<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biaya_kuliah extends MY_Controller {
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
        $this->load->helper('tanggal_helper');
    }

	public function index()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Biaya Kuliah',
					'datanya' => $this->db->get('sm_biayakuliah'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/biaya_kuliah/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Biaya Kuliah',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/biaya_kuliah/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('jalur_biaya','Jalur','required|callback_select_validate');
		if($this->input->post('jalur_biaya') == 'SBMPTN/SNMPTN') {
			$this->form_validation->set_rules('kategori_biaya','Kategori UKT','required');
		}
		if($this->input->post('jalur_biaya') == 'Mandiri') {
			$this->form_validation->set_rules('tarif_spi_biaya','Tarif SPI','required');
		}
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$jalur_biaya		= $this->input->post('jalur_biaya');
			$kategori_biaya		= $this->input->post('kategori_biaya');
			$tarif_biaya		= $this->input->post('tarif_biaya');
			$tarif_spi_biaya	= $this->input->post('tarif_spi_biaya');
			$data = array(
						'jalur_biaya' => $jalur_biaya,
						'kategori_biaya' => $kategori_biaya,
						'tarif_biaya' => $tarif_biaya,
						'tarif_spi_biaya' => $tarif_spi_biaya,
					);
			$execute = $this->db->insert('sm_biayakuliah',$data);
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil menambahkan data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/biaya_kuliah');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Gagal Menambahkan Data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/biaya_kuliah');
			}   
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Biaya Kuliah',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/biaya_kuliah/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Akademik',
					'sub_menunya' => 'Biaya Kuliah',
					'datanya' => $this->db->get_where('sm_biayakuliah',array('idBiayaKuliah' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('akademik/biaya_kuliah/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$this->form_validation->set_rules('jalur_biaya','Jalur','required|callback_select_validate');
		if($this->input->post('jalur_biaya') == 'SBMPTN/SNMPTN') {
			$this->form_validation->set_rules('kategori_biaya','Kategori UKT','required');
		}
		if($this->input->post('jalur_biaya') == 'Mandiri') {
			$this->form_validation->set_rules('tarif_spi_biaya','Tarif SPI','required');
		}
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$jalur_biaya		= $this->input->post('jalur_biaya');
			$kategori_biaya		= $this->input->post('kategori_biaya');
			$tarif_biaya		= $this->input->post('tarif_biaya');
			$tarif_spi_biaya	= $this->input->post('tarif_spi_biaya');
			$data = array(
						'jalur_biaya' => $jalur_biaya,
						'kategori_biaya' => $kategori_biaya,
						'tarif_biaya' => $tarif_biaya,
						'tarif_spi_biaya' => $tarif_spi_biaya,
					);
			$execute = $this->db->update('sm_biayakuliah',$data,array('idBiayaKuliah' => $id));
			if($execute == TRUE) {
				$alert =
					'<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-check"></i> Sukses!</h4>
						Berhasil mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/biaya_kuliah');
			}else{
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Tidak bisa mengubah data!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/akademik/biaya_kuliah');
			}
		}else{
			$data = array(
						'menunya' => 'Akademik',
						'sub_menunya' => 'Biaya Kuliah',
						'datanya' => $this->db->get_where('sm_biayakuliah',array('idBiayaKuliah' => $id))->row(),
					);
			$this->load->view('partial/header', $data);
			$this->load->view('akademik/biaya_kuliah/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->delete('sm_biayakuliah',array('idBiayaKuliah' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/biaya_kuliah');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/akademik/biaya_kuliah');
		}
	}


	function select_validate()
	{
		$jalur_biaya = $this->input->post('jalur_biaya');
		if($jalur_biaya == 'none') {
			$this->form_validation->set_message('select_validate', 'Pilih Jalu!');
			return false;
		}else{
			return true;
		}
	}
}

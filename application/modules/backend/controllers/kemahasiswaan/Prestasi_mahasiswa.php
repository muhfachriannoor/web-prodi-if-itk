<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Prestasi_mahasiswa extends MY_Controller {
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
		$this->load->helper('tanggal_helper');
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'datanya' => $this->db->order_by('idPrestasi','DESC')->get('sm_prestasi'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/prestasi_mahasiswa/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/prestasi_mahasiswa/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_prestasi','Nama Prestasi','required');
		$this->form_validation->set_rules('date_prestasi','Tanggal','required');
		$this->form_validation->set_rules('tempat_prestasi','Tempat','required');
		$this->form_validation->set_rules('peringkat_prestasi','peringkat','required');
		$this->form_validation->set_rules('anggota_prestasi','Anggota','required');
		$this->form_validation->set_rules('text_prestasi','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_prestasi']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_prestasi','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$nama_prestasi		= $this->input->post('nama_prestasi');
        	$peringkat_prestasi	= $this->input->post('peringkat_prestasi');

        	$slug = $nama_prestasi.' '.$peringkat_prestasi;
			$text = trim($slug);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
			
			$slug_prestasi 		= $text;
			$date_prestasi		= $this->input->post('date_prestasi');
			$tempat_prestasi	= $this->input->post('tempat_prestasi');
			$peringkat_prestasi	= $this->input->post('peringkat_prestasi');
			$anggota_prestasi	= $this->input->post('anggota_prestasi');
			$text_prestasi		= $this->input->post('text_prestasi');
			$data = array(
						'nama_prestasi' => $nama_prestasi,
						'date_prestasi' => $date_prestasi,
						'tempat_prestasi' => $tempat_prestasi,
						'peringkat_prestasi' => $peringkat_prestasi,
						'anggota_prestasi' => $anggota_prestasi,
						'text_prestasi' => $text_prestasi,
						'slug_prestasi' => $slug_prestasi,
					);
			if(!empty($_FILES['foto_prestasi']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/prestasi_mahasiswa/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 900;
            	$config['min_height'] = 540;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_prestasi')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Prestasi Mahasiswa',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/prestasi_mahasiswa/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_prestasi'] = $image['file_name'];
	                $execute = $this->db->insert('sm_prestasi',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/prestasi_mahasiswa');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/prestasi_mahasiswa');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_prestasi',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/prestasi_mahasiswa');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/prestasi_mahasiswa');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/prestasi_mahasiswa/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'datanya' => $this->db->get_where('sm_prestasi',array('idPrestasi' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/prestasi_mahasiswa/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_prestasi', array('idPrestasi' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nama_prestasi','Nama Prestasi','required');
		$this->form_validation->set_rules('date_prestasi','Tanggal','required');
		$this->form_validation->set_rules('tempat_prestasi','Tempat','required');
		$this->form_validation->set_rules('peringkat_prestasi','peringkat','required');
		$this->form_validation->set_rules('anggota_prestasi','Anggota','required');
		$this->form_validation->set_rules('text_prestasi','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$nama_prestasi		= $this->input->post('nama_prestasi');
        	$peringkat_prestasi	= $this->input->post('peringkat_prestasi');

        	$slug = $nama_prestasi.' '.$peringkat_prestasi;
			$text = trim($slug);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);
			
			$slug_prestasi 		= $text;
			$date_prestasi		= $this->input->post('date_prestasi');
			$tempat_prestasi	= $this->input->post('tempat_prestasi');
			$peringkat_prestasi	= $this->input->post('peringkat_prestasi');
			$anggota_prestasi	= $this->input->post('anggota_prestasi');
			$text_prestasi		= $this->input->post('text_prestasi');
			$data = array(
						'nama_prestasi' => $nama_prestasi,
						'date_prestasi' => $date_prestasi,
						'tempat_prestasi' => $tempat_prestasi,
						'peringkat_prestasi' => $peringkat_prestasi,
						'anggota_prestasi' => $anggota_prestasi,
						'text_prestasi' => $text_prestasi,
						'slug_prestasi' => $slug_prestasi,
					);

	        if(!empty($_FILES['foto_prestasi']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/prestasi_mahasiswa/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 900;
            	$config['min_height'] = 540;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_prestasi')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Prestasi Mahasiswa',
								'datanya' => $this->db->get_where('sm_prestasi',array('idPrestasi' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/prestasi_mahasiswa/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_prestasi != ''):
	               		unlink('./asset/backend/upload/prestasi_mahasiswa/'.$row_cli->foto_prestasi);
	               	endif;
	                $image    				= $this->upload->data();
	                $data['foto_prestasi'] 	= $image['file_name'];

					$execute = $this->db->update('sm_prestasi',$data,array('idPrestasi' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/prestasi_mahasiswa');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/prestasi_mahasiswa');
					}
	            }
	        }else{
	        	$execute = $this->db->update('sm_prestasi',$data,array('idPrestasi' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/prestasi_mahasiswa');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/prestasi_mahasiswa');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'error' => '',
					'datanya' => $this->db->get_where('sm_prestasi',array('idPrestasi' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/prestasi_mahasiswa/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('sm_prestasi', array('idPrestasi' => $id));
        $row_cli    = $select_cli->row();
        if($row_cli->foto_prestasi != ''):
        	unlink('./asset/backend/upload/prestasi_mahasiswa/'.$row_cli->foto_prestasi);
        endif;
      
        $execute = $this->db->delete('sm_prestasi',array('idPrestasi' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/prestasi_mahasiswa');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/prestasi_mahasiswa');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Prestasi Mahasiswa',
					'datanya' => $this->db->get_where('sm_prestasi',array('idPrestasi' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/prestasi_mahasiswa/detail');
		$this->load->view('partial/footer');
	}
}

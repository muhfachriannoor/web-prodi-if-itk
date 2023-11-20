<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Struktur_organisasi extends MY_Controller {
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
					'sub_menunya' => 'Struktur Organisasi',
					'datanya' => $this->db->get('sm_strukturorganisasi'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/struktur_organisasi/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Struktur Organisasi',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/struktur_organisasi/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('bantu','Hidden','required');
		$this->form_validation->set_message('required', 'Wajib diisi');
		if (empty($_FILES['struktur_file']['name']))
		{
			$this->form_validation->set_rules('struktur_file','Foto','required');
		}

		if($this->form_validation->run() != false){
			$cek = $this->db->get('sm_strukturorganisasi')->num_rows();
			if($cek > 0) {
				$alert =
					'<div class="alert alert-danger alert-dismissible">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
						Struktur Organisasi Sudah Ada!
					</div>';
				$session = $this->session->set_flashdata('alert', $alert);
				redirect('backend/profile/struktur_organisasi');
			}else{
				if (!empty($_FILES['struktur_file']['name'])) {
		            $config['upload_path'] = './asset/backend/upload/struktur_organisasi/';
		            $config['allowed_types'] = 'jpg|png|jpeg|';
		            $config['min_width'] = 900;
	            	$config['min_height'] = 540;
		            $this->load->library('upload', $config);
		            $this->upload->initialize($config);

		            if (!$this->upload->do_upload('struktur_file')) {
		                $error = array('error' => $this->upload->display_errors());
		            	$test = array(
									'menunya' => 'Profile Prodi',
									'sub_menunya' => 'Struktur Organisasi',
								);
						$this->load->view('partial/header', $test);
						$this->load->view('profile/struktur_organisasi/create',$error);
						$this->load->view('partial/footer');
		            }else{
		                $image = $this->upload->data();
		                $foto = $data['struktur_file'] = $image['file_name'];
		                $execute = $this->db->insert('sm_strukturorganisasi',$data);
						if($execute == TRUE) {
							$alert =
								'<div class="alert alert-success alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-check"></i> Sukses!</h4>
									Berhasil menambahkan data!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/struktur_organisasi');
						}else{
							$alert =
								'<div class="alert alert-danger alert-dismissible">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
									Gagal Menambahkan Data!
								</div>';
							$session = $this->session->set_flashdata('alert', $alert);
							redirect('backend/profile/struktur_organisasi');
						}
		            }
		        }
		    }
		}else{
			$data = array(
						'menunya' => 'Profile Prodi',
						'sub_menunya' => 'Struktur Organisasi',
						'error' => '',
					);
			$this->load->view('partial/header', $data);
			$this->load->view('profile/struktur_organisasi/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Profile Prodi',
					'sub_menunya' => 'Struktur Organisasi',
					'datanya' => $this->db->get_where('sm_strukturorganisasi',array('id_strukturorganisasi' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('profile/struktur_organisasi/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_strukturorganisasi', array('id_strukturorganisasi' => $id));
        $row_cli    = $select_cli->row();

		$this->form_validation->set_rules('bantu','Hidden','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['struktur_file']['name']))
		{
			$this->form_validation->set_rules('struktur_file','Foto','required');
		}

        if($this->form_validation->run() != false){
			$data = array();
	        if(!empty($_FILES['struktur_file']['name'])) {
		        $config['upload_path'] = './asset/backend/upload/struktur_organisasi/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 450;
            	$config['min_height'] = 450;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('struktur_file')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Profile Prodi',
								'sub_menunya' => 'Struktur Organisasi',
								'datanya' => $this->db->get_where('sm_strukturorganisasi',array('id_strukturorganisasi' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('profile/struktur_organisasi/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/struktur_organisasi/'.$row_cli->struktur_file);
	                $image    				= $this->upload->data();
	                $data['struktur_file'] 	= $image['file_name'];

					$execute = $this->db->update('sm_strukturorganisasi',$data,array('id_strukturorganisasi' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/struktur_organisasi');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/profile/struktur_organisasi');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_strukturorganisasi',$data,array('id_strukturorganisasi' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/struktur_organisasi');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/profile/struktur_organisasi');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Berita',
					'sub_menunya' => 'Berita',
					'error' => '',
					'datanya' => $this->db->get_where('m_berita',array('idBerita' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('berita/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('sm_strukturorganisasi', array('id_strukturorganisasi' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/struktur_organisasi/'.$row_cli->struktur_file);
      
        $execute = $this->db->delete('sm_strukturorganisasi',array('id_strukturorganisasi' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/struktur_organisasi');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/profile/struktur_organisasi');
		}
	}
}

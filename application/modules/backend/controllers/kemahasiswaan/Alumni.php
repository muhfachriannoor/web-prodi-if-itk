<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alumni extends MY_Controller {
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
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Alumni',
					'datanya' => $this->db->where('status',1)->order_by('nim_alumni','DESC')->get('sm_alumni'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/alumni/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Alumni',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/alumni/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nim_alumni','NIM Alumni','required');
		$this->form_validation->set_rules('nama_alumni','Nama Alumni','required');
		$this->form_validation->set_rules('tahunmasuk_alumni','Tahun Masuk','required');
		$this->form_validation->set_rules('tahunlulus_alumni','Tahun Lulus','required');
		$this->form_validation->set_rules('jejak','Jejak','required');
		$this->form_validation->set_rules('text_jejak','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['foto_alumni']['name']))
		{
			$this->form_validation->set_rules('foto_alumni','Foto','required');
		}

		if($this->form_validation->run() != false){
			$nim_alumni 		= $this->input->post('nim_alumni');
			$nama_alumni 		= $this->input->post('nama_alumni');
			$tahunmasuk_alumni 	= $this->input->post('tahunmasuk_alumni');
			$tahunlulus_alumni 	= $this->input->post('tahunlulus_alumni');
			$jejak 				= $this->input->post('jejak');
			$text_jejak 		= $this->input->post('text_jejak');

			$data = array(
						'nim_alumni' => $nim_alumni,
						'nama_alumni' => $nama_alumni,
						'tahunmasuk_alumni' => $tahunmasuk_alumni,
						'tahunlulus_alumni' => $tahunlulus_alumni,
						'jejak' => $jejak,
						'text_jejak' => $text_jejak,
						'status' => 1,
					);
			if (!empty($_FILES['foto_alumni']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/alumni/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 300;
            	$config['min_height'] = 300;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_alumni')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Alumni',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/alumni/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_alumni'] = $image['file_name'];
					$execute = $this->db->insert('sm_alumni',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/alumni');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/alumni');
					}
	            }
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Alumni',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/alumni/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($nim)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Alumni',
					'datanya' => $this->db->get_where('sm_alumni',array('nim_alumni' => $nim))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/alumni/update');
		$this->load->view('partial/footer');
	}

	public function down($nim)
	{
		$select_cli = $this->db->get_where('sm_alumni', array('nim_alumni' => $nim));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nim_alumni','NIM Alumni','required');
		$this->form_validation->set_rules('nama_alumni','Nama Alumni','required');
		$this->form_validation->set_rules('tahunmasuk_alumni','Tahun Masuk','required');
		$this->form_validation->set_rules('tahunlulus_alumni','Tahun Lulus','required');
		$this->form_validation->set_rules('jejak','Jejak','required');
		$this->form_validation->set_rules('text_jejak','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$nim_alumni 		= $this->input->post('nim_alumni');
			$nama_alumni 		= $this->input->post('nama_alumni');
			$tahunmasuk_alumni 	= $this->input->post('tahunmasuk_alumni');
			$tahunlulus_alumni 	= $this->input->post('tahunlulus_alumni');
			$jejak 				= $this->input->post('jejak');
			$text_jejak 		= $this->input->post('text_jejak');

			$data = array(
						'nim_alumni' => $nim_alumni,
						'nama_alumni' => $nama_alumni,
						'tahunmasuk_alumni' => $tahunmasuk_alumni,
						'tahunlulus_alumni' => $tahunlulus_alumni,
						'jejak' => $jejak,
						'text_jejak' => $text_jejak,
						'status' => 1,
					);

	        if(!empty($_FILES['foto_alumni']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/alumni/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 300;
            	$config['min_height'] = 300;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_alumni')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Alumni',
								'datanya' => $this->db->get_where('sm_alumni',array('nim_alumni' => $nim))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/alumni/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/alumni/'.$row_cli->foto_alumni);
	                $image    				= $this->upload->data();
	                $data['foto_alumni'] 	= $image['file_name'];

					$execute = $this->db->update('sm_alumni',$data,array('nim_alumni' => $nim));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/alumni');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/alumni');
					}
	            }
	        }else{
	        	$execute = $this->db->update('sm_alumni',$data,array('nim_alumni' => $nim));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/alumni');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/alumni');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Alumni',
					'error' => '',
					'datanya' => $this->db->get_where('sm_alumni',array('nim_alumni' => $nim))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/alumni/update');
			$this->load->view('partial/footer');
		}

	}

	public function delete($nim)
	{
		$execute = $this->db->update('sm_alumni',array('status' => 0),array('nim_alumni' => $nim));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/alumni');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/alumni');
		}
	}

	public function detail($nim)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Alumni',
					'datanya' => $this->db->get_where('sm_alumni',array('nim_alumni' => $nim))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/alumni/detail');
		$this->load->view('partial/footer');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ormas extends MY_Controller {
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
					'sub_menunya' => 'Organisasi Kemahasiswaan',
					'datanya' => $this->db->order_by('idOrmas','DESC')->get('sm_ormas'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/ormas/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Organisasi Kemahasiswaan',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/ormas/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_ormas','Nama Organisasi Mahasiswa','required');
		$this->form_validation->set_rules('deskripsi_ormas','Deskripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_ormas']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_ormas','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$nama_ormas		 = $this->input->post('nama_ormas');
			$deskripsi_ormas = $this->input->post('deskripsi_ormas');
			$data = array(
						'nama_ormas' => $nama_ormas,
						'deskripsi_ormas' => $deskripsi_ormas,
					);
			if (!empty($_FILES['foto_ormas']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/ormas/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 350;
            	$config['min_height'] = 350;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_ormas')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Organisasi Kemahasiswaan',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/ormas/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_ormas'] = $image['file_name'];
	                $execute = $this->db->insert('sm_ormas',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/ormas');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/ormas');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_ormas',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/ormas');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/ormas');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Organisasi Kemahasiswaan',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/ormas/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Organisasi Kemahasiswaan',
					'datanya' => $this->db->get_where('sm_ormas',array('idOrmas' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/ormas/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_ormas', array('idOrmas' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nama_ormas','Nama Organisasi Mahasiswa','required');
		$this->form_validation->set_rules('deskripsi_ormas','Deskripsi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$nama_ormas		 = $this->input->post('nama_ormas');
			$deskripsi_ormas = $this->input->post('deskripsi_ormas');
			$data = array(
						'nama_ormas' => $nama_ormas,
						'deskripsi_ormas' => $deskripsi_ormas,
					);

	        if(!empty($_FILES['foto_ormas']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/ormas/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 350;
            	$config['min_height'] = 350;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_ormas')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Kemahasiswaan',
								'sub_menunya' => 'Organisasi Kemahasiswaan',
								'datanya' => $this->db->get_where('sm_ormas',array('idOrmas' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('kemahasiswaan/ormas/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_ormas != ''):
	                	unlink('./asset/backend/upload/ormas/'.$row_cli->foto_ormas);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_ormas'] 	= $image['file_name'];

					$execute = $this->db->update('sm_ormas',$data,array('idOrmas' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/ormas');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/kemahasiswaan/ormas');
					}
	            }
	        }else{
	        	$execute = $this->db->update('sm_ormas',$data,array('idOrmas' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/ormas');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/kemahasiswaan/ormas');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Organisasi Kemahasiswaan',
					'error' => '',
					'datanya' => $this->db->get_where('sm_ormas',array('idOrmas' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('kemahasiswaan/ormas/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('sm_ormas', array('idOrmas' => $id));
        $row_cli    = $select_cli->row();
        if($row_cli->foto_ormas != ''):
        	unlink('./asset/backend/upload/ormas/'.$row_cli->foto_ormas);
        endif;
      
        $execute = $this->db->delete('sm_ormas',array('idOrmas' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/ormas');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/kemahasiswaan/ormas');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Kemahasiswaan',
					'sub_menunya' => 'Organisasi Kemahasiswaan',
					'datanya' => $this->db->get_where('sm_ormas',array('idOrmas' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('kemahasiswaan/ormas/detail');
		$this->load->view('partial/footer');
	}
}

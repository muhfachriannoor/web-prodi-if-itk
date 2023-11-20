<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends MY_Controller {
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
					'menunya' => 'Beranda',
					'sub_menunya' => 'Galeri',
					'datanya' => $this->db->order_by('id_galeri','DESC')->get('galeri'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/galeri/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Galeri',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/galeri/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('bantu','Bantu','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['foto_galeri']['name']))
		{
			$this->form_validation->set_rules('foto_galeri','Foto','required');
		}

		if($this->form_validation->run() != false){
			$data = array();
			if (!empty($_FILES['foto_galeri']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/galeri/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_galeri')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Galeri',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/galeri/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_galeri'] = $image['file_name'];
	                $execute = $this->db->insert('galeri',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/galeri');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/galeri/');
					}
	            }
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Galeri',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/galeri/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Galeri',
					'datanya' => $this->db->get_where('galeri',array('id_galeri' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/galeri/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('galeri', array('id_galeri' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('bantu','Bantu','required');
		$this->form_validation->set_message('required', 'Wajib diisi');
		if (empty($_FILES['foto_galeri']['name']))
		{
			$this->form_validation->set_rules('foto_galeri','Foto','required');
		}

		if($this->form_validation->run() != false){
			$data = array();
	        if(!empty($_FILES['foto_galeri']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/galeri/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_galeri')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Galeri',
								'datanya' => $this->db->get_where('galeri',array('id_galeri' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/galeri/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/galeri/'.$row_cli->foto_galeri);
	                $image    				= $this->upload->data();
	                $data['foto_galeri'] 	= $image['file_name'];

					$execute = $this->db->update('galeri',$data,array('id_galeri' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/galeri/');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/galeri/');
					}
	            }
	        }else{
				$execute = $this->db->update('galeri',$data,array('id_galeri' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/galeri/');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/galeri/');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Galeri',
					'error' => '',
					'datanya' => $this->db->get_where('galeri',array('id_galeri' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/galeri/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		$select_cli = $this->db->get_where('galeri', array('id_galeri' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/galeri/'.$row_cli->foto_galeri);
      
        $execute = $this->db->delete('galeri',array('id_galeri' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/galeri');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/galeri');
		}
	}
}
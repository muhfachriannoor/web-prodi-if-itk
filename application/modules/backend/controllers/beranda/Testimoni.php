<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni extends MY_Controller {
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
					'sub_menunya' => 'Testimoni',
					'datanya' => $this->db->order_by('idTestimoni','DESC')->get('testimoni'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/testimoni/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Testimoni',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/testimoni/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('testimoni','Testimoni','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if (empty($_FILES['foto_testimoni']['name']))
		{
			$this->form_validation->set_rules('foto_testimoni','Foto','required');
		}

		if($this->form_validation->run() != false){
			$nama 		= $this->input->post('nama');
			$posisi		= $this->input->post('posisi');
			$testimoni 	= $this->input->post('testimoni');
			$data = array(
						'nama' => $nama,
						'posisi' => $posisi,
						'testimoni' => $testimoni,
					);
			if (!empty($_FILES['foto_testimoni']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/testimoni/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 300;
            	$config['min_height'] = 300;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_testimoni')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Testimoni',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/testimoni/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_testimoni'] = $image['file_name'];
	                $execute = $this->db->insert('testimoni',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/testimoni');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/testimoni');
					}
	            }
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Testimoni',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/testimoni/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Testimoni',
					'datanya' => $this->db->get_where('testimoni',array('idTestimoni' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/testimoni/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('testimoni', array('idTestimoni' => $id));
        $row_cli    = $select_cli->row();

		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('posisi','Posisi','required');
		$this->form_validation->set_rules('testimoni','Testimoni','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$nama 		= $this->input->post('nama');
			$posisi		= $this->input->post('posisi');
			$testimoni 	= $this->input->post('testimoni');
			$data = array(
						'nama' => $nama,
						'posisi' => $posisi,
						'testimoni' => $testimoni,
					);

	        if(!empty($_FILES['foto_testimoni']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/testimoni/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 300;
            	$config['min_height'] = 300;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_testimoni')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Testimoni',
								'datanya' => $this->db->get_where('testimoni',array('idTestimoni' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/testimoni/update',$error);
					$this->load->view('partial/footer');
	            }else{
	                unlink('./asset/backend/upload/testimoni/'.$row_cli->foto_testimoni);
	                $image    				= $this->upload->data();
	                $data['foto_testimoni'] = $image['file_name'];

					$execute = $this->db->update('testimoni',$data,array('idTestimoni' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/testimoni');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/testimoni');
					}
	            }
	        }else{
				$execute = $this->db->update('testimoni',$data,array('idTestimoni' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/testimoni');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/testimoni');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Testimoni',
					'error' => '',
					'datanya' => $this->db->get_where('testimoni',array('idTestimoni' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/testimoni/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('testimoni', array('idTestimoni' => $id));
        $row_cli    = $select_cli->row();
        unlink('./asset/backend/upload/testimoni/'.$row_cli->foto_testimoni);
      
        $execute = $this->db->delete('testimoni',array('idTestimoni' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/testimoni');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/testimoni');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Testimoni',
					'datanya' => $this->db->get_where('testimoni',array('idTestimoni' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/testimoni/detail');
		$this->load->view('partial/footer');
	}
}

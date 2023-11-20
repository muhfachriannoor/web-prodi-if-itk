<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Hasil_penelitian extends MY_Controller {
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
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'datanya' => $this->db->where('status',1)->order_by('id_penelitian','DESC')->get('sm_hasilpenelitian'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_penelitian/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_penelitian/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('judul_penelitian','Judul Penelitian','required');
		$this->form_validation->set_rules('tahun_penelitian','Tahun','required');
		$this->form_validation->set_rules('sumberdana_penelitian','Sumber Dana','required');
		$this->form_validation->set_rules('text_penelitian','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_penelitian']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_penelitian','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$judul_penelitian 		= $this->input->post('judul_penelitian');

			$text = trim($judul_penelitian);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_penelitian	 	= $text;
			$tahun_penelitian 		= $this->input->post('tahun_penelitian');
			$sumberdana_penelitian 	= $this->input->post('sumberdana_penelitian');
			$text_penelitian 		= $this->input->post('text_penelitian');
			$data = array(
						'judul_penelitian' => $judul_penelitian,
						'tahun_penelitian' => $tahun_penelitian,
						'sumberdana_penelitian' => $sumberdana_penelitian,
						'text_penelitian' => $text_penelitian,
						'slug_penelitian' => $slug_penelitian,
						'status' => 1,
					);
			if (!empty($_FILES['foto_penelitian']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/hasil_penelitian/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 900;
            	$config['min_height'] = 540;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_penelitian')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Penelitian & Pengabdian',
								'sub_menunya' => 'Hasil Penelitian',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('penelitian/hasil_penelitian/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_penelitian'] = $image['file_name'];
	                $execute = $this->db->insert('sm_hasilpenelitian',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_penelitian/');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_penelitian/');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('sm_hasilpenelitian',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_penelitian/');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_penelitian/');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('penelitian/hasil_penelitian/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'datanya' => $this->db->get_where('sm_hasilpenelitian',array('id_penelitian' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_penelitian/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('sm_hasilpenelitian', array('id_penelitian' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('judul_penelitian','Judul Penelitian','required');
		$this->form_validation->set_rules('tahun_penelitian','Tahun','required');
		$this->form_validation->set_rules('sumberdana_penelitian','Sumber Dana','required');
		$this->form_validation->set_rules('text_penelitian','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false){
			$judul_penelitian 		= $this->input->post('judul_penelitian');

			$text = trim($judul_penelitian);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_penelitian	 	= $text;
			$tahun_penelitian 		= $this->input->post('tahun_penelitian');
			$sumberdana_penelitian 	= $this->input->post('sumberdana_penelitian');
			$text_penelitian 		= $this->input->post('text_penelitian');
			$data = array(
						'judul_penelitian' => $judul_penelitian,
						'tahun_penelitian' => $tahun_penelitian,
						'sumberdana_penelitian' => $sumberdana_penelitian,
						'text_penelitian' => $text_penelitian,
						'slug_penelitian' => $slug_penelitian,
						'status' => 1,
					);

	        if(!empty($_FILES['foto_penelitian']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/hasil_penelitian/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 900;
            	$config['min_height'] = 540;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_penelitian')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Penelitian & Pengabdian',
								'sub_menunya' => 'Hasil Penelitian',
								'datanya' => $this->db->get_where('sm_hasilpenelitian',array('id_penelitian' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('penelitian/hasil_penelitian/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_penelitian != ''):
	                	unlink('./asset/backend/upload/hasil_penelitian/'.$row_cli->foto_penelitian);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_penelitian'] 	= $image['file_name'];

					$execute = $this->db->update('sm_hasilpenelitian',$data,array('id_penelitian' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_penelitian/');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/penelitian/hasil_penelitian/');
					}
	            }
	        }else{
				$execute = $this->db->update('sm_hasilpenelitian',$data,array('id_penelitian' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_penelitian/');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/penelitian/hasil_penelitian/');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'datanya' => $this->db->get_where('sm_hasilpenelitian',array('id_penelitian' => $id))->row(),
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('penelitian/hasil_penelitian/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $execute = $this->db->update('sm_hasilpenelitian',array('status' => 0),array('id_penelitian' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/penelitian/hasil_penelitian/');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/penelitian/hasil_penelitian/');
		}
	}

	public function detail($id)
	{
		$data = array(
					'menunya' => 'Penelitian & Pengabdian',
					'sub_menunya' => 'Hasil Penelitian',
					'datanya' => $this->db->get_where('sm_hasilpenelitian',array('id_penelitian' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('penelitian/hasil_penelitian/detail');
		$this->load->view('partial/footer');
	}
}

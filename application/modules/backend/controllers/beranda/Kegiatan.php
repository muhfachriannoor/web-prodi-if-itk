<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kegiatan extends MY_Controller {
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
		$this->load->helper('tanggal_helper');
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'datanya' => $this->db->order_by('idKegiatan','DESC')->get('kegiatan'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/kegiatan/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/kegiatan/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('judul_kegiatan','Judul','required');
		$this->form_validation->set_rules('jenis_kegiatan','Jenis','required');
		$this->form_validation->set_rules('penyelenggara_kegiatan','Penyelenggara','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('materi_kegiatan','Materi','required');
		$this->form_validation->set_rules('peserta_kegiatan','Peserta','required');
		$this->form_validation->set_rules('lokasi_kegiatan','Lokasi','required');
		$this->form_validation->set_rules('ruang_kegiatan','Ruang','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_kegiatan']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_kegiatan','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$judul_kegiatan 		= $this->input->post('judul_kegiatan');

			$text = trim($judul_kegiatan);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_kegiatan 	= $text; 
			$jenis_kegiatan 		= $this->input->post('jenis_kegiatan');
			$penyelenggara_kegiatan = $this->input->post('penyelenggara_kegiatan');
			$materi_kegiatan 		= $this->input->post('materi_kegiatan');
			$peserta_kegiatan 		= $this->input->post('peserta_kegiatan');
			$tanggal 				= $this->input->post('tanggal');
			$waktu 					= $this->input->post('waktu');
			$tgl_kegiatan 			= $tanggal.' '.$waktu.':00';
			$lokasi_kegiatan 		= $this->input->post('lokasi_kegiatan');
			$ruang_kegiatan 		= $this->input->post('ruang_kegiatan');
			$data = array(
						'judul_kegiatan' => $judul_kegiatan,
						'jenis_kegiatan' => $jenis_kegiatan,
						'penyelenggara_kegiatan' => $penyelenggara_kegiatan,
						'materi_kegiatan' => $materi_kegiatan,
						'peserta_kegiatan' => $peserta_kegiatan,
						'tgl_kegiatan' => $tgl_kegiatan,
						'lokasi_kegiatan' => $lokasi_kegiatan,
						'ruang_kegiatan' => $ruang_kegiatan,
						'slug_kegiatan' => $slug_kegiatan,
					);
			if(!empty($_FILES['foto_kegiatan']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/kegiatan/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 400;
            	$config['min_height'] = 400;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_kegiatan')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Kegiatan',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/kegiatan/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_kegiatan'] = $image['file_name'];
	                $execute = $this->db->insert('kegiatan',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/kegiatan');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/kegiatan');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('kegiatan',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/kegiatan');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/kegiatan');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/kegiatan/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'datanya' => $this->db->get_where('kegiatan',array('idKegiatan' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/kegiatan/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('kegiatan', array('idKegiatan' => $id));
        $row_cli    = $select_cli->row();

		$this->form_validation->set_rules('judul_kegiatan','Judul','required');
		$this->form_validation->set_rules('jenis_kegiatan','Jenis','required');
		$this->form_validation->set_rules('penyelenggara_kegiatan','Penyelenggara','required');
		$this->form_validation->set_rules('tanggal','Tanggal','required');
		$this->form_validation->set_rules('waktu','Waktu','required');
		$this->form_validation->set_rules('materi_kegiatan','Materi','required');
		$this->form_validation->set_rules('peserta_kegiatan','Peserta','required');
		$this->form_validation->set_rules('lokasi_kegiatan','Lokasi','required');
		$this->form_validation->set_rules('ruang_kegiatan','Ruang','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		if($this->form_validation->run() != false) {
			$judul_kegiatan 		= $this->input->post('judul_kegiatan');

	        $text = trim($judul_kegiatan);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_kegiatan 	= $text; 
			$jenis_kegiatan 		= $this->input->post('jenis_kegiatan');
			$penyelenggara_kegiatan = $this->input->post('penyelenggara_kegiatan');
			$materi_kegiatan 		= $this->input->post('materi_kegiatan');
			$peserta_kegiatan 		= $this->input->post('peserta_kegiatan');
			$tanggal 				= $this->input->post('tanggal');
			$waktu 					= $this->input->post('waktu');
			$tgl_kegiatan 			= $tanggal.' '.$waktu.':00';
			$lokasi_kegiatan 		= $this->input->post('lokasi_kegiatan');
			$ruang_kegiatan 		= $this->input->post('ruang_kegiatan');
			$data = array(
						'judul_kegiatan' => $judul_kegiatan,
						'jenis_kegiatan' => $jenis_kegiatan,
						'penyelenggara_kegiatan' => $penyelenggara_kegiatan,
						'materi_kegiatan' => $materi_kegiatan,
						'peserta_kegiatan' => $peserta_kegiatan,
						'tgl_kegiatan' => $tgl_kegiatan,
						'lokasi_kegiatan' => $lokasi_kegiatan,
						'ruang_kegiatan' => $ruang_kegiatan,
						'slug_kegiatan' => $slug_kegiatan,
					);

	        if(!empty($_FILES['foto_kegiatan']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/kegiatan/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 400;
            	$config['min_height'] = 400;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_kegiatan')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Kegiatan',
								'datanya' => $this->db->get_where('kegiatan',array('idKegiatan' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/kegiatan/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_kegiatan != ''):
	                	unlink('./asset/backend/upload/kegiatan/'.$row_cli->foto_kegiatan);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_kegiatan'] = $image['file_name'];

					$execute = $this->db->update('kegiatan',$data,array('idKegiatan' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/kegiatan');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/kegiatan');
					}
	            }
	        }else{
				$execute = $this->db->update('kegiatan',$data,array('idKegiatan' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/kegiatan');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/kegiatan');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'error' => '',
					'datanya' => $this->db->get_where('kegiatan',array('idKegiatan' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/kegiatan/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('kegiatan', array('idKegiatan' => $id));
        $row_cli    = $select_cli->row();
        if($row_cli->foto_kegiatan != ''):
        	unlink('./asset/backend/upload/kegiatan/'.$row_cli->foto_kegiatan);
        endif;
      
        $execute = $this->db->delete('kegiatan',array('idKegiatan' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/kegiatan');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/kegiatan');
		}
	}

	public function detail($id)
	{
		$this->load->helper('tanggal_helper');
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Kegiatan',
					'datanya' => $this->db->get_where('kegiatan',array('idKegiatan' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/kegiatan/detail');
		$this->load->view('partial/footer');
	}
}

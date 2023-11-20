<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengumuman extends MY_Controller {
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
					'sub_menunya' => 'Pengumuman',
					'datanya' => $this->db->order_by('idPengumuman','DESC')->get('pengumuman'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/pengumuman/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Pengumuman',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/pengumuman/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('judul_pengumuman','Judul','required');
		$this->form_validation->set_rules('text_pengumuman','Isi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_pengumuman']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_pengumuman','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$judul_pengumuman 	= $this->input->post('judul_pengumuman');

			$text = trim($judul_pengumuman);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_pengumuman 	= $text; 
			$text_pengumuman 	= $this->input->post('text_pengumuman');
			$tanggal_pengumuman = date('Y-m-d H:i:s');
			$data = array(
						'judul_pengumuman' => $judul_pengumuman,
						'text_pengumuman' => $text_pengumuman,
						'tgl_pengumuman' => $tanggal_pengumuman,
						'slug_pengumuman' => $slug_pengumuman,
					);
			if (!empty($_FILES['foto_pengumuman']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/pengumuman/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 600;
            	$config['min_height'] = 850;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_pengumuman')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Pengumuman',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/pengumuman/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_pengumuman'] = $image['file_name'];
	                $execute = $this->db->insert('pengumuman',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/pengumuman');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/pengumuman');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('pengumuman',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/pengumuman');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/pengumuman');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Pengumuman',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/pengumuman/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Pengumuman',
					'datanya' => $this->db->get_where('pengumuman',array('idPengumuman' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/pengumuman/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('pengumuman', array('idPengumuman' => $id));
        $row_cli    = $select_cli->row();
		
		$this->form_validation->set_rules('judul_pengumuman','Judul','required');
		$this->form_validation->set_rules('text_pengumuman','Isi','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$judul_pengumuman 	= $this->input->post('judul_pengumuman');

	        $text = trim($judul_pengumuman);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_pengumuman 	= $text; 
			$text_pengumuman 	= $this->input->post('text_pengumuman');
			$tanggal_pengumuman = date('Y-m-d H:i:s');
			$data = array(
						'judul_pengumuman' => $judul_pengumuman,
						'text_pengumuman' => $text_pengumuman,
						'tgl_pengumuman' => $tanggal_pengumuman,
						'slug_pengumuman' => $slug_pengumuman,
					);

	        if(!empty($_FILES['foto_pengumuman']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/pengumuman/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 600;
            	$config['min_height'] = 850;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_pengumuman')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Pengumuman',
								'datanya' => $this->db->get_where('pengumuman',array('idPengumuman' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/pengumuman/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_pengumuman != ''):
	                	unlink('./asset/backend/upload/pengumuman/'.$row_cli->foto_pengumuman);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_pengumuman'] = $image['file_name'];

					$execute = $this->db->update('pengumuman',$data,array('idPengumuman' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/pengumuman');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/pengumuman');
					}
	            }
	        }else{
				$execute = $this->db->update('pengumuman',$data,array('idPengumuman' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/pengumuman');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/pengumuman');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Pengumuman',
					'error' => '',
					'datanya' => $this->db->get_where('pengumuman',array('idPengumuman' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/pengumuman/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
        $select_cli = $this->db->get_where('pengumuman', array('idPengumuman' => $id));
        $row_cli    = $select_cli->row();
        if($row_cli->foto_pengumuman != ''):
        	unlink('./asset/backend/upload/pengumuman/'.$row_cli->foto_pengumuman);
        endif;
      
        $execute = $this->db->delete('pengumuman',array('idPengumuman' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/pengumuman');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/pengumuman');
		}
	}

	public function detail($id)
	{
		$this->load->helper('tanggal_helper');
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Pengumuman',
					'datanya' => $this->db->get_where('pengumuman',array('idPengumuman' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/pengumuman/detail');
		$this->load->view('partial/footer');
	}
}

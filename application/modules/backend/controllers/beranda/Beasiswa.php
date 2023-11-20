<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beasiswa extends MY_Controller {
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
					'sub_menunya' => 'Beasiswa',
					'datanya' => $this->db->where('status',1)->order_by('idBeasiswa','DESC')->get('beasiswa'),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/beasiswa/index');
		$this->load->view('partial/footer');
	}

	public function create()
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Beasiswa',
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/beasiswa/create');
		$this->load->view('partial/footer');
	}

	public function up()
	{
		$this->form_validation->set_rules('nama_beasiswa','Nama Beasiswa','required');
		$this->form_validation->set_rules('text_beasiswa','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

		// if (empty($_FILES['foto_beasiswa']['name']))
		// {
		// 	$this->form_validation->set_rules('foto_beasiswa','Foto','required');
		// }

		if($this->form_validation->run() != false){
			$nama_beasiswa 		= $this->input->post('nama_beasiswa');

			$text = trim($nama_beasiswa);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_beasiswa 		= $text;
			$tanggal_beasiswa 	= date('Y-m-d H:i:s');
			$text_beasiswa 		= $this->input->post('text_beasiswa');
			$data = array(
						'nama_beasiswa' => $nama_beasiswa,
						'slug_beasiswa' => $slug_beasiswa,
						'tanggal_beasiswa' => $tanggal_beasiswa,
						'text_beasiswa' => $text_beasiswa,
						'status' => 1
					);
			if (!empty($_FILES['foto_beasiswa']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/beasiswa/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_beasiswa')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Beasiswa',
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/beasiswa/create',$error);
					$this->load->view('partial/footer');
	            }else{
	                $image = $this->upload->data();
	                $foto = $data['foto_beasiswa'] = $image['file_name'];
	                $execute = $this->db->insert('beasiswa',$data);
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil menambahkan data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/beasiswa');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Gagal Menambahkan Data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/beasiswa');
					}
	            }
	        }else{
	        	$execute = $this->db->insert('beasiswa',$data);
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil menambahkan data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/beasiswa');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Gagal Menambahkan Data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/beasiswa');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Beasiswa',
					'error' => '',
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/beasiswa/create');
			$this->load->view('partial/footer');
		}
	}

	public function update($id)
	{
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Beasiswa',
					'datanya' => $this->db->get_where('beasiswa',array('idBeasiswa' => $id))->row(),
					'error' => '',
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/beasiswa/update');
		$this->load->view('partial/footer');
	}

	public function down($id)
	{
		$select_cli = $this->db->get_where('beasiswa', array('idBeasiswa' => $id));
        $row_cli    = $select_cli->row();

        $this->form_validation->set_rules('nama_beasiswa','Nama Beasiswa','required');
		$this->form_validation->set_rules('text_beasiswa','Text','required');
		$this->form_validation->set_message('required', 'Wajib diisi');

        if($this->form_validation->run() != false) {
			$nama_beasiswa 		= $this->input->post('nama_beasiswa');

			$text = trim($nama_beasiswa);
			$text = preg_replace("/[^a-zA-Z0-9\-\s]+/", "", $text);
			$text = strtolower(trim($text));
			$text = str_replace(' ', '-', $text);
			$text = $text_ori = preg_replace('/\-{2,}/', '-', $text);

			$slug_beasiswa 		= $text;
			$tanggal_beasiswa 	= date('Y-m-d H:i:s');
			$text_beasiswa 		= $this->input->post('text_beasiswa');
			$data = array(
						'nama_beasiswa' => $nama_beasiswa,
						'slug_beasiswa' => $slug_beasiswa,
						'tanggal_beasiswa' => $tanggal_beasiswa,
						'text_beasiswa' => $text_beasiswa,
						'status' => 1
					);

	        if(!empty($_FILES['foto_beasiswa']['name'])) {
	            $config['upload_path'] = './asset/backend/upload/beasiswa/';
	            $config['allowed_types'] = 'jpg|png|jpeg|';
	            $config['min_width'] = 640;
            	$config['min_height'] = 480;
	            $this->load->library('upload', $config);
	            $this->upload->initialize($config);

	            if (!$this->upload->do_upload('foto_beasiswa')) {
	                $error = array('error' => $this->upload->display_errors());
	            	$test = array(
								'menunya' => 'Beranda',
								'sub_menunya' => 'Beasiswa',
								'datanya' => $this->db->get_where('beasiswa',array('idBeasiswa' => $id))->row(),
							);
					$this->load->view('partial/header', $test);
					$this->load->view('beranda/beasiswa/update',$error);
					$this->load->view('partial/footer');
	            }else{
	            	if($row_cli->foto_beasiswa != ''):
	                	unlink('./asset/backend/upload/beasiswa/'.$row_cli->foto_beasiswa);
	                endif;
	                $image    				= $this->upload->data();
	                $data['foto_beasiswa'] 	= $image['file_name'];

					$execute = $this->db->update('beasiswa',$data,array('idBeasiswa' => $id));
					if($execute == TRUE) {
						$alert =
							'<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-check"></i> Sukses!</h4>
								Berhasil mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/beasiswa');
					}else{
						$alert =
							'<div class="alert alert-danger alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
								Tidak bisa mengubah data!
							</div>';
						$session = $this->session->set_flashdata('alert', $alert);
						redirect('backend/beranda/beasiswa');
					}
	            }
	        }else{
				$execute = $this->db->update('beasiswa',$data,array('idBeasiswa' => $id));
				if($execute == TRUE) {
					$alert =
						'<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-check"></i> Sukses!</h4>
							Berhasil mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/beasiswa');
				}else{
					$alert =
						'<div class="alert alert-danger alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
							Tidak bisa mengubah data!
						</div>';
					$session = $this->session->set_flashdata('alert', $alert);
					redirect('backend/beranda/beasiswa');
				}
	        }
		}else{
			$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Beasiswa',
					'error' => '',
					'datanya' => $this->db->get_where('beasiswa',array('idBeasiswa' => $id))->row(),
				);
			$this->load->view('partial/header', $data);
			$this->load->view('beranda/beasiswa/update');
			$this->load->view('partial/footer');
		}
	}

	public function delete($id)
	{
		// $select_cli = $this->db->get_where('beasiswa', array('idBeasiswa' => $id));
  //       $row_cli    = $select_cli->row();
  //       if($row_cli->foto_beasiswa != ''):
  //       	unlink('./asset/backend/upload/beasiswa/'.$row_cli->foto_beasiswa);
  //       endif;
        $execute = $this->db->update('beasiswa',array('status' => 0),array('idBeasiswa' => $id));
		if($execute == TRUE) {
			$alert =
				'<div class="alert alert-success alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-check"></i> Sukses!</h4>
					Berhasil menghapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/beasiswa');
		}else{
			$alert =
				'<div class="alert alert-danger alert-dismissible">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<h4><i class="icon fa fa-warning"></i> Gagal!</h4>
					Tidak bisa hapus data!
				</div>';
			$session = $this->session->set_flashdata('alert', $alert);
			redirect('backend/beranda/beasiswa');
		}
	}

	public function detail($id)
	{
		$this->load->helper('tanggal_helper');
		$data = array(
					'menunya' => 'Beranda',
					'sub_menunya' => 'Beasiswa',
					'datanya' => $this->db->get_where('beasiswa',array('idBeasiswa' => $id))->row(),
				);
		$this->load->view('partial/header', $data);
		$this->load->view('beranda/beasiswa/detail');
		$this->load->view('partial/footer');
	}
}

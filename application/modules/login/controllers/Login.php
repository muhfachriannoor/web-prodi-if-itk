<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends MY_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->model('m_login');
  }

  public function index()
  {
    $this->load->view('login/index');
  }

  public function up()
  {
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    if ($this->m_login->login($username, $password) == TRUE) {
      redirect('backend/');
    } else {
      $alert =
        '<div class="notification is-danger">
					Username/Email atau Password Salah!
				</div>';
      $session = $this->session->set_flashdata('alert', $alert);
      redirect('login');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('idUser');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('foto');
    $this->session->unset_userdata('logged');
    $alert =
      '<div class="notification is-success">
					Berhasil Keluar
				</div>';
    $session = $this->session->set_flashdata('alert', $alert);
    redirect('login');
  }
}

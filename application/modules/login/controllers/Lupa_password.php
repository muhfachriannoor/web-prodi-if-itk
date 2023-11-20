<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lupa_password extends MY_Controller {

    public function __construct() 
    {
        parent::__construct();
        $this->load->model('m_login');
        $this->load->helper('string');
    }

    public function index()
    {
      $this->load->view('login/lupa_password');
    }

    public function up()
    {
        $email = $this->input->post('email');
        $token =  random_string('alnum', 50);

        if($this->m_login->update_reset_key($email,$token)) {

          $config = [
                 'mailtype'  => 'html',
                 'charset'   => 'utf-8',
                 'protocol'  => 'smtp',
                 'smtp_host' => 'ssl://smtp.gmail.com',
                 'smtp_user' => 'muhammadfachriannoor@gmail.com',    // Ganti dengan email gmail kamu
                 'smtp_pass' => 'marquez93',      // Password gmail kamu
                 'smtp_port' => 465,
                 'crlf'      => "\r\n",
                 'newline'   => "\r\n"
             ];

          // Load library email dan konfigurasinya
          $this->load->library('email', $config);

          // Email dan nama pengirim
          $this->email->from('muhammadfachriannoor@gmail.com', 'Administrator');

          // Email penerima
          $this->email->to($email); // Ganti dengan email tujuan kamu

          // Lampiran email, isi dengan url/path file
          // $this->email->attach('https://masrud.com/content/images/20181215150137-codeigniter-smtp-gmail.png');

          // Subject email
          $this->email->subject('Lupa Password');

          // Isi email
          $this->email->message("<p>Anda melakukan permintaan reset password</p><a href='".site_url('lupa_password/reset/'.$token)."'>klik reset password</a>");

          // Tampilkan pesan sukses atau error
          if ($this->email->send()) {
            $alert =
              '<div class="notification is-success">
                Silahkan cek email <b>'.$this->input->post("email").'</b> untuk melakukan reset password
              </div>';
            $session = $this->session->set_flashdata('alert', $alert);
            redirect('lupa_password');
          } else {
            $alert =
              '<div class="notification is-danger">
               Gagal kirim email!
              </div>';
            $session = $this->session->set_flashdata('alert', $alert);
            redirect('lupa_password');
          }
        }else{
          $alert =
            '<div class="notification is-danger">
              Email yang anda masukan belum terdaftar!
            </div>';
          $session = $this->session->set_flashdata('alert', $alert);
          redirect('lupa_password');
        }
    }

    public function reset($token)
    {
      $cek = $this->db->where('token', $token)->from('user')->count_all_results();
      if($cek == 1){
         $data = array(
                'token' => $token,
              );
        $this->load->view('login/reset_password',$data);
      }else{
        $alert =
            '<div class="notification is-danger">
              Token salah!
            </div>';
          $session = $this->session->set_flashdata('alert', $alert);
          redirect('lupa_password');
      }
    }

    public function reset_up($token)
    {
      $this->form_validation->set_rules('password', 'Password', 'required|matches[re_password]');
      $this->form_validation->set_rules('re_password', 'Retype Password', 'required|matches[password]');
      $this->form_validation->set_message('matches', '<div class="notification is-danger">Password tidak sama!</div>');

      if($this->form_validation->run() != FALSE)
      {
        $data = array(
                  'password' => $this->m_login->hash($this->input->post('password')),
                );

        $execute = $this->db->update('user',$data,array('token' => $token));
        if($execute == TRUE){
          $alert =
              '<div class="notification is-success">
               Berhasil reset password!
              </div>';
            $session = $this->session->set_flashdata('alert', $alert);
            redirect('login');
        }else{
          $alert =
              '<div class="notification is-danger">
               Gagal reset password!
              </div>';
            $session = $this->session->set_flashdata('alert', $alert);
            redirect('login');
        }
      }else{
        $data = array(
                  'token' => $token,
                );
        $this->load->view('login/reset_password',$data);
      }
    }
}
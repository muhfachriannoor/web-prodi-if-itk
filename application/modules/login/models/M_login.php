<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_login extends CI_Model
{

  public function login($username, $password)
  {
    $password_hash = $this->hash($password);
    $query = $this->db->query("SELECT * FROM user WHERE (username = '$username' OR email = '$username') AND password = '$password_hash'");
    if ($query->num_rows() == 1) {
      foreach ($query->result() as $row) {
        $data = array(
          'idUser' => $row->idUser,
          'username' => $row->username,
          'nama' => $row->nama_user,
          'foto' => $row->foto_user,
          'email' => $row->email,
          'akses' => $row->akses,
          'logged' => TRUE,
        );
      }
      $this->session->set_userdata($data);
      return TRUE;
    } else {
      return FALSE;
    }
  }
  public function hash($string)
  {
    return hash('sha512', $string . config_item('encryption_key'));
  }

  public function update_reset_key($email, $token)
  {
    $this->db->where('email', $email);
    $data = array('token' => $token);
    $this->db->update('user', $data);
    if ($this->db->affected_rows() > 0) {
      return TRUE;
    } else {
      return FALSE;
    }
  }
}

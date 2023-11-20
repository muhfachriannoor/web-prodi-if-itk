<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model {
    public function hash($string)
    {
        return hash('sha512', $string . config_item('encryption_key'));
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error_404 extends MY_Controller {

	public function __construct() 
    {
        parent::__construct();    }

	public function index()
	{
		$this->load->view('error_404/index');
	}

}

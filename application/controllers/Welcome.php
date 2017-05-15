<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
		
		$this->load->model('example_modal');
		
		date_default_timezone_set('Asia/Kolkata');
        ini_get('date.timezone');        
        error_reporting(E_ALL^E_WARNING^E_NOTICE);
    }

	public function index() {
		
		$this->load->view('welcome_message');
	}
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
	function __construct() {
        parent::__construct();
        $this->load->database();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
		
		   $this->load->model('users_model');
		
		
    }

	public function index($sort_by="id_user", $sort_order='asc', $offset = 0) {
		//define variables 
		$limit = 20;
		//get data from models
		$users = $this->users_model->get_users($limit, $offset, $sort_by, $sort_order);


		//set variables for pages
		$page_data['users'] = $users['rows'];
		$page_data['num_result'] = $users['num_rows'];
		$page_data['fields'] = array("id_user" => 'ID', 'user_name' => 'User Name');
		$page_data['sort_by'] = $sort_by;
		$page_data['sort_order'] = $sort_order;


		//pagination
		$this->load->library("pagination");
		$config = array();
		$config['base_url'] = site_url("users/index/$sort_by/$sort_order/");
		$config['total_rows'] =  $page_data['num_result'];	
		$config['per_page'] =  $limit;
		$config['uri_segment'] =  5;

		
		//generating numeric links
		//$config['num_links'] = 3;
		//$config['display_pages'] = FALSE;

		//generate custom links for paging
		//$config['first_link'] = '<< First';
		//$config['last_link'] = 'Last >>';
		//$config['next_link'] = 'Next';
		//$config['prev_link'] = 'Previous';

		
		
		
		$this->pagination->initialize($config);
		$page_data['pagination'] = $this->pagination->create_links();

		
		//load template
		$this->load->view('templates/header', $page_data);
        $this->load->view('users/index', $page_data);
        $this->load->view('templates/footer');
	}
}

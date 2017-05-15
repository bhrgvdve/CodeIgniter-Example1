<?php
class Newso extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->database();

        $this->load->library('session');
        $this->load->helper('url');
        $this->load->helper('form');
        
        $this->load->model('newso_model');
        
        
    }

    public function index($sort_by="id_user", $sort_order='asc', $offset = 0) {
        //define variables 
        $limit = 20;
        //get data from models
        $newso = $this->newso_model->get_newso($limit, $offset, $sort_by, $sort_order);


        //set variables for pages
        $page_data['newso'] = $newso['rows'];
        $page_data['num_result'] = $newso['num_rows'];
        $page_data['fields'] = array("id_user" => 'ID', 'user_name' => 'User Name');
        $page_data['sort_by'] = $sort_by;
        $page_data['sort_order'] = $sort_order;


        //pagination
        $this->load->library("pagination");
        $config = array();
        $config['base_url'] = site_url("newso/index/$sort_by/$sort_order/");
        $config['total_rows'] =  $page_data['num_result'];  
        $config['per_page'] =  $limit;
        $config['uri_segment'] =  5;

        
        //generating numeric links
        //$config['num_links'] = 3;
        //$config['display_pages'] = FALSE;

        //generate custom links for paging
        $config['first_link'] = '<< First';
        $config['last_link'] = 'Last >>';
        $config['next_link'] = 'Next >';
        $config['prev_link'] = '< Previous';

        
        
        
        $this->pagination->initialize($config);
        $page_data['pagination'] = $this->pagination->create_links();

        
        //load template
        $this->load->view('templates/header', $page_data);
        $this->load->view('newso/index', $page_data);
        $this->load->view('templates/footer');
    }
 
}
<?php
class Users_model extends CI_Model {
 
    public function __construct()
    {
        $this->load->database();
    }

    public function get_users($limit, $offset,$sort_by, $sort_order) {

        $sort_order = ($sort_order == 'desc') ? 'desc' : 'asc';
        $sort_columns = array('id_user, user_name');
        $sort_by = (in_array($sort_by, $sort_columns)) ? $sort_by : 'id_user';


        //result query 
        $result['rows'] = $this->db->select('id_user, user_name')->from('users')->limit($limit, $offset)->order_by($sort_by, $sort_order)->get()->result();
        //$result['rows'] = $this->db->select('id_user, user_name')->from('users')->get()->result();
        //echo $this->db->last_query(); exit;


       //count rows query
        $r_count = $this->db->select('COUNT(*) AS total_rows', FALSE)->from('users')->get()->row()->total_rows;
        //echo $this->db->last_query(); exit;
        $result['num_rows'] =  $r_count;
        return $result;
    }
    
    
}
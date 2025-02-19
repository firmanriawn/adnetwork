<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {
    
    public function get_publishers() {
        $this->db->select('user_id, name, email');
        $this->db->from('users');
        return $this->db->get()->result();
    }
}

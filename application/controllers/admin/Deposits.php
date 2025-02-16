<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Deposits extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title'     => 'Dashboard Admin',
            'content'   => 'admin/content/deposits/index'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }


}
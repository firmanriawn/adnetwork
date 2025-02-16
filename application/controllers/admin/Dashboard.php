<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title'     => 'Dashboard Admin',
            'content'   => 'admin/content/dashboard/index'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }


}
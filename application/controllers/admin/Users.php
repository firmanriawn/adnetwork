<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        redirect('admin/dashboard');
    }

    public function publisher() {
        $data = array(
            'title'     => 'Dashboard Admin',
            'content'   => 'admin/content/users/publisher'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function advertiser() {
        $data = array(
            'title'     => 'Dashboard Admin',
            'content'   => 'admin/content/users/advertiser'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        redirect('admin/dashboard');
    }

    public function general() {
        $data = array(
            'title'     => 'General Setting',
            'content'   => 'admin/content/settings/general'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }



}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Websites extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title'     => 'Websites',
            'content'   => 'admin/content/websites/index'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function keywords() {
        $data = array(
            'title'     => 'Websites',
            'content'   => 'admin/content/websites/keywords'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }



}
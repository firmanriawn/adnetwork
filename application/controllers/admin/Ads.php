<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ads extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
        $data = array(
            'title'     => 'Dashboard Admin',
            'content'   => 'admin/content/ads/index'
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }

    public function create() {
        $data = array(
            'title'         => 'Dashboard Admin',
            'content'       => 'admin/content/ads/create',
            'css'           => array(base_url().'assets/ads/style.css','https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/themes/classic.min.css'),
            'javascript'    => array('https://cdn.jsdelivr.net/npm/@simonwep/pickr/dist/pickr.min.js',base_url().'assets/ads/main.js'),
        );
        
        // Load view
        $this->load->view('admin/layout/wrapper', $data);
    }

}
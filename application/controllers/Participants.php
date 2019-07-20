<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participants extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        // Session
        $this->load->library('session');
		$this->auth();
    }

    public function index() {
		$data = array();
        $this->load->view('frontend/dashboard', $data);
    }
    
}

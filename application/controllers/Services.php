<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        $this->load->model('contestinformations');
        // Session
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('frontend/services/landing');
    }

   


}
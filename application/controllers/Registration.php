<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        // Session
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('frontend/login/registration');
    }


}

    ?>
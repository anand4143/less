<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meraganacontest extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        $this->load->model('meraganacontests');
        // Session
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('frontend/meraganacontest/landing');
    }

    public function information(){
        $data = array();
        $data['description'] = $this->meraganacontests->getMeraganacontestDesc();
        $this->load->view('frontend/meraganacontest/meraganadescription',$data);
    }


}
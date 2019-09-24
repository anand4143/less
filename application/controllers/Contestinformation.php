<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contestinformation extends MY_Controller {
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
        $this->load->view('frontend/contestinformation/landing');
    }

    public function information(){
        //echo "here";die('heloo');
        $data = array();
        $data['description'] = $this->contestinformations->getcontestDesc();
        //print_r($data);
        $this->load->view('frontend/contestinformation/contestdescription',$data);
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminContestPageInfo extends MY_Controller {
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
        $data['description'] = $this->contestinformations->getcontestDesc();
        $this->load->view('admin/contestpageinfo/landing',$data);
    }

    public function save(){
        //print_r($this->input->post());
        $data = array();
        $data = array(
            'description' => $this->input->post('description')
        );
        $data['saveDescription'] = $this->contestinformations->savecontestDesc($data);

        $data['description'] = $this->contestinformations->getcontestDesc();
        $this->load->view('admin/contestpageinfo/landing',$data);
    }



    // public function information(){
    //     $data = array();
    //     $data['description'] = $this->meraganacontests->getMeraganacontestDesc();
    //     $this->load->view('admin/meraganacontest/meraganadescription',$data);
    // }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMeraganaContest extends MY_Controller {
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
        $data['description'] = $this->meraganacontests->getMeraganacontestDesc();
        $this->load->view('admin/meraganacontest/landing',$data);
    }

    public function save(){
        //print_r($this->input->post());
        $data = array();
        $data = array(
            'description' => $this->input->post('description')
        );
        $data['saveDescription'] = $this->meraganacontests->saveMeraganacontestDesc($data);

        $data['description'] = $this->meraganacontests->getMeraganacontestDesc();
        $this->load->view('admin/meraganacontest/landing',$data);
    }



    // public function information(){
    //     $data = array();
    //     $data['description'] = $this->meraganacontests->getMeraganacontestDesc();
    //     $this->load->view('admin/meraganacontest/meraganadescription',$data);
    // }


}
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
	public function upcoming_contests() {
		$data = array();
		$this->load->model('contest_m');
		$data['upcoming_contests'] = $this->contest_m->upcoming_cotest_list();
		//echo "<pre>";print_r($data);die;
        $this->load->view('frontend/contests/upcoming_contests', $data);
    }
	
	public function contest_details($contest_id) {
		$this->load->model('participant_m');
		$data['c_data'] = $this->participant_m->get_contest_data($contest_id);
        $this->load->view('frontend/participants/contest_detail', $data);
	}
    
}

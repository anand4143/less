<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

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
        $this->load->view('frontend/dashboard/', $data);
    }
	
	public function participants(){
		$data = array();
		$this->load->view('frontend/dashboard/participant', $data);
	}
	
	public function judges(){
		$data = array();
		$this->load->view('frontend/dashboard/judge', $data);
	}
    
}

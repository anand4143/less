<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contests extends MY_Controller {

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
	public function current_contests() {
		$data = array();
		$this->load->model('contest_m');
		$data['contests'] = $this->contest_m->current_contest_list();
		//echo "<pre>";print_r($data);die;
        $this->load->view('frontend/contests/current_contests', $data);
    }
	
	public function upcoming_contests() {
		$data = array();
		$this->load->model('contest_m');
		$data['upcoming_contests'] = $this->contest_m->upcoming_contest_list();
		//echo "<pre>";print_r($data);die;
        $this->load->view('frontend/contests/upcoming_contests', $data);
    }
	
	public function contest_details($contest_id) {
		$this->load->model('contest_m');
		$data['c_data'] = $this->contest_m->get_contest_data($contest_id);
		//echo "<pre>";print_r($data);die;
        $this->load->view('frontend/contests/contest_detail', $data);
	}
	
	public function participate($contest_id, $level_id) {
		$user_id = $this->getSessionData('userID');
		$this->load->model('contest_m');
		$new_data = array(
			'userID' => $user_id,
			'contestID' => $contest_id,
			'levelID' => $level_id
		);
		$rs = $this->contest_m->save_contest_participate_data($new_data);
		if($rs){
		  $data['resp_status'] = 'success';
		} else {
			 $data['resp_status'] = 'failed';
		}
		$this->load->view('frontend/contests/participate_message', $data);
    }
    
}

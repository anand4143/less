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
		$user_id = $this->getSessionData('userID');
		$data['contests'] = $this->contest_m->current_contest_list($user_id);
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
	
	public function previous_contests() {
		$data = array();
		$this->load->model('contest_m');
		$data['upcoming_contests'] = $this->contest_m->previous_contest_list();
		//echo "<pre>";print_r($data);die;
        $this->load->view('frontend/contests/previous_contests', $data);
    }
	
	public function contest_details($contest_id) {
		$user_id = $this->getSessionData('userID');
		$data['sessionData'] = $this->getSessionData();
        $data['userProfileImage'] = $this->users->getUserProfileImage($data['sessionData']['userID']);
		
		$this->load->model('contest_m');
		$this->load->model('participant_m');
		$this->load->model('smule_m');
		$this->load->model('users');
		$c_data = $this->contest_m->get_contest_data($contest_id);
		$data['c_data'] = $c_data;
		$data['is_participated'] = $this->participant_m->is_alreay_participate_contest($contest_id);
		$rs = $this->smule_m->get_user_smules($contest_id, $c_data->levelID);
		$data['my_songs'] = isset($rs[$user_id]) ? $rs[$user_id] : array();
		unset($rs[$user_id]);
		$data['others_song_list'] = $rs;
		$data['user'] = $this->users->getUser($this->getSessionData('userID'));
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
		//check is alreay participated
		
		$rs = $this->contest_m->save_contest_participate_data($new_data);
		
		if($rs) {
			redirect('contests/contest_details/'.$contest_id);
		} else {
	      $data['resp_status'] = 'failed';
		  $this->load->view('frontend/contests/participate_message', $data);
		}
    }
	
	public function upload_song($contest_id, $level_id){
		$resp_data =  array();
		
		$this->load->model('smule_m');
		$user_id = $this->getSessionData('userID');
		$smule_url = $this->input->post('smule_url');
		
		$this->load->library('form_validation');
		$this->form_validation->set_rules('smule_url', 'Upload Song', 'required|callback_valid_url');
		$this->form_validation->set_error_delimiters('<em clss="text-danger">','</em>');
		if($this->form_validation->run()) {
			$is_limit_exceed = $this->smule_m->is_upload_limit_exceed($contest_id, $level_id, $user_id);
			if($is_limit_exceed){
				$resp_data['resp_status'] = 'error';
				$resp_data['resp_msg'] = 'Song upload limit exceeded';
			} else {
				$new_data = array(
					'contestID' => $contest_id,
					'levelID' => $level_id, 
					'userID' => $user_id,
					'smuleUrl' => $smule_url,
					'smuleID' => '',
					'eby' => $user_id
				);

				$resp = $this->smule_m->store_data($new_data);
				if($resp){
					$resp_data['resp_status'] = 'success';
					$resp_data['resp_msg'] = 'Song uploaded sucessfully';
				} else {
					$resp_data['resp_status'] = 'error';
					$resp_data['resp_msg'] = 'Song upload failed, try again!';
				}
			}	
		} else {
			$resp_data['resp_status'] = 'error';
			foreach($_POST as $key => $value){
				$resp_data['messages'][$key] = form_error($key);
			}
		}

		echo json_encode($resp_data);
	}
	
	public function get_all_user_songs($contest_id, $level_id){
		$resp_data = array();
		$this->load->model('smule_m');
		$rs = $this->smule_m->get_user_smules($contest_id, $level_id);
		if($rs){
			$resp['resp_status'] = 'success';
			$resp['list'] = $rs;
			$resp['num_row'] = count($rs);
		} else {
			$resp['resp_status'] = 'error';
			$resp['list'] = array();
			$resp['num_row'] = 0;
		}
		echo json_encode($resp_data);
	}
	
	public function valid_url($str){
        $pattern = "|^http(s)?://[a-z0-9-]+(.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i";
        if (!preg_match($pattern, $str)){
            $this->set_message('valid_url', 'Please enter valid url.');
            return FALSE;
        } 
        return TRUE;
    }
    
}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Votings extends MY_Controller {
	public $auth_token = 'less-vote';
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('voting_m');
        // Session
        $this->load->library('session');
		
		$this->auth_token = $this->auth_token.strtotime(date('Y-m-d'));
    }

    public function index() {
		$data = array();
		$data['contest_list'] = $this->voting_m->voting_contest_list();
		$this->load->view('frontend/votings/voting_contest_list', $data);
    }
	
	public function contestants($contest_id) {
		$this->auth();
		
		$data = array();
		$sess_user_id = $this->getSessionData('userID');
		$data['contestants'] = $this->voting_m->get_contestants($contest_id, $sess_user_id);
		$data['your_recored_vote'] = $this->voting_m->get_your_recorded_vote($contest_id, $sess_user_id);
		$this->load->view('frontend/votings/contestant_list', $data);
    }
	
	public function do_vote() {
		$this->auth();
		
		$resp_data = array();
		if ($this->input->method() === 'post') {
			
			/*$contest_id = $this->input->post('cId');
			$level_id = $this->input->post('lId');
			$participant_id = $this->input->post('pId');
			$hash_checksum = $this->input->post('cs');*/
			$req_body = file_get_contents('php://input');
			$req_data = json_decode($req_body);
			$contest_id = $req_data->cId;
			$level_id = $req_data->lId;
			$participant_id = $req_data->pId;
			$hash_checksum = $req_data->cs;
			
			$checksum = $contest_id.'|'.$level_id.'|'.$participant_id;
			if (password_verify($checksum, $hash_checksum)) {
				$sess_user_id = $this->getSessionData('userID');		
				$is_voted = $this->voting_m->is_already_voted($contest_id, $level_id, $sess_user_id );
				if(!$is_voted){
					$new_data = array(
					  'contestID' => $contest_id,
					  'contestLevelID' => $level_id,
					  'participantID' => $participant_id,
					  'votedByUserID' => $sess_user_id,
					  'ipAddress' => $this->get_client_id(),
					  'deviceID' => $this->get_device_id(),
					);
					$rs = $this->voting_m->store_vote($new_data);
					if($rs){
						$resp_data['resp_status'] = 'success';
						$resp_data['resp_msg'] = 'Your vote is recoreded successfully'; 	
					} else {
						$resp_data['resp_status'] = 'error';
						$resp_data['resp_msg'] = 'Your voting failed, try again !';
					}
				} else {
					$resp_data['resp_status'] = 'error'; 
					$resp_data['resp_msg'] = 'Your Vote is Already Recorded';
				}
			} else {
				$resp_data['resp_status'] = 'error'; 
				$resp_data['resp_msg'] = 'Invalid Auth Request Data'; 
			}
		} else {
			$resp_data['resp_status'] = 'error'; 
			$resp_data['resp_msg'] = 'Invalid Post Request Data';
		}		
		echo json_encode($resp_data);
    }
	
	
	
	
	
    
}

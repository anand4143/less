<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Votings extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('voting_m');
        // Session
        $this->load->library('session');
		$this->auth();
    }

    public function index() {
		$data = array();
		$sess_user_id = $this->getSessionData('userID');
		$data['profile_list'] = $this->voting_m->running_profile_list($sess_user_id);
		$this->load->view('frontend/votings/profile_list', $data);
    }
	
	public function do_vote($contest_id, $level_id, $participant_id) {
		$data = array();
		$user_id = $this->getSessionData('userID');
		
		$is_voted = $this->voting_m->is_already_voted($contest_id, $level_id, $participant_id, $user_id );
		if(!$is_voted){
			$new_data = array(
			  'contestID' => $contest_id,
			  'contestLevelID' => $level_id,
			  'participantID' => $participant_id,
			  'votedByUserID' => $user_id,
			  'ipAddress' => $this->get_client_id(),
			  'deviceID' => $this->get_device_id(),
			);
			$data['rs'] = $this->voting_m->store_vote($new_data);
		}
        redirect('votings');
    }
	
	
	
	
	
    
}

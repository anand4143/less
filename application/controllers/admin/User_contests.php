<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_contests extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('user_contest_m');
        // Session
        $this->load->library('session');
		//check login auth
		$this->auth();
    }

	public function index()
	{
		$data = array();
		//$data['contests'] = $this->user_contest_m->get_results(); 
		$this->load->view('admin/user_contests/list', $data);
    }
	
	public function get_user_contest_grid()
	{
		$data = array();

		$offset = $this->input->get('iDisplayStart', TRUE);
		$limit = $this->input->get('iDisplayLength', TRUE);
		$search = $this->input->get('sSearch', TRUE);

		$result = $this->user_contest_m->get_result('result', $search, $offset, $limit);
		$total_count = $this->user_contest_m->get_result('count', $search, $offset, $limit);
		if($result == false) {
			$data = [
				"iTotalRecords" => 0,
				"iTotalDisplayRecords" => 0,
				"aaData" => array() 
			];
		}
		else {
			$trans_arr = array();
			$sno = $offset + 1;
			foreach($result as $rs) {                                 
				$id = $rs['id'];   
				//$ccw_link = '<a id="assignWeightageIcon'.$criteria_id.'" href="javascript:void(0);" class="assignWeightage"  data-cid="'.$criteria_id.'"  data-type="'.$rs['criteria_type'].'" data-toggle="modal" data-target="#assignWeightageModal" data-loading="<i class=\'fa fa-spinner\' aria-hidden=\'true\'></i>" ><i class="glyphicon glyphicon-plus" title="Assign Weightage" aria-hidden="true"></i></a>';
				//$del_link = '<a id="delIcassign_weightageon'.$criteria_id.'" href="javascript:void(0);" onclick="removeCriteria(this)" class="removeCriteria"  data-cid="'.$criteria_id.'" data-loading="<i class=\'fa fa-spinner\' aria-hidden=\'true\'></i>"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>';
				$level_link = '<a href="javascript:void(0);" onclick="show_user_contest_level(this);" id="levelListingId'.$id.'" class="contest-level-list" data-id="'.$id.'" data-cid="'.$rs['contestID'].'" data-lid="'.$rs['levelID'].'" data-uname="'.$rs['name'].'" data-toggle="modal" data-target="#levelModal" title="View User Content Level List" >'.$rs['levelName'].' <i class="fa fa-list" aria-hidden="true"></i></a>';
				$trans_arr[] = (object)array(
					$sno,
					$rs['name'],
					$rs['email'],
					$rs['contestName'],
					$level_link,
				); 
				$sno++;                      
			}
			$data = [
				"iTotalRecords" => count($trans_arr),
				"iTotalDisplayRecords" => $total_count,
				"aaData" => $trans_arr 
			];
		}
		echo json_encode($data);
	}
	
	public function change_user_current_level($id, $contest_id, $level_id){
		$data = array();
		if($id > 0) {
			$res = $this->user_contest_m->update_user_current_level($id, $contest_id, $level_id);
			$msg = $res ? 'User Current Level Updated Successfully' : 'User Current Level Fail to Update';
			if($res){
				$data['resp_status'] = 'success';
				$data['resp_msg'] = $msg;
			} else {
				$data['resp_status'] = 'error';
				$data['resp_msg'] = $msg;	
			}
		} else {
			$data['resp_status'] = 'error';
			$data['resp_msg'] = 'Invalid Request';
		}
		echo json_encode($data);
	}
   
}
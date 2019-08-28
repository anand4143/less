<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Userranking extends MY_Controller {

    public function __construct(){
        // parent::__construct();
        // $this->load->helper('url');
        // $this->load->helper('form');
        // // Model
        // $this->load->model('users');
        // $this->load->model('judges');
        // $this->load->model('userranking_m');
        // // Session
        // $this->load->library('session');
        // $this->auth();
        

        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('user_contest_m');
        $this->load->model('userranking_m');
        // Session
        $this->load->library('session');
		//check login auth
		$this->auth();
    }

    public function index(){
        $data = array();
        $this->load->view('admin/userranking/index', $data);
    }

    public function get_user_contest_grid()
	{
        //echo "anand ";die('helloa');
		$data = array();

		$offset = $this->input->get('iDisplayStart', TRUE);
		$limit = $this->input->get('iDisplayLength', TRUE);
		$search = $this->input->get('sSearch', TRUE);

		$result = $this->userranking_m->get_result('result', $search, $offset, $limit);
		//print_r($result);
		$total_count = $this->userranking_m->get_result('count', $search, $offset, $limit);
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
				$smuleID = $rs['smuleID'];   
				//$ccw_link = '<a id="assignWeightageIcon'.$criteria_id.'" href="javascript:void(0);" class="assignWeightage"  data-cid="'.$criteria_id.'"  data-type="'.$rs['criteria_type'].'" data-toggle="modal" data-target="#assignWeightageModal" data-loading="<i class=\'fa fa-spinner\' aria-hidden=\'true\'></i>" ><i class="glyphicon glyphicon-plus" title="Assign Weightage" aria-hidden="true"></i></a>';
				//$del_link = '<a id="delIcassign_weightageon'.$criteria_id.'" href="javascript:void(0);" onclick="removeCriteria(this)" class="removeCriteria"  data-cid="'.$criteria_id.'" data-loading="<i class=\'fa fa-spinner\' aria-hidden=\'true\'></i>"><i class="glyphicon glyphicon-remove" aria-hidden="true"></i></a>';
                $level_link = $rs['levelName'];
                $report = '<a href="javascript:void(0);" onclick="show_user_contest_level(this);" id="levelListingId'.$smuleID.'" class="contest-level-list" data-smuleid="'.$smuleID.'" data-cid="'.$rs['contestID'].'" data-lid="'.$rs['levelID'].'" data-uname="'.$rs['name'].'" data-toggle="modal" data-target="#levelModal" title="View User Content Level List" ><i class="fa fa-list" aria-hidden="true"></i></a>';
				$trans_arr[] = (object)array(
					$sno,
					$rs['name'],
					$rs['email'],
					$rs['contestName'],
                    $level_link,
                    $report,
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


	public function get_contest_levels($smuleID){
		$data = array();
		//$rs = $this->level_m->get_results($contest_id); 
		$rs = $this->userranking_m->get_results($smuleID); 
		if($rs){
			$data['resp_status'] = 'success';
			$data['list'] = $rs;
			$data['num_rows'] = count($rs);
		} else {
			$data['resp_status'] = 'error';
			$data['list'] = array();
		}
		echo json_encode($data);
	}



}
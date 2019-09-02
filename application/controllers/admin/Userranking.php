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
		$this->load->model('contest_m');
		$this->load->model('level_m');
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

	public function contestList(){
		$data = array();
		$data['contests'] = $this->contest_m->get_results();
		$this->load->view('admin/userranking/contestList', $data);
	}

	public function levelList(){
		$data = array();
		echo $this->input->get('id');
		$rs = $this->level_m->get_results($this->input->get('id')); 
		//echo "<pre>";print_r($rs);
		$data['levelList'] = $rs;
		$this->load->view('admin/userranking/levelList', $data);
	}

	public function userLevelRanking(){
	
		$data = array();
		 $contestId = 	$this->input->get('cId');
		 $levelId 	=   $this->input->get('lId');
		$rs = $this->userranking_m->get_contest_participants($contestId,$levelId); 
		 //echo "<pre>";print_r($rs);
		// echo "<hr>";
		// echo "<li>".$a = is_array($rs);
		//die('dddd');
		if(is_array($rs)){

		
		$data['report'] = $rs;
		$sur = 0;$Taal=0; $Emotion_Feel=0;$Voice_Quality_Nasal=0;$Soothing_Level=0;$Copy_Or_Originality=0;$Variation=0;
		$Diction=0;$Murki_Vibratos=0;$Alaap=0;$Sargam=0;$Judge_Score=0;
		for($i=0; $i<count($rs); $i++){
			$totalSupport = $this->userranking_m->get_participants_support($rs[$i]->userID,$rs[$i]->contestId,$rs[$i]->levelId);
			$res1 = $this->userranking_m->get_participants_reports($rs[$i]->userID,$rs[$i]->contestId,$rs[$i]->levelId);
			//echo "<pre>totalSupport ";print_r($totalSupport);
			//echo "<pre>res1 ";print_r($res1);
			if(is_array($res1)){		
			
			$counterTotal = count($res1);			
			for($j=0; $j< count($res1); $j++){
				
				$sur 					= $sur + $res1[$j]->sur;
				$Taal 					= $Taal + $res1[$j]->Taal;
				$Emotion_Feel 			= $Emotion_Feel + $res1[$j]->Emotion_Feel;
				$Voice_Quality_Nasal 	= $Voice_Quality_Nasal + $res1[$j]->Voice_Quality_Nasal;
				$Soothing_Level 		= $Soothing_Level + $res1[$j]->Soothing_Level;
				$Copy_Or_Originality 	= $Copy_Or_Originality + $res1[$j]->Copy_Or_Originality;
				$Variation 				= $Variation + $res1[$j]->Variation;
				$Diction 				= $Diction + $res1[$j]->Diction;
				$Murki_Vibratos 		= $Murki_Vibratos + $res1[$j]->Murki_Vibratos;
				$Alaap 					= $Alaap + $res1[$j]->Alaap;
				$Sargam 				= $Sargam + $res1[$j]->Sargam;
				$Judge_Score 			= $Judge_Score + $res1[$j]->Judge_Score;
			
			}
		
		$averageSur = ($sur/$counterTotal) ;		
		$averageTaal = ($Taal/$counterTotal) ;
		$averageEmotion_Feel = ($Emotion_Feel/$counterTotal) ;
		$averageVoice_Quality_Nasal = ($Voice_Quality_Nasal/$counterTotal) ;
		$averageSoothing_Level = ($Soothing_Level/$counterTotal) ;
		$averageCopy_Or_Originality = ($Copy_Or_Originality/$counterTotal) ;
		$averageVariation = ($Variation/$counterTotal) ;
		$averageDiction = ($Diction/$counterTotal) ;
		$averageMurki_Vibratos = ($Murki_Vibratos/$counterTotal) ;
		$averageAlaap = ($Alaap/$counterTotal) ;
		$averageSargam = ($Sargam/$counterTotal) ;
		$averageJudge_Score= ($Judge_Score/$counterTotal) ;
		$data['report'][$i]->averageSur =  $averageSur;
		$data['report'][$i]->averageTaal =  $averageTaal;
		$data['report'][$i]->averageEmotion_Feel =  $averageEmotion_Feel;
		$data['report'][$i]->averageVoice_Quality_Nasal =  $averageVoice_Quality_Nasal;
		$data['report'][$i]->averageSoothing_Level =  $averageSoothing_Level;
		$data['report'][$i]->averageCopy_Or_Originality =  $averageCopy_Or_Originality;
		$data['report'][$i]->averageVariation =  $averageVariation;
		$data['report'][$i]->averageDiction =  $averageDiction;
		$data['report'][$i]->averageMurki_Vibratos =  $averageMurki_Vibratos;
		$data['report'][$i]->averageAlaap =  $averageAlaap;
		$data['report'][$i]->averageSargam =  $averageSargam;
		$data['report'][$i]->averageJudge_Score =  $averageJudge_Score;
		$data['report'][$i]->total_Score =  $averageSur + $averageTaal + $averageEmotion_Feel + $averageVoice_Quality_Nasal + $averageSoothing_Level + $averageCopy_Or_Originality + $averageVariation + $averageDiction + $averageMurki_Vibratos + $averageAlaap + $averageSargam + $averageJudge_Score ;
		$data['report'][$i]->totalSupport =  $totalSupport[0]->tRow/100;
		$data['report'][$i]->totalScore =  $data['report'][$i]->total_Score + $data['report'][$i]->totalSupport;
		
		

		}
	}
	}
	
	
    $data['report'] = $this->_sort_data($data['report']);
	$this->load->view('admin/userranking/userLevelRanking', $data);

	}
	
	private function _sort_data($arr){
		$len = count($arr);
		for ($i = ($len - 1); $i >= 0; $i--){
			for ($j = 1; $j <= $i; $j++){				
				if ($arr[$j]->totalScore > $arr[$j-1]->totalScore ){
				  $temp = $arr[$j];
				  $arr[$j] = $arr[$j-1];
				  $arr[$j-1] = $temp;
				} 
			}
		}
		return $arr;
	}

	
}


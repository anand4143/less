<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judge extends MY_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('users');
        $this->load->model('judges');
        $this->load->model('contest_m');
        $this->load->model('level_m');
        $this->load->library('session');
		$this->auth();
    }

    public function index(){
        $data = array();
        $res =  $this->judges->getJudgeList();
        //echo "<pre>";print_r($res);
       // if($res == false){
       // $this->set_flashdata("noJudge",'No Judge available in our system!');
        //}else{
            $data['judgeList'] = $res;
            $this->load->view('admin/judge/index',$data);
        //}
    }
    public function add(){
       $this->load->view('admin/judge/add');
    }
    public function saveJudge(){
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('email','user email','trim|required|valid_email|is_unique[master_judge.email]');
            $this->form_validation->set_rules('firstName', 'First name','trim|required|min_length[2]|max_length[128]');
            $this->form_validation->set_rules('lastName', 'Last name','trim|required|min_length[2]|max_length[128]');
            $this->form_validation->set_rules('password', 'Password', 'required');
            $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
            // $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
            // $this->form_validation->set_message('required', 'Enter %s');

            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/judge/add');
            }else{
                $userName = $this->input->post('userName');
                $email = $this->input->post('email');
                $firstName = $this->input->post('firstName');
                $lastName = $this->input->post('lastName');
                $lastName = $this->input->post('lastName');
                $aboutUser = $this->input->post('aboutUser');
                $password = md5($this->input->post('password'));
                $newData = array(
                    'userName'=> $userName,
                    'email'=> $email,
                    'firstName'=> $firstName,
                    'lastName'=> $lastName,
                    'password'=> $password,
                    'aboutJudge' => $aboutUser,
                    'isActive' => '1'
                );
                
                $result = $this->judges->saveJudge($newData);
                $message = $result ? 'Judge added successfully': 'something went wrong try later';
                $this->session->set_flashdata('Judgemessage',$message);
                if($result){
                    redirect('admin/judge');
                    //$this->load->view('admin/judge/index');
                }else{
                    $this->load->view('admin/judge/add');
                }
            }

        }else{
            $this->load->view('admin/judge');
        }
    }

    public function edit($id){
        $data = array();
        $data['user'] = $this->judges->getUser($id);
        //echo "<pre>";print_r($data);
        $this->load->view('admin/judge/edit',$data);
    }

    public function update($id){
        //echo "<pre>";print_r($this->input->post());die('dddddddddddd');
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('userName', 'User Name', 'trim|required');
            $this->form_validation->set_rules('email', 'User Email', 'trim|required');
            $this->form_validation->set_rules('firstName', 'first Name', 'trim|required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');

            if($this->form_validation->run() == FALSE){
                $data['user'] = $this->users->getUser($id);
                $this->load->view('admin/judge/edit',$data);
            }else{
                $userName   = $this->input->post('userName');
                $email      = $this->input->post('email');
                $firstName  = $this->input->post('firstName');
                $lastName   = $this->input->post('lastName');
                $aboutJudge   = $this->input->post('aboutJudge');
                $password = md5($this->input->post('password'));
                $userData   = array(
                    'userName'  => $userName,
                    'email'     => $email,
                    'firstName' => $firstName,
                    'lastName'  => $lastName,
                    'password'  => $password,
                    'aboutJudge'=> $aboutJudge
                );
                $result     = $this->judges->updateUser($id,$userData);
                $message    = $result ? 'User updated successfully' : 'Fail update!';
                $this->session->set_flashdata('updateMessage',$message);
                if($result){
                    redirect('admin/judge');
                }else{
                    $this->index();
                }
            }
        }else{
            $this->index();
        }
    }

    public function SongForJudge(){
       // echo $this->input->get('ids');
        $expolodeData = explode('-',$this->input->get('ids'));
       // print_r($expolodeData);
        $userID     = $expolodeData[0];
        $contestID  = $expolodeData[1];
        $levelID    = $expolodeData[2];
        $smuleID    = $expolodeData[3];
        $loginID = $this->getSessionData(); 
      
        $data = array(
            "judgeID"       => $loginID['id'],
            "userID"        => $userID,
            "contestID"     => $contestID,
            "levelsID"      => $levelID,
            "userSmuleID"   => $smuleID
        );
        $res = $this->judges->saveDataUserSmuleTable($data);
        print_r($res);
        
    }

    public function checkSongIsFreeOrNot(){
        $expolodeData = explode('-',$this->input->get('ids'));
       // print_r($expolodeData);
        $userID     = $expolodeData[0];
        $contestID  = $expolodeData[1];
        $levelID    = $expolodeData[2];
        $smuleID    = $expolodeData[3];
        $loginID    = $this->getSessionData(); 
      
        $data = array(
            "judgeID"       => $loginID['id'],
            "userID"        => $userID,
            "contestID"     => $contestID,
            "levelsID"      => $levelID,
            "userSmuleID"   => $smuleID
        );
        $res = $this->judges->checkSongIsFreeOrNot();
        //print_r($res);
        $check = 0;
        for($i = 0; $i < count($res); $i++){
            if( $smuleID == $res[$i]->userSmuleID){
                $check = 1;
            }
        }
        if($check==1)
            echo "not allow";
        else 
            echo "allow";
       
    }
    public function isJudgementParamExists(){
        $smuleID = $this->input->get('smuleID');
        $res = $this->judges->isJudgementParamExists($smuleID);
        print_r( json_encode($res));
    }

    public function saveJudgeParameters(){
        //print_r($this->input->get());
        $ids  = $this->input->get('ids');
        $expIds = explode('-',$ids);//userID+"-"+contestID+"-"+levelID+"-"+smuleID+"-"+judgeID
       $sur = $this->input->get('sur');
       $taal = $this->input->get('taal');
       $emotionfeel = $this->input->get('emotionfeel');
       $voicequalitynasal = $this->input->get('voicequalitynasal');
       $soothinglevel = $this->input->get('soothinglevel');
       $copyororiginality = $this->input->get('copyororiginality');
       $variation = $this->input->get('variation');
       $diction = $this->input->get('diction');
       $murkivibratos = $this->input->get('murkivibratos');
       $alaap = $this->input->get('alaap');
       $sargam = $this->input->get('sargam');
       $judgescore = $this->input->get('judgescore');
       $param1 = $this->input->get('param1');
       $param2 = $this->input->get('param2');
       $param3 = $this->input->get('param3');
       $param4 = $this->input->get('param4');
       $param5 = $this->input->get('param5');
       $data = array(
           'userID'=> $expIds[0],
           'contestID'=> $expIds[1],
           'levelsID'=> $expIds[2],
           'userSmuleID'=> $expIds[3],
           'judgeID'=> $expIds[4],
           'sur'=> $sur,
           'Taal' => $taal,
           'Emotion_Feel' => $emotionfeel,
           'Voice_Quality_Nasal' => $voicequalitynasal,
          'Soothing_Level' => $soothinglevel,
           'Copy_Or_Originality' => $copyororiginality,
           'Variation' => $variation,
           'Diction' =>  $diction,
             'Murki_Vibratos' => $murkivibratos,
           'Alaap' => $alaap,
           'Sargam' => $sargam,
           'Judge_Score' => $judgescore,
           'parameter1' => $param1,
           'parameter2' => $param2,
           'parameter3' => $param3,
           'parameter4' => $param4,
           'parameter5' => $param1
       );
       $saveResult = $this->judges->saveJudgeParametersDB($data);
      print_r($saveResult);
    }

    public function updateJudgeParameters(){
        //print_r($this->input->get());
        $ids  = $this->input->get('ids');
        $expIds = explode('-',$ids);//userID+"-"+contestID+"-"+levelID+"-"+smuleID+"-"+judgeID
       $sur = $this->input->get('sur');
       $taal = $this->input->get('taal');
       $emotionfeel = $this->input->get('emotionfeel');
       $voicequalitynasal = $this->input->get('voicequalitynasal');
       $soothinglevel = $this->input->get('soothinglevel');
       $copyororiginality = $this->input->get('copyororiginality');
       $variation = $this->input->get('variation');
       $diction = $this->input->get('diction');
       $murkivibratos = $this->input->get('murkivibratos');
       $alaap = $this->input->get('alaap');
       $sargam = $this->input->get('sargam');
       $judgescore = $this->input->get('judgescore');
       $param1 = $this->input->get('param1');
       $param2 = $this->input->get('param2');
       $param3 = $this->input->get('param3');
       $param4 = $this->input->get('param4');
       $param5 = $this->input->get('param5');
       $data = array(
           'userID'=> $expIds[0],
           'contestID'=> $expIds[1],
           'levelsID'=> $expIds[2],
           'userSmuleID'=> $expIds[3],
           'judgeID'=> $expIds[4],
           'sur'=> $sur,
           'Taal' => $taal,
           'Emotion_Feel' => $emotionfeel,
           'Voice_Quality_Nasal' => $voicequalitynasal,
          'Soothing_Level' => $soothinglevel,
           'Copy_Or_Originality' => $copyororiginality,
           'Variation' => $variation,
           'Diction' =>  $diction,
             'Murki_Vibratos' => $murkivibratos,
           'Alaap' => $alaap,
           'Sargam' => $sargam,
           'Judge_Score' => $judgescore,
           'parameter1' => $param1,
           'parameter2' => $param2,
           'parameter3' => $param3,
           'parameter4' => $param4,
           'parameter5' => $param1
       );
       $saveResult = $this->judges->updateJudgeParametersDB($data);
      print_r($saveResult);
    }

    public function assignJudgeToContest(){
        $data = array();
        $userdata = $this->judges->getJudgeListWithContestsAndLevel();
        $data['judgeListWithContestLevel'] = $userdata;
        //echo "<pre>";print_r($data);die('hello');
        for($i=0; $i<count($data['judgeListWithContestLevel']); $i++){
            $getJudgeId = $this->judges->checkJudgeAssignToContestLevels($data['judgeListWithContestLevel'][$i]->id,$data['judgeListWithContestLevel'][$i]->contestId,$data['judgeListWithContestLevel'][$i]->levelId);
            if($getJudgeId){
                $judgeFLName = $this->judges->getJudgeById($getJudgeId);
                $data['judgeListWithContestLevel'][$i]->judgeid = $getJudgeId;
                $data['judgeListWithContestLevel'][$i]->judgeName = $judgeFLName->firstName.' '.$judgeFLName->lastName;
            }else{
                $data['judgeListWithContestLevel'][$i]->judgeid = 0;
            }
        }

       
        $res =  $this->judges->getJudgeList();        
        $data['judgeList'] = $res;
        
        $data['contests'] = $this->contest_m->get_results();
        //echo "<pre>";print_r($data);die('hello');
        $this->load->view('admin/judge/judgeContest',$data);
    }
    public function getLevels(){
        $contestId = $this->input->get('id');
        $levels = $this->level_m->getLevelByContestId($contestId);
        //echo "<pre>";echo "<li>====> ".count($levels);die;
        echo '<option value="">Select Levels</option>';
        if(!$levels){
            echo '<option value="">Levels not available</option>';
        }else{
            for($i = 0; $i < count($levels); $i++){
                echo '<option value="'.$levels[$i]->id.'">'.$levels[$i]->levelName.'</option>';
            }
        }
    
    }

    public function assignJudge(){
        //echo $this->input->get('ids');
        $expolodeData = explode('-',$this->input->get('ids'));
        //print_r($expolodeData);
         $judgeID     = $expolodeData[0];
         $contestID  = $expolodeData[1];
         $levelID    = $expolodeData[2];
         
        $res = $this->judges->saveTableJudgeContestLevels($judgeID,$contestID,$levelID);
        print_r($res);
    }
    

    

    public function delete(){
        $id     = $this->input->get('id');
		$res    = $this->judges->deleteUserById($id);
		$msg    = $res ? 'Contest Removed Successfully' : 'Contest Fail to Remove';
		echo $msg;
		
		
	}
}


?>
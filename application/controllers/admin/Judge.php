<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judge extends MY_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('users');
        $this->load->model('judges');
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
            $this->form_validation->set_rules('email','user email','trim|required|valid_email');
            $this->form_validation->set_rules('firstName', 'First name','trim|required|min_length[2]|max_length[128]');
            $this->form_validation->set_rules('lastName', 'Last name','trim|required|min_length[2]|max_length[128]');
            if($this->form_validation->run() == FALSE){
                $this->load->view('admin/judge/add');
            }else{
                $userName = $this->input->post('userName');
                $email = $this->input->post('email');
                $firstName = $this->input->post('firstName');
                $lastName = $this->input->post('lastName');
                $aboutUser = $this->input->post('aboutUser');
                $newData = array(
                    'userName'=> $userName,
                    'email'=> $email,
                    'firstName'=> $firstName,
                    'lastName'=> $lastName,
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
                $userData   = array(
                    'userName'  => $userName,
                    'email'     => $email,
                    'firstName' => $firstName,
                    'lastName'  => $lastName,
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
        $loginID = $this->getSessionData(); 
      
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
    

    public function delete(){
        $id     = $this->input->get('id');
		$res    = $this->judges->deleteUserById($id);
		$msg    = $res ? 'Contest Removed Successfully' : 'Contest Fail to Remove';
		echo $msg;
		
		
	}
}


?>
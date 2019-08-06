<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        $this->load->model('judges');
        $this->load->model('contest_m');
        $this->load->model('level_m');
        // Session
        $this->load->library('session');
		$this->auth();
}

    public function index(){
        $usersList = $this->users->getUserList();
        $data['userList'] = $usersList;
        $this->load->view('admin/users/userList',$data);
    }

    public function edit($id){
        $data = array();
        $data['user'] = $this->users->getUser($id);
        //echo "<pre>";print_r($data);die('hiiiii');
        $this->load->view('admin/users/editUser',$data);
      
    }

    public function update($id){
        //echo "<pre>";print_r($this->input->post());die('edit funcjkkjtions') ;
        if($this->input->post()){
            $this->load->library('form_validation');
            $this->form_validation->set_rules('userName', 'User Name', 'trim|required');
            $this->form_validation->set_rules('email', 'User Email', 'trim|required');
            $this->form_validation->set_rules('firstName', 'first Name', 'trim|required');
            $this->form_validation->set_rules('lastName', 'Last Name', 'trim|required');

            if($this->form_validation->run() == FALSE){
                $data['user'] = $this->users->getUser($id);
                $this->load->view('admin/users/editUser',$data);
            }else{
                $userName   = $this->input->post('userName');
                $email      = $this->input->post('email');
                $firstName  = $this->input->post('firstName');
                $lastName   = $this->input->post('lastName');
                $userData   = array(
                    'userName'  => $userName,
                    'email'     => $email,
                    'firstName' => $firstName,
                    'lastName'  => $lastName
                );
                $result     = $this->users->updateUser($id,$userData);
                $message    = $result ? 'User updated successfully' : 'Fail update!';
                $this->session->set_flashdata('updateMessage',$message);
                if($result){
                    redirect('admin/user');
                }else{
                    $this->index();
                }
            }
        }else{
            $this->index();
        }
    }

    public function assignUserToJudges(){
        $data = array();
        $userdata = $this->users->getUserListWithContestsAndLevel();
        $data['userListWithContestLevel'] = $userdata;
        $judgeId = array();

        for($i=0; $i<count($data['userListWithContestLevel']); $i++){
            $getJudgeId = $this->judges->checkUserAssignToJudge($data['userListWithContestLevel'][$i]->id,$data['userListWithContestLevel'][$i]->contestId,$data['userListWithContestLevel'][$i]->levelId);
            if($getJudgeId){
                $judgeFLName = $this->judges->getJudgeById($getJudgeId);
                $data['userListWithContestLevel'][$i]->judgeid = $getJudgeId;
                $data['userListWithContestLevel'][$i]->judgeName = $judgeFLName->firstName.' '.$judgeFLName->lastName;
            }else{
                $data['userListWithContestLevel'][$i]->judgeid = 0;
            }
        }
        $judgeList = $this->judges->getJudgeList();
        $data['judgeList'] = $judgeList;
        $this->load->view('admin/users/assignUserToJudges',$data);
    }

    public function assignJudge(){
        $userData = $this->input->get('userData');
        $explodeData = explode('-', $userData);//judgeId+'-'+userId+'-'+contestId+'-'+levelId
        //print_r($explodeData);
        $data = array(
            'judge_id'      => $explodeData[0],
            'user_id'       => $explodeData[1],
            'contest_id'    => $explodeData[2],
            'levels_id'     => $explodeData[3]
        );
        $result = $this->users->insertDataUsersJudgesTable($data);
        if($result){
            $res = $this->judges->getJudgeById($explodeData[0]);
            print_r($res);
        }else{
            echo 'fail';
        }
    }

    // public function getLevels(){
    //     $contestId = $this->input->get('id');
    //     $levels = $this->level_m->getLevelByContestId($contestId);
    //     //echo "<pre>";echo "<li>====> ".count($levels);die;
    //     echo '<option value="">Select Levels</option>';
    //     if(!$levels){
    //         echo '<option value="">Levels not available</option>';
    //     }else{
    //         for($i = 0; $i < count($levels); $i++){
    //             echo '<option value="'.$levels[$i]->id.'">'.$levels[$i]->levelName.'</option>';
    //         }
    //     }
    
    // }
}

?>
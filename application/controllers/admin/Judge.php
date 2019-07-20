<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judge extends MY_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('users');
        $this->load->library('session');
		$this->auth();
    }

    public function index(){
        $data = array();
        $res =  $this->users->getJudgeList();
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
                    'aboutUser' => $aboutUser,
                    'isActive' => '1',
                    'userType' => '2'
                );
                $result = $this->users->saveJudge($newData);
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
        $data['user'] = $this->users->getUser($id);
        //echo "<pre>";print_r($data);
        $this->load->view('admin/judge/edit',$data);
    }

    public function update($id){
        //echo "<pre>";print_r($this->input->post());
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
                    redirect('admin/judge');
                }else{
                    $this->index();
                }
            }
        }else{
            $this->index();
        }
    }
    

    public function delete(){
        $id     = $this->input->get('id');
		$res    = $this->users->deleteUserById($id);
		$msg    = $res ? 'Contest Removed Successfully' : 'Contest Fail to Remove';
		echo $msg;
		
		
	}
}


?>
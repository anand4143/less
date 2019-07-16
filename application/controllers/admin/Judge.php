<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Judge extends MY_Controller{
    public function __construct(){
        parent:: __construct();
        $this->load->helper('url');
        $this->load->model('users');
        $this->load->library('session');
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
}


?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
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
}

?>
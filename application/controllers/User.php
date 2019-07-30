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
    }

    public function index(){}
    
    public function dashboard(){
        $email = $this->input->post('email');
        $password =  md5($this->input->post('password'));
        $isValid = $this->users->isValidate($email,$password);
        if($isValid){            
            $userData = array(
                'userId'    => $isValid['id'],
                'email'     => $isValid['email'],
                'firstName' => $isValid['firstName'],
                'lastName'  => $isValid['lastName'],
                'userType'  => $isValid['userType'],
                'logged_in' => TRUE
            );        
            $this->setSessionData($userData);
        
            redirect('user/landing');
        }else{
           
                $this->session->set_flashdata('error',"Invalid username or password!");
                redirect('login');
        }
    }
    public function landing(){
        ///echo 'anand ';
        //redirect('frontend/users/lan');
        $this->load->view('frontend/users/landing');
    }

    public function profile(){
        $loginUser = $this->getSessionData();
       // echo "<pre>";print_r($loginUser['userId']);
        $userData['user'] = $this->users->getUser($loginUser['userId']);
        echo '<pre>';print_r($userData);
        $this->load->view('frontend/users/profile');
    }

    


}


?>
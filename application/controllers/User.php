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
                'userID'    => $isValid['id'],
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
        $userData['sessionData'] = $this->getSessionData();
        $this->load->view('frontend/users/landing',$userData);
    }

    public function profile(){
        $userData['sessionData'] = $this->getSessionData();
       // echo "<pre>";print_r($loginUser['userId']);
        $userData['user'] = $this->users->getUser( $userData['sessionData']['userId']);
        //echo '<pre>';print_r($userData);die;
        $this->load->view('frontend/users/profile',$userData);
    }

    public function register(){
        echo "<pre>";print_r($this->input->post());
        $data = array(
            'firstName' => $this->input->post('firstName'),
            'lastName' => $this->input->post('lastName'),
            'email' => $this->input->post('email'),
            'password' => md5($this->input->post('password')),
            'gender' => $this->input->post('gender'),
            'mobileno' => $this->input->post('mobileno'),
            'address' => $this->input->post('address'),
            'cityID' => $this->input->post('city'),
            'state' => $this->input->post('state'),
            'pincode' => $this->input->post('pincode')
        );
        $result = $this->users->registerUser($data);
        if($result){
            $this->session->set_flashdata('registerSuccess',"Please login with your credential");
            redirect('login');
        }else{
            $this->session->set_flashdata('registerError',"Something went wrong. Please try later");
            redirect('login');
        }
    }

    


}


?>
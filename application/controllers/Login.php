<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        // Session
        $this->load->library('session');
    }

	public function index()
	{
		$this->load->view('frontend/login/login');
  }

    public function login() {
       $username = $this->input->post('username');
       $password = md5($this->input->post('password'));
       
       $isValid = $this->users->isValidate($username,$password, array(2, 3));
       var_dump($isValid );die;
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
       } else {
            $this->session->set_flashdata('error',"Invalid username or password!");
            redirect('login');
       }
      
    }

    public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('userSession');
        $this->session->sess_destroy();
        redirect('login');
    }

    
}

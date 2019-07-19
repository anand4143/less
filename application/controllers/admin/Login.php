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
		$this->load->view('admin/login/admin_login');
    }

    public function login(){
       $username = $this->input->post('username');
       $password = md5($this->input->post('password'));
       
       $isValid = $this->users->isValidate($username,$password);
       
       if($isValid){
           $userData = array(
            'email'     => $isValid['email'],
            'firstName' => $isValid['firstName'],
            'lastName'  => $isValid['lastName'],
            'userType'  => $isValid['userType'],
            'logged_in' => TRUE
        );        
        $this->setSessionData($userData);
      
        redirect('admin/dashboard/landing');
        //redirect(site_url() . 'admin/dashboard');
       }else{
            $this->session->set_flashdata('error',"Invalid username or password!");
            redirect('admin/login');
       }
      
    }

    public function logout(){
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('userSession');
        $this->session->sess_destroy();
        redirect('admin/login');
    }

    

    
}

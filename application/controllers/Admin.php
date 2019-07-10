<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {

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
		$this->load->view('admin/admin_login');
    }

    public function login(){
       $username = $this->input->post('username');
       $password = md5($this->input->post('password'));
       
       $isValid = $this->users->isValidate($username,$password);
       //print_r($isValid);
       if($isValid){
           $userData = array(
            'email'     => $isValid['email'],
            'firstName' => $isValid['firstName'],
            'lastName'  => $isValid['lastName'],
            'userType'  => $isValid['userType'],
            'logged_in' => TRUE
        );        
        $this->setSessionData($userData);
      
        redirect('admin/dashboard');
        //redirect(site_url() . 'admin/dashboard');
       }else{
            $this->session->set_flashdata('error',"Invalid username or password!");
            //redirect(base_url() . 'admin/index');
       }
      
    }

    public function dashboard(){
        $currentUser = $this->getSessionData();
        $logInUserFirstName = $currentUser['firstName'];
        $logInUserLastName = $currentUser['lastName'];
        $this->load->view('admin/dashboard',$logInUserFirstName);
    }

    public function logout(){
        $this->session->unset_userdata('userSession');
        $this->session->sess_destroy();
        redirect('admin/index');
    }
}

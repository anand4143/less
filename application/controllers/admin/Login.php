<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        $this->load->model('judges');
        // Session
        $this->load->library('session');
    }

	public function index()
	{
		$this->load->view('admin/login/admin_login');
    }

    public function login(){
        //echo "<pre>";print_r($this->input->post());die("i m here");
        if($this->input->post('loginType')==2){
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            $isValid = $this->judges->isValidate($username,$password);
            //echo "<pre>";print_r($isValid);die('login cont');
            if($isValid){
                $userData = array(
                    'id' => $isValid['id'],
                    'email'     => $isValid['email'],
                    'firstName' => $isValid['firstName'],
                    'lastName'  => $isValid['lastName'],
                    'userType'  => $isValid['userType'],
                    'logged_in' => TRUE
                );        
                $this->setSessionData($userData);
            
                redirect('admin/dashboard/judgelanding');
                //redirect(site_url() . 'admin/dashboard');
            }else{
                    $this->session->set_flashdata('error',"Invalid username or password!");
                    redirect('admin/login');
            }

        }else if($this->input->post('loginType')==1){
            $username = $this->input->post('username');
            $password = md5($this->input->post('password'));
            
            $isValid = $this->users->isValidate($username,$password, 1);
            //echo "<pre>";print_r($isValid);die("i m her22222e");
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
        }else{
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

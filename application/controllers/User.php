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
		//echo "<pre>";print_r($_SESSION);die;
        //redirect('frontend/users/lan');
        $userData['sessionData'] = $this->getSessionData();
        $this->load->view('frontend/users/landing',$userData);
    }

    public function profile(){
		$this->load->model('contest_m');
		
		$data = array();
        $data['sessionData'] = $this->getSessionData();
       // echo "<pre>";print_r($loginUser['userID']);
        $data['user'] = $this->users->getUser( $data['sessionData']['userID']);
        //echo '<pre>';print_r($userData);die;
		
		
		$data['contests'] = $this->contest_m->current_contest_list($data['sessionData']['userID']);
        $this->load->view('frontend/users/profile', $data);
    }

    public function register(){
		//echo "<pre>";print_r($this->input->post());
		$this->load->library('form_validation');
		$this->form_validation->set_rules('firstName', 'First Name', 'required|trim');
		$this->form_validation->set_rules('lastName', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
		
		$this->form_validation->set_rules('gender', 'Gender', 'required');
		$this->form_validation->set_rules('mobileno', 'Mobile No.', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('pincode', 'Pincode', 'required');
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
		if($this->form_validation->run()) {
			$data = array(
				'firstName' => $this->input->post('firstName'),
				'lastName' => $this->input->post('lastName'),
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password')),
				'userType' => 2,
				'gender' => $this->input->post('gender'),
				'mobileno' => $this->input->post('mobileno'),
				'address' => $this->input->post('address'),
				'cityID' => $this->input->post('city'),
				'state' => $this->input->post('state'),
				'pincode' => $this->input->post('pincode')
			);
			$result = $this->users->registerUser($data);
			if($result) {
				$this->session->set_flashdata('registerSuccess',"Please login with your credential");
				redirect('login');
			} else {
				$this->session->set_flashdata('registerError',"Something went wrong. Please try later");
				redirect('login');
			}
		}else {
			$userData['states'] = $this->users->getState();
			$this->load->view('frontend/login/registration',$userData);
		}	
    }

    


}


?>
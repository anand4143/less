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
        $isValid = $this->users->isValidate($email,$password, 2);
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
        $this->auth();
        $userData['sessionData'] = $this->getSessionData();
        $this->load->view('frontend/users/landing',$userData);
    }

    public function profile(){
		$this->load->model('contest_m');
		
		$data = array();
        $data['sessionData'] = $this->getSessionData();
       // echo "<pre>";print_r($loginUser['userID']);
        $data['user'] = $this->users->getUser( $data['sessionData']['userID']);
        $data['userProfileImage'] = $this->users->getUserProfileImage( $data['sessionData']['userID']);
       // echo '<pre>';print_r($data);die;
		
		
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
	
	public function voter_register(){
		$resp_data = array();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('su_fname', 'First Name', 'required|trim');
		$this->form_validation->set_rules('su_lname', 'Last Name', 'required|trim');
		$this->form_validation->set_rules('su_email', 'Email Address', 'required|trim|valid_email|is_unique[users.email]');
		$this->form_validation->set_rules('su_password', 'Password', 'required');
        $this->form_validation->set_rules('su_confirm_password', 'Confirm Password', 'required|matches[su_password]');
		
		$this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');
 
		if($this->form_validation->run()) {
			$data = array(
				'firstName' => $this->input->post('su_fname'),
				'lastName' => $this->input->post('su_lname'),
				'email' => $this->input->post('su_email'),
				'password' => md5($this->input->post('su_password')),
				'userType' => 3
			);
			$result = $this->users->registerUser($data);
			if($result) {
				$resp_data['resp_status'] = 'success';
				$resp_data['resp_msg'] = 'Registered successfully, Please login with your credential';
			} else {
				$resp_data['resp_status'] = 'error';
				$resp_data['resp_msg'] = 'Something went wrong. Please try later';
			}
		} else {
			$resp_data['resp_status'] = 'errors';
			foreach($_POST as $key => $value){
				$resp_data['messages'][$key] = form_error($key);
			}
		}
		echo json_encode($resp_data);
	}
	

	public function forgetPassword(){
		$data = array();
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
		//$this->form_validation->set_rules('oldpassword', 'Old password', 'trim|required');
		$this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('confirmPassword', 'Confirm Password', 'required|matches[password]');
		if($this->form_validation->run() == FALSE){		
			$this->load->view('frontend/login/forgetpassword');
		}else{
			//echo "<pre>";
			//print_r($this->input->post());
			$email = $this->input->post('email');
			//$email = $this->input->post('oldpassword');
			$password = $this->input->post('password');
			$confirmPassword = $this->input->post('confirmPassword');
			if($password == $confirmPassword){
				$password = md5($this->input->post('password'));
				$data = array(
					"email" => $email,
					"password" => $password
				);
				$result = $this->users->forgetPassword($data);
				//print($result) ;die('dddd');
				if($result) {
					$this->session->set_flashdata('changePasswordSuccess',"Your password change successfully");
					redirect('login');
				} else {
					$this->session->set_flashdata('Error',"Something went wrong. Please try later");
					//redirect('login');
					redirect('login/forgetpassword');
					//$this->load->view('frontend/login/forgetpassword');
				}
			}else{
				echo "success";
			}
			

			
		}
	}

    public function profileImage(){
        $config['upload_path']="./assets/profileImages/";
        $config['allowed_types']='gif|jpg|png';
		$this->load->library('upload',$config);
		//print_r( $this->upload->do_upload());
		if($this->upload->do_upload('file')){
			$data = array('upload_data' => $this->upload->data());
			$data['sessionData'] 	= $this->getSessionData();
			$userid 				= $data['sessionData']['userID'];
			$uploadType 			= $this->input->post('imgtype');
			$imagename				= $data['upload_data'] ['file_name'];
			$fullpath				= $data['upload_data'] ['full_path'];
			echo $result = $this->users->uploadProfileImage($uploadType,$imagename,$fullpath,$userid);

				 //store the file info
				

	 }
	}
    public function do_upload(){
		$uploadType 			= $this->input->post('imgtype');
		if($uploadType == 'P'){
			$config['upload_path']="./assets/profileImages/";
			$config['allowed_types']='gif|jpg|png';
			$this->load->library('upload',$config);
			//print_r( $this->upload->do_upload());
			if($this->upload->do_upload('file')){
				$data = array('upload_data' => $this->upload->data());
				$data['sessionData'] 	= $this->getSessionData();
				$userid 				= $data['sessionData']['userID'];
				$uploadType 			= $this->input->post('imgtype');
				$imagename				= $data['upload_data'] ['file_name'];
				$fullpath				= $data['upload_data'] ['full_path'];
				echo $result = $this->users->uploadProfileImage($uploadType,$imagename,$fullpath,$userid);
		 }
		}else{
			$config['upload_path']="./assets/profileImages/";
			$config['allowed_types']='gif|jpg|png';
			$this->load->library('upload',$config);
			if($this->upload->do_upload('file')){
				$image_data = $this->upload->data();
				//print_r($image_data);
				$this->resize_image($image_data);
			}
		}
		
				
	}




	public function resize_image($image_data){
		$this->load->library('image_lib');
		$w = $image_data['image_width']; // original image's width
		$h = $image_data['image_height']; // original images's height
	
		$n_w = 1140; // destination image's width
		$n_h = 356; // destination image's height
	
		$source_ratio = $w / $h;
		$new_ratio = $n_w / $n_h;
		if($source_ratio != $new_ratio){
	
			$config['image_library'] = 'gd2';
			$config['source_image'] = $image_data['full_path'];
			$config['maintain_ratio'] = FALSE;
			if($new_ratio > $source_ratio || (($new_ratio == 1) && ($source_ratio < 1))){
				$config['width'] = $w;
				$config['height'] = round($w/$new_ratio);
				$config['y_axis'] = round(($h - $config['height'])/2);
				$config['x_axis'] = 0;
	
			} else {
	
				$config['width'] = round($h * $new_ratio);
				$config['height'] = $h;
				$size_config['x_axis'] = round(($w - $config['width'])/2);
				$size_config['y_axis'] = 0;
	
			}
	
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
			$this->image_lib->clear();
		}
		$config['image_library'] = 'gd2';
		$config['source_image'] = $image_data['full_path'];
		//$config['new_image'] = './uploads/new/resized_image.jpg';
		$config['new_image'] = './assets/profileImages/crop/'.$image_data['file_name'];
		$config['maintain_ratio'] = TRUE;
		$config['width'] = $n_w;
		$config['height'] = $n_h;
		$this->image_lib->initialize($config);
	
		if (!$this->image_lib->resize()){
	
			echo $this->image_lib->display_errors();
	
		} else {
			$data['sessionData'] 	= $this->getSessionData();
			$userid 				= $data['sessionData']['userID'];
			$uploadType 			= $this->input->post('imgtype');
			$imagename				= $image_data['file_name'];
			$fullpath				= $image_data['full_path'];
			return $result = $this->users->uploadProfileImage($uploadType,$imagename,$fullpath,$userid);
			//echo "done";
	
		}
	}



}


?>
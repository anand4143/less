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
       
       $isValid = $this->users->isValidate($username,$password, 2);
       
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
	
	public function voter_login() {
	   $resp = array();
	   
	   if ($this->input->is_ajax_request()) {
		   $email = trim($this->input->post('email'));
		   $password = md5(trim($this->input->post('password')));
		   
		   $isValid = $this->users->isValidate($email, $password, 3);
		   
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
			   //redirect('votings');
			  $resp['resp_status'] = 'success';
			  $resp['resp_msg'] = 'Login Successfully';
		   } else {
				 $resp['resp_status'] = 'error';
				 $resp['resp_msg'] = 'Invalid username or password!';
				//redirect('login');
		   }
	   } else {
		  $resp['resp_status'] = 'Error';
		  $resp['resp_msg'] = 'Invalid Request!';
	   }
       echo json_encode($resp);
    }
	
	public function google_login(){
		require_once APPPATH.'third_party/src/Google_Client.php';
		require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
		
		//Call Google API
		$gClient = new Google_Client();
		$gClient->setApplicationName(GOOGLE_APP_NAME);
		$gClient->setClientId(GOOGLE_CLIENT_ID);
		$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
		$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code'])) {
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
			header('Location: ' . filter_var(GOOGLE_REDIRECT_URL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])){
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
            $guser_info = $google_oauthV2->userinfo->get();
			$rs = $this->users->get_user_detail_by_email($guser_info['email'], 3);
			if($rs) {
				$userData = array(
					'userID'    => $rs->id,
					'email'     => $rs->email,
					'firstName' => $rs->firstName,
					'lastName'  => $rs->lastName,
					'userType'  => $rs->userType,
					'logged_in' => TRUE
				);			
			} else {
			    $new_data = array(
					'firstName' => $guser_info['given_name'],
					'lastName' => $guser_info['family_name'],
					'email' => $guser_info['email'],
					'password' => md5('123456'),
					'userType' => 3,
					'gender' => isset($guser_info['gender']) ? $guser_info['gender'] : '',
					'isPasswordSet' => 0,
					'mobileno' => '',
					'address' => '',
					'cityID' => 0,
					'state' => 0,
					'pincode' => ''
			   );
			   $user_id = $this->users->registerUser($new_data);
			   $userData = array(
					'userID'    => $user_id,
					'email'     => $guser_info['email'],
					'firstName' => $guser_info['given_name'],
					'lastName'  => $guser_info['family_name'],
					'userType'  => 3,
					'logged_in' => TRUE
				);
			}
			$this->setSessionData($userData);
			redirect('votings');
        } else {
            $url = $gClient->createAuthUrl();
		    header("Location: $url");
            exit;
        }
	}
	
	public function fb_login(){
		require_once  APPPATH. 'third_party/Facebook/autoload.php'; // change path as needed

		$fb = new \Facebook\Facebook([
		  'app_id' => FB_APP_ID,
		  'app_secret' => FB_SECRET,
		  'default_graph_version' => 'v2.10',
		  //'default_access_token' => '{access-token}', // optional
		]);
		
		$helper = $fb->getRedirectLoginHelper();
		$accessToken = $helper->getAccessToken(); 
        if(empty($accessToken)){
			$permissions = ['email']; // Optional permissions for more permission you need to send your application for review
			$loginUrl = $helper->getLoginUrl(FB_REDIRECT_URL, $permissions);
			header("location: ".$loginUrl);
			exit;
		}else{
		
			$helper = $fb->getRedirectLoginHelper();  
	  
			try {  
			  $accessToken = $helper->getAccessToken();  
			} catch(Facebook\Exceptions\FacebookResponseException $e) {  
			  // When Graph returns an error  
			  
			  echo 'Graph returned an error: ' . $e->getMessage();  
			  exit;  
			} catch(Facebook\Exceptions\FacebookSDKException $e) {  
			  // When validation fails or other local issues  
			 
			  echo 'Facebook SDK returned an error: ' . $e->getMessage();  
			  exit;  
			}  
			 
			 
			try {
			  // Get the Facebook\GraphNodes\GraphUser object for the current user.
			  // If you provided a 'default_access_token', the '{access-token}' is optional.
			  $response = $fb->get('/me?fields=id,name,email,first_name,last_name', $accessToken->getValue());
			//  print_r($response);
			} catch(Facebook\Exceptions\FacebookResponseException $e) {
			  // When Graph returns an error
			  echo 'ERROR: Graph ' . $e->getMessage();
			  exit;
			} catch(Facebook\Exceptions\FacebookSDKException $e) {
			  // When validation fails or other local issues
			  echo 'ERROR: validation fails ' . $e->getMessage();
			  exit;
			}
			$me = $response->getGraphUser();
		}
	}

    public function logout(){
		$uset_type = $this->getSessionData('userType');
		$this->session->unset_userdata('logged_in');
		$this->session->unset_userdata('userSession');
        $this->session->sess_destroy();
		
		if (isset($_SESSION['token'])){
			require_once APPPATH.'third_party/src/Google_Client.php';
			require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
			$gClient = new Google_Client();
			$gClient->setApplicationName(GOOGLE_APP_NAME);
			$gClient->setClientId(GOOGLE_CLIENT_ID);
			$gClient->setClientSecret(GOOGLE_CLIENT_SECRET);
			$gClient->setRedirectUri(GOOGLE_REDIRECT_URL);
			$gClient->revokeToken();
		}
		
		if($uset_type == 3){
			redirect('home');
		}
        redirect('login');
	}
	
	public function forgetPassword(){
		//$this->load->view('frontend/login/login');
		$this->load->view('frontend/login/forgetpassword');
	}

    
}

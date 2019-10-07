<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        $this->load->model('judges');
        // Session
        $this->load->library('session');
		$this->auth();
    }

	

    public function index(){
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
      
        redirect('admin/Dashboard/landing');
        //redirect(site_url() . 'admin/dashboard');
       }else{
            $this->session->set_flashdata('error',"Invalid username or password!");
            //redirect(base_url() . 'admin/index');
       }
      
    }

    public function landing(){
        $currentUser = $this->getSessionData(); 
        //echo "<pre>";print_r($currentUser);die('here');      
        $data['session'] = $currentUser;
        $usersList = $this->users->getUserList();
        $data['userList'] = $usersList;
        //echo "<pre>";print_r($data['userList']);
        $this->load->view('admin/users/userList',$data);
        
    }
    public function judgelanding(){
        $currentUser = $this->getSessionData(); 
       // echo "<pre>";print_r($currentUser);die('here');      
        $data['session'] = $currentUser;
        $data['allUserSongListOfRunningContests'] = $this->judges->allUserSongListOfRunningContests();
    //     $data['songAssignToJudge'] = $this->judges->getAllSongAssignToJudges();
    //     echo "<pre>";print_r($data);
    //    die('judge landing');
        $this->load->view('admin/judge/landing',$data);
        
    }

    public function searchForId($id, $array) {
        foreach ($array as $key => $val) {
            if ($val['uid'] === $id) {
                return $key;
            }
        }
        return null;
     }

    

    public function editUser(){ 
        $data[] = array();
        $currentUser = $this->getSessionData();       
        $data['session'] = $currentUser;    
        // print_r($this->data);
        $this->load->view('admin/editUser',$data);
    }
}

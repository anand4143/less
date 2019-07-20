<?php
    class MY_Controller extends CI_Controller{
		public function __construct(){
			parent::__construct();
		}
		
        public function setSessionData($userData){
            //$this->session->set_userdata('userSession',$userData);  
		    //$this->session->set_userdata('logged_in', TRUE);  	
		    $this->session->set_userdata($userData);
        }
        public function getSessionData(){
            //return $this->session->userdata('userSession');
		    return $this->session->userdata();			
        }
		
		public function auth(){
			if(!$this->session->userdata('userSession') || $this->session->userdata('logged_in') !== TRUE){
			  $segment = $this->uri->segment(1);
			  if($segment == 'admin'){
				  redirect('admin');
			  }
			  redirect('login');
			}
		}
    }

?>
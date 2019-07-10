<?php
    class MY_Controller extends CI_Controller{

        public function setSessionData($userData){
            $this->session->set_userdata('userSession',$userData);          
        }
        public function getSessionData(){
            return $this->session->userdata('userSession');           
        }
    }

?>
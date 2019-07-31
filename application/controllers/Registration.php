<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        // Session
        $this->load->library('session');
    }

    public function index(){
        $userData['states'] = $this->users->getState();
        //echo "<pre>";print_r($userData);
        $this->load->view('frontend/login/registration',$userData);
    }

    public function fetchCity(){
        $stateId = $this->input->post('stateId');
        $cities = $this->users->getCity($stateId);
            //echo "<pre>";echo "<li>====> ".count($cities);die;
            //echo '<option value="">Select Levels</option>';
            if(!$cities){
                echo '<option value="">City not available</option>';
            }else{
                for($i = 0; $i < count($cities); $i++){
                    echo '<option value="'.$cities[$i]->id.'">'.$cities[$i]->name.'</option>';
                }
            }
    }


}

    ?>
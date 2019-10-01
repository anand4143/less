<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AdminFeedback extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('users');
        $this->load->model('feedback_m');
        // Session
        $this->load->library('session');
    }

    public function index(){
        $data['feedbacks'] = $this->feedback_m->getFeedback();
        $this->load->view('admin/feedback/index',$data);
    }

    



   


}
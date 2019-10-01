<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Feedback extends MY_Controller {
    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('feedback_m');
        // Session
        $this->load->library('session');
    }

    public function index(){
        $this->load->view('frontend/feedback/index');
    }

    public function save(){
        //echo "<pre>";print_r($this->input->post());die;
        $this->load->library('form_validation');
        $this->form_validation->set_rules('fullname', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email address', 'required|trim|valid_email');
        $this->form_validation->set_rules('mobileno', 'Mobile no', 'required|trim');
        $this->form_validation->set_rules('comment', 'Comment', 'required|trim');


        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');
        $this->form_validation->set_message('required', 'Enter %s');

        if($this->form_validation->run()) {
            $data = array(
                'fullname' => $this->input->post('fullname'),
				'email' => $this->input->post('email'),
                'mobileno' => $this->input->post('mobileno'),
                'comment' => $this->input->post('comment'),
            );
            $result = $this->feedback_m->save($data);
            if($result){
                $this->session->set_flashdata('Success',"We will contact as soon as possible");
                redirect('feedback');
            }else{
                $this->session->set_flashdata('error',"Something went wrong. Please try later");
                redirect('feedback');
            }

        }else{
            $this->load->view('frontend/feedback/index');
        }



        
		
    }


}
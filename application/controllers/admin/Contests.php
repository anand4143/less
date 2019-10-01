<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contests extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('contest_m');
        // Session
        $this->load->library('session');
		//check login auth
		$this->auth();
    }

	public function index()
	{
		$data = array();
		$data['contests'] = $this->contest_m->get_results(); 
		$this->load->view('admin/contests/list', $data);
    }
	
	public function add(){
		$this->load->view('admin/contests/add');
	}
	
	public function store(){
		if($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('contestName', 'Contest Name', 'trim|required|min_length[2]|max_length[128]');
			$this->form_validation->set_rules('regStartDate', 'Registration Start Date', 'required');
			$this->form_validation->set_rules('regEndDate', 'Registration End Date', 'required');
			$this->form_validation->set_rules('startDate', 'Contest Start Date', 'required');
			$this->form_validation->set_rules('endDate', 'Contest End Date', 'required');
			if ($this->form_validation->run() == FALSE){
				$this->load->view('admin/contests/add');
			} else {
				$contest_name = $this->input->post('contestName');
				$reg_start_date = $this->input->post('regStartDate');
				$reg_end_date = $this->input->post('regEndDate');
				$start_date = $this->input->post('startDate');
				$end_date = $this->input->post('endDate');
				$description = $this->input->post('description');
				$new_data = array(
					'contestName' => $contest_name,
					'regStartDate' => date('Y-m-d', strtotime($reg_start_date)),
					'regEndDate' => date('Y-m-d', strtotime($reg_end_date)),
					'startDate' => date('Y-m-d', strtotime($start_date)),
					'endDate' => date('Y-m-d', strtotime($end_date)),
					'description' => $description
				);
				$res = $this->contest_m->store_data($new_data);
				$msg = $res ? 'Contest Added Successfully' : 'Contest Fail to Add';
				$this->session->set_flashdata('resp_msg', $msg);
				if($res){
					redirect('admin/contests');
				} else {
					$this->load->view('admin/contests/add');				
				}
			}
		} else {
			redirect('admin/contests');
		}
	}
	
	public function edit($id){
		$data = array();		
		$rs = $this->contest_m->get_data($id);
		if(!$rs){
			redirect('admin/contests');
		} 
		$data['c_data'] = $rs;
		$this->load->view('admin/contests/edit', $data);	
	}
	
	public function update($id){
		if($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('contestName', 'Contest Name', 'trim|required|min_length[2]|max_length[128]');
			$this->form_validation->set_rules('startDate', 'Start Date', 'required');
			$this->form_validation->set_rules('endDate', 'End Date', 'required');
			if ($this->form_validation->run() == FALSE){
				$data['c_data'] = $this->contest_m->get_data($id);
				$this->load->view('admin/contests/edit', $data);
			} else {
				$contest_name = $this->input->post('contestName');
				$reg_start_date = $this->input->post('regStartDate');
				$reg_end_date = $this->input->post('regEndDate');
				$start_date = $this->input->post('startDate');
				$end_date = $this->input->post('endDate');
				$description = $this->input->post('description');
				$udata = array(
					'contestName' => $contest_name,
					'regStartDate' => date('Y-m-d', strtotime($reg_start_date)),
					'regEndDate' => date('Y-m-d', strtotime($reg_end_date)),
					'startDate' => date('Y-m-d', strtotime($start_date)),
					'endDate' => date('Y-m-d', strtotime($end_date)),
					'description' => $description
				);
				$res = $this->contest_m->update_data($id, $udata);
				$msg = $res ? 'Contest Updated Successfully' : 'Contest Fail to Update';
				$this->session->set_flashdata('resp_msg', $msg);
				if($res){
					redirect('admin/contests');
				} else {
					$data['c_data'] = $this->contest_m->get_data($id);
					$this->load->view('admin/contests/edit', $data);			
				}
			}
		} else {
			redirect('admin/contests');
		}
	}
	
	public function delete(){
		$id = $this->input->post('id');
		$res = $this->contest_m->delete_data($id);
		return $res;
		//$msg = $res ? 'Contest Removed Successfully' : 'Contest Fail to Remove';
		//$this->session->set_flashdata('resp_msg', $msg);
		//redirect('admin/contests');
		
	}
	
	
	function checkDateFormat($date) {
		if (preg_match("/[0-31]{2}/[0-12]{2}/[0-9]{4}/", $date)) {
			if(checkdate(substr($date, 3, 2), substr($date, 0, 2), substr($date, 6, 4)))
				return true;
			else
				return false;
		} else {
			return false;
		}
	}

	public function get_contest_participants($contest_id) {
		$data = array();
		$rs = $this->contest_m->get_contest_participants($contest_id); 
		if($rs){
			$data['resp_status'] = 'success';
			$data['list'] = $rs;
			$data['num_rows'] = count($rs);
		} else {
			$data['resp_status'] = 'error';
			$data['list'] = array();
		}
		echo json_encode($data);
		
	}
   
}
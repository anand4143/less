<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Levels extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // Model
        $this->load->model('contest_m');
		 $this->load->model('level_m');
        // Session
        $this->load->library('session');
		//check login auth
		$this->auth();
    }

	public function index()
	{
		$data = array();
		$data['levels'] = $this->level_m->get_results(); 
		$this->load->view('admin/levels/list', $data);
    }
	
	public function get_listing_data(){
		$data = array();
		$rs = $this->level_m->get_results(); 
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
	
	public function add(){
		$data['contests'] = $this->contest_m->get_results();
		$this->load->view('admin/levels/add', $data);
	}
	
	public function store(){
		if($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('contestID', 'Contest ID', 'required');
			$this->form_validation->set_rules('levelName', 'Level Name', 'trim|required|min_length[2]|max_length[128]');
			
			if ($this->form_validation->run() == FALSE){
				$this->load->view('admin/levels/add');
			} else {
				$contest_id = $this->input->post('contestID');
				$level_name = $this->input->post('levelName');
				$description = $this->input->post('description');
				$new_data = array(
					'ContestID' => $contest_id,
					'LevelName' => $level_name,
					'description' => $description
				);
				$res = $this->level_m->store_data($new_data);
				$msg = $res ? 'Level Added Successfully' : 'Level Fail to Add';
				$this->session->set_flashdata('resp_msg', $msg);
				if($res){
					redirect('admin/levels');
				} else {
					$this->load->view('admin/levels/add');				
				}
			}
		} else {
			redirect('admin/levels');
		}
	}
	
	public function edit($id){
		$data = array();
		$rs= $this->level_m->get_results($id);
		if(!$rs){
			redirect('admin/levels');
		} 
		$data['contests'] = $rs;
		
		$data['c_data'] = $this->level_m->get_data($id);
		$this->load->view('admin/levels/edit', $data);	
	}
	
	public function update($id){
		if($this->input->post()) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('contestID', 'Contest ID', 'required');
			$this->form_validation->set_rules('levelName', 'Level Name', 'trim|required|min_length[2]|max_length[128]');
			if ($this->form_validation->run() == FALSE){
				$data['contests'] = $this->contest_m->get_results();
				$data['c_data'] = $this->level_m->get_data($id);
				$this->load->view('admin/levels/edit', $data);
			} else {
				$contest_id = $this->input->post('contestID');
				$level_name = $this->input->post('levelName');
				$description = $this->input->post('description');
				$status = $this->input->post('status');
				$udata = array(
					'contestID' => $contest_id,
					'levelName' => $level_name,
					'description' => $description,
					'eby' => '',
					'status' => $status
				);
				
				$res = $this->level_m->update_data($id, $udata);
				$msg = $res ? 'Level Updated Successfully' : 'Level Fail to Update';
				$this->session->set_flashdata('resp_msg', $msg);
				if($res){
					redirect('admin/levels');
				} else {
					$data['c_data'] = $this->level_m->get_data($id);
					$data['contests'] = $this->contest_m->get_results();
					$this->load->view('admin/levels/edit', $data);			
				}
			}
		} else {
			redirect('admin/levels');
		}
	}
	
	public function delete($id){
		$res = $this->level_m->delete_data($id);
		$msg = $res ? 'Level Removed Successfully' : 'Level Fail to Remove';
		$this->session->set_flashdata('resp_msg', $msg);
		redirect('admin/levels');
	}
	
	public function get_contest_levels($contest_id){
		$data = array();
		$rs = $this->level_m->get_results($contest_id); 
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
	
	public function change_current_level($contest_id, $id){
		$data = array();
		if($contest_id > 0 && $id > 0) {
			$res = $this->level_m->update_current_level($contest_id, $id);
			$msg = $res ? 'Current Level Updated Successfully' : 'Current Level Fail to Update';
			//$this->session->set_flashdata('resp_msg', $msg);
			if($res){
				$data['resp_status'] = 'success';
				$data['resp_msg'] = $msg;
				//$data['levels'] = $this->level_m->get_results(); 
			} else {
				$data['resp_status'] = 'error';
				$data['resp_msg'] = $msg;	
			}
			
		} else {
			$data['resp_status'] = 'error';
			$data['resp_msg'] = 'Invalid Request';
		}
		echo json_encode($data);
	}
	
}
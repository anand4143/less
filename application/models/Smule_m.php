<?php 

class Smule_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function get_user_smules($contest_id, $level_id, $user_id = 0){
		$this->db->select("t1.userID, t1.smuleUrl, t1.smuleID, t1.createdDate, t4.userName, CONCAT(t4.firstName, ' ', t4.lastName) AS fullName");
		$this->db->from('user_smule t1');
		$this->db->join('master_contests t2', 't1.contestID = t2.id');
		$this->db->join('contest_levels t3', 't1.levelID = t3.id');
		$this->db->join('users t4', 't1.userID = t4.id');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t2.isDeleted', '0');
		$this->db->where('t3.isDeleted', '0');
		$this->db->where('t4.isDeleted', '0');
		
		$this->db->where('t1.contestID', $contest_id);
		$this->db->where('t1.levelID', $level_id);
		if((int)$user_id > 0){
          $this->db->where('userID', $user_id);
		}
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
			return false;
		}
		$result = $rs->result();
		$resp = array();
		foreach($result as $row) {
			$resp[$row->userID]['userID'] = $row->userID;
			$resp[$row->userID]['userName'] = $row->userName;
			$resp[$row->userID]['fullName'] = $row->fullName;
			$resp[$row->userID]['song_list'][] = array(
				'smuleUrl' => $row->smuleUrl,
				'smuleID' => $row->smuleID,
				'createdDate' => $row->createdDate,
			);			
		}
		//echo "<pre>";print_r($resp);die;		
		return $resp;
	}
	
	public function is_upload_limit_exceed($contest_id, $level_id, $user_id){
		$this->db->select("COUNT(t1.id) AS num_rows");
		$this->db->from('user_smule t1');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t1.contestID', $contest_id);
		$this->db->where('t1.levelID', $level_id);
		$this->db->where('userID', $user_id);		
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
			return TRUE;
		}
		return $rs->row()->num_rows > 5 ? TRUE : FALSE;
	}
	
	public function get_data($id){
		$rs = $this->db->get_where('user_smule', array('isDeleted'=> '0', 'id' => $id), 1);
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
	}
	
	public function store_data($data){
		$this->db->insert('user_smule', $data);
		return $this->db->insert_id();
	}
	
	public function update_data($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('user_smule', $data);
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
		return $this->db->update('user_smule', array('isDeleted' => 1));
	}	
}



?>
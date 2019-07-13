<?php 

class Contest_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function get_results(){
		$this->db->select('id, contestName, startDate, endDate, createdDate, status');
		$this->db->where('isDeleted', '0');
		$rs = $this->db->get('master_contests');
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->result();
	}
	
	public function get_data($id){
		$rs = $this->db->get_where('master_contests', array('isDeleted'=> '0', 'id' => $id), 1);
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
	}
	
	public function store_data($data){
		$this->db->insert('master_contests', $data);
		return $this->db->insert_id();
	}
	
	public function update_data($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('master_contests', $data);
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
		return $this->db->update('master_contests', array('isDeleted' => 1));
	}
}



?>
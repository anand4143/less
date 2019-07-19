<?php 

class Level_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function get_results(){
		$this->db->select("t1.contestName, t2.id, t2.levelName,  t1.status, CONCAT(t3.firstName, '', t3.lastName) AS ebyName, t1.createdDate");
		$this->db->from('master_contests t1');
		$this->db->join('contest_levels t2', 't1.id = t2.contestID');
		$this->db->join('users t3', 't2.eby = t3.id', 'left');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t2.isDeleted', '0');
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->result();
	}
	
	public function get_data($id){
		$this->db->select("t1.contestName, t2.id, t2.contestID, t2.levelName, t2.description,  t1.status, t1.isEnabled");
		$this->db->from('master_contests t1');
		$this->db->join('contest_levels t2', 't1.id = t2.contestID');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t2.isDeleted', '0');
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
	}
	
	public function store_data($data){
		$this->db->insert('contest_levels', $data);
		return $this->db->insert_id();
	}
	
	public function update_data($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('contest_levels', $data);
	}
	
	public function delete_data($id){
		$this->db->where('id', $id);
		return $this->db->update('contest_levels', array('isDeleted' => 1));
	}
}



?>
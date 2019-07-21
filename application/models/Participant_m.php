<?php 

class Participant_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function get_contest_data($contest_id){
		$this->db->select("t1.id, t1.contestName,t2.description, t2.id AS level_id, t2.levelName");
		$this->db->from('master_contests t1');
		$this->db->join('contest_levels t2', 't1.id = t2.contestID');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t2.isDeleted', '0');
		$this->db->where('t2.status', 1);
		$this->db->where('t2.isEnabled', 1);
		$this->db->where('t1.id', $contest_id);
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
	}
	
}



?>
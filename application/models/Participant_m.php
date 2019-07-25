<?php 

class Participant_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function is_alreay_participate_contest($contest_id) {
		$this->db->select("count(t1.id) AS num_rows");
		$this->db->from('users_contests_levels t1');
		$this->db->join('master_contests t2', 't1.contestID = t2.id');
		$this->db->join('contest_levels t3', 't1.levelID = t3.id', 'left');
		$this->db->where('t2.isDeleted', 0);
		$this->db->where('t2.status', 1);
		$this->db->where('t3.isDeleted', 0);		
		$this->db->where('t3.status', 1);
		$this->db->where('t2.id', $contest_id);
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
	}
	
}



?>
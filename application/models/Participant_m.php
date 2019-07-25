<?php 

class Participant_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function is_alreay_participate_contest($contest_id) {
		$this->db->select("count(t1.id) AS num_rows");
		$this->db->from('master_contests t1');
		$this->db->join('contest_levels t2', 't1.id = t2.contestID AND t2.isDeleted = 0 AND t2.status = 1', 'left');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t1.id', $contest_id);
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
	}
	
}



?>
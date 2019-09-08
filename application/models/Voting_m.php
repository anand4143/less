<?php 

class Voting_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	public function voting_contest_list(){
		$this->db->select("t1.id, t1.contestName, t2.id AS levelID, t2.levelName");
		$this->db->from('master_contests t1');
		$this->db->join('contest_levels t2', 't1.id = t2.contestID');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t2.isDeleted', '0');
		$this->db->where('t2.status', 1);
		$this->db->where('t2.isEnabled', 1);	
		$this->db->where('t1.startDate <= CURRENT_DATE()');
		$this->db->where('t1.endDate >= CURRENT_DATE()');
		//$this->db->where('t1.regStartDate <=', date('Y-m-d'));
		//$this->db->where('t1.regEndDate >=', date('Y-m-d'));
		$rs = $this->db->get();
		//echo "<li>".$this->db->last_query();
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->result();
	}
	
	public function get_contestants($contest_id, $sess_userid){
		
			$sub_qry1 = ", (SELECT count(v1.id) AS received_votes FROM trans_votings v1 WHERE v1.isDeleted = 0 AND v1.isActive = 1 AND v1.contestID = t1.contestID AND v1.contestLevelID = t1.levelID AND v1.participantID = t1.userID ) AS received_votes ";
			$sub_qry2 = ", (SELECT count(v2.id) AS total_votes FROM trans_votings v2 WHERE v2.isDeleted = 0 AND v2.isActive = 1 AND v2.contestID = t1.contestID AND v2.contestLevelID = t1.levelID) AS total_votes ";
            $sub_qry3 = ", (SELECT IF(count(v3.id) > 0, 'Yes', 'No') AS voted FROM trans_votings v3 WHERE v3.isDeleted = 0 AND v3.isActive = 1 AND v3.contestID = t1.contestID AND v3.contestLevelID = t1.levelID AND v3.votedByUserID = '".$sess_userid."') AS voted ";
			
			$sql = "SELECT t1.*, CONCAT(t2.firstName, ' ', t2.lastName) AS name, t2.email, t3.contestName, t4.levelName 
			       ".$sub_qry1."
				   ".$sub_qry2."
				   ".$sub_qry3."
				 FROM users_contests_levels t1 
			         LEFT JOIN users t2 ON(t1.userID = t2.id  ) 
			         LEFT JOIN master_contests t3 ON(t1.contestID = t3.id ) 
					 LEFT JOIN contest_levels t4 ON(t1.levelID = t4.id ) 
					 WHERE t2.isActive = 1 AND t2.isDeleted = 0
					 AND t3.status = 1 AND t3.isDeleted = 0
					 AND t4.status = 1 AND t4.isDeleted = 0 AND t4.isEnabled = 1
					 AND t3.id = '".$contest_id."'
				ORDER BY received_votes DESC";
				//echo $sql;die;
             $rs = $this->db->query($sql);
             if($rs->num_rows() == 0) {
                return false;
             }
             else {
                return $rs->result();
             }
	}
	
	public function is_already_voted($contest_id, $level_id, $sess_userid){
		 $sql = "SELECT count(v3.id) AS isVoted FROM trans_votings v3 WHERE v3.isDeleted = 0 AND v3.isActive = 1 AND v3.contestID = '".$contest_id."' AND v3.contestLevelID = '".$level_id."' AND v3.votedByUserID = '".$sess_userid."' ";
		 $rs = $this->db->query($sql);
		 if($rs->num_rows() == 0) {
			return false;
		 }
		 else {
			return $rs->row()->isVoted;
		 }
	}
	
	public function get_your_recorded_vote($contest_id, $sess_userid){
		// $sql = "SELECT v3.participantID FROM trans_votings v3 WHERE v3.isDeleted = 0 AND v3.isActive = 1 AND v3.contestID = '".$contest_id."' AND v3.contestLevelID = '".$level_id."' AND v3.votedByUserID = '".$sess_userid."' ";
		$sql = "SELECT t1.participantID FROM trans_votings t1 
		 LEFT JOIN master_contests t2 ON(t1.contestID = t2.id ) 
		 LEFT JOIN contest_levels t3 ON(t1.contestLevelID = t3.id ) 
		 WHERE t1.isDeleted = 0 AND t1.isActive = 1 
		 AND t2.status = 1 AND t2.isDeleted = 0
		 AND t3.status = 1 AND t3.isDeleted = 0
		 AND t2.id = '".$contest_id."' AND t3.isEnabled = 1 AND t1.votedByUserID = '".$sess_userid."' ";
		 
		 $rs = $this->db->query($sql);
		 if($rs->num_rows() == 0) {
			return false;
		 }
		 else {
			return $rs->row()->participantID;
		 }
	}
	
	public function store_vote($data){
		$this->db->insert('trans_votings', $data);
		return $this->db->insert_id();
	}
	
	
	
}



?>
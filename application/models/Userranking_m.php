<?php 

class Userranking_m extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    public function get_result($type = 'result', $search = '', $offset = 0, $limit = 2)
     {
              $sql = "";
              if($type == 'count') {
                  $select = "SELECT count(t1.id) AS num_row ";
              } else {
                 $select = "SELECT t1.userID as userID,t1.contestID,t1.levelID, CONCAT(t2.firstName, ' ', t2.lastName) AS name, t2.email, t3.contestName, t4.levelName,t5.id as smuleID";
              }

              $sql = $select." FROM users_contests_levels t1 
			         left JOIN users t2 ON(t1.userID = t2.id  ) 
			         LEFT JOIN master_contests t3 ON(t1.contestID = t3.id ) 
					 LEFT JOIN contest_levels t4 ON(t1.levelID = t4.id ) 
					 LEFT JOIN user_smule t5 ON(t5.userID = t2.id ) 
					 right JOIN user_contest_report t6 ON(t6.userID = t2.id AND t6.levelsID=t5.levelID  AND t6.contestID=t5.contestID  AND t6.contestID=t1.contestID AND t6.contestID=t3.id AND t6.levelsID=t4.id ) 
					 WHERE t2.isActive = 1 AND t2.isDeleted = 0
					 AND t3.status = 1 AND t3.isDeleted = 0
                     AND t4.status = 1 AND t4.isDeleted = 0
                     AND t6.userID = t2.id 
                     AND t6.levelsID=t5.levelID  
                     AND t6.userSmuleID=t5.id  
                     AND t6.contestID=t5.contestID  
                     AND t6.contestID=t1.contestID 
                     AND t6.contestID=t3.id 
                     AND t6.levelsID=t4.id";

                   
             
             if($type == 'result' && !empty($search)) {
                $sql .= " AND (";
                $sql .= " t3.contestName LIKE '%".$search."%'";
                $sql .= " OR t4.levelName LIKE '%".$search."%'";
                $sql .= " OR CONCAT(t2.firstName, ' ', t2.lastName) LIKE '%".$search."%'";
                $sql .= " )";
             }
             
             $sql .= " ORDER BY t2.firstName, t2.lastName ASC ";
             
             if($type == 'result') {
               $sql .= " LIMIT ".$offset.", ".$limit;
             }
             
             $rs = $this->db->query($sql);
             if($rs->num_rows() == 0) {
                return false;
             }
             else {
                return ($type == 'count') ? $rs->row()->num_row : $rs->result_array();
             }
    }

    public function get_results($smuleID = 0){
      $this->db->select('t1.*');
		//$this->db->select("t1.contestName, t2.id, t2.contestID, t2.levelName,  t2.status, t2.isEnabled, CONCAT(t3.firstName, '', t3.lastName) AS ebyName, t2.createdDate");
		$this->db->from('user_contest_report t1');
		// $this->db->join('contest_levels t2', 't1.id = t2.contestID');
		// $this->db->join('users t3', 't2.eby = t3.id', 'left');
		// $this->db->where('t1.isDeleted', '0');
		// $this->db->where('t2.isDeleted', '0');
		
		if((int)$smuleID > 0) {
			$this->db->where('t1.userSmuleID', $smuleID);
		}
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->result();
   }
   

   public function get_contest_participants($contest_id,$levelId){
		$this->db->select("t1.userID, t2.userName, t2.email, CONCAT(t2.firstName, ' ', t2.lastName) AS fullName, t3.id as contestId ,t3.contestName, t4.id as levelId,t4.levelName");
		$this->db->from('users_contests_levels t1');
		$this->db->join('users t2', 't1.userID = t2.id');
		$this->db->join('master_contests t3', 't1.contestID = t3.id');
		$this->db->join('contest_levels t4', 't1.levelID = t4.id');
		$this->db->where('t3.isDeleted', '0');
		$this->db->where('t4.isDeleted', '0');
		//$this->db->where('t2.status', 1);
		$this->db->where('t3.id', $contest_id);
		$this->db->where('t4.id', $levelId);
		$rs = $this->db->get();
		//echo $this->db->last_query();die;
		if($rs->num_rows() == 0){
			return false;
		}
		return $rs->result();
   }
   
   public function get_participants_reports($userId,$contestId,$levelId){
      $this->db->select("t1.*");
		$this->db->from('user_contest_report t1');
		$this->db->where('t1.userID', $userId);
		$this->db->where('t1.contestID', $contestId);
		$this->db->where('t1.levelsID', $levelId);
		$rs = $this->db->get();
		//echo $this->db->last_query();die;
		if($rs->num_rows() == 0){
			return false;
		}
		return $rs->result();

   }

   public function get_participants_support($userId,$contestId,$levelId){
      $this->db->select("COUNT(*) as tRow");
		$this->db->from('trans_votings');
		$this->db->where('participantID', $userId);
		$this->db->where('contestID', $contestId);
		$this->db->where('contestLevelID', $levelId);
		$rs = $this->db->get();
      //echo $this->db->last_query();
      //echo "<li>=hhhhh===> ".$rs->num_rows();
		if($rs->num_rows() == 0){
			return false;
		}
		return $rs->result();
   }
    
    
}
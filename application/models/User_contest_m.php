<?php 

class User_contest_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }
	
	 public function get_result($type = 'result', $search = '', $offset = 0, $limit = 15)
     {
              $sql = "";
              if($type == 'count') {
                  $select = "SELECT count(t1.id) AS num_row ";
              } else {
                 $select = "SELECT t1.*, CONCAT(t2.firstName, ' ', t2.lastName) AS name, t2.email, t3.contestName, t4.levelName ";
              }
              $sql = $select." FROM users_contests_levels t1 
			         LEFT JOIN users t2 ON(t1.userID = t2.id  ) 
			         LEFT JOIN master_contests t3 ON(t1.contestID = t3.id ) 
					 LEFT JOIN contest_levels t4 ON(t1.levelID = t4.id ) 
					 WHERE t2.isActive = 1 AND t2.isDeleted = 0
					 AND t3.status = 1 AND t3.isDeleted = 0
					 AND t4.status = 1 AND t4.isDeleted = 0";
             
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
	
	public function update_user_current_level($id, $contest_id, $level_id){		
		$this->db->where('id', $id);
		$this->db->where('contestID', $contest_id);
		return $this->db->update('users_contests_levels', array('levelID' => $level_id));
	}
}



?>
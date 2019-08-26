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
                 $select = "SELECT t1.*, CONCAT(t2.firstName, ' ', t2.lastName) AS name, t2.email, t3.contestName, t4.levelName ";
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
    
    
}
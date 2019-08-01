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
	public function getRunningContensts(){
		$date = date("Y-m-d");
		//SELECT * FROM `master_contests` WHERE `startDate` >= CURDATE();
		$this->db->select('id, contestName, startDate, status');
		$this->db->where(['startDate >='=>$date]);
		$rs = $this->db->get('master_contests');
		//print_r($this->db->last_query());
		if($rs->num_rows() == 0){
			return false;
		}
		return $rs->result();
	}
	/*Front End*/
	public function current_contest_list($user_id){
		$this->db->select("t1.id, t1.contestName, t1.description, t1.startDate, t1.endDate, t2.id AS levelID, t2.levelName");
		$this->db->from('master_contests t1');
		$this->db->join('contest_levels t2', 't1.id = t2.contestID');
		$this->db->join('users_contests_levels t3', 't1.id = t3.contestID ', 'left');
		$this->db->where('t1.isDeleted', '0');
		$this->db->where('t2.isDeleted', '0');
		$this->db->where('t2.status', 1);
		$this->db->where('t2.isEnabled', 1);		
		$this->db->where('startDate >=', date('Y-m-d'));
	    $this->db->where('endDate >=', date('Y-m-d'));
		$this->db->where('t3.userID IS NULL');
		
		
		$rs = $this->db->get();
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->result();
	}
	
	public function upcoming_contest_list(){
		$this->db->select('id, contestName, description, startDate, endDate, createdDate, status');
		$this->db->where('isDeleted', '0');
		$this->db->where('status', 1);
		//$this->db->where('DATE(startDate)', date('Y-m-d'), false);
		$this->db->where('startDate >=', date('Y-m-d'));
	    //$this->db->where('endDate <=', date('Y-m-d'));
		$rs = $this->db->get('master_contests');
		
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->result();
	}
	
	/*Front End */
	public function get_contest_data($contest_id) {
		$this->db->select("t1.id, t1.contestName, t1.description, t2.id AS levelID, t2.levelName");
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
	
	/*Front end*/
	public function save_contest_participate_data($data){
		$this->db->insert('users_contests_levels', $data);
		return $this->db->insert_id();
	}
	
	public function get_contest_participants($contest_id){
		$this->db->select("t1.id, t2.userName, t2.email, CONCAT(t2.firstName, ' ', t2.lastName) AS fullName, t3.contestName, t4.levelName");
		$this->db->from('users_contests_levels t1');
		$this->db->join('users t2', 't1.userID = t2.id');
		$this->db->join('master_contests t3', 't1.contestID = t3.id');
		$this->db->join('contest_levels t4', 't1.levelID = t4.id');
		$this->db->where('t3.isDeleted', '0');
		$this->db->where('t4.isDeleted', '0');
		//$this->db->where('t2.status', 1);
		$this->db->where('t3.id', $contest_id);
		$rs = $this->db->get();
		//echo $this->db->last_query();die;
		if($rs->num_rows() == 0){
			return false;
		}
		return $rs->result();
	}
}



?>
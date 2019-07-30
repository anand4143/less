<?php 

class Users extends CI_Model{

    public function isValidate($username,$password, $type = ''){
        $this->db->where(['email' => $username, 'password' => $password] );
		if($type == 'admin'){
			$this->db->where('userType', 1 );
		} else {
			$this->db->where('userType !=', 1 );
		}
        $q = $this->db->get('users');
        if( $q->num_rows() ){
            $q = $this -> db
           -> select('*')
           -> where('email', $username)
           -> limit(1)
           -> get('users');
           $row = $q->row_array();
          

            return $row;
        }else{
            return false;
        }
    }

    public function getUserList(){
        $this->db->select('*')->from('users')->where('userType',2);
        
        $query = $this->db->get();
        //print_r($this->db->last_query()); die('hereereeeeee');
        if( $query->num_rows() ){
            return $query->result();
        }       
    }

    public function getUser($id){
        $rs = $this->db->get_where('users', array( 'id' => $id), 1);
        //print_r($this->db->last_query());
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
    }

    public function updateUser($id,$userData){
        //echo "<pre>";print_r($userData);die('inside model update function ');
        $this->db->where('id', $id);
		return $this->db->update('users', $userData);
    }

    // public function getJudgeList(){
    //    $result =  $this->db->get_where('users', array('isActive'=>'1', 'userType' => '2'));
    //     if($result->num_rows()){
    //         return $result->result();
    //     }else{
    //         return false;
    //     }
    // }
    public function saveJudge($data){
        $this->db->insert('users',$data);
        return $this->db->insert_id();
    }

    public function deleteUserById($id){
        $this->db->where('id',$id);
        return $this->db->update('users', array('isActive'=>'0'));
    }
    public function getUserListWithContestsAndLevel(){
        $query = $this->db->query('select t1.id,t1.firstName,t1.lastName,t1.email,t2.contestId,t2.contestName,t2.levelname,t2.levelId from users t1 RIGHT join (select t3.userID,t5.contestName,t5.id as contestId,t4.id as levelId,t4.levelName as levelname from users_contests_levels t3 left join contest_levels t4 on t4.contestID = t3.contestID and t4.id=t3.levelID LEFT join master_contests t5 on t5.id=t4.contestID) t2 on t1.id= t2.userID');
        return $query->result();

    }

    public function insertDataUsersJudgesTable($data){
        $this->db->insert('users_judge',$data);
        return $this->db->insert_id();
    }

    public function registerUser($data){
        $this->db->insert('users', $data);
        return $this->db->insert_id();
    }
}



?>
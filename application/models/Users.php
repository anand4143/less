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
}



?>
<?php 

class Users extends CI_Model{

    public function isValidate($username,$password){
        $q = $this->db->where(['email' => $username, 'password' => $password] )
                        ->get('users');
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
        $this->db->select('*')->from('users')->where('userType',3);
        $query = $this->db->get();
        if( $query->num_rows() ){
            return $query->result();
        }       
    }

    public function getUser($id){
        $rs = $this->db->get_where('users', array('isActive'=> '0', 'id' => $id), 1);
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
    }

    public function updateUser($id,$userData){
        $this->db->where('id', $id);
		return $this->db->update('users', $userData);
    }
}



?>
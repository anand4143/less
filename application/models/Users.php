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
}



?>
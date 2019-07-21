<?php

class Judges extends CI_Model{

    public function isValidate($username,$password){
        $q = $this->db->where(['email' => $username, 'password' => $password] )
                        ->get('master_judge');
        if( $q->num_rows() ){
            $q = $this -> db
           -> select('*')
           -> where('email', $username)
           -> limit(1)
           -> get('master_judge');
           $row = $q->row_array();
          

            return $row;
        }else{
            return false;
        }
    }

    public function getJudgeList(){
        $this->db->select('*')->from('master_judge')->where('isActive',1);
        $result = $this->db->get();
        if($result->num_rows()){
            return $result->result();
        }
    }
}

?>
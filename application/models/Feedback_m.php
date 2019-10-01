<?php 

class Feedback_m extends CI_Model {

    public function __construct(){
        parent::__construct();
    }

    public function save($data){
        $this->db->insert('feedback', $data);
		return $this->db->insert_id();
    }

    public function getFeedback(){
        $this->db->select('*')->from('feedback');
        $query = $this->db->get();
        if( $query->num_rows() ){
            return $query->result();
        } 
    }

}
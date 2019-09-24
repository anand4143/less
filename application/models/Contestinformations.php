
<?php 

class Contestinformations extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

public function getcontestDesc(){
    $this->db->select('*')->from('contest_information');
    //$this->db->where('limit 1');
    $query = $this->db->get();
    //print_r($this->db->last_query()); die('hereereeeeee');
    if( $query->num_rows() ){
        return $query->result();
    }       
}


}

?>
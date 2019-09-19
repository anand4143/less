
<?php 

class Meraganacontests extends CI_Model{

public function getMeraganacontestDesc(){
    $this->db->select('*')->from('meraganacontest');
    //$this->db->where('limit 1');
    $query = $this->db->get();
    //print_r($this->db->last_query()); die('hereereeeeee');
    if( $query->num_rows() ){
        return $query->result();
    }       
}


}

?>
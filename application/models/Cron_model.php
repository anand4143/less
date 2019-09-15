<?php

class Cron_model extends CI_Model{

    public function __construct(){
        parent::__construct();
    }


  public function selectRows(){
        $this->db->select("*");
        $this->db->from('users_judge');
        $this->db->where(array('userContestReportID' => 0));
        $this->db->where('judgementTime <=Date_sub(now(),interval 1 hour)');
		//$this->db->where('judgementTime <=Date_sub(now(),interval 5 minute)');
        $query = $this->db->get();
		//echo "<li>".$this->db->last_query();
        return $query->result();
    }
	
	public function deleteRows($id){
       // echo "<li>".$id;exit;
		$this->db->where('id', $id);
		$this->db->delete('users_judge');
	}

}


?>
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

    public function saveJudge($data){
        $this->db->insert('master_judge',$data);
        return $this->db->insert_id();
    }

    public function getUser($id){
        $rs = $this->db->get_where('master_judge', array( 'id' => $id), 1);
        //print_r($this->db->last_query());
		if($rs->num_rows() == 0){
				return false;
		}
		return $rs->row();
    }

    public function updateUser($id,$userData){
        //echo "<pre>";print_r($userData);die('inside model update function ');
        $this->db->where('id', $id);
		return $this->db->update('master_judge', $userData);
    }

    public function getJudgeList(){
        $this->db->select('*')->from('master_judge')->where('isActive',1);
        $result = $this->db->get();
        if($result->num_rows()){
            return $result->result();
        }
    }

    public function getJudgeById($id){
        $this->db->select('firstName,lastName');
        $this->db->from('master_judge');
        $this->db->where('id',$id);
        $q = $this->db->get();
        return $row = $q->row();
    }
    public function checkUserAssignToJudge($id,$contestId,$levelId){
        $this->db->select('judgeID');
        $this->db->from('users_judge');
        $this->db->where('userID',$id);
        $this->db->where('contestID',$contestId);
        $this->db->where('levelsID',$levelId);
        $q = $this->db->get();
        
        //echo $this->db->last_query();
        if ($q->num_rows() > 0)
        {
            $ret = $q->row();
            return $ret->judgeID;
        }
        return 0;
        
    }

    public function checkJudgeAssignToContestLevels($id,$contestId,$levelId){
        $this->db->select('judgeID');
        $this->db->from('judge_contest_levels');
        $this->db->where('judgeID',$id);
        $this->db->where('contestID',$contestId);
        $this->db->where('levelID',$levelId);
        $q = $this->db->get();
        
        //echo $this->db->last_query();
        if ($q->num_rows() > 0)
        {
            $ret = $q->row();
            return $ret->judgeID;
        }
        return 0;
        
    }


    public function getUserListWithContestsAndLevelById($gudgeId){
       $query = $this->db->query('select t1.id,t1.firstName,t1.lastName,t1.email,t2.contestId,t2.contestName,t2.levelname,t2.levelId ,t2.judgeName from users t1 RIGHT join (select t3.userID,t5.contestName,t5.id as contestId,t4.id as levelId,t4.levelName as 	levelname,t7.id as judgeid,t7.firstName as judgeName from users_contests_levels t3 LEFT join contest_levels t4 on t4.contestID = t3.contestID and t4.id=t3.levelID LEFT join master_contests t5 on t5.id=t4.contestID AND t3.contestID=t5.id left join users_judge t6 on t6.contest_id=t5.id and t6.levels_id=t4.id left join master_judge t7 on t6.judge_id=t7.id ) t2 on t1.id= t2.userID and t2.judgeid='.$gudgeId);
       //echo "<li>".$this->db->last_query();
        return $query->result();

    } 

    public function allUserSongListOfRunningContests( $judgeId){

        $query = $this->db->query(
            'SELECT t1.id as userID,t1.email as userEmail,t3.id as contestID,t3.contestName,t2.id as smuleID,t2.smuleUrl, t4.id as levelID,t4.levelName,t5.judgeID as assginJudge,t5.userContestReportID,t5.id FROM users t1
        right join user_smule t2 
        on t2.userID = t1.id
        left join judge_contest_levels t6
        on t2.contestID = t6.contestID
        and t2.levelID=t6.levelID
        left join master_contests t3 
        on t3.id = t2.contestID and t3.status=1
        left join contest_levels t4
        on t4.contestID = t3.id and t4.isEnabled=1
        left join users_judge t5
        on t5.userSmuleID = t2.id 
        where t2.contestID = t6.contestID and t6.judgeID=
        '. $judgeId.' order by t5.id desc');
        //left join judge_contest_levels t6	on t2.contestID = t6.contestID and t2.levelID=t6.levelID and t3.id = t6.contestID and t4.id = t6.levelID
        // $query = $this->db->query('SELECT t1.id as userID,t1.email as userEmail,t3.id as contestID,t3.contestName,t2.id as smuleID,t2.smuleUrl, t4.id as levelID,t4.levelName FROM users t1
        // right join user_smule t2 
        // on t2.userID = t1.id
        // left join master_contests t3 
        // on t3.id = t2.contestID and t3.status=1
        // left join contest_levels t4
        // on t4.contestID = t3.id and t4.isEnabled=1');
        //echo "<li>".$this->db->last_query();
        return $query->result_array();
        //return $query->result();
    }

    public function checkSongIsFreeOrNot(){
        $this->db->select('userSmuleID');
        $this->db->from('users_judge');
        $result = $this->db->get();
        if($result->num_rows()){
            return $result->result();
        }
    }

    public function saveDataUserSmuleTable($data){
        //$this->db->select('userSmuleID,judgeID');
        $this->db->select('id');
        $this->db->from('users_judge');
        $this->db->where('judgeID',$data['judgeID']);
        //$this->db->where('userID',$data['userID']);
        $this->db->where('contestID',$data['contestID']);
        $this->db->where('levelsID',$data['levelsID']);
        //$this->db->where('userContestReportID' 'IS NULL');
        $this->db->where(array('userContestReportID' => 0));
        $q = $this->db->get();
       // echo  $this->db->last_query();
        $row = $q->result();
       //echo "<li>===> ".$q->num_rows();exit;
       if($q->num_rows() > 0){
            $ret = $q->row();       
            return "not allow";
       }else{
        $this->db->insert('users_judge',$data);
        return $this->db->insert_id();
       }



       
    }
   public function saveJudgeParametersDB($data){
       
    //    $this->db->select('id');
    //   $this->db->from('user_contest_report');
    //    $this->db->where('userSmuleID',$data['userSmuleID']);
    //    $q = $this->db->get();
    //    if ($q->num_rows() > 0)
    //     {
    //         //$res = $q->row();
    //         return 'exist';
    //     }
        $this->db->insert('user_contest_report',$data);
        $lastInsertedID = $this->db->insert_id();
        $this->db->set("userContestReportID",$lastInsertedID);
        $this->db->where('userSmuleID',$data['userSmuleID']);
        $this->db->update('users_judge');
        return $lastInsertedID;
    }

    public function updateJudgeParametersDB($data){
        //print_r($data);die("ddddd");
        $this->db->set('sur', $data['sur']);
        $this->db->set('Taal', $data['Taal']);
        $this->db->set('Emotion_Feel', $data['Emotion_Feel']);
        $this->db->set('Voice_Quality_Nasal', $data['Voice_Quality_Nasal']);
        $this->db->set('Soothing_Level', $data['Soothing_Level']);
        $this->db->set('Copy_Or_Originality', $data['Copy_Or_Originality']);
        $this->db->set('Variation', $data['Variation']);
        $this->db->set('Diction', $data['Diction']);
        $this->db->set('Murki_Vibratos', $data['Murki_Vibratos']);
        $this->db->set('Alaap', $data['Alaap']);
        $this->db->set('Sargam', $data['Sargam']);
        $this->db->set('Judge_Score', $data['Judge_Score']);
        $this->db->set('parameter1', $data['parameter1']);
        $this->db->set('parameter2', $data['parameter2']);
        $this->db->set('parameter3', $data['parameter3']);
        $this->db->set('parameter4', $data['parameter4']);
        $this->db->set('parameter5', $data['parameter5']);
        $this->db->where('userSmuleID',$data['userSmuleID']);
        return $this->db->update('user_contest_report');
    }

    public function isJudgementParamExists($smuleID){
        $this->db->select('*');
      $this->db->from('user_contest_report');
       $this->db->where('userSmuleID',$smuleID);
       $q = $this->db->get();
       if ($q->num_rows() > 0)
        {            
            return $q->result();
        }
    }

    public function getJudgeListWithContestsAndLevel(){
        $query = $this->db->query('select t1.id,t1.firstName,t1.lastName,t1.email,t2.contestId,t2.contestName,t2.levelname,t2.levelId from master_judge t1 
        left join (
            select t3.judgeID,t5.contestName,t5.id as contestId,t4.id as levelId,t4.levelName as levelname 
            from judge_contest_levels t3             
            left join contest_levels t4 on t4.contestID = t3.contestID and t4.id=t3.levelID            
            LEFT join master_contests t5 on t5.id=t4.contestID) t2 on t1.id= t2.judgeID');
        return $query->result();

    }
    public function  saveTableJudgeContestLevels($judgeID,$contestID,$levelID){
        $data = array(
            'judgeID' =>  $judgeID,
            'contestID' =>  $contestID,
            'levelID' =>  $levelID,
        );
        //return $data;
        $this->db->insert('judge_contest_levels',$data);
        return $this->db->insert_id();
    }

    public function  updateTableJudgeContestLevels($judgeID,$contestID,$levelID,$newContestID,$newlevelID){
        $this->db->set('contestID', $newContestID);
        $this->db->set('levelID', $newlevelID);

        $this->db->where('judgeID', $judgeID);
        $this->db->where('contestID', $contestID);
        $this->db->where('levelID', $levelID);
        
        return $this->db->update('judge_contest_levels');
        //return $this->db->insert_id();
    }

    public function deleteUserById($id){
        $this->db->where('id',$id);
        return $this->db->update('master_judge', array('isActive'=>'0'));
    }

}

?>
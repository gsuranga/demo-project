<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_decision_review_model
 *
 * @author Iresha Lakmali
 */
class meeting_decision_review_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function meetingDetails(){
        $sql = "SELECT * FROM tbl_meeting_responsibles tbl_meeting_responsibles INNER JOIN tbl_meeting_minute tbl_meeting_minute ON tbl_meeting_minute.meeting_minute_id = tbl_meeting_responsibles.meeting_id WHERE tbl_meeting_responsibles.status='1'";
        return $result = $this->db->mod_select($sql);
    }
    
    public function getsolutiondetails($id){
        $sql = "SELECT * FROM `tbl_meeting_responsibles` WHERE status='1' AND meeting_responsibles_id='$id'";
        return $result = $this->db->mod_select($sql);
    }
    
    public function saveComment($data_array){
        $username = $this->session->userdata('username');
        $comment = '';
        
        if(isset($data_array['txt_final_review_date']) && $data_array['txt_final_review_date'] != ''){
            $comment = $data_array['txt_final_review_date'];
        }  else {
            $comment = $data_array['txt_initial_date_comment'];
        }
        
        $save_comment = array(
            'user_name' => $username,
            'comment' => $comment,
            'meeting_responsibles_id' => $data_array['meeting_responsibles_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );
 
        $this->db->insertData("tbl_meeting_responsibles_comments", $save_comment);
        
    }
  
    public function getComments($id){
        $sql = "SELECT * FROM `tbl_meeting_responsibles_comments` WHERE meeting_responsibles_id='$id'";
        return $result = $this->db->mod_select($sql);
    }
}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_topic_model
 *
 * @author Iresha Lakmali
 */
class meeting_topic_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function createMeetingTopic($dataArray){
        $data = array(
            'meeting_topic_name' => $dataArray['meeting_topic'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_meeting_topic", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function removeMeetingTopic($dataArray){
         $where = array(
            'meeting_topic_id' => $dataArray['token_meeting_type_id']
        );
        print_r($where);

        $data = array(
            'status' => 0
            
            
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_meeting_topic", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function manageMeetingTopic($dataArray){
           $where = array(
            'meeting_topic_id' => $dataArray['u_meeting_topic_id']
        );
        print_r($where);

        $data = array(
            'meeting_topic_name' => $dataArray['u_meeting_topic'],
            
            
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_meeting_topic", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllMeetingTopic(){
        $sql = "select * from tbl_meeting_topic WHERE status='1'";
          return $this->db->mod_select($sql);
    }
   
}

?>

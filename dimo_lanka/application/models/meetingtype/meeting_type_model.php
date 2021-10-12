<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_type_model
 *
 * @author Iresha Lakmali
 */
class meeting_type_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function createMeetingType($dataArray) {
        $data = array(
            'meeting_type' => $dataArray['meeting_type'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_meeting_type", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function viewAllMeetingType() {
        $sql = "select * from tbl_meeting_type WHERE status='1'";
          return $this->db->mod_select($sql);
    }
    
    public function remooveMeetingType($id){
        $where = array(
            'meeting_type_id' => $id
        );
        //print_r($where);

        $data = array(
            'status' => 0
            
            
        );
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_meeting_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    public function manageMeetingType($dataArray){
          $where = array(
            'meeting_type_id' => $dataArray['meeting_type_id']
        );
        print_r($where);

        $data = array(
            'meeting_type' => $dataArray['meeting_type'],
            
            
        );
        print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_meeting_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>

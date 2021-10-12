<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_reminder_model
 *
 * @author Iresha Lakmali
 */
class meeting_reminder_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function AllMeetingReminder() {
        //    $sql = "select meeting_type,location,start_date,start_time from tbl_meeting_minute WHERE status='1'";
        $employe_id = $this->session->userdata('employe_id');
        $append = '';
        /*if(isset($employe_id) && $employe_id != ''){
            $append = "AND tmmd.employee_id='$employe_id'";
        }
        */
        //$sql = "select tmmd.view_date,tmmd.view_time,tmmd.meeting_minute_detail_id,tmm.meeting_type,tmm.location,tmm.start_date,tmm.start_time,tmm.location,tmm.purpose,tmb.branch_id,tb.branch_name,tmmd.meeting_minute_id,tmmd.employee_type,tmmd.account_no from tbl_meeting_minute tmm INNER JOIN tbl_meeting_branch tmb ON tmm.meeting_minute_id=tmb.meeting_minute_id INNER JOIN tbl_branch tb ON tmb.branch_id=tb.branch_id INNER JOIN tbl_meeting_minute_detail tmmd ON tmmd.meeting_minute_id=tmm.meeting_minute_id  WHERE tmm.status='1' {$append}";
        $sql = "select tmmd.view_date,tmmd.view_time,tmmd.meeting_minute_detail_id,tmm.meeting_type,tmm.location,tmm.start_date,tmm.start_time,tmm.location,tmm.purpose,tmmd.meeting_minute_id,tmmd.employee_type,tmmd.account_no from tbl_meeting_minute tmm INNER JOIN  tbl_meeting_minute_detail tmmd ON tmmd.meeting_minute_id=tmm.meeting_minute_id WHERE tmm.status='1'";
        
        return $result = $this->db->mod_select($sql);
    }

    public function getUserMeetingdetails($meeting_id, $employe_id) {
        $append = '';
        $ststaus = '';
        if(isset($employe_id) && $employe_id != ''){
            //$append = "AND tmmd.employee_id='$employe_id'";
        }
        
        if(!isset($_REQUEST['no_status_token'])){
//            $ststaus = "AND tmmd.meting_us_status='1'";
        }
        
        //$sql = "select tmmd.meeting_minute_detail_id,tmm.meeting_type,tmm.location,tmm.start_date,tmm.start_time,tmm.location,tmm.purpose,tmb.branch_id,tb.branch_name,tmmd.meeting_minute_id,tmmd.employee_type,tmmd.account_no from tbl_meeting_minute tmm INNER JOIN tbl_meeting_branch tmb ON tmm.meeting_minute_id=tmb.meeting_minute_id INNER JOIN tbl_branch tb ON tmb.branch_id=tb.branch_id INNER JOIN tbl_meeting_minute_detail tmmd ON tmmd.meeting_minute_id=tmm.meeting_minute_id   WHERE tmm.status='1' AND tmmd.meeting_minute_detail_id='$meeting_id'  LIMIT 1";
        $sql = "select tmmd.meeting_minute_detail_id,tmm.meeting_type,tmm.location,tmm.start_date,tmm.start_time,tmm.location,tmm.purpose,tmmd.meeting_minute_id,tmmd.employee_type,tmmd.account_no from tbl_meeting_minute tmm  INNER JOIN tbl_meeting_minute_detail tmmd ON tmmd.meeting_minute_id=tmm.meeting_minute_id WHERE tmm.status='1' AND tmmd.meeting_minute_detail_id='$meeting_id' {$append} LIMIT 1";
        
         $result = $this->db->mod_select($sql);
         
         return $result;
    }
    
    

    public function chenheMeetingasview($id) {
        $where = array(
            "meeting_minute_detail_id" => $id
        );
        
        $data = array(
            'meting_us_status' => 0
        );
        
        $this->db->__beginTransaction();
        $this->db->update('tbl_meeting_minute_detail', $data, $where);
        $this->db->__endTransaction();
               
        $data_time = array(
            'view_time' => date('H:i:s'),
            'view_date' => date('Y:m:d')
        );
        
        $this->db->__beginTransaction();
        $this->db->update('tbl_meeting_minute_detail', $data_time, $where);
        $this->db->__endTransaction();
        
        
    }

    public function meetingReminder() {
        $sql = "select tmm.meeting_type,tmm.location,tmm.start_date,tmm.start_time,tmm.location,tmm.purpose,tmb.branch_id,tb.branch_name,tmmd.meeting_minute_id,tmmd.employee_type,tmmd.account_no from tbl_meeting_minute tmm INNER JOIN tbl_meeting_branch tmb ON tmm.meeting_minute_id=tmb.meeting_minute_id INNER JOIN tbl_branch tb ON tmb.branch_id=tb.branch_id INNER JOIN tbl_meeting_minute_detail tmmd ON tmmd.meeting_minute_id=tmm.meeting_minute_id   WHERE tmm.status='1'";
        echo $sql;
        return $result = $this->db->mod_select($sql);
    }

}

?>

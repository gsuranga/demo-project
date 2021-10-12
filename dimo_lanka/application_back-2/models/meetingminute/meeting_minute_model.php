<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_minute_model
 *
 * @author Iresha Lakmali
 */
class meeting_minute_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllBranch($q, $select) {
        $sql = "select branch_id,branch_name from tbl_branch WHERE branch_name LIKE '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getAllDesignation() {
        $sql = "select typeid,typename from tbl_usertype WHERE status='1'";
        return $result = $this->db->mod_select($sql);
    }

    public function getAllEmployeeName($q, $select) {
        $sql = '';
        if ($select[0] == "sales_officer_name") {
            $sql = "select email_address_O,sales_officer_id,sales_officer_name,sales_officer_account_no from tbl_sales_officer WHERE status='1' AND sales_officer_name LIKE '$q%' ";
        } else {
            $sql = "select email_address_O,apm_id,apm_name,apm_account_no from tbl_apm WHERE status='1' AND apm_name LIKE '$q%'";
        }

        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getAllAcountNo($q, $select) {
        $sql = "select sales_officer_account_no,sales_officer_id from tbl_sales_officer WHERE status='1' AND  sales_officer_account_no LIKE '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
    
    public function get_all_group_name($q, $select){
         $sql = "select meeting_group_name,meeting_group_id from tbl_meeting_group WHERE  meeting_group_name LIKE '$q%'";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function createBoardMeetingMinute($data_Array) {
        //meeting_minute_id, added_date, location, purpose, start_time, status, meeting_type, added_time, start_date
        $data = array(
            'meeting_type' => $data_Array['cmb_meeting_type'],
            'location' => $data_Array['location'],
            'purpose' => $data_Array['purpose'],
            'start_date' => $data_Array['start_date'],
            'start_time' => $data_Array['start_time'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_meeting_minute", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createMeetingGroup($data_Array) {
        $this->db->__beginTransaction();
        $data = array(
            'meeting_group_name' => $data_Array['txt_group_name'],
        );
        print_r($data);
        $rows = $data_Array['emp_count'];
        $rows++;
        echo  $rows;
        $this->db->insertData("tbl_meeting_group", $data);
        $insert_id = $this->db->insert_id();
        
        for ($x = 1; $x < $rows; $x++) {
            if (isset($data_Array['txt_employee_id_' . $x]) && $data_Array['txt_employee_id_' . $x] != '') {
                $dataArray1 = array(
                    'meeting_group_id' => $insert_id,                   
                    'sales_officer_id' => $data_Array['txt_employee_id_' . $x],
                    'apm_id' => $data_Array['txt_employee_id_' . $x],
                  
                );
                print_r($dataArray1);
                $this->db->insertData("tbl_meeting_group_detail", $dataArray1);
                
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createBranchDetails($data_Array) {
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_meeting_branch", $data_Array);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
     public function createInvites($data_Array) {
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_meeting_minute_group_detail", $data_Array);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function createMinuteDetails($data_Array) {
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_meeting_minute_detail", $data_Array);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    public function checkMeetings() {
        $column = array('meting_us_status' => 1);
        $sql = "SELECT meeting_minute_detail_id,meeting_minute_id 
            FROM tbl_meeting_minute_detail WHERE meting_us_status=:meting_us_status";

        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function checkMeetingsnotifications() {
        $column = array('meting_us_status' => 1);
        $sql = "SELECT tbl_meeting_minute.purpose,tbl_meeting_minute.meeting_type,tbl_meeting_minute_detail.meeting_minute_detail_id,tbl_meeting_minute_detail.meeting_minute_id 
            FROM tbl_meeting_minute_detail tbl_meeting_minute_detail 
            INNER JOIN tbl_meeting_minute tbl_meeting_minute ON tbl_meeting_minute.meeting_minute_id = tbl_meeting_minute_detail.meeting_minute_id
            WHERE tbl_meeting_minute_detail.meting_us_status=:meting_us_status";

        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

}

?>

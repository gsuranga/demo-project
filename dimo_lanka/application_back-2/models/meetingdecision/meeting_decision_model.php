<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of meeting_decision_model
 *
 * @author Iresha Lakmali
 */
class meeting_decision_model extends C_Model {

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

    public function get_all_meeting_topic($q, $select) {
        $sql = "select meeting_topic_id,meeting_topic_name from tbl_meeting_topic WHERE meeting_topic_name LIKE '$q%'";
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

    public function createMeetingDecision($dataArray) {
        $data = array(
            'meeting_id' => $dataArray['meeting_id'],
            'initials_review_date' => $dataArray['initials_date'],
            'final_review_date' => $dataArray['final_date'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_meeting_responsibles", $data);
        $lastRow = $this->getLastRow();

        $emp_count = $dataArray['emp_count'];
        $emp_count++;

        for ($rows = 1; $rows < $emp_count; $rows++) {
            if (isset($dataArray['txt_responsibility_id_' . $rows])) {
                $employes_data = array(
                    'meeting_responsibles_id' => $lastRow,
                    'esponsibility_person' => $dataArray['txt_responsibility_id_' . $rows],
                    'follow_up_person' => $dataArray['txt_follow_up_id_' . $rows],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s')
                );

                $this->db->insertData("tbl_meeting_responsibles_details", $employes_data);
            }
        }
        $lastRow1 = $this->getLastRow();
        $emp_countprobles = $dataArray['emp_countprobles'];
        $emp_countprobles++;
        for ($rows1 = 1; $rows1 < $emp_countprobles; $rows1++) {
            echo $rows1;
            if (isset($dataArray['txt_meeting_problem_' . $rows1])) {
                $employes_data1 = array(
                    'meeting_responsibles_id' => $lastRow1,
                    'problem' => $dataArray['txt_meeting_problem_' . $rows1],
                    'solution' => $dataArray['txt_meeting_solution_' . $rows1],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($employes_data1);
                $this->db->insertData("tbl_meeting_problem", $employes_data1);
            }
        }


        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }

    public function meetingDetails() {
        //$sql = "select tmm.meeting_type,tmm.location,tmm.start_date,tmm.start_time,tmm.location,tmm.purpose,tmb.branch_id,tb.branch_name,tmmd.meeting_minute_id,tmmd.employee_type,tmmd.account_no from tbl_meeting_minute tmm INNER JOIN tbl_meeting_branch tmb ON tmm.meeting_minute_id=tmb.meeting_minute_id INNER JOIN tbl_branch tb ON tmb.branch_id=tb.branch_id INNER JOIN tbl_meeting_minute_detail tmmd ON tmmd.meeting_minute_id=tmm.meeting_minute_id   WHERE tmm.status='1'";
        $sql = "select tmm.meeting_type,tmm.location,tmm.start_date,tmm.start_time,tmm.location,tmm.purpose,tmmd.meeting_minute_id,tmmd.employee_type,tmmd.account_no from tbl_meeting_minute tmm INNER JOIN  tbl_meeting_minute_detail tmmd ON tmmd.meeting_minute_id=tmm.meeting_minute_id WHERE tmm.status='1'";
        //echo $sql;
        return $result = $this->db->mod_select($sql);
    }

    public function get_apm_accountcode($q, $select) {
        $sql = "SELECT apm_account_no,apm_name FROM tbl_apm WHERE apm_name LIKE '$q%'";
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

    public function get_sales_officeraccountcode($q, $select) {
        $sql = "SELECT sales_officer_account_no,sales_officer_name FROM tbl_sales_officer WHERE sales_officer_name LIKE '$q%'";
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

    public function get_all_responsibility($q, $select) {
        $sql = "select sales_officer_id,sales_officer_name from tbl_sales_officer WHERE sales_officer_name LIKE '$q%'";
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

    public function get_all_follow_up($q, $select) {
        $sql = "select apm_id,apm_name from tbl_apm WHERE status='1' AND apm_name LIKE '$q%'";
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

}

?>

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of target_model
 *
 * @author Shamil
 */
class target_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllSalesTypes() {
        $sql = "select * from tbl_sales_type where status =1";
        return $this->db->mod_select($sql);
    }

    public function getAllAreas() {
        $sql = "select * from tbl_area where status = 1";
        return $this->db->mod_select($sql);
    }

    public function getAllBranches() {
        $sql = "select * from tbl_branch where status = 1";
        return $this->db->mod_select($sql);
    }

    public function getBranchWiseSalesPersons($branch_id) {
        $sql = "select * from tbl_sales_officer where branch_id=" . $branch_id . " and status=1";
        return $this->db->mod_select($sql);
    }

    public function insertSalesTypeWiseTarget($data_array) {
        $budget_month = $data_array['month_picker'] . "-" . "01";
        $lastDateofSalesTypeBudget = $this->getLastDateofSalesTypeTarget();
        $last_date = '0000-00';
        $sizeof = sizeof($lastDateofSalesTypeBudget);
        if ($sizeof == 0) {
            $last_date = '0000-00-00';
        } else {
            $last_date = $lastDateofSalesTypeBudget[0]->year . '-' . $lastDateofSalesTypeBudget[0]->month;
        }
        echo $budget_month . " " . $last_date;
        $last_date_time = new DateTime($last_date);
        $budget_date_time = new DateTime($budget_month);
        if ($budget_date_time->format("Y-m-d") > $last_date_time->format("Y-m-d")) {
            $tokens = explode("-", $budget_month);
            $year = $tokens[0];
            $month = $tokens[1];
            $row_count = $data_array['txt_hidden_count'];
            for ($i = 0; $i < $row_count; $i++) {
                $budget_data = array(
                    'sales_type_id' => $data_array['txt_sales_type_id_' . $i],
                    'budjeted_amount' => $data_array['txt_target_amount_' . $i],
                    'amended_amount' => $data_array['txt_amended_amount_' . $i],
                    'year' => $year,
                    'month' => $month,
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_sales_type_target', $budget_data);
            }
            $this->db->__endTransaction();
            //echo $this->db->status();
            return $this->db->status();
        }
    }

    public function insertAreaWiseTarget($data_array) {
        $budget_month = $data_array['area_month_picker'] . "-" . "01";
        $lastDateofAreaWiseBudget = $this->getLastDateofAreaWiseTarget();
        $last_date = '0000-00';
        $sizeof = sizeof($lastDateofAreaWiseBudget);
        if ($sizeof == 0) {
            $last_date = '0000-00-00';
        } else {
            $last_date = $lastDateofAreaWiseBudget[0]->year . '-' . $lastDateofAreaWiseBudget[0]->month;
        }
        echo $budget_month . " " . $last_date;
        $last_date_time = new DateTime($last_date);
        $budget_date_time = new DateTime($budget_month);
        if ($budget_date_time->format("Y-m-d") > $last_date_time->format("Y-m-d")) {
            $tokens = explode("-", $budget_month);
            $year = $tokens[0];
            $month = $tokens[1];
            $row_count = $data_array['txt_hidden_count'];
            for ($i = 0; $i < $row_count; $i++) {
                $budget_data = array(
                    'area_id' => $data_array['txt_area_id_' . $i],
                    'year' => $year,
                    'month' => $month,
                    'added_date' => date('Y-m-d'),
                    'budjeted_amount' => $data_array['txt_area_amount_' . $i],
                    'amended_amount' => $data_array['txt_amended_amount_' . $i],
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_area_target', $budget_data);
            }
            $this->db->__endTransaction();
            //echo $this->db->status();
            return $this->db->status();
        }
    }

    public function insertBranchWiseTarget($data_array) {
        $budget_month = $data_array['branch_month_picker'] . "-" . "01";
        $lastDateofBranchWiseBudget = $this->getLastDateofBranchWiseTarget();
        $last_date = '0000-00';
        $sizeof = sizeof($lastDateofBranchWiseBudget);
        if ($sizeof == 0) {
            $last_date = '0000-00-00';
        } else {
            $last_date = $lastDateofBranchWiseBudget[0]->year . '-' . $lastDateofBranchWiseBudget[0]->month;
        }
        echo $budget_month . " " . $last_date;
        $last_date_time = new DateTime($last_date);
        $budget_date_time = new DateTime($budget_month);
        if ($budget_date_time->format("Y-m-d") > $last_date_time->format("Y-m-d")) {
            $tokens = explode("-", $budget_month);
            $year = $tokens[0];
            $month = $tokens[1];
            $row_count = $data_array['txt_hidden_count'];
            for ($i = 0; $i < $row_count; $i++) {
                $budget_data = array(
                    'branch_id' => $data_array['txt_branch_id_' . $i],
                    'year' => $year,
                    'month' => $month,
                    'added_date' => date('Y-m-d'),
                    'budjeted_amount' => $data_array['txt_target_amount_' . $i],
                    'amended_amount' => $data_array['txt_amended_amount_' . $i],
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_branch_target', $budget_data);
            }
            $this->db->__endTransaction();
            //echo $this->db->status();
            return $this->db->status();
        }
    }

    public function insertSalesOfficerWiseTarget($data_array) {
        print_r($data_array);
        $budget_month = $data_array['sales_person_month_picker'] . "-" . "01";
        $lastDateofSalesOfficerWiseBudget = $this->getLastDateofSalesOfficerWiseTarget();
        $last_date = '0000-00';
        $sizeof = sizeof($lastDateofSalesOfficerWiseBudget);
        if ($sizeof == 0) {
            $last_date = '0000-00-00';
        } else {
            $last_date = $lastDateofSalesOfficerWiseBudget[0]->year . '-' . $lastDateofSalesOfficerWiseBudget[0]->month;
        }
        echo $budget_month . " " . $last_date;
        $last_date_time = new DateTime($last_date);
        $budget_date_time = new DateTime($budget_month);
        if ($budget_date_time->format("Y-m-d") > $last_date_time->format("Y-m-d")) {
            $tokens = explode("-", $budget_month);
            $year = $tokens[0];
            $month = $tokens[1];
            $row_count = $data_array['txt_hidden_count'];
            for ($i = 0; $i < $row_count; $i++) {
                $budget_data = array(
                    'sales_officer_id' => $data_array['officer_id_' . $i],
                    'year' => $year,
                    'month' => $month,
                    'added_date' => date('Y-m-d'),
                    'budjeted_amount' => $data_array['budget_amount_' . $i],
                    'amended_amount' => $data_array['amended_amount_' . $i],
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_sales_officer_target', $budget_data);
            }
            $this->db->__endTransaction();
            return $this->db->status();
        }
    }

    public function getLastDateofSalesTypeTarget() {
        $sql = "select year,month tbl_sales_type_target where status=1 order by year,month desc limit 1";
        return $this->db->mod_select($sql);
    }

    public function getLastDateofAreaWiseTarget() {
        $sql = "select year,month from tbl_area_target where status=1 order by year,month desc limit 1";
        return $this->db->mod_select($sql);
    }

    public function getLastDateofBranchWiseTarget() {
        $sql = "select year,month from tbl_branch_target where status=1 order by year,month desc limit 1";
        return $this->db->mod_select($sql);
    }

    public function getLastDateofSalesOfficerWiseTarget() {
        $sql = "select year,month from tbl_sales_officer_target where status=1 order by year,month desc limit 1";
        return $this->db->mod_select($sql);
    }

    public function loadAllBranches($q, $select) {
        $sql = "select * from tbl_branch where status='1' and branch_name like '$q%'";
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

    //edit
    public function getAllSalesTypesEdit($target_month) {
        print_r($target_month);
//        $date = explode('-', $target_month);
//        $year = $date[0];
//        $month = $date[1];
// $target_month = $data_array['month_picker'] . "-" . "01";
// $target_monthNew = $data_array['sales_person_month_picker'] . "-" . "31";

        $sql = "select tbl_sales_type_target.budjeted_amount,tbl_sales_type_target.amended_amount,tbl_sales_type_target.added_date, tbl_sales_type.sales_type_id,tbl_sales_type.sales_type_name  from tbl_sales_type tbl_sales_type Left Join tbl_sales_type_target tbl_sales_type_target on tbl_sales_type.sales_type_id= tbl_sales_type_target.sales_type_id where year='" . 4014 . "' and month = '" . 01 . "'";
        return $this->db->mod_select($sql);
    }

    public function updateSalestype($details) {
        $this->db->__beginTransaction();
        for ($i = 0; $i < $_REQUEST['txt_hidden_count']; $i++) {
            $where = array("sales_type_id" => $_REQUEST['txt_sales_type_id_' . $i]
            );
            $details = array(
                "budjeted_amount" => $_REQUEST['txt_target_amount_' . $i],
                "amended_amount" => $_REQUEST['txt_amended_amount_' . $i]
            );
            $this->db->update('tbl_sales_type_target', $details, $where);
        }


        $this->db->__endTransaction();
    }

    public function getAllAreaEdit() {
        $sql = "select  tbl_area_target.budjeted_amount,tbl_area_target.amended_amount,
        tbl_area.area_id,tbl_area.area_name,tbl_area.area_account_no from tbl_area tbl_area Left Join
        tbl_area_target tbl_area_target on tbl_area.area_id=
        tbl_area_target.area_id";
        return $this->db->mod_select($sql);
    }

    public function updateArea($details) {
        $this->db->__beginTransaction();
        for ($i = 0; $i < $_REQUEST['txt_hidden_count']; $i++) {
            $where = array("area_id" => $_REQUEST['txt_area_id_' . $i]
            );
            $details = array(
                "budjeted_amount" => $_REQUEST['txt_area_amount_' . $i],
                "amended_amount" => $_REQUEST['txt_amended_amount_' . $i]
            );
            $this->db->update('tbl_area_target', $details, $where);
        }


        $this->db->__endTransaction();
    }

    public function getAllBranchEdit() {
        $sql = "select  tbl_branch_target.budjeted_amount,tbl_branch_target.amended_amount,
 tbl_branch.branch_id,tbl_branch.branch_name,tbl_branch.branch_account_no from tbl_branch tbl_branch Left Join
 tbl_branch_target tbl_branch_target on tbl_branch.branch_id=
        tbl_branch_target.branch_id";
        return $this->db->mod_select($sql);
    }

    public function updateBranch($details) {
        $this->db->__beginTransaction();
        for ($i = 0; $i < $_REQUEST['txt_hidden_count']; $i++) {
            $where = array("branch_id" => $_REQUEST['txt_branch_id_' . $i]
            );
            $details = array(
                "budjeted_amount" => $_REQUEST['txt_target_amount_' . $i],
                "amended_amount" => $_REQUEST['txt_amended_amount_' . $i]
            );
            $this->db->update('tbl_branch_target', $details, $where);
        }


        $this->db->__endTransaction();
    }

    public function getAllSalsPersonEdit() {
        $sql = "select  tbl_sales_officer_target.budjeted_amount,tbl_sales_officer_target.amended_amount,
     tbl_sales_officer.sales_officer_id,tbl_sales_officer.sales_officer_name,tbl_sales_officer.sales_officer_account_no,tbl_sales_officer.branch_id from tbl_sales_officer tbl_sales_officer Left Join
       tbl_sales_officer_target tbl_sales_officer_target on tbl_sales_officer.sales_officer_id=
        tbl_sales_officer_target.sales_officer_id
         where tbl_sales_officer.branch_id=1";
        return $this->db->mod_select($sql);
    }

    public function updateSalesPersonTarget($details) {
        $this->db->__beginTransaction();
        for ($i = 0; $i < $_REQUEST['txt_hidden_count']; $i++) {
            $where = array("sales_officer_id" => $_REQUEST['officer_id_' . $i]
            );
            $details = array(
                "budjeted_amount" => $_REQUEST['budget_amount_' . $i],
                "amended_amount" => $_REQUEST['amended_amount_' . $i]
            );
            $this->db->update('tbl_sales_officer_target', $details, $where);
        }


        $this->db->__endTransaction();
    }

}

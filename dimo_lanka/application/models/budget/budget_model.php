<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of budget_model
 *
 * @author SHDINESH
 */
class budget_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllSalesTypes() {
        $sql = "select * from tbl_sales_type where status =1";
        return $this->db->mod_select($sql);
    }

//    public function getAllSalesTypesForUpdate($input_array) {
//        print_r($input_array);
////        $sql = "select * from tbl_sales_type where status =1";
////        return $this->db->mod_select($sql);
//    }

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

    public function getAllSalesTypesForUpdate($date) {
        $date_array = explode("-", $date);
        $year = $date_array[0];
        $month = $date_array[1];
        $sql = "select stb.sales_type_budget_id,stb.sales_type_id,st.sales_type_name,stb.budget_amount,stb.year,stb.month,stb.status from tbl_sales_type_budget as stb inner join tbl_sales_type as st on stb.sales_type_id = st.sales_type_id where stb.year=" . $year . " and stb.month=" . $month . " and stb.status=1";
        return $this->db->mod_select($sql);
    }

    public function insertSalesTypeWiseBudget($data_array) {
        $budget_month = $data_array['month_picker'] . "-" . "01";
        $lastDateofSalesTypeBudget = $this->getLastDateofSalesTypeBudget();
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
                    'year' => $year,
                    'month' => $month,
                    'budget_amount' => $data_array['txt_target_amount_' . $i],
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_sales_type_budget', $budget_data);
            }
            $this->db->__endTransaction();
            //echo $this->db->status();
            return $this->db->status();
        }
    }

    public function insertAreaWiseBudget($data_array) {
        $budget_month = $data_array['area_month_picker'] . "-" . "01";
        $lastDateofAreaWiseBudget = $this->getLastDateofAreaWiseBudget();
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
                    'budget_amount' => $data_array['txt_area_amount_' . $i],
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_area_wise_budget', $budget_data);
            }
            $this->db->__endTransaction();
            //echo $this->db->status();
            return $this->db->status();
        }
    }

    public function insertBranchWiseBudget($data_array) {
        $budget_month = $data_array['branch_month_picker'] . "-" . "01";
        $lastDateofBranchWiseBudget = $this->getLastDateofBranchWiseBudget();
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
                    'budget_amount' => $data_array['txt_target_amount_' . $i],
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_branch_wise_budget', $budget_data);
            }
            $this->db->__endTransaction();
            //echo $this->db->status();
            return $this->db->status();
        }
    }

    public function insertSalesOfficerWiseBudget($data_array) {
        print_r($data_array);
        $budget_month = $data_array['sales_person_month_picker'] . "-" . "01";
        $lastDateofSalesOfficerWiseBudget = $this->getLastDateofSalesOfficerWiseBudget();
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
                    'budget_amount' => $data_array['budget_amount_' . $i],
                    'added_date' => date('Y-m-d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                print_r($budget_data);
                $this->db->__beginTransaction();
                $this->db->insertData('tbl_sales_officer_wise_budget', $budget_data);
            }
            $this->db->__endTransaction();
            //echo $this->db->status();
            return $this->db->status();
        }
    }

    public function getLastDateofSalesTypeBudget() {
        $sql = "select year,month from tbl_sales_type_budget where status=1 order by year,month desc limit 1";
        return $this->db->mod_select($sql);
    }

    public function getLastDateofAreaWiseBudget() {
        $sql = "select year,month from tbl_area_wise_budget where status=1 order by year,month desc limit 1";
        return $this->db->mod_select($sql);
    }

    public function getLastDateofBranchWiseBudget() {
        $sql = "select year,month from tbl_branch_wise_budget where status=1 order by year,month desc limit 1";
        return $this->db->mod_select($sql);
    }

    public function getLastDateofSalesOfficerWiseBudget() {
        $sql = "select year,month from tbl_sales_officer_wise_budget where status=1 order by year,month desc limit 1";
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

    public function updateSalesTypeBudget($data_array) {
        print_r($data_array);
    }

}

//Array ( [sales_type_id] => 1 [year] => 2014 [month] => 01 [budget_amount] => 25000 [added_date] => 2014:01:23 [added_time] => 19:42:54 [status] => 1 )
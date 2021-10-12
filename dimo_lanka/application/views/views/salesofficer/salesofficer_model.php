<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class salesofficer_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertSalesOfficer($dataset) {

        $data1 = array(
            "added_date" => date('Y-m-d'),
            "added_time" => date('H:i:s'),
            "sales_officer_account_no" => $dataset['sales_officer_account_no'],
            "branch_id" => $dataset['branch_id'],
            "sales_officer_name" => $dataset['sales_officer_name'],
            "sales_officer_tel" => $dataset['sales_officer_tel'],
            "sales_officer_address" => $dataset['address'],
            "email_address" => $dataset['sales_officer_email'],
            "sales_officer_code" => $dataset['officer_code'],
            "sales_type_id" => $dataset['cmd_SalesOFicType'],
            "status" => '1'
        );
        //print_r($dataset);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_sales_officer", $data1);
        $this->db->__endTransaction();
    }

    public function viewAllSalesOfficer() {
        $sql = "select * from tbl_sales_officer tso left join tbl_branch tb on tso.branch_id=tb.branch_id inner join tbl_sales_type tst on tso.sales_type_id=tst.sales_type_id  where tso.status='1' 
and tso.sales_type_id=tst.sales_type_id
and tso.branch_id=tb.branch_id ORDER BY tso.added_time ASC";
        return $this->db->mod_select($sql);
    }

    function deleteSalesOfficer($id1) {
        $id = $id1;
        $data1 = array(
            "status" => 0
        );
        $where = array(
            "sales_officer_id" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_sales_officer", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getBranchAccountNo($q, $select) {
        $sql = "SELECT * FROM tbl_branch where status='1' and branch_account_no like '%$q%'";
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

    public function updateSalesOfficer($datas) {

        $d1 = $datas['sales_officer_id'];

        $update = array(
            "sales_officer_code" => $data['officer_code'],
            "sales_officer_account_no" => $datas['sales_officer_account_no'],
            "sales_type_id" => $datas['cmd_SalesOFicType'],
            "sales_officer_code" => $datas['officer_code'],
            "branch_id" => $datas['branchid'],
            "sales_officer_name" => $datas['sales_officer_name'],
            "sales_officer_tel" => $datas['sales_officer_tel'],
            "sales_officer_address" => $datas['address'],
            "email_address" => $datas['sales_officer_email']
        );

        $where = array(
            "sales_officer_id" => $d1
        );
        print_r($where);
        $this->db->__beginTransaction();
        $this->db->update("tbl_sales_officer", $update, $where);
        $this->db->__endTransaction();
    }

    public function get_all_branch_name($q, $select) {
        $sql = "select branch_id,branch_name,branch_account_no from tbl_branch WHERE status='1' AND branch_name LIKE '$q%'";
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

    public function viewAllSalesType() {
        $sql = "SELECT sales_type_id,sales_type_name FROM `tbl_sales_type` WHERE status=1";
        return $this->db->mod_select($sql);
    }

}

?>

<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class salesofficer_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    public function insertSalesOfficer($dataset, $typeid) {
        $data1 = array(
            'added_date' => date('Y-m-d'),
            'added_time' => date('H:i:s'),
            'sales_officer_account_no' => $dataset['sales_officer_account_no'],
            'sales_officer_epf_number' => $dataset['sales_officer_epf_number'],
            'branch_id' => $dataset['branch_id'],
            'sales_officer_name' => $dataset['sales_officer_name'],
            'date_of_birth' => $dataset['birthday'],
            'designation' => "$typeid",
            'sales_officer_address' => $dataset['address'],
            'sales_officer_tel_P' => $dataset['P_tel_num'],
            'sales_officer_mobil_P' => $dataset['P_Mobil_num'],
            'email_address_P' => $dataset['P_Email'],
            'sales_officer_tel_O' => $dataset['O_tel_num'],
            'sales_officer_mobil_O' => $dataset['O_Mobil_num'],
            'email_address_O' => $dataset['O_Email'],
            'sales_officer_code' => $dataset['officer_code'],
            'sales_type_id' => $dataset['cmd_SalesOFicType'],
            'status' => '1'
        );

        $query = $this->db->get_where('tbl_sales_officer', array('sales_officer_account_no' => $dataset['sales_officer_account_no'], 'status' => '1'));
        if ($query->num_rows() > 0) {
            return false;
        } else {
            // print_r($dataset);
            $this->db->__beginTransaction();
            $this->db->insertData("tbl_sales_officer", $data1);
            $this->db->__endTransaction();
            return $this->db->status();
        }
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
            'sales_officer_account_no' => $datas['sales_officer_account_no'],
            'sales_officer_epf_number' => $datas['sales_officer_epf_number'],
            'branch_id' => $datas['branch_id'],
            'sales_officer_name' => $datas['sales_officer_name'],
            'date_of_birth' => $datas['birthday'],
            'designation' => "$typeid",
            'sales_officer_address' => $datas['address'],
            'sales_officer_tel_P' => $datas['P_tel_num'],
            'sales_officer_mobil_P' => $datas['P_Mobil_num'],
            'email_address_P' => $datas['sales_officer_email_p'],
            'sales_officer_tel_O' => $datas['O_tel_num'],
            'sales_officer_mobil_O' => $datas['O_Mobil_num'],
            'email_address_O' => $datas['sales_officer_email_o'],
            'sales_officer_code' => $datas['officer_code'],
            'sales_type_id' => $datas['cmd_SalesOFicType']
        );

        $where = array(
            "sales_officer_id" => $d1
        );
        // print_r($where);
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

    public function getALLdestinations() {
        $sql = "select 
    td.des_type, td.des_Id
from
    tbl_designation as td where td.status=1";
        return $this->db->mod_select($sql);
    }

    public function getallDetails($pur_id) {
        $sql = "select 
    tso.sales_officer_name,
    tso.sales_officer_account_no,
    tso.sales_officer_epf_number,   
    tso.date_of_birth,
    tb.branch_name,
    td.des_type,
    tso.sales_officer_address,
    tst.sales_type_name,
    tso.sales_officer_code,
    tb.branch_account_no,
    (tso.sales_officer_tel_O) as Official_tel,
    (tso.sales_officer_mobil_O) as Official_mobil,
    (tso.email_address_O) as Official_Email,
    (tso.sales_officer_tel_P) as pusanal_tel,
    (tso.sales_officer_mobil_P) as pusanal_mobil,
    (tso.email_address_P) as pursanal_Email
from
    tbl_sales_officer as tso
        inner join
    tbl_branch as tb ON tso.branch_id = tb.branch_id
        inner join
    tbl_sales_type as tst ON tso.sales_type_id = tst.sales_type_id
        inner join
    tbl_designation as td ON tso.designation = td.des_Id
where
    tso.sales_officer_id = '$pur_id'
        and tso.status = 1";
        return $this->db->mod_select($sql);
    }

//----------------------------------------------dinesh---------------------------------------------------------
    public function getSalesOfficerData($where, $value) {
        $sql = "select so.*, br.branch_name from tbl_sales_officer so inner join tbl_branch br on so.branch_id = br.branch_id where so." . $where . "=" . $value . " order by so.sales_officer_id ";
        return $this->db->mod_select($sql);
    }

//----------------------------------------------dinesh---------------------------------------------------------
}

?>

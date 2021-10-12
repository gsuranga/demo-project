<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of branch_model
 *
 * @author Iresha Lakmali
 */
class branch_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getAllArea($q, $select) {
        $sql = "select area_id,area_name from tbl_area WHERE area_name LIKE '$q%'";
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

    public function get_all_branch_type($q, $select) {
        $sql = "select branch_type_id,branch_type_name from tbl_branch_type WHERE branch_type_name LIKE '$q%'";
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

    public function viewAllBranch() {

        $sql = "select 
    b.branch_id,
    b.branch_name,
    b.branch_account_no,
    b.added_date,
    b.added_time,
    b.status,
    a.area_name,
    b.area_id,
    b.branch_code,
    tbt.branch_type_name
from
    tbl_branch b
        INNER JOIN
    tbl_area a ON b.area_id = a.area_id
        Left JOIN
    tbl_branch_type tbt ON tbt.branch_type_id = b.branch_type_id
WHERE
    b.status = '1'";
        return $this->db->mod_select($sql);
    }

    public function allSubBranchPopup() {
        $branch_id = $_REQUEST['token_sub_branch'];
        $sql = "select 
    tb.branch_name, tsb.sub_branch_name, tsb.location
from
    tbl_branch tb
        INNER JOIN
    tbl_branch_detail tbd ON tb.branch_id = tbd.branch_id
        INNER JOIN
    tbl_sub_branch tsb ON tsb.sub_branch_id = tbd.sub_branch_id where tbd.branch_id='$branch_id'";
        return $this->db->mod_select($sql);
    }

    public function record_count() {
        $this->db->from('tbl_branch');
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

    public function createBranch($data_Array) {

        $data = array(
            'branch_name' => $data_Array['branch_name'],
            'branch_account_no' => $data_Array['branch_account_no'],
            'area_id' => $data_Array['area_id'],
            'branch_code' => $data_Array['branch_code'],
            'branch_type_id' => $data_Array['txt_branch_type_id'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => '1'
        );
        print_r($data);
        $rows = $data_Array['hidden_sub_branch'];
        $rows++;
        
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_branch", $data);
        $insert_id = $this->db->insert_id();
        echo "aaa".$insert_id;

        for ($x = 1; $x < $rows; $x++) {
            if (isset($data_Array['txt_sub_branch_id_' . $x]) && $data_Array['txt_sub_branch_id_' . $x] != '') {
                $dataArray1 = array(
                    'branch_id' => $insert_id,
                    'sub_branch_id' => $data_Array['txt_sub_branch_id_' . $x],
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'status' => 1
                );
                //print_r($dataArray1);
                $this->db->insertData("tbl_branch_detail", $dataArray1);
            }
        }
       

        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function updateBranch($dataArray) {

        $where = array(
            'branch_id' => $dataArray['u_branch_id']
        );

        $data = array(
            'branch_code' => $dataArray['branch_code'],
            'branch_account_no' => $dataArray['u_branch_account_no'],
            'branch_name' => $dataArray['u_branch_name'],
            'area_id' => $dataArray['area_id']
        );

        $this->db->__beginTransaction();
        $this->db->update("tbl_branch", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function deleteBranch($dataArray) {

        $where = array(
            'branch_id' => $dataArray['u_branch_id']
        );
        $data = array(
            'status' => 0
        );
        $this->db->__beginTransaction();

        $this->db->update("tbl_branch", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function get_all_sub_branch($q, $select) {
        $sql = "select sub_branch_name,sub_branch_id from tbl_sub_branch WHERE  sub_branch_name LIKE '$q%'";
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

    public function getAllBranchType($type) {
        if ($type == 'd') {
            $sql = "SELECT id_item_category , tbl_item_category_name FROM tbl_item_category GROUP BY tbl_item_category_name ";
        } else {
            $sql = "SELECT tbl_item_category.id_item_category,tbl_item_category.tbl_item_category_name 
                FROM tbl_item_category tbl_item_category INNER JOIN tbl_item tbl_item WHERE 
                tbl_item.id_item_category = tbl_item_category.id_item_category GROUP BY tbl_item.id_item_category";
        }

        $query = $this->db->query($sql);
        $result = $query->result();
        return $result;
    }

}

?>

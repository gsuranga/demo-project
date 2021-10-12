<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of apm_model
 *
 * @author Iresha Lakmali
 */
class apm_model extends C_Model {

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

    public function viewAllAPM() {
        $sql = "select branch_name,a.* from tbl_apm a INNER JOIN tbl_branch b ON a.branch_id=b.branch_id WHERE a.status='1'";
        return $this->db->mod_select($sql);
    }

    public function createApm($data_Array) {
       
        $data = array(
            'apm_name' => $data_Array['apm_name'], 
            'apm_address' => $data_Array['apm_address'], 
            'apm_account_no' => $data_Array['apm_account_no'],            
            'branch_id' => $data_Array['branch_id'],
            'apm_telP' => $data_Array['ptel'],
            'apm_tel_O' => $data_Array['otel'],
            'apm_mobile_P' => $data_Array['pmobile'],
            'apm_mobile_O' => $data_Array['omobile'],
            'email_address_P' => $data_Array['pemail'],
            'email_address_O' => $data_Array['oemail'],
            'apm_code' => $data_Array['apm_code'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
        print_r($data);

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_apm", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function updateApm($dataArray) {

        $where = array(
            'apm_id' => $dataArray['m_apm_id']
        );
     

        $data = array(
            'apm_code' => $dataArray['apm_code'],
            'apm_name' => $dataArray['m_apm_name'],
            'apm_address' => $dataArray['m_apm_address'],
            'apm_account_no' => $dataArray['m_apm_account_no'],
             'apm_telP' => $dataArray['ptel'],
            'apm_tel_O' => $dataArray['otel'],
            'apm_mobile_P' => $dataArray['pmobile'],
            'apm_mobile_O' => $dataArray['omobile'],
            'email_address_P' => $dataArray['pemail'],
            'email_address_O' => $dataArray['oemail'],
            
            'branch_id' => $dataArray['branch_id']
        );
        
       
     

        $this->db->__beginTransaction();
        $this->db->update("tbl_apm", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function deleteApm($id) {
        $where = array(
            'apm_id' => $id
        );
       
        $data = array(
            'status' => 0
        );
    
        $this->db->__beginTransaction();

        $this->db->update("tbl_apm", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
     public function getGPSdetails_set($pur_id) {      
        $sql = "SELECT `apm_address`,`apm_telP`,`apm_tel_O`,`apm_mobile_P`,`apm_mobile_O`,`email_address_P`,`email_address_O` FROM `tbl_apm` where`apm_id`='$pur_id'";
        return $this->db->mod_select($sql);
    }



}

?>

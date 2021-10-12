<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of bank_model
 *
 * @author Iresha Lakmali
 */
class bank_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllBank() {
        $sql = "select bank_id,bank_name,status from tbl_bank WHERE status='1'";
        return $this->db->mod_select($sql);
    }

    public function createBank($data_Array) {
        $data = array(
            'bank_name' => $data_Array['bank_name'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'status' => 1
        );
         $query = $this->db->get_where('tbl_bank', array('bank_name' => $data_Array['bank_name'], "status" => "1"));

        if ($query->num_rows() > 0) {

            return false;
        } else {
        
        
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_bank", $data);
        $this->db->__endTransaction();
        return $this->db->status();
        }
    }

    public function deleteBank($id) {
        $where = array(
            'bank_id' => $id
        );
        //print_r($where);
        $data = array(
            'status' => 0
        );
        //print_r($data);
        $this->db->__beginTransaction();

        $this->db->update("tbl_bank", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function updateBank($dataArray) {
        $where = array(
            'bank_id' => $dataArray['m_bank_id']
        );
        //print_r($where);

        $data = array(
            'bank_name' => $dataArray['m_bank_name'],
        );
        //print_r($data);
        $this->db->__beginTransaction();
        $this->db->update("tbl_bank", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getBank() {
        $sql = "SELECT bank_name,bank_id FROM tbl_bank WHERE status='1'";
        return $result = $this->db->mod_select($sql);
    }

}

?>

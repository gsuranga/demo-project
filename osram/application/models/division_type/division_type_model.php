<?php

/**
 * Description of division_type_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class division_type_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertDivisionType($datapack) {
      //  $date = new DateTime();

        $data = array(
            "tbl_division_type_name" => "$datapack",
            "division_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_division_type", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateDivisionType1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateDivisionType1($data) {
        $id = $data['division_type_id'];
        $data = array(
            "tbl_division_type_name" => $data['division_type']
        );
        $where = array(
            "id_division_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_division_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteDivisionType1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteDivisionType1($id1) {
        $id = $id1;
        $data1 = array(
            "division_status" => 0
        );
        $where = array(
            "id_division_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_division_type", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function viewDivisionTypeByFilterKey1($data) {
        //print_r($data);
        $division_type = $data['division_type_name'];
        $division_status = $data['status_name'];
        $data = array();
        $query = "SELECT id_division_type,tbl_division_type_name,division_status,added_date,added_time FROM tbl_division_type WHERE  tbl_division_type_name LIKE  '%$division_type%'
AND  division_status LIKE  '%$division_status%'";

        $result = $this->db->mod_select($query, $data, PDO::FETCH_ASSOC);
        return $result;
    }
    public function get_division_type($q){
        $divition_type=$q['tbl_division_type_name'];
        $sql="select tbl_division_type_name from tbl_division_type where tbl_division_type_name='$divition_type' and division_status='1'";
        $resullt=$this->db->mod_select($sql);
        return $resullt;
    }

}

?>

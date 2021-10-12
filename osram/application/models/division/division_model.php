<?php

/**
 * Description of division_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class division_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertDivision($datapack) {
       // $date = new DateTime();
        $data = array(
            "division_name" => $datapack['divisionname'],
            "id_parentdivision" => $datapack['parent_division_id'],
            "division_type_id" => $datapack['division_type'],
            "division_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_division", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function getAllDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getAllDivision() {
        $result = $this->db->mod_select("SELECT *,tdt.tbl_division_type_name as tbl_division_type_name,(select division_name from tbl_division where id_division=t.id_parentdivision) as parentdivision_name FROM tbl_division t inner join tbl_division_type tdt where t.division_type_id=tdt.id_division_type AND t.division_status=1;");
        return $result;
    }

    /**
     * Function get_Division_From_Division_ID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function get_Division_From_Division_ID($dataset) {

        $result = $this->db->mod_select("SELECT *,tdt.tbl_division_type_name as tbl_division_type_name,(select division_name from tbl_division where id_division=t.id_parentdivision) as parentdivision_name FROM tbl_division t inner join tbl_division_type tdt where t.division_type_id=tdt.id_division_type AND t.id_division=$dataset AND t.division_status=1;");
        return $result;
    }

    /**
     * Function updateDivision1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateDivision1($data) {
        $id = $data['division_id'];
        print_r($id);
        $data = array(
            "division_name" => $data['divisionname'],
            "id_parentdivision" => $data['parent_division'],
            "division_type_id" => $data['division_type'],
        );
        $where = array(
            "id_division" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_division", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteDivision1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteDivision1($id1) {
        $id = $id1;
        $data1 = array(
            "division_status" => 0
        );
        $where = array(
            "id_division" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_division", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function viewDivisionByFilterKey1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivisionByFilterKey1($data) {

        $division_type = $data['division_type_name'];
        $division_status = $data['status_name'];
        $division_name = $data['division_name1'];

        $result = $this->db->mod_select("SELECT (select division_name from tbl_division where id_division=td.id_parentdivision) as parentdivision_name,(select tbl_division_type_name from
tbl_division_type where id_division_type=td.division_type_id) as tbl_division_type_name,td.* FROM tbl_division td inner join tbl_division_type tdt
 where td.division_type_id=tdt.id_division_type AND td.division_type_id LIKE '%$division_type%' AND td.division_status LIKE '%$division_status%' AND td.division_name LIKE '%$division_name%';");
        return $result;
    }

}

?>

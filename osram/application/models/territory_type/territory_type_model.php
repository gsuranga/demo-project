<?php

/**
 * Description of territory_type_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class territory_type_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertTerritoryType
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertTerritoryType($datapack) {
      //  $date = new DateTime();

        $data = array(
            "territory_type_name" => "$datapack",
            "territory_type_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_territory_type", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateTerritoryType1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updateTerritoryType1($data) {
        $id = $data['territory_type_id'];
        $data = array(
            "territory_type_name" => $data['territory_type']
        );
        $where = array(
            "id_territory_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_territory_type", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteTerritoryType1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deleteTerritoryType1($id1) {
        $id = $id1;
        $data1 = array(
            "territory_type_status" => 0
        );
        $where = array(
            "id_territory_type" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_territory_type", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function viewTerritoryTypeByFilterKey1($data) {
        // print_r($data);
        $territory_type_name = $data['territory_type_name'];
        $territory_status = $data['status_name'];
        $query = "SELECT `id_territory_type`,`territory_type_name`,`added_date`,`added_time`,`territory_type_status` FROM `tbl_territory_type` WHERE `territory_type_name` LIKE '%$territory_type_name%' AND `territory_type_status` LIKE '%$territory_status%'";
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
    }

 function get_territory_type($q){
        $territory_type=$q['territory_type_name'];
        $sql="select territory_type_name from tbl_territory_type where territory_type_name='$territory_type' and territory_type_status='1'";
        $result=$this->db->mod_select($sql);
        return $result;
    }

}

?>

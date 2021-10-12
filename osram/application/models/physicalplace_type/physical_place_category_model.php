<?php

/**
 * Description of physical_place_category_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class physical_place_category_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertPhysicalPalceCategory1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertPhysicalPalceCategory1($datapack) {
        //$date = new DateTime();

        $data = array(
            "physical_place_category_name" => "$datapack",
            "physical_place_category_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_physical_place_category", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updatePhysicalPalceCategory1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updatePhysicalPalceCategory1($data) {
        $id = $data['physical_place_category__id'];
        $data = array(
            "physical_place_category_name" => $data['physical_place_category']
        );
        $where = array(
            "id_physical_place_category" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_physical_place_category", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deletePhysicalPalceCategory1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deletePhysicalPalceCategory1($id1) {
        $id = $id1;
        $data1 = array(
            "physical_place_category_status" => 0
        );
        $where = array(
            "id_physical_place_category" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_physical_place_category", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function viewPhysicalTypeByFilterKey($data) {
        $physical_place_name = $data['physical_place_category_name'];
        $PhysicalType = $data['status_name'];

        $query="SELECT `id_physical_place_category`,`physical_place_category_name`,`physical_place_category_status`,`added_date`,`added_time` FROM `tbl_physical_place_category` WHERE `physical_place_category_name` LIKE '%$physical_place_name%' AND `physical_place_category_status` LIKE '%$PhysicalType%'";
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
      
    }
 function viewAllPhysicalType() {
        $query="SELECT  * FROM `tbl_physical_place_category` WHERE physical_place_category_status=1";
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
      
    }
    function physical_place_category($q){
        $physical_place=$q['physical_place_category_name'];
        $sql="select physical_place_category_name from tbl_physical_place_category where physical_place_category_name='$physical_place' and physical_place_category_status='1'";
        $result=$this->db->mod_select($sql);
        return $result;
    }
}

?>

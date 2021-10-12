<?php

/**
 * Description of physical_place_model
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class physical_place_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function getAllPhysicalPlace
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getAllPhysicalPlace() {

        $result = $this->db->mod_select("SELECT *,tdt.physical_place_category_name as physical_place_category_name FROM tbl_physical_place t inner join tbl_physical_place_category tdt where t.id_physical_place_category=tdt.id_physical_place_category AND t.physical_place_status=1;");
        return $result;
    }

    /**
     * Function getAllPhysicalPlaceFromID
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    public function getAllPhysicalPlaceFromID($Id) {

        $result = $this->db->mod_select("SELECT *,tdt.physical_place_category_name as physical_place_category_name FROM tbl_physical_place t inner join tbl_physical_place_category tdt where t.id_physical_place_category=tdt.id_physical_place_category AND t.id_physical_place=$Id AND t.physical_place_status=1;");
        return $result;
    }

    /**
     * Function insertPhysicalPalce1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function insertPhysicalPalce1($datapack) {
       // $date = new DateTime();

        $data = array(
            "id_physical_place_category" => $datapack['physical_place_type'],
            "physical_place_name" => $datapack['physical_place_name'],
            "physical_place_address" => $datapack['physical_place_address'],
            "physical_place_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_physical_place", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updatePhysicalPalce1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function updatePhysicalPalce1($data) {
        $id = $data['physical_place_id'];
        $data = array(
            "id_physical_place_category" => $data['physical_place_type'],
            "physical_place_name" => $data['physical_place_name'],
            "physical_place_address" => $data['physical_place_address']
        );
        $where = array(
            "id_physical_place" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_physical_place", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deletePhysicalPalce1
     *
     * insert Permission Data
     *
     * @param datapack
     * @return data about Permission
     */
    function deletePhysicalPalce1($id1) {
        $id = $id1;
        $data1 = array(
            "physical_place_status" => 0
        );
        $where = array(
            "id_physical_place" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_physical_place", $data1, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function viewPhysicalByFilterKey($data) {
        $PhysicalPlaceName = $data['PhysicalPlaceName'];

        $Physical_place_name = $data['Physical_place_name'];
        $Physical_place_status = $data['status_name'];

        $result = $this->db->mod_select("SELECT tp.id_physical_place,tp.id_physical_place_category,tp.physical_place_name,tp.physical_place_address,tp.added_date,tp.physical_place_status,tp.added_time,
tpc.physical_place_category_name,tpc.id_physical_place_category FROM tbl_physical_place tp INNER JOIN tbl_physical_place_category tpc WHERE tpc.id_physical_place_category=tp.id_physical_place_category AND tp.id_physical_place_category LIKE '%$Physical_place_name%' AND tp.physical_place_name LIKE '%$PhysicalPlaceName%' AND tp.physical_place_status LIKE '%$Physical_place_status%'");
        return $result;
    }

}

?>

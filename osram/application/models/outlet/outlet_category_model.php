<?php

/**
 * Description of outlet_category_model
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class outlet_category_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertOutlet_category
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertOutlet_category($datapack) {


        $data = array(
            "outlet_category_name" => "$datapack",
            "outlet_category_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_outlet_category", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteOutletCategoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteOutletCategoryType($id) {


        $data = array(
            "outlet_category_status" => 0
        );
        $where = array(
            "id_outlet_category" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_outlet_category", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateOutletCategoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateOutletCategoryType($data) {
        $id = $data['id_outlet_category'];
        $data = array(
            "outlet_category_name" => $data['outlet_type'],
        );
        $where = array(
            "id_outlet_category" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_outlet_category", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function viewOutletCategoryByFilterKey($data) {

        $Outlet_category_type = $data['Outlet_category_type'];
        $outlet_category_status = $data['status_name'];
$query="SELECT `id_outlet_category`,`outlet_category_name`,`outlet_category_status`,`added_date`,`added_time` FROM `tbl_outlet_category` WHERE `outlet_category_name` LIKE '%$Outlet_category_type%' AND `outlet_category_status` LIKE '%$outlet_category_status%'";
        $data2 = array();
        $result = $this->db->mod_select($query, $data2, PDO::FETCH_ASSOC);
        return $result;
    }     function get_outlet_category_name($q){
        $get_outlet_category_name=$q['outlet_category_name'];
        $sql="select 
    outlet_category_name
from
    tbl_outlet_category
where
    outlet_category_name ='$get_outlet_category_name' and outlet_category_status='1'";
        $result=$this->db->mod_select($sql);
        return $result;       
    } 

}

?>

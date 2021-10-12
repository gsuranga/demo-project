<?php

/**
 * Description of item_category_model
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class item_category_model extends C_Model {

    function __construct() {

        parent::__construct();
    }

    /**
     * Function insertItemCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertItemCategory($dataset) {
        $data_insert = array(
            'tbl_item_category_name' => $dataset['item_name'],
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s'),
            'tbl_item_category_status' => '1',
            'id_brand'=>$dataset['brandName']
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_item_category", $data_insert);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateItemcategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateItemcategory($dataset) {


        $id = $dataset['itemid'];
        $dataset = array(
            "tbl_item_category_name" => $dataset['itemname'],
            "id_brand"=>$dataset['Bname']    
        );
        $where = array(
            "id_item_category" => $id
        );
        //print_r($dataset);
        $this->db->__beginTransaction();
        $this->db->update("tbl_item_category", $dataset, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteItemcategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteItemcategory($item_id) {

        $data_delete = array(
            "tbl_item_category_status" => 0
        );
        $where = array(
            "id_item_category" => $item_id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_item_category", $data_delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    function getBrandName(){
        $sql="SELECT `item_brand_id`,`brand_name` FROM `tbl_item_brand` WHERE `brand_staus`=1";
        $result=$this->db->mod_select($sql);
        return $result;
    }
    function getAllCategory(){
        $sql="select 
    id_item_category, ic.tbl_item_category_name, ib.brand_name,item_brand_id
from
    tbl_item_category ic
inner join
	tbl_item_brand ib on ic.id_brand= ib.item_brand_id
where
    ic.tbl_item_category_status = 1";
        $result=$this->db->mod_select($sql);
        return $result;        
    }
}

?>

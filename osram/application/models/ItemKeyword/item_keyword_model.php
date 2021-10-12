<?php

/**
 * Description of item_keyword_model
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class item_keyword_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function insertItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertItemKeyword($datapack) {
        

        $data = array(
            "item_keyword" => "$datapack",
            "item_keyword_status" => 1
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_item_keyword", $data);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function deleteItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteItemKeyword($id) {


        $data = array(
            "item_keyword_status" => 0
        );
        $where = array(
            "id_item_keyword" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_item_keyword", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateItemKeyword($data) {
        $id = $data['id_item_keyword'];
        $data = array(
            "item_keyword" => $data['item_keyword'],
        );
        $where = array(
            "id_item_keyword" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_item_keyword", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function registerItemhasKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function registerItemhasKeyword($post_data) {
        $key_word = array(
            "id_item" => $post_data['id_item'], //id_item_keyword
            "id_item_keyword" => $post_data['id_item_keyword']
        );


        $this->db->__beginTransaction();
        $this->db->insert("tbl_item_has_item_keyword", $key_word);
        $this->db->__endTransaction();
        return $this->db->status();
    }

}

?>

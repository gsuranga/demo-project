<?php

/**
 * Description of batch_model
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class batch_model extends C_Model {

    function __construct() {

        parent::__construct();
    }

    /**
     * Function insertBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertBatch($dataset) {


        $data_insert = array(
            'batch_no' => $dataset['batchno'],
            'expiry_date' => $dataset['expdate'],
            'batch_status' => '1'
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_batch", $data_insert);
        $this->db->__endTransaction();
        return $this->db->status();
       
    }

    /**
     * Function deleteBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteBatch($item_id) {

        $data_delete = array(
            "batch_status" => 0
        );
        $where = array(
            "id_batch" => $item_id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_batch", $data_delete, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    /**
     * Function updateBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateBatch($dataset) {


        $id = $dataset['itemid'];
     $dataset = array(
            "batch_no" => $dataset['itemname'],
            "expiry_date" => $dataset['exp_date']
        );
        $where = array(
            "id_batch" => $id
        );
        //print_r($dataset);
        $this->db->__beginTransaction();
        $this->db->update("tbl_batch", $dataset, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

 public function get_batch_no($q) {
$batch_no=$q['batch_no'];
        
       $sql = "select batch_no from tbl_batch where batch_status='1' and batch_no = '$batch_no'";
//        echo $_REQUEST['item_no'];
        $result = $this->db->mod_select($sql);

        return $result;
    }

}

?>

<?php

/**
 * Description of batch_model
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class bank_model extends C_Model {

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
    function insertBank($dataset) {
        print_r("h ubuh8hun");
        echo date('yy-MM-dd');
        $data_insert = array(
            'bank_name' => $dataset['bankName'],
            'bank_status' => 1,
            'added_date' => date('Y:m:d'),
            'added_time' => date('H :i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_bank", $data_insert);
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
    function deleteBank($bank_id) {

        $data_delete = array(
            "bank_status" => 0
        );
        $where = array(
            "id_bank" => $bank_id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_bank", $data_delete, $where);
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
    function updateBank($dataset) {


        $id = $dataset['itemid'];
        $dataset = array(
            "batch_no" => $dataset['itemname'],
            "expiry_date" => $dataset['expdate']
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
    
    public function getAllBank() {
        $result = $this->db->mod_select("SELECT * from tbl_bank where bank_status='1'");
        return $result;
    }
    
    public function getBank(){
        $column = array('bank_status' => '1');
        $sql = "SELECT bank_name,id_bank FROM tbl_bank WHERE bank_status=:bank_status";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }
    
        public function get_bank_name($q){
        $bank_name=$q['bank_name'];
        $sql="select bank_name from tbl_bank where bank_name='$bank_name' and bank_status='1'";
        $result=$this->db->mod_select($sql);
        return $result;
    }

}

?>

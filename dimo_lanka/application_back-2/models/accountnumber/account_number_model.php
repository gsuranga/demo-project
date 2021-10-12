<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of account_number_model
 *
 * @author Iresha Lakmali
 */
class account_number_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function viewAllAccountNumber($config, $page) {
        $sql = "select * from tbl_accnum LIMIT $page,$config";
        return $this->db->mod_select($sql);
    }
    
    public function record_count(){
         $this->db->from('tbl_accnum');
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }

}

?>

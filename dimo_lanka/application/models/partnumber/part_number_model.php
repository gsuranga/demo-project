<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of part_number_model
 *
 * @author Iresha Lakmali
 */
class part_number_model extends C_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    public function viewAllPartNumber($config, $page){
        $sql = "select * from tbl_partnumbers LIMIT $page,$config";
        return $this->db->mod_select($sql);
    }
    
    public function record_count(){
        $this->db->from('tbl_partnumbers');
        $query = $this->db->get();
        return $rowcount = $query->num_rows();
    }
}

?>

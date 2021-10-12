<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class vat_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getvatamount() {
        $sql = "SELECT * FROM tbl_vat";
        return $this->db->mod_select($sql);
    }
    public function update_vat($id,$amount){
   
        $sql="Update tbl_vat set amount=$amount where id_vat=$id";
        $this->db->mod_select($sql);
    }
}

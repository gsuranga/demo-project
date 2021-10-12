<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of serverdetails
 *
 * @author KANISHKA
 */
class serverdetails_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getdiscount($delar_account_no = 0) {
        $sql = "SELECT td.discount_percentage,tv.amount FROM tbl_dealer td INNER JOIN tbl_vat tv WHERE td.status=1 and td.delar_account_no='$delar_account_no'";
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
    }

}

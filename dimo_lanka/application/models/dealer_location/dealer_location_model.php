<?php

/* dealer_location_model
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class dealer_location_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function get_dealer_location() {
        $sql = "select
    td.delar_id,        
    td.delar_name,
    td.latitude,
    td.longitude,
    td.credit_limit,
    td.delar_code,
    td.delar_shop_name
from
    tbl_dealer as td
where
    td.status = 1";
        return $this->db->mod_select($sql);
    }

    public function set_dealer_details($dealer_id) {
        $sql = "select 
    tso.sales_officer_name,
    td.delar_name,
    td.delar_code,
    td.credit_limit,
    td.delar_address,
    td.business_address,
    td.nic_no,
    td.passport_no
from
    tbl_dealer as td
        inner join
    tbl_sales_officer as tso ON td.sales_officer_id = tso.sales_officer_id
where
    td.status = 1 and td.delar_id=$dealer_id";
        return $this->db->mod_select($sql);
    }

}

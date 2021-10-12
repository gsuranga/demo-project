<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of stock_take_model
 *
 * @author chathun
 */
class market_survey_model extends C_Model{
    
    function __construct() {
        parent::__construct();
    }
    
    public function getmarketsurvey(){
          if (isset($_REQUEST['id_item']) && $_REQUEST['id_item'] != "") {
            $id = $_REQUEST['id_item'];
           $append="and tbl_products.id_products='$id'";
        }
        
        
        $query = "SELECT tbl_market_survey.company,tbl_market_survey.datetime,tbl_market_survey.quantity,tbl_item
.item_name,tbl_outlet
.outlet_name FROM tbl_market_survey INNER JOIN tbl_products ON tbl_products.id_products=tbl_market_survey.id_products INNER JOIN tbl_item ON tbl_item.id_item=tbl_products.iditem INNER JOIN  tbl_outlet ON tbl_outlet.id_outlet=tbl_market_survey.id_outlet WHERE tbl_outlet
.outlet_status='1' {$append}";
        return $result = $this->db->mod_select($query);
    }

public function getItemNames($tbl_item, $select){
    
     $sql="SELECT 
    tbl_item.item_name,
	tbl_products.id_products
FROM
    tbl_market_survey
        INNER JOIN
    tbl_products ON tbl_products.id_products = tbl_market_survey.id_products
        INNER JOIN
    tbl_item ON tbl_item.id_item = tbl_products.iditem
where
tbl_item.item_status=1
and tbl_item.item_name like '$tbl_item%' group by tbl_products.id_products ";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();
        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }
        return $json_array;
}
}
?>

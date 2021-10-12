<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of dealer_stock_report_model
 *
 * @author HASARA
 */
class dealer_stock_report_model extends C_Model {
    
    public function __construct() {
        parent::__construct();
    }
    
    public function viewAll() {
        $append = '';
     if(isset($_POST['itemid']) && $_POST['itemid'] != 0){
         $append = "it.item_id='{$_POST['itemid']}' and";
     }
             $sql =    "select 
    td.delar_name,
    td.delar_account_no,
    so.sales_officer_name,
    ds.remaining_qty,
    @movement_to_the_dealer_qty:=round(ifnull((select 
                            sum(tals.qty)
                        from
                            tbl_all_sales tals
                                inner join
                            tbl_item ti ON tals.part_no = ti.item_part_no
                                and tals.status = 1
                                and ti.status = 1
                                inner join
                            tbl_dealer td1 ON tals.acc_no = td1.delar_account_no
                                and td1.status = 1
                        where
                            ti.item_id = it.item_id
                                and td1.delar_id = td.delar_id
                                ),
                    0),
            2) as last_invoice_qty,

    round(ifnull((@movement_to_the_dealer_qty / 6), 0),
            2) as movement_to_the_dealer_avg,
ifnull((select max(date_edit) as date_edit from tbl_all_sales al
 where al.all_sales_id = ts.all_sales_id
         group by all_sales_id),'-')as last_invoice_date,
       
@movement_to_the_customer_qty:=round(ifnull((select 
                            sum(tds.qty)
                        from
                            tbl_dealer_sales tds
                        where
                            tds.status = 1
                                and tds.id_item = it.item_id
                                and tds.id_dealer = td.delar_id
                                ),
                    0),
            2) as movement_to_the_customer_qty,

    round(ifnull((@movement_to_the_customer_qty / 6), 0),
            2) as movement_to_the_customer_avg

from
    tbl_dealer_stock ds
        inner join
    tbl_item it ON ds.part_id = it.item_id
 
        inner join
    tbl_dealer td ON ds.dealer_id = td.delar_id
inner join
tbl_sales_officer so on so.sales_officer_id =td.sales_officer_id
left join
tbl_all_sales ts on ts.part_no=it.item_part_no 
where
{$append}

    ds.status = 1 
group by it.item_id  ORDER BY movement_to_the_dealer_avg DESC ";
         //   echo $sql;
     //TE279005110103
   return $this->db->mod_select($sql);
    }   

     public function getAllPartNumbers($q, $select) {
        $sql = "select ti.item_id, ti.item_part_no, ti.description, ti.model from tbl_item ti where status=1 and ti.item_part_no like '" . $q . "%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]) . " " . stripslashes($row[$select[2]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function getAllPartDescription($q, $select) {
        $sql = "select ti.item_id, ti.item_part_no, ti.description, ti.model from tbl_item ti where status=1 and ti.description like '" . $q . "%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]) . "    " . stripslashes($row[$select[2]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }
    
//    public function getmode($q, $select) {
//        $sql = "SELECT * FROM tbl_item where status='1' and description like '$q%' limit 10";
//        $query = $this->db->query($sql);
//        $result = $query->result('array');
//        $json_array = array();
//
//        foreach ($result as $row) {
//            $new_row = array();
//            $new_row['label'] = htmlentities(stripslashes($row[$select[0]]));
//            foreach ($select as $element) {
//                $new_row[$element] = htmlentities(stripslashes($row[$element]));
//            }
//            array_push($json_array, $new_row);
//        }
//
//        return $json_array;
//    }
    //put your code here
}



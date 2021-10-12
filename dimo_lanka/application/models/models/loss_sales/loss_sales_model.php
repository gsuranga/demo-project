<?php

class loss_sales_model extends CI_Model {

    public function get_current_date() {
        $curDate = $this->db->mod_select('SELECT curdate() AS curdate;');
        return substr($curDate[0]->curdate, 0, 7);
    }

    public function loss_sales() {
        $month_loss_sale;
        $append = "";

        if ($_REQUEST == null)
            $month_loss_sale = $this->get_current_date();
        elseif ($_REQUEST['view'] == 3)
            $month_loss_sale = $_REQUEST['month_selected'];
        else {
            $month_loss_sale = $_REQUEST['month_selected'];
            if ($_REQUEST['view'] != 0)
                $append = "AND ls.loss_type = " . $_REQUEST['view'];
        }


        $query = "SELECT
    (SELECT
            d.delar_name
        FROM
            tbl_dealer d
        WHERE
            d.delar_id = ls.dealer_id) AS dealer,
    (SELECT
            it.item_part_no
        FROM
            tbl_item it
        WHERE
            it.item_id = ls.part_id) AS part,
    ls.loss_qty,
    ls.loss_type
FROM
    tbl_dealer_loss_sales ls
WHERE
    ls.loss_date BETWEEN '" . $month_loss_sale . "-01' AND '" . $month_loss_sale . "-31'
        AND ls.status = 1 " . $append;

        $result = $this->db->mod_select($query);
        $return_array = array();
        $return_array['result'] = $result;
        $return_array['date'] = $month_loss_sale;

        return $return_array;
//        ***********************  Populate tables
// echo "<br>" + $curDate[0]->'curdate()';
//        $table = 'tbl_dealer_loss_sales';
//        for ($i = 0; $i < 250; $i++) {
//            $dealer_id = rand(1, 509);
//            $part_id = rand(1, 96);
//            $loss_qty = rand(1, 25);
//            $loss_type = rand(1, 2);
//
//            $loss_date = '2014' . '-' . rand(1, 4) . '-' . rand(1, 28);
//
//            $set = array('dealer_id' => $dealer_id, 'part_id' => $part_id, 'loss_qty' => $loss_qty, 'loss_type' => $loss_type, 'loss_date' => $loss_date);
//            $this->db->insertData($table, $set);
//        }
//        ***********************  Populate tables
    }

}

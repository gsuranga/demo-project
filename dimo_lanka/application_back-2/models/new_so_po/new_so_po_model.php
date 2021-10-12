<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class new_so_po_model extends C_Model {

    public function __construct() {
        parent::__construct();
        date_default_timezone_set('Asia/Colombo');
    }

    public function setsalesofficer() {

        $emp_id = $this->input->get('emp_idd');

        $sql = "select * from tbl_sales_officer where sales_officer_id=$emp_id";
        return $this->db->mod_select($sql);
    }

    public function get_dealer_name($q, $select) {
        $employee_id = $this->session->userdata('employe_id');
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_name like '$q%' and sales_officer_id=$employee_id";
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

    public function get_dealer_account_number($q, $select) {
        $employee_id = $this->session->userdata('employe_id');
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_account_no like '$q%' and sales_officer_id=$employee_id";
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

    public function get_dealer_shop_name($q, $select) {
        $employee_id = $this->session->userdata('employe_id');
        $sql = "SELECT * FROM tbl_dealer where status='1' and delar_shop_name like '$q%' and sales_officer_id=$employee_id ";
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

    public function get_part_description($q, $select) {
        $sql = "SELECT item_id,item_part_no,description,selling_price,total_stock_qty FROM tbl_item where status='1' and description like '$q%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]] . ' ' . $row[$select[1]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function get_part_no($q, $select) {
        $sql = "SELECT item_id,item_part_no,description,selling_price,total_stock_qty FROM tbl_item where status='1' and item_part_no like '$q%' limit 10";
        $query = $this->db->query($sql);
        $result = $query->result('array');
        $json_array = array();

        foreach ($result as $row) {
            $new_row = array();
            $new_row['label'] = htmlentities(stripslashes($row[$select[0]] . ' ' . $row[$select[1]]));
            foreach ($select as $element) {
                $new_row[$element] = htmlentities(stripslashes($row[$element]));
            }
            array_push($json_array, $new_row);
        }

        return $json_array;
    }

    public function get_sold_part_detal($dealer_id) {
//        $sql = "SELECT
// tbl_item.item_id AS ITEMID,tbl_item.selling_price,
//@add_DAT:=tbl_item.added_date AS ADDEDDATE,
//tbl_item.item_part_no AS Part_Number,
//tbl_item.description AS Description,
//tbl_item.total_stock_qty AS Available_Stocks_at_VSD,
//tbl_dealer_sales.id_dealer AS DEALERID,
//@areaID:=((SELECT tbl_branch.area_id FROM tbl_dealer tbl_dealer LEFT JOIN tbl_branch tbl_branch ON tbl_dealer.branch_id=tbl_branch.branch_id WHERE tbl_dealer.delar_id=DEALERID )) AS AREAID,
//@astock:=ifnull((SELECT remaining_qty FROM tbl_dealer_stock WHERE timestamp=(SELECT max(timestamp) FROM tbl_dealer_stock WHERE dealer_id=DEALERID AND part_id=ITEMID AND status=1)),0 )AS Available_Stocks_at_the_Dealer ,
//(SELECT  first_stock_date FROM tbl_dealer_stock where part_id=ITEMID AND timestamp=(SELECT  max(timestamp) FROM tbl_dealer_stock where part_id=ITEMID  ) AND dealer_id=DEALERID AND status=1) AS first_stock_date,
//@asales:=((SELECT sum(qty) FROM tbl_dealer_sales where id_dealer=DEALERID AND id_item=ITEMID AND sold_date BETWEEN first_stock_date AND CURDATE() ) /(SELECT TIMESTAMPDIFF (MONTH,first_stock_date,CURDATE() ) )) AS  avg_monthly_sale,
//@30daysales:=ifnull(((SELECT sum(qty) FROM tbl_dealer_sales where id_dealer=DEALERID AND id_item=ITEMID AND sold_date BETWEEN (DATE_ADD(CURDATE() ,INTERVAL -30 DAY)) AND CURDATE() ) ) ,0) AS Total_Sales_for_last_30days,
//@stocklost:=ifnull(((SELECT SUM(loss_qty) FROM tbl_dealer_loss_sales where loss_type=1 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID AND time_stamp=(SELECT MAX(time_stamp) FROM tbl_dealer_loss_sales where loss_type=1 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID )) ),0)AS Stocklostsales,
//@valuelost:=ifnull(((SELECT SUM(loss_qty) FROM tbl_dealer_loss_sales where loss_type=2 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID AND time_stamp=(SELECT MAX(time_stamp) FROM tbl_dealer_loss_sales where loss_type=2 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID ))),0) AS Valuelostsales,
//@avgdailydemand:=( ifnull((@stocklost+@30daysales)/10,0) )as AverageDailyDemand,@daybetweenorder:=(10) AS Daysbetweenorders,((@avgdailydemand*@daybetweenorder)-@astock) SsuggestedQty,@purorderqty:=((SELECT sum(item_qty) FROM tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail LEFT JOIN tbl_dealer_purchase_order tbl_dealer_purchase_order ON tbl_dealer_purchase_order_detail.purchase_order_id=tbl_dealer_purchase_order.purchase_order_id WHERE tbl_dealer_purchase_order.dealer_id=DEALERID  AND 	tbl_dealer_purchase_order.status=1 AND tbl_dealer_purchase_order.date BETWEEN    (DATE_ADD(CURDATE() ,INTERVAL -90 DAY))  AND CURDATE() AND tbl_dealer_purchase_order_detail.item_id=ITEMID)) AS purorderqty,@deliverqty:=((SELECT sum(tbl_delar_deliver_order_detail.quantity) FROM  tbl_delar_deliver_order_detail  tbl_delar_deliver_order_detail LEFT JOIN  tbl_dealer_deliver_order  tbl_dealer_deliver_order ON tbl_delar_deliver_order_detail.deliver_order_id=tbl_dealer_deliver_order.deliver_order_id where tbl_dealer_deliver_order.dealer_id=DEALERID AND tbl_dealer_deliver_order.status=1 AND tbl_delar_deliver_order_detail.status=1 AND tbl_delar_deliver_order_detail.part_id=ITEMID) )As deliverqty,ifnull((@purorderqty-@deliverqty),0) AS unsuppliedorderqtyfor90day,ifnull(((SELECT sum(tbl_dealer_sales.qty) FROM tbl_dealer_sales tbl_dealer_sales LEFT JOIN tbl_dealer tbl_dealer ON  tbl_dealer_sales.id_dealer=tbl_dealer.delar_id JOIN tbl_branch tbl_branch ON tbl_dealer.branch_id=tbl_branch.branch_id where tbl_dealer_sales.status=1 AND tbl_branch.status=1 AND tbl_branch.area_id=@areaID AND tbl_dealer_sales.id_item=ITEMID)/(SELECT TIMESTAMPDIFF (MONTH,@add_DAT,CURDATE() ) )) ,0)AS movement_in_area_per_month,@last_purchase_order_date:=((SELECT date FROM  tbl_dealer_purchase_order WHERE tbl_dealer_purchase_order.purchase_order_id=(SELECT max(tbl_dealer_purchase_order_detail.purchase_order_id) FROM tbl_dealer_purchase_order tbl_dealer_purchase_order LEFT JOIN tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id=tbl_dealer_purchase_order_detail.purchase_order_id where tbl_dealer_purchase_order.dealer_id=DEALERID and tbl_dealer_purchase_order_detail.item_id=ITEMID and tbl_dealer_purchase_order_detail.status=1 AND tbl_dealer_purchase_order.status=1
// group by tbl_dealer_purchase_order_detail.item_id))) AS last_purchase_order_date,(SELECT TIMESTAMPDIFF (day,@last_purchase_order_date,CURDATE() ) ) AS Days_since_Last_PO_Date,
//@last_invoice_date:=(SELECT added_date FROM tbl_dealer_deliver_order WHERE deliver_order_id=(SELECT max(tbl_delar_deliver_order_detail.deliver_order_id )FROM tbl_dealer_deliver_order tbl_dealer_deliver_order LEFT JOIN tbl_delar_deliver_order_detail tbl_delar_deliver_order_detail ON tbl_dealer_deliver_order.deliver_order_id=tbl_delar_deliver_order_detail.deliver_order_id  WHERE tbl_dealer_deliver_order.dealer_id=DEALERID AND tbl_delar_deliver_order_detail.part_id=ITEMID AND tbl_delar_deliver_order_detail.status=1 AND tbl_dealer_deliver_order.status=1 GROUP BY tbl_delar_deliver_order_detail.part_id)) AS last_invoice_date,(SELECT TIMESTAMPDIFF (day,@last_invoice_date,CURDATE() ) ) AS Days_since_Last_Invoice_Date,
//@total_requeirment_qty:=(SELECT sum(item_qty) FROM  tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail LEFT JOIN tbl_dealer_purchase_order tbl_dealer_purchase_order ON tbl_dealer_purchase_order_detail.purchase_order_id=tbl_dealer_purchase_order.purchase_order_id WHERE tbl_dealer_purchase_order.status=1 AND tbl_dealer_purchase_order_detail.status=1 AND tbl_dealer_purchase_order_detail.item_id=ITEMID AND tbl_dealer_purchase_order.dealer_id=DEALERID) AS Total_requeirement,ifnull((@total_requeirment_qty/(SELECT TIMESTAMPDIFF (MONTH,(SELECT date FROM  tbl_dealer_purchase_order where tbl_dealer_purchase_order.purchase_order_id=(SELECT min(tbl_dealer_purchase_order.purchase_order_id) FROM tbl_dealer_purchase_order tbl_dealer_purchase_order WHERE tbl_dealer_purchase_order.status=1 AND  tbl_dealer_purchase_order.dealer_id=DEALERID)),CURDATE() ) ) ),0) AS 
//Avg_monthly_requirement,ifnull((SELECT SUM(quantity) FROM tbl_delar_deliver_order_detail tbl_delar_deliver_order_detail LEFT JOIN tbl_dealer_deliver_order  tbl_dealer_deliver_order   ON tbl_delar_deliver_order_detail.deliver_order_id=tbl_dealer_deliver_order.deliver_order_id WHERE tbl_delar_deliver_order_detail.status=1 AND tbl_dealer_deliver_order.status=1 AND tbl_dealer_deliver_order.dealer_id=DEALERID AND tbl_delar_deliver_order_detail.part_id=ITEMID AND  tbl_dealer_deliver_order.added_date BETWEEN (DATE_ADD(CURDATE() ,INTERVAL -30 DAY))  AND CURDATE() ),0) AS 
//Number_of_Items_invoice_for_past_01_month
// FROM tbl_item tbl_item LEFT JOIN tbl_dealer_sales tbl_dealer_sales ON tbl_item.item_id=tbl_dealer_sales.id_item where tbl_dealer_sales.sold_date>=(SELECT max(last_stock_date) As last_stock_date from tbl_dealer_stock where dealer_id=$dealer_id AND status=1  ) GROUP BY tbl_item.item_id
//";
        /*  $sql = "SELECT
          tbl_item.item_id AS ITEMID,tbl_item.selling_price,
          @add_DAT:=tbl_item.added_date AS ADDEDDATE,
          tbl_item.item_part_no AS Part_Number,
          tbl_item.description AS Description,
          tbl_item.total_stock_qty AS Available_Stocks_at_VSD,
          tbl_dealer_sales.id_dealer AS DEALERID,
          @areaID:=((SELECT tbl_branch.area_id FROM tbl_dealer tbl_dealer LEFT JOIN tbl_branch tbl_branch ON tbl_dealer.branch_id=tbl_branch.branch_id WHERE tbl_dealer.delar_id=DEALERID )) AS AREAID,
          @astock:=ifnull((SELECT remaining_qty FROM tbl_dealer_stock WHERE timestamp=(SELECT max(timestamp) FROM tbl_dealer_stock WHERE dealer_id=DEALERID AND part_id=ITEMID AND status=1)),0 )AS Available_Stocks_at_the_Dealer ,
          (SELECT  first_stock_date FROM tbl_dealer_stock where part_id=ITEMID AND timestamp=(SELECT  max(timestamp) FROM tbl_dealer_stock where part_id=ITEMID  ) AND dealer_id=DEALERID AND status=1) AS first_stock_date,
          @asales:=ifnull(((SELECT sum(qty) FROM tbl_dealer_sales where id_dealer=DEALERID AND id_item=ITEMID AND sold_date BETWEEN first_stock_date AND CURDATE() ) /(SELECT TIMESTAMPDIFF (MONTH,first_stock_date,CURDATE() ) )),0) AS  avg_monthly_sale,
          @30daysales:=ifnull(((SELECT sum(qty) FROM tbl_dealer_sales where id_dealer=DEALERID AND id_item=ITEMID AND sold_date BETWEEN (DATE_ADD(CURDATE() ,INTERVAL -30 DAY)) AND CURDATE() ) ) ,0) AS Total_Sales_for_last_30days,
          @stocklost:=ifnull(((SELECT SUM(loss_qty) FROM tbl_dealer_loss_sales where loss_type=1 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID AND time_stamp=(SELECT MAX(time_stamp) FROM tbl_dealer_loss_sales where loss_type=1 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID )) ),0)AS Stocklostsales,
          @valuelost:=ifnull(((SELECT SUM(loss_qty) FROM tbl_dealer_loss_sales where loss_type=2 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID AND time_stamp=(SELECT MAX(time_stamp) FROM tbl_dealer_loss_sales where loss_type=2 AND status=1 AND dealer_id=DEALERID AND part_id=ITEMID ))),0) AS Valuelostsales,
          @avgdailydemand:=( ifnull((@stocklost+@30daysales)/10,0) )as AverageDailyDemand,@daybetweenorder:=(10) AS Daysbetweenorders,ifnull(((@avgdailydemand*@daybetweenorder)-@astock),0) SsuggestedQty,@purorderqty:=((SELECT sum(item_qty) FROM tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail LEFT JOIN tbl_dealer_purchase_order tbl_dealer_purchase_order ON tbl_dealer_purchase_order_detail.purchase_order_id=tbl_dealer_purchase_order.purchase_order_id WHERE tbl_dealer_purchase_order.dealer_id=DEALERID  AND 	tbl_dealer_purchase_order.status=1 AND tbl_dealer_purchase_order.date BETWEEN    (DATE_ADD(CURDATE() ,INTERVAL -90 DAY))  AND CURDATE() AND tbl_dealer_purchase_order_detail.item_id=ITEMID)) AS purorderqty,@deliverqty:=((SELECT sum(tbl_delar_deliver_order_detail.quantity) FROM  tbl_delar_deliver_order_detail  tbl_delar_deliver_order_detail LEFT JOIN  tbl_dealer_deliver_order  tbl_dealer_deliver_order ON tbl_delar_deliver_order_detail.deliver_order_id=tbl_dealer_deliver_order.deliver_order_id where tbl_dealer_deliver_order.dealer_id=DEALERID AND tbl_dealer_deliver_order.status=1 AND tbl_delar_deliver_order_detail.status=1 AND tbl_delar_deliver_order_detail.part_id=ITEMID) )As deliverqty,ifnull((@purorderqty-@deliverqty),0) AS unsuppliedorderqtyfor90day,ifnull(((SELECT sum(tbl_dealer_sales.qty) FROM tbl_dealer_sales tbl_dealer_sales LEFT JOIN tbl_dealer tbl_dealer ON  tbl_dealer_sales.id_dealer=tbl_dealer.delar_id JOIN tbl_branch tbl_branch ON tbl_dealer.branch_id=tbl_branch.branch_id where tbl_dealer_sales.status=1 AND tbl_branch.status=1 AND tbl_branch.area_id=@areaID AND tbl_dealer_sales.id_item=ITEMID)/(SELECT TIMESTAMPDIFF (MONTH,@add_DAT,CURDATE() ) )) ,0)AS movement_in_area_per_month,@last_purchase_order_date:=((SELECT date FROM  tbl_dealer_purchase_order WHERE tbl_dealer_purchase_order.purchase_order_id=(SELECT max(tbl_dealer_purchase_order_detail.purchase_order_id) FROM tbl_dealer_purchase_order tbl_dealer_purchase_order LEFT JOIN tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id=tbl_dealer_purchase_order_detail.purchase_order_id where tbl_dealer_purchase_order.dealer_id=DEALERID and tbl_dealer_purchase_order_detail.item_id=ITEMID and tbl_dealer_purchase_order_detail.status=1 AND tbl_dealer_purchase_order.status=1
          group by tbl_dealer_purchase_order_detail.item_id))) AS last_purchase_order_date,ifnull((SELECT TIMESTAMPDIFF (day,@last_purchase_order_date,CURDATE() ) ),0) AS Days_since_Last_PO_Date,
          @last_invoice_date:=(SELECT added_date FROM tbl_dealer_deliver_order WHERE deliver_order_id=(SELECT max(tbl_delar_deliver_order_detail.deliver_order_id )FROM tbl_dealer_deliver_order tbl_dealer_deliver_order LEFT JOIN tbl_delar_deliver_order_detail tbl_delar_deliver_order_detail ON tbl_dealer_deliver_order.deliver_order_id=tbl_delar_deliver_order_detail.deliver_order_id  WHERE tbl_dealer_deliver_order.dealer_id=DEALERID AND tbl_delar_deliver_order_detail.part_id=ITEMID AND tbl_delar_deliver_order_detail.status=1 AND tbl_dealer_deliver_order.status=1 GROUP BY tbl_delar_deliver_order_detail.part_id)) AS last_invoice_date,ifnull((SELECT TIMESTAMPDIFF (day,@last_invoice_date,CURDATE() ) ),0) AS Days_since_Last_Invoice_Date,
          @total_requeirment_qty:=(SELECT sum(item_qty) FROM  tbl_dealer_purchase_order_detail tbl_dealer_purchase_order_detail LEFT JOIN tbl_dealer_purchase_order tbl_dealer_purchase_order ON tbl_dealer_purchase_order_detail.purchase_order_id=tbl_dealer_purchase_order.purchase_order_id WHERE tbl_dealer_purchase_order.status=1 AND tbl_dealer_purchase_order_detail.status=1 AND tbl_dealer_purchase_order_detail.item_id=ITEMID AND tbl_dealer_purchase_order.dealer_id=DEALERID) AS Total_requeirement,ifnull((@total_requeirment_qty/(SELECT TIMESTAMPDIFF (MONTH,(SELECT date FROM  tbl_dealer_purchase_order where tbl_dealer_purchase_order.purchase_order_id=(SELECT min(tbl_dealer_purchase_order.purchase_order_id) FROM tbl_dealer_purchase_order tbl_dealer_purchase_order WHERE tbl_dealer_purchase_order.status=1 AND  tbl_dealer_purchase_order.dealer_id=DEALERID)),CURDATE() ) ) ),0) AS
          Avg_monthly_requirement,ifnull((SELECT SUM(quantity) FROM tbl_delar_deliver_order_detail tbl_delar_deliver_order_detail LEFT JOIN tbl_dealer_deliver_order  tbl_dealer_deliver_order   ON tbl_delar_deliver_order_detail.deliver_order_id=tbl_dealer_deliver_order.deliver_order_id WHERE tbl_delar_deliver_order_detail.status=1 AND tbl_dealer_deliver_order.status=1 AND tbl_dealer_deliver_order.dealer_id=DEALERID AND tbl_delar_deliver_order_detail.part_id=ITEMID AND  tbl_dealer_deliver_order.added_date BETWEEN (DATE_ADD(CURDATE() ,INTERVAL -30 DAY))  AND CURDATE() ),0) AS
          Number_of_Items_invoice_for_past_01_month
          FROM tbl_item tbl_item LEFT JOIN tbl_dealer_sales tbl_dealer_sales ON tbl_item.item_id=tbl_dealer_sales.id_item where tbl_dealer_sales.sold_date>=(SELECT max(last_stock_date) As last_stock_date from tbl_dealer_stock where dealer_id=$dealer_id AND status=1  ) GROUP BY tbl_item.item_id"; */
        //******************---*----------------------------
//        $sql = "SELECT 
//    tbl_item.item_id AS ITEMID,
//    tbl_item.item_part_no AS Part_Number,
//    tbl_item.description AS Description,
//    tbl_item.total_stock_qty AS Available_Stocks_at_VSD,
//    tbl_item.selling_price,
//    tbl_dealer_sales.id_dealer AS DEALERID,
//    (SELECT 
//            tbl_branch.area_id
//        FROM
//            tbl_dealer
//                LEFT JOIN
//            tbl_branch ON tbl_dealer.branch_id = tbl_branch.branch_id
//        WHERE
//            tbl_dealer.delar_id = DEALERID) AS AREAID,
//    (SELECT 
//            delar_account_no
//        FROM
//            tbl_dealer
//        WHERE
//            delar_id = DEALERID) AS deale_acc_no,
//    ifnull((SELECT 
//                    sum(qty)
//                FROM
//                    tbl_dealer_sales
//                WHERE
//                    tbl_dealer_sales.id_item = ITEMID
//                        AND tbl_dealer_sales.id_dealer = DEALERID
//                        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//            0) AS Total_Sales_for_last_30days,
//    round(ifnull(((ifnull((SELECT 
//                                    sum(qty)
//                                FROM
//                                    tbl_dealer_sales
//                                WHERE
//                                    tbl_dealer_sales.id_item = ITEMID
//                                        AND tbl_dealer_sales.id_dealer = DEALERID
//                                        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 120 DAY)) AND CURDATE()),
//                            0)) / 4),
//                    0),
//            2) AS avg_monthly_sale,
//    ifnull((SELECT 
//                    remaining_qty
//                FROM
//                    tbl_dealer_stock
//                WHERE
//                    dealer_id = DEALERID
//                        AND part_id = ITEMID
//                order BY dealer_stock_id desc
//                limit 1),
//            0) AS Available_Stocks_at_the_Dealer,
//    ifnull((SELECT 
//                    sum(loss_qty)
//                FROM
//                    tbl_dealer_loss_sales
//                WHERE
//                    dealer_id = DEALERID
//                        AND part_id = ITEMID
//                        AND loss_type = 1
//                        AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//            0) AS Stocklostsales,
//    ifnull((SELECT 
//                    sum(loss_qty)
//                FROM
//                    tbl_dealer_loss_sales
//                WHERE
//                    dealer_id = DEALERID
//                        AND part_id = ITEMID
//                        AND loss_type = 2
//                        AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//            0) AS Valuelostsales,
//    round(ifnull(ifnull(sum((ifnull((SELECT 
//                                            sum(qty)
//                                        FROM
//                                            tbl_dealer_sales
//                                        WHERE
//                                            tbl_dealer_sales.id_item = ITEMID
//                                                AND tbl_dealer_sales.id_dealer = DEALERID
//                                                AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//                                    0)) + ifnull((SELECT 
//                                            sum(loss_qty)
//                                        FROM
//                                            tbl_dealer_loss_sales
//                                        WHERE
//                                            dealer_id = DEALERID
//                                                AND part_id = ITEMID
//                                                AND loss_type = 1
//                                                AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//                                    0)),
//                            0) / 30,
//                    0),
//            2) AS AverageDailyDemand,
//    ((round(ifnull(ifnull(sum((ifnull((SELECT 
//                                            sum(qty)
//                                        FROM
//                                            tbl_dealer_sales
//                                        WHERE
//                                            tbl_dealer_sales.id_item = ITEMID
//                                                AND tbl_dealer_sales.id_dealer = DEALERID
//                                                AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//                                    0)) + ifnull((SELECT 
//                                            sum(loss_qty)
//                                        FROM
//                                            tbl_dealer_loss_sales
//                                        WHERE
//                                            dealer_id = DEALERID
//                                                AND part_id = ITEMID
//                                                AND loss_type = 1
//                                                AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//                                    0)),
//                            0) / 30,
//                    0),
//            2)) * 10) AS SsuggestedQty,
//    ((ifnull((SELECT 
//                    SUM(tbl_dealer_purchase_order_detail.item_qty)
//                FROM
//                    tbl_dealer_purchase_order
//                        LEFT JOIN
//                    tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
//                WHERE
//                    tbl_dealer_purchase_order.dealer_id = DEALERID
//                        AND tbl_dealer_purchase_order.status = 1
//                        AND tbl_dealer_purchase_order_detail.item_id = ITEMID
//                        AND tbl_dealer_purchase_order_detail.status = 1
//                        AND tbl_dealer_purchase_order.date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//            0)) - (ifnull((SELECT 
//                    sum(qty)
//                FROM
//                    tbl_all_sales
//                WHERE
//                    part_no = item_part_no
//                        AND acc_no = deale_acc_no
//                        AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
//            0))) AS unsuppliedorderqtyfor30day,
//    round(((ifnull((SELECT 
//                            sum(qty)
//                        FROM
//                            tbl_all_sales
//                        WHERE
//                            area_id = AREAID
//                                AND part_no = item_part_no
//                                AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 90 DAY)) AND CURDATE()),
//                    0)) / 3),
//            2) AS movement_in_area_per_month,
//    ifnull((SELECT 
//                    DATEDIFF(CURDATE(), date_edit)
//                FROM
//                    tbl_all_sales
//                WHERE
//                    part_no = item_part_no
//                        AND acc_no = deale_acc_no
//                ORDER BY all_sales_id DESC
//                limit 1),
//            0) AS Days_since_Last_Invoice_Date,
//    ifnull((SELECT 
//                    DATEDIFF(CURDATE(),
//                                tbl_dealer_purchase_order.date)
//                FROM
//                    tbl_dealer_purchase_order
//                        Inner JOIN
//                    tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
//                WHERE
//                    tbl_dealer_purchase_order_detail.item_id = ITEMID
//                        AND tbl_dealer_purchase_order.dealer_id = DEALERID
//                ORDER BY tbl_dealer_purchase_order.purchase_order_id DESC
//                limit 1),
//            0) AS Days_since_Last_PO_Date
//FROM
//    tbl_dealer_sales
//        LEFT JOIN
//    tbl_item ON tbl_dealer_sales.id_item = tbl_item.item_id
//WHERE
//    tbl_dealer_sales.id_dealer = $dealer_id
//        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()
//GROUP BY tbl_item.item_id
//Order BY (sum(tbl_dealer_sales.qty)) DESC";
        //******************----------------------new
        /*    $sql="        SELECT 
          tbl_item.item_id AS ITEMID,
          tbl_item.item_part_no AS Part_Number,
          tbl_item.description AS Description,
          tbl_item.total_stock_qty AS Available_Stocks_at_VSD,
          tbl_item.selling_price,
          tbl_dealer_sales.id_dealer AS DEALERID,
          (SELECT
          tbl_branch.area_id
          FROM
          tbl_dealer
          LEFT JOIN
          tbl_branch ON tbl_dealer.branch_id = tbl_branch.branch_id
          WHERE
          tbl_dealer.delar_id = DEALERID) AS AREAID,
          (SELECT
          delar_account_no
          FROM
          tbl_dealer
          WHERE
          delar_id = DEALERID) AS deale_acc_no,
          ifnull((SELECT
          sum(qty)
          FROM
          tbl_dealer_sales
          WHERE
          tbl_dealer_sales.id_item = ITEMID
          AND tbl_dealer_sales.id_dealer = DEALERID
          AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS Total_Sales_for_last_30days,
          round(ifnull(((ifnull((SELECT
          sum(qty)
          FROM
          tbl_dealer_sales
          WHERE
          tbl_dealer_sales.id_item = ITEMID
          AND tbl_dealer_sales.id_dealer = DEALERID
          AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 120 DAY)) AND CURDATE()),
          0)) / 4),
          0),
          2) AS avg_monthly_sale,
          ifnull((SELECT
          remaining_qty
          FROM
          tbl_dealer_stock
          WHERE
          dealer_id = DEALERID
          AND part_id = ITEMID
          order BY dealer_stock_id desc
          limit 1),
          0) AS Available_Stocks_at_the_Dealer,
          ifnull((SELECT
          sum(loss_qty)
          FROM
          tbl_dealer_loss_sales
          WHERE
          dealer_id = DEALERID
          AND part_id = ITEMID
          AND loss_type = 1
          AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS Stocklostsales,
          ifnull((SELECT
          sum(loss_qty)
          FROM
          tbl_dealer_loss_sales
          WHERE
          dealer_id = DEALERID
          AND part_id = ITEMID
          AND loss_type = 2
          AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS Valuelostsales,
          ifnull((SELECT
          SUM(tbl_dealer_purchase_order_detail.item_qty)
          FROM
          tbl_dealer_purchase_order
          LEFT JOIN
          tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
          WHERE
          tbl_dealer_purchase_order.dealer_id = DEALERID
          AND tbl_dealer_purchase_order.status = 1
          AND tbl_dealer_purchase_order_detail.item_id = ITEMID
          AND tbl_dealer_purchase_order_detail.status = 1
          AND tbl_dealer_purchase_order.date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS one_year_requirment,

          ((ifnull((SELECT
          SUM(tbl_dealer_purchase_order_detail.item_qty)
          FROM
          tbl_dealer_purchase_order
          LEFT JOIN
          tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
          WHERE
          tbl_dealer_purchase_order.dealer_id = DEALERID
          AND tbl_dealer_purchase_order.status = 1
          AND tbl_dealer_purchase_order_detail.item_id = ITEMID
          AND tbl_dealer_purchase_order_detail.status = 1
          AND tbl_dealer_purchase_order.date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0)) - (ifnull((SELECT
          sum(qty)
          FROM
          tbl_all_sales
          WHERE
          part_no = item_part_no
          AND acc_no = deale_acc_no
          AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0))) AS unsuppliedorderqtyfor30day,
          round(((ifnull((SELECT
          sum(qty)
          FROM
          tbl_all_sales
          WHERE
          area_id = AREAID
          AND part_no = item_part_no
          AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 90 DAY)) AND CURDATE()),
          0)) / 3),
          2) AS movement_in_area_per_month,
          ifnull((SELECT
          DATEDIFF(CURDATE(), date_edit)
          FROM
          tbl_all_sales
          WHERE
          part_no = item_part_no
          AND acc_no = deale_acc_no
          ORDER BY all_sales_id DESC
          limit 1),
          0) AS Days_since_Last_Invoice_Date,
          ifnull((SELECT
          DATEDIFF(CURDATE(),
          tbl_dealer_purchase_order.date)
          FROM
          tbl_dealer_purchase_order
          Inner JOIN
          tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
          WHERE
          tbl_dealer_purchase_order_detail.item_id = ITEMID
          AND tbl_dealer_purchase_order.dealer_id = DEALERID
          ORDER BY tbl_dealer_purchase_order.purchase_order_id DESC
          limit 1),
          0) AS Days_since_Last_PO_Date
          FROM
          tbl_dealer_sales
          LEFT JOIN
          tbl_item ON tbl_dealer_sales.id_item = tbl_item.item_id
          WHERE
          tbl_dealer_sales.id_dealer = $dealer_id
          AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()
          GROUP BY tbl_item.item_id
          Order BY (sum(tbl_dealer_sales.qty)) DESC"; */
        /* $sql="SELECT 
          tbl_item.item_id AS ITEMID,
          tbl_item.item_part_no AS Part_Number,
          tbl_item.description AS Description,
          tbl_item.total_stock_qty AS Available_Stocks_at_VSD,
          tbl_item.selling_price,
          tbl_dealer_sales.id_dealer AS DEALERID,
          (SELECT
          tbl_branch.area_id
          FROM
          tbl_dealer
          LEFT JOIN
          tbl_branch ON tbl_dealer.branch_id = tbl_branch.branch_id
          WHERE
          tbl_dealer.delar_id = DEALERID) AS AREAID,
          (SELECT
          delar_account_no
          FROM
          tbl_dealer
          WHERE
          delar_id = DEALERID) AS deale_acc_no,
          ifnull((SELECT
          sum(qty)
          FROM
          tbl_dealer_sales
          WHERE
          tbl_dealer_sales.id_item = ITEMID
          AND tbl_dealer_sales.id_dealer = DEALERID
          AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS Total_Sales_for_last_30days,
          round(ifnull(((ifnull((SELECT
          sum(qty)
          FROM
          tbl_dealer_sales
          WHERE
          tbl_dealer_sales.id_item = ITEMID
          AND tbl_dealer_sales.id_dealer = DEALERID
          AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 120 DAY)) AND CURDATE()),
          0)) / 4),
          0),
          2) AS avg_monthly_sale,
          ifnull((SELECT
          remaining_qty
          FROM
          tbl_dealer_stock
          WHERE
          dealer_id = DEALERID
          AND part_id = ITEMID
          order BY dealer_stock_id desc
          limit 1),
          0) AS Available_Stocks_at_the_Dealer,
          ifnull((SELECT
          sum(loss_qty)
          FROM
          tbl_dealer_loss_sales
          WHERE
          dealer_id = DEALERID
          AND part_id = ITEMID
          AND loss_type = 1
          AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS Stocklostsales,
          ifnull((SELECT
          sum(loss_qty)
          FROM
          tbl_dealer_loss_sales
          WHERE
          dealer_id = DEALERID
          AND part_id = ITEMID
          AND loss_type = 2
          AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS Valuelostsales,
          ifnull((SELECT
          SUM(tbl_dealer_purchase_order_detail.item_qty)
          FROM
          tbl_dealer_purchase_order
          LEFT JOIN
          tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
          WHERE
          tbl_dealer_purchase_order.dealer_id = DEALERID
          AND tbl_dealer_purchase_order.status = 1
          AND tbl_dealer_purchase_order_detail.item_id = ITEMID
          AND tbl_dealer_purchase_order_detail.status = 1
          AND tbl_dealer_purchase_order.date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 390 DAY)) AND (DATE_ADD(CURDATE(), INTERVAL - 30 DAY))),
          0) AS one_year_requirment,
          ifnull((SELECT
          SUM(tbl_dealer_purchase_order_detail.item_qty)
          FROM
          tbl_dealer_purchase_order
          LEFT JOIN
          tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
          WHERE
          tbl_dealer_purchase_order.dealer_id = DEALERID
          AND tbl_dealer_purchase_order.status = 1
          AND tbl_dealer_purchase_order_detail.item_id = ITEMID
          AND tbl_dealer_purchase_order_detail.status = 1
          AND tbl_dealer_purchase_order.date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS 30dayporequirment,

          ifnull((SELECT
          sum(qty)
          FROM
          tbl_all_sales
          WHERE
          part_no = item_part_no
          AND acc_no = deale_acc_no
          AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
          0) AS 30dayallsales,
          round(((ifnull((SELECT
          sum(qty)
          FROM
          tbl_all_sales
          WHERE
          area_id = AREAID
          AND part_no = item_part_no
          AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 90 DAY)) AND CURDATE()),
          0)) / 3),
          2) AS movement_in_area_per_month,
          ifnull((SELECT
          DATEDIFF(CURDATE(), date_edit)
          FROM
          tbl_all_sales
          WHERE
          part_no = item_part_no
          AND acc_no = deale_acc_no
          ORDER BY all_sales_id DESC
          limit 1),
          0) AS Days_since_Last_Invoice_Date,
          ifnull((SELECT
          DATEDIFF(CURDATE(),
          tbl_dealer_purchase_order.date)
          FROM
          tbl_dealer_purchase_order
          Inner JOIN
          tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
          WHERE
          tbl_dealer_purchase_order_detail.item_id = ITEMID
          AND tbl_dealer_purchase_order.dealer_id = DEALERID
          ORDER BY tbl_dealer_purchase_order.purchase_order_id DESC
          limit 1),
          0) AS Days_since_Last_PO_Date
          FROM
          tbl_dealer_sales
          LEFT JOIN
          tbl_item ON tbl_dealer_sales.id_item = tbl_item.item_id
          WHERE
          tbl_dealer_sales.id_dealer = $dealer_id
          AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()
          GROUP BY tbl_item.item_id
          Order BY (sum(tbl_dealer_sales.qty)) DESC"; */
        $sql = "SELECT 
    tbl_item.item_id AS ITEMID,
    tbl_item.item_part_no AS Part_Number,
    tbl_item.description AS Description,
    tbl_item.total_stock_qty AS Available_Stocks_at_VSD,
    tbl_item.selling_price,
    tbl_dealer_sales.id_dealer AS DEALERID,
    (SELECT 
            tbl_branch.area_id
        FROM
            tbl_dealer
                LEFT JOIN
            tbl_branch ON tbl_dealer.branch_id = tbl_branch.branch_id
        WHERE
            tbl_dealer.delar_id = DEALERID) AS AREAID,
    (SELECT 
            delar_account_no
        FROM
            tbl_dealer
        WHERE
            delar_id = DEALERID) AS deale_acc_no,
    ifnull((SELECT 
                    sum(qty)
                FROM
                    tbl_dealer_sales
                WHERE
                    tbl_dealer_sales.id_item = ITEMID
                        AND tbl_dealer_sales.id_dealer = DEALERID
                        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
            0) AS Total_Sales_for_last_30days,
    ifnull((SELECT 
                    sum(qty)
                FROM
                    tbl_dealer_sales
                WHERE
                    tbl_dealer_sales.id_item = ITEMID
                        AND tbl_dealer_sales.id_dealer = DEALERID
                        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 7 DAY)) AND CURDATE()),
            0) AS oneweektotalsales,
    round(ifnull(((ifnull((SELECT 
                                    sum(qty)
                                FROM
                                    tbl_dealer_sales
                                WHERE
                                    tbl_dealer_sales.id_item = ITEMID
                                        AND tbl_dealer_sales.id_dealer = DEALERID
                                        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 120 DAY)) AND CURDATE()),
                            0)) / 4),
                    0),
            2) AS avg_monthly_sale,
    ifnull((SELECT 
                    remaining_qty
                FROM
                    tbl_dealer_stock
                WHERE
                    dealer_id = DEALERID
                        AND part_id = ITEMID
                order BY dealer_stock_id desc
                limit 1),
            0) AS Available_Stocks_at_the_Dealer,
    ifnull((SELECT 
                    sum(loss_qty)
                FROM
                    tbl_dealer_loss_sales
                WHERE
                    dealer_id = DEALERID
                        AND part_id = ITEMID
                        AND loss_type = 1
                        AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
            0) AS Stocklostsales,
    ifnull((SELECT 
                    sum(loss_qty)
                FROM
                    tbl_dealer_loss_sales
                WHERE
                    dealer_id = DEALERID
                        AND part_id = ITEMID
                        AND loss_type = 2
                        AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
            0) AS Valuelostsales,
    ifnull((SELECT 
                    SUM(tbl_dealer_purchase_order_detail.item_qty)
                FROM
                    tbl_dealer_purchase_order
                        LEFT JOIN
                    tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
                WHERE
                    tbl_dealer_purchase_order.dealer_id = DEALERID
                        AND tbl_dealer_purchase_order.status = 1
                        AND tbl_dealer_purchase_order_detail.item_id = ITEMID
                        AND tbl_dealer_purchase_order_detail.status = 1
                        AND tbl_dealer_purchase_order.date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 390 DAY)) AND (DATE_ADD(CURDATE(), INTERVAL - 30 DAY))),
            0) AS one_year_requirment,
    ifnull((SELECT 
                    SUM(tbl_dealer_purchase_order_detail.item_qty)
                FROM
                    tbl_dealer_purchase_order
                        LEFT JOIN
                    tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
                WHERE
                    tbl_dealer_purchase_order.dealer_id = DEALERID
                        AND tbl_dealer_purchase_order.status = 1
                        AND tbl_dealer_purchase_order_detail.item_id = ITEMID
                        AND tbl_dealer_purchase_order_detail.status = 1
                        AND tbl_dealer_purchase_order.date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
            0) AS 30dayporequirment,
    ifnull((SELECT 
                    sum(qty)
                FROM
                    tbl_all_sales
                WHERE
                    part_no = item_part_no
                        AND acc_no = deale_acc_no
                        AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
            0) AS 30dayallsales,
    round(((ifnull((SELECT 
                            sum(qty)
                        FROM
                            tbl_all_sales
                        WHERE
                            area_id = AREAID
                                AND part_no = item_part_no
                                AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 90 DAY)) AND CURDATE()),
                    0)) / 3),
            2) AS movement_in_area_per_month,
    ifnull((SELECT 
                    DATEDIFF(CURDATE(), date_edit)
                FROM
                    tbl_all_sales
                WHERE
                    part_no = item_part_no
                        AND acc_no = deale_acc_no
                ORDER BY all_sales_id DESC
                limit 1),
            0) AS Days_since_Last_Invoice_Date,
    ifnull((SELECT 
                    DATEDIFF(CURDATE(),
                                tbl_dealer_purchase_order.date)
                FROM
                    tbl_dealer_purchase_order
                        Inner JOIN
                    tbl_dealer_purchase_order_detail ON tbl_dealer_purchase_order.purchase_order_id = tbl_dealer_purchase_order_detail.purchase_order_id
                WHERE
                    tbl_dealer_purchase_order_detail.item_id = ITEMID
                        AND tbl_dealer_purchase_order.dealer_id = DEALERID
                ORDER BY tbl_dealer_purchase_order.purchase_order_id DESC
                limit 1),
            0) AS Days_since_Last_PO_Date
FROM
    tbl_dealer_sales
        LEFT JOIN
    tbl_item ON tbl_dealer_sales.id_item = tbl_item.item_id
WHERE
    tbl_dealer_sales.id_dealer = $dealer_id
        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()
GROUP BY tbl_item.item_id
Order BY (sum(tbl_dealer_sales.qty)) DESC";
        return $this->db->mod_select($sql);
    }

    public function add_new_purchase_order() {

        $rowCount = $_REQUEST['rowcount'];
        $complete_type = 5;
        if ($_REQUEST['submit_type'] == 1) {
            $complete_type = 3;
        } else if ($_REQUEST['submit_type'] == 2) {
            $complete_type = 5;
        }

        $data1 = array(
            "date" => date('Y-m-d'),
            "time" => date('H:i:s'),
            "sales_officer_id" => $_REQUEST['sales_officer_id'],
            "dealer_id" => $_REQUEST['dealer_id_for_search'],
            "amount" => $_REQUEST['amount'],
//            "without_vat" => $_REQUEST['whitout_vat'],
            "complete" => $complete_type,
            "discount_percentage" => $_REQUEST['dealer_discount'],
            "current_vat" => $_REQUEST['vat_amount'],
            "total_discount" => $_REQUEST['total_discount_amount'],
            "is_sales_officer" => 1,
            "status" => '1'
        );
        $this->db->__beginTransaction();
        print_r('**************************');
        print_r($data1);
        $this->db->insertData("tbl_dealer_purchase_order", $data1);
        //  $sql = "select max(s_o_purchase_order_id) as s_o_purchase_order_id from tbl_s_o_purchase_order where status='1'";
        $maxid = $this->db->insert_id();
        ;

        for ($i = 1; $i <= $rowCount; $i++) {

            if (isset($_REQUEST['item_id_' . $i])) {

                $data2 = array(
                    "purchase_order_id" => $maxid,
                    "item_id" => $_REQUEST['item_id_' . $i],
                    "item_qty" => $_REQUEST['qty_field_' . $i],
                    "unit_price" => $_REQUEST['unit_price_' . $i],
                    "status" => '1'
                );
                print_r('---------------------------');



                $this->db->insertData('tbl_dealer_purchase_order_detail', $data2);
            }
        }
        $this->db->__endTransaction();
    }

    function getDEb($dealer_id) {
        $sql = "select  deliver_order_id AS DELIVER_ID ,@deliver_amount:=(ifnull (SUM(total_amount),0)) AS Deliver_Total_amount,ifnull((SELECT SUM(cheque_payment) FROM tbl_cheque_payment where deliver_order_id=DELIVER_ID AND status=1) ,0)AS Cheque_payment,ifnull((SELECT SUM(deposit_payment) FROM tbl_bank_deposit_payment where deliver_order_id=DELIVER_ID AND status=1) ,0)AS Diposit_payment,ifnull((SELECT SUM(cash_payment) FROM tbl_cash_payment where deliver_order_id=DELIVER_ID AND status=1) ,0) AS Cash_payment from  tbl_dealer_deliver_order where dealer_id=$dealer_id AND status=1 GROUP BY deliver_order_id";
        return $this->db->mod_select($sql);
    }

    function get_all_pur_order($first_date, $second_date) {
        $emp_id = $this->session->userdata('employe_id');
        $sql = "SELECT tbl_dealer_purchase_order.purchase_order_id,tbl_dealer_purchase_order.purchase_order_number,tbl_dealer_purchase_order.date,tbl_dealer_purchase_order.time,tbl_dealer_purchase_order.amount,tbl_dealer_purchase_order.total_discount,tbl_dealer.delar_account_no,tbl_dealer.delar_shop_name,tbl_dealer_purchase_order.discount_percentage,tbl_dealer_purchase_order.current_vat,tbl_dealer_purchase_order.complete,tbl_dealer_purchase_order.is_sales_officer,tbl_dealer_purchase_order.assigned,tbl_dealer_purchase_order.reason FROM tbl_dealer_purchase_order tbl_dealer_purchase_order LEFT JOIN tbl_dealer tbl_dealer ON tbl_dealer_purchase_order.dealer_id=tbl_dealer.delar_id where tbl_dealer.sales_officer_id=$emp_id AND date BETWEEN '$first_date' AND '$second_date' ORDER BY tbl_dealer_purchase_order.purchase_order_id DESC";
        return $dealers = $this->db->mod_select($sql);
    }

    function get_all_pur_order_by_filter($dealer_id, $first_date, $second_date) {
        $emp_id = $this->session->userdata('employe_id');
        //$sql = "SELECT tbl_dealer_purchase_order.purchase_order_id,tbl_dealer_purchase_order.purchase_order_number,tbl_dealer_purchase_order.date,tbl_dealer_purchase_order.time,tbl_dealer_purchase_order.amount,tbl_dealer_purchase_order.total_discount,tbl_dealer.delar_account_no,tbl_dealer.delar_shop_name,tbl_dealer.discount_percentage,tbl_dealer_purchase_order.complete,tbl_dealer_purchase_order.is_sales_officer,tbl_dealer_purchase_order.assigned,tbl_dealer_purchase_order.reason FROM tbl_dealer_purchase_order tbl_dealer_purchase_order LEFT JOIN tbl_dealer tbl_dealer ON tbl_dealer_purchase_order.dealer_id=tbl_dealer.delar_id where tbl_dealer.sales_officer_id=$emp_id AND tbl_dealer.delar_id=$dealer_id AND date BETWEEN  '2014-01-01' AND '2014-12-30' ORDER BY tbl_dealer_purchase_order.purchase_order_id DESC";
        $sql = "SELECT tbl_dealer_purchase_order.purchase_order_id,tbl_dealer_purchase_order.purchase_order_number,tbl_dealer_purchase_order.date,tbl_dealer_purchase_order.time,tbl_dealer_purchase_order.amount,tbl_dealer_purchase_order.total_discount,tbl_dealer.delar_account_no,tbl_dealer.delar_shop_name,tbl_dealer_purchase_order.discount_percentage,tbl_dealer_purchase_order.current_vat,tbl_dealer_purchase_order.complete,tbl_dealer_purchase_order.is_sales_officer,tbl_dealer_purchase_order.assigned,tbl_dealer_purchase_order.reason FROM tbl_dealer_purchase_order tbl_dealer_purchase_order LEFT JOIN tbl_dealer tbl_dealer ON tbl_dealer_purchase_order.dealer_id=tbl_dealer.delar_id where tbl_dealer.sales_officer_id=$emp_id AND tbl_dealer.delar_id=$dealer_id  AND date BETWEEN '$first_date' AND '$second_date' ORDER BY tbl_dealer_purchase_order.purchase_order_id DESC";
        return $dealers = $this->db->mod_select($sql);
    }

    function get_order_detail($order_id) {
        $sql = "SELECT tbl_item.item_id ,tbl_item.item_part_no,tbl_item.description,tbl_dealer_purchase_order_detail.purchase_order_detail_id,tbl_dealer_purchase_order_detail.item_qty,tbl_dealer_purchase_order_detail.unit_price FROM tbl_dealer_purchase_order_detail LEFT JOIN tbl_item ON tbl_dealer_purchase_order_detail.item_id=tbl_item.item_id where purchase_order_id=$order_id AND tbl_dealer_purchase_order_detail.status=1";

        return $this->db->mod_select($sql);
    }

    function update_kit_po_detail($po_id, $kits) {
        $qty = $_POST['qty'];
        
        $this->db->__beginTransaction();
        $where_1 = array(
            "purchase_order_id" => $po_id
        );

        $data_1 = array(
            "reason" => $kits
        );
        $this->db->update('tbl_dealer_purchase_order', $data_1, $where_1);

        $rows = $qty[0][0];
        for ($i = 1; $i <= $rows; $i++) {
            $where_2 = array(
                "purchase_order_id" => $po_id,
                "item_id" => $qty[$i][0]
            );

            $data_2 = array(
                "item_qty" => $qty[$i][1]
            );

            $this->db->update('tbl_dealer_purchase_order_detail', $data_2, $where_2);
        }

        $this->db->__endTransaction();
    }

    function get_past_moving_parts($dealer_id) {
        /* OLD
         * $sql = "select 
          it.item_id,
          it.item_part_no,
          it.description,
          round(sum(ddod.quantity) / 6, 2) as quantity
          from
          tbl_dealer_stock tds
          right join
          tbl_delar_deliver_order_detail ddod ON (tds.part_id = ddod.part_id
          and tds.status = 1
          and ddod.status = 1
          and tds.dealer_id = " . $dealer_id . ")
          inner join
          tbl_item it ON ddod.part_id = it.item_id
          inner join
          tbl_dealer_deliver_order ddo ON ddod.deliver_order_id = ddo.deliver_order_id
          inner join
          tbl_dealer td ON ddo.dealer_id = td.delar_id
          where
          tds.part_id is null
          and td.sales_officer_id = (select
          sales_officer_id
          from
          tbl_dealer
          where
          delar_id = " . $dealer_id . " and status = 1)
          and ddo.added_date between (date_sub((date_add(last_day(date_sub(curdate(), interval 1 month)),
          interval 1 day)),
          interval 7 month)) and (last_day(date_sub(curdate(), interval 1 month)))
          group by ddod.part_id
          order by sum(ddod.quantity) desc
          limit 10"; */
        $cur_date = new DateTime();
        $cur_date1 = new DateTime();
        $cur_date->modify("last day of previous month");
        $cur_date1->modify("first day of previous month");
        $last_date_of_previous_month = $cur_date->format("Y-m-d");
        $first_date_of_previous_month = $cur_date1->format("Y-m-d");
        $date_create = date_create($first_date_of_previous_month);
        date_sub($date_create, date_interval_create_from_date_string("6 months"));
        $first_date_after_6months = date_format($date_create, "Y-m-d");
        $sql = "select 
    it.item_id,
    it.item_part_no,
    it.description,
    round(sum(ddod.quantity) / 6, 2) as quantity
from
    (select 
        ti.item_id
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and tals.status = 1
        and ti.status = 1
    inner join tbl_dealer td1 ON tals.acc_no = td1.delar_account_no
        and td1.status = 1
    inner join tbl_sales_officer tso ON td1.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
    where
        td1.delar_id = " . $dealer_id . "
            and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
    group by ti.item_id) as tds
        right join
    tbl_delar_deliver_order_detail ddod ON (tds.item_id = ddod.part_id
        and ddod.status = 1)
        inner join
    tbl_item it ON ddod.part_id = it.item_id
        inner join
    tbl_dealer_deliver_order ddo ON ddod.deliver_order_id = ddo.deliver_order_id
        inner join
    tbl_dealer td ON ddo.dealer_id = td.delar_id
where
    tds.item_id is null
        and td.sales_officer_id = (select 
            sales_officer_id
        from
            tbl_dealer
        where
            delar_id = " . $dealer_id . " and status = 1)
        and ddo.added_date between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
group by ddod.part_id
order by sum(ddod.quantity) / 6 desc
limit 10
";
        return $this->db->mod_select($sql);
    }

    function get_not_achived($so) {
        $sql = "select 
    it.item_id,
    it.item_part_no,
    it.description,
    it.selling_price,
    sum(mtd.minimum_qty) as total_minimum_qty,
    sum(mtd.additional_qty) as total_additional_qty,
    (sum(mtd.minimum_qty) + sum(mtd.additional_qty)) as total_target,
    coalesce((select 
                    sum(qty)
                from
                    tbl_all_sales
                where
                    s_e_code = so.sales_officer_code
                        and status = 1
                        and part_no = it.item_part_no
                group by part_no),
            0) as actual_qty
from
    tbl_monthly_target_detail mtd
        inner join
    tbl_sales_officer_monthly_target somt ON mtd.monthly_target_id = somt.monthly_target_id
        inner join
    tbl_sales_officer so ON somt.sales_officer_id = so.sales_officer_id
        inner join
    tbl_item it ON mtd.item_id = it.item_id
where
    somt.sales_officer_id = $so
        and somt.status = 1
group by mtd.item_id
having actual_qty < total_minimum_qty
    or actual_qty < total_target";
        return $this->db->mod_select($sql);
    }

    function set_assign_po($assign_type, $sopoid) {
        $sql = "UPDATE tbl_dealer_purchase_order SET `assigned`=$assign_type where `purchase_order_id`=$sopoid";
        $this->db->mod_select($sql);
    }

    function update_po_detail($oder_detail_id, $item_id, $update_qty) {

        $sql = "UPDATE `tbl_dealer_purchase_order_detail` SET `item_id`=$item_id,`item_qty`=$update_qty where `purchase_order_detail_id`=$oder_detail_id";
        $this->db->mod_select($sql);
    }

    function insert_new_part_po($detail_array) {

        $insert_array = array(
            'purchase_order_id' => $detail_array[0],
            'item_id' => $detail_array[1],
            'item_qty' => $detail_array[2],
            'unit_price' => $detail_array[3],
            'status' => 1
        );
        $this->db->insert('tbl_dealer_purchase_order_detail', $insert_array);
        return $this->db->insert_id();
    }

    public function reject_fu($pur_order, $reason) {

        $sql = "UPDATE tbl_dealer_purchase_order SET `complete`=4,reason='$reason' where `purchase_order_id`=$pur_order";
        $cd = $this->db->mod_select($sql);
        echo $this->db->status();
    }

    function get_vat_amount() {
        $sql = "Select * FROM tbl_vat";
        return $this->db->mod_select($sql);
    }

    function update_po($order_id, $amount, $without_vat, $tot_dis) {
        $sql = "UPDATE tbl_dealer_purchase_order SET `amount`=$amount,total_discount=$tot_dis  where `purchase_order_id`=$order_id";

        $this->db->mod_select($sql);
    }

    function submit_like_order($order_id) {
        $sql = "UPDATE tbl_dealer_purchase_order SET `complete`=3 where `purchase_order_id`=$order_id";
        $this->db->mod_select($sql);
    }

    function remove_parts($order_detail_id) {
        print_r($order_detail_id);
        $sql = "UPDATE `tbl_dealer_purchase_order_detail` SET `status`=0 where `purchase_order_detail_id`=$order_detail_id";
        $cd = $this->db->mod_select($sql);
    }

    function get_outstanding_amount($dealer_id) {
        $sql = "select 
    @cash_payment:=coalesce((select 
                    round(coalesce(sum(cash_payment), 0), 2)
                from
                    tbl_cash_payment
                where
                    deliver_order_id = ddo.deliver_order_id
                        and status = 1
                group by deliver_order_id),
            0) as cash_payment,
    @realized_cheque_amount:=coalesce((select 
                    sum(cheque_payment)
                from
                    tbl_cheque_payment
                where
                    status = 1 and realized_status = 1
                        and deliver_order_id = ddo.deliver_order_id
                group by deliver_order_id),
            0) as realized_cheque_amount,
    @unrealized_cheque_amount:=coalesce((select 
                    sum(cheque_payment)
                from
                    tbl_cheque_payment
                where
                    status = 1 and realized_status = 0
                        and deliver_order_id = ddo.deliver_order_id
                group by deliver_order_id),
            0) as unrealized_cheque_amount,
    @bank_dep_payment:=coalesce((select 
                    round(coalesce(sum(deposit_payment), 0), 2)
                from
                    tbl_bank_deposit_payment
                where
                    deliver_order_id = ddo.deliver_order_id
                group by deliver_order_id),
            0) as bank_dep_payment,
    @tpawurc:=round((@cash_payment + @realized_cheque_amount + @unrealized_cheque_amount + @bank_dep_payment),
            2) as total_paid_amount_with_unrealized_cheques,
    @tpawourc:=round((@cash_payment + @realized_cheque_amount + @bank_dep_payment),
            2) as total_paid_amount_without_unrealized_cheques,
    round((ddo.total_amount - @tpawurc), 2) as total_pending_amount_with_unrealized_cheques,
    round(sum((ddo.total_amount - @tpawourc)), 2) as total_due_amount,
    datediff(ddo.due_date, curdate()) as number_of_days
from
    tbl_dealer_deliver_order ddo
        inner join
    tbl_dealer td ON ddo.dealer_id = td.delar_id
        inner join
    tbl_branch br ON td.branch_id = br.branch_id
where
    (ddo.status = 1 or ddo.status = 2)
        and td.status = 1
        and ddo.dealer_id = $dealer_id 
group by ddo.dealer_id
having total_due_amount > 0
order by ddo.dealer_id
";
        return $this->db->mod_select($sql);
    }

    public function get_avg_movement_in_dealer($dealer_id, $item_id) {
        $cur_date = new DateTime();
        $cur_date1 = new DateTime();
        $cur_date->modify("last day of previous month");
        $cur_date1->modify("first day of previous month");
        $last_date_of_previous_month = $cur_date->format("Y-m-d");
        $first_date_of_previous_month = $cur_date1->format("Y-m-d");
        $date_create = date_create($first_date_of_previous_month);
        date_sub($date_create, date_interval_create_from_date_string("6 months"));
        $first_date_after_6months = date_format($date_create, "Y-m-d");

        //echo $last_date_of_previous_month . " To " . $first_date_after_6months;
        $sql = "select 
    round(ifnull((select 
                            sum(tals.qty)/6
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
                            ti.item_id = " . $item_id . " and td1.delar_id = " . $dealer_id . "
                                and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'),
                    0),
            2) as avg_dealer";
        return $this->db->mod_select($sql);
    }

    public function get_avg_movement_in_area($rep_id, $item_id) {
        $cur_date = new DateTime();
        $cur_date1 = new DateTime();
        $cur_date->modify("last day of previous month");
        $cur_date1->modify("first day of previous month");
        $last_date_of_previous_month = $cur_date->format("Y-m-d");
        $first_date_of_previous_month = $cur_date1->format("Y-m-d");
        $date_create = date_create($first_date_of_previous_month);
        date_sub($date_create, date_interval_create_from_date_string("6 months"));
        $first_date_after_6months = date_format($date_create, "Y-m-d");

        //$sql = "SELECT ifnull(round(sum(qty)/6,2),0) as avg_area FROM `tbl_all_sales` Where s_e_code='$se_code' and part_no='$part_no' and date_edit between '$second_month' and '$first_date' and status=1";
        $sql = "select 
    round(ifnull((select 
                            sum(tals.qty) / 6
                        from
                            tbl_all_sales tals
                                inner join
                            tbl_item ti ON tals.part_no = ti.item_part_no
                                and tals.status = 1
                                and ti.status = 1
                                inner join
                            tbl_dealer td1 ON tals.acc_no = td1.delar_account_no
                                and td1.status = 1
                                inner join
                            tbl_sales_officer tso ON td1.sales_officer_id = tso.sales_officer_id
                                and tso.status = 1
                        where
                            ti.item_id = " . $item_id . "
                                and tso.sales_officer_id = " . $rep_id . "
                                and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "' group by ti.item_id),
                    0),
            2) as avg_area";
        return $this->db->mod_select($sql);
    }

}

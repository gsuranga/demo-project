<?php

/*
 * @author Waruna Oshan Wisumperuma
 * @contact warunaoshan@gmail.com
 */

class android_service_model extends C_Model {

    public function __construct() {
        parent::__construct();
    }

    public function getPassword($user_name) {
        $sql = "select password from tbl_user where username= '" . $user_name . "' and status = 1";
        return $this->db->mod_select($sql);
    }

    //========================new nilu===================================================

    public function insert_new_tour_itentary($data) {
        //  echo $data['sales_rep_id'];
        $json_decode = json_decode($data['json_string']);
        $tbl_sales_officer_visit = array(
            'sales_officer_id' => $data['sales_rep_id'],
            'route' => $json_decode->outlet_name,
            'visit_category' => $json_decode->visit_category,
            'visit_purpose' => $json_decode->visit_purpose,
            'selected_id' => $json_decode->outlet_id,
            'city_id' => 0,
            'branch_id' => 0,
            'district_id' => 0,
            'visit_time' => $json_decode->visit_time,
            'visit_date' => $json_decode->visit_date,
            'description' => $json_decode->description);

        $this->db->insertData("tbl_sales_officer_visit", $tbl_sales_officer_visit);
    }

    //new---------------------------close------------------=============================
    //NEW1---------------
    public function insert_bank_deposit_payment($data) {
        $json_decode = json_decode($data['json_string']);

        $full_path = '';
        if ($json_decode->image != '') {
            $image_name = $data['sales_rep_id'] . date('Y-m-d H-i-s');
            //   $image_name="x";
            $full_path = "./deposit_slip_image/{$image_name}.jpg";
            file_put_contents($full_path, base64_decode($json_decode->image));
            chmod($full_path, 0777);
        }
//        echo $data['deliver_order_id'];

        $tbl_bank_deposit_payment = array(
            'bank_deposit_payment_id' => 0,
            'deposit_payment' => $json_decode->amount,
            'deposit_date' => $json_decode->deposit_date,
            'added_date' => $json_decode->date,
            'added_time' => $json_decode->time,
            'bank_id' => 0,
            'deliver_order_id' => $json_decode->deliver_order_id,
            'account_no' => 0,
            'deposit_slip_image' => 0,
            'sales_officer_id' => $data['sales_rep_id'],
            'tour_status' => 0,
            'deposit_slip_image' => $full_path,
            'slip_no' => $json_decode->slip_no);


        $this->db->insertData("tbl_bank_deposit_payment", $tbl_bank_deposit_payment);
    }

    // //NEW1---------------
    //NEW2--------
    public function insert_cheque_payment($data) {
//        echo $data['deliver_order_id'];
        $json_decode = json_decode($data['json_string']);

        $full_path = '';
        if ($json_decode->image != '') {
            $image_name = $data['sales_rep_id'] . date('Y-m-d H-i-s');
            //   $image_name="x";
            $full_path = "./cheque_images/{$image_name}.jpg";
            file_put_contents($full_path, base64_decode($json_decode->image));
            chmod($full_path, 0777);
        }


        $tbl_cheque_payment = array(
            'cheque_no' => $json_decode->cheque_no,
            'cheque_payment' => $json_decode->amount,
            'realized_date' => $json_decode->realised_date,
            'deliver_order_id' => $json_decode->deliver_order_id,
            'sales_officer_id' => $data['sales_rep_id'],
            'realized_status' => 0,
            'bank_id' => $json_decode->bankname,
            'tour_status' => 0,
            'added_date' => $json_decode->date,
            'added_time' => $json_decode->time,
            'status' => 1,
            'cheque_image' => $full_path
        );


        $this->db->insertData("tbl_cheque_payment", $tbl_cheque_payment);
    }
    ////NEW2--------

    ////NEW2--------
    //NEW3
    public function insert_cash_payment($data) {
//        echo $data['deliver_order_id'];
        $json_decode = json_decode($data['json_string']);
        $tbl_cash_payment = array(
            'cash_payment' => $json_decode->amount,
            'deliver_order_id' => $json_decode->deliver_order_id,
            'sales_officer_id' => $data['sales_rep_id'],
            'tour_status' => 0,
            'added_date' => $json_decode->date,
            'added_time' => $json_decode->time,
            'status' => 1,
        );
        $this->db->insertData("tbl_cash_payment", $tbl_cash_payment);
    }

    //NEW4
    //new ========================
    public function updateservice() {
        //  echo $data['version'];

        $sql = "select 
    max(version_code) as maxversion
from
    tbl_apk_version";
        $data1 = $this->db->mod_select($sql);
        return $data1[0]->maxversion;
    }

    public function version_in_apk() {
        //  echo $data['version'];
        $sql = "select max(version) as version,
    max(version_code) as maxversion
from
    tbl_apk_version";
        return $data1 = $this->db->mod_select($sql);
//        return $data1[0]->version;
    }

    public function set_app_version($data) {

        $this->db->__beginTransaction();
        $this->db->insertData('tbl_apk_version', array(
            'version' => $data['data1'],
            'version_code' => $data['data2'],
        ));
    }

    public function getUserDetails($user_name) {
        $sql = "select
    id,
    employee_id,
    tbl_usertype.typename,
    tbl_usertype.typeid,
    name,
    username,
    tbl_branch.branch_name,
    tbl_branch.branch_account_no,
    tbl_branch.branch_code,
    ar.area_code,
    ar.area_account_no,
    ar.area_name,
    tbl_sales_officer.sales_officer_account_no,
    (SELECT
            amount
        FROM
            tbl_vat
        order by tbl_vat.id_vat desc
        limit 1) as vat
from
    tbl_user
        inner join
    tbl_sales_officer ON tbl_user.employee_id = tbl_sales_officer.sales_officer_id
        inner join
    tbl_branch ON tbl_branch.branch_id = tbl_sales_officer.branch_id
        inner join
    tbl_area ar ON tbl_branch.area_id = ar.area_id
        inner join
    tbl_usertype ON tbl_user.typeid = tbl_usertype.typeid
where
    username = '" . $user_name . "'
        and tbl_user.status = 1";
        return $this->db->mod_select($sql);
    }

    public function item_details($ts, $rep_id) {
        $sql = "SELECT
    it.item_id,
    it.item_part_no,
    it.description,
    it.selling_price,
    it.total_stock_qty,
    it.status,
    it.time_stamp,
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
                            ti.item_id = it.item_id
                                and tso.sales_officer_id = " . $rep_id . "
                                and tals.date_edit between (date_sub((date_add(last_day(date_sub(curdate(), interval 1 month)),
                                    interval 1 day)),
                                interval 7 month)) and (last_day(date_sub(curdate(), interval 1 month)))),
                    0),
            2) as avg_movement_in_area
FROM
    tbl_item it
WHERE
    time_stamp > '" . $ts . "' ";
        return $this->db->mod_select($sql);
    }

    public function dealer_details($ts, $so) {
        $time_stamp = $ts;
        $sales_officer = $so;
        $sql = "select
    td1.delar_id,
    td1.delar_account_no,
    td1.delar_name,
    td1.delar_address,
    td1.delar_shop_name,
    td1.discount_percentage,
    td1.so_update_status,
    td1.credit_limit,
    td1.status,
    td1.longitude,
    td1.latitude,
    ifnull(tu.username, '') as username,
    ifnull(tu.password, '') as password,
    ifnull((select
                    round(sum((ddo.total_amount - (coalesce((select
                                                round(coalesce(sum(cash_payment), 0), 2)
                                            from
                                                tbl_cash_payment
                                            where
                                                deliver_order_id = ddo.deliver_order_id
                                                    and status = 1
                                            group by deliver_order_id),
                                        0) + coalesce((select
                                                sum(cheque_payment)
                                            from
                                                tbl_cheque_payment
                                            where
                                                status = 1 and realized_status = 1
                                                    and deliver_order_id = ddo.deliver_order_id
                                            group by deliver_order_id),
                                        0) + coalesce((select
                                                round(coalesce(sum(deposit_payment), 0), 2)
                                            from
                                                tbl_bank_deposit_payment
                                            where
                                                deliver_order_id = ddo.deliver_order_id
                                            group by deliver_order_id),
                                        0)))),
                                2) as total_due_amount
                from
                    tbl_dealer_deliver_order ddo
                        inner join
                    tbl_dealer td ON ddo.dealer_id = td.delar_id
                        inner join
                    tbl_branch br ON td.branch_id = br.branch_id
                where
                    (ddo.status = 1 or ddo.status = 2)
                        and td.status = 1
                        and ddo.dealer_id = td1.delar_id
                        and ddo.due_date
                group by ddo.dealer_id
                having total_due_amount > 0),
            0.00) as outstanding_amount,
    ifnull((select
                    round(sum((ddo.total_amount - (coalesce((select
                                                round(coalesce(sum(cash_payment), 0), 2)
                                            from
                                                tbl_cash_payment
                                            where
                                                deliver_order_id = ddo.deliver_order_id
                                                    and status = 1
                                            group by deliver_order_id),
                                        0) + coalesce((select
                                                sum(cheque_payment)
                                            from
                                                tbl_cheque_payment
                                            where
                                                status = 1 and realized_status = 1
                                                    and deliver_order_id = ddo.deliver_order_id
                                            group by deliver_order_id),
                                        0) + coalesce((select
                                                round(coalesce(sum(deposit_payment), 0), 2)
                                            from
                                                tbl_bank_deposit_payment
                                            where
                                                deliver_order_id = ddo.deliver_order_id
                                            group by deliver_order_id),
                                        0)))),
                                2) as total_due_amount
                from
                    tbl_dealer_deliver_order ddo
                        inner join
                    tbl_dealer td ON ddo.dealer_id = td.delar_id
                        inner join
                    tbl_branch br ON td.branch_id = br.branch_id
                where
                    (ddo.status = 1 or ddo.status = 2)
                        and td.status = 1
                        and ddo.dealer_id = td1.delar_id
                        and ddo.due_date < curdate()
                group by ddo.dealer_id
                having total_due_amount > 0),
            0.00) as overdue_amount,
    ifnull((SELECT
                    round(ifnull((sum(tds.qty * tds.unit_price) / 3), 0),
                                2)
                FROM
                    tbl_dealer_sales tds
                        INNER JOIN
                    tbl_dealer td ON tds.id_dealer = td.delar_id
                WHERE
                    tds.id_dealer = td1.delar_id
                        and tds.status = 1
                        and tds.sold_date BETWEEN date_sub(curdate(), interval 90 day) and curdate()
                group by td.delar_id),
            0.00) as current_to
from
    tbl_dealer td1
        left join
    tbl_user tu ON td1.delar_id = tu.employee_id
        and tu.status = 1
        and tu.typeid = 4
where
    td1.sales_officer_id = " . $so . "
        and td1.dealer_time_stamp > " . $ts . "
        and td1.status = 1
order by td1.delar_id

";
        return $this->db->mod_select($sql);
    }

    public function getDealers($soID) {
// $sql = "SELECT dl.delar_id, dl.delar_name FROM tbl_dealer dl INNER JOIN tbl_sales_officer so ON so.branch_id = dl.branch_id WHERE so.sales_officer_id = " . $soID;
        $sql1 = "SELECT dl.delar_id FROM tbl_dealer dl WHERE dl.sales_officer_id = " . $soID;
        return $this->db->mod_select($sql1);
    }

    public function autoCreatePurchaseOrder($soID) {
        $dealerResult = $this->getDealers($soID);
        $allResult = array();
        for ($d = 0; $d < count($dealerResult); $d++) {
            $sql = "SELECT
    tbl_item.item_id AS ITEMID,
    tbl_item.item_part_no,
    tbl_item.description,
    tbl_item.total_stock_qty,
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
            0) AS total_sales,
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
            2) AS avg_monthly_sales,
    ifnull((SELECT
                    remaining_qty
                FROM
                    tbl_dealer_stock
                WHERE
                    dealer_id = DEALERID
                        AND part_id = ITEMID
                order BY dealer_stock_id desc
                limit 1),
            0) AS avilable_stock_at_the_dealer,
    ifnull((SELECT
                    sum(loss_qty)
                FROM
                    tbl_dealer_loss_sales
                WHERE
                    dealer_id = DEALERID
                        AND part_id = ITEMID
                        AND loss_type = 1
                        AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
            0) AS stock_lost_sales,
    ifnull((SELECT
                    sum(loss_qty)
                FROM
                    tbl_dealer_loss_sales
                WHERE
                    dealer_id = DEALERID
                        AND part_id = ITEMID
                        AND loss_type = 2
                        AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
            0) AS value_lost_sales,
    round(ifnull(ifnull(sum((ifnull((SELECT
                                            sum(qty)
                                        FROM
                                            tbl_dealer_sales
                                        WHERE
                                            tbl_dealer_sales.id_item = ITEMID
                                                AND tbl_dealer_sales.id_dealer = DEALERID
                                                AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
                                    0)) + ifnull((SELECT
                                            sum(loss_qty)
                                        FROM
                                            tbl_dealer_loss_sales
                                        WHERE
                                            dealer_id = DEALERID
                                                AND part_id = ITEMID
                                                AND loss_type = 1
                                                AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
                                    0)),
                            0) / 30,
                    0),
            2) AS avg_daily_demand,
    ((round(ifnull(ifnull(sum((ifnull((SELECT
                                            sum(qty)
                                        FROM
                                            tbl_dealer_sales
                                        WHERE
                                            tbl_dealer_sales.id_item = ITEMID
                                                AND tbl_dealer_sales.id_dealer = DEALERID
                                                AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
                                    0)) + ifnull((SELECT
                                            sum(loss_qty)
                                        FROM
                                            tbl_dealer_loss_sales
                                        WHERE
                                            dealer_id = DEALERID
                                                AND part_id = ITEMID
                                                AND loss_type = 1
                                                AND loss_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()),
                                    0)),
                            0) / 30,
                    0),
            2)) * 10) AS suggested_qty,
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
            0))) AS number_of_unsuplied_Order,
    round(((ifnull((SELECT
                            sum(qty)
                        FROM
                            tbl_all_sales
                        WHERE
                            area_id = AREAID
                                AND part_no = item_part_no
                                AND date_edit BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 90 DAY)) AND CURDATE()),
                    0)) / 3),
            2) AS movement_avg_in_area,
    ifnull((SELECT
                    DATEDIFF(CURDATE(), date_edit)
                FROM
                    tbl_all_sales
                WHERE
                    part_no = item_part_no
                        AND acc_no = deale_acc_no
                ORDER BY all_sales_id DESC
                limit 1),
            0) AS day_since_last_invoice,
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
            0) AS day_since_last_po
FROM
    tbl_dealer_sales
        LEFT JOIN
    tbl_item ON tbl_dealer_sales.id_item = tbl_item.item_id
WHERE
    tbl_dealer_sales.id_dealer = " . $dealerResult[$d]->delar_id . "
        AND tbl_dealer_sales.sold_date BETWEEN (DATE_ADD(CURDATE(), INTERVAL - 30 DAY)) AND CURDATE()
GROUP BY tbl_item.item_id
Order BY (sum(tbl_dealer_sales.qty)) DESC
";

            $result = $this->db->mod_select($sql);
            for ($i = 0; $i < count($result); $i++) {
                $allResult[$d][$i]['delar_id'] = $dealerResult[$d]->delar_id;
                $allResult[$d][$i]['ItemID'] = $result[$i]->ITEMID;
                $allResult[$d][$i]['Part_Number'] = $result[$i]->item_part_no;
                $allResult[$d][$i]['Available_Stocks_at_the_Dealer'] = $result[$i]->avilable_stock_at_the_dealer;
                $allResult[$d][$i]['avg_monthly_sale'] = $result[$i]->avg_monthly_sales;
                $allResult[$d][$i]['Total_Sales_for_last_30days'] = $result[$i]->total_sales;
                $allResult[$d][$i]['Stocklostsales'] = $result[$i]->stock_lost_sales;
                $allResult[$d][$i]['Valuelostsales'] = $result[$i]->value_lost_sales;
                $allResult[$d][$i]['AverageDailyDemand'] = $result[$i]->avg_daily_demand;
                $allResult[$d][$i]['Daysbetweenorders'] = 10;
                $allResult[$d][$i]['SuggestedQty'] = isset($result[$i]->suggested_qty) ? $result[$i]->suggested_qty : 0;
                $allResult[$d][$i]['Available_Stocks_at_VSD'] = isset($result[$i]->total_stock_qty) ? $result[$i]->total_stock_qty : 0;
                $allResult[$d][$i]['UnsuppliedOrderQtyfor90day'] = $result[$i]->number_of_unsuplied_Order;
                $allResult[$d][$i]['movement_in_area_per_month'] = $result[$i]->movement_avg_in_area;
                $allResult[$d][$i]['Days_since_Last_Invoice_Date'] = isset($result[$i]->day_since_last_invoice) ? $result[$i]->day_since_last_invoice : 0;
                $allResult[$d][$i]['Days_since_Last_PO_Date'] = $result[$i]->day_since_last_po;
                $allResult[$d][$i]['Avg_monthly_requirement'] = 0;
                $allResult[$d][$i]['Number_of_Items_invoice_for_past_01_month'] = 0;
            }
        }
        return $allResult;
    }

    public function insert_sales_order() {
        $this->db->__beginTransaction();
        $data = json_decode($_REQUEST['data']);
        $vat = $this->db->mod_select('SELECT amount FROM tbl_vat order by tbl_vat.id_vat desc limit 1');
        foreach ($data->order as $order) {
            //count vat
            $order_vat = $order->BillAmount + (($order->BillAmount * $vat[0]->amount) / 100);
            // insert tbl_dealer_purchase_order
            $date = new DateTime($order->date_of_bill);
            $tbl_dealer_purchase_order = array(
                'date' => $date->format('Y-m-d'),
                'time' => $date->format('H:i:s'),
                'complete' => $order->complete,
                'dealer_id' => $order->dealer_id,
                'amount' => $order_vat,
                'without_vat' => $order->BillAmount,
                'sales_officer_id' => $_REQUEST['officer_id'],
                'lat' => $order->lat,
                'lon' => $order->lon,
                'battery' => $order->b_level,
                'status' => 1
            );
            $this->db->insertData("tbl_dealer_purchase_order", $tbl_dealer_purchase_order);
            $purchase_order_id = $this->db->insert_id();
            //insert tbl_dealer_purchase_order_detail
            foreach ($order->items as $itm) {
                $tbl_dealer_purchase_order_detail = array(
                    'purchase_order_id' => $purchase_order_id,
                    'item_id' => $itm->item_id,
                    'item_qty' => $itm->qty,
                    'unit_price' => $itm->price,
                    'status' => 1
                );
                $this->db->insertData("tbl_dealer_purchase_order_detail", $tbl_dealer_purchase_order_detail);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

//---------------------------------------------------pending_payments : Dinesh--------------------------------//
    public function getAllPendingPayments($officer_id) {
        $sql = "select
    ddo . *,
    0.00 as return_amount,
    td.delar_account_no,
    td.delar_shop_name,
    td.business_address,
    br.branch_name,
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
    round((ddo.total_amount - @tpawourc), 2) as total_pending_amount_without_unrealized_cheques,
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
        and td.sales_officer_id = " . $officer_id . "
group by ddo.deliver_order_id
having total_pending_amount_with_unrealized_cheques > 0
    or total_pending_amount_without_unrealized_cheques > 0";
        return $mod_select = $this->db->mod_select($sql);
    }

    //---------------------------------------------------pending_payments : Dinesh--------------------------------//

    public function getDealerStock($officer_id) {
        $sql = "select
    it.item_part_no,
    it.description,
    ds.remaining_qty,
    ds.last_stock_date,
    td.delar_id,
    td.delar_name,
    td.delar_account_no,
    ifnull((select
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
                    ti.item_id = it.item_id
                        and td1.delar_id = td.delar_id
                        and tals.date_edit between (date_sub((date_add(last_day(date_sub(curdate(), interval 1 month)),
                            interval 1 day)),
                        interval 7 month)) and (last_day(date_sub(curdate(), interval 1 month)))),
            0) as avg_movement_at_dealer,
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
                            ti.item_id = it.item_id
                                and tso.sales_officer_id = so.sales_officer_id
                                and tals.date_edit between (date_sub((date_add(last_day(date_sub(curdate(), interval 1 month)),
                                    interval 1 day)),
                                interval 7 month)) and (last_day(date_sub(curdate(), interval 1 month)))),
                    0),
            2) as avg_movement_in_area
from
    tbl_dealer_stock ds
        inner join
    tbl_item it ON ds.part_id = it.item_id
        inner join
    tbl_dealer td ON ds.dealer_id = td.delar_id
        inner join
    tbl_sales_officer so ON td.sales_officer_id = so.sales_officer_id
where
    ds.status = 1
        and so.sales_officer_id = " . $officer_id;
        return $mod_select = $this->db->mod_select($sql);
    }

    //============================widuranga jayawickrama============start===============================================

    public function getAllBanks() {
        $sql = "select * from tbl_bank where status = 1";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function getDistricts($time_stamp) {
        $sql = "select
    td.district_name, td.district_id, td.district_code
from
    tbl_district as td
where
    td.time_stamp > '" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function getCity($time_stamp) {
        $sql = "select
    tc.city_name, tc.city_id, tc.city_code
from
    tbl_city as tc
where
    tc.status = 1
        and tc.time_stamp >'" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_current_vat($time_stamp) {
        $sql = "select
    tv.amount, tv.update_date
from
    tbl_vat as tv
where
    tv.time_stamp > '" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_customers_details($time_stamp) {
        $sql = "select
    tso.sales_officer_name,
    tso.sales_officer_id,
    tc.*,
    tcy.customer_type_name,
    tcy.customer_type_id
from
    tbl_customer as tc
        inner join
    tbl_sales_officer as tso ON tc.sales_officer_id = tso.sales_officer_id
        inner join
    tbl_customer_type as tcy ON tc.customer_type = tcy.customer_type_id
where
    tc.status = 1 and tc.time_stamp > " . $time_stamp;
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_customer_types($time_stamp) {
        $sql = "select
    tct.customer_type_id, tct.customer_type_name
from
    tbl_customer_type as tct
where
    tct.status = 1
        and tct.time_stamp > '" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_vehicle($time_stamp) {
        $sql = "select
    tv . *, tc.customer_name, tvm.vehicle_model_name, tc.customer_type
from
    tbl_vehicle as tv
        inner join
    tbl_vehicle_model as tvm ON tv.vehicle_model_id = tvm.vehicle_model_id
        inner join
    tbl_customer as tc ON tv.customer_id = tc.customer_id
where
    tv.status = 1 and tv.time_stamp > " . $time_stamp;
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_garages($time_stamp) {
        $sql = "select
    tg.garage_id,
    tg.garage_name,
    tg.garage_address,
    tg.garage_code,
    tg.garage_account_no,
    tg.garage_contact_no,
    td.delar_name,
    tg.remarks
from
    tbl_garage as tg
        inner join
    tbl_dealer as td ON tg.nearest_tata_dealer = td.delar_id
where
    tg.status = 1
        and tg.time_stamp >'" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_new_shops($time_stamp) {
        $sql = "select
    tnrs.shop_code,
    tnrs.shop_address,
    tnrs.shop_id,
    tnrs.shop_name,
    tnrs.branch_id,
    tb.branch_name,
    tnrs.sales_officer_id,
    tso.sales_officer_name,
    tc.city_name,
    tnrs.city_id
from
    tbl_non_reg_shops as tnrs
        inner join
    tbl_branch as tb ON tb.branch_id = tnrs.branch_id
        inner join
    tbl_sales_officer as tso ON tnrs.sales_officer_id = tso.sales_officer_id
        inner join
    tbl_city as tc ON tnrs.city_id = tc.city_id
where
    tnrs.status = 1
        and tnrs.shop_timestamp >'" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_visit_categories($time_stamp) {
        $sql = "select
    tyc.category_name, tyc.category_code, tyc.visit_category_id
from
    tbl_visit_category as tyc
where
    tyc.status = 1
        and tyc.time_stamp > '" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_visit_purposes($time_stamp) {
        $sql = "select
    tvp.purpose_id_name,
    tvp.visit_purpose_id,
    tvp.visit_purpose_code,
    tvp.description
from
    tbl_visit_purpose as tvp
where
    tvp.status = 1
        and tvp.time_stamp > '" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function get_campaign_type($time_stamp) {
        $sql = "select
    tct.id_campaing_type, tct.type_description
from
    tbl_campaign_type as tct
where
    tct.status = 1
        and tct.time_stamp >'" . $time_stamp . "'";
        return $mod_select = $this->db->mod_select($sql);
    }

    //======================widuranga jayawickrama========================end=====================================
    //---------------------------------Tour Itenary : Dinesh------------------------------------------

    public function getAllVisitHistory() {
        $sql = "select
    sov . *,
    so.sales_officer_name,
    so.sales_officer_code,
    vc.category_name,
    vc.category_code,
    vp.purpose_id_name,
    vp.visit_purpose_code,
    ct.city_name
from
    tbl_sales_officer_visit sov
        inner join
    tbl_sales_officer so ON sov.sales_officer_id = so.sales_officer_id
        inner join
    tbl_visit_category vc ON sov.visit_category = vc.visit_category_id
        inner join
    tbl_visit_purpose vp ON sov.visit_purpose = vp.visit_purpose_id
        inner join
    tbl_city ct ON sov.city_id = ct.city_id
where
    sov.status = 1";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function getAllFleetOwners($time_stamp) {
        $sql = "SELECT tv.vehicle_id, tv.vehicle_reg_no, tc.customer_name
FROM tbl_vehicle tv
INNER JOIN tbl_customer tc ON tv.customer_id = tc.customer_id
WHERE tv.status =1
AND tc.status =1
AND tc.customer_type =3
AND tv.time_stamp > " . $time_stamp;
        return $mod_select = $this->db->mod_select($sql);
    }

    /**
     * 2014-11-07 9:00 AM
     * @author SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @modified 2014-11-30 06:00:00 PM  SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @desc avg monthly movement of items in area which particular dealer not purchased during last 6 months;
     *
     */
    public function getFastMoovingItemsInArea($dealer_id) {
        /* OLD
         * $sql = "select
          it.item_id,
          it.item_part_no,
          it.description,
          round(sum(ddod.quantity), 0) as quantity
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
        date_sub($date_create, date_interval_create_from_date_string("5 months"));
        $first_date_after_6months = date_format($date_create, "Y-m-d");
        $sql = "select
    t2.item_id,
    t2.selling_price,
    t2.item_part_no,
    t2.description,
    @avg_monthly_movement_in_area:=round(ifnull((select
                            sum(tals.qty) / 6
                        from
                            tbl_all_sales tals
                                inner join
                            tbl_item ti ON tals.part_no = ti.item_part_no
                                and ti.status = 1
                                and tals.status = 1
                                inner join
                            tbl_dealer td ON tals.acc_no = td.delar_account_no
                                and td.status = 1
                                inner join
                            tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
                                and tso.status = 1
                        where
                            tso.sales_officer_id = ((select
                                    sales_officer_id
                                from
                                    tbl_dealer
                                where
                                    delar_id = " . $dealer_id . " and status = 1))
                                and ti.item_id = t2.item_id
                                and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
                        group by ti.item_id),
                    0),
            2) as quantity
from
    (select
        ti.item_id, ti.item_part_no, ti.description
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and ti.status = 1
        and tals.status = 1
    inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
        and td.status = 1
    inner join tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
    where
        td.delar_id = " . $dealer_id . "
            and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
    group by ti.item_id) t1
        right join
    (select
        ti.item_id, ti.item_part_no, ti.description, ti.selling_price
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and ti.status = 1
        and tals.status = 1
    inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
        and td.status = 1
    inner join tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        and tso.status = 1
    where
        tso.sales_officer_id = ((select
                                    sales_officer_id
                                from
                                    tbl_dealer
                                where
                                    delar_id = " . $dealer_id . " and status = 1))
            and tals.date_edit between '" . $first_date_after_6months . "' and '" . $last_date_of_previous_month . "'
    group by ti.item_id) t2 ON t1.item_id = t2.item_id
where
    t1.item_id is null
order by quantity desc limit 10  ";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function getNotAchivedTargets($officer_id) {
        $sql = "select
    it.item_id,
    it.item_part_no,
    it.description,
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
    somt.sales_officer_id = " . $officer_id . "
        and somt.status = 1
group by mtd.item_id
having actual_qty < total_minimum_qty
    or actual_qty < total_target";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function getDealerStocksAvailability($officer_id, $part_id) {
        $sql = "select
    td.delar_id,
    td.delar_name,
    td.delar_account_no,
    round(coalesce((select
                            remaining_qty
                        from
                            tbl_dealer_stock
                        where
                            part_id = " . $part_id . "
                                and dealer_id = td.delar_id
                                and td.status = 1),
                    0),
            0) as available_qty
from
    tbl_dealer td
where
    td.sales_officer_id = " . $officer_id . "
        and td.status = 1
order by available_qty desc";
        return $mod_select = $this->db->mod_select($sql);
    }

    public function getDealerRanking() {
        $sql = "select
    td.delar_name,
    td.delar_account_no,
    tso.sales_officer_name,
    tar.area_code,
    round(coalesce((select
                            sum(mtd.current_selling_price) as monthly_target
                        from
                            tbl_sales_officer_monthly_target somt
                                inner join
                            tbl_monthly_target_detail mtd ON somt.monthly_target_id = mtd.monthly_target_id
                                and somt.status = 1
                                and somt.year = 2014
                                and somt.month = 9
                                and mtd.status = 1
                        where
                            somt.dealer_id = td.delar_id
                        group by somt.monthly_target_id),
                    0),
            2) target,
    round(coalesce((select
                            sum(als.selling_val)
                        from
                            tbl_all_sales als
                        where
                            als.status = 1
                                and als.date_edit between '2014-05-01' and '2014-05-31'
                                and als.acc_no = td.delar_account_no
                        group by als.acc_no),
                    0),
            2) as actual,
    round(coalesce((select
                            (sum(mtd.current_selling_price)) as monthly_target
                        from
                            tbl_sales_officer_monthly_target somt
                                inner join
                            tbl_monthly_target_detail mtd ON somt.monthly_target_id = mtd.monthly_target_id
                                and somt.status = 1
                                and mtd.status = 1
                                and concat(somt.year, '-', somt.month) between '2014-04' and '2015-03'
                        where
                            somt.dealer_id = td.delar_id
                        group by somt.dealer_id),
                    0),
            2) as total_target,
    round(coalesce((select
                            sum(als.selling_val)
                        from
                            tbl_all_sales als
                        where
                            als.status = 1
                                and als.date_edit between '2014-04-01' and '2015-03-31'
                                and als.acc_no = td.delar_account_no
                        group by als.acc_no),
                    0),
            2) as commulative_actual,
    round(coalesce((select
                            sum(als.selling_val)
                        from
                            tbl_all_sales als
                        where
                            als.status = 1
                                and als.date_edit between '2014-04-01' and '2015-03-31'
                                and als.acc_no = td.delar_account_no
                        group by als.acc_no) / 12,
                    0),
            2) as avg_sales
from
    tbl_dealer td
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
        inner join
    tbl_branch tbr ON tso.branch_id = tbr.branch_id
        inner join
    tbl_area tar ON tbr.area_id = tar.area_id
where
    td.status = 1
order by commulative_actual desc";
        return $this->db->mod_select($sql);
    }

//===========================widuranga====================================
    public function insert_product_failure($data) {
        $this->db->__beginTransaction();
        foreach ($data->failures as $order) {
            $part_num = $order->part_no;
            $part_id = $this->db->mod_select("select ti.item_id from tbl_item as ti where ti.item_part_no='$part_num' and ti.status=1");
            $part_id[0]->item_id;
            $date = new DateTime($data->time_stamp);
            $tbl_product_failures = array(
                'image' => './prodcut_failures_images/' . ($data->officer_id) . '/FailureImages/' . ($order->image_path),
                'failure' => $order->failure,
                'outlet_id' => $order->outlet_id,
                'category_id' => $order->type,
                'sales_officer' => $data->officer_id,
                'part_id' => $part_id[0]->item_id,
                'added_date' => $date->format('Y-m-d'),
                'added_time' => $date->format('H:i:s'),
                'status' => 1,
            );
            $this->db->insertData("tbl_product_failures", $tbl_product_failures);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function insert_branding_details($data) {
        $this->db->__beginTransaction();
        foreach ($data->brands as $order) {

            $date = new DateTime($data->time_stamp);
            $tbl_branding_details = array(
                'branding_image' => './branding_images/' . ($data->officer_id) . '/Brand/' . ($order->image_path),
                'description' => $order->other_details,
                'category_id' => $order->type,
                'selected_id' => $order->outlet_id,
                'sales_officer_id' => $data->officer_id,
                'tour_status' => $order->iternery_status,
                'added_date' => $date->format('Y-m-d'),
                'added_time' => $date->format('H:i:s'),
                'status' => 1,
            );
            $this->db->insertData("tbl_branding_details", $tbl_branding_details);
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function insert_payments_details($data) {
        $this->db->__beginTransaction();
        foreach ($data->deposit as $bank_deposit) {
            $date = new DateTime($data->time_stamp);
            $path = './payment_details/' . ($data->officer_id) . '/' . $date->format('Y-m-d_H-i-s') . '/Payment/' . ($bank_deposit->path);
            $tbl_bank_deposit_payment = array(
                'slip_no' => $bank_deposit->slip_no,
                'deposit_payment' => $bank_deposit->amount,
                'deposit_date' => $bank_deposit->deposit_date,
                'deliver_order_id' => $bank_deposit->deliver_order_id,
                //'account_no' => 0,
                'bank_id' => $bank_deposit->bankid,
                'sales_officer_id' => $data->officer_id,
                'tour_status' => $bank_deposit->iternary_status,
                'added_date' => $date->format('Y-m-d'),
                'added_time' => $date->format('H:i:s'),
                'status' => 1,
            );
            $tbl_bank_deposit_payment['deposit_slip_image'] = file_exists($path) ? $path : '';
            $this->db->insertData("tbl_bank_deposit_payment", $tbl_bank_deposit_payment);
        }
        foreach ($data->cheque as $cheque) {
            $date = new DateTime($data->time_stamp);
            $path = './payment_details/' . ($data->officer_id) . '/' . $date->format('Y-m-d_H-i-s') . '/Payment/' . ($cheque->image_path);
            $tbl_cheque_payment = array(
                //'cheque_image' => './payment_details/' . ($data->officer_id) . '/Cheque/' . ($cheque->image_path),
                'cheque_no' => $cheque->cheque_no,
                'cheque_payment' => $cheque->amount,
                'realized_date' => $cheque->realised_date,
                'deliver_order_id' => $cheque->deliver_order_id,
                'sales_officer_id' => $data->officer_id,
                'realized_status' => 0,
                'tour_status' => $cheque->iternary_status,
                'added_date' => $date->format('Y-m-d'),
                'added_time' => $date->format('H:i:s'),
                'status' => 1,
            );
            $tbl_cheque_payment['cheque_image'] = file_exists($path) ? $path : '';
            $this->db->insertData("tbl_cheque_payment", $tbl_cheque_payment);
        }
        foreach ($data->cash as $cash) {
            $date = new DateTime($data->time_stamp);
            $tbl_cash_payment = array(
                'cash_payment' => $cash->cash_amount,
                'deliver_order_id' => $cash->deliver_order_id,
                'sales_officer_id' => $data->officer_id,
                'tour_status' => $cash->iternary_status,
                'added_date' => $date->format('Y-m-d'),
                'added_time' => $date->format('H:i:s'),
                'status' => 1,
            );
            $this->db->insertData("tbl_cash_payment", $tbl_cash_payment);
        }

        $this->db->__endTransaction();
        return $this->db->status();
    }

//============================widuranga==================end=============================================
    public function getDealerName($id, $select) {
        $salesOfficerId = $this->session->userdata('employe_id');
//        print_r($salesOfficerId);
        $sql = "select
    td.delar_id, td.delar_name, td.delar_account_no
from
    tbl_dealer td
where
    td.status = 1
        and td.sales_officer_id =$salesOfficerId and td.delar_name like '$id%' limit 10";
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

    public function getDealerCode($id, $select) {
        $salesOfficerId = $this->session->userdata('employe_id');
//        print_r($salesOfficerId);
        $sql = "select
    td.delar_id, td.delar_name, td.delar_account_no
from
    tbl_dealer td
where
    td.status = 1
        and td.sales_officer_id =$salesOfficerId and td.delar_account_no like '$id%' limit 10";
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

    public function getInvoiceNo($id, $select) {
        $salesOfficerId = $this->session->userdata('employe_id');
//        print_r($salesOfficerId);
        $sql = "select
    tas.invoice, td.delar_id, td.delar_name, td.delar_account_no
from
    tbl_all_sales tas
        inner join
    tbl_dealer td ON tas.acc_no = td.delar_account_no
where
    tas.invoice like '$id%'
        and td.sales_officer_id = $salesOfficerId
group by td.delar_id
limit 10";
//        echo $sql;
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

    public function getWIPno($id, $select) {
        $salesOfficerId = $this->session->userdata('employe_id');
        $sql = "select
    tas.wip as wipno,
    tas.invoice,
    td.delar_id,
    td.delar_name,
    td.delar_account_no
from
    tbl_all_sales tas
        inner join
    tbl_dealer td ON tas.acc_no = td.delar_account_no
where
    tas.wip like '$id%'
        and td.sales_officer_id = $salesOfficerId
group by td.delar_id
limit 10";
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

    public function getAllSalesDetail($date) {

        $salesOfficerId = $this->session->userdata('employe_id');
        $append = "";
        if (isset($date['id']) && $date['id'] != "") {
            $append .=" and td.delar_id = {$date['id']}";
        }
        if (isset($date['date_e']) && $date['date_e'] != "") {
            $append .=" and tas.date_edit between '{$date['date_s']}' and '{$date['date_e']}'";
        }
        if (isset($date['invoice_id']) && $date['invoice_id'] != "") {
            $append .=" and tas.invoice={$date['invoice_id']}";
        }
        if (isset($date['wip_id']) && $date['wip_id'] != "") {
            $append .=" and tas.wip={$date['wip_id']}";
        }


        $sql = "select
    tas.date_edit,
    tas.time,
    round(sum(tas.selling_val), 2)as tot,
    tas.invoice,
    tas.wip,
    tas.all_sales_id,
    td.delar_name,
    td.delar_account_no
from
    tbl_all_sales tas
        inner join
    tbl_dealer td ON tas.acc_no = td.delar_account_no
        inner join
    tbl_sales_officer tso ON td.sales_officer_id = tso.sales_officer_id
where
    tas.status = 1 and td.status = 1
        and tso.status = 1
        and tso.sales_officer_id = $salesOfficerId $append
group by tas.wip order by tas.date_edit";
        return $this->db->mod_select($sql);
    }

    public function viewInvoices($data) {
        $sql = "select
    tas.part_no, tas.description, tas.qty, tas.selling_val
from
    tbl_all_sales tas
where
    tas.wip = {$data['wip_id']} and tas.invoice={$data['invoice_id']}";
        return $this->db->mod_select($sql);
    }

    public function vat() {
        $sql = "select
    *
from
    tbl_vat tv
where
    tv.status = 1";
        return $this->db->mod_select($sql);
    }

    /*
     * @author : S.H.Dinesh Maduhsnka
     * @desc : get Dealer target histry for last 6 months for line item wise target
     *
     */

    public function getDealerTargetHistory($dealer_id, $target_month) {
        $explode = explode("-", $target_month);
        $month = $explode[1];
        $year = $explode[0];
        $target_month_date = $target_month . "-01";
        $year1 = '';
        $year2 = '';
        if ($month < 4) {
            $year1 = $year - 1;
            $year2 = $year;
        } else {
            $year1 = $year;
            $year2 = $year + 1;
        }
        $fy_start = $year1 . "-04-01";
        $fy_end = $year2 . "-03-31";
        $sql = "select
    a1.item_id,
    ti.item_part_no,
    ti.description,
    ifnull((select
                    sum(tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    tmtd.item_id = a1.item_id
                        and somt.dealer_id = " . $dealer_id . "
                        and date(concat(somt.year, '-', somt.month, '-01')) between '" . $fy_start . "' and last_day('" . $target_month_date . "' - interval 1 month)),
            0) - ifnull((select
                    sum(als1.qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        and als1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = a1.item_id
                        and td1.delar_id = " . $dealer_id . "
                        and als1.date_edit between '" . $fy_start . "' and last_day('" . $target_month_date . "' - interval 1 month)),
            0) as bbf,
    ifnull((select
                    re_order_qty
                from
                    tbl_dealer_stock tds
                where
                    tds.dealer_id = " . $dealer_id . "
                        and tds.part_id = a1.item_id),
            0) as re_order_qty,
    ifnull((select
                    remaining_qty
                from
                    tbl_dealer_stock tds
                where
                    tds.dealer_id = " . $dealer_id . "
                        and tds.part_id = a1.item_id),
            0) as current_stock,
    round(ifnull((select
                            sum(als1.qty) / 6
                        from
                            tbl_all_sales als1
                                inner join
                            tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                                and td1.status = 1
                                and als1.status = 1
                                inner join
                            tbl_item it1 ON als1.part_no = it1.item_part_no
                                and it1.status = 1
                        where
                            td1.delar_id = " . $dealer_id . "
                                and it1.item_id = a1.item_id
                                and als1.date_edit between date_sub('" . $target_month_date . "', interval 6 month) and last_day('" . $target_month_date . "' - interval 1 month)),
                    0),
            2) as movement,
    ifnull((select
                    (tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    somt.year = year(date_sub('" . $target_month_date . "', interval 1 month))
                        and month = month(date_sub('" . $target_month_date . "', interval 1 month))
                        and tmtd.item_id = a1.item_id
                        and somt.dealer_id = " . $dealer_id . "),
            0) as month1_target,
    ifnull((select
                    sum(qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = a1.item_id
                        and td1.delar_id = " . $dealer_id . "
                        and als1.date_edit between date_sub('" . $target_month_date . "', interval 1 month) and last_day('" . $target_month_date . "' - interval 1 month)),
            0) as month1_actual,
    ifnull((select
                    (tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    somt.year = year(date_sub('" . $target_month_date . "', interval 2 month))
                        and month = month(date_sub('" . $target_month_date . "', interval 2 month))
                        and tmtd.item_id = a1.item_id
                        and somt.dealer_id = " . $dealer_id . "),
            0) as month2_target,
    ifnull((select
                    sum(qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = a1.item_id
                        and td1.delar_id = " . $dealer_id . "
                        and als1.date_edit between date_sub('" . $target_month_date . "', interval 2 month) and last_day('" . $target_month_date . "' - interval 2 month)),
            0) as month2_actual,
    ifnull((select
                    (tmtd.minimum_qty + tmtd.additional_qty)
                from
                    tbl_sales_officer_monthly_target somt
                        inner join
                    tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
                        and somt.status = 1
                        and tmtd.status = 1
                where
                    somt.year = year(date_sub('" . $target_month_date . "', interval 3 month))
                        and month = month(date_sub('" . $target_month_date . "', interval 3 month))
                        and tmtd.item_id = a1.item_id
                        and somt.dealer_id = " . $dealer_id . "),
            0) as month3_target,
    ifnull((select
                    sum(qty)
                from
                    tbl_all_sales als1
                        inner join
                    tbl_item it1 ON als1.part_no = it1.item_part_no
                        and it1.status = 1
                        inner join
                    tbl_dealer td1 ON als1.acc_no = td1.delar_account_no
                        and als1.status = 1
                where
                    it1.item_id = a1.item_id
                        and td1.delar_id = " . $dealer_id . "
                        and als1.date_edit between date_sub('" . $target_month_date . "', interval 3 month) and last_day('" . $target_month_date . "' - interval 3 month)),
            0) as month3_actual
from
    ((select
        tmtd.item_id
    from
        tbl_sales_officer_monthly_target tsomt
    inner join tbl_monthly_target_detail tmtd ON tsomt.monthly_target_id
        and tmtd.monthly_target_id
        and tsomt.status = 1
        and tmtd.status = 1
    where
        tsomt.dealer_id = " . $dealer_id . "
            and concat(tsomt.year, '-0', tsomt.month, '-01') between date_sub('" . $target_month_date . "', interval 6 month) and last_day('" . $target_month_date . "' - interval 1 month)) union (select distinct
        ti.item_id
    from
        tbl_all_sales tals
    inner join tbl_item ti ON tals.part_no = ti.item_part_no
        and ti.status = 1
        and tals.status = 1
    inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
        and td.status = 1
    where
        td.delar_id = " . $dealer_id . "
            and tals.date_edit between date_sub('" . $target_month_date . "', interval 6 month) and last_day('" . $target_month_date . "' - interval 1 month)
    group by ti.item_id) union (select distinct
        tmtd.item_id
    from
        tbl_sales_officer_monthly_target somt
    inner join tbl_monthly_target_detail tmtd ON somt.monthly_target_id = tmtd.monthly_target_id
        and somt.status = 1
        and tmtd.status = 1
    where
        somt.dealer_id = " . $dealer_id . "
            and date(concat(somt.year, '-', somt.month, '-01')) between '" . $fy_start . "' and last_day('" . $target_month_date . "' - interval 1 month)
            and (tmtd.minimum_qty + tmtd.additional_qty) - (ifnull((select
                sum(tals.qty)
            from
                tbl_all_sales tals
            inner join tbl_item ti ON tals.part_no = ti.item_part_no
                and ti.status = 1
                and tals.status = 1
            inner join tbl_dealer td ON tals.acc_no = td.delar_account_no
                and td.status = 1
            where
                ti.item_id = tmtd.item_id
                    and td.delar_id = somt.dealer_id
                    and tals.date_edit between '" . $fy_start . "' and last_day('" . $target_month_date . "' - interval 1 month)
            group by ti.item_id), 0)) > 0)) as a1
        inner join
    tbl_item ti ON a1.item_id = ti.item_id
order by (ti.selling_price*movement) desc";
        return $mod_select = $this->db->mod_select($sql);
    }

//======================================widuranga jayawickram 2104-12-30===================================
    public function MonthlyTarget($data) {
        $json_decode = json_decode($data['json_string']);
        $this->db->__beginTransaction();
        $tbl_sales_officer_monthly_target = array(
            'sales_officer_id' => $data['sales_rep_id'],
            'dealer_id' => $json_decode->target_json->dealer_id,
            'year' => $json_decode->target_json->month,
            'month' => $json_decode->target_json->year,
            'discount_percentage' => $json_decode->target_json->current_discount_percentage,
            'added_date' => $json_decode->target_json->added_date,
            'added_time' => $json_decode->target_json->added_time,
            'status' => 1,
        );
        // print_r($tbl_sales_officer_monthly_target);
        $this->db->insertData("tbl_sales_officer_monthly_target", $tbl_sales_officer_monthly_target);
        $monthly_target_id = $this->db->insert_id();
        foreach ($json_decode->target_json->items as $value) {
            $tbl_monthly_target_detail = array(
                'monthly_target_id' => $monthly_target_id,
                'item_id' => $value->item_id,
                'minimum_qty' => $value->minimum_qty,
                'additional_qty' => $value->additional_qty,
                'current_selling_price' => $value->current_selling_price,
                'status' => 1,
            );
            //print_r($tbl_monthly_target_detail);
            $this->db->insertData("tbl_monthly_target_detail", $tbl_monthly_target_detail);
        }
        $this->db->__endTransaction();
        $last_id = "";
        $result = "";
        $last_id = $this->db->insert_id();
        if ($last_id > 0) {
            $result = 1;
        } else {
            $result = 0;
        }
        return $result;
    }

//----------------------------------------nnnnnnnnnnnnnnnnnnnnnnnnnnnnnn
    public function comperiterPart($data) {
        $sql = "select tv.amount from tbl_vat tv where tv.status=1";
        $mod_select = $this->db->mod_select($sql);
        $sOficerId = $_REQUEST['sales_rep_id'];
        $this->db->__beginTransaction();
        $json_decode = json_decode($data['json_string']);
        foreach ($json_decode->comp_items as $value) {
            $image_name = $sOficerId . date('Y-m-d H-i-s');
            $full_path = "./images/comp_partImage/{$image_name}.jpg";
            file_put_contents($full_path, base64_decode($value->image_of_comp_part));
            chmod($full_path, 0777);
            $tbl_competitor_parts = array(
                'category_id' => $json_decode->outlet_cat_id,
                'outlet_id' => $json_decode->outlet_id,
                'sales_officer' => $sOficerId,
                'tour_status' => 1,
                'current_vat' => $mod_select[0]->amount,
                'added_date' => $json_decode->added_date,
                'added_time' => $json_decode->added_time,
                'status' => 1,
            );
            $this->db->insertData("tbl_competitor_parts", $tbl_competitor_parts);
            $competitor_parts_id = $this->db->insert_id();
            $tbl_competitor_part_detail = array(
                'competitor_part_id' => $competitor_parts_id,
                'item_id' => $value->item_id,
//                'selling_price' => $value->ety,
//                'current_movement_at_outlet' => $value->ety,
                'non_tgp_part_no' => $value->part_number,
                'brand' => $value->brand,
//                'non_tgp_description' => $value->ety,
                'non_tgp_importer' => $value->importer,
                'non_tgp_cost_price' => $value->cost_price_to_the_dealer,
                'non_tgp_selling_price' => $value->selling_price_to_the_customer,
                'non_tgp_current_movement' => $value->average_monthly_movement,
                'non_tgp_overall_movement' => $value->overall_movement_at_the_dealer,
//                'non_tgp_movement_area' => $value->ety,
                'part_image' => $full_path,
                'status' => 1,
            );
            $this->db->insertData("tbl_competitor_part_detail", $tbl_competitor_part_detail);
            $this->db->__endTransaction();
            $last_id = "";
            $result = "";
            $last_id = $this->db->insert_id();
            if ($last_id > 0) {
                $result = 1;
            } else {
                $result = 0;
            }
            return $result;
        }
    }

    //new ----------------------------------------
    //end------------------------------

    function update_dealer_location($data) {
        $json_decode = json_decode($data['json_string']);

        $dealer_id = $_REQUEST['dealer_id'];
        $this->db->__beginTransaction();
        try {
            $location = array(
                'longitude' => $json_decode->data->long,
                'latitude' => $json_decode->data->lat
            );
            $this->db->where('delar_id', $dealer_id);
            $this->db->update('tbl_dealer', $location);

//            $this->db->commit_db();
            return 1;
        } catch (PDOException $exc) {
            $this->db->roll_back_db();
            return 0;
        }
//        $this->db->__endTransaction();
//        $result = "";
//        $last_id = $this->db->insert_id();
//        if ($last_id > 0) {
//            $result = 1;
//        } else {
//            $result = 0;
//        }
//        return $result;
    }

}

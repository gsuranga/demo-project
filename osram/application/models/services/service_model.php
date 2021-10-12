<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of service_model
 *
 * @author chathun
 */
class service_model extends C_Model {

    //put your code here
    function __construct() {
        header('Content-type: application/json');
        parent::__construct();
    }

    public function getsalesorderidbyinvoice($invoice) {

        $sql = "SELECT id_sales_order FROM tbl_invoice WHERE id_invoice=:invoice_id LIMIT 1";
        return $this->db->mod_select($sql, $invoice, PDO::FETCH_ASSOC);
    }

    public function getfreqty($id_sales_order, $id_products) {

        $coulmn = array('id_sales_order' => $id_sales_order, 'id_products' => $id_products);

        $sql = "SELECT tp.product_price,tfip.free_issue_qty,ti.item_account_code,ti.item_name FROM tbl_free_issue tfi inner join 
            tbl_free_issue_product tfip ON tfi.id_free_issue = tfip.id_free_issue 
            inner join tbl_products tp ON tp.id_products = tfip.id_products inner 
            join tbl_item ti ON ti.id_item = tp.iditem 
            inner join tbl_item_category tic ON tic.id_item_category = ti.id_item_category 
            inner join tbl_item_brand tib ON tib.item_brand_id = tic.id_brand where tfi.id_sales_order=:id_sales_order AND tfip.id_products=:id_products";

        return $result1 = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getoutletdetails() {

        $array = array('outlet_has_branch_status' => 1);
        $sql = "SELECT tbl_outlet.outlet_name,tbl_outlet_has_branch.branch_address,tbl_outlet_has_branch.branch_telephone 
            FROM tbl_outlet_has_branch tbl_outlet_has_branch 
            INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet 
            INNER JOIN tbl_sales_order tbl_sales_order 
            ON tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch 
            WHERE tbl_outlet_has_branch.outlet_has_branch_status=:outlet_has_branch_status";
        return $result = $this->db->mod_select($sql, $array, PDO::FETCH_ASSOC);
    }

    function checkUserAuthontication($un) {

        //echo $un;
        $dataArray = array('userName' => $un);

        $query = "SELECT `id_user`,`user_username`,`user_active`,`user_token`,`user_password` FROM `tbl_user`
            WHERE `user_status`=1
            AND `user_active`=1
            AND `user_username` =:userName ";

        $result = $this->db->mod_select($query, $dataArray, PDO::FETCH_ASSOC);
        return $result;
    }

    function checkTerritory($userId) {
        // echo $userId;
        $query = "SELECT
tt.`id_territory`,
tt.`territory_name`,
tt.`id_parent`
FROM `tbl_user` tu
INNER JOIN `tbl_employee` te ON tu.`id_employee_registration` = te.`id_employee_registration`
INNER JOIN `tbl_employee_has_place` tehp ON tehp.`id_employee` = te.`id_employee`
INNER JOIN `tbl_territory` tt ON tt.`id_territory` = tehp.`id_territory`
WHERE te.`employee_status`=1 AND tu.`id_user`=$userId ";
        $result = $this->db->mod_select($query);
        // print_r($result);
        foreach ($result as $key) {
            echo $key->id_territory . "/";
            $querySub = "SELECT `territory_name` FROM `tbl_territory` WHERE `id_parent` = $key->id_territory";
            $resultSub = $this->db->mod_select($querySub);

            return $resultSub;
        }
        return $result;
        //print_r($key);
    }

    function checkDivision() {
        $query = "SELECT td.`id_division`,td.`division_name`,tdt.`tbl_division_type_name` FROM `tbl_division` td INNER JOIN tbl_division_type tdt ON td.`division_type_id` = tdt.`id_division_type` WHERE td.`division_status`=1";
        $result = $this->db->mod_select($query);
        return $result;
    }

    function getAllItemCategory($column) {
        $sql = "SELECT `id_item_category`,`tbl_item_category_name`,`tbl_item_category_status` FROM `tbl_item_category` WHERE tbl_item_category_status = :cat_status AND UNIX_TIMESTAMP(category_timestamp) >= :timestamp";
        return $result = $this->db->mod_select($sql, $column);
    }

    function getAllItemsModel($column) {

        $sql = "SELECT tbl_item.* , tbl_products.id_products FROM tbl_item tbl_item INNER JOIN tbl_products tbl_products ON tbl_products.iditem = tbl_item.id_item WHERE UNIX_TIMESTAMP(tbl_products.added_timestamp) >= :timestamp AND tbl_products.product_price !='0'";

        return $result = $this->db->mod_select($sql, $column);
    }

    public function getTerritoryFromModel($column) {

        $sql = "SELECT t.id_territory, t.territory_name,t.territory_status FROM
            (SELECT id_territory FROM tbl_territory where territory_status=1  AND id_territory in
            (SELECT id_territory FROM tbl_employee_has_place where employee_has_place_status=1 AND id_employee in
            (SELECT id_employee FROM tbl_employee where employee_status=1 AND id_employee_registration in
            (SELECT id_employee_registration FROM tbl_user where user_token = :token )))and territory_status = 1)
            tempMap, tbl_territory t
                WHERE t.id_territory = tempMap.id_territory
                OR ((t.territory_hierarchy like concat('', tempMap.id_territory) OR t.territory_hierarchy
                like concat(tempMap.id_territory, ',%') OR t.territory_hierarchy
                like concat('%,', tempMap.id_territory, ',%') OR t.territory_hierarchy
                like concat('%', tempMap.id_territory))) and UNIX_TIMESTAMP(added_timestamp) >= :timestamp";
        return $result = $this->db->mod_select($sql, $column);
    }

    public function getOutletTypeModel($column) {
        $sql = "SELECT id_outlet_category,outlet_category_name,outlet_category_status FROM tbl_outlet_category WHERE outlet_category_status=1 AND UNIX_TIMESTAMP(added_timestamp) >= :timestamp";
        return $result = $this->db->mod_select($sql, $column);
    }

    public function insertRoute($employePlaceID, $json_decode, $territoryHierarchy) {

        $data1 = array("territory_name" => $json_decode, "id_parent" => $employePlaceID[0]->id_territory, "id_territory_type" => '4', "territory_status" => 1, "territory_hierarchy" => $territoryHierarchy, "added_date" => date('Y:m:d'), "added_time" => date('H:i:s'));

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_territory", $data1);

        $territoryID = $this->db->insertId();
        $data2 = array("id_division" => $employePlaceID[0]->id_division, "territory_has_division_status" => 1, "id_territory" => $territoryID, "added_date" => date('Y:m:d'), "added_time" => date('H:i:s'));
        $this->db->insertData("tbl_territory_has_division", $data2);

        $id_territory = array('id_territory' => $territoryID);
        $this->db->__endTransaction();
        $sql = "SELECT id_territory,territory_name,territory_status FROM tbl_territory WHERE id_territory=:id_territory";

        return $result = $this->db->mod_select($sql, $id_territory, PDO::FETCH_ASSOC);
    }

    public function territoryHierarchy($coulmn) {
        $sql = "SELECT tbl_territory.id_territory,tbl_territory.territory_hierarchy FROM  tbl_employee_has_place tbl_employee_has_place
            INNER JOIN tbl_territory tbl_territory ON tbl_territory.id_territory = tbl_employee_has_place.id_territory
            WHERE tbl_employee_has_place.id_employee_has_place=:id_employee_has_place";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getOutletModel($column) {
        $sql = "SELECT  o.id_outlet,b.outlet_has_branch_status,b.id_outlet_has_branch,o.outlet_name,o.id_outlet_category,b.branch_address,b.id_territory,b.branch_telephone,b.branch_mobile,b.branch_contact_person,b.branch_contact_person_designation,b.percentage_discount FROM tbl_outlet o, tbl_outlet_has_branch b, (SELECT t.id_territory, t.territory_name FROM
            (SELECT id_territory FROM tbl_territory where territory_status=1 AND id_territory in
            (SELECT id_territory FROM tbl_employee_has_place where employee_has_place_status=1 AND id_employee in
            (SELECT id_employee FROM tbl_employee where employee_status=1 AND id_employee_registration in
            (SELECT id_employee_registration FROM tbl_user where user_token = :token)))
                and territory_status = 1) tempMap, tbl_territory t
                WHERE t.id_territory = tempMap.id_territory
                OR ((t.territory_hierarchy like concat('', tempMap.id_territory) OR t.territory_hierarchy
                like concat(tempMap.id_territory, ',%') OR t.territory_hierarchy
                like concat('%,', tempMap.id_territory, ',%') OR t.territory_hierarchy
                like concat('%', tempMap.id_territory))) and territory_status = 1) temp_id_territory where b.id_territory = temp_id_territory.id_territory and b.id_outlet = o.id_outlet and o.outlet_status = 1 and UNIX_TIMESTAMP(b.added_timestamp) >= :timestamp  and b.outlet_has_branch_status = 1";

        return $result = $this->db->mod_select($sql, $column);
    }

    public function getLastOutlet($column) {
        $sql = "SELECT
`tbl_outlet_has_branch`.`outlet_has_branch_status`,
`tbl_outlet_has_branch`.`id_outlet_has_branch`,
`tbl_outlet`.`id_outlet`,
`tbl_outlet`.`outlet_name`,
`tbl_outlet`.`id_outlet_category`,
`tbl_outlet_has_branch`.`branch_address`,
`tbl_outlet_has_branch`.`id_territory`,
`tbl_outlet_has_branch`.`branch_telephone`,
`tbl_outlet_has_branch`.`branch_mobile`,
`tbl_outlet_has_branch`.`branch_contact_person`,
`tbl_outlet_has_branch`.`branch_contact_person_designation`,
`tbl_outlet_has_branch`.`percentage_discount`
FROM
`tbl_outlet_has_branch`, `tbl_outlet`
WHERE
`tbl_outlet`.`id_outlet`=`tbl_outlet_has_branch`.`id_outlet`
AND
`tbl_outlet`.`id_outlet`=:lastoutlet";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getUserStokDetail($column) {
        $sql = "SELECT tbl_products.id_products as id_item,tbl_user.id_user
            ,tbl_products.product_price,tbl_products.product_cost
            ,tbl_stock.qty FROM tbl_user tbl_user INNER JOIN tbl_employee tbl_employee
            INNER JOIN  tbl_store tbl_store INNER JOIN tbl_employee_has_place tbl_employee_has_place
            INNER JOIN tbl_stock tbl_stock INNER JOIN tbl_products tbl_products
            INNER JOIN tbl_item tbl_item WHERE user_token=:token
            AND tbl_user.id_employee_registration = tbl_employee.id_employee_registration
            AND tbl_employee.employee_status='1'  AND tbl_employee_has_place.id_employee = tbl_employee.id_employee
            AND tbl_store.id_physical_place = tbl_employee_has_place.id_physical_place
            AND tbl_stock.id_store = tbl_store.id_store AND tbl_products.id_products = tbl_stock.id_products
            AND tbl_products.iditem = tbl_item.id_item AND tbl_store.store_status='1'
            AND UNIX_TIMESTAMP(tbl_stock.added_timestamp) >= :timestamp AND tbl_products.product_price !='0'";

        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function insertTabSalesOrder($data_array, $emp_id, $emp_pys, $all_data = '') {

        $last_sale_order = '';
        $sales_return_order_id = '';

        $time = new DateTime($data_array['salesOrder']['sales_date']);
        $date = $time->format('Y-m-d');
        $time = $time->format('H:i:s');
        $free = 0;
        $free_isesalesid = '';

        $coumn_data = array('added_date' => $date, 'added_time' => $time, 'id_employee_has_place' => $emp_id, 'id_outlet_has_branch' => $data_array['branch_id']);
        $salesorderExsits = $this->salesorderExsits($coumn_data);
        if ($salesorderExsits == 0) {
            $max_sales_id = $this->db->mod_select("SELECT MAX(id_sales_order) as max_id FROM `tbl_sales_order`");
            $sales_code = $max_sales_id[0]->max_id;
            $sales_code++;
            
            $userStockID = $this->getUserStockID($emp_pys);
            $this->db->trans_start();
            if (count($userStockID) > 0 && !empty($userStockID)) {
                if (isset($all_data['remarks'])) {
                    $sales_order_data = array(
                        'id_employee_has_place' => $emp_id,
                        'id_outlet_has_branch' => $data_array['branch_id'],
                        'sales_order_code' => $sales_code,
                        'sales_order_remark' => $all_data['remarks'],
                        'added_date' => $date,
                        'added_time' => $time
                    );
                    $this->db->insert('tbl_sales_order', $sales_order_data);
                } else {
                    $sales_order_data = array(
                        'id_employee_has_place' => $emp_id,
                        'id_outlet_has_branch' => $data_array['branch_id'],
                        'added_date' => $date,
                        'sales_order_code' => $sales_code,
                        'added_time' => $time
                    );
                    $this->db->insert('tbl_sales_order', $sales_order_data);
                }

                $lastRow = $this->getLastRow();
                $last_sale_order = $lastRow;
                if (!empty($data_array['sales'])) {

                    foreach ($data_array['sales'] as $key => $value) {
                        if (0 == $value['discount_pre']) {
                            $free++;
                        }
                    }

                    if ($free > 0) {
                        $free_issue_tbl = array(
                            'id_sales_order' => $last_sale_order,
                            'free_issue_code' => '',
                            'free_issue_remark' => '',
                            'added_date' => $date,
                            'added_time' => $time
                        );

                        $this->db->insert('tbl_free_issue', $free_issue_tbl);

                        $free_isesalesid = $this->getLastRow();
                    }

                    foreach ($data_array['sales'] as $key => $value) {
                        $productPrice = $this->getProductPrice($value['id_item']);

                        if ($value['discount_pre'] != 0) {
                            
                            $sales_array = array(
                                'id_sales_order' => $lastRow,
                                'id_products' => $value['id_item'],
                                'product_qty' => $value['item_qty'],
                                'product_price' => $value['discount_pre'],
                                'discount' => (($productPrice[0]['product_price'] - $value['discount_pre']) * $value['item_qty']),
                                'added_date' => $date,
                                'added_time' => $time,
                                'type_sale' => $value['type']
                            );
                            $this->db->insert('tbl_sales_order_products', $sales_array);
                        } else {
                            
                            $freeproduct = array(
                              'id_free_issue' => $free_isesalesid,
                              'id_products'  => $value['id_item'],
                               'free_issue_qty' => $value['item_qty']
                            );
                            
                            //$this->db->insert('tbl_free_issue_product', $freeproduct);
                            $sales_array = array(
                                'id_sales_order' => $lastRow,
                                'id_products' => $value['id_item'],
                                'product_qty' => $value['item_qty'],
                                'product_price' => 0,
                                'discount' => (($productPrice[0]['product_price'] - $value['discount_pre']) * $value['item_qty']),
                                'added_date' => $date,
                                'added_time' => $time,
                                'type_sale' => $value['type']
                            );
                            $this->db->insert('tbl_sales_order_products', $sales_array);
                            
                        }


                        $exsist = array();

                        foreach ($userStockID as $exsis_id) {
                            array_push($exsist, $exsis_id['id_products']);
                        }

                        if (in_array($value['id_item'], $exsist)) {

                            $stockItemQty = $this->getStockItemQty($value['id_item'], $userStockID[0]['id_store']);
                            if (count($stockItemQty) > 0) {//id_stock
                                $qty = $stockItemQty[0]['qty'];
                                if ($qty - $value['item_qty'] >= 0) {
                                    $update_qty = $qty - $value['item_qty'];
                                    $this->updateStock($update_qty, $stockItemQty[0]['id_stock']);
                                }
                            }
                        }
                    }
                }
                if (!empty($data_array['salesReturn']) || !empty($data_array['marketReturn'])) {
                    $sales_return_order = array(
                        'id_employee_has_place' => $emp_id,
                        'id_outlet_has_branch' => $data_array['branch_id'],
                        'id_sales_order' => $last_sale_order,
                        'added_date' => $date,
                        'added_time' => $time
                    );


                    $this->db->insert('tbl_return_note', $sales_return_order);

                    $sales_return_order_id = $this->getLastRow();
                }
                if (!empty($data_array['salesReturn'])) {
                    $count = count($data_array['salesReturn']);
                    //echo $count;
                    foreach ($data_array['salesReturn'] as $key => $value) {
                        $sales_return_array = array(
                            'id_return_note' => $sales_return_order_id,
                            'id_return_type' => 2,
                            'id_products' => $value['id_item'],
                            'return_product_qty' => $value['item_qty'],
                            'return_price' => $value['discount_pre'],
                            'return_remaks' => $value['return_remaks'],
                            'added_date' => $date,
                            'added_time' => $time
                        );

                        $this->db->insert('tbl_return_note_product', $sales_return_array);
                    }
                }
                if (!empty($data_array['marketReturn'])) {

                    foreach ($data_array['marketReturn'] as $key => $value) {
                        $market_return_array = array(
                            'id_return_note' => $sales_return_order_id,
                            'id_return_type' => 1,
                            'id_products' => $value['id_item'],
                            'return_product_qty' => $value['item_qty'],
                            'return_price' => $value['discount_pre'],
                            'added_date' => $date,
                            'added_time' => $time
                        );
                        $exsist = array();

                        foreach ($userStockID as $exsis_id) {
                            array_push($exsist, $exsis_id['id_products']);
                        }
                        if (in_array($value['id_item'], $exsist)) {
                            $stockItemQty = $this->getStockItemQty($value['id_item'], $userStockID[0]['id_store']);
                            if (count($stockItemQty) >= 0) {
                                $qty = $stockItemQty[0]['qty'];
                                $update_qty = $qty + $value['item_qty'];
                                $this->updateStock($update_qty, $stockItemQty[0]['id_stock']);
                            }
                        }
                        $this->db->insert('tbl_return_note_product', $market_return_array);
                    }
                }
                if (!empty($data_array['OtherInfo'])) {

                    $tab_info = array(
                        'gps_latitude' => $data_array['OtherInfo']['gps_latitude'],
                        'gps_longitude' => $data_array['OtherInfo']['gps_longitude'],
                        'battry_level' => $data_array['OtherInfo']['battry_level'],
                        'id_sales_order' => $last_sale_order
                    );
                    $this->db->insert('tbl_gps_info', $tab_info);
                }
                if (!empty($data_array['Payment'])) {
                    foreach ($data_array['Payment'] as $value) {

                        $payments = array(
                            'id_sales_order' => $last_sale_order,
                            'payment_type' => $value['type'],
                            'payment_amount' => $value['cashpayment'],
                            'cheque_bank' => $value['bank'],
                            'cheque_no' => $value['chequeno'],
                            'cheque_date' => $value['realizeddate'],
                            'credit_date' => $value['duedate'],
                            'credit_payment' => $value['creditpayment'],
                            'chequepayment' => $value['chequepayment']
                        );

                        $this->db->insert('tbl_payment_remark', $payments);
                    }
                }
                $trans_complete = $this->db->trans_complete();

                if ($trans_complete === FALSE) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    public function getLastRow() {
        $list_fields = $this->db->insert_id();
        return $list_fields;
    }
    
     public function getfreqtyAll($id_sales_order) {

        $coulmn = array('id_sales_order' => $id_sales_order);
        $sql = "SELECT  tfip.id_products FROM tbl_free_issue tfi inner join 
            tbl_free_issue_product tfip ON tfi.id_free_issue = tfip.id_free_issue 
            inner join tbl_products tp ON tp.id_products = tfip.id_products inner 
            join tbl_item ti ON ti.id_item = tp.iditem 
            inner join tbl_item_category tic ON tic.id_item_category = ti.id_item_category 
            inner join tbl_item_brand tib ON tib.item_brand_id = tic.id_brand where tfi.id_sales_order=:id_sales_order";

        return $result1 = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getEmployePlaceID($column) {
        
        $sql = "SELECT tbl_employee_has_place.id_division,tbl_employee_has_place.id_territory,tbl_employee_has_place.id_physical_place,tbl_employee_has_place.id_employee_has_place,tbl_user.user_username
            FROM tbl_user tbl_user INNER JOIN tbl_employee_registration tbl_employee_registration ON tbl_employee_registration.id_employee_registration = tbl_user.id_employee_registration
            INNER JOIN tbl_employee tbl_employee ON tbl_employee.id_employee_registration = tbl_employee_registration.id_employee_registration
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
            WHERE tbl_user.user_token=:token AND tbl_user.user_status='1'";
       
        return $result = $this->db->mod_select($sql, $column);
    }

    public function getStockIdByEmployee($column) {
        $sql = "SELECT id_store FROM tbl_store WHERE id_employee_has_place =:employee_name";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function productCurrentQty($column) {
        $sql = "SELECT qty FROM tbl_stock WHERE id_products =:id_product AND id_store=:id_store";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function allInvoice($column) {
        $sql = "SELECT tbl_sales_order.id_sales_order,tbl_sales_order.sales_order_code,tbl_employee.employee_first_name,tbl_employee.employee_last_name
             ,tbl_outlet.outlet_name,tbl_invoice.id_invoice , tbl_invoice.invoice_no
             ,tbl_invoice.id_sales_order,tbl_invoice.added_date
             ,tbl_outlet.outlet_name FROM tbl_sales_order tbl_sales_order
             INNER JOIN tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order
             INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
             INNER JOIN tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
             INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
             INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet WHERE tbl_invoice.invoice_status='1'
             AND tbl_employee_has_place.id_physical_place =:id_physical_place AND tbl_invoice.added_date BETWEEN :start_date AND :end_date
             AND tbl_invoice.invoice_no LIKE '" . $_REQUEST['InvoiceNo'] . "'
             AND tbl_sales_order.sales_order_code LIKE '" . $_REQUEST['SalesOrderNo'] . "'
             AND employee_first_name LIKE '" . $_REQUEST['SalesRepresentativeName'] . "'
             AND tbl_outlet.outlet_name LIKE '" . $_REQUEST['RetailOutletName'] . "'";

        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getEmployeIdByUserid($column) {
        $sql = "SELECT tbl_employee_has_place.id_physical_place,tbl_employee_has_place.id_employee_has_place,tbl_user.user_username FROM  tbl_user tbl_user
            INNER JOIN tbl_employee_registration tbl_employee_registration
            ON tbl_employee_registration.id_employee_registration = tbl_user.id_employee_registration
            INNER JOIN tbl_employee tbl_employee ON tbl_employee.id_employee_registration = tbl_employee_registration.id_employee_registration
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
            WHERE tbl_user.id_user =:id_user AND tbl_user.user_status='1'";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getInvoceDetail($column) {

        $sql = "SELECT tbl_employee.employee_mobile , tbl_physical_place.physical_place_name,tbl_physical_place.id_physical_place
            , tbl_physical_place.physical_place_address , tbl_territory.territory_name
            ,tbl_outlet_has_branch.branch_contact_person , tbl_outlet.outlet_name,tbl_outlet_has_branch.branch_address
            , tbl_outlet_has_branch.branch_telephone,tbl_invoice.invoice_no ,tbl_invoice.added_date 
            , tbl_sales_order.id_employee_has_place , CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as employee_first_name
            , tbl_employee.employee_mobile FROM tbl_invoice tbl_invoice INNER JOIN tbl_sales_order tbl_sales_order
            ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch
            ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
            INNER JOIN tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
            INNER JOIN tbl_physical_place tbl_physical_place
            ON tbl_physical_place.id_physical_place = tbl_employee_has_place.id_physical_place
            INNER JOIN tbl_territory tbl_territory ON tbl_territory.id_territory = tbl_employee_has_place.id_territory
            INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
            INNER JOIN tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
            WHERE tbl_invoice.id_invoice=:invoice_id";
        
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }
    
    public function getdisdetails($id_physical_place){
        
        $sql = "SELECT CONCAT(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name )  
            as fullname, CONCAT(tbl_employee.employee_telephone ,' / ',tbl_employee.employee_mobile) 
            as telpm ,tbl_employee.employee_address , tbl_employee.employee_email 
            FROM tbl_employee_has_place tbl_employee_has_place INNER JOIN tbl_employee tbl_employee 
            ON tbl_employee.id_employee = tbl_employee_has_place.id_employee INNER JOIN tbl_employee_type tbl_employee_type 
            ON tbl_employee_type.id_employee_type = tbl_employee.id_employee_type
            WHERE tbl_employee_has_place.id_physical_place ='$id_physical_place' 
            AND tbl_employee_type.id_employee_type=2";
        
        $mod_select = $this->db->mod_select($sql);
        return $mod_select;
        
    }

    public function getInvoceItemDetail($column) {
        $sql = "SELECT tbl_sales_order_products.id_products,tbl_sales_order_products.discount,tbl_products.product_price as prd_price,tbl_item.item_account_code , tbl_sales_order.id_sales_order , tbl_item.item_name
            ,tbl_sales_order_products.product_qty,tbl_sales_order_products.product_price , (tbl_sales_order_products.product_qty * tbl_sales_order_products.product_price) as total
            FROM tbl_invoice tbl_invoice INNER JOIN tbl_sales_order tbl_sales_order
            ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order
            INNER JOIN tbl_sales_order_products tbl_sales_order_products
            ON tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_sales_order_products.id_products
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_invoice.id_invoice=:invoice_id";

        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function marketRetuns($column) {
        $sql = "SELECT  tbl_item.item_name ,tbl_item.item_account_code , tbl_products.product_price
            ,tbl_return_note_product.return_product_qty , tbl_return_note_product.return_price
            , (tbl_return_note_product.return_product_qty *  tbl_return_note_product.return_price) as total,tbl_return_note_product.discount
            FROM tbl_return_note tbl_return_note INNER JOIN tbl_return_note_product tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_return_note.id_sales_order =:sales_order AND tbl_return_note_product.id_return_type=:id_return_type";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function salestRetuns($column) {
        $sql = "SELECT  tbl_item.item_name ,tbl_item.item_account_code , tbl_products.product_price
            ,tbl_return_note_product.return_product_qty , tbl_return_note_product.return_price
            , (tbl_return_note_product.return_product_qty *  tbl_return_note_product.return_price) as total,tbl_return_note_product.discount
            FROM tbl_return_note tbl_return_note INNER JOIN tbl_return_note_product tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_return_note.id_sales_order =:sales_order AND tbl_return_note_product.id_return_type=:id_return_type";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getSalesOrderID($column) {
        $sql = "SELECT tbl_sales_order.id_sales_order FROM tbl_invoice tbl_invoice
            INNER JOIN tbl_sales_order tbl_sales_order ON tbl_sales_order.id_sales_order = tbl_invoice.id_sales_order
            INNER JOIN tbl_return_note  tbl_return_note ON tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order
            WHERE tbl_invoice.id_invoice =:invoice_id";
        return $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function addOutlet($json_data) {

        $branch_code = $this->get_Outlet_Autogen_ID();
        $out_regsis = array("branch_code" => $branch_code, "added_date" => date('Y:m:d'), "added_time" => date('H:i:s'));

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_branch_registration", $out_regsis);
        $branch_registration = $this->db->insertId();
        $out_regsis_ot = array("outlet_code" => $branch_code, "added_date" => date('Y:m:d'), "added_time" => date('H:i:s'));

        $this->db->insertData("tbl_outlet_registration", $out_regsis_ot);
        $id_outlet_registration = $this->db->insertId();
        $outlet_data = array("id_outlet_registration" => $id_outlet_registration, "id_outlet_category" => $json_data['branch_category_id'], "outlet_name" => $json_data['branch_name'], "outlet_status" => 1, "added_date" => date('Y:m:d'), "added_time" => date('H:i:s'));

        $this->db->insertData("tbl_outlet", $outlet_data);

        $outletId = $this->db->insertId();
        $tbl_outlet_has_branch = array("id_outlet" => $outletId, "id_territory" => $json_data['id_route'], "id_branch_registration" => $branch_registration, "branch_address" => $json_data['branch_address'], "branch_telephone" => $json_data['branch_telephone'], "branch_mobile" => $json_data['branch_mobile'], "branch_contact_person" => $json_data['contact_person_name'], "branch_contact_person_designation" => $json_data['con_person_designation'], "outlet_has_branch_status" => 1, "percentage_discount" => 0.00, "price_discount" => 0.00, "added_date" => date('Y:m:d'), "added_time" => date('H:i:s'));

        $this->db->insertData("tbl_outlet_has_branch", $tbl_outlet_has_branch);
		
		$id_outlet_has_branch = $this->db->insertId();
		$tbl_branch_has_division = array(
		'id_outlet_has_branch' => $id_outlet_has_branch,
		'id_division' => 1,
		'branch_has_division_status' => 1,
		"added_date" => date('Y:m:d'),
		"added_time" => date('H:i:s')
		);
$this->db->insertData("tbl_branch_has_division", $tbl_branch_has_division);
        $this->db->__endTransaction();
        return $outletId;
    }

    public function get_Branch_Autogen_ID() {
        $result = $this->db->mod_select("SELECT MAX(id_outlet_has_branch) As id FROM tbl_outlet_has_branch");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "BR0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "BR000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "BR00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "BR0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "BR" . $num_rows;
            }
        }
    }

    public function get_Outlet_Autogen_ID() {
        $result = $this->db->mod_select("SELECT MAX(id_outlet_registration) As id FROM tbl_outlet_registration");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "OR0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "OR000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "OR00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "OR0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "OR" . $num_rows;
            }
        }
    }

    public function getUserStockID($pys_place_id) {
        $column = array('id_physical_place' => $pys_place_id);
       
        $sql = "SELECT tbl_stock.id_products,tbl_store.id_store  FROM tbl_store tbl_store INNER JOIN tbl_stock tbl_stock ON tbl_stock.id_store = tbl_store.id_store WHERE tbl_store.id_physical_place=:id_physical_place";
        $result = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
       
        if (count($result) > 0) {
            $column_data = array();
            foreach ($result as $value) {
                $new_data = array(
                    'id_products' => $value['id_products'],
                    'id_store' => $value['id_store']
                );
                array_push($column_data, $new_data);
            }

            return $column_data;
        } else {
            return 0;
        }
    }

    public function getStockItemQty($id_products, $id_store) {
        $coulmn = array('id_products' => $id_products, 'id_store' => $id_store);
        $sql = "SELECT qty,id_stock FROM tbl_stock WHERE id_products=:id_products AND id_store=:id_store";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function updateStock($details_qty, $where_data) {
        $details = array("qty" => $details_qty
        );

        $where = array(
            "id_stock" => $where_data
        );

        $this->db->__beginTransaction();
        $this->db->update('tbl_stock', $details, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getProductPrice($id_products) {
        $coulmn = array('id_products' => $id_products, 'product_status' => '1');
        $sql = "SELECT product_price FROM tbl_products WHERE id_products=:id_products AND product_status=:product_status";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function setOutletImage($outlet_id, $outelet_image) {
        $sql = "UPDATE `tbl_outlet` SET outlet_image='$outelet_image' WHERE id_outlet='$outlet_id'";
        $this->db->query($sql);
    }

    public function salesorderExsits($coulmn) {
        $sql = " SELECT * FROM `tbl_sales_order` WHERE added_date=:added_date AND added_time=:added_time AND id_employee_has_place=:id_employee_has_place AND id_outlet_has_branch=:id_outlet_has_branch";
        $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
        if (count($result) > 0) {
            return 1;
        } else {
            return 0;
        }
    }

    public function insertUcall($data_son, $empid) {
        $time = new DateTime($data_son['dateTime']);
        $date = $time->format('Y-m-d');
        $time = $time->format('H:i:s');
        $unproduct = array('id_employee_has_place' => $empid, 'branch_id' => $data_son['branch_id'], 'gps_latitude' => $data_son['gps_latitude'], 'gps_longitude' => $data_son['gps_longitude'], 'remarks' => $data_son['remarks'], 'added_date' => $date, 'added_time' => $time);

        $this->db->insert('tbl_unproduct', $unproduct);
    }

    public function getRoutePlan() {

        $query = 'SELECT
    trpt.terratory_id,territory_name, target_st_date
FROM
    tbl_user tu
        inner join
    tbl_employee te ON tu.id_employee_registration = te.id_employee_registration
        inner join
    tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
        inner join
    tbl_route_plan trp ON tehp.id_employee_has_place = trp.employee_has_place_id
        inner join
    tbl_route_plan_terratory trpt ON trp.id_route_plan = trpt.tbl_route_plan_id
        inner join
    tbl_territory tt ON trpt.terratory_id = tt.id_territory
where
    id_user = ' . filter_var($_REQUEST['id_user'], FILTER_SANITIZE_NUMBER_INT) . ' and id_user_type = 3
        and user_status =1
        and user_active = 1
        and employee_has_place_status = 1
        and id_territory_type = 4
        and territory_status = 1 and target_st_date between curdate() and date_add(curdate(), INTERVAL 7 DAY)';
        return $result = $this->db->mod_select($query);
    }

    public function getOutletOFTer() {
        $query = 'SELECT
    tohb.id_outlet,
    branch_address,
    branch_telephone,
    branch_mobile,
    outlet_name,
    outlet_category_name
FROM
    tbl_outlet_has_branch tohb
        inner join
    tbl_outlet tolt ON tohb.id_outlet = tolt.id_outlet
        inner join
    tbl_outlet_category toc ON toc.id_outlet_category = tolt.id_outlet_category
where
    id_territory =' . filter_var($_REQUEST['id_territory'], FILTER_SANITIZE_NUMBER_INT) . '
        and outlet_has_branch_status = 1
        and outlet_status = 1
        and outlet_category_status = 1';
        return $result = $this->db->mod_select($query);
    }

    public function getRefRoutes() {
        $query = 'select
    id_territory, territory_name
from
    tbl_territory
where
    id_parent in (SELECT
            id_parent
        FROM
            tbl_user tu
                inner join
            tbl_employee te ON tu.id_employee_registration = te.id_employee_registration
                inner join
            tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
                inner join
            tbl_territory tt ON tehp.id_territory = tt.id_territory
        where
            id_user = ' . filter_var($_REQUEST['id_user'], FILTER_SANITIZE_NUMBER_INT) . '  and id_user_type = 3
                and user_status = 1
                and user_active = 1
                and employee_has_place_status = 1
                and territory_status = 1)
        and territory_status = 1
        and id_territory_type = 4';
        return $result = $this->db->mod_select($query);
    }

    public function getUserOutlets() {
        //         tohb.id_outlet,
        //    branch_address,
        //    branch_telephone,
        //    branch_mobile,
        //    outlet_name,
        //    outlet_category_name,
        //    tmpter.id_territory
        $query = 'SELECT
   *
FROM
    tbl_outlet_has_branch tohb
        inner join
    tbl_outlet tolt ON tohb.id_outlet = tolt.id_outlet
        inner join
    tbl_outlet_category toc ON toc.id_outlet_category = tolt.id_outlet_category,
    (select
        id_territory, territory_name
    from
        tbl_territory
    where
        id_parent in (SELECT
                id_parent
            FROM
                tbl_user tu
            inner join tbl_employee te ON tu.id_employee_registration = te.id_employee_registration
            inner join tbl_employee_has_place tehp ON te.id_employee = tehp.id_employee
            inner join tbl_territory tt ON tehp.id_territory = tt.id_territory
            where
                id_user = ' .filter_var($_REQUEST['id_user'], FILTER_SANITIZE_NUMBER_INT).' and id_user_type = 3
                    and user_status = 1
                    and user_active = 1
                    and employee_has_place_status = 1
                    and territory_status = 1)
            and territory_status = 1
            and id_territory_type = 4) tmpter
where
    tohb.id_territory = tmpter.id_territory
        and outlet_has_branch_status = 1
        and outlet_status = 1
        and outlet_category_status = 1';
        return $result = $this->db->mod_select($query);
    }

    public function getBrandList() {
        $query = 'SELECT
    item_brand_id, brand_name
FROM
    tbl_item_brand WHERE `brand_staus`=1';
        return $result = $this->db->mod_select($query);
    }

    public function getAllCategories() {
        $sql = "SELECT
    `id_item_category`,
    `tbl_item_category_name`,
    tic.id_brand,
    `tbl_item_category_status`
FROM
    `tbl_item_category` tic
        inner join
    tbl_item_brand tib ON tic.id_brand = tib.item_brand_id
WHERE
    tbl_item_category_status = 1";
        return $result = $this->db->mod_select($sql);
    }

    //disa
    public function getUnPaidBills($userToken) {
        $outletCollection = array();
        $routeQuery = "SELECT t.id_territory, t.territory_name,t.territory_status FROM
            (SELECT id_territory FROM tbl_territory where territory_status=1  AND id_territory in
            (SELECT id_territory FROM tbl_employee_has_place where employee_has_place_status=1 AND id_employee in
            (SELECT id_employee FROM tbl_employee where employee_status=1 AND id_employee_registration in
            (SELECT id_employee_registration FROM tbl_user where user_token = '$userToken')))and territory_status = 1)
            tempMap, tbl_territory t
                WHERE t.id_territory = tempMap.id_territory
                OR ((t.territory_hierarchy like concat('', tempMap.id_territory) OR t.territory_hierarchy
                like concat(tempMap.id_territory, ',%') OR t.territory_hierarchy
                like concat('%,', tempMap.id_territory, ',%') OR t.territory_hierarchy
                like concat('%', tempMap.id_territory)))";
        $routeResult = $this->db->mod_select($routeQuery);
        $routeCollection = array();
        foreach ($routeResult as $route) {
            $id_territory = $route->id_territory;
            $outletQuery = "SELECT outlet_name,id_outlet_has_branch,branch_address FROM tbl_outlet_has_branch OHB, tbl_outlet O where id_territory in('$id_territory') and OHB.id_outlet=O.id_outlet";
            $outletResult = $this->db->mod_select($outletQuery);

            foreach ($outletResult as $outlet) {
                $id_outlet_has_branch = $outlet->id_outlet_has_branch;
                $salesOrderQuery = "SELECT id_sales_order,added_date,datediff(curdate(),added_date) as age,(select sum(payment) as payment from ((select ifnull(sum(cash_payment),0) as payment from tbl_cash_payment where cash_payment_status=1) union (select ifnull(sum(cheque_payment),0) as payment from tbl_cheque_payment where cheque_payment_status=1) union (select ifnull(sum(credit_value),0) as payment from tbl_credit_payment where credit_status=1)) as temp where id_sales_order=O.id_sales_order) as paid, (select sum(product_qty*product_price) from tbl_sales_order_products where id_sales_order=id_sales_order) as total FROM kani.tbl_sales_order O where id_outlet_has_branch='$id_outlet_has_branch'";
                $salesOrderResult = $this->db->mod_select($salesOrderQuery);
                $salesOrderCollection = array();
                foreach ($salesOrderResult as $salesOrder) {
                    $total = $salesOrder->total;
                    $paid = $salesOrder->paid;
                    $salesOrderData = array("id_sales_order" => $salesOrder->id_sales_order, "added_date" => $salesOrder->added_date, "age" => $salesOrder->age, "due" => ($total - $paid), "total" => $total);
                    array_push($salesOrderCollection, $salesOrderData);
                }
                if (count($salesOrderCollection) > 0) {
                    $outletData = array("outlet_name" => $outlet->outlet_name, "id_outlet_has_branch" => $outlet->id_outlet_has_branch, "branch_address" => $outlet->branch_address, "salesOrderCollection" => $salesOrderCollection);
                    array_push($outletCollection, $outletData);
                }
            }
            $routeData = array("id_territory" => $route->id_territory, "territory_name" => $route->territory_name, "outletCollection" => $outletCollection);
            array_push($routeCollection, $routeData);
        }
        return array('outletCollection' => $outletCollection);
    }

    public function getPrevoiusStock($userToken) {/*
      $outletCollection = array();
      $routeQuery = "SELECT t.id_territory, t.territory_name,t.territory_status FROM
      (SELECT id_territory FROM tbl_territory where territory_status=1  AND id_territory in
      (SELECT id_territory FROM tbl_employee_has_place where employee_has_place_status=1 AND id_employee in
      (SELECT id_employee FROM tbl_employee where employee_status=1 AND id_employee_registration in
      (SELECT id_employee_registration FROM tbl_user where user_token = '$userToken')))and territory_status = 1)
      tempMap, tbl_territory t
      WHERE t.id_territory = tempMap.id_territory
      OR ((t.territory_hierarchy like concat('', tempMap.id_territory) OR t.territory_hierarchy
      like concat(tempMap.id_territory, ',%') OR t.territory_hierarchy
      like concat('%,', tempMap.id_territory, ',%') OR t.territory_hierarchy
      like concat('%', tempMap.id_territory)))";
      $routeResult = $this->db->mod_select($routeQuery);
      $routeCollection = array();
      foreach ($routeResult as $route) {
      $id_territory = $route->id_territory;
      $outletQuery = "SELECT outlet_name,O.id_outlet,id_outlet_has_branch,branch_address FROM tbl_outlet_has_branch OHB, tbl_outlet O where id_territory in('$id_territory') and OHB.id_outlet=O.id_outlet";
      $outletResult = $this->db->mod_select($outletQuery);
      foreach ($outletResult as $outlet) {
      $id_outlet = $outlet->id_outlet;
      $id_outlet_has_branch = $outlet->id_outlet_has_branch;
      $dateQuery = "select date from `outlet_take _stock` where outlet_id='$id_outlet' order by date desc limit 1";
      $dateResult = $this->db->mod_select($dateQuery);
      $dateQuery1 = "select added_date as date from `tbl_sales_order` where id_outlet_has_branch='$id_outlet_has_branch' order by added_date desc limit 1";
      $dateResult1 = $this->db->mod_select($dateQuery1);
      if (count($dateResult)) {
      $date = $dateResult[0]->date;
      }
      if (empty($date) && count($dateResult1)) {
      $date = $dateResult1[0]->date;
      }
      $salesOrderQuery = "select item_name as description,productId,sum(quantity) as quantity from tbl_item, ((SELECT `product_id` as productId,`qty` as quantity FROM `outlet_take _stock_products` where `take_id`=(SELECT `take_id` FROM `outlet_take _stock` WHERE `outlet_id`='$id_outlet' order by date desc limit 1)) union (SELECT `id_products` as productId,`product_qty` as quantity FROM `tbl_sales_order_products` WHERE `id_sales_order`=(SELECT `id_sales_order` FROM `tbl_sales_order` WHERE `id_outlet_has_branch`='$id_outlet_has_branch' order by `added_date` desc limit 1))) as temp where temp.productId=tbl_item.id_item group by productId";
      $salesOrderResult = $this->db->mod_select($salesOrderQuery);
      $salesOrderCollection = array();
      foreach ($salesOrderResult as $salesOrder) {
      $salesOrderData = array("productId" => $salesOrder->productId, "quantity" => $salesOrder->quantity, "description" => $salesOrder->description);
      array_push($salesOrderCollection, $salesOrderData);
      }
      $outletData = array("outlet_name" => $outlet->outlet_name, "id_outlet_has_branch" => $id_outlet_has_branch, "branch_address" => $outlet->branch_address, "date" => $date, "products" => $salesOrderCollection);
      array_push($outletCollection, $outletData);
      }
      $routeData = array("id_territory" => $route->id_territory, "territory_name" => $route->territory_name, "outletCollection" => $outletCollection);
      array_push($routeCollection, $routeData);
      }
      return array('outletCollection' => $outletCollection); */

        $salesOrderData = array("id_sales_order" => 1, "added_date" => '2013-02-02', "age" => 15, "due" => 1000, "total" => 5000);
        $salesOrderCollection = array();
        array_push($salesOrderCollection, $salesOrderData);
        $outletData = array("outlet_name" => 'outletName', "id_outlet_has_branch" => 10, "branch_address" => 'address goes here', "salesOrderCollection" => $salesOrderCollection);
        $outletCollection = array();
        array_push($outletCollection, $outletData);
        return array('outletCollection' => $outletCollection);
    }

    //end disa

    public function gpsGanesh($request) {
        $lon = $request['lo'];
        $lat = $request['lat'];
        $id = $request['id'];
        $bat = $request['battry_level'];

        $query = "SELECT MAX(id_sales_order) as max FROM tbl_sales_order WHERE id_employee_has_place = '$id'";
        $result = $this->db->mod_select($query);

        $query1 = "INSERT INTO `tbl_gps_info` (battry_level,gps_latitude,gps_longitude,id_sales_order,id_employee_has_place) VALUES('$bat','$lat','$lon'," . $result[0]->max . "," . $id . ")";
        $this->db->mod_select($query1);
        echo 'emp ' . $id;
        echo ' lat ' . $lat;
        echo ' lon ' . $lon;
        echo ' bat ' . $bat;
        echo ' order ' . $result[0]->max;
    }

    public function get_id_Employee($token = '') {
        $query = "SELECT 
    id_employee
FROM
    tbl_user
        inner join
    tbl_employee ON tbl_user.id_employee_registration = tbl_employee.id_employee_registration
where
    user_token ='$token'";
        $routeResult = $this->db->mod_select($query);
        return $routeResult[0]->id_employee;
    }

    function getMonthlyReport() {
        $userId = $this->get_id_Employee($_REQUEST['userToken']);
        $sql = "select 
    (select 
            count(distinct TSO.id_outlet_has_branch)
        from
            tbl_sales_order TSO
        where
            TSO.added_date between date_format(now(), '%Y-%m-01') AND LAST_DAY(curdate())
                AND TSO.id_employee_has_place in (select 
                    id_employee_has_place
                from
                    tbl_employee_has_place
                where
                    id_employee = $userId
                group by id_employee , id_sales_order)) as salesCount,
    ifnull((select sum((select ((((100 - ifnull(TSOP.discount, 0))) / 100) * (select ((select ((ifnull(TSOP.product_qty, 0) - ifnull(TSOP.free_qty, 0)))) * ifnull(TSOP.product_price, 0))))))),0) as totAmount
from
    tbl_sales_order_products TSOP
        left join
    tbl_sales_order TSO ON TSOP.id_sales_order = TSO.id_sales_order
where
    TSO.added_date between date_format(now(), '%Y-%m-01') AND LAST_DAY(curdate())
        and TSO.id_employee_has_place in (select 
            id_employee_has_place
        from
            tbl_employee_has_place
        where
            id_employee = $userId)
        AND TSO.sales_order_status = '1'";
        return $this->db->mod_select($sql);
    }

    function getSummaryReport() {
        $userId = $this->get_id_Employee($_REQUEST['userToken']);
        $sql = "select 
    (select 
            count(distinct TSO.id_outlet_has_branch)
        from
            tbl_sales_order TSO
        where
            TSO.added_date = curdate()
                AND TSO.id_employee_has_place in (select 
                    id_employee_has_place
                from
                    tbl_employee_has_place
                where
                    id_employee = $userId
                group by id_employee , id_sales_order)) as salesCount,
    ifnull((select sum((select ((((100 - ifnull(TSOP.discount, 0))) / 100) * (select ((select ((ifnull(TSOP.product_qty, 0) - ifnull(TSOP.free_qty, 0)))) * ifnull(TSOP.product_price, 0))))))),0) as totAmount,
    (select 
            ifnull((select cast(@total as decimal (20 , 2 ))),
                        0)
        ) as ft
from
    tbl_sales_order_products TSOP
        left join
    tbl_sales_order TSO ON TSOP.id_sales_order = TSO.id_sales_order
where
    TSO.added_date = curdate()
        and TSO.id_employee_has_place in (select 
            id_employee_has_place
        from
            tbl_employee_has_place
        where
            id_employee = $userId)
        AND TSO.sales_order_status = '1'";
        return $this->db->mod_select($sql);
    }

    function getDailyMarketReturn() {
        $userId = $this->get_id_Employee($_REQUEST['userToken']);
        $sql = "select 
    (select 
            count(distinct TRN.id_outlet_has_branch)
        from
            tbl_return_note TRN
        where
            TRN.added_date = curdate()
                AND TRN.id_employee_has_place in (select 
                    id_employee_has_place
                from
                    tbl_employee_has_place
                where
                    id_employee = $userId
                group by id_employee , id_sales_order)) as marketCount,
    @total:=(select sum((ifnull(TRNP.return_price, 0) * ifnull(TRNP.return_product_qty, 0)))) as totAmount
from
    tbl_return_note_product TRNP
        left join
    tbl_return_note TRN ON TRNP.id_return_note = TRN.id_return_note
where
    TRN.added_date = curdate()
        and TRN.id_employee_has_place in (select 
            id_employee_has_place
        from
            tbl_employee_has_place
        where
            id_employee = $userId)
        AND TRN.return_note_status = '1'
        AND TRNP.id_return_type in (select 
            id_return_type
        from
            tbl_return_type
        where
            return_type = 'Market Return')";
        return $this->db->mod_select($sql);
    }

    function getMonthlyMarketReturn() {
        $userId = $this->get_id_Employee($_REQUEST['userToken']);
        $sql = "select 
    (select 
            count(distinct TRN.id_outlet_has_branch)
        from
            tbl_return_note TRN
        where
            TRN.added_date between date_format(now(), '%Y-%m-01') AND LAST_DAY(curdate())
                AND TRN.id_employee_has_place in (select 
                    id_employee_has_place
                from
                    tbl_employee_has_place
                where
                    id_employee = $userId
                group by id_employee , id_sales_order)) as marketReturnCount,
    ifnull((select sum((ifnull(TRNP.return_price, 0) * ifnull(TRNP.return_product_qty, 0)))),0) as totMarketReturnAmount
from
    tbl_return_note_product TRNP
        left join
    tbl_return_note TRN ON TRNP.id_return_note = TRN.id_return_note
where
    TRN.added_date between date_format(now(), '%Y-%m-01') AND LAST_DAY(curdate())
        and TRN.id_employee_has_place in (select 
            id_employee_has_place
        from
            tbl_employee_has_place
        where
            id_employee = $userId)
        AND TRN.return_note_status = '1'
        AND TRNP.id_return_type in (select 
            id_return_type
        from
            tbl_return_type
        where
            return_type = 'Market Return')";
        return $this->db->mod_select($sql);
    }

    /* public function get_unpaidbills($token) {
      $column = array('user_token' => $token);
      $sql = "select
      tso.id_sales_order,
      tso.id_outlet_has_branch,
      (select
      branch_address
      from
      tbl_outlet_has_branch
      where
      id_outlet_has_branch = tso.id_outlet_has_branch
      and outlet_has_branch_status = 1) as address,
      (select
      outlet_name
      from
      tbl_outlet
      where
      outlet_status = 1
      and id_outlet in (select
      id_outlet
      from
      tbl_outlet_has_branch
      where
      id_outlet_has_branch = tso.id_outlet_has_branch
      and outlet_has_branch_status = 1)) as outletName,
      (select
      ((select
      ifnull(sum((ifnull(product_qty, 0) * ifnull(product_price, 0))),
      0)
      from
      tbl_sales_order_products
      where
      id_sales_order = tso.id_sales_order
      and sales_order_products_status = 1) - (select
      ifnull(sum((ifnull(return_price, 0) * ifnull(return_product_qty, 0))),
      0)
      from
      tbl_return_note_product
      where
      return_product_status = 1
      and id_return_note in (select
      id_return_note
      from
      tbl_return_note
      where
      id_sales_order = tso.id_sales_order
      and return_note_status = 1)))
      ) as amount,
      (select
      ((select
      ifnull(sum(cash_payment), 0)
      from
      tbl_cash_payment
      where
      id_sales_order = tso.id_sales_order
      and cash_payment_status = 1)) + (select
      ifnull(sum(cheque_payment), 0)
      from
      tbl_cheque_payment
      where
      id_sales_order = tso.id_sales_order
      and cheque_payment_status = 1)
      ) as paidAmount,
      (select
      ifnull((select
      added_date
      from
      tbl_sales_order
      where
      id_sales_order = tso.id_sales_order
      and sales_order_status = 1),
      '0000-00-00')
      ) as adDate,
      (select
      ifnull((select
      credit_value
      from
      tbl_credit_payment
      where
      id_sales_order = tso.id_sales_order
      and credit_status = 1),
      amount)
      ) as duePayment,
      (select
      ifnull(datediff(curdate(),
      (select
      added_date
      from
      tbl_credit_payment
      where
      id_sales_order = tso.id_sales_order
      and credit_status = 1)),
      0)
      ) as age
      from
      tbl_sales_order tso
      left join
      tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
      where
      tso.id_employee_has_place = (select
      id_employee_has_place
      from
      tbl_employee_has_place
      where
      employee_has_place_status = 1
      and id_employee in (select
      id_employee
      from
      tbl_employee
      where
      employee_status = 1
      and id_employee_registration in (select
      id_employee_registration
      from
      tbl_user
      where
      user_status = 1
      and user_token = '" . $_REQUEST['userToken'] . "')))
      group by tso.id_sales_order
      having amount > paidAmount";
      $mod_select = $this -> db -> mod_select($sql, $column, PDO::FETCH_ASSOC);
      return $mod_select;
      } */

    public function get_unpaidbills($token) {
        $column = array('user_token' => $token);

        $sql = "select 
    tso.id_sales_order,
    tso.id_outlet_has_branch,
    (select 
            branch_address
        from
            tbl_outlet_has_branch
        where
            id_outlet_has_branch = tso.id_outlet_has_branch) as address,
    (select 
            outlet_name
        from
            tbl_outlet
        where
            id_outlet in (select 
                    id_outlet
                from
                    tbl_outlet_has_branch
                where
                    id_outlet_has_branch = tso.id_outlet_has_branch)) as outletName,
    (select 
            ((select 
                        ifnull(sum((ifnull(product_qty, 0) * ifnull(product_price, 0))),
                                    0)
                    from
                        tbl_sales_order_products
                    where
                        id_sales_order = tso.id_sales_order
                            and sales_order_products_status = 1) - (select 
                        ifnull(sum((ifnull(return_price, 0) * ifnull(return_product_qty, 0))),
                                    0)
                    from
                        tbl_return_note_product
                    where
                        return_product_status = 1
                            and id_return_note in (select 
                                id_return_note
                            from
                                tbl_return_note
                            where
                                id_sales_order = tso.id_sales_order
                                    and return_note_status = 1)))
        ) as amount,
    (select 
            ((select 
                        ifnull(sum(cash_payment), 0)
                    from
                        tbl_cash_payment
                    where
                        id_sales_order = tso.id_sales_order)) + (select 
                        ifnull(sum(cheque_payment), 0)
                    from
                        tbl_cheque_payment
                    where
                        id_sales_order = tso.id_sales_order)
        ) as paidAmount,
    (select 
            ifnull((select 
                                added_date
                            from
                                tbl_sales_order
                            where
                                id_sales_order = tso.id_sales_order
                                    and sales_order_status = 1),
                        '0000-00-00')
        ) as adDate,
    (select 
            ifnull((select 
                                credit_value
                            from
                                tbl_credit_payment
                            where
                                id_sales_order = tso.id_sales_order),
                        amount)
        ) as duePayment,
    (select 
            ifnull(datediff(curdate(),
                                (select 
                                        added_date
                                    from
                                        tbl_credit_payment
                                    where
                                        id_sales_order = tso.id_sales_order)),
                        0)
        ) as age
from
    tbl_sales_order tso
        left join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
where
    tso.sales_order_status = 1
        and tso.id_employee_has_place = (select 
            id_employee_has_place
        from
            tbl_employee_has_place
        where
            employee_has_place_status = 1
                and id_employee in (select 
                    id_employee
                from
                    tbl_employee
                where
                    employee_status = 1
                        and id_employee_registration in (select 
                            id_employee_registration
                        from
                            tbl_user
                        where
                            user_status = 1
                                and user_token = :user_token)))
group by tso.id_sales_order
having amount > paidAmount";
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        return $mod_select;
    }
	
    public function kasunBatchJson($request) {
        $json = json_decode($request['data'],TRUE);
        
//        $json['data'] = $json->data;
//        
        $posmDataCollection = $json['data'][0]['posmdata'];
        $stockCollection = $json['data'][1]['stock'];
        $paidBillCollection = $json['data'][2]['collection'];
        $warrentyReturnCollection = $json['data'][3]['warrenty_items'];
//        
        $token = $json['data'][4]['user_Token'];
        
//        print_r($json1);

        $useIdResult = $this->db->mod_select("select 
    tu.id_user, ehp.id_employee_has_place
from
    tbl_user tu
        inner join
    tbl_employee em ON tu.id_employee_registration = em.id_employee_registration
        inner join
    tbl_employee_has_place ehp ON em.id_employee = ehp.id_employee where user_token='" . $token . "'");
        $userId = $useIdResult[0]->id_user;
         $employee_has_place = $useIdResult[0]->id_employee_has_place;
        
        foreach ($posmDataCollection as $posmData) {
            $posmQuery = "insert into posm_order(outlet_has_branch,id_user) values('" . $posmData['shop_id'] . "' ,'$userId')";
            $this->db->query($posmQuery);
            $posmOrderId = $this->db->insertId();
            $posmLeafletQuery = "insert into posm_order_detail(item,quantity,posm_order_id) values('leaflet', '" . $posmData['no_of_leaflet'] . "', '" . $posmOrderId . "')";
            $posmBanglesQuery = "insert into posm_order_detail(item,quantity,posm_order_id) values('bangle', '" . $posmData['no_of_banners'] . "', '" . $posmOrderId . "')";
            $this->db->query($posmLeafletQuery);
            $this->db->query($posmBanglesQuery);
        }

        foreach ($stockCollection as $stock) {
            $stockQuery = "insert into `outlet_take _stock`(outlet_id,emp_id,date,time) values (" . $stock['shop_id'] . "," . $userId . ",'" . date('Y-m-d') . "','" . date('H:i:s') . "')";
            $this->db->query($stockQuery);
            $takeId = $this->db->insertId();
            $stockDetailQuery = "insert into `outlet_take _stock_products`(product_id,take_id,qty) values ('" . $stock['item_id'] . "','" . $takeId . "','" . $stock['quantity'] . "')";
            $this->db->query($stockDetailQuery);
        }
        foreach ($paidBillCollection as $paidBill) {
            $PaymentQuery = "insert into tbl_cash_payment(id_sales_order,cash_payment,added_date) values ('" . $paidBill['id_sales_order'] . "','" . $paidBill['cash_payment'] . "','" . $paidBill['added_date'] . "')";
            $this->db->query($PaymentQuery);
        }
         
 
        foreach ($warrentyReturnCollection as $warrentyReturn) {
            
            $dateTime= explode(" ",$warrentyReturn['timestamp']);
            $date=$dateTime[0];      
            $time=$dateTime[1];            
//            $PaymentQuery = "insert into warrenty_return (id_employee_has_place,item_id, reason, outlet_id, serial_no, date, time) values ('" . $employee_has_place . "''" . $warrentyReturn->item_id . "','" . $warrentyReturn->reason . "','" . $warrentyReturn->outlet_id . "','" . $warrentyReturn->serial_no . "',date('" . $warrentyReturn->timestamp . "'),time('" . $warrentyReturn->timestamp . "'))";
            $PaymentQuery = "insert into warrenty_return (id_employee_has_place,item_id, reason,quantity,outlet_id, serial_no, date, time) values ('" . $employee_has_place . "','" . $warrentyReturn['item_id'] . "','" . $warrentyReturn['reason'] . "',1,'" . $warrentyReturn['outlet_id'] . "','" . $warrentyReturn['serial_no'] . "','$date','$time')";
            $this->db->query($PaymentQuery);
        }
        
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
	
/*
    public function kasunBatchJson($request) {
        $json = json_decode($request['data']);
        $data = $json->data;
        $posmDataCollection = $data[0]->posmdata;
        $stockCollection = $data[1]->stock;
        $paidBillCollection = $data[2]->collection;
        $warrentyReturnCollection = $data[3]->warrenty_items;
        $useIdResult = $this->db->mod_select("select 
    tu.id_user, ehp.id_employee_has_place
from
    tbl_user tu
        inner join
    tbl_employee em ON tu.id_employee_registration = em.id_employee_registration
        inner join
    tbl_employee_has_place ehp ON em.id_employee = ehp.id_employee where user_token='" . $request['userToken'] . "'");
        $userId = $useIdResult[0]->id_user;
        $employee_has_place = $useIdResult[0]->id_employee_has_place;
        foreach ($posmDataCollection as $posmData) {
            $posmQuery = "insert into posm_order(outlet_has_branch,id_user) values('" . $posmData->shop_id . "' ,'$userId')";
            $this->db->query($posmQuery);
            $posmOrderId = $this->db->insertId();
            $posmLeafletQuery = "insert into posm_order_detail(item,quantity,posm_order_id) values('leaflet', '" . $posmData->no_of_leaflet . "', '" . $posmOrderId . "')";
            $posmBanglesQuery = "insert into posm_order_detail(item,quantity,posm_order_id) values('bangle', '" . $posmData->no_of_banners . "', '" . $posmOrderId . "')";
            $this->db->query($posmLeafletQuery);
            $this->db->query($posmBanglesQuery);
        }

        foreach ($stockCollection as $stock) {
            $stockQuery = "insert into `outlet_take _stock`(outlet_id,emp_id,date,time) values (" . $stock->shop_id . "," . $userId . ",'" . date('Y-m-d') . "','" . date('H:i:s') . "')";
            $this->db->query($stockQuery);
            $takeId = $this->db->insertId();
            $stockDetailQuery = "insert into `outlet_take _stock_products`(product_id,take_id,qty) values ('" . $stock->item_id . "','" . $takeId . "','" . $stock->quantity . "')";
            $this->db->query($stockDetailQuery);
        }
        foreach ($paidBillCollection as $paidBill) {
            $PaymentQuery = "insert into tbl_cash_payment(id_sales_order,cash_payment,added_date) values ('" . $paidBill->id_sales_order . "','" . $paidBill->cash_payment . "','" . $paidBill->added_date . "')";
            $this->db->query($PaymentQuery);
        }
        foreach ($warrentyReturnCollection as $warrentyReturn) {
            $PaymentQuery = "insert into warrenty_return (id_employee_has_place,item_id, reason, outlet_id, serial_no, date, time) values ('" . $employee_has_place . "''" . $warrentyReturn->item_id . "','" . $warrentyReturn->reason . "','" . $warrentyReturn->outlet_id . "','" . $warrentyReturn->serial_no . "',date('" . $warrentyReturn->timestamp . "'),time('" . $warrentyReturn->timestamp . "'))";
            $this->db->query($PaymentQuery);
        }
        if ($this->db->status()) {
            return true;
        } else {
            return false;
        }
    }
*/
    public function getDailyTatget() {
        $query = "SELECT 
    ifnull(sum(qty),0) as dailyTarget
FROM
    tbl_employye_wise_target tewt
        inner join
    tbl_employee_has_place tehp ON tewt.id_employee_has_place = tehp.id_employee_has_place
        inner join
    tbl_employee te ON te.id_employee = tehp.id_employee
        inner join
    tbl_user tu ON tu.id_employee_registration = te.id_employee_registration
where
    tu.user_token = '" . $_REQUEST['userToken'] . "'
        and target_st_date <= curdate()
        and target_en_date >= curdate()";
        $result = $this->db->mod_select($query);
        return $result[0]->dailyTarget;
    }

    public function getMonthTarget() {
        $query = "SELECT 
    ifnull(sum(qty),0) as monthlyTarget
FROM
    tbl_employye_wise_target tewt
        inner join
    tbl_employee_has_place tehp ON tewt.id_employee_has_place = tehp.id_employee_has_place
        inner join
    tbl_employee te ON te.id_employee = tehp.id_employee
        inner join
    tbl_user tu ON tu.id_employee_registration = te.id_employee_registration
where
    tu.user_token = '" . $_REQUEST['userToken'] . "'
        and target_st_date between DATE_FORMAT(NOW(), '%Y-%m-01') and LAST_DAY(DATE_FORMAT(NOW(), '%Y-%m-%d'))
        and target_en_date between DATE_FORMAT(NOW(), '%Y-%m-01') and LAST_DAY(DATE_FORMAT(NOW(), '%Y-%m-%d'))";
        $result = $this->db->mod_select($query);
        return $result[0]->monthlyTarget;
    }

    public function outletCount() {
        $query = "select 
    t.id_territory,
    t.territory_name,
    ifnull(count(tohb.id_outlet_has_branch),0) as outletCount
from
    (SELECT 
        tehp.id_territory
    FROM
        tbl_employee_has_place tehp
    inner join tbl_employee te ON te.id_employee = tehp.id_employee
    inner join tbl_user tu ON tu.id_employee_registration = te.id_employee_registration
    inner join tbl_territory tt ON tehp.id_territory = tt.id_territory
    where
        tu.user_token = '" . $_REQUEST['userToken'] . "'
            and territory_status = 1) tempMap
        inner join
    tbl_territory t ON t.id_territory = tempMap.id_territory
        OR ((t.territory_hierarchy like concat('', tempMap.id_territory)
        OR t.territory_hierarchy like concat(tempMap.id_territory, ',%')
        OR t.territory_hierarchy like concat('%,', tempMap.id_territory, ',%')
        OR t.territory_hierarchy like concat('%', tempMap.id_territory)))
        and t.territory_status = 1
        inner join
    tbl_outlet_has_branch tohb ON tohb.id_territory = t.id_territory
        inner join
    tbl_outlet tolt ON tolt.id_outlet = tohb.id_outlet
group by t.id_territory";
        return $this->db->mod_select($query);
    }

    public function totMarketReturnAmount() {
        $query = "SELECT 
    ifnull(sum(return_price * return_product_qty),0) as totalMarketReturnAmount
FROM
    tbl_return_note trn
        inner join
    tbl_return_note_product trnp ON trn.id_return_note = trnp.id_return_note
        inner join
    tbl_employee_has_place tehp ON tehp.id_employee_has_place = trn.id_employee_has_place
        inner join
    tbl_employee te ON te.id_employee = tehp.id_employee
        inner join
    tbl_user tu ON tu.id_employee_registration = te.id_employee_registration
where
    tu.user_token = '" . $_REQUEST['userToken'] . "'
        and trn.added_date between DATE_FORMAT(NOW(), '%Y-%m-01') and LAST_DAY(DATE_FORMAT(NOW(), '%Y-%m-%d'))";
        $result = $this->db->mod_select($query);
        return $result[0]->totalMarketReturnAmount;
    }

    public function getMonthSalesTot() {
        $query = "SELECT 
    ifnull(sum(tsop.product_qty * tsop.product_price),0) as tot
FROM
    tbl_sales_order tso
        inner join
    tbl_employee_has_place tehp ON tehp.id_employee_has_place = tso.id_employee_has_place
        inner join
    tbl_employee te ON te.id_employee = tehp.id_employee
        inner join
    tbl_user tu ON tu.id_employee_registration = te.id_employee_registration
        inner join
    tbl_sales_order_products tsop ON tso.id_sales_order = tsop.id_sales_order
where
    tu.user_token = '" . $_REQUEST['userToken'] . "'
        and tso.added_date between DATE_FORMAT(NOW(), '%Y-%m-01') and LAST_DAY(DATE_FORMAT(NOW(), '%Y-%m-%d'))";
        $result = $this->db->mod_select($query);
        return $result[0]->tot;
    }

    /*
     * knet added do not remove
     */

    public function getCash($column) {
        $sql = "SELECT tbl_payment_remark.payment_amount FROM tbl_invoice tbl_invoice
            INNER JOIN tbl_payment_remark tbl_payment_remark
            ON tbl_payment_remark.id_sales_order = tbl_invoice.id_sales_order
            WHERE payment_type='Cash' AND  tbl_invoice.id_invoice=:invoice_id";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getCrdeit($column) {
        $sql = "SELECT tbl_payment_remark.credit_payment,tbl_payment_remark.credit_date FROM tbl_invoice tbl_invoice
            INNER JOIN tbl_payment_remark tbl_payment_remark
            ON tbl_payment_remark.id_sales_order = tbl_invoice.id_sales_order
            WHERE payment_type='Credit' AND  tbl_invoice.id_invoice=:invoice_id";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getcheque($column) {
        $sql = "SELECT tbl_payment_remark.cheque_bank,tbl_payment_remark.cheque_no,tbl_payment_remark.cheque_date,tbl_payment_remark.chequepayment FROM tbl_invoice tbl_invoice
            INNER JOIN tbl_payment_remark tbl_payment_remark
            ON tbl_payment_remark.id_sales_order = tbl_invoice.id_sales_order
            WHERE payment_type='Cheque' AND  tbl_invoice.id_invoice=:invoice_id";
        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getsaamount($column) {
        $sql = "select
    sum(tbl_sales_order_products.product_price * tbl_sales_order_products.product_qty) as sales_total
from

    tbl_sales_order,
	tbl_sales_order_products

where
    tbl_sales_order_products.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_sales_order =:id_sales_order";
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
        if (count($mod_select) > 0) {
            return $mod_select[0]['sales_total'];
        } else {
            return 0;
        }
    }

    public function getReAmount($column) {

        $sql = "select
    sum(tbl_return_note_product.return_price * tbl_return_note_product.return_product_qty) as return_total
from
    tbl_return_note_product,tbl_return_note,tbl_sales_order,tbl_invoice
where
    tbl_return_note_product.id_return_note = tbl_return_note.id_return_note
and tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order and tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order
and tbl_sales_order.id_sales_order =:id_sales_order";
        $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);

        if (count($mod_select[0]) > 0) {
            return $mod_select[0]['return_total'];
        } else {

            return 0;
        }
    }

    public function getphysical_place($employee_id) {
        $column = array('id_employee_has_place' => $employee_id);
        $sql = "SELECT id_physical_place FROM tbl_employee_has_place WHERE id_employee_has_place=:id_employee_has_place";
        return $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getUsertoken($employe_id) {
        
        $column = array('employee_has_place_status' => '1', 'id_employee_has_place' => $employe_id);
        $sql = "SELECT tbl_user.user_token FROM tbl_user tbl_user
            INNER JOIN tbl_employee_registration tbl_employee_registration
            ON tbl_employee_registration.id_employee_registration = tbl_user.id_employee_registration
            INNER JOIN tbl_employee tbl_employee
            ON tbl_employee.id_employee_registration = tbl_employee_registration.id_employee_registration
            INNER JOIN tbl_employee_has_place tbl_employee_has_place
            ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
            WHERE tbl_employee_has_place.employee_has_place_status=:employee_has_place_status
            AND tbl_employee_has_place.id_employee_has_place =:id_employee_has_place";
        
        return $mod_select = $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function insertwebsalesOrder($data_array, $emp_id, $emp_pys, $all_data = '') {

        $last_sale_order = '';
        $sales_return_order_id = '';

        $time = new DateTime($data_array['salesOrder']['sales_date']);
        $date = $time->format('Y-m-d');
        $time = $time->format('H:i:s');

        $coumn_data = array('added_date' => $date, 'added_time' => $time, 'id_employee_has_place' => $emp_id, 'id_outlet_has_branch' => $data_array['branch_id']);
        $salesorderExsits = $this->salesorderExsits($coumn_data);
        if ($salesorderExsits == 0) {
            $max_sales_id = $this->db->mod_select("SELECT MAX(id_sales_order) as max_id FROM `tbl_sales_order`");
            $sales_code = $max_sales_id[0]->max_id;
            $sales_code++;
           
            $userStockID = $this->getUserStockID($emp_pys);
            
          
            $this->db->trans_start();
            if (count($userStockID) > 0 && !empty($userStockID)) {
                if (isset($all_data['remarks'])) {
                    //echo "fgfg";
                    $sales_order_data = array(
                        'id_employee_has_place' => $emp_id,
                        'id_outlet_has_branch' => $data_array['branch_id'],
                        'sales_order_remark' => $all_data['remarks'],
                        'added_date' => $date,
                        'sales_order_code' => $sales_code,
                        'added_time' => $time
                    );
                    //print_r($sales_order_data);
                    $this->db->insert('tbl_sales_order', $sales_order_data);
                } else {
                    $sales_order_data = array(
                        'id_employee_has_place' => $emp_id,
                        'id_outlet_has_branch' => $data_array['branch_id'],
                        'added_date' => $date,
                        'sales_order_code' => $sales_code,
                        'added_time' => $time
                    );
                    $this->db->insert('tbl_sales_order', $sales_order_data);
                }

                $lastRow = $this->getLastRow();
                $last_sale_order = $lastRow;
                if (!empty($data_array['sales'])) {

                    foreach ($data_array['sales'] as $key => $value) {
                        $productPrice = $this->getProductPrice($value['id_item']);

                        $sales_array = array(
                            'id_sales_order' => $lastRow,
                            'id_products' => $value['id_item'],
                            'product_qty' => $value['item_qty'],
                            'product_price' => $value['discount_pre'],
                            'discount' => (($productPrice[0]['product_price'] - $value['discount_pre']) * $value['item_qty']),
                            'added_date' => $date,
                            'added_time' => $time
                        );

                        $this->db->insert('tbl_sales_order_products', $sales_array);

                        $exsist = array();

                        foreach ($userStockID as $exsis_id) {
                            array_push($exsist, $exsis_id['id_products']);
                        }
                        // print_r($exsis_id);
                        if (in_array($value['id_item'], $exsist)) {

                            $stockItemQty = $this->getStockItemQty($value['id_item'], $userStockID[0]['id_store']);
                            if (count($stockItemQty) > 0) {//id_stock
                                $qty = $stockItemQty[0]['qty'];
                                if ($qty - $value['item_qty'] >= 0) {
                                    $update_qty = $qty - $value['item_qty'];
                                    // echo "ok".$update_qty;
                                    $this->updateStock($update_qty, $stockItemQty[0]['id_stock']);
                                }
                            }
                        }
                    }
                }
                if (!empty($data_array['salesReturn']) || !empty($data_array['marketReturn'])) {
                    $sales_return_order = array(
                        'id_employee_has_place' => $emp_id,
                        'id_outlet_has_branch' => $data_array['branch_id'],
                        'id_sales_order' => $last_sale_order,
                        'added_date' => $date,
                        'added_time' => $time
                    );


                    $this->db->insert('tbl_return_note', $sales_return_order);

                    $sales_return_order_id = $this->getLastRow();
                }
                if (!empty($data_array['salesReturn'])) {
                    $count = count($data_array['salesReturn']);
                    //echo $count;
                    foreach ($data_array['salesReturn'] as $key => $value) {
                        $sales_return_array = array(
                            'id_return_note' => $sales_return_order_id,
                            'id_return_type' => 2,
                            'id_products' => $value['id_item'],
                            'return_product_qty' => $value['item_qty'],
                            'return_price' => $value['discount_pre'],
							'discount' => $value['discount'],
                            'return_remaks' => $value['return_remaks'],
                            'added_date' => $date,
                            'added_time' => $time
                        );

                        $this->db->insert('tbl_return_note_product', $sales_return_array);
                    }
                }
                if (!empty($data_array['marketReturn'])) {

                    foreach ($data_array['marketReturn'] as $key => $value) {
                        $market_return_array = array(
                            'id_return_note' => $sales_return_order_id,
                            'id_return_type' => 1,
                            'id_products' => $value['id_item'],
                            'return_product_qty' => $value['item_qty'],
                            'return_price' => $value['discount_pre'],
							'discount' => $value['discount'],
                            'added_date' => $date,
                            'added_time' => $time
                        );
                        $exsist = array();

                        foreach ($userStockID as $exsis_id) {
                            array_push($exsist, $exsis_id['id_products']);
                        }
                        if (in_array($value['id_item'], $exsist)) {
                            $stockItemQty = $this->getStockItemQty($value['id_item'], $userStockID[0]['id_store']);
                            if (count($stockItemQty) >= 0) {
                                $qty = $stockItemQty[0]['qty'];
                                $update_qty = $qty + $value['item_qty'];

                                $this->updateStock($update_qty, $stockItemQty[0]['id_stock']);
                            }
                        }
                        $this->db->insert('tbl_return_note_product', $market_return_array);
                    }
                }
                if (!empty($data_array['OtherInfo'])) {

                    $tab_info = array(
                        'gps_latitude' => $data_array['OtherInfo']['gps_latitude'],
                        'gps_longitude' => $data_array['OtherInfo']['gps_longitude'],
                        'battry_level' => $data_array['OtherInfo']['battry_level'],
                        'id_sales_order' => $last_sale_order
                    );
                    $this->db->insert('tbl_gps_info', $tab_info);
                }
                if (!empty($data_array['Payment'])) {
                    foreach ($data_array['Payment'] as $value) {

                        $payments = array(
                            'id_sales_order' => $last_sale_order,
                            'payment_type' => $value['type'],
                            'payment_amount' => $value['cashpayment'],
                            'cheque_bank' => $value['bank'],
                            'cheque_no' => $value['chequeno'],
                            'cheque_date' => $value['realizeddate'],
                            'credit_date' => $value['duedate'],
                            'credit_payment' => $value['creditpayment'],
                            'chequepayment' => $value['chequepayment']
                        );

                        $this->db->insert('tbl_payment_remark', $payments);
                    }
                }
                $trans_complete = $this->db->trans_complete();

                if ($trans_complete === FALSE) {
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        } else {
            return 1;
        }
    }

    public function getstock_id($id_products) {
        $coulmn = array('id_products' => $id_products);
        $sql = "SELECT tm.id_physical_place FROM tbl_sales_order tb
            INNER JOIN tbl_employee_has_place tm ON tb.id_employee_has_place = tm.id_employee_has_place
            WHERE tb.id_sales_order=:id_products";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    /*
     * knet end
     */
	 
public function get_rep_tracking() {
        $this->load->helper('file');
        $date = date('H:i:s');
        $date_time = date('Y:m:d');
        if (!is_dir('uploads/')) {
            mkdir('./uploads/', 0777, TRUE);
        }
        
        write_file('./uploads/' . $date_time . '-' . $date . 'tracking' .'.'. 'json', $_REQUEST['data'], 'a+');
       if(isset($_REQUEST['data'])){
            $json_decode = json_decode($_REQUEST['data'], TRUE);
            $this->load->model('services/service_model');
            $this->service_model->store_tracking($json_decode);
        }
        
    }


///////////////////////////////////////


public function store_tracking($value){
        
        $sql="select 
    ehp.id_employee_has_place
from
    tbl_user tu
        inner join
    tbl_employee te on tu.id_employee_registration = te.id_employee_registration
inner join 
tbl_employee_has_place ehp on te.id_employee= ehp.id_employee
where
tu.user_status =1
and te.employee_status=1 
and ehp.employee_has_place_status=1
and tu.user_token = '".$value['tracking']['token']."'
";
       $result = $this->db->mod_select($sql);
                
        $data_array = array(
           'id_employee_has_place'=>$result[0]->id_employee_has_place,
           'gps_latitude'=>$value['tracking']['gps_latitude'],
           'gps_longitude'=>$value['tracking']['gps_longitude'],
           'battry_level'=>$value['tracking']['battry_level'],
           'status'=> 1,
           'added_date'=>date('Y:m:d'),
           'added_time'=> date('H:i:s')
            
        );
       
        
       
      $this->db->insert('tbl_gps_movement', $data_array);
    }
    
    
     public function store_tracking1($value, $token) {
        //print_r($token);
        $sql = "select 
    ehp.id_employee_has_place
from
    tbl_user tu
        inner join
    tbl_employee te on tu.id_employee_registration = te.id_employee_registration
inner join 
tbl_employee_has_place ehp on te.id_employee= ehp.id_employee
where
tu.user_status =1
and te.employee_status=1 
and ehp.employee_has_place_status=1
and tu.user_token = '" . $token['userToken'] . "'";
        $result = $this->db->mod_select($sql);
        
        $trackingar = array();

        foreach ($value['tracking'] as $values) {
            $data_array = array(
                'id_employee_has_place' => $result[0]->id_employee_has_place,
                'gps_latitude' => $values['gps_latitude'],
                'gps_longitude' => $values['gps_longitude'],
                'battry_level' => $values['battry_level'],
                'status' => 1,
                'added_date' => date('Y-m-d'),
                'added_time' => date('H:i:s')
            );
            array_push($trackingar, $data_array);
        }

        
        $this->db->insert_batch('tbl_gps_movement', $trackingar);
        echo $this->db->affected_rows();
    }


	 
}
?>


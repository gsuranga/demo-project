<?php

/**
 * Description of item_keyword_model
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class salesorder_model extends C_Model {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function get_Autogen_ID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function get_Autogen_ID() {
        $result = $this->db->mod_select("SELECT MAX(id_sales_order) As id FROM tbl_sales_order");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "SOR0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "SOR000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "SOR00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "SOR0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "SOR" . $num_rows;
            }
        }
    }

    /**
     * Function insertSalesOrder
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertSalesOrder($datapack) {
        //print_r($datapack);
        // $date = new DateTime();
        $sales_order_code = $this->get_Autogen_ID();
        $data = array(
            "id_employee_has_place" => $datapack['id_employee_has_place'],
            "id_outlet_has_branch" => $datapack['branch_name'],
            "sales_order_code" => $sales_order_code,
            "sales_order_remark" => $datapack['remarks'],
            "sales_order_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->__beginTransaction();
        $this->db->insertData("tbl_sales_order", $data);
        $id_sales_order = $this->db->insertId();
        $productQty = $datapack['rowCount'];
        for ($rowcount = 1; $rowcount <= $productQty; $rowcount++) {
            $data2 = array(
                "id_sales_order" => $id_sales_order,
                "id_products" => $datapack['item_id_' . $rowcount],
                "product_qty" => $datapack['item_qty_' . $rowcount],
                "product_price" => $datapack['item_price_' . $rowcount],
                "sales_order_products_status" => 1,
                "free_qty" => 0.00,
                "discount" => $datapack['discuntamount_' . $rowcount],
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );
            $this->db->insertData("tbl_sales_order_products", $data2);
        }
        $free_issue_code = $this->get_Autogen_ID2();
        $data6 = array(
            "id_sales_order" => $id_sales_order,
            "free_issue_code" => $free_issue_code,
            "free_issue_remark" => '',
            "free_issue_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );
        $this->db->insertData("tbl_free_issue", $data6);
        $id_free_issue = $this->db->insertId();

        $freeitemQty = $datapack['freeitemCount'];
        for ($rowcount2 = 1; $rowcount2 <= $freeitemQty; $rowcount2++) {
            $item_idd = $datapack['item_idd_' . $rowcount2];
            $product = $this->db->mod_select("SELECT tp.id_products as id_products FROM tbl_products tp inner join tbl_stock ts ON tp.id_products=ts.id_products where tp.iditem=$item_idd AND ts.qty>0.00");
            foreach ($product as $value) {
                $data7 = array(
                    "id_free_issue" => $id_free_issue,
                    "id_products" => $value->id_products,
                    "free_issue_qty" => $datapack['qty2_' . $rowcount2],
                    "free_issue_status" => 1
                );
                $this->db->insertData("tbl_free_issue_product", $data7);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function get_Autogen_ID2() {
        $result = $this->db->mod_select("SELECT MAX(id_free_issue) As id FROM tbl_free_issue");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "FR0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "FR000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "FR00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "FR0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "FR" . $num_rows;
            }
        }
    }

    /**
     * Function updateSalesOrder
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateSalesOrder($data) {
        $id = $data['id_item_keyword'];
        $data = array(
            "item_keyword" => $data['item_keyword'],
        );
        $where = array(
            "id_item_keyword" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_item_keyword", $data, $where);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function create_invoices() {



        $this->db->__beginTransaction();
        foreach ($_POST['sales_orders'] as $value) {
            $invoice_no = $this->get_Autogen_ID34($value['id_sales_token']);

            $data = array(
                "invoice_no" => $invoice_no,
                "id_sales_order" => $value['id_sales_token'],
                "invoice_status" => 1,
                "added_date" => date('Y:m:d'),
                "added_time" => date('H:i:s')
            );


            $this->db->insertData("tbl_invoice", $data);
        }
        $this->db->__endTransaction();

        return $this->db->status();
    }

    public function getProduct1($q, $select) {
        $sql = "SELECT tbl_products.iditem,tbl_products.id_products,tbl_products.product_price,tbl_products.product_cost,tbl_item.item_name,tbl_item.item_account_code
            FROM tbl_products tbl_products INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem
            WHERE tbl_products.product_status='1' AND tbl_item.item_name LIKE '$q%' GROUP BY tbl_item.id_item";

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

    public function getEmployee1($q, $select) {
        $sql = " SELECT 
    tbl_employee_has_place.id_employee_has_place,
    tbl_employee.id_employee,
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as full_name
FROM
    tbl_employee tbl_employee
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee = tbl_employee.id_employee
        INNER JOIN
    tbl_user tbl_user ON tbl_user.id_employee_registration = tbl_employee.id_employee_registration
        INNER JOIN
    tbl_user_type tbl_user_type ON tbl_user_type.id_user_type = tbl_user.id_user_type
WHERE
    tbl_user_type.user_type = 'Distributor' AND employee_status = 1 AND tbl_employee.employee_status = 1 AND tbl_employee_has_place.employee_has_place_status = 1 AND employee_first_name LIKE '%$q%'
GROUP BY tbl_employee_has_place.id_employee_has_place";

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

    public function getDivision1($employee_id) {
        $sql = "SELECT t.id_division as id_division,td.division_name as division_name FROM tbl_employee_has_place t inner join tbl_division td ON t.id_division=td.id_division where t.id_employee=$employee_id AND division_status=1 GROUP BY td.id_division";

        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function getDiscount($dataset) {

        $id_outlet = $dataset['outlet_name'];
        $id_territory = $dataset['territory_name'];
        $sql = "SELECT t.price_discount as price_discount,t.percentage_discount as percentage_discount
FROM tbl_outlet_has_branch t WHERE t.id_territory=$id_territory AND t.id_outlet=$id_outlet AND outlet_has_branch_status=1";

        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function getTerritoryHierarchy($territoryID) {
        $arr1 = array();
        $sql2 = "SELECT territory_name,id_territory FROM tbl_territory where id_territory=$territoryID";

        $result2 = $this->db->mod_select($sql2);
        array_push($arr1, $result2[0]);
        $sql = "SELECT id_territory,territory_hierarchy FROM tbl_territory";

        $result = $this->db->mod_select($sql);

        foreach ($result as $data) {
            $idset = explode(",", $data->territory_hierarchy);

            foreach ($idset as $value) {
                if (trim($value) == $territoryID) {
                    $sql1 = "SELECT territory_name,id_territory FROM tbl_territory where id_territory=$data->id_territory";

                    $result1 = $this->db->mod_select($sql1);
                    array_push($arr1, $result1[0]);
                }
            }
        }
        return $arr1;
    }

    public function getTerritory1($division_id, $id_employee) {
        $sql = "SELECT tmp.id_territory  as id_territory FROM tbl_employee_has_place tmp inner join tbl_territory tt ON tmp.id_territory=tt.id_territory where tmp.id_division=$division_id AND tmp.id_employee=$id_employee AND tt.territory_status=1 GROUP BY tmp.id_territory";
        $arr2 = array();
        $result = $this->db->mod_select($sql);
        foreach ($result as $data) {
            $arr3 = $this->getTerritoryHierarchy($data->id_territory);
            array_push($arr2, $arr3);
        }
        return $arr2;
    }

    public function getPhysicalPlace1($division_id, $id_employee, $id_territory) {
        $territoryidset = $this->getTerritoryHierarchyUpset($id_territory);
        $phusicalPlaceSet = array();
        foreach ($territoryidset as $value) {
            if ($value->id_territory != '') {
                $sql1 = "SELECT tmp.id_physical_place as id_physical_place,(select physical_place_name from tbl_physical_place where id_physical_place=tmp.id_physical_place) as physical_place_name FROM tbl_employee_has_place tmp inner join tbl_physical_place tpp ON tmp.id_physical_place=tpp.id_physical_place where tmp.id_division=$division_id AND tmp.id_employee=$id_employee AND tmp.id_territory=$value->id_territory AND tpp.physical_place_status=1 GROUP BY tmp.id_physical_place";
                $result1 = $this->db->mod_select($sql1);

//print_r($result1);
                array_push($phusicalPlaceSet, $result1);
            }
        }
        return $phusicalPlaceSet;
    }

    public function getTerritoryHierarchyUpset($territoryID) {
        $arr1 = array();
        $sql5 = "SELECT territory_name,id_territory FROM tbl_territory where id_territory=$territoryID";

        $result5 = $this->db->mod_select($sql5);
        array_push($arr1, $result5[0]);
        $sql = "SELECT territory_hierarchy FROM tbl_territory where id_territory=$territoryID";

        $result = $this->db->mod_select($sql);
        foreach ($result as $data) {
            $idset = explode(",", $data->territory_hierarchy);

            foreach ($idset as $value) {
                if ($value != '' && $value != 0) {
                    $sql1 = "SELECT id_territory,territory_name FROM tbl_territory where id_territory=$value";

                    $result1 = $this->db->mod_select($sql1);

                    array_push($arr1, $result1[0]);
                }
            }
        }
        return $arr1;
    }

    public function getOutlet1($id_territory) {
        $territoryidset = $this->getTerritoryHierarchy($id_territory);
        $OutletSet = array();
        foreach ($territoryidset as $value) {
            //print_r($territoryidset);
            if ($value->id_territory != '') {
                $sql1 = "SELECT t.id_outlet as id_outlet,(select outlet_name from tbl_outlet where id_outlet=t.id_outlet) as outlet_name  FROM tbl_outlet_has_branch t inner join tbl_outlet tol on tol.id_outlet=t.id_outlet where t.id_territory=$value->id_territory AND tol.outlet_status=1 GROUP BY t.id_outlet";
                $result1 = $this->db->mod_select($sql1);
                array_push($OutletSet, $result1);
            }
        }
        return $OutletSet;
    }

    public function getBranch1($id_outlet) {
        $sql1 = "SELECT id_outlet_has_branch,branch_address FROM tbl_outlet_has_branch t where t.id_outlet=$id_outlet GROUP BY t.branch_address";
        $result1 = $this->db->mod_select($sql1);
        return $result1;
    }

    public function getEmployeeHasPlaceID($Dataset) {

        $empid = $Dataset['empid'];
        $division_name = $Dataset['division_name'];
        $territory_name = $Dataset['territory_name'];
        $physical_place_name = $Dataset['physical_place_name'];
        $sql1 = "SELECT id_employee_has_place,discount FROM tbl_employee_has_place WHERE id_employee=$empid AND id_physical_place=$physical_place_name AND id_territory=$territory_name AND id_division=$division_name AND employee_has_place_status=1";
        $result1 = $this->db->mod_select($sql1);
        return $result1[0];
    }

    /**
     * Function viewDivisionByFilterKey1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewSalesOrderByFilterKey1() {


        /*
         * knet edited
         */

        $append = '';
        $txtemp_place_id = '';
        $status = 1;
        $employeeset = '';
        $employe_id = 0;

        $data_array = array();

        if (isset($_POST['status'])) {
            $status = $_POST['status'];
        }

        if (isset($_POST['dateOne']) && $_POST['dateOne'] != '') {
            $date_1 = $_POST['dateOne'];
            $date_2 = $_POST['dateTwo'];

            $append.= "AND tbl_sales_order.added_date BETWEEN '$date_1' AND '$date_2'";
        }

        if (isset($_POST['Repemphaspls']) && $_POST['Repemphaspls'] != '') {
            $ephpspls = $_POST['Repemphaspls'];

            $append.= "AND tbl_sales_order.id_employee_has_place='$ephpspls'";
        }

        if (isset($_POST['emlpoyee_hasplceid'])) {
            $employe_id = $_POST['emlpoyee_hasplceid'];
        }
        $userdata = $this->session->userdata('user_type');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        $query_append = '';

        if ($userdata == "Regional Manager") {
//               echo $idEmployee = $_REQUEST['employee_id'];
            $query_append .= "and tbl_employee_has_place.id_physical_place in (select 
    distributor_psy_id
from
    tbl_region_assign tra
        inner join
    tbl_region_assign_details trad ON tra.region_assign_id = trad.region_assign_id
where
    tra.status = 1 and trad.status = 1
        and tra.region_manager_emp_id = '$id_employeeHas')";
        }
        $pyscialplac = $this->getpyscialplac($employe_id);
        $row = 0;

        if ($employe_id == 0) {
            $sql = "SELECT distinct
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as fullname,
    tbl_employee_type.employee_type,
    tbl_invoice.id_invoice,
	tbl_invoice.invoice_no ,
    tbl_sales_order.id_sales_order,
    tbl_sales_order.added_date,
    tbl_sales_order.added_time,
    tbl_store.store_name,
    tbl_outlet.outlet_name,
    tbl_outlet_has_branch.branch_address
FROM
    tbl_sales_order tbl_sales_order
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
        INNER JOIN
    tbl_outlet_has_branch tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        INNER JOIN
    tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
        INNER JOIN
    tbl_employee_type ON tbl_employee.id_employee_type = tbl_employee_type.id_employee_type
        inner join
    tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        INNER JOIN
    tbl_store tbl_store ON tbl_store.id_physical_place = tbl_employee_has_place.id_physical_place
        LEFT JOIN
    tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order
WHERE
    tbl_sales_order.sales_order_status = '$status' {$append} {$employeeset} {$query_append}
            ORDER BY tbl_sales_order.id_sales_order DESC";
//               echo $sql;          
            $mod_select = $this->db->mod_select($sql);

            array_push($data_array, $mod_select);
        }

        foreach ($pyscialplac as $value) {
            $txtemp_place_id = $value->id_employee_has_place;
            if (isset($_POST['emlpoyee_hasplceid']) && $_POST['emlpoyee_hasplceid']) {
                $txtemp_place_id = $txtemp_place_id;
                $employeeset = "AND tbl_sales_order.id_employee_has_place='$txtemp_place_id' ";
            }

            $sql = "SELECT distinct
    CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) as fullname,
	tbl_employee_type.employee_type,
    tbl_invoice.id_invoice,
    tbl_sales_order.id_sales_order,
    tbl_sales_order.added_date,
    tbl_sales_order.added_time,
    tbl_sales_order.id_employee_has_place,
    tbl_store.store_name,
    tbl_outlet.outlet_name,
    tbl_outlet_has_branch.branch_address
FROM
    tbl_sales_order tbl_sales_order
        INNER JOIN
    tbl_employee_has_place tbl_employee_has_place ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
        INNER JOIN
    tbl_outlet_has_branch tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch
        INNER JOIN
    tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
        INNER JOIN
	tbl_employee_type ON tbl_employee.id_employee_type = tbl_employee_type.id_employee_type
        inner join
    tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
        INNER JOIN
    tbl_store tbl_store ON tbl_store.id_physical_place = tbl_employee_has_place.id_physical_place
        LEFT JOIN
    tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order
WHERE
    tbl_sales_order.sales_order_status ='$status' {$append} {$employeeset} {$query_append}
            ORDER BY tbl_sales_order.added_date DESC ";
          //  echo $sql;
            $mod_select = $this->db->mod_select($sql);
            // echo $sql."</br>"."</br>";

            array_push($data_array, $mod_select);
        }

        return $data_array;
    }

    /* public function getdisandref($emlpoyee_hasplceid){
      $append = '';

      $data_array = array();

      if(isset($_POST['status'])){
      $status = $_POST['status'];
      $append .= "AND tbl_sales_order.sales_order_status='$status'";
      }

      if(isset($_POST['dateOne']) && $_POST['dateOne'] != ''){
      $date_1 = $_POST['dateOne'];
      $date_2 = $_POST['dateTwo'];

      $append.= "AND tbl_sales_order.added_date BETWEEN '$date_1' AND '$date_2'";
      }

      $pyscialplac = $this->getpyscialplac($emlpoyee_hasplceid);
      foreach ($pyscialplac as $value) {
      $id = $value->id_employee_has_place;
      $sql = "SELECT CONCAT(tbl_employee.employee_first_name ,' ',tbl_employee.employee_last_name) as fullname ,tbl_invoice.id_invoice,tbl_sales_order.id_sales_order
      ,tbl_sales_order.added_date,tbl_sales_order.added_time,tbl_store.store_name
      ,tbl_outlet.outlet_name,tbl_outlet_has_branch.branch_address
      FROM tbl_sales_order tbl_sales_order INNER JOIN tbl_employee_has_place tbl_employee_has_place
      ON tbl_employee_has_place.id_employee_has_place = tbl_sales_order.id_employee_has_place
      INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch
      ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch INNER JOIN tbl_employee tbl_employee ON tbl_employee.id_employee = tbl_employee_has_place.id_employee
      INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet
      INNER JOIN tbl_store tbl_store ON tbl_store.id_physical_place = tbl_employee_has_place.id_physical_place
      LEFT JOIN tbl_invoice tbl_invoice ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order WHERE tbl_sales_order.id_employee_has_place='$id' {$append}
      ORDER BY tbl_sales_order.added_date DESC ";
      echo $sql."</br>";
      $mod_select = $this->db->mod_select($sql);
      array_push($data_array, $mod_select);
      // print_r($mod_select);
      echo "</br>";
      }

      return $data_array;

      } */

    public function getpyscialplac($emlpoyee_hasplceid) {
        $sql = "SELECT id_employee_has_place FROM tbl_employee_has_place 
            WHERE id_physical_place=(SELECT id_physical_place FROM tbl_employee_has_place 
            WHERE id_employee_has_place='$emlpoyee_hasplceid' LIMIT 1)  AND employee_has_place_status=1";

        return $mod_select = $this->db->mod_select($sql);
    }

    /*
     * kent
     */

    public function getsalesTotal($id_sales_order) {
        $sales_tot = 0;
        $return_tot = 0;
        $total = 0;

        $array = array('id_sales_order' => $id_sales_order);
        $sql = "SELECT SUM( product_price * product_qty) as sales_total FROM tbl_sales_order_products WHERE id_sales_order=:id_sales_order";
        $sales_total = $this->db->mod_select($sql, $array, PDO::FETCH_ASSOC);
        if (count($sales_total) > 0 && $sales_total[0]['sales_total'] != '') {
            $sales_tot = $sales_total[0]['sales_total'];
        }

        $sql2 = "SELECT SUM(return_product_qty * return_price) as 
            return_total FROM tbl_sales_order tbl_sales_order 
            INNER JOIN tbl_return_note tbl_return_note 
            ON tbl_return_note.id_sales_order = tbl_sales_order.id_sales_order 
            INNER JOIN tbl_return_note_product tbl_return_note_product 
            ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note 
            WHERE tbl_return_note.id_sales_order=:id_sales_order";
        $return_total = $this->db->mod_select($sql2, $array, PDO::FETCH_ASSOC);

        if (count($return_total) > 0 && $return_total[0]['return_total'] != '') {
            $return_tot = $return_total[0]['return_total'];
        }

        $total = ($sales_tot - $return_tot);
        return $total;
    }

    function viewSalesOrderByFilterKey2($data) {
        $appendLast = '';
        $employee_id = $data['employee_id'];
//        $territory_name = $data['territory_name'];
//        $division_name = $data['division_name'];
//        $outlet_name = $data['outlet_name'];
//        $branch_name = $data['branch_name'];
//        $physical_place_name = $data['physical_place_name'];
        $sales_order_status = $data['status'];

        $result2 = $this->db->mod_select("SELECT tehp.id_physical_place FROM tbl_employee_has_place tehp where tehp.id_employee=$employee_id");
        if ((isset($_REQUEST['dateOne']) && isset($_REQUEST['dateTwo'])) && ($_REQUEST['dateOne'] != null && $_REQUEST['dateTwo'] != null)) {
            $dateOne = $_REQUEST['dateOne'];
            $dateTwo = $_REQUEST['dateTwo'];
            $appendLast .= "tso.added_date between '$dateOne' and '$dateTwo' AND ";
            //echo $appendLast;
        }



        $allSalesOrders_Array = array();
        $user_type = $this->session->userdata('user_type');
        if ($user_type != "Assist Manager" && $user_type != "SBU Head" && $user_type != "Manager" && $user_type != "Admin") {

            foreach ($result2 as $value1) {
                $id_physical_place = $value1->id_physical_place;

                $result = $this->db->mod_select("SELECT
                                            tso.id_sales_order,tso.added_date,tso.added_time,
                                            (select CONCAT(employee_first_name,employee_last_name) as employee_first_name from tbl_employee where id_employee=tehp.id_employee) as employee_first_name,
                                            (select physical_place_name from tbl_physical_place where id_physical_place=tehp.id_physical_place) as physical_place_name,
                                            (select territory_name from tbl_territory where id_territory=tehp.id_territory) territory_name,
                                            (select division_name from tbl_division where id_division=tehp.id_division) as division_name,
                                            (select outlet_name from tbl_outlet where id_outlet=tohc.id_outlet) as outlet_name,
                                            (select branch_address from tbl_outlet_has_branch where id_outlet_has_branch=tohc.id_outlet_has_branch) as branch_address,
                                            tso.sales_order_code,tso.sales_order_remark,
                                            (SELECT  SUM(product_price * product_qty) as total FROM tbl_sales_order_products WHERE id_sales_order=tso.id_sales_order GROUP BY id_sales_order) as salesordertotal,
                                            (SELECT  SUM(`tbl_return_note_product`.`return_price`*`tbl_return_note_product`.`return_product_qty`) as returntotal FROM `tbl_return_note`, `tbl_return_note_product` WHERE `tbl_return_note`.`id_sales_order`=tso.id_sales_order AND `tbl_return_note`.`id_return_note`=`tbl_return_note_product`.`id_return_note` GROUP BY `tbl_return_note`.`id_sales_order`) as returnproducttotal
                                            FROM tbl_sales_order tso
                                            inner join tbl_employee_has_place tehp ON tso.id_employee_has_place=tehp.id_employee_has_place
                                            inner join tbl_outlet_has_branch tohc ON tso.id_outlet_has_branch=tohc.id_outlet_has_branch 
                                            INNER JOIN tbl_invoice ti ON ti.id_sales_order=tso.id_sales_order                                            
                                            where {$appendLast} tehp.id_employee LIKE '$employee_id%' AND  tso.sales_order_status=1
                                            AND tehp.id_physical_place LIKE '$id_physical_place%'
                                            AND tehp.id_territory LIKE '%' AND tehp.id_division LIKE '%' AND tohc.id_outlet LIKE '%' AND tohc.id_outlet_has_branch LIKE '%'
                                            AND tso.sales_order_status LIKE '$sales_order_status%' ORDER BY tso.id_sales_order DESC");


                array_push($allSalesOrders_Array, $result);
            }
        } else {
            $result = $this->db->mod_select("SELECT
                                            tso.id_sales_order,tso.added_date,tso.added_time,
                                            (select CONCAT(employee_first_name,employee_last_name) as employee_first_name from tbl_employee where id_employee=tehp.id_employee) as employee_first_name,
                                            (select physical_place_name from tbl_physical_place where id_physical_place=tehp.id_physical_place) as physical_place_name,
                                            (select territory_name from tbl_territory where id_territory=tehp.id_territory) territory_name,
                                            (select division_name from tbl_division where id_division=tehp.id_division) as division_name,
                                            (select outlet_name from tbl_outlet where id_outlet=tohc.id_outlet) as outlet_name,
                                            (select branch_address from tbl_outlet_has_branch where id_outlet_has_branch=tohc.id_outlet_has_branch) as branch_address,
                                            tso.sales_order_code,tso.sales_order_remark,
                                            (SELECT  SUM(product_price * product_qty) as total FROM tbl_sales_order_products WHERE id_sales_order=tso.id_sales_order GROUP BY id_sales_order) as salesordertotal,
                                            (SELECT  SUM(`tbl_return_note_product`.`return_price`*`tbl_return_note_product`.`return_product_qty`) as returntotal FROM `tbl_return_note`, `tbl_return_note_product` WHERE `tbl_return_note`.`id_sales_order`=tso.id_sales_order AND `tbl_return_note`.`id_return_note`=`tbl_return_note_product`.`id_return_note` GROUP BY `tbl_return_note`.`id_sales_order`) as returnproducttotal
                                            FROM tbl_sales_order tso
                                            inner join tbl_employee_has_place tehp ON tso.id_employee_has_place=tehp.id_employee_has_place
                                            inner join tbl_outlet_has_branch tohc ON tso.id_outlet_has_branch=tohc.id_outlet_has_branch 
INNER JOIN tbl_invoice ti ON ti.id_sales_order=tso.id_sales_order AND  tso.sales_order_status=1                                          
 ORDER BY tso.id_sales_order DESC");


            array_push($allSalesOrders_Array, $result);
        }
        return $allSalesOrders_Array;
    }

    function viewSalesOrderByFilterKeypayments($data) {
        $employee_id = $data['employee_id'];
        $append = '';
        $sales_order_status = $data['status'];
        if (isset($_REQUEST['selt_date']) && $_REQUEST['selt_date'] != '') {
            $tc = $_REQUEST['selt_date'];
            $append = "tc.added_date='$tc' AND ";
        }


        $result2 = $this->db->mod_select("SELECT tehp.id_physical_place FROM tbl_employee_has_place tehp where tehp.id_employee=$employee_id");

        $allSalesOrders_Array = array();
        foreach ($result2 as $value1) {
            $id_physical_place = $value1->id_physical_place;
            $sql = "SELECT
                                            tso.id_sales_order,tc.added_date,
                                            (select CONCAT(employee_first_name,employee_last_name) as employee_first_name from tbl_employee where id_employee=tehp.id_employee) as employee_first_name,
                                            (select physical_place_name from tbl_physical_place where id_physical_place=tehp.id_physical_place) as physical_place_name,
                                            (select territory_name from tbl_territory where id_territory=tehp.id_territory) territory_name,
                                            (select division_name from tbl_division where id_division=tehp.id_division) as division_name,
                                            (select outlet_name from tbl_outlet where id_outlet=tohc.id_outlet) as outlet_name,
                                            (select branch_address from tbl_outlet_has_branch where id_outlet_has_branch=tohc.id_outlet_has_branch) as branch_address,
                                            tso.sales_order_code,tso.sales_order_remark,
                                            (SELECT  SUM(product_price * product_qty) as total FROM tbl_sales_order_products WHERE id_sales_order=tso.id_sales_order GROUP BY id_sales_order) as salesordertotal,
                                            (SELECT  SUM(`tbl_return_note_product`.`return_price`*`tbl_return_note_product`.`return_product_qty`) as returntotal FROM `tbl_return_note`, `tbl_return_note_product` WHERE `tbl_return_note`.`id_sales_order`=tso.id_sales_order AND `tbl_return_note`.`id_return_note`=`tbl_return_note_product`.`id_return_note` GROUP BY `tbl_return_note`.`id_sales_order`) as returnproducttotal
                                            FROM tbl_sales_order tso
                                            inner join tbl_employee_has_place tehp ON tso.id_employee_has_place=tehp.id_employee_has_place
                                            inner join tbl_outlet_has_branch tohc ON tso.id_outlet_has_branch=tohc.id_outlet_has_branch 
INNER JOIN tbl_invoice ti ON ti.id_sales_order=tso.id_sales_order INNER JOIN tbl_credit_payment tc ON tc.id_sales_order  = tso.id_sales_order                                           
where {$append} tehp.id_employee LIKE '$employee_id%'
                                            AND tehp.id_physical_place LIKE '$id_physical_place%'
                                            AND tehp.id_territory LIKE '%' AND tehp.id_division LIKE '%' AND tohc.id_outlet LIKE '%' AND tohc.id_outlet_has_branch LIKE '%'
                                            AND tso.sales_order_status='$sales_order_status' GROUP BY tso.id_sales_order ORDER BY tso.id_sales_order DESC";
            $result = $this->db->mod_select($sql);

            array_push($allSalesOrders_Array, $result);
        }
        return $allSalesOrders_Array;
    }

    public function getSalesOrderProduct($id) {
        $sql1 = "SELECT tso.id_sales_order,(select (select product_price from tbl_item where id_item=tp.iditem) as item_name from tbl_products tp where id_products=tso.id_products) as pr_price,(select (select item_name from tbl_item where
            id_item=tp.iditem) as item_name from tbl_products tp where id_products=tso.id_products) as 
            item_name,(select (select item_account_code from tbl_item where
            id_item=tp.iditem) as item_account_code from tbl_products tp where id_products=tso.id_products) as 
            item_account_code,tso.product_qty,tso.product_price,tso.free_qty,tso.discount FROM tbl_sales_order_products tso 
            where tso.id_sales_order=$id AND tso.sales_order_products_status=1 and tso.product_price != '0'";

        $result1 = $this->db->mod_select($sql1);
        return $result1;
    }

    public function getMarketReturnsDetails($coulmn) {
        $sql = "SELECT tbl_item.item_account_code,tbl_return_note_product.return_remaks,tbl_products.product_price,tbl_return_note.id_sales_order,tbl_return_note_product.id_return_note_product , tbl_item.item_name 
            ,tbl_return_note_product.return_price , tbl_return_note_product.return_product_qty,tbl_return_note_product.discount 
            FROM tbl_return_note_product tbl_return_note_product INNER JOIN tbl_return_note tbl_return_note ON tbl_return_note.id_return_note = tbl_return_note_product.id_return_note 
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products 
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_return_note.id_sales_order =:id_sales_order AND tbl_return_note_product.id_return_type =:id_return_type AND tbl_return_note.return_note_status=:return_note_status";
        return $result1 = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getSalesReturnsDetails($coulmn) {
        $sql = "SELECT tbl_item.item_account_code,tbl_products.product_price,tbl_return_note.id_sales_order,tbl_return_note_product.id_return_note_product , tbl_item.item_name 
            ,tbl_return_note_product.return_price , tbl_return_note_product.return_product_qty,tbl_return_note_product.discount,tbl_return_note_product.return_price 
            FROM tbl_return_note_product tbl_return_note_product INNER JOIN tbl_return_note tbl_return_note ON tbl_return_note.id_return_note = tbl_return_note_product.id_return_note 
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products 
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_return_note.id_sales_order =:id_sales_order AND tbl_return_note_product.id_return_type =:id_return_type AND tbl_return_note.return_note_status=:return_note_status";
        return $result1 = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getSalesAmount($id) {
        $sql = "SELECT SUM((tso.product_qty * tso.product_price)) as total,tso.id_sales_order,(select (select item_name from tbl_item where
            id_item=tp.iditem) as item_name from tbl_products tp where id_products=tso.id_products) as 
            item_name,tso.product_qty,tso.product_price,tso.free_qty,tso.discount FROM tbl_sales_order_products tso 
            where tso.id_sales_order='$id' AND tso.sales_order_products_status='1'";
        return $result1 = $this->db->mod_select($sql);
    }

    public function getMarkeReturntAmount($coulmn) {
        $sql = "SELECT SUM((tbl_return_note_product.return_price * tbl_return_note_product.return_product_qty)) as total
                FROM tbl_return_note_product tbl_return_note_product INNER JOIN tbl_return_note tbl_return_note ON tbl_return_note.id_return_note = tbl_return_note_product.id_return_note 
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products 
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_return_note.id_sales_order =:id_sales_order AND tbl_return_note_product.id_return_type =:id_return_type AND tbl_return_note.return_note_status=:return_note_status";
        return $result1 = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getSalesRetturnAmount($coulmn) {
        $sql = "SELECT SUM((tbl_return_note_product.return_price * tbl_return_note_product.return_product_qty)) as total
                FROM tbl_return_note_product tbl_return_note_product INNER JOIN tbl_return_note tbl_return_note ON tbl_return_note.id_return_note = tbl_return_note_product.id_return_note 
            INNER JOIN tbl_products tbl_products ON tbl_products.id_products = tbl_return_note_product.id_products 
            INNER JOIN tbl_item tbl_item ON tbl_item.id_item = tbl_products.iditem WHERE tbl_return_note.id_sales_order =:id_sales_order AND tbl_return_note_product.id_return_type =:id_return_type AND tbl_return_note.return_note_status=:return_note_status";
        return $result1 = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getOutletDetails($coulmn) {
        $sql = "SELECT tbl_sales_order.added_time,tbl_territory.territory_name,tbl_sales_order.added_date,tbl_outlet_category.outlet_category_name 
            ,tbl_outlet_has_branch.branch_address ,tbl_outlet.outlet_name ,tbl_outlet_has_branch.branch_telephone 
            ,tbl_outlet_has_branch.branch_contact_person_designation FROM tbl_sales_order tbl_sales_order 
            INNER JOIN tbl_outlet_has_branch tbl_outlet_has_branch ON tbl_outlet_has_branch.id_outlet_has_branch = tbl_sales_order.id_outlet_has_branch 
            INNER JOIN tbl_outlet tbl_outlet ON tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet 
            INNER JOIN tbl_outlet_category tbl_outlet_category ON tbl_outlet_category.id_outlet_category = tbl_outlet.id_outlet_category INNER JOIN tbl_territory tbl_territory ON tbl_territory.id_territory = tbl_outlet_has_branch.id_territory  
            WHERE tbl_sales_order.id_sales_order =:id_sales_order AND tbl_outlet_has_branch.outlet_has_branch_status=:outlet_has_branch_status";
        return $result1 = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getSalesOrderfreeItemProduct($id) {
        $sql1 = "SELECT tso.id_sales_order,(select (select product_price from tbl_item where id_item=tp.iditem) as item_name from tbl_products tp where id_products=tso.id_products) as pr_price,(select (select item_name from tbl_item where
            id_item=tp.iditem) as item_name from tbl_products tp where id_products=tso.id_products) as 
            item_name,(select (select item_account_code from tbl_item where
            id_item=tp.iditem) as item_account_code from tbl_products tp where id_products=tso.id_products) as 
            item_account_code,tso.product_qty,tso.product_price,tso.free_qty,tso.discount FROM tbl_sales_order_products tso 
            where tso.id_sales_order=$id AND tso.sales_order_products_status=1 and tso.product_price='0' and tso.type_sale='Free Issues' ";

        $result1 = $this->db->mod_select($sql1);
        return $result1;
    }

    /**
     * Function deleteSalesOrder
     *
     * 
     *
     * @param no
     * @return no
     */
    function deleteSalesOrder($id) {


        $data = array(
            "sales_order_status" => 0
        );
        $where = array(
            "id_sales_order" => $id
        );
        $this->db->__beginTransaction();
        $this->db->update("tbl_sales_order", $data, $where);
        $sql = "SELECT id_return_note FROM tbl_return_note WHERE id_sales_order=:id_sales_order";
        $mode_select = $this->db->mod_select($sql, $where, PDO::FETCH_ASSOC);
        if (count($mode_select) > 0) {
            foreach ($mode_select as $value) {
                $data_retun = array(
                    "return_note_status" => 0
                );

                $where_retun = array(
                    "id_return_note" => $value['id_return_note']
                );

                $this->db->update("tbl_return_note", $data_retun, $where_retun);
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getTerritory12($division_id, $id_employee) {
        $sql = "SELECT tmp.id_territory  as id_territory,(select territory_name from tbl_territory where id_territory=tmp.id_territory) as territory_name FROM tbl_employee_has_place tmp inner join tbl_territory tt ON tmp.id_territory=tt.id_territory where tmp.id_division=$division_id AND tmp.id_employee=$id_employee AND tt.territory_status=1 GROUP BY tmp.id_territory";
        $result = $this->db->mod_select($sql);

        return $result;
    }

    public function getFreeItem1($dataset) {
        $item_id = $dataset['item_id'];
        $item_qty = $dataset['item_qty'];

        $assort_free_set = "SELECT id_assort_free FROM tbl_assort_item where iditem=$item_id;";
        $result = $this->db->mod_select($assort_free_set);

        //$assort_free_set_arry = array();
        $count3 = 0.00;
        $freeItemQty = '';
        foreach ($result as $value1) {
            $id_assort_free = $value1->id_assort_free;
            //array_push($assort_free_set_arry, $id_assort_free);

            $assort_qty_set = "SELECT assort_qty FROM tbl_assort_free where id_assort_free=$id_assort_free";
            $result2 = $this->db->mod_select($assort_qty_set);

            $AllDataArray = array();
            foreach ($result2 as $value2) {
                $assort_qty = $value2->assort_qty;
                if ($assort_qty <= $item_qty) {
                    $count1 = ($item_qty / $assort_qty);
                    $count2 = explode(".", $count1);
                    $count3 = $count2[0];

                    $itemcount = 0.00;
                    $query = "SELECT sum(t.qty) as qty,(select item_name from tbl_item where id_item=t.id_item)as item_name,t.id_item as id_item FROM tbl_assort_item_issue t where t.id_assort_free=$id_assort_free";
                    $freeItemQty = $this->db->mod_select($query);
                    $Id_item = $freeItemQty[0]->id_item;
                    $Qty = $freeItemQty[0]->qty;
                    $Item_name = $freeItemQty[0]->item_name;

                    for ($i = 1; $i <= $count3; $i++) {

                        $itemcount = $Qty + $itemcount;
                    }
                    $itemArray = array('id_item' => $Id_item, 'item_name' => $Item_name, 'itemcount' => $itemcount);
                    array_push($AllDataArray, $itemArray);
                }
            }
        }
        return $AllDataArray;
    }

    function invoiceSalesOrder($Id_sales_Order) {
        // $date = new DateTime();
        $invoice_no = $this->get_Autogen_ID34($Id_sales_Order);

        $data = array(
            "invoice_no" => $invoice_no,
            "id_sales_order" => $Id_sales_Order,
            "invoice_status" => 1,
            "added_date" => date('Y:m:d'),
            "added_time" => date('H:i:s')
        );

        $this->db->__beginTransaction();
        $this->db->insertData("tbl_invoice", $data);

        $this->db->__endTransaction();



        return $this->db->status();
    }

    public function get_Autogen_ID3() {
        $result = $this->db->mod_select("SELECT MAX(id_invoice) As id FROM tbl_invoice");
        $num_rows = $result[0]->id;
        if ($num_rows == 0) {
            return "IN0001";
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return "IN000" . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return "IN00" . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return "IN0" . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return "IN" . $num_rows;
            }
        }
    }

    public function get_Autogen_ID34($salesid) {
        //$result = $this->db->mod_select("SELECT MAX(id_invoice) As id FROM tbl_invoice");
        $result_ter = $this->db->mod_select("SELECT territory_name FROM tbl_territory 
            WHERE id_territory=(SELECT id_territory 
            FROM tbl_employee_has_place 
            WHERE id_employee_has_place=(SELECT id_employee_has_place FROM tbl_sales_order 
            WHERE id_sales_order='$salesid' LIMIT 1) LIMIT 1)");
        //print_r($result_ter);
        $sql1 = "SELECT COUNT(tbl_sales_order.id_employee_has_place) as user_count 
            FROM tbl_sales_order 
            tbl_sales_order INNER JOIN tbl_invoice tbl_invoice 
            ON tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order  
            WHERE tbl_sales_order.id_employee_has_place=(SELECT id_employee_has_place
            FROM tbl_sales_order 
            WHERE `id_sales_order`='$salesid' LIMIT 1) AND tbl_sales_order.sales_order_status=1";

        $mod_select1 = $this->db->mod_select($sql1);
        //print_r($result_ter);

        $num_rows = $mod_select1[0]->user_count;
        if ($num_rows == 0) {
            return $result_ter[0]->territory_name;
        } else {
            if ($num_rows >= 1 && $num_rows < 10) {
                return $result_ter[0]->territory_name . " / " . " INV " . $num_rows;
            } else if ($num_rows >= 10 && $num_rows < 100) {
                return $result_ter[0]->territory_name . " / " . " INV " . $num_rows;
            } else if ($num_rows >= 100 && $num_rows < 1000) {
                return $result_ter[0]->territory_name . " / " . " INV " . $num_rows;
            } else if ($num_rows >= 1000 && $num_rows < 10000) {
                return $result_ter[0]->territory_name . " / " . " INV " . $num_rows;
            }
        }
    }

    //------------------------------------------------------ pdf -----------------------------------------------------------------

    public function salesOrderDetails($param) {
        $sql = "select 
    tbl_sales_order_products.id_products,
    tbl_sales_order.id_sales_order,
    tbl_item.item_name,
	tbl_item.item_no,
	tbl_sales_order_products.free_qty,
	tbl_sales_order_products.discount,
    tbl_sales_order_products.product_price,
    tbl_sales_order_products.product_qty,
    sum((tbl_sales_order_products.product_price * tbl_sales_order_products.product_qty)-tbl_sales_order_products.discount) as amount
from
    tbl_sales_order_products,
    tbl_sales_order,
    tbl_products,
    tbl_item
where
    tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order
        and tbl_sales_order_products.id_products = tbl_products.id_products
        and tbl_products.iditem = tbl_item.id_item
        and tbl_sales_order.id_sales_order = '$param'
group by tbl_sales_order_products.id_products";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function marketReturns($param) {
        $sql = "select 
    tbl_return_note_product.id_products,
    tbl_sales_order.id_sales_order,
	tbl_item.item_no,
    tbl_item.item_name,
    tbl_return_note_product.return_price,
    tbl_return_note_product.return_product_qty,
    sum(tbl_return_note_product.return_price * tbl_return_note_product.return_product_qty) as amount
from
    tbl_return_note,
	tbl_return_note_product,
    tbl_sales_order,
    tbl_products,
    tbl_item
where
    tbl_sales_order.id_sales_order = tbl_return_note.id_sales_order
and tbl_return_note.id_return_note = tbl_return_note_product.id_return_note
        and tbl_return_note_product.id_products = tbl_products.id_products
        and tbl_products.iditem = tbl_item.id_item
        and tbl_sales_order.id_sales_order = '$param' and tbl_return_note_product.id_return_type='2'
group by tbl_return_note_product.id_products";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function salesReturns($param) {
        $sql = "select 
    tbl_return_note_product.id_products,
    tbl_sales_order.id_sales_order,
	tbl_item.item_no,
    tbl_item.item_name,
    tbl_return_note_product.return_price,
    tbl_return_note_product.return_product_qty,
    sum(tbl_return_note_product.return_price * tbl_return_note_product.return_product_qty) as amount
from
    tbl_return_note,
	tbl_return_note_product,
    tbl_sales_order,
    tbl_products,
    tbl_item
where
    tbl_sales_order.id_sales_order = tbl_return_note.id_sales_order
and tbl_return_note.id_return_note = tbl_return_note_product.id_return_note
        and tbl_return_note_product.id_products = tbl_products.id_products
        and tbl_products.iditem = tbl_item.id_item
        and tbl_sales_order.id_sales_order = '$param' and tbl_return_note_product.id_return_type='1'
group by tbl_return_note_product.id_products";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function invoiceSalesRefOutletDetails($param) {
        $sql = "select temptable.invoice_no,
temptable.id_sales_order,
temptable.added_date,
temptable.full_name,
temptable.branch_contact_person,
temptable.outlet_name,
temptable.branch_address,
        temptable.branch_telephone
from
(SELECT 
    tbl_invoice.invoice_no,
	tbl_sales_order.id_sales_order,
	tbl_invoice.added_date,
	concat(tbl_employee.employee_first_name,' ',tbl_employee.employee_last_name) as full_name,
	tbl_outlet_has_branch.branch_contact_person,
	tbl_outlet.outlet_name,
        tbl_outlet_has_branch.branch_address,
        tbl_outlet_has_branch.branch_telephone
FROM
    tbl_invoice,
    tbl_sales_order,
    tbl_employee_has_place,
	tbl_employee,
	tbl_outlet_has_branch,
	tbl_outlet
where tbl_invoice.id_sales_order = tbl_sales_order.id_sales_order
	and tbl_sales_order.id_employee_has_place = tbl_employee_has_place.id_employee_has_place
	and tbl_employee_has_place.id_employee = tbl_employee.id_employee
	and tbl_sales_order.id_outlet_has_branch = tbl_outlet_has_branch.id_outlet_has_branch
	and tbl_outlet.id_outlet = tbl_outlet_has_branch.id_outlet group by tbl_invoice.id_invoice) temptable
where temptable.id_sales_order = '$param'";

        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function paymentDetails($param) {
        $sql = "SELECT 
id_sales_order,    
payment_type,
    payment_amount,
    cheque_bank,
    cheque_no,
    cheque_date,
    credit_date,
	credit_payment,
	chequepayment,
	cheque_date
FROM
    tbl_payment_remark where id_sales_order='$param'";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    ////////////// ter

    public function getterdata($q, $select) {
        $sql = "SELECT id_territory,territory_name FROM `tbl_territory` WHERE id_territory_type ='3' AND territory_name LIKE '$q%'";
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

    public function addTaget2($dataarray) {

        $this->db->__beginTransaction();
        $this->db->insert('tbl_terotery_wise_target', $dataarray);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function addTaget23($dataarray) {

        $this->db->__beginTransaction();
        $this->db->insert('tbl_employye_wise_target', $dataarray);
        $this->db->__endTransaction();
        return $this->db->status();
    }

    public function getProductbysalesorder($id_sales_order) {
        $coulmn = array('id_sales_order' => $id_sales_order);
        $sql = "SELECT tbl_sales_order_products.id_products ,tbl_sales_order_products.product_qty  FROM tbl_sales_order_products 
            INNER JOIN tbl_sales_order tbl_sales_order 
            ON tbl_sales_order.id_sales_order = tbl_sales_order_products.id_sales_order 
            WHERE tbl_sales_order.id_sales_order=:id_sales_order";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getphysicalplace($id_sales_order) {
        $coulmn = array('id_sales_order' => $id_sales_order);
        $sql = "SELECT id_store FROM tbl_store WHERE id_physical_place=(SELECT id_physical_place 
            FROM tbl_employee_has_place WHERE id_employee_has_place=(SELECT id_employee_has_place 
            FROM tbl_sales_order WHERE id_sales_order=:id_sales_order LIMIT 1)) LIMIT 1";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    public function getProductbysalesorderreturn($id_sales_order) {
        $coulmn = array('id_sales_order' => $id_sales_order);
        $sql = "SELECT tbl_return_note_product.id_products,tbl_return_note_product.return_product_qty
            FROM tbl_return_note tbl_return_note 
            INNER JOIN tbl_return_note_product tbl_return_note_product ON tbl_return_note_product.id_return_note = tbl_return_note.id_return_note 
            WHERE tbl_return_note_product.id_return_type='1' AND tbl_return_note.id_sales_order=:id_sales_order";
        return $result = $this->db->mod_select($sql, $coulmn, PDO::FETCH_ASSOC);
    }

    /*
     * get_current_stock
     */


    /*
     * @Refe Add Sales Order
     * @author Faazi ahamed 
     * @contact faaziahamed@gmail.com
     * @LastUpdate 23/06/2014
     */

    public function get_current_stock($employehasplace_id, $product_id) {
        $ststaus = array('employee_has_place_status' => 1);
        $sql_data = "SELECT id_physical_place  FROM tbl_employee_has_place WHERE id_employee='$employehasplace_id' AND employee_has_place_status=:employee_has_place_status";
        $mod_select = $this->db->mod_select($sql_data, $ststaus, PDO::FETCH_ASSOC);

        $column = array('stock_status' => 1, 'id_physical_place' => $mod_select[0]['id_physical_place'], 'id_products' => $product_id);
//        $sql = "SELECT qty FROM tbl_stock WHERE id_products=:id_products AND id_store=(SELECT id_store FROM tbl_store WHERE id_physical_place=(SELECT id_physical_place FROM tbl_employee_has_place WHERE id_employee_has_place=:id_employee_has_place)) AND stock_status=:stock_status LIMIT 1";

        $sql = "SELECT qty FROM tbl_stock,(SELECT id_store FROM tbl_store WHERE id_physical_place =:id_physical_place) as stores WHERE id_products =:id_products AND stock_status =:stock_status and tbl_stock.id_store = stores.id_store LIMIT 1";

        return $this->db->mod_select($sql, $column, PDO::FETCH_ASSOC);
    }

    public function getEmployeNames($q, $select, $Emp_Hapls_id) {

        $sql = "SELECT CONCAT(tem.employee_first_name ,' ', tem.employee_last_name) as fullname ,tbemp.id_employee_has_place  FROM tbl_employee_has_place tbemp INNER JOIN tbl_employee tem ON tbemp.id_employee = tem.id_employee  INNER JOIN tbl_employee_type tbety ON tbety.id_employee_type = tem.id_employee_type WHERE tbety.id_employee_type=3 AND tbemp.id_physical_place=(SELECT id_physical_place  FROM tbl_employee_has_place WHERE id_employee_has_place='$Emp_Hapls_id' AND employee_has_place_status=1 LIMIT 1) AND tem.employee_first_name LIKE '%$q%'";

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
	    public function getSalesOrderWarrentyItemProduct($id) {
        $sql="SELECT tso.id_sales_order,(select (select product_price from tbl_item where id_item=tp.iditem) as item_name from tbl_products tp where id_products=tso.id_products) as pr_price,(select (select item_name from tbl_item where
            id_item=tp.iditem) as item_name from tbl_products tp where id_products=tso.id_products) as 
            item_name,(select (select item_account_code from tbl_item where
            id_item=tp.iditem) as item_account_code from tbl_products tp where id_products=tso.id_products) as 
            item_account_code,tso.product_qty,tso.product_price,tso.free_qty,tso.discount FROM tbl_sales_order_products tso 
            where tso.id_sales_order=$id AND tso.sales_order_products_status=1 and tso.product_price='0'  and tso.type_sale='Warrenty'";
        return $this->db->mod_select($sql);
    }

}

?>

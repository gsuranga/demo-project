<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of return_note_model
 *
 * @author Thilina
 */
class return_note_model extends C_Model {

    public function getEmployee1($q, $select) {
        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');
        if($userdata =='Distributor'){
            $append .=" and tbl_employee_has_place.id_physical_place=$id_physical_place ";
        }
        if($userdata =='Sales Rep'){
            $append .=" and tbl_employee_has_place.id_employee_has_place=$id_employeeHas";
        }
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
     employee_status = 1 AND tbl_employee.employee_status = 1 AND tbl_employee_has_place.employee_has_place_status = 1 
    and tbl_user_type.user_type in ('Distributor','Sales Rep') 
AND CONCAT(tbl_employee.employee_first_name,
            ' ',
            tbl_employee.employee_last_name) LIKE '%$q%'
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

    public function getTerritory12($division_id, $id_employee) {
        $sql = "SELECT tmp.id_territory  as id_territory,(select territory_name from tbl_territory where id_territory=tmp.id_territory) as territory_name FROM tbl_employee_has_place tmp inner join tbl_territory tt ON tmp.id_territory=tt.id_territory where tmp.id_division=$division_id AND tmp.id_employee=$id_employee AND tt.territory_status=1 GROUP BY tmp.id_territory";
        $result = $this->db->mod_select($sql);

        return $result;
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

    public function getBranch1($id_outlet) {
        $sql1 = "SELECT id_outlet_has_branch,branch_address FROM tbl_outlet_has_branch t where t.id_outlet=$id_outlet GROUP BY t.branch_address";
        $result1 = $this->db->mod_select($sql1);
        return $result1;
    }

    public function getDiscount($dataset) {

        $id_outlet = $dataset['outlet_name'];
        $id_territory = $dataset['territory_name'];
        $sql = "SELECT t.price_discount as price_discount,t.percentage_discount as percentage_discount
FROM tbl_outlet_has_branch t WHERE t.id_territory=$id_territory AND t.id_outlet=$id_outlet AND outlet_has_branch_status=1";

        $result = $this->db->mod_select($sql);
        return $result;
    }

    public function getInvoised() {
        $userdata = $this->session->userdata('user_type');
        $id_physical_place = $this->session->userdata('id_physical_place');
        $id_employeeHas = $this->session->userdata('id_employee_has_place');

        if($userdata =='Sales Rep'){

        }

        if (isset($_POST['outletid']) && $_POST['outletid'] != '') {

            $outId = $_REQUEST['outletid'];
            $append .=" and so.id_outlet_has_branch=$outId";
        }
        if (isset($_POST['from']) && $_POST['from'] != '' && $_POST['to'] != '') {

            $from = $_REQUEST['from'];
            $to = $_REQUEST['to'];
            $append1 .=" and ti.added_date between '$from' and '$to'";
        }
        if($userdata =='Distributor'){
            $append1 .=" and ehp.id_physical_place=$id_physical_place ";
            $sql = "select 
    ti.id_invoice, ti.invoice_no, so.id_sales_order 
from 
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order 
     inner join
    tbl_employee_has_place ehp ON so.id_employee_has_place = ehp.id_employee_has_place 
 where  
so.sales_order_status=1
and ti.invoice_status=1 
{$append1} 
 order by id_invoice desc";
             
        } elseif($userdata =='Sales Rep') {
            $append1 .=" and ehp.id_employee_has_place=$id_employeeHas";       
             $sql = "select 
    ti.id_invoice, ti.invoice_no, so.id_sales_order 
from 
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order 
     inner join
    tbl_employee_has_place ehp ON so.id_employee_has_place = ehp.id_employee_has_place 
 where  
so.sales_order_status=1
and ti.invoice_status=1 
{$append1} 
 order by id_invoice desc";
             
        }  else {
            $sql = "select 
    ti.id_invoice, ti.invoice_no, so.id_sales_order 
from 
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order 
     inner join
    tbl_employee_has_place ehp ON so.id_employee_has_place = ehp.id_employee_has_place 
 where  
so.sales_order_status=1
and ti.invoice_status=1 
{$append} {$append1}
 order by id_invoice desc"; 
        }
        $result = $this->db->mod_select($sql);
        return $result;
    }

    function show_invoice() {
        $InvoieceId = $_POST['InvoieceId'];
        $sql = "select 
    ti.id_invoice,
    ti.invoice_no,
    so.id_sales_order,
    tp.id_products,
    tm.item_name,
    tm.item_account_code,
    (sop.product_qty) as qty,
    sop.product_price,
    ifnull((select 
            rnp.return_product_qty
        from
            tbl_return_note_product rnp
                inner join
            tbl_return_note rn ON rnp.id_return_note = rn.id_return_note
        where
            rnp.id_products = tp.id_products
and rn.id_sales_order=so.id_sales_order ),0) as re_qty
from
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order
        inner join
    tbl_sales_order_products sop ON so.id_sales_order = sop.id_sales_order
        inner join
    tbl_products tp ON sop.id_products = tp.id_products
        inner join
    tbl_item tm ON tp.iditem = tm.id_item
where
    so.sales_order_status = 1
        and ti.invoice_status = 1
       and sop.sales_order_products_status=1
       and ti.id_invoice=$InvoieceId 
order by id_invoice desc";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    function get_rType() {
        $sql = "select 
   rt.id_return_type,
	rt.return_type
from
    tbl_return_type rt
where
rt.return_type_status=1
and rt.id_return_type not in(3)
";
        $result = $this->db->mod_select($sql);
        return $result;
    }

    function insert_return_note() {
        $invoiced_id = $_POST['InvoiecId'];
        $sql = "select 
so.id_sales_order,
so.id_employee_has_place,
so.id_outlet_has_branch
from
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order
where
    so.sales_order_status = 1
        and ti.invoice_status = 1
and ti.id_invoice=$invoiced_id
";
        $result = $this->db->mod_select($sql);
        foreach ($result as $value) {
            $saleorder_id = $value->id_sales_order;
            $employee_has_place = $value->id_employee_has_place;
            $id_soutlet_has_branch = $value->id_outlet_has_branch;
        }
        $saleorder_id;

        $return_note = array(
            'id_employee_has_place' => $employee_has_place,
            'id_outlet_has_branch' => $id_soutlet_has_branch,
            'id_sales_order' => $saleorder_id,
            'return_note_status' => '1',
            'added_date' => date('Y:m:d'),
            'added_time' => date('H:i:s')
        );
//        print_r($return_note);      
     $this->db->insertData("tbl_return_note", $return_note);
      $return_note_id = $this->db->insertId();
       echo $count = $_REQUEST['raw_count'];
        $this->db->__beginTransaction();
        for ($i = 1; $i < $count+1; $i++) {
            echo $i;
//            
            $p_price = $_REQUEST['return_qty_' . $i];
            if ($p_price != 0) {
                
                 $return_note_product = array(
                    'id_return_note' => $return_note_id,
                    'id_return_type' => $_REQUEST['r_type_' . $i],
                    'id_products' => $_REQUEST['id_product_' . $i],
                    'return_price' => $_REQUEST['product_price_' . $i],
                    'return_product_qty' => $_REQUEST['return_qty_' . $i],
                    'return_product_status' => '1',
                    'discount' => '0',
                    'added_date' => date('Y:m:d'),
                    'added_time' => date('H:i:s'),
                    'return_remaks' => $_REQUEST['remarks_' . $i]
                );
                print_r($return_note_product);
               
                $this->db->insertData("tbl_return_note_product", $return_note_product);
//                return $this->db->status();
                

                if ($_REQUEST['r_type_' . $i] == 1) {
                    $sql = "select 
    ts.qty, ts.id_products,ts.id_store
from
    tbl_stock ts
        inner join
    tbl_store tsr ON ts.id_store = tsr.id_store
        inner join
    tbl_physical_place phy ON tsr.id_physical_place = phy.id_physical_place
        inner join
    tbl_employee_has_place ehp ON phy.id_physical_place = ehp.id_physical_place
where
    ts.stock_status = 1
        and ts.id_products = {$_REQUEST['id_product_' . $i]}
and ehp.id_employee_has_place=$employee_has_place";
                    $qty = $this->db->mod_select($sql);
                    foreach ($qty as $data) {
                        echo $available_qty = $data->qty;
                        echo $store = $data->id_store;
                    }
                    $update_stock = array(
                        "qty" => $available_qty + $_REQUEST['return_qty_' . $i]
                    );
                    $where = array(
                        "id_store" => $store,
                        "id_products" => $_REQUEST['id_product_' . $i]
                    );
                    $this->db->update("tbl_stock", $update_stock, $where);
                }





               
//                $this->db->__endTransaction();
                
            }
        }
        $this->db->__endTransaction();
        return $this->db->status();
    }
    
    function previouse_return(){
        $product_id=$_REQUEST['id_product'];
        $id_invoiced=$_REQUEST['id_invoiced'];
        $sql="select 

    round(ifnull(sum(rnp.return_product_qty),0),0)as qty
from
    tbl_invoice ti
        inner join
    tbl_sales_order so ON ti.id_sales_order = so.id_sales_order
        inner join
    tbl_return_note rn ON so.id_sales_order = rn.id_sales_order
        inner join
    tbl_return_note_product rnp ON rn.id_return_note = rnp.id_return_note
where
    rn.return_note_status = 1
        and rnp.return_product_status = 1
        and so.sales_order_status = 1
and ti.id_invoice='$id_invoiced'
and rnp.id_products='$product_id'";
        return $this->db->mod_select($sql);
    }
    
    public function search_returns() {
        $sql="select 
    so.id_sales_order,
    rn.id_return_note,
    tot.outlet_name,
    ti.invoice_no,
    (select 
            sum(rnp.return_price * rnp.return_product_qty)
        from
            tbl_return_note_product rnp
        where
            rn.id_return_note = rnp.id_return_note
                and rnp.return_product_status = 1) as tot,
    rn.added_date,
    rn.added_time
from
    tbl_return_note rn
        inner join
    tbl_sales_order so ON rn.id_sales_order = so.id_sales_order
        inner join
    tbl_outlet_has_branch ohb ON so.id_outlet_has_branch = ohb.id_outlet_has_branch
        inner join
    tbl_outlet tot ON ohb.id_outlet = tot.id_outlet
        inner join
    tbl_invoice ti ON so.id_sales_order = ti.id_sales_order
where
    rn.return_note_status = 1
        and so.sales_order_status = 1 order by rn.id_return_note desc ";
        $this->db->mod_select($sql);
    }
    
    public function show_details(){
          $invoice_id=$_REQUEST['InvoieceId'];
        $sql="select 
    tin.added_date as in_date,
    tin.added_time as in_time,
    so.id_sales_order,
    so.added_date as sales_date,
    so.added_time as sales_time,
    concat(em.employee_first_name,
            ' ',
            em.employee_last_name) as full_name,
tout.outlet_name,
tt.territory_name

from
    tbl_invoice tin
        inner join
    tbl_sales_order so ON tin.id_sales_order = so.id_sales_order
        inner join
    tbl_employee_has_place ehp ON so.id_employee_has_place = ehp.id_employee_has_place
        inner join
    tbl_employee em ON ehp.id_employee = em.id_employee
        inner join
    tbl_outlet_has_branch outb ON so.id_outlet_has_branch = outb.id_outlet_has_branch
        inner join
    tbl_outlet tout ON outb.id_outlet = tout.id_outlet
    inner join
    tbl_territory tt ON outb.id_territory = tt.id_territory
where
    tin.invoice_status = 1
        and tin.id_invoice = '$invoice_id'
        and so.sales_order_status = 1";
       return $this->db->mod_select($sql);
      
    }

}

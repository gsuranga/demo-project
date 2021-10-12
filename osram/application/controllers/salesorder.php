	<?php

/**
 * Description of salesorder
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class salesorder extends C_Controller {

    private $resours = array(
        'JS' => array('salesorder/js/salesorder'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function drawIndexSalesOrder
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexSalesOrder() {
        $this->template->attach($this->resours);
        $this->template->draw('salesorder/indexSalesOrder', true);
    }

    /**
     * Function drawindexSearchSalesOrder
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawindexSearchSalesOrder() {
        $this->template->attach($this->resours);
        $this->template->draw('salesorder/indexSearchSalesOrder', true);
    }
    
    public function create_invoices(){
        $this->load->model('salesorder/salesorder_model');
        $this->salesorder_model->create_invoices();
    }

    /**
     * Function drawindexSearchSalesOrder
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawindexSalesorderproductView() {
        $this->template->attach($this->resours);
        $this->template->draw('salesorder/indexSalesorderproductView', true);
    }

    function drawAddSalesOrder() {
        $this->template->attach($this->resours);
        $this->template->draw('salesorder/addSalesOrder', false);
    }

    public function getProduct() {
        $q = strtolower($_GET['term']);
        $this->load->model('salesorder/salesorder_model');
        $column = array('item_name', 'id_products', 'product_price', 'iditem','item_account_code');
        $result = $this->salesorder_model->getProduct1($q, $column);
        echo json_encode($result);
    }

    public function getEmployee() {
        $q = strtolower($_GET['term']);
        $this->load->model('salesorder/salesorder_model');
        $column = array('full_name', 'id_employee_has_place', 'id_employee');
        $result = $this->salesorder_model->getEmployee1($q, $column);
        $no_result = array("labal" => "no result found");
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getDivision() {
        $q = strtolower($_GET['term']);
        $employee_id = $_GET['employee_id'];
        $this->load->model('salesorder/salesorder_model');
        $column = array('division_name', 'id_division');
        $result = $this->salesorder_model->getDivision1($q, $column, $employee_id);
        echo json_encode($result);
    }
     public function getEmployeeNames() {
        $Emp_Hapls_id = $this->input->get('hiddenHS_Pls_ID');
        $q = strtolower($_GET['term']);
        $this->load->model('salesorder/salesorder_model');
        $column = array('fullname', 'id_employee_has_place');
        $result = $this->salesorder_model->getEmployeNames($q, $column, $Emp_Hapls_id);
        echo json_encode($result);
    }

    /**
     * Function getDiscount
     *
     * 
     *
     * @param no
     * @return no
     */
    function getDiscount() {
        $this->load->model('salesorder/salesorder_model');
        $fetchDiscount = $this->salesorder_model->getDiscount($this->input->post());

        foreach ($fetchDiscount as $data) {
            echo $data->price_discount . '`' . $data->percentage_discount;
        }
    }

    /*     * drawindexSalesorderproductView
     * Function allDivisionCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */

    function allDivisionCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllDivision = $this->salesorder_model->getDivision1($this->input->post('empid'));

        foreach ($fetchAllDivision as $data) {
            echo "<option value='$data->id_division'>$data->division_name</option>";
        }
    }

    /**
     * Function allTerritoryCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allTerritoryCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllterritory = $this->salesorder_model->getTerritory12($this->input->post('division_name'), $this->input->post('empid'));

        foreach ($fetchAllterritory as $value) {
            echo "<option value='$value->id_territory'>$value->territory_name</option>";
        }
    }

    /**
     * Function allPhysicalPlaceCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allPhysicalPlaceCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllPhysicalPlace = $this->salesorder_model->getPhysicalPlace1($this->input->post('division_name'), $this->input->post('empid'), $this->input->post('territory_name'));

        foreach ($fetchAllPhysicalPlace as $data) {
            foreach ($data as $value) {
                echo "<option value='$value->id_physical_place'>$value->physical_place_name</option>";
            }
        }
    }

    /**
     * Function allOutletCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allOutletCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllOutlet = $this->salesorder_model->getOutlet1($this->input->post('territory_name'));

        foreach ($fetchAllOutlet as $data) {
            foreach ($data as $value) {
                echo "<option value='$value->id_outlet'>$value->outlet_name</option>";
            }
        }
    }

    /**
     * Function allBranchCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allBranchCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllBranch = $this->salesorder_model->getBranch1($this->input->post('outlet_name'));

        foreach ($fetchAllBranch as $value) {
            echo "<option value='$value->id_outlet_has_branch'>$value->branch_address</option>";
        }
    }

    /**
     * Function getEmployeHasPlaceID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function getEmployeHasPlaceID() {
        $this->load->model('salesorder/salesorder_model');
        $frechData = $this->salesorder_model->getEmployeeHasPlaceID($this->input->post());
        echo $frechData->id_employee_has_place . "`" . $frechData->discount;
    }

    /**
     * Function addSalesOrder
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function addSalesOrder() {
        /* $this->form_validation->set_rules('employee_name', 'Employee', 'required');

          $this->form_validation->set_rules('territory_name', 'Territory', 'required');
          $this->form_validation->set_rules('division_name', 'Division', 'required');
          $this->form_validation->set_rules('outlet_name', 'Outlet', 'required');
          $this->form_validation->set_rules('physical_place_name', 'Physical Place', 'required');
          $this->form_validation->set_rules('branch_name', 'Branch Name', 'required');
          $this->form_validation->set_rules('discount', 'Discount', 'required');
          $this->form_validation->set_rules('type', 'Type', 'required');
          $this->form_validation->set_rules('id_employee_has_place', 'ID Employee Has Place', 'required'); */

        if (TRUE) {
            if ($this->input->post("id_employee_has_place") != '' && $this->input->post("branch_name") != '') {
                $this->load->model('salesorder/salesorder_model');
                $insertSalesOrder = $this->salesorder_model->insertSalesOrder($this->input->post());

                if ($insertSalesOrder) {
                    $this->session->set_flashdata('addSalesOrder', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Sales Order</spam>');
                } else {
                    $this->session->set_flashdata('addSalesOrder', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Sales Order Error</spam>');
                }
                redirect("salesorder/drawIndexSalesOrder");
            }
        } else {
            $this->drawIndexSalesOrder();
        }
    }

    /**
     * Function viewSalesOrderByFilterKey
     *
     * Division Name AutoComplete
     *
     * @param no
     * @return no
     */
    function viewSalesOrderByFilterKey($Data) {
        $this->load->model('salesorder/salesorder_model');
        $viewPendingSalesOrder = $this->salesorder_model->viewSalesOrderByFilterKey1();
        $this->template->draw('salesorder/viewPendingSalesOrder', false, $viewPendingSalesOrder);
    }

    function viewSalesOrderByFilterKey1($Data) {
        $this->load->model('salesorder/salesorder_model');
        $viewPendingSalesOrder = $this->salesorder_model->viewSalesOrderByFilterKey1();
        $this->template->draw('salesorder/viewAcceptSalesOrder', false, $viewPendingSalesOrder);
    }

    public function getsalesTotal($sales_orderid = '') {
        $this->load->model('salesorder/salesorder_model');
        $salesTotal = $this->salesorder_model->getsalesTotal($sales_orderid);
        return $salesTotal;
    }

    /**
     * Function viewSalesOrderProduct
     *
     * Division Name AutoComplete
     *
     * @param no
     * @return no
     */
    function viewSalesOrderProduct($id) {
        $this->template->attach($this->resours);
        $this->template->draw('salesorder/viewSalesOrderProduct', false);
    }

    public function viewSalesOrderDetails($id) {
        $this->load->model('salesorder/salesorder_model');
        $extraData['viewSalesProduct'] = $this->salesorder_model->getSalesOrderProduct($id);
        $this->template->draw('salesorder/salesorderDetails', false, $extraData);
    }
 public function viewfreeitem($id) {
       
 $this->load->model('salesorder/salesorder_model');
      
  $extraData['freeitems'] = $this->salesorder_model->getSalesOrderfreeItemProduct($id);
      
  $this->template->draw('salesorder/freeitemDetail', false, $extraData);
   
 }

    public function viewMarketReturns($id,$type) {
	        if($type!=NULL){
          $status=0;
        }  else {
            $status=1;
        }
        $this->load->model('salesorder/salesorder_model');
        $column = array('id_sales_order' => $id, 'id_return_type' => '2', 'return_note_status' => $status);
        $extraData['marketReturnsDetails'] = $this->salesorder_model->getMarketReturnsDetails($column);
        $this->template->draw('salesorder/marketReturnDetail', false, $extraData);
    }

    public function viewSalesReturns($id,$type) {
	  if($type!=NULL){
          $status=0;
        }  else {
            $status=1;
        }
        $this->load->model('salesorder/salesorder_model');
        $column_sr = array('id_sales_order' => $id, 'id_return_type' => '1', 'return_note_status' => $status);
        $extraData['salesReturnsDetails'] = $this->salesorder_model->getSalesReturnsDetails($column_sr);
        $this->template->draw('salesorder/salesReturnDetails', false, $extraData);
    }

    public function getOrderAmounts($id,$type) {
	        if($type!=NULL){
          $status=0;
        }  else {
            $status=1;
        }
        $this->load->model('salesorder/salesorder_model');
        $column_mr = array('id_sales_order' => $id, 'id_return_type' => '2', 'return_note_status' => $status);
        $column_sr = array('id_sales_order' => $id, 'id_return_type' => '1', 'return_note_status' => $status);
        $id_sales_order = array('id_sales_order' => $id, 'outlet_has_branch_status' => '1');
        $extraData['sales_amount'] = $this->salesorder_model->getSalesAmount($id);
        $extraData['market_amount'] = $this->salesorder_model->getMarkeReturntAmount($column_mr);
        $extraData['return_amount'] = $this->salesorder_model->getSalesRetturnAmount($column_sr);
        $extraData['id_sales_order'] = $this->salesorder_model->getOutletDetails($id_sales_order);
		$extraData['type']=$type ;
        $this->template->draw('salesorder/viewSalesOrderProduct', false, $extraData);
    }

    /**
     * Function deleteSalesOrder
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteSalesOrder() {
        $this->load->model('salesorder/salesorder_model');
        $this->load->model('services/service_model');
        $id_sales_order = $this->input->get('id_sales_order');
        $deleteSalesOrder = $this->salesorder_model->deleteSalesOrder($id_sales_order);
        $productbysalesorder = $this->salesorder_model->getProductbysalesorder($id_sales_order);
        $getphysicalplace = $this->salesorder_model->getphysicalplace($id_sales_order);

        if (count($productbysalesorder) > 0) {
            foreach ($productbysalesorder as $value) {
                $stockItemQty = $this->service_model->getStockItemQty($value['id_products'], $getphysicalplace[0]['id_store']);
                if (count($stockItemQty) > 0) {
                    $qty = $stockItemQty[0]['qty'];
                    if ($qty - $value['item_qty'] > 0) {
                        $update_qty = $qty + $value['product_qty'];
                        $this->service_model->updateStock($update_qty, $stockItemQty[0]['id_stock']);
                    }
                }
            }
        }

        $productbysalesorderreturn = $this->salesorder_model->getProductbysalesorderreturn($id_sales_order);
        if (count($productbysalesorderreturn) > 0) {
            foreach ($productbysalesorderreturn as $value) {
                $stockItemQty = $this->service_model->getStockItemQty($value['id_products'], $getphysicalplace[0]['id_store']);

                if (count($stockItemQty) > 0) {
                    $qty = $stockItemQty[0]['qty'];
                    $update_qty = $qty - $value['return_product_qty'];
                    $this->service_model->updateStock($update_qty, $stockItemQty[0]['id_stock']);
                }
            }
        }

        redirect('salesorder/drawindexSearchSalesOrder');
    }

    function SalesOrderInvoice() {
        $this->load->model('salesorder/salesorder_model');
        $id_sales_order = $this->input->get('id_sales_order');
        $InvoiceSalesOrder = $this->salesorder_model->invoiceSalesOrder($id_sales_order);
        $this->session->set_flashdata('insert_invice', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Create a Invoice</spam>');
        redirect('salesorder/drawindexSearchSalesOrder');
    }

    function loadFreeItem() {
        $this->load->model('salesorder/salesorder_model');
        $FreeItem = $this->salesorder_model->getFreeItem1($this->input->post());
        if (isset($FreeItem)) {
            foreach ($FreeItem as $data) {
                if (isset($data)) {
                    echo $data['id_item'] . '`' . $data['item_name'] . '`' . $data['itemcount'];
                }
            }
        }
    }

    //---------------------------------------------------- pdf -----------------------------------------------------------------

    public function drawPdfInvoicePrint() {
        $this->template->attach($this->resours);
        $this->template->draw('salesorder/pdfInvoiceForPrintIndex', true);
    }

    public function pdfInvoicePrint() {
        $this->load->model('salesorder/salesorder_model');
        $id_sales_order = $this->input->get('sid');
        $extraData['invoiceSalesOrder'] = $this->salesorder_model->invoiceSalesRefOutletDetails($id_sales_order);
        $extraData['salesItems'] = $this->salesorder_model->salesOrderDetails($id_sales_order);
        $extraData['salesReturn'] = $this->salesorder_model->salesReturns($id_sales_order);
        $extraData['marketReturn'] = $this->salesorder_model->marketReturns($id_sales_order);
        $extraData['paymentDetails'] = $this->salesorder_model->paymentDetails($id_sales_order);
        $this->template->draw('salesorder/pdfInvoiceForPrint', false, $extraData);
    }

    public function salesOrderPDFPrint() {
        $this->load->model('salesorder/salesorder_model');
        $this->template->attach($this->resours);
        ob_start();
        $data_table = $_POST['key'];
        $mpdf = new mPDF('c', 'A4');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHeader('{DATE Y-m-d}|| Hayleys Agriculture');
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($data_table);
        $pdfName = $this->session->userdata('id_user');
        $invoiceName = $this->input->get('invoiceName');

        //  $mpdf->Output("invoices/salesInvoice_" . $pdfName . $invoiceName . ".pdf");
        $mpdf->Output("invoices/salesInvoice_" . $pdfName . $invoiceName . ".pdf");
        exit;
        ob_flush();
    }

    /*
     * get current stock of distributor
     */

   
   /*
     * @Refe Add Sales Order
     * @author Faazi ahamed 
     * @contact faaziahamed@gmail.com
     * @LastUpdate 23/06/2014
     */
    
    public function get_current_stock() {
        $this->load->model('salesorder/salesorder_model');
        $employehasplace_id = $_POST['employehasplace_id'];
        $product_id = $_POST['product_id'];
        $_current_stock = $this->salesorder_model->get_current_stock($employehasplace_id, $product_id);

        $no_data[] = array('qty' => 0);

        if (count($_current_stock) > 0) {
            echo json_encode($_current_stock);
        } else {
            echo json_encode($no_data);
        }
    }


    public function saveSalesOrder() {

        $this->load->model('services/service_model');

        if (isset($_POST['txtemp_place_id']) && $_POST['txtemp_place_id'] != '') {
            $employee_id = $_POST['txtemp_place_id'];
            $usertoken = $this->service_model->getUsertoken($employee_id);
            $column = array('token' => $usertoken[0]['user_token']); // hardcode
            $employePlaceID = $this->service_model->getEmployePlaceID($column);
            $emp_token = $employePlaceID[0]->id_employee_has_place;
            $emp_pys = $employePlaceID[0]->id_physical_place;
            $branch_name = $_POST['branch_name'];
            $sales_array = array('branch_id' => $branch_name);

            $date = date('Y-m-d H:i:s');
            $sales_array['salesOrder'] = array('sales_date' => $date);
            $sales_array['sales'] = array();
            $sales_array['salesReturn'] = array();
            $sales_array['marketReturn'] = array();
            $sales_rows_token = $_POST['sales_rows_token'];
            $rtsales_rows_token = $_POST['rtsales_rows_token'];
            $remarks = $_POST['remarks'];
            $sales_rows_token++;
            $rtsales_rows_token++;

            for ($x = 1; $x < $sales_rows_token; $x++) {

                if (isset($_POST['item_id_' . $x]) && $_POST['item_id_' . $x] != '') {
                    $amount = ($_POST['amount_' . $x] / $_POST['item_qty_' . $x]);

                    $items = array('id_item' => $_POST['item_id_' . $x],
                        'item_qty' => $_POST['item_qty_' . $x],
                        'discount_pre' => $amount,
                        'discount' => $_POST['discuntamount_' . $x]
                    );

                    array_push($sales_array['sales'], $items);
                }
            }

            for ($y = 1; $y < $rtsales_rows_token; $y++) {

                if (isset($_POST['srh_product_name_' . $y]) && $_POST['srh_product_name_' . $y] != '') {
                    if ($_POST['return_type_' . $y] == 1) {

                        $return_items = array('id_item' => $_POST['srh_product_name_' . $y],
                            'item_qty' => $_POST['sr_item_qty_' . $y],
                            'discount_pre' => $_POST['retuen_price_' . $y],
                            'discount' => $_POST['sr_disamount_' . $y]
                        );

                        array_push($sales_array['marketReturn'], $return_items);
                    }

                    if ($_POST['return_type_' . $y] == 2) {
                        $return_items_mk = array('id_item' => $_POST['srh_product_name_' . $y],
                            'item_qty' => $_POST['sr_item_qty_' . $y],
                            'discount_pre' => $_POST['retuen_price_' . $y],
                            'return_remaks' => $_POST['sr_remrks_' . $y],
                            'discount' => $_POST['sr_disamount_' . $y]
                        );

                        array_push($sales_array['salesReturn'], $return_items_mk);
                    }
                }
            }


            $this->service_model->insertwebsalesOrder($sales_array, $emp_token, $emp_pys, $_POST);
            $this->session->set_flashdata('insert_order', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Sales Order</spam>');
            redirect('salesorder/drawIndexSalesOrder');
        } else {
            $this->session->set_flashdata('insert_order', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Sales Order Add Fail</spam>');
            redirect('salesorder/drawIndexSalesOrder');
        }
    }
	    public function viewWarrantyitem($id) {
  $this->load->model('salesorder/salesorder_model');      
  $extraData['wareentyitems'] = $this->salesorder_model->getSalesOrderWarrentyItemProduct($id);      
  $this->template->draw('salesorder/WareentyitemDetail', false, $extraData);
    }

}

?>

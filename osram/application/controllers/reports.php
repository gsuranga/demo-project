<?php

/**
 * Description of salesorder
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class reports extends C_Controller {

    private $resours = array(
        'JS' => array('reports/js/reports','reports/js/gpsmap'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }
    
    /*
     * oz funtion
     */
    public function getTimeData() {
        $this->load->model('reports/report_model');
        echo $this->report_model->timeReport();
    }
    
    
    /*
     * end
     */

    /**
     * Function viewGpsInfomations
     *
     * GPS Infomations
     *
     * @param $id=Employee Has Place ID
     * @return no
     */
    function viewGpsInfomations() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/gpsTrackingView', true);
    }

    public function drawGpsInfomations() {
       // $this->template->attach($this->resours);
        
        $this->load->model('reports/report_model');
        $viewgpsinfo = $this->report_model->getTrackingDetails();
        if (isset($_POST['txt_st_date'])) {
            $txt_st_date = $_POST['txt_st_date'];
            $txt_emp_name = $_POST['txt_gps_emp_name_token'];
            $date_range = array('txt_st_date' => $txt_st_date, 'txt_emp_name' => $txt_emp_name);
            $extraData['date_ramge'] = $date_range;
        }
        $extraData['viewgpsinfo'] = $viewgpsinfo;
       
        if (isset($_POST['txt_gps_emp_name_token'])) {
            if ($_POST['txt_gps_emp_name_token'] != '') {

                $this->template->draw('reports/gpsTracking', false, $extraData);
            } else {
                $extraData = '';
                $this->template->draw('reports/gpsTracking', false, $extraData);
            }
        }
    }

    /* function selectGpsTrackingDetailsByDate() {
      $this->template->attach($this->resours);
      $this->load->model('reports/report_model');
      $viewgpsinfo = $this->report_model->selectGpsTrackingDetailsByDate($_REQUEST['dateOne'],$_REQUEST['dateTwo']);
      $this->template->draw('reports/gpsTrackingView', false,$viewgpsinfo);
      } */

    public function selectGpsTrackingDetailsByDate() {
        if (isset($_REQUEST['dateOne']) && $_REQUEST['dateTwo']) {
            $this->load->model('reports/report_model');
            $viewgpsinfo = $this->report_model->selectGpsTrackingDetailsByDate($_REQUEST['dateOne'], $_REQUEST['dateTwo']);
            $this->template->draw('reports/gpsTracking', false, $viewgpsinfo);
        }
    }

    function dailySalesReport() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dailySalesReportView', true);
    }

    public function drawSalesIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexSalesReport', true);
    }

    public function drawDailySalesReport() {
        $this->template->attach($this->resours);
        if(isset($_POST['btn_sub'])){
        $this->load->model('reports/report_model');
        $dailySalesReport = $this->report_model->dailySalesReport();
        if (isset($_POST['txt_st_date']) && isset($_POST['txt_en_date'])) {
            $txt_st_date = $_POST['txt_st_date'];
            $txt_en_date = $_POST['txt_en_date'];
            $txt_emp_name = $_POST['txt_emp_name'];
            $date_range = array('txt_st_date' => $txt_st_date, 'txt_en_date' => $txt_en_date, 'txt_emp_name' => $txt_emp_name);
            $extraData['date_ramge'] = $date_range;
        }

        $extraData['dailySalesReport'] = $dailySalesReport;
        }
        $this->template->draw('reports/salesOrderReport', false, $extraData);
    }

    public function getUserNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('employee_first_name', 'id_employee_has_place','id_physical_place');
        $result = $this->report_model->getEmployeNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    public function getUserNamesqzy() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('employee_first_name', 'id_employee_has_place','id_physical_place');
        $result = $this->report_model->get_users($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    /*
     * gps tracking
     */
    
    public function getUserNamegpstracking() {
        $q = strtolower($_GET['term']);
        $q_pysid = $_GET['pysid'];
        $q_area_id = $_GET['area_id'];
        $this->load->model('reports/report_model');
        $column = array('employee_first_name', 'id_employee_has_place','id_physical_place');
        $result = $this->report_model->getEmployeNamestracking($q, $column , $q_pysid,$q_area_id);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }


    /*
     * 
     */

    public function search_by_item_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_name', 'id_item');
        $result = $this->report_model->getItemNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_employee_name_wise() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee');
        $result = $this->report_model->getEmployeeNamesWise($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_territory_name_wise() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->report_model->getTerritoryNamesWise($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

/*    public function itemWiseSalesOrderReportIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexSalesReportItemWise', true);
    }

    public function itemWiseSalesOrderReport() {
        $this->load->model('reports/report_model');
       // $itemWiseSalesOrderReport = $this->report_model->itemWiseSalesOrderReportModel();
       $itemWiseSalesOrderReport=$this->report_model->itemWiseSalesOrderReportModel();
        $this->template->draw('reports/itemWiseSalesOrderReport', false, $itemWiseSalesOrderReport);
        $this->load->model('reports/report_model');
        $extraData['sales_tot'] = $this->report_model->getSalesItemWise();
        $extraData['sales_return'] = $this->report_model->getsalesReturnItemWise();
        $extraData['sales_market'] = $this->report_model->getSalesMarketItemWise();
        //$extraData['sales_market'] = $this->report_model->getSalesMarketItemWise();
        $this->template->draw('reports/itemWiseSalesOrderReport', false, $extraData);
    }*/

    public function drawStockAvailability() {

        $this->template->attach($this->resours);
        $this->template->draw('reports/stockAvailabiltyIndex', true);
    }

    public function selectStockAvailability() {
        $this->template->attach($this->resours);
		if(isset($_POST['btn_sub'])){
        $this->load->model('reports/report_model');
        $viewStockAvail = $this->report_model->stockAvailability();
		}
        $this->template->draw('reports/stockAvailability', false, $viewStockAvail);
    }

    public function search_by_item_name_stock() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_Name', 'iditem');
        $result = $this->report_model->getProductName($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_item_category_name_stock() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('tbl_item_category_name', 'id_item_category');
        $result = $this->report_model->getProductNameCategory($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_territory_stock() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->report_model->getArea($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawMarketReturn() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/marketReturnIndex', true);
    }

    public function select_market_return() {
        $this->template->attach($this->resours);
		 if(isset($_POST['btn_submit'])){
        $this->load->model('reports/report_model');
        $marketReurnDetails = $this->report_model->marketReturn();
		}
        $this->template->draw('reports/marketReturn', false, $marketReurnDetails);
    }

    public function search_by_item_market_return() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_name', 'id_item');
        $result = $this->report_model->getItemForMarketReturn($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_route_market_return() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->report_model->getRouteForMarketReturn($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_employee_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee', 'id_employee_has_place');
        $result = $this->report_model->getEmployeeNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }


     public function search_by_distributor_market_return() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee',"id_physical_place");
        $result = $this->report_model->getDistributorForMarketReturn($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }





    //----------------------------------------------------------------------------------------------------------------------

    public function drawSalesReturn() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/salesReturnIndex', true);
    }

    public function select_sales_return() {
        $this->template->attach($this->resours);
		if(isset($_POST['btn_submit'])){
        $this->load->model('reports/report_model');
        $salesReurnDetails = $this->report_model->salesReturn();
		}
        $this->template->draw('reports/salesReturn', false, $salesReurnDetails);
    }

    public function search_by_item_sales_return() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_name', 'id_item');
        $result = $this->report_model->getItemForSalesReturn($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_route_sales_return() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->report_model->getRouteForSalesReturn($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_distributor_sales_return() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee');
        $result = $this->report_model->getDistributorForSalesReturn($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawFreeIssue() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/freeIssueIndex', true);
    }

    public function select_free_issue() {
        $this->template->attach($this->resours);
		if(isset($_POST['btn_submit'])){
        $this->load->model('reports/report_model');
        $freeIssue = $this->report_model->getFreeIssue();
		}
        $this->template->draw('reports/freeIssue', false, $freeIssue);
    }
	
	public function search_by_distributor_free_issue() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee',"id_physical_place");
        $result = $this->report_model->getDistributorForFreeIssue($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_item_free_issue() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_name', 'id_item');
        $result = $this->report_model->getFreeIssueByItem($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function productmovementReportIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexProductMovementReport', true);
    }

    public function productMovementReport() {
	if(isset($_POST['btn_submit'])){
        $this->load->model('reports/report_model');
        $productMovementReportJson = $this->report_model->productMovementReport();
		}
        $this->template->draw('reports/ProductMovementViewMovementReport', false, $productMovementReportJson);
    }

    /*
     * 
     */

    //--------------------------------------- 12-11 ------------------------------------------------

    public function drawIndexGoodRecived() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexStockHistory', true);
    }

    public function drawIndexManageGoodRecived() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexManageGoodStock', true);
    }

    public function drawViewGoodRecived() {
	if(isset($_POST['submit_data'])){
        $this->load->model('good_received/good_received_model');
        $goodRecived = $this->good_received_model->getGoodRecived();
		}
        $this->template->draw('reports/viewGoodReceivedStock', false, $goodRecived);
    }

    public function drawViewGoodRecivedDetail() {
        $id = $_GET['ea1fe5ea58844b8068ad76b92a0d6590cl_distributorHayleystoken'];
        $this->load->model('good_received/good_received_model');
        $goodRecived_detail = $this->good_received_model->viewGoodRecivedDetail($id);
        $this->template->draw('reports/viewGoodDetailsStock', false, $goodRecived_detail);
    }

    public function getEmployeeNamesByGood() {
        $q = strtolower($_GET['term']);
        $this->load->model('good_received/good_received_model');
        $column = array('employee_first_name', 'id_employee_has_place');
        $result = $this->good_received_model->getEmployeeNamesByGood($q, $column);
        echo json_encode($result);
    }

    public function getGrnByGood() {
        $q = strtolower($_GET['term']);
        $this->load->model('good_received/good_received_model');
        $column = array('good_recived_number', 'id_good_received');
        $result = $this->good_received_model->getGrnByGood($q, $column);
        echo json_encode($result);
    }

//  ------------------------------------------------------------------------------------------------------
    public function drawPendingPurchase() {
        $this->load->model('purchaseorder/purchase_model');
        $viewAllPurchaseOrder = $this->purchase_model->viewAllPurchaseOrder();
        $this->template->draw('reports/viewPendingOrder', false, $viewAllPurchaseOrder);
    }

    public function drawAcceptPurchase() {
        $this->load->model('purchaseorder/purchase_model');
        $viewAllPurchaseOrder = $this->purchase_model->viewAllPurchaseOrder();
        $this->template->draw('reports/viewAcceptOrders', false, $viewAllPurchaseOrder);
    }

    public function drawpurchaseDetails() {
        $this->load->model('purchaseorder/purchase_model');
        if (isset($_GET['primary_token_value'])) {
            $primary_token_value = $_GET['primary_token_value'];
            $viewPurchaseOrderDetails = $this->purchase_model->viewPurchaseOrderDetails($primary_token_value);
            $this->template->draw('reports/viewPurchaseOrder', false, $viewPurchaseOrderDetails);
        }
    }

    public function drawpurchaseDetailsViewOnly() {
        $this->load->model('purchaseorder/purchase_model');
        if (isset($_GET['cl_distributorHayleystoken'])) {
            $primary_token_value = $_GET['cl_distributorHayleystoken'];
            $viewPurchaseOrderDetails = $this->purchase_model->viewPurchaseOrderDetails($primary_token_value);
            $this->template->draw('reports/viewPurchaseDetail', false, $viewPurchaseOrderDetails);
        }
    }

    public function drawDetailstPurchase() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexPurchaseDetails', true);
    }

    public function drawIndexPurchase() {
        $this->template->attach($this->resours);
        $this->template->draw('purchaseorder/indexPurchaseOrder', true);
    }





    public function drawPurchaseOrder() {
        $this->template->draw('purchaseorder/registerPurchaseorder', false);
    }

    public function getEmployeeNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('employee_first_name', 'id_employee_has_place');
        $result = $this->purchase_model->getEmployeNames($q, $column);
        echo json_encode($result);
    }
    
    public function getEmployeeNames11() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('employee_first_name', 'id_employee');
        $result = $this->purchase_model->getEmployeNames($q, $column);
        echo json_encode($result);
    }

    public function getProducts() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('item_name', 'id_products', 'product_price');
        $result = $this->purchase_model->getProducts($q, $column);
        echo json_encode($result);
    }

    public function getPurchaseOrderNo_employes() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('employee_first_name', 'id_employee_has_place');
        $result = $this->purchase_model->getPurchaseOrderNo_employes($q, $column);
        echo json_encode($result);
    }

    public function getPurchaseOrderNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('purchase_order_number', 'id_purchase_order');
        $result = $this->purchase_model->getPurchaseOrderNoData($q, $column);
        echo json_encode($result);
    }

    public function search_by_territory_name_for_sales_order() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->report_model->getTerritoryNamesForSalesOrder($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_outlet_name_for_sales_order() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->report_model->getOutletNamesForSalesOrder($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function reportsPDFPrint() {
        $topic = $this->input->get('topic');
        $html = "<h1 align='center'>$topic</h1></br>";
        $this->load->model('reports/report_model');
        $this->template->attach($this->resours);
        ob_start();
        $data_table = $_POST['key'];
        $mpdf = new mPDF('c', 'A4');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHeader('{DATE Y-m-d}|| Osram');
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($html . $data_table);
        $userName = $this->session->userdata('id_user');
        $pdfName = $this->input->get('pdfName');

        $mpdf->Output("PDF_Reports/report_" . $userName . $pdfName . ".pdf");
        exit;
        ob_flush();
    }

    public function reportsToExcel() {
        ob_start();
        $excel = $_POST['key'];
        $e = json_decode($excel, TRUE);
        $this->load->library('export');
        $name = $this->input->get('excel');
        // $this->load->model('reports/report_model');
        $this->export->to_excel($e, 'nameForFile');
        exit;
        ob_flush();
    }

    public function drawTimeReportIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexTimeReport', true);
    }

    public function drawTimeReport() {
        if(isset($_POST['start_order_date'])){
        $this->load->model('reports/report_model');
        $timeReportJson = $this->report_model->timeReport();
        }
        $this->template->draw('reports/timeReport', false, $timeReportJson);
    }

    public function search_by_time_report_employee() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee','id_physical_place','id_employee_type');
        $result = $this->report_model->search_by_time_report_employee($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_time_report_outlet() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_outlet');
        $result = $this->report_model->search_by_time_report_outlet($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //----------------------------------------- poya day ----------------------------------------------------------------------------

    public function drawUnproductiveCallIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/unproductiveCallIndex', true);
    }

    public function drawUnproductiveCall() {
        if(isset($_POST['btn_sub'])){
        $this->load->model('reports/report_model');
        $unproductiveCall = $this->report_model->unproductiveCall();
        }
        $this->template->draw('reports/unproductiveCall', false, $unproductiveCall);
    }

    public function search_by_outlet_report_unproductive_call() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->report_model->search_by_outlet_report_unproductive_call($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_emp_report_unproductive_call() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee');
        $result = $this->report_model->search_by_employee_report_unproductive_call($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getEmployee() {
        $q = strtolower($_GET['term']);
        $this->load->model('salesorder/salesorder_model');
        $column = array('full_name', 'id_employee',);
        $result = $this->salesorder_model->getEmployee1($q, $column);
        echo json_encode($result);
    }

    public function drawindexPaymentsReports() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexReportPayment', true);
    }

    function viewSalesOrderByFilterKey1() {
        $emp_id = '';
        if (isset($_POST['txtemnamehid']) && $_POST['txtemnamehid']) {
            $emp_id = $_POST['txtemnamehid'];
        }
        $column = array('employee_id' => $emp_id);
        $this->load->model('salesorder/salesorder_model');
        $viewAcceptSalesOrder = $this->salesorder_model->viewSalesOrderByFilterKeypayments($column);

        $this->template->draw('reports/paymentSalesOrders', false, $viewAcceptSalesOrder);
    }

    /*
     * drawindexTer
     */

    public function drawindexTer() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indextWiseTarget', true);
    }

    public function drawindexemp() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexEmploTarget', true);
    }

    public function drawInsertterwise() {
        $this->template->draw('reports/terwiseTarget', FALSE);
    }

    public function drawInsertempwise() {
        $this->template->draw('reports/employyewisetarget', FALSE);
    }

    public function drawviewtterwise() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexviewTerWise', TRUE);
    }

    public function drawviewtterwiseemployee() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexemployeview', TRUE);
    }

    public function getterNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('salesorder/salesorder_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->salesorder_model->getterdata($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function drawviewterWise() {
        $column = array('status' => 1);
        $this->load->model('reports/report_model');
        $viewSalesOrderByter = $this->report_model->viewSalesOrderByter($column);
        $this->template->draw('reports/viewTerwisereport', false, $viewSalesOrderByter);
    }

    public function drawviewterWiseemployee() {
        $column = array('status' => 1);
        $this->load->model('reports/report_model');
        $viewSalesOrderByter = $this->report_model->viewSalesOrderByteremploye($column);
        $this->template->draw('reports/viewemplyeewisetarget', false, $viewSalesOrderByter);
    }

    public function inserttarter() {
        $this->form_validation->set_rules('txt_ter_name', 'Territory Name', 'required');
        $this->form_validation->set_rules('txttren_date', 'Date Range', 'required');
        $this->form_validation->set_rules('txttrend_date', 'Date Range', 'required');

        if ($this->form_validation->run()) {
            $post_hidden_count = 0;
            $row = 0;
            $this->load->model('salesorder/salesorder_model');
            $post = $this->input->post();
            if (isset($_POST['hidden_token_row'])) {
                $post_hidden_count = $this->input->post('hidden_token_row');
            } else {
                
            }
            $row++;
            $purchase_order = $_POST['txt_idter_name'];
            if (isset($_POST['hidden_token_row'])) {
                $post_hidden_count++;
                $target_st_date = $_POST['txttren_date'];
                $target_en_date = $_POST['txttrend_date'];
                for ($row; $row < $post_hidden_count; $row++) {

                    if (isset($post['hidn_token_' . $row], $post['item_price_' . $row], $post['item_qty_' . $row])) {
                        $hidn_token = $post['hidn_token_' . $row];
                        $item_qty = $post['item_qty_' . $row];

                        $dataarray = array(
                            'id_territory' => $purchase_order,
                            'id_products' => $hidn_token,
                            'target_st_date' => $target_st_date,
                            'target_en_date' => $target_en_date,
                            'product_qty' => $item_qty,
                            'added_date' => date('Y:m:d'),
                            'added_time' => date('H:i:s')
                        );

                        $terrery_target=$this->salesorder_model->addTaget2($dataarray);
                        $dataarray = '';
                         if ($terrery_target) {
                                $this->session->set_flashdata('insert_terreyr_wise', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Territory Wise Target</spam>');
                            } else {
                                $this->session->set_flashdata('insert_terreyr_wise', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Territory Wise Target Error</spam>');
                            }
                    }
                }
            }
            redirect('reports/drawindexTer');
        } else {
            $this->drawindexTer();
        }
    }

    public function inseremplyewise() {
        $this->form_validation->set_rules('txt_isfsdfdter_name', 'Territory Name', 'required');
        $this->form_validation->set_rules('txttren_date', 'Date Range', 'required');
        $this->form_validation->set_rules('txttrend_date', 'Date Range', 'required');

        if ($this->form_validation->run()) {
            $post_hidden_count = 0;
            $row = 0;
            $this->load->model('salesorder/salesorder_model');
            $post = $this->input->post();
            if (isset($_POST['hidden_token_row'])) {
                $post_hidden_count = $this->input->post('hidden_token_row');
            } else {
                
            }
            $row++;
            $purchase_order = $_POST['txt_isfsdfdter_name'];
            if (isset($_POST['hidden_token_row'])) {
                $post_hidden_count++;
                $target_st_date = $_POST['txttren_date'];
                $target_en_date = $_POST['txttrend_date'];
                for ($row; $row < $post_hidden_count; $row++) {

                    if (isset($post['hidn_token_' . $row], $post['item_price_' . $row], $post['item_qty_' . $row])) {
                        $hidn_token = $post['hidn_token_' . $row];
                        $item_qty = $post['item_qty_' . $row];

                        $dataarray = array(
                            'id_employee_has_place' => $purchase_order,
                            'id_products' => $hidn_token,
                            'target_st_date' => $target_st_date,
                            'target_en_date' => $target_en_date,
                            'qty' => $item_qty,
                            'added_date' => date('Y:m:d'),
                            'added_time' => date('H:i:s')
                        );

                        $employee_wise_targt=$this->salesorder_model->addTaget23($dataarray);
                        $dataarray = '';
                        if ($employee_wise_targt) {
                                $this->session->set_flashdata('insert_employee_wise', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Employee Wise Target</spam>');
                            } else {
                                $this->session->set_flashdata('insert_employee_wise', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Employee Wise Target Error</spam>');
                            }
                    }
                }
            }
            redirect('reports/inseremplyewise');
            $this->drawindexemp();
        } else {
            $this->drawindexemp();
        }
    }

    /*
     * sameera 2013-12-21
     */

    public function drawTargetVsAchievmentIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/targetVsAchievmentIndex', true);
    }

    public function drawtargetVsAchievment() {
        $this->load->model('reports/report_model');
        $targetVsAchievement = $this->report_model->targetVsAchievement();
        $this->template->draw('reports/targetVsAchievment', false, $targetVsAchievement);
    }

    public function search_by_territory_for_targetAchievement() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('teritory', 'teritory_id');
        $result = $this->report_model->search_by_territory_for_targetAchievement($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_item_for_targetAchievement() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_name', 'id_item');
        $result = $this->report_model->search_by_item_for_targetAchievement($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_ter_for_targetAchievement() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->report_model->search_by_ter_for_targetAchievement($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //------------------------------------ 2013-12-23 ---------sameera viraj-----------------------------------------------------

    public function drawTargetVsAchievmentEmpWiseIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/targetVsAchievmentEmpWiseIndex', true);
    }

    public function drawtargetVsAchievmentEmpWise() {
        $this->load->model('reports/report_model');
        $targetVsAchievement = $this->report_model->targetVsAchievementEmployeeWise();
        $this->template->draw('reports/targetVsAchievmentEmpWise', false, $targetVsAchievement);
    }

    public function search_by_item_targetVsAch() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_name', 'id_item');
        $result = $this->report_model->search_by_item_targetVsAch($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_emp_targetVsAch() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee');
        $result = $this->report_model->search_by_emp_targetVsAch($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    ////////////



    /*
     * sameera viraj 2013-12-24
     */

    public function drawChequedetailsIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/chequedetailsIndex', true);
    }

    public function drawChequedetails() {
        if(isset($_POST['btn_sub'])){
        $this->load->model('reports/report_model');
        $chequeDetails = $this->report_model->chequeDetails();
        }
        $this->template->draw('reports/chequedetails', false, $chequeDetails);
    }

    public function search_by_employee_name_for_cheque_details() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee');
        $result = $this->report_model->search_by_employee_name_for_cheque_details($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function search_by_outlet_name_for_cheque_details() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->report_model->search_by_outlet_name_for_cheque_details($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function draw_payment_outstanding_index() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/paymentOutstandingIndex', true);
    }

    public function drawPaymentOutstanding() {
        if(isset($_POST['Search'])){
        $this->load->model('reports/report_model');
        $paymentOutstanding = $this->report_model->payment_outstanding();
        }
        $this->template->draw('reports/paymentOutstanding', false, $paymentOutstanding);
    }
    
    public function drawDailySalesIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/drawDailySalesIndex', true);
    }

     public function drawDailySales() {
	 if(isset($_POST['btn_submit'])){
        $this->load->model('reports/report_model');
        $extraData = $this->report_model->dailySalesAndInvoice();
        //$extraData['y'] = $this->report_model->dailySalesFromSales();
		}
        $this->template->draw('reports/drawDailySales', false, $extraData);
    }
	
    public function drawNonInvoicedOutletIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/drawNonInvoicedOutletIndex', true);
    }

    public function drawNonInvoicedOutlet() {
        if(isset($_POST['btn_sub'])){
        $this->load->model('reports/report_model');
        $y = $this->report_model->nonInvoicedOutlet();
        }
        $this->template->draw('reports/drawNonInvoicedOutlet', false, $y);
    }

    public function search_by_emp_name_daily_sales() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('emp_name', 'id_employee','id_physical_place');
        $result = $this->report_model->search_by_emp_name_daily_sales($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    public function search_by_outlet_name_non_invoiced() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->report_model->search_by_outlet_name_non_invoiced($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    public function search_by_emp_name_non_invoiced() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('emp_name', 'id_employee');
        $result = $this->report_model->search_by_emp_name_non_invoiced($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    	 public function drawIslandWideIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/islandWideIndex', true);
    }

    public function drawIslandWide() {
        $this->load->model('reports/report_model');
        $paymentOutstanding = $this->report_model->islandWideTracking();
        $this->template->draw('reports/islandWideReport', false, $paymentOutstanding);
    }
    
     public function viewGpsUnproduct() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/drawIndexviewGpsUnproduct', true);
    }

    public function drawViewUnproductMap() {

        $this->template->attach($this->resours);
        $this->load->model('reports/report_model');
        $viewgpsinfo = $this->report_model->getTrackingUnproductDetails();
        if (isset($_POST['txt_st_date'])) {
            $txt_st_date = $_POST['txt_st_date'];
            $txt_emp_name = $_POST['txt_gps_emp_name_token'];
            $date_range = array('txt_st_date' => $txt_st_date, 'txt_emp_name' => $txt_emp_name);
            $extraData['date_ramge'] = $date_range;
        }
        $extraData['viewgpsinfo'] = $viewgpsinfo;
        if (isset($_POST['txt_gps_emp_name_token'])) {
            if ($_POST['txt_gps_emp_name_token'] != '') {

                $this->template->draw('reports/unproductgpsTracking', false, $extraData);
            } else {
                $extraData = '';
                $this->template->draw('reports/unproductgpsTracking', false, $extraData);
            }
        }
    }
    
    public function drawindexdailyitems(){
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexdailyitem', true);
    }
    
    public function drawsalesitem(){
        $this->load->model('reports/report_model');
        $getdailyItems = $this->report_model->getdailyItems();
        $this->template->draw('reports/salesitems', FALSE,$getdailyItems);
    }
    
    public function get_outlets_names(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('outlet_name', 'id_outlet_has_branch');
        $result = $this->report_model->get_outlets_names($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function outstanding_outlet_names(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->report_model->outstanding_outlet_names($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function getordercodes(){
         $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('id_sales_order', 'id_sales_order');
        $result = $this->report_model->getordercodes($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function drawallmaps(){
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexallmaps', true);
    }
    
    public function drawGpsallmaps() {
        $this->template->attach($this->resours);
        $this->load->model('reports/report_model');
        $viewgpsinfo = $this->report_model->getTrackingDetails();
        $unproduct = $this->report_model->getTrackingUnproductDetails();
        $json_decode_sales = json_decode($viewgpsinfo, PDO::FETCH_ASSOC);
        $json_decode_unproduct = json_decode($unproduct, PDO::FETCH_ASSOC);
       
        /*
         * new json
         */
        
        $json_array = array();
        $json_array['locations'] = array();
        /*
         * sales orders
         */
        foreach ($json_decode_sales['locations'] as $row) {
           
            $subJson = array();
            $subJson['id_sales_order'] = $row['id_sales_order'];
            $subJson['date'] = $row['date'];
            $subJson['time'] = $row['time'];
            $subJson['lat'] = $row['lat'];
            $subJson['longi'] = $row['longi'];
            $subJson['bat'] = $row['bat'];
            $subJson['amount'] = $row['amount'];
            $subJson['con'] = $row['con'];
            $subJson['occ'] = $row['occ'];
            $subJson['bill_status'] = 1;

            array_push($json_array['locations'], $subJson);
        }
        
        /*
         * unprodcutive
         */
        foreach ($json_decode_unproduct['locations'] as $row) {
           
            $subJson = array();
            $subJson['id_sales_order'] = $row['id_unproduct'];
            $subJson['date'] = $row['date'];
            $subJson['time'] = $row['time'];
            $subJson['lat'] = $row['lat'];
            $subJson['longi'] = $row['longi'];
            $subJson['con'] = $row['con'];
            $subJson['occ'] = $row['occ'];
            array_push($json_array['locations'], $subJson);
        }
        
        $jsonEncode = json_encode($json_array);
        $extraData['viewgpsinfo'] = $jsonEncode;
        
        if (isset($_POST['txt_gps_emp_name_token'])) {
            if ($_POST['txt_gps_emp_name_token'] != '') {

                $this->template->draw('reports/gpstrackingall', false, $extraData);
            } else {
                $extraData = '';
                $this->template->draw('reports/gpstrackingall', false, $extraData);
            }
        }
    }
    
    
    public function drawViewUnproductMapall() {

        $this->template->attach($this->resours);
        $this->load->model('reports/report_model');
        $viewgpsinfo = $this->report_model->getTrackingUnproductDetails();
        if (isset($_POST['txt_st_date'])) {
            $txt_st_date = $_POST['txt_st_date'];
            $txt_emp_name = $_POST['txt_gps_emp_name_token'];
            $date_range = array('txt_st_date' => $txt_st_date, 'txt_emp_name' => $txt_emp_name);
            $extraData['date_ramge'] = $date_range;
        }
        $extraData['viewgpsinfo'] = $viewgpsinfo;
        if (isset($_POST['txt_gps_emp_name_token'])) {
            if ($_POST['txt_gps_emp_name_token'] != '') {

                $this->template->draw('reports/unproductgpsTracking', false, $extraData);
            } else {
                $extraData = '';
                $this->template->draw('reports/unproductgpsTracking', false, $extraData);
            }
        }
    }

      public function search_by_outlet_name_for_payment_outstanding() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->report_model->search_by_outlet_name_for_payment_outstanding($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    
}

    public function search_by_employee_name_for_payment_outstanding() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee');
        $result = $this->report_model->search_by_employee_name_for_payment_outstanding($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }



 
    public function drawPaymentsReports() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/ReportPaymentIndex', true);
    }

    public function viewpayments() {
        //  print_r($_REQUEST['start_date']);
        $this->template->attach($this->resours);
        $this->load->model('reports/report_model');
        $comboData = $_REQUEST['p_method'];
        if ($comboData == 1) {
            $extraData['cash'] = $this->report_model->reportPayment($_REQUEST);
            $extraData['cheque'] = $this->report_model->reportPayment1($_REQUEST);
            $this->template->draw('reports/showReportPayment', false, $extraData);
        } else if ($comboData == 2) {
            $extraData['cash'] = $this->report_model->reportPayment($_REQUEST);
            $this->template->draw('reports/showReportPayment', false, $extraData);
        } else if ($comboData == 3) {
            $extraData['cheque'] = $this->report_model->reportPayment1($_REQUEST);
            $this->template->draw('reports/showReportPayment', false, $extraData);
        } else {
            $extraData['cash'] = $this->report_model->reportPayment($_REQUEST);
            $extraData['cheque'] = $this->report_model->reportPayment1($_REQUEST);
            $this->template->draw('reports/showReportPayment', false, $extraData);
        }
    }

    public function search_by_emp_name_payments() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('emp_name', 'id_employee');
        $result = $this->report_model->search_by_emp_name_payments($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    /*
     * 
     * item list summery report
     * 2014-05-14
     */

    
    public function drowIndex_item_list_summery(){
        $this->template->attach($this->resours);
        $this->template->draw('reports/itemListSummeryIndex', true);
    } 
    
    public function item_list_summery(){
        $this->load->model('reports/report_model');
        $item_list = $this->report_model->item_list_summery();
        $this->template->draw('reports/item_list_summery', false,$item_list);
        
    }
    public function search_by_item_name_for_itemListSummery(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_name', 'id_item');
        $result = $this->report_model->search_by_item_name_for_itemListSummery($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
        
    }
    
    public function search_by_item_accountCode_for_itemListSummery(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('item_account_code', 'id_item');
        $result = $this->report_model->search_by_item_accountCode_for_itemListSummery($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
        
    }
    
    public function getStore_name_for_ItemListSummery(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('store_name', 'id_store');
        $result = $this->report_model->getStore_name_for_ItemListSummery($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        
    }

    }
    public function getEmpName_for_ItemListSummery(){
         $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee');
        $result = $this->report_model->getEmpName_for_ItemListSummery($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);        
    }
    }
    /*
     * 
     * item list summery report
     * 2014-05-14
     * end............
     */
    
   public function drawIndexviewTimeReport(){
	$this->template->attach($this->resours);
        $this->template->draw('reports/indexviewTimeReport', true);
    }
    public function viewTimeDetails(){
       // echo 'LLLLLLLLL';
      //echo  $date=$_GET['id_employee'];
        $this->load->model('reports/report_model');
        $detailTimeReport = $this->report_model->getdetailTimeReport($_REQUEST);
        $this->template->draw('reports/viewTimeDetails', false,$detailTimeReport);
    }
    
    public function getItesms_for_time_report(){
        //$id = $this->input->get('so_idd');
         $oder_id=$_POST['oder_id'];
          
        $this->load->model('reports/report_model');
//        $data_set2 = array();
        $viewitems = $this->report_model->getItesms_for_time_report($oder_id);
//        header('Content-type: application/json');
        
        $res = array("id"=>"not found");
        
        $jsonArray = array();
        
        foreach ($viewitems as $value){
            array_push($jsonArray, array("price"=>$value->product_price,"item"=>$value->item_name,"item_account_code"=>$value->item_account_code,"product_price"=>$value->product_price,"product_qty"=>$value->product_qty,"amount"=>$value->amount,"discount"=>$value->discount));
        }
        
        echo json_encode($jsonArray);
    }



/*
     * Item Wise Report 
     * 
     * @author - Faazi ahamed   
     * @contact :- faaziahamed@gmail.com    
     * 
     */

    public function itemWiseSalesOrderReportIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexSalesReportItemWise', true);
    }

    public function itemWiseSalesOrderReport() {
//        $this->load->model('reports/report_model');
//        // $itemWiseSalesOrderReport = $this->report_model->itemWiseSalesOrderReportModel();
//        $itemWiseSalesOrderReport = $this->report_model->itemWiseSalesOrderReportModel();
//        $this->template->draw('reports/itemWiseSalesOrderReport', false, $itemWiseSalesOrderReport);
		 if(isset($_POST['btn_submit'])){
        $this->load->model('reports/report_model');
        $extraData['sales_tot'] = $this->report_model->getSalesItemWises();
        $extraData['sales_return'] = $this->report_model->getsalesReturnItemWises();
        $extraData['sales_market'] = $this->report_model->getSalesMarketItemWises();
        //$extraData['sales_market'] = $this->report_model->getSalesMarketItemWise();
		}
        $this->template->draw('reports/itemWiseSalesOrderReport', false, $extraData);
    }

    public function getProdcutDetail($product_id) {
        $this->load->model('reports/report_model');
        $prodcutDetail = $this->report_model->getProdcutDetails($product_id);
        return $prodcutDetail;
    }

 /*   public function getSlaesQty($product_id) {
        $this->load->model('reports/report_model');
        $prodcutDetail = $this->report_model->getSlaesQtys($product_id);
        return $prodcutDetail;
    }*/

  public function getSlaesQty($product_id,$id_physical) {
        $this->load->model('reports/report_model');
        $prodcutDetail = $this->report_model->getSlaesQtys($product_id, $id_physical);
        return $prodcutDetail;
    }


    public function getReturnQty($product_id, $return_type) {
        $this->load->model('reports/report_model');
        $slaesQty = $this->report_model->getReturnQtys($product_id, $return_type);
        return $slaesQty;
    }

    public function getEmployeNamesbyStores() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee_has_place','id_physical_place');
        $result = $this->report_model->getEmployeNamesbyStores($q, $column);
        $no_result = array('label' => 'no result founds...');
        if ($result != NULL) {
            echo json_encode($result);
        }else{
        echo json_encode($no_result);
        }
    }

    public function search_by_division_name_for_sales_order() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('division_name', 'id_division');
        $result = $this->report_model->getdivisionNames($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
	
	    public function get_employee_names_for_daily_items() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('full_name', 'id_employee_has_place','id_physical_place');
        $result = $this->report_model->get_employee_names_for_daily_items($q, $column);
        echo json_encode($result);
    }


/*
     * Sales Order Report- Distributor Autocomplete
     * 
     * @author Faazy ahamed
     * @contact faaziahamed@gmail.com
     */
    
    
      public function getDstributorforsalesReport() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('employee_first_name', 'id_employee_has_place', 'id_physical_place');
        $result = $this->report_model->getDstributorforsalesReport($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }


	public function drowIndex_poder_details(){
        $this->template->attach($this->resours);
        $this->template->draw('reports/Index_poder_details', true);
    }
            
    public function viewpurchaseing_detais(){
        $this->load->model('reports/report_model');
        $Purchaseing_detais = $this->report_model->getviewPurchaseing_detais($_REQUEST);
        $this->template->draw('reports/viewpurchaseing_detais', false,$Purchaseing_detais);
    } 
    
    public function drawIndexManagePurchase() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexManagePurchaseOrder', true);
    }

    public function drawManagePurchase() {
        if(isset($_POST['search_data'])){
        $this->load->model('reports/report_model');
        $purchaseDetails = $this->report_model->purchaseDetails();
        }
        $this->template->draw('reports/searchPurchaseOrder', false,$purchaseDetails);
    }
    
    public function getPurchaseOrderNofor_report() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('purchase_order_number', 'id_purchase_order');
        $result = $this->report_model->getPurchaseOrderNoData($q, $column);
        echo json_encode($result);
    }
    public function getPurchaseOrderNo_employesNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('employee_first_name', 'id_employee_has_place');
        $result = $this->report_model->getPurchaseOrderNo_employes($q, $column);
        echo json_encode($result);
    }
    public function getBrand_for_stock_availability(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('brand_name', 'item_brand_id');
        $result = $this->report_model->getBrand_for_stock_availability($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    /*
     * gps map new filetrs
     */
    
    public function getRegions(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/report_model');
        $column = array('territory_name', 'id_territory','territory_hierarchy');
        $result = $this->report_model->getRegions($q, $column);
        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
    
    public function getAreas(){
        $data = $_POST['data'];
        $this->load->model('reports/report_model');
        $result = $this->report_model->getAreas($data);
        
    }
    
    
    public function getDistributor(){
        $this->load->model('reports/report_model');
        $Purchaseing_detais = $this->report_model->getDistributor();
    }
    
    




    /*
     * end filters
     */
    
}

?>

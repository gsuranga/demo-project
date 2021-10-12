<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reports
 *
 * @author Iresha Lakmali
 */
class reports extends C_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('reports/reports_model');
    }

    private $resours = array(
        'JS' => array('reports/js/reports', 'reports/dealer_ranking/js/jquery.mtz.monthpicker','reports/dealer_profile_report/js/delr', 'reports/dealer_ranking/js/getSales', 'reports/salesman_wise_summary/js/salesman_summary', 'reports/field_sales_report/js/report_js', 'reports/target_part_number_wise_overall/js/sales_report', 'reports/sales_officer_monthly_target/js/sales_report_monthly', 'reports/loss_sales/js/loss_sales','reports/payment/js/pay', 'reports/dealers_sales_report/js/dealer_sales_report', 'reports/dealers_all_sales_report/js/dealers_all_sales_report',
            'reports/dlr_report/js/dlr', 'reports/dealer_wise_target/js/dealer_target', 'reports/competitorParts/js/com', 'reports/dateWiseLossSalesRpt/js/dwlsr', 'reports/dealerWiseLossSalesRpt/js/dlrwlsr'),
        'CSS' => array('reports/css/actual_parts_count', 'reports/css/tsc_pagination', 'reports/salesman_wise_summary/css/sales_report', 'reports/dealer_ranking/css/dealer_ranking_css'),);

    public function drawIndexReport() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/index_report', true);
    }

    public function drawTotalCost() {
        $this->load->model('reports/reports_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "reports/drawIndexReport";
        $config["total_rows"] = $this->reports_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationB tsc_paginationB02">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';


        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $extraData["links"] = $this->pagination->create_links();
        $extraData["results"] = $this->reports_model->getAllTotalCost($config["per_page"], $page);
        $this->template->draw('reports/get_all_total_cost', false, $extraData);
    }

    public function drawIndexSalesValue() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/index_sales_value', true);
    }

    public function drawTotalSalesValue() {
        $this->load->model('reports/reports_model');
        $this->load->library("pagination");
        $config = array();
        $config["base_url"] = base_url() . "reports/drawIndexSalesValue";
        $config["total_rows"] = $this->reports_model->record_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 3;
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);

        $config['full_tag_open'] = '<ul class="tsc_pagination tsc_paginationB tsc_paginationB02">';
        $config['full_tag_close'] = '</ul>';
        $config['prev_link'] = '&lt;';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&gt;';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="current"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['first_link'] = '&lt;&lt;';
        $config['last_link'] = '&gt;&gt;';

        $this->pagination->initialize($config);
        $page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
        $extraData["links"] = $this->pagination->create_links();
        $extraData["results"] = $this->reports_model->getAllSalesValue($config["per_page"], $page);
        $this->template->draw('reports/get_all_sales_value', false, $extraData);
    }

    public function drawIndexSalesReport() {
        $this->template->draw('reports/index_sales', true);
    }

    public function drawIndexSales() {
        $this->template->draw('reports/index_sales', true);
    }

    public function drawSalesReport() {
        //$this->load->model('reports/reports_model');
        // $salesReport = $this->reports_model->salesReport();
        $this->template->draw('reports/sales_report', false, $salesReport);
    }

    public function darwIndexGrossProfitMargin() {
        $this->template->draw('reports/index_gross_profit_margin', true);
    }

    public function drawGrossProfitMargin() {
        $this->load->model('reports/reports_model');
        $grossProfitMargin = $this->reports_model->grossProfitMargin();
        $this->template->draw('reports/gross_profit_margin', false, $grossProfitMargin);
    }

    public function drawIndexSalesManLocationCount() {
        $this->template->draw('reports/index_sales_man_location_count', true);
    }

    /* --------------------------------sales reports-------------------------------------------------------------- */

    public function drawIndexSalesOfficerWiseSummary() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/salesman_wise_summary/index_salesman_wise_report', true);
    }

    public function drawSalesOfficerWiseSummary() {

        //$selected_date = $_REQUEST['summary_date'];
        $this->load->model('salesofficer/salesofficer_model');
        //$sales = $this->reports_model->getSalesOfficerSales($selected_date);
        $allSalesType = $this->salesofficer_model->viewAllSalesType();
        $extraData['all_sales_types'] = $allSalesType;

        //$budgets = $this->reports_model->getSalesOfficerBudgets($selected_date);
        //$array_merge = array_merge($sales, $budgets);
        $this->template->draw('reports/salesman_wise_summary/salesman_wise_report', false, $extraData);
    }

    public function drawIndexDailySalesSummary() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/salesman_wise_summary/index_salesman_daily_summary', true);
    }

    public function drawDailySalesSummary() {
        $sales_type_id = isset($_POST['sales_type1']) ? $_POST['sales_type1'] : 0;
        $this->load->model('salesofficer/salesofficer_model');
        $this->load->model('reports/reports_model');
        $allSalesType = $this->salesofficer_model->viewAllSalesType();
        $extraData['all_sales_types'] = $allSalesType;
        if ($sales_type_id == 0) {

            $dailySummary = $this->reports_model->getDailySalesSummary($_POST, $sales_type_id);

            $extraData['daily_summary'] = $dailySummary;
            $extraData['selected_date'] = isset($_POST['daily_summary_date']) ? $_POST['daily_summary_date'] : '';
            $extraData['selected_month'] = "Month";
            $this->template->draw('reports/salesman_wise_summary/salesman_daily_summary', false, $extraData);
        } else if ($sales_type_id == 1 || $sales_type_id == 2) {
            $dailySummary = $this->reports_model->getDailySalesSummary($_POST, $sales_type_id);
            $extraData['daily_summary'] = $dailySummary;
            $extraData['selected_date'] = isset($_POST['daily_summary_date']) ? $_POST['daily_summary_date'] : '';
            $extraData['selected_month'] = date('F', strtotime(isset($_POST['daily_summary_date']) ? $_POST['daily_summary_date'] : ''));
            $this->template->draw('reports/salesman_wise_summary/salesman_daily_summary', false, $extraData);
        } else if ($sales_type_id == 4) {
            $dailySummary = $this->reports_model->getWorkshopSalesDailySummary($_POST);
            $extraData['daily_summary'] = $dailySummary;
            $extraData['selected_date'] = isset($_POST['daily_summary_date']) ? $_POST['daily_summary_date'] : '';
            $extraData['selected_month'] = date('F', strtotime(isset($_POST['daily_summary_date']) ? $_POST['daily_summary_date'] : ''));
            $this->template->draw('reports/salesman_wise_summary/workshop_daily_summary', false, $extraData);
        }
    }

    /* --------------------------------sales reports-------------------------------------------------------------- */

    public function drawSalesManLocationCount() {
        $this->load->model('reports/reports_model');
        $salesReport = $this->reports_model->salesManLocationCount();
        $this->template->draw('reports/sales_man_location_count', false, $salesReport);
    }

    /* ----------------------DLR REPORT : Dinesh-------------------------------------- */

    public function drawIndexDLR_Report() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dlr_report/index_dlr_report', true);
    }

    public function drawDLR_Report() {
        //$this->load->model('reports/reports_model');
        $exra_data = $this->reports_model->generateDLR_Report($_POST);
        $exra_data['areas'] = $this->reports_model->get_area();

        $this->template->draw('reports/dlr_report/view_dlr_report', false, $exra_data);
    }
//new 2015-11-3--------

    public function drawIndex_payment_Report() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/payment/index_payment_report', true);
    }

    public function drawpayment_Report(){
         
        $status='';
        $branch='';
        $start='';
        $area='';
    if(isset($_REQUEST['status']) || isset($_REQUEST['dlr_start_date'])  || isset($_REQUEST['dlr_end_date'])){
            
             $status= $_REQUEST['status'];
            echo  $stdate  =   $_REQUEST['dlr_start_date'];
            echo $enddate  =   $_REQUEST['dlr_end_date'];
        }
        $acc = '';
        
        if(isset($_REQUEST['accno']) || isset($_REQUEST['select_area']) || isset($_REQUEST['select_branch']) ){
          $acc = $_REQUEST['accno'];
          $aso  =   $_REQUEST['select_area'];
          $branch = $_REQUEST['select_branch'];
          
          $type_name = $this->session->userdata('typename');
         
          if ($type_name == "Sales Officer") {
          $aso = $type_name = $this->session->userdata('employe_id');
          }
    
        $exra_data['datareturn'] = $this->reports_model->paymentreportreturn($acc,$status,$aso,$stdate,$enddate);
        $exra_data['data'] = $this->reports_model->paymentreport1($acc,$status,$aso,$stdate,$enddate);
        $exra_data['chechk'] = $this->reports_model->paymentcheck($acc,$status,$aso,$stdate,$enddate);
        $exra_data['deposit'] = $this->reports_model->paymentbankdep($acc,$status,$aso,$stdate,$enddate);
        }
       //echo $aso = $_REQUEST['dlr_start_date'];
       //echo $dealr = $_REQUEST['dealername'];
        $exra_data['branch'] = $this->reports_model->get_branch();
        $exra_data['asoo'] = $this->reports_model->getAso();
       //$exra_data['aso'] = $this->reports_model->get_aso();
        $this->template->draw('reports/payment/view_payment_report', false, $exra_data);
    }
    
        public function draw_aso(){
        $branch_id=$_REQUEST['id'];
        $this->load->model('reports/reports_model');
        $exra_data['aso'] = $this->reports_model->get_aso($branch_id);
        $this->template->draw('reports/payment/load_aso', false, $exra_data);
    }
    
        public function get_Names(){
        $q = strtolower($_GET['term']);
        $this->load->model('delars_stock_report/delars_stock_report_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $result = $this->delars_stock_report_model->get_Name($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }
      
    
    //get_Name_perDealer
     public function get_Name_perDealer() {
        $q = strtolower($_GET['term']);
         $this->load->model('reports/reports_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        
        $type_name = $this->session->userdata('typename');
        $emp_id = 0;
        if ($type_name == "Sales Officer") {
            $emp_id = $type_name = $this->session->userdata('employe_id');
        }
        
        $result = $this->reports_model->get_Name($q, $column,$emp_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAccNoo() {
        $q = strtolower($_GET['term']);
        $this->load->model('delars_stock_report/delars_stock_report_model');
        $column = array('delar_account_no', 'delar_name', 'delar_id',);
        $result = $this->delars_stock_report_model->getAccNo($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

//end
    //----------------------new edit-------------------------------------------------------------------

    public function competitorPart_Report() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/competitorParts/index_competitorPart_Report', TRUE);
    }
    public function dealer_profile_report(){
       $this->template->attach($this->resours);
       $this->template->draw('reports/dealer_profile_report/index_dealer_profile', TRUE);
        
    }
    public function draw_dealer_profile_Report(){
       $this->load->model('reports/reports_model');
       $viewdealerprof = $this->reports_model->dealer_profile();
       $this->template->draw('reports/dealer_profile_report/draw_dealer', false,$viewdealerprof);
    }

    public function draw_competitorPart_Report() {

        $this->load->model('reports/reports_model');
        $viewCompetitorParts = $this->reports_model->viewCompetitorParts();
        $this->template->draw('reports/competitorParts/view_competitorPart_Report', false, $viewCompetitorParts);
    }

    //----------------------end edit--- and new.: Dealer wise loss sales report----------------------------------------------------------------

    public function dealer_wise_loss_sales_rpt() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dealerWiseLossSalesRpt/indexdealerWiseLossSalesRpt', TRUE);
    }

//    public function draw_dealer_wise_loss_sales_rpt() {
//        $this->load->model('reports/reports_model');
//         $delalerWlossSales = $this->reports_model->delalerWlossSales();
//        $this->template->draw('reports/dealerWiseLossSalesRpt/drawdealeWiseLossSalesRpt', false,$delalerWlossSales);
//    }
    //new edit
    public function draw_dealer_wise_loss_sales_rpt() {
        $this->load->model('reports/reports_model');
         $delalerWlossSales['a'] = $this->reports_model->delalerWlossSalesfromPur();
         $delalerWlossSales['b'] = $this->reports_model->delalerWlossSalesfromAllS();
        $this->template->draw('reports/dealerWiseLossSalesRpt/drawdealeWiseLossSalesRpt', false,$delalerWlossSales);
    }

    //----end for .:Dealer wise loss sales report ----------------------------------------------
    //----------------------end edit--- and new.: Date wise loss sales report----------------------------------------------------------------
    //------------------------------------------------------------------------------

    public function getAllcomParts() {
        $q = strtolower($_GET['term']);

        $this->load->model('reports/reports_model');
        //$column = array('item_part_no','description', 'model','sales_officer_name','delar_account_no');
        $column = array('item_part_no', 'description', 'model');
        $result = $this->reports_model->getAllcomParts($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //getdatefromvalue -----------------------1:05 PM 10/1/2015-----------------------------------------------------
    public function getdatefromvalue() {
        $q = strtolower($_GET['valufrom']);

        $this->load->model('reports/reports_model');
        //$column = array('item_part_no','description', 'model','sales_officer_name','delar_account_no');
        $column = array('date','invoice','date_edit','time');
        $result = $this->reports_model->getdatefromvalue($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //getDealrWLoss---getDealrWLoss?sales_officer----------------------------------------------------
    public function getDealrWLoss() {
        $asoo = $this->input->get('salofficer');
        $porder = $this->input->get('po');
        $invo = $this->input->get('invo');

        $this->load->model('reports/reports_model');
        $data_set = array();
        $viewAcceptedOrders = $this->reports_model->getDealrWLossPur($asoo, $porder,$invo);
//        $viewAcceptedOrders['b'] = $this->reports_model->getDealrWLossinvo($asoo, $porder,$invo);
//        $viewAcceptedOrders = $this->reports_model->getDealrWLoss1($asoo, $porder,$invo);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }
   
    public function getDealrWLossT() {
        $asoo = $this->input->get('salofficer');
        $porder = $this->input->get('po');
        $invo = $this->input->get('invo');

        $this->load->model('reports/reports_model');
        $data_set = array();
//        $viewAcceptedOrders['a'] = $this->reports_model->getDealrWLossPur($asoo, $porder,$invo);
        $viewAcceptedOrders = $this->reports_model->getDealrWLossinvo($asoo, $porder,$invo);
//        $viewAcceptedOrders = $this->reports_model->getDealrWLoss1($asoo, $porder,$invo);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }

    //-----------------------  =============================================================================== 
    //getSalesOfficer
    public function getSalesOfficer() {
        $q = strtolower($_GET['term']);

        $this->load->model('reports/reports_model');
        $column = array('sales_officer_name');
        $result = $this->reports_model->getSalesOfficer($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //dealer get
    public function getDealerAcc() {
        $q = strtolower($_GET['term']);

        $this->load->model('reports/reports_model');
        $column = array('delar_account_no', 'delar_id', 'sales_officer_name','delar_name');
        $result = $this->reports_model->getDealerAcc($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //getDealerName
    public function getDealerName() {
        $q = strtolower($_GET['term']);

        $this->load->model('reports/reports_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id', 'sales_officer_name');
        $result = $this->reports_model->getDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getCompPartSearch() {

        $id = $_REQUEST['hidden_dealer_id'];
        /* new  */$start = $this->input->get('start');
        /* new  */ $end = $this->input->get('endd');
        $part = $_REQUEST['parts'];
        $aso = $_REQUEST['asowise'];


        $this->load->model('reports/reports_model');
        $data_set = array();
        $viewAcceptedOrders = $this->reports_model->getCompPartSearch1($id, $start, $end, $part, $aso);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }
    
    //paymentreport
//    public function paymentreport(){
//        $this->load->model('tour_itenerary_daily/tour_itenerary_daily_model');
//        $dailys = $this->reports_model->paymentreport1($id,$part,$aso);
//        
//        $this->template->draw('reports/payment/view_payment_report',false, $dailys); 
//        
//    }

    //---------------------new edit-------------------------------------

    public function getponumbers() {
        $sale = $this->input->get('salesoff');
        $this->load->model('reports/reports_model');
        $data_set = array();
        $viewAcceptedOrders = $this->reports_model->getponumbers($sale);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }
    public function getalldelr() {
        $sale = $this->input->get('del');
        $this->load->model('reports/reports_model');
        $data_set = array();
        $viewAcceptedOrders = $this->reports_model->getalldelr($sale);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }
    public function getalldelrAcc() {
        $sale = $this->input->get('del');
        $this->load->model('reports/reports_model');
        $data_set = array();
        $viewAcceptedOrders = $this->reports_model->getalldelrAcc($sale);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }
    public function getinvoponumbers() {
        $sale = $this->input->get('invo');
        $this->load->model('reports/reports_model');
        $data_set = array();
        $viewAcceptedOrders = $this->reports_model->getinvoponumbers($sale);
        // $viewAllRejectedOrders = $this->dealer_purchase_order_model->viewAllRejectedOrders($id);
        array_push($data_set, $viewAcceptedOrders);
        //array_push($data_set, $viewAllRejectedOrders);
        echo json_encode($data_set);
    }
     public function getpurch() {
        $q = strtolower($_GET['valufrom']);

        $this->load->model('reports/reports_model');
        //$column = array('item_part_no','description', 'model','sales_officer_name','delar_account_no');
        $column = array('date','purchase_order_number','date_edit','time');
        $result = $this->reports_model->getpurch($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //dealerfromofsr()
    //
//    public function getDealerForOfficer(){
//       $q = strtolower($_GET['term']);
//        
//        $this->load->model('reports/reports_model');
//        $column = array('delar_account_no','delar_account_no');
//        $result = $this->reports_model->getDealerForOfficer($q, $column);
//        $no_result = array('label' => 'no result found');
//        if (count($result) > 0) {
//            echo json_encode($result);
//        } else {
//            echo json_encode($no_result);
//        }  
//        
//        
//    }
    //--------------------------------------------------------------------------------------------
    public function date_wise_loss_sales_rpt() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dateWiseLossSalesRpt/indexDateWiseLossSalesRpt', TRUE);
    }

    public function draw_date_wise_loss_sales_rpt() {
        $this->template->draw('reports/dateWiseLossSalesRpt/drawDateWiseLossSalesRpt', false);
    }

    //----end for .:Date wise loss sales report ----------------------------------------------




    /* ----------------------DLR REPORT : Dinesh-------------------------------------- */


    /* DLR OLD-------------------------------------------------------
     *    public function drawIndexIp1Report() {
      $this->template->attach($this->resours);
      $this->template->draw('reports/indexIp1Report', true);
      }

      public function drawIp1Report() {

      $this->load->model('reports/reports_model');
      $ip1Report = $this->reports_model->ip1Report();
      $this->template->draw('reports/ip1Report', false, $ip1Report);
      }

      public function drawIndexSampleIp1Report() {
      $this->template->attach($this->resours);
      $this->template->draw('reports/indexSampleIp1Report', true);
      }

      public function drawSampleIp1Report() {

      $this->load->model('reports/reports_model');
      $extraData['ip1Report'] = $this->reports_model->sample_ip1Report();
      $extraData['ip1Report_zq'] = $this->reports_model->sample_ip1Report_zq();
      $this->template->draw('reports/ip1SampleReport', false, $extraData);
      }

      public function drawIndexSampleIp1ReportFinal() {
      $this->template->attach($this->resours);
      $this->template->draw('reports/indexSampleIp1ReportReport', true);
      }

      public function drawSampleIp1ReportFinalSearch() {
      $this->load->model('reports/reports_model');
      $areas = $this->reports_model->get_area();
      $this->template->draw('reports/ip1SampleReportFinalSearch', false, $areas);
      }

      public function drawSampleIp1ReportFinal() {
      $this->load->model('reports/reports_model');
      if (isset($_REQUEST['area_id']) && $_REQUEST['area_id'] != '') {
      $extraData['tata'] = $this->reports_model->finalIp1ReportTata($_REQUEST['area_id']);
      $extraData['non_tata'] = $this->reports_model->finalIp1ReportNonTata($_REQUEST['area_id']);
      $extraData['vsd'] = $this->reports_model->finalIp1ReportVSD($_REQUEST['area_id']);
      $extraData['vsdofnotl'] = $this->reports_model->finalIp1ReportVSDNotLikeL($_REQUEST['area_id']);
      $this->template->draw('reports/ip1SampleReportFinal', false, $extraData);
      } else {
      $this->template->draw('reports/ip1SampleReportFinal', false);
      }
      } */

//------------------Campaign Report Insaf-----------------------------------------------------

    function drawIndexcampaignReport() {
        // echo 'dssd';
        $this->template->attach($this->resours);

        $this->template->draw('reports/drawIndexcampaignReport', true);
    }

//-----------------------Campaign Report-------------------------------
    function drawViewCampaignReport() {
        $this->load->model('reports/reports_model');
        $extraData['campaigntypes'] = $this->reports_model->getAllCampaignTypes();
        $extraData['salesofficer'] = $this->reports_model->getAllSalesOfficer();
        $extraData['sales_types'] = $this->reports_model->get_sales_type();
        $extraData['totalcampaigns'] = array();
        foreach ($extraData['campaigntypes'] AS $campaigntypes) {
            foreach ($extraData['salesofficer'] AS $salesofficer) {
                $totcampaign = $this->reports_model->getTotalCampaign($campaigntypes->type_description, $salesofficer->sales_officer_id);

                array_push($extraData['totalcampaigns'], array($salesofficer->sales_officer_id, $campaigntypes->type_description, $totcampaign));
            }
        }


        $this->template->draw('reports/drawViewCampaignReport', false, $extraData);
    }

    function gettotplanedcampaignforajax() {

        $this->load->model('reports/reports_model');
        $extraData['campaigntypes'] = $this->reports_model->getAllCampaignTypes();
        $extraData['salesofficer'] = $this->reports_model->getAllSalesOfficer();
        $extraData['totalcampaigns'] = array();

        $types = '';
        foreach ($extraData['campaigntypes'] AS $val) {
            $types .="'" . $val->type_description . "',";
        }
        $f = substr($types, 0, -1);
        //echo $f;

        foreach ($extraData['campaigntypes'] AS $campaigntypes) {
            foreach ($extraData['salesofficer'] AS $salesofficer) {
                $totcampaign = $this->reports_model->getTotalCampaign($campaigntypes->type_description, $salesofficer->sales_officer_id);

                array_push($extraData['totalcampaigns'], array($salesofficer->sales_officer_id, $campaigntypes->type_description, $totcampaign));
            }
        }


        foreach ($extraData['salesofficer'] AS $salesofficer) {

            $totcampaign = $this->reports_model->getTotalCampaignforother($f, $salesofficer->sales_officer_id);
            array_push($extraData['totalcampaigns'], array($salesofficer->sales_officer_id, 'other', $totcampaign));
            // array_push($extraData['totalcampaigns'], array($salesofficer->sales_officer_id, $campaigntypes->type_description, $totcampaign));
        }

        echo json_encode($extraData['totalcampaigns']);
    }

    function gettotcompletedcampaignforajax() {
        $this->load->model('reports/reports_model');
        $extraData['campaigntypes'] = $this->reports_model->getAllCampaignTypes();
        $extraData['salesofficer'] = $this->reports_model->getAllSalesOfficer();
        $extraData['totalcampaigns'] = array();

        $types = '';
        foreach ($extraData['campaigntypes'] AS $val) {
            $types .="'" . $val->type_description . "',";
        }
        $f = substr($types, 0, -1);
        //echo $f;

        foreach ($extraData['campaigntypes'] AS $campaigntypes) {
            foreach ($extraData['salesofficer'] AS $salesofficer) {
                $totcampaign = $this->reports_model->getTotalCompletedCampaign($campaigntypes->type_description, $salesofficer->sales_officer_id);

                array_push($extraData['totalcampaigns'], array($salesofficer->sales_officer_id, $campaigntypes->type_description, $totcampaign));
            }
        }


        foreach ($extraData['salesofficer'] AS $salesofficer) {

            $totcampaign = $this->reports_model->getTotalCompletedCampaignforother($f, $salesofficer->sales_officer_id);
            // print_r($totcampaign);
            array_push($extraData['totalcampaigns'], array($salesofficer->sales_officer_id, 'other', $totcampaign));
            // array_push($extraData['totalcampaigns'], array($salesofficer->sales_officer_id, $campaigntypes->type_description, $totcampaign));
        }
        // print_r($extraData['totalcampaigns']);
        echo json_encode($extraData['totalcampaigns']);
    }

    public function get_aso_for_st() {
        $sales_type_id = $this->input->get('sales_type_id');
        $this->load->model('reports/reports_model');
        $aso_ids = $this->reports_model->get_aso_for_st($sales_type_id);
        $detail_array = array();
        foreach ($aso_ids AS $ty) {
            array_push($detail_array, $ty->soid);
        }

        echo json_encode($detail_array);
    }

//------------------------------------------------------------------------------------------------------------

    public function drawIndexDealerRanking() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dealer_ranking/index_dealer_ranking', true);
    }

    public function drawDealerRanking() {
        $this->template->attach($this->resours);
        //$this->form_validation->set_rules('ranking_month_picker', 'Month', 'required');
        //if ($this->form_validation->run()) {
        $this->load->model('dealer_ranking/dealer_ranking_sales');
        $monthlySales = $this->dealer_ranking_sales->monthlySales($_POST);
        $this->template->draw('reports/dealer_ranking/dealer_ranking_report', false, $monthlySales);
//        } else {
//            $this->drawIndexDealerRanking();
//        }
    }

    public function drawDealerRankingView() {

        $this->load->model("dealer_ranking/dealer_ranking_sales");
        $result = $this->dealer_ranking_sales->monthlySales($_REQUEST);
        $rs = json_encode($result);
        print_r($rs);
    }

    public function drawFieldSalesIndex() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/fieldSalesIndex', true);
    }

    public function drawFieldSales() {
        $this->load->model('reports/reports_model');
        $areas = $this->reports_model->get_field_sales();
        $this->template->draw('reports/drawFieldSales', false, $areas);
    }

    //--------------------Campaign Effectivness-----------------------
    //------------------------------Campaign Chart----------------------------------------
    public function indexchart() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/indexchart', TRUE);
    }

    public function drawIndexcampaignChart() {
        $c_id = $this->input->get('c_id');
        $finishedate = $this->input->get('finishedate');
        $this->load->model('reports/reports_model');
        $extraData['atpromotion'] = $this->reports_model->atTheTimePromotion($c_id, $finishedate, -1);
        $extraData['firstmonth'] = $this->reports_model->monthlyTheTimePromotion($c_id, $finishedate, +1);
        $extraData['secondmonth'] = $this->reports_model->monthlyTheTimePromotion($c_id, $finishedate, +2);
        $extraData['thiredmonth'] = $this->reports_model->monthlyTheTimePromotion($c_id, $finishedate, +3);
        // print_r($extraData['secondmonth']);
        $this->template->draw('reports/IndexReportChart', false, $extraData);
    }

    public function drawIndexcampaigneffectiveness() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/drawIndexcampaigneffectiveness', TRUE);
    }

    public function drawViewIndexcampaigneffectiveness() {
        $this->load->model('reports/reports_model');
        $data = $this->reports_model->getfinishedcampaignforcreatechart();
        // print_r($data);
        $this->template->draw('reports/drawViewIndexcampaigneffectiveness', FALSE, $data);
    }

//-------------------------------------------Sales Man Wise Profibility---------------------------------
    public function drawIndex_salesman_wise_Profitability() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/drawIndex_salesman_wise_Profitability', TRUE);
    }

    public function drawIndex_View_salesman_wise_Profitability() {
        $this->template->draw('reports/drawIndex_View_salesman_wise_Profitability', FALSE);
    }

    public function get_sales_officer() {

        $q = strtolower($_GET['term']);
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $column = array('sales_officer_account_no', 'sales_officer_id', 'sales_officer_name', 'sales_officer_code');
        $result = $this->sales_officer_pur_order_model->getSalesOfficer($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_sales_officer_by_name() {

        $q = strtolower($_GET['term']);
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $column = array('sales_officer_name', 'sales_officer_id', 'sales_officer_account_no', 'sales_officer_code');
        $result = $this->sales_officer_pur_order_model->getSalesOfficerByName($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    function insert_proft_to_database() {
        $this->load->model('reports/reports_model');
        $sales_id = $this->input->get('sales_id');
        $year = $this->input->get('year');

        $data = $this->reports_model->profit_insert_to_db($sales_id, $year);
    }

    function getdataforfilltable() {
        $dalesOfficerID = $this->input->get('salesofficer');
        $year = $this->input->get('year');
        $sales_code = $this->input->get('sales_code');
        $this->load->model('reports/reports_model');
        $detail = $this->reports_model->getdataforfilltable($dalesOfficerID, $year);

        echo json_encode($detail);
        // print_r($detail);
        //echo $year;
    }

    function getsalesdetail() {
        $year = $this->input->get('year');
        $sales_code = $this->input->get('sales_code');
        $this->load->model('reports/reports_model');
        $sales = $this->reports_model->getSales($year, $sales_code);
        echo json_encode($sales);
    }

    //profitability report
    public function drawView_Profitability_aso() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/index_profitability_aso', TRUE);
    }

    public function Viewprofitability_ASO() {
        $this->load->model('reports/reports_model');
        $extraData['salesofficer'] = $this->reports_model->getSalesOfficerForSummery();
        $this->template->draw('reports/viewProfitability_ASO', false, $extraData);
    }

    public function getsummeryDetail() {
        $finelArray = Array();
        $accualArray = Array();
        $budgectArray = Array();
        $iouArray = Array();
        $salesoffficer = Array();
        $year = $this->input->get('year');
        $this->load->model('reports/reports_model');
        $salesOfficer = $this->reports_model->getSalesOfficerForSummery();
        // print_r($salesOfficer);
        foreach ($salesOfficer AS $val) {
            $turnOver = $this->reports_model->getSales($year, $val->sales_officer_code);
            foreach ($turnOver AS $turn) {
                $AcctualturnValue = $turn->Turn_over;
                $month = explode("-", $turn->dat);
                $summMonth = $month[1];
                $subAccualArray = Array($val->sales_officer_id, $AcctualturnValue, $summMonth);
                array_push($accualArray, $subAccualArray);
            }

            $budgectTurnOver = $this->reports_model->getBudgectTurnOver($year, $val->sales_officer_id);
            foreach ($budgectTurnOver AS $bug) {
                $budgectturn = $bug->turn_over;
                $months = $bug->month;
                $subBudgectArray = Array($val->sales_officer_id, $budgectturn, $months);
                array_push($budgectArray, $subBudgectArray);
            }
            $IOU = $this->reports_model->getIOU($year, $val->sales_officer_id);
            foreach ($IOU AS $viou) {
                $ious = $viou->IOU;
                $month2 = $viou->month;
                $type = $viou->type;
                $subiouarray = Array($val->sales_officer_id, $ious, $type, $month2);
                array_push($iouArray, $subiouarray);
            }
            array_push($salesoffficer, $val->sales_officer_id);
        }
        array_push($finelArray, $budgectArray, $accualArray, $iouArray, $salesoffficer);
        echo json_encode($finelArray);
    }

//---------------------------Part No wise Overall target-----------------------------------------------


    public function draw_index_select_month() {

        $this->template->attach($this->resours);
        $this->template->draw('reports/target_part_number_wise_overall/index_select_month', true);
    }

    public function draw_select_month() {

        $this->template->attach($this->resours);
        $this->template->draw('reports/target_part_number_wise_overall/select_month', false);
    }

    public function draw_index_part_number_wise_overall() {

        $this->template->attach($this->resours);
        $this->template->draw('reports/target_part_number_wise_overall/index_part_number_wise_overall', TRUE);
    }

    public function draw_part_number_wise_overall() {

        $month = $_REQUEST["month_picker"];
        $this->load->model('parts_number_wise_report/parts_number_wise_report');
        $all_row_result = $this->parts_number_wise_report->part_no_overall($month);

        $this->template->attach($this->resours);
        $this->template->draw('reports/target_part_number_wise_overall/part_number_wise_overall', FALSE, $all_row_result);
    }

//---------------------------Part No wise, Sales Officer wise target-----------------------------------------------

    public function draw_index_sales_officer_monthly_target() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_officer_monthly_target/index_sales_officer_monthly_target', true);
    }

    public function draw_sales_officer_monthly_target() {
        $selected_month = '2014-04';
        $userdata_typeid = $this->session->userdata('typeid');
        $userdata_employe_id = $this->session->userdata('employe_id');
        $this->load->model('sales_officer_monthly_target/sales_officer_monthly_target_model');
        $result = $this->sales_officer_monthly_target_model->abc($userdata_typeid, $userdata_employe_id, $selected_month);

        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_officer_monthly_target/sales_officer_monthly_target', false, $result);
    }

    public function draw_index_sales_officer_monthly_target_month() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_officer_monthly_target/index_sales_officer_monthly_target_month', true);
    }

    public function draw_sales_officer_monthly_target_month() {
        $selected_month = $_REQUEST['month_selected'];
        $userdata_typeid = $this->session->userdata('typeid');
        $userdata_employe_id = $this->session->userdata('employe_id');
        $this->load->model('sales_officer_monthly_target/sales_officer_monthly_target_model');
        $result = $this->sales_officer_monthly_target_model->abc($userdata_typeid, $userdata_employe_id, $selected_month);

        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_officer_monthly_target/sales_officer_monthly_target', false, $result);
    }

//----------------------------------------field sales summary-----------------------------------------viduranga
    public function drawIndexDealerSalesReport() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/field_sales_report/index_report', true);
    }

    public function drawReport() {
        $this->load->model('reports/reports_model');
        $extraData = $this->reports_model->viewrDealerSalesReport();
        $this->template->draw('reports/field_sales_report/viewReport', false, $extraData);
    }

//-----------------------------Loss Sales Report-------------------------------//

    public function draw_index_loss_sales(){
        $this->template->attach($this->resours);
        $this->template->draw('reports/loss_sales/draw_index_loss_sales', TRUE);
    }

    public function draw_loss_sales(){
        $this->load->model('loss_sales/loss_sales_model');
        $result = $this->loss_sales_model->loss_sales();

        $this->template->attach($this->resours);
        $this->template->draw('reports/loss_sales/draw_loss_sales', FALSE, $result);
    }

//----------------------------------------Dealer Sales : Pavithra-----------------------------------------------------

    public function drawIndexDealersSalesReport() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dealers_sales_report/index_dealers_sales', true);
    }

    public function drawdealersSalesReport() {

        $this->form_validation->set_rules('dealername', 'Name', 'required');
        $this->form_validation->set_rules('accno', 'Account number', 'required');
        $this->form_validation->set_rules('start_date_name', ' Date', 'required');
        $this->form_validation->set_rules('end_date_name', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->template->draw('reports/dealers_sales_report/view_dealers_sales', false);
        } else {

            $this->load->model('reports/reports_model');
            $viewAll = $this->reports_model->getDealerSales($_REQUEST);

            // print_r($_REQUEST);
            $this->template->draw('reports/dealers_sales_report/view_dealers_sales', false, $viewAll);
        }
    }

    public function get_Name() {
        $q = strtolower($_GET['term']);

        $this->load->model('reports/reports_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $type_name = $this->session->userdata('typename');
        $emp_id = 0;
        if ($type_name == "Sales Officer") {
            $emp_id = $type_name = $this->session->userdata('employe_id');
        }
        $result = $this->reports_model->get_Name($q, $column, $emp_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAccNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/reports_model');
        $column = array('delar_account_no', 'delar_name', 'delar_id',);
        $type_name = $this->session->userdata('typename');
        $emp_id = 0;
        if ($type_name == "Sales Officer") {
            $emp_id = $type_name = $this->session->userdata('employe_id');
        }
        $result = $this->reports_model->getAccNo($q, $column, $emp_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

//----------------------------------------Dealer Sales : Pavithra-----------------------------------------------------
    //----------------------------------------Dealer Movement : Pavithra---------------------------------------------------
    public function drawIndexDealersAllSalesReport() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dealers_all_sales_report/index_dealers_all_sales', true);
    }

    public function drawdealersAllSalesReport() {

        $this->form_validation->set_rules('dealername', 'Name', 'required');
        $this->form_validation->set_rules('accno', 'Account number', 'required');
        $this->form_validation->set_rules('start_date_name', ' Date', 'required');
        $this->form_validation->set_rules('end_date_name', 'Date', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->template->draw('reports/dealers_all_sales_report/view_dealers_all_sales', false);
        } else {


            $this->load->model('reports/reports_model');
            $viewAll = $this->reports_model->getDealerSalesAll($_POST);


            $this->template->draw('reports/dealers_all_sales_report/view_dealers_all_sales', false, $viewAll);
        }
    }

    public function get_Name_of_the_dealer() {
        $q = strtolower($_GET['term']);

        $this->load->model('reports/reports_model');
        $column = array('delar_name', 'delar_id', 'delar_account_no');
        $type_name = $this->session->userdata('typename');
        $emp_id = 0;
        if ($type_name == "Sales Officer") {
            $emp_id = $type_name = $this->session->userdata('employe_id');
        }
        $result = $this->reports_model->get_Name_dealer($q, $column, $emp_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAccNo_of_the_dealer() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/reports_model');
        $column = array('delar_account_no', 'delar_name', 'delar_id',);
        $result = $this->reports_model->getAccNo_dealer($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    //-----------------------Profitability Sales type wise :: Insaf Zakariya----------------
    //-----------------------------get Sales type----------------
    public function get_sales_type() {
        $this->load->model('reports/reports_model');
        return $this->reports_model->get_sales_officer_type();
    }

    //------------get sales officer--------------
    public function get_emp_name() {
        $sales_id = $this->input->get('id');
        $this->load->model('reports/reports_model');
        $sales_de = $this->reports_model->get_emp_name($sales_id);
        echo json_encode($sales_de);
    }

//----------------Get sales officer by type-------------------------//
    public function get_sales_officer_by_type(){
        $type_id = $this->input->get('type');
        $this->load->model('reports/reports_model');
        $sales_de = $this->reports_model->get_sales_officer_by_type($type_id);
        echo json_encode($sales_de);
    }

    //-------------------------------------------SALES MAN WISE RETURN REPORT - OVERALL Iresha------------------------
    public function drawIndexSalesManWiseReturnOverall() {

        $this->template->attach($this->resours);

        $this->template->draw('reports/sales_man_wise_return_overall/index_sales_man_wise_return_overall', true);
    }

    public function drawSalesManWiseReturnOverall() {
        $post_data = $_POST;

        $this->load->model('reports/reports_model');
        $tem = array();
        $tem_form['form_data'] = array();
        $salesManWiseReturnOverall['result_data'] = $this->reports_model->salesManWiseReturnOverall($post_data);
        if (isset($_POST['txt_sales_officer']) && $_POST['txt_sales_officer'] != '' &&
                isset($_POST['txt_sales_officer_acnt_no']) && $_POST['txt_sales_officer_acnt_no'] != '' &&
                isset($_POST['year_picker']) && $_POST['year_picker'] != ''
        ) {

            $tem_form['form_data'] = array(
                $_POST['txt_sales_officer'],
                $_POST['txt_sales_officer_id'],
                $_POST['txt_sales_officer_acnt_no'],
                $_POST['year_picker']
            );
        }

        array_push($tem, $tem_form);
        array_push($tem, $salesManWiseReturnOverall);

        $this->template->draw('reports/sales_man_wise_return_overall/sales_man_wise_return_overall', false, $tem);
    }

    public function get_all_dealer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/reports_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id');
        $result = $this->reports_model->getAllDealerName($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getReturnHashQuantity($sales_officer_id, $start_date, $end_date) {
        $this->load->model('reports/reports_model');
        $returnHashQuantity = $this->reports_model->getReturnHashQuantity($sales_officer_id, $start_date, $end_date);
        return $returnHashQuantity;
    }

    public function getReturnIndividualLine($sales_officer_id, $start_date, $end_date) {
        $this->load->model('reports/reports_model');
        $returnIndividualLine = $this->reports_model->getReturnIndividualLine($sales_officer_id, $start_date, $end_date);
        return $returnIndividualLine;
    }

    public function getCurrentSalesOfficer($sales_officer_id) {
        $this->load->model('reports/reports_model');
        $returnHashQuantity = $this->reports_model->getCurrentSalesOfficer($sales_officer_id);
        return $returnHashQuantity;
    }

    public function get_all_sales_officer_name() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/reports_model');
        $column = array('sales_officer_name', 'sales_officer_account_no', 'sales_officer_id');
        $result = $this->reports_model->getAllSalesOfficerName1($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function get_all_sales_officer_name_acnt_no() {
        $q = strtolower($_GET['term']);
        $this->load->model('reports/reports_model');
        $column = array('sales_officer_account_no', 'sales_officer_name', 'sales_officer_id');
        $result = $this->reports_model->get_all_sales_officer_name_acnt_no($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    //-------------------------------------------SALES MAN WISE RETURN REPORT - OVERALL Iresha------------------------
    //--------------------------------------------DEALER WISE RETURN REPORT - Iresha--------------------------------------------

    public function drawIndexDealerWiseReturn() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dealer_wise_return/index_dealer_wise_return', true);
    }

    public function drawDealerWiseReturn() {
        $post_data = $_POST;
        $this->load->model('reports/reports_model');


        $tem = array();
        $tem_form['form_data'] = array();
        $dealerWiseReturn['result_data'] = $this->reports_model->dealerWiseReturn($post_data);
        if (isset($_POST['txt_dealer_name']) && $_POST['txt_dealer_name'] != '' &&
                isset($_POST['txt_dealer_acnt_no']) && $_POST['txt_dealer_acnt_no'] != '' &&
                isset($_POST['year_picker']) && $_POST['year_picker'] != ''
        ) {

            $tem_form['form_data'] = array(
                $_POST['txt_dealer_name'],
                $_POST['txt_dealer_id'],
                $_POST['txt_dealer_acnt_no'],
                $_POST['year_picker']
            );
        }

        array_push($tem, $tem_form);
        array_push($tem, $dealerWiseReturn);
        $this->template->draw('reports/dealer_wise_return/dealer_wise_return', false, $tem);
    }

    public function get_all_dealer_acnt_no(){
        $q = strtolower($_GET['term']);
        $this->load->model('reports/reports_model');
        $column = array('delar_account_no', 'delar_name', 'delar_id');
        $result = $this->reports_model->getAllDealerAcntNo($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getReturnDealerHashQuantity($dealer_id, $start_date, $end_date) {
        $this->load->model('reports/reports_model');
        $returnDealerHashQuantity = $this->reports_model->getReturnDealerHashQuantity($dealer_id, $start_date, $end_date);
        return $returnDealerHashQuantity;
    }

    public function getCurrentDealer($dealer_id) {
        $this->load->model('reports/reports_model');
        $currentDealer = $this->reports_model->getCurrentDealer($dealer_id);
        return $currentDealer;
    }

    public function getDealerReturnIndividualLine($dealer_id, $start_date, $end_date) {
        $this->load->model('reports/reports_model');
        $dealerReturnIndividualLine = $this->reports_model->getDealerReturnIndividualLine($dealer_id, $start_date, $end_date);
        return $dealerReturnIndividualLine;
    }

    //--------------------------------------------DEALER WISE RETURN REPORT - Iresha--------------------------------------------

    /* -----------------------------------Sales Officer Monthly Target Dealer wise-------------------------------------------------- */

    /**
     * 2014-12-15 1:00 AM
     * @author SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @modified SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @desc Sales Officer Monthly Target Dealer wise;
     * 
     */
    public function drawIndexDealerWiseTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/dealer_wise_target/index_dealer_wise_target', true);
    }

    public function drawDealerWiseTarget() {
        $this->template->draw('reports/dealer_wise_target/view_dealer_wise_target', false);
    }

    public function getTotalDealerWiseTarget() {
        $dealer_id = $_REQUEST['dealer_id'];
        $month = $_REQUEST['date'];
        $main_array = array();
        $allReportData = $this->reports_model->getAllReportData($dealer_id, $month);
        $json_encode = json_encode($allReportData, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }

    /* -----------------------------------Sales Officer Monthly Target Dealer wise-------------------------------------------------- */

    //---------------------------Sales Officer Monthly Target Sales Offficer wise-----------------------------------------------
    /**
     * 2014-12-15 1:00 AM
     * @author SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @modified SHDINESH MADUSHANKA <dinesh@ceylonlinux.lk>
     * @desc Sales Officer Monthly Target Sales Offficer wise;
     * 
     */
    public function drawIndexSalesmanWiseTarget() {
        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_officer_monthly_target/index_sales_officer_monthly_target', true);
    }

    public function drawSalesmanWiseTarget() {
        $userdata_typeid = $this->session->userdata('typeid');
        $userdata_employe_id = $this->session->userdata('employe_id');
        $this->template->attach($this->resours);
        $this->template->draw('reports/sales_officer_monthly_target/sales_officer_monthly_target', false);
    }

    public function get_salesOficerName() {
        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('sales_officer_name', 'sales_officer_id', 'sales_officer_account_no', 'branch_name');
        $result = $this->tour_iteneray_model->get_salesOficerName($q, "sales_officer_name", $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_sales_officer_account_no(){
        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('sales_officer_account_no', 'sales_officer_id', 'sales_officer_name', 'branch_name');
        $result = $this->tour_iteneray_model->get_salesOficerName($q, "sales_officer_account_no", $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getTotalSOWiseTarget() {
        $so_id = $_REQUEST['so_id'];
        $month = $_REQUEST['date'];
        $main_array = array();
        $salesmanWiseData = $this->reports_model->getSalesmanWiseData($so_id, $month);
        $json_encode = json_encode($salesmanWiseData, JSON_FORCE_OBJECT);
        print_r($json_encode);
        return $json_encode;
    }
    
    public function delaC() {
       $sale = $this->input->get('val');
        $this->load->model('reports/reports_model');
        $data_set = array();
        $data_set = $this->reports_model->delaC($sale);
        
        echo json_encode($data_set);
    }
    public function delrN() {
       $sale = $this->input->get('val');
        $this->load->model('reports/reports_model');
        $data_set = array();
        $data_set = $this->reports_model->delrN($sale);
        
        echo json_encode($data_set);
    }
    public function getDelponumbers() {
       $sale = $this->input->get('po');
        $this->load->model('reports/reports_model');
        $data_set = array();
        $viewAcceptedOrders = $this->reports_model->getDelponumbers($sale);
        array_push($data_set, $viewAcceptedOrders);
        echo json_encode($data_set);
    }
    public function getinvoAll() {
       $q = strtolower($_GET['term']);

        $this->load->model('reports/reports_model');
        $column = array('invoice','purchase_order_number');
        $result = $this->reports_model->getinvoAll($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }
     

}

?>

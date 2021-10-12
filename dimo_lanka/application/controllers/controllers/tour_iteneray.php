<?php

/**
 * Description of tour_iteneray
 *
 * @author Shamil ilyas
 */
class tour_iteneray extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('tour_iteneray/js/tour_iteneray'),
        'CSS' => array('tour_iteneray/css/Daily_Summary', 'tour_iteneray/css/Visit_History'));

    public function drawIndex_tour_iteneray() {

        $this->template->draw('tour_iteneray/add_category', false);
    }

    public function drawIndex_view_Catogary() {

        $this->template->draw('tour_iteneray/View_Visit_category', false);
    }

    public function drawVisitHistory() {
        $this->template->draw('tour_iteneray/TourHistory', false);
    }

    public function drawViewIndex_Tour_Itenerary() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/index_category', TRUE);
    }

    public function createVisitCategory() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $this->tour_iteneray_model->createVisitCategory($_POST);
        redirect('tour_iteneray/drawViewIndex_Tour_Itenerary');
    }

    public function drawViewAllVisitCategary() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $viewAll = $this->tour_iteneray_model->viewAllVisitCategory();
        $this->template->draw('tour_iteneray/View_Visit_category', false, $viewAll);
    }

    public function drawIndexManagevisitCategory() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/index_manage_visitCatogary', true);
    }

    public function drawManageVisitCatogary() {
        $this->template->draw('tour_iteneray/Manage_Visit_Category', false);
    }

    public function manageVisitCategory() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $this->tour_iteneray_model->updateVisitCategory($_POST);
        redirect('tour_iteneray/drawViewIndex_Tour_Itenerary');
    }

    public function deleteVisitCatogary() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $id = $this->input->get('visit_category_id');
        $this->tour_iteneray_model->deletevisitCategory($id);
        redirect('tour_iteneray/drawViewIndex_Tour_Itenerary');
    }

    public function drawViewIndex_Visit_Purpose() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/index_purpose', TRUE);
    }

    public function drawIndex_Viisit_Purpose() {

        $this->template->draw('tour_iteneray/add_purpose', false);
    }

    public function createVisitPurpose() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $this->tour_iteneray_model->createVisitPurpose($_POST);
        redirect('tour_iteneray/drawViewIndex_Visit_Purpose');
    }

    public function drawViewAllVisitPurpose() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $viewAll = $this->tour_iteneray_model->viewAllVisitPurpose();
        $this->template->draw('tour_iteneray/View_Visit_Purpose', false, $viewAll);
    }

    public function drawIndexManagevisitPurpose() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/index_manage_visitPurpose', true);
    }

    public function drawManageVisitPurpose() {
        $this->template->draw('tour_iteneray/Manage_Visit_purpose', false);
    }

    public function manageVisitPurpose() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $this->tour_iteneray_model->updateVisitPurpose($_POST);
        redirect('tour_iteneray/drawViewIndex_Visit_Purpose');
    }

    public function deleteVisitPurpose() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $id = $this->input->get('visit_purpose_id');
        $this->tour_iteneray_model->deletevisitPurpose($id);
        redirect('tour_iteneray/drawViewIndex_Visit_Purpose');
    }

    public function drawViewIndex_DailySumary() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/index_dailysumary', TRUE);
    }

    public function drawIndex_Dailysumaryadd() {
        $typeID = $this->session->userdata('typeid');
        $extraData = array();
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $extraData['visit_categories'] = $this->tour_iteneray_model->getAllVisitCategories();
        $extraData['visit_purposes'] = $this->tour_iteneray_model->getAllVisitPurposes();

        if ($typeID == 3) {
            $empID = $this->session->userdata('employe_id');
            $this->load->model('salesofficer/salesofficer_model');
            $extraData['sales_officer_data'] = $this->salesofficer_model->getSalesOfficerData("sales_officer_id", $empID);
        }
        $this->template->draw('tour_iteneray/add_DailySummary', false, $extraData);
    }

    public function drawDistricLoad() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $viewAll = $this->tour_iteneray_model->viewAllDistrict();
        $this->template->draw('tour_iteneray/load_disticts', FALSE, $viewAll);
    }

    public function get_City() {
        $District_id = $this->input->get('hidden_District_id');
        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('city_name', 'city_id', 'district_id');
        $result = $this->tour_iteneray_model->get_City($q, $column, $District_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_City1() {

        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('city_name', 'city_id');
        $result = $this->tour_iteneray_model->get_City1($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_catogory() {
        $q = strtolower($_GET['term']);
        $this->load->model('tour_it'
                . 'eneray/tour_iteneray_model');
        $column = array('category_name', 'visit_category_id');
        $result = $this->tour_iteneray_model->get_catogory($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_purpose() {
        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('purpose_id_name', 'visit_purpose_id');
        $result = $this->tour_iteneray_model->get_purpose($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

//    public function get_salesOficerName() {
//        $q = strtolower($_GET['term']);
//        $this->load->model('tour_iteneray/tour_iteneray_model');
//        $column = array('sales_officer_name', 'sales_officer_id', 'branch_id', 'branch_name', 'sales_officer_account_no', 'sales_officer_code');
//        $result = $this->tour_iteneray_model->get_salesOficerName($q, $column);
//        $result_data = array('label' => 'no result...');
//        if (count($result) > 0) {
//            echo json_encode($result);
//        } else {
//            echo json_encode($result_data);
//        }
//    }

    public function get_salesOficeractNumber() {
        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('sales_officer_account_no', 'sales_officer_id', 'branch_id', 'branch_name', 'sales_officer_name');
        $result = $this->tour_iteneray_model->get_salesOficeractNumber($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function createDailySummary() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $category = $_POST['cmb_visit_categoris'];
        $purpose = $_POST['cmb_visit_purposes'];
        $status = $this->tour_iteneray_model->createDailySummary($_POST);
        if ($category == 1 && $status == 1 && $purpose == 1) {
            redirect('new_so_po/drawIndex_new_so_po');
        } else if ($category == 1 && $status == 1 && $purpose == 2) {
            redirect('tour_iteneray/drawViewIndex_DailySumary');
        } else if ($category == 1 && $status == 1 && $purpose == 3) {
            redirect('delarpayment/drawIndexDelarPayment');
        } else if ($category == 1 && $status == 1 && $purpose == 4) {
            redirect('branding/drawIndexBranding');
        } else if ($category == 1 && $status == 1 && $purpose == 5) {
            //$this->session->set_flashdata('item', 'value');
            redirect('tour_iteneray/drawViewIndex_DailySumary');
        } else if ($category == 1 && $status == 1 && $purpose == 6) {
            redirect('competitor_parts/drawIndexCompetitorPart');
        } else if ($category == 2 && $status == 1 && $purpose == 4) {
            redirect('branding/drawIndexBranding');
        } else if ($category == 2 && $status == 1 && $purpose == 5) {
            redirect('tour_iteneray/drawViewIndex_DailySumary');
        } else if ($category == 2 && $status == 1 && $purpose == 6) {
            redirect('competitor_parts/drawIndexCompetitorPart');
        } else if ($category == 3 && $status == 1 && $purpose == 4) {
            redirect('branding/drawIndexBranding');
        } else if ($category == 3 && $status == 1 && $purpose == 5) {
            redirect('tour_iteneray/drawViewIndex_DailySumary');
        } else if ($category == 3 && $status == 1 && $purpose == 6) {
            redirect('competitor_parts/drawIndexCompetitorPart');
        } else if ($category == 4 && $status == 1 && $purpose == 4) {
            redirect('branding/drawIndexBranding');
        } else if ($category == 4 && $status == 1 && $purpose == 5) {
            redirect('tour_iteneray/drawViewIndex_DailySumary');
        } else if ($category == 4 && $status == 1 && $purpose == 6) {
            redirect('competitor_parts/drawIndexCompetitorPart');
        } else if ($category == 5 && $status == 1 && $purpose == 4) {
            redirect('branding/drawIndexBranding');
        } else if ($category == 5 && $status == 1 && $purpose == 5) {
            redirect('tour_iteneray/drawViewIndex_DailySumary');
        } else if ($category == 5 && $status == 1 && $purpose == 6) {
            redirect('competitor_parts/drawIndexCompetitorPart');
        }
        // redirect('tour_iteneray/drawViewIndex_DailySumary');
    }

    public function drawView_index_dailySumary() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/index_View_dailysumary', TRUE);
    }

    public function drawViewAllDailySumary() {
        $typeID = $this->session->userdata('typeid');
        $extraData = array();

        if ($typeID == 3) {
            $empID = $this->session->userdata('employe_id');
            $this->load->model('salesofficer/salesofficer_model');
            $extraData['sales_officer_data'] = $this->salesofficer_model->getSalesOfficerData("sales_officer_id", $empID);
        }
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $viewAll = $this->tour_iteneray_model->viewAllDailySummary();
        $this->template->draw('tour_iteneray/View_dailySummary', false, $extraData);
    }

    public function drawViewIndex_TourPlan() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/indexTour_plan', TRUE);
    }

    public function drawIndex_TourPlanAdd() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $viewAll = $this->tour_iteneray_model->viewAllusername();
        $this->template->draw('tour_iteneray/addTourPlan', false, $viewAll);
    }

    public function addTourPlan() {


        if ($this->input->post("sales_oficer_id") != '') {
            $this->load->model('tour_iteneray/tour_iteneray_model');
            $insertSpecialPramotion = $this->tour_iteneray_model->insertTourPlan($_REQUEST);
            $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Added</spam>');
            redirect('tour_iteneray/drawViewIndex_TourPlan');
        } else {
            $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px"> Error</spam>');
            redirect('tour_iteneray/drawViewIndex_TourPlan');
        }
    }

    //view Page
    public function drawIndex_Tour_planViewMain() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/Index_Tour_planView', TRUE);
    }

    public function drawIndex_View_speciolProMain() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $fetchAllspclPramotion = $this->tour_iteneray_model->getAllTour_plan();
        $this->template->draw('tour_iteneray/view_Tour_plan_Main', FALSE, $fetchAllspclPramotion);
    }

    public function deleteItem() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "tour_plan_id" => $item_detail[0]
        );


        $this->load->model('tour_iteneray/tour_iteneray_model');
        $this->tour_iteneray_model->deleteItem($item_detail_decode);
    }

    //ammendments

    public function drawViewIndex_AmmendTourPlan() {
        $id_SP_StockToken = $this->input->get('id_tourpln_');
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/indexAmmendTourPlan', TRUE, $id_SP_StockToken);
    }

    public function drawIndex_TourPlanAmmend() {

        $this->template->draw('tour_iteneray/addAmmendments', false);
    }

    //ammendments
    public function addAmendments() {


        if ($this->input->post("reason") != '') {
            $this->load->model('tour_iteneray/tour_iteneray_model');
            $insertSpecialPramotion = $this->tour_iteneray_model->insertAmendments($this->input->post());
            $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Added</spam>');
            redirect('tour_iteneray/drawIndex_Tour_planViewMain');
        } else {
            $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px"> Error</spam>');
            redirect('tour_iteneray/drawIndex_Tour_planViewMain');
        }
    }

    public function get_dealerName() {
        $Town_id = $this->input->get('hidden_Town_id');
        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('delar_name', 'delar_id', 'city_id');
        $result = $this->tour_iteneray_model->get_DealerName($q, $column, $Town_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

//    public function drawIndex_DailySumary_ViewMain() {
//        $this->template->attach($this->resours);
//        $this->template->draw('tour_iteneray/indexDailysum_view', TRUE);
//    }
//    public function drawIndex_View_DailySumary() {
//        $this->load->model('tour_iteneray/tour_iteneray_model');
//        $extraData['getAllDailySum'] = $this->tour_iteneray_model->getAllDailySum();
//        $extraData['getCountVisitOnly'] = $this->tour_iteneray_model->getCountVisitOnly();
//        $this->template->draw('tour_iteneray/view_Daily_Sumary', FALSE, $extraData);
//    }

    public function get_BranchCode() {

        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('branch_code', 'branch_id');
        $result = $this->tour_iteneray_model->get_BranchCode($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_salesOficeCode() {
        $q = strtolower($_GET['term']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $column = array('sales_officer_code', 'sales_officer_id');
        $result = $this->tour_iteneray_model->get_salesOficeCode($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function setsalesofficer() {
        $this->load->model('salest_officer_pur_order/sales_officer_pur_order_model');
        $salesofficerdetails = $this->sales_officer_pur_order_model->setsalesofficer();
        echo json_encode($salesofficerdetails);
    }

    public function get_salesOficer_detail() {
        $q = strtolower($_REQUEST['id']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        //$column = array('branch_id', 'branch_name', 'sales_officer_account_no','sales_officer_code');
        $result = $this->tour_iteneray_model->get_salesOficer_details($q);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function get_dealer_detail() {

        $q = strtolower($_REQUEST['term']);
        $catogory_id = strtolower($_REQUEST['catogory_id']);
        $this->load->model('tour_iteneray/tour_iteneray_model');
        //$column = array('branch_id', 'branch_name', 'sales_officer_account_no','sales_officer_code');
        $result = $this->tour_iteneray_model->get_dealer_detail($q, $catogory_id);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getAllDealerNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('delar/delar_model');
        $column = array('delar_name', 'delar_account_no', 'delar_id');
        $result = $this->delar_model->loadAllDealers($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getAllGarages() {
        $q = strtolower($_GET['term']);
        $this->load->model('garage/garage_model');
        $column = array('garage_name', 'garage_id');
        $result = $this->garage_model->get_all_garage($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getAllFleetOwnerVehicles() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('vehicle_reg_no', 'vehicle_id', 'customer_id');
        $result = $this->vehicle_model->loadAllFleetOwnerVehicles($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getAllNewShops() {
        $q = strtolower($_GET['term']);
        $this->load->model('nonregshops/non_reg_shops_model');
        $column = array('shop_name', 'shop_id');
        $result = $this->non_reg_shops_model->getAllNewShops($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

    public function getAllVehicleOwnerVehicles() {
        $q = strtolower($_GET['term']);
        $this->load->model('vehicle/vehicle_model');
        $column = array('vehicle_reg_no', 'vehicle_id', 'customer_id');
        $result = $this->vehicle_model->loadAllVehicleOwnerVehicles($q, $column);
        $no_result = array('label' => 'no result found');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
    }

//---------------------------------------Daily Summary (Salesman Tracking)-- Dinesh-----------------------------------

    public function drawIndex_DailySumary_ViewMain() {
        $this->template->attach($this->resours);
        $this->template->draw('tour_iteneray/indexDailysum_view', TRUE);
    }

    public function drawIndex_View_DailySumary() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $extraData['visit_categories'] = $this->tour_iteneray_model->getAllVisitCategories();
        $extraData['visit_purposes'] = $this->tour_iteneray_model->getAllVisitPurposes();

        if ((isset($_POST['txt_tour_month'])) && (isset($_POST['txt_officer_id']))) {
            $date = $_POST['txt_tour_month'];
            $extraData['date'] = $date;
            $officer_id = $_POST['txt_officer_id'];
            $extraData['officer_id'] = $officer_id;
            $extraData['keys'] = $_POST;
        }

        $this->template->draw('tour_iteneray/view_Daily_Sumary', FALSE, $extraData);
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

    public function get_sales_officer_account_no() {
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

    public function getTourPlanData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $tourPlanData = $this->tour_iteneray_model->getTourPlanData($officer_id, $date);
        return $tourPlanData;
    }

    public function getTourPlanAmendments($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $tourPlanAmendments = $this->tour_iteneray_model->getTourPlanAmendments($officer_id, $date);
        return $tourPlanAmendments;
    }

    public function getActualLocations($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $actualLocations = $this->tour_iteneray_model->getActualLocations($officer_id, $date);
        return $actualLocations;
    }

    public function getDailyTotalSalesValue($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $totalSalesValue = $this->tour_iteneray_model->getDailyTotalSalesValue($officer_id, $date);
        return $totalSalesValue;
    }

    public function getDailyBudget($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $dailyBudget = $this->tour_iteneray_model->getDailyBudget($officer_id, $date);
        $amount = 0;
        if (isset($dailyBudget[0]->daily_budget)) {
            $amount = $dailyBudget[0]->daily_budget;
        } else {
            $amount = 0;
        }
        return $amount;
    }

    public function countCategoryCount($officer_id, $date, $visit_category) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $categoryCount = $this->tour_iteneray_model->countCategoryCount($officer_id, $date, $visit_category);
        return $categoryCount[0]->category;
    }

    public function countPurposeCount($officer_id, $date, $visit_purpose) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $purposeCount = $this->tour_iteneray_model->countPurposeCount($officer_id, $date, $visit_purpose);
        return $purposeCount[0]->purpose;
    }

    public function getOrderData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $orderData = $this->tour_iteneray_model->getOrderDetails($officer_id, $date);
        return $orderData;
    }

    public function getCollectionData() {
        $officer_id = $_REQUEST['officer_id'];
        $tour_date = $_REQUEST['tour_date'];
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $dailyCashPayments = $this->tour_iteneray_model->getDailyCashPayments($officer_id, $tour_date);
        $dailyChequePayments = $this->tour_iteneray_model->getDailyChequePayments($officer_id, $tour_date);
        $dailyBankDepositPayments = $this->tour_iteneray_model->getDailyBankDepositPayments($officer_id, $tour_date);
        $collections = array(
            "cash_payments" => $dailyCashPayments,
            "cheque_payments" => $dailyChequePayments,
            "diposit_payments" => $dailyBankDepositPayments
        );
        $json_encode = json_encode($collections);
        print_r($json_encode);
        return $json_encode;
    }

    public function getPurchaseOrders() {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $officer_id = $_REQUEST['officer_id'];
        $tour_date = $_REQUEST['tour_date'];
        $orderData = $this->tour_iteneray_model->getPurchaseOrders($officer_id, $tour_date);
        $json_encode = json_encode($orderData);
        print_r($json_encode);
        return $json_encode;
    }

    public function getAllBrandingData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $dealerBrandingDetails = $this->tour_iteneray_model->getDealerBrandingDetails($officer_id, $date);
        $garageBrandingDetails = $this->tour_iteneray_model->getGarageBrandingDetails($officer_id, $date);
        $fleetOwnerBrandings = $this->tour_iteneray_model->getFleetOwnerBrandings($officer_id, $date);
        $newDealerBrandings = $this->tour_iteneray_model->getNewDealerBrandings($officer_id, $date);
        $vehicleOwnerBrandings = $this->tour_iteneray_model->getVehicleOwnerBrandings($officer_id, $date);
        //$newCustomerBrandings = $this->tour_iteneray_model->getNewCustomerBrandings($officer_id, $date);

        $dealer_branding_data = '';
        $garage_branding_data = '';
        $fo_branding_data = '';
        $nd_branding_data = '';
        $vo_branding_data = '';
        // $nc_branding_data = "";
        foreach ($dealerBrandingDetails as $value) {
            $dealer_branding_data = $value->dealer_bradings;
        }
        foreach ($garageBrandingDetails as $value) {
            $garage_branding_data = $value->garage_brandings;
        }
        foreach ($fleetOwnerBrandings as $value) {
            $fo_branding_data = $value->fo_brandings;
        }
        foreach ($newDealerBrandings as $value) {
            $nd_branding_data = $value->new_dealer_branding;
        }
        foreach ($vehicleOwnerBrandings as $value) {
            $vo_branding_data = $value->new_vo_branding;
        }

//        foreach ($newCustomerBrandings as $value) {
//            $nc_branding_data .= $value->nc_branding . "\n";
//        }
        $all_branding_data = array(
            $dealer_branding_data,
            $garage_branding_data,
            $fo_branding_data,
            $nd_branding_data,
            $vo_branding_data,
        );

        //echo $dealer_branding_data;
        return $all_branding_data;
    }

    public function getAllMarketInfoData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $dealerMarketInfoDetails = $this->tour_iteneray_model->getDealerMarketInfo($officer_id, $date);
        $garageMarketInfoDetails = $this->tour_iteneray_model->getGarageMarketInfo($officer_id, $date);
        $fleetOwnerMarketInfo = $this->tour_iteneray_model->getFleetOwnerMarketInfo($officer_id, $date);
        $newDealerMarketInfo = $this->tour_iteneray_model->getNewShopMarketInfo($officer_id, $date);
        $vehicleOwnerMarketInfo = $this->tour_iteneray_model->getVehicleOwnerMarketInfo($officer_id, $date);
        $newCustomerMarketInfo = $this->tour_iteneray_model->getNewCustomerMarketInfo($officer_id, $date);

        $dealer_MarketInfo_data = "";
        $garage_MarketInfo_data = "";
        $fo_MarketInfo_data = "";
        $nd_MarketInfo_data = "";
        $vo_MarketInfo_data = "";
        $nc_MarketInfo_data = "";
        foreach ($dealerMarketInfoDetails as $value) {
            $dealer_MarketInfo_data .= $value->dealer_info . "\n";
        }
        foreach ($garageMarketInfoDetails as $value) {
            $garage_MarketInfo_data .= $value->garage_info . "\n";
        }
        foreach ($fleetOwnerMarketInfo as $value) {
            $fo_MarketInfo_data .= $value->fo_info . "\n";
        }
        foreach ($newDealerMarketInfo as $value) {
            $nd_MarketInfo_data .= $value->nd_info . "\n";
        }
        foreach ($vehicleOwnerMarketInfo as $value) {
            $vo_MarketInfo_data .= $value->vo_info . "\n";
        }

        foreach ($newCustomerMarketInfo as $value) {
            $nc_MarketInfo_data .= $value->nc_info . "\n";
        }
        $all_market_info_data = array(
            $dealer_MarketInfo_data,
            $garage_MarketInfo_data,
            $fo_MarketInfo_data,
            $nd_MarketInfo_data,
            $vo_MarketInfo_data,
            $nc_MarketInfo_data,
        );

        //echo $dealer_branding_data;
        return $all_market_info_data;
    }

    public function getDealerVisitData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $dealerVisitDetails = $this->tour_iteneray_model->getDealerVisitDetails($officer_id, $date);
        return $dealerVisitDetails[0]->visit_dealers;
    }

    public function getGarageVisitData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $garageVisitDetails = $this->tour_iteneray_model->getGarageVisitDetails($officer_id, $date);
        return $garageVisitDetails[0]->visit_garage;
    }

    public function getFleetOwnerVisitData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $fleetOwnerVisitDetails = $this->tour_iteneray_model->getFleetOwnerVisitDetails($officer_id, $date);
        return $fleetOwnerVisitDetails[0]->visit_fleetowners;
    }

    public function getNewDealerVisitData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $newDealerVisitDetails = $this->tour_iteneray_model->getNewDealerVisitDetails($officer_id, $date);
        return $newDealerVisitDetails[0]->visit_new_dealers;
    }

    public function getVehicleOwnerVisitData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $vOVisitDetails = $this->tour_iteneray_model->getVOVisitDetails($officer_id, $date);
        return $vOVisitDetails[0]->visit_new_vo;
    }

    public function getNewCustomerVisitData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $newCustomerVisitDetails = $this->tour_iteneray_model->getNewCustomerVisitDetails($officer_id, $date);
        return $newCustomerVisitDetails[0]->visit_new_customers;
    }

    public function getAllVisitOnlyData($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $visitOnlyDealers = $this->tour_iteneray_model->getVisitOnlyDealers($officer_id, $date);
        $visitOnlyGarages = $this->tour_iteneray_model->getVisitOnlyGarages($officer_id, $date);
        $visitOnlyFleetOwners = $this->tour_iteneray_model->getVisitOnlyFleetOwners($officer_id, $date);
        $visitOnlyNewDealers = $this->tour_iteneray_model->getVisitOnlyNewDealers($officer_id, $date);
        $visitOnlyVOs = $this->tour_iteneray_model->getVisitOnlyVOs($officer_id, $date);
        $visitOnlyNewCustomers = $this->tour_iteneray_model->getVisitOnlyNewCustomers($officer_id, $date);

        $dealer_visit_only = "";
        $garage_visit_only = "";
        $fo_visit_only = "";
        $nd_visit_only = "";
        $vo_visit_only = "";
        $nc_visit_only = "";
        foreach ($visitOnlyDealers as $value) {
            $dealer_visit_only = $value->visit_only_dealers . "\n";
        }
        foreach ($visitOnlyGarages as $value) {
            $garage_visit_only = $value->visit_only_garages . "\n";
        }
        foreach ($visitOnlyFleetOwners as $value) {
            $fo_visit_only = $value->visit_only_fos . "\n";
        }
        foreach ($visitOnlyNewDealers as $value) {
            $nd_visit_only = $value->visit_only_new_dealers . "\n";
        }
        foreach ($visitOnlyVOs as $value) {
            $vo_visit_only = $value->visit_only_vos . "\n";
        }

        foreach ($visitOnlyNewCustomers as $value) {
            $nc_visit_only = $value->visit_only_ncs . "\n";
        }
        $all_visit_only_data = array(
            $dealer_visit_only,
            $garage_visit_only,
            $fo_visit_only,
            $nd_visit_only,
            $vo_visit_only,
            $nc_visit_only,
        );

        //echo $dealer_branding_data;
        return $all_visit_only_data;
    }

    public function drawIndexTourPurchaseOrders() {
        $this->template->draw('tour_iteneray/IndexTourPurchaseOrders', true);
    }

    public function drawTourPurchaseOrders() {
        $order_id = $_REQUEST['token_purchase_order_iD'];
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $order_data = $this->tour_iteneray_model->getAllTourPurchaseOrderDetails($order_id);
        $this->template->draw('tour_iteneray/ViewTourPurchaseOrders', false, $order_data);
    }

    public function getDailyReturnValue($officer_id, $date) {
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $return_data = $this->tour_iteneray_model->getDailyReturnValue($officer_id, $date);
        return $return_data;
    }

//---------------------------------------Daily Summary (Salesman Tracking)-- Dinesh-----------------------------------

    public function getVisitHistory() {
        $selected_id = $_REQUEST['selected_id'];
        $category_id = $_REQUEST['category'];
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $visit_history = array();
        if ($category_id == 1) {
            $visit_history = $this->tour_iteneray_model->getDealerVisitHistory($selected_id);
        } else if ($category_id == 2) {
            $visit_history = $this->tour_iteneray_model->getGarageVisitHistory($selected_id);
        } else if ($category_id == 3) {
            $visit_history = $this->tour_iteneray_model->getFleetOwnerVisitHistory($selected_id);
        } else if ($category_id == 4) {
            $visit_history = $this->tour_iteneray_model->getNewShopVisitHistory($selected_id);
        } else if ($category_id == 5) {
            $visit_history = $this->tour_iteneray_model->getVehicleOwnerVisitHistory($selected_id);
        }

        $history = array($visit_history);
        $json_encode = json_encode($history);
        print_r($json_encode);
        return $json_encode;
    }

    public function drawSalesOfiicerWiseHistory() {
        $officer_id = $_REQUEST['officer_id'];
        $start_date = $_REQUEST['start_date'];
        $end_date = $_REQUEST['end_date'];
        $this->load->model('tour_iteneray/tour_iteneray_model');
        $visit_history = array();
        $visit_history['dealer_wise'] = $this->tour_iteneray_model->getDealerWiseHistory($start_date, $end_date, $officer_id);
        $visit_history['garage_wise'] = $this->tour_iteneray_model->getGarageWiseHistory($start_date, $end_date, $officer_id);
        $visit_history['fo_wise'] = $this->tour_iteneray_model->getFleetOwnerWiseHistory($start_date, $end_date, $officer_id);
        $visit_history['ns_wise'] = $this->tour_iteneray_model->getNewShopWiseHistory($start_date, $end_date, $officer_id);
        $visit_history['vo_wise'] = $this->tour_iteneray_model->getVehicleOwnerWiseHistory($start_date, $end_date, $officer_id);
        $json_encode = json_encode($visit_history);
        print_r($json_encode);
        return $json_encode;
    }

}

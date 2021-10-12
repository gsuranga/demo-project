<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of temp_out
 *
 * @author kanishka
 */
class temp_out extends C_Controller{
    
    
    function __construct() {
        parent::setAuthStatus(false);
        parent::__construct();
        parent::setAuthStatus(true);
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        
    }
    
    private $resours = array(
        'JS' => array('outlet/js/Outlet'),
        'CSS' => array());
    
    /**
     * Function indexOutlet
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexOutlet() {
        $this->template->attach($this->resours);
        $this->template->draw('outlet/indexOutlet', TRUE);
    }
    
    function hello() {
        $this->template->attach($this->resours);
        $this->template->draw('outlet/indexnewoutlet', TRUE);
    }

    /**
     * Function insertOutlet
     *
     * insert outlet
     *
     * @param (type) (name) about this param
     * @return (type) (name)
     */
    function insertOutlet() {
        $this->form_validation->set_rules('outlet_category_name', 'Outlet Category', 'required');
        $this->form_validation->set_rules('outlet_name', 'Outlet Name', 'required');
        $this->form_validation->set_rules('outlet_code', 'Outlet Code', 'required');
        $this->form_validation->set_rules('division_name_1_1', 'Division Name', 'required');
        $this->form_validation->set_rules('division_id_1_1', 'Division ID', 'required');
        $this->form_validation->set_rules('territory_name_1', 'Territory Name', 'required');
        $this->form_validation->set_rules('territory_id_1', 'Territory ID', 'required');
        $this->form_validation->set_rules('outlet_address_1', 'Address', 'required');
        $this->form_validation->set_rules('outlet_tel_1', 'Telephone No', 'required');
        $this->form_validation->set_rules('outlet_mob_1', 'Mobile No', 'required');
        $this->form_validation->set_rules('outlet_conpersn_1', 'Contact Person', 'required');
        $this->form_validation->set_rules('outlet_con_persn_designation_1', 'Designation', 'required');
        $this->form_validation->set_rules('discount_1', 'Discount', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('outlet/outlet');
            $insertUserType = $this->outlet->insertOutlet1($this->input->post());
            if ($insertUserType) {
                $this->session->set_flashdata('insert_outlet', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Outlet</spam>');
            } else {
                $this->session->set_flashdata('insert_outlet', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Outlet Error</spam>');
            }
            redirect('outlets/indexOutlet');
        } else {
            $this->indexOutlet();
        }
    }

    /**
     * Function drawOutletRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutletRegister() {
        $this->load->model('outlet/outlet_category_model');
        $column = array('id_outlet_category', 'outlet_category_name');
        $viewoutletCategory1 = $this->outlet_category_model->fetchFromAnyTable("tbl_outlet_category", null, null, $column, 10000, 0, "RESULTSET", array('outlet_category_status' => 1), null);
        $dataarray = array('outletcat' => $viewoutletCategory1);
        $this->template->draw('outlet/outletRegister', false, $dataarray);
    }

    /**
     * Function drawOutletView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutletView() {
        $this->load->model('outlet/outlet');
        $viewoutlet = $this->outlet->viewAllOutlet();
        $this->template->draw('outlet/outletView', false, $viewoutlet);
    }

    /**
     * Function drawOutletDetails
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutletDetails($id) {
        $this->load->model('outlet/outlet');
        $viewoutlet = $this->outlet->viewAllOutletDetails($id);
        $this->template->draw('outlet/outletDetailsView', false, $viewoutlet);
    }

    /**
     * Function drawOutlet_Division_Details
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutlet_Division_Details($id) {
        $this->load->model('outlet/outlet');
        $viewoutletDivision = $this->outlet->viewAllOutlet_Division_Details($id);
        $this->template->draw('outlet/viewBranchDivision', false, $viewoutletDivision);
    }

    /**
     * Function deleteOutlet
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteOutlet() {
        $this->load->model('outlet/outlet');
        $id = $this->input->get('id');
        $outletType = $this->outlet->deleteOutlet($id);
        redirect('outlets/drawIndexViewOutlet');
    }

    /**
     * Function drawIndexOutletManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexOutletManage() {
        $this->template->attach($this->resours);
        $this->template->draw('outlet/indexManageOutlet', true);
    }

    /**
     * Function drawIndexBranchManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexBranchManage() {
        $this->template->attach($this->resours);
        $this->template->draw('outlet/indexManageBranch', true);
    }

    /**
     * Function drawIndexViewOutlet
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexViewOutlet() {
        $this->template->attach($this->resours);
        $this->template->draw('outlet/indexViewOutlet', true);
    }

    /**
     * Function drawindexManageBranchDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawindexManageBranchDivision() {
        $this->template->attach($this->resours);
        $this->template->draw('outlet/indexManageBranchDivision', true);
    }

    /**
     * Function viewOutletDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewOutletDetailsFromId($id) {
        $this->load->model('outlet/outlet');
        $fetchAllOutlet = $this->outlet->viewAllOutletFromID1($id);
        $this->template->draw('outlet/branchView', false, $fetchAllOutlet);
    }

    /**
     * Function viewBranchDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewBranchDetailsFromId($id) {
        $this->load->model('outlet/outlet');
        $fetchAllOutlet = $this->outlet->viewAllBranchFromID1($id);
        $this->template->draw('outlet/branchManage', false, $fetchAllOutlet);
    }

    /**
     * Function viewManageDivisionDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewManageDivisionDetailsFromId($id) {
        $this->load->model('outlet/outlet');
        $fetchDivision = $this->outlet->viewAllDivisionFromID2($id);
        $this->template->draw('outlet/divisionManage', false, $fetchDivision);
    }

    /**
     * Function viewDivisionListFromBranchID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivisionListFromBranchID($id) {
        $this->load->model('outlet/outlet');
        $fetchAllBranchDivision = $this->outlet->viewAllDivisionFromID1($id);
        $this->template->draw('outlet/viewDivision', false, $fetchAllBranchDivision);
    }

    /**
     * Function viewBranchDetailsFromBranchID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewBranchDetailsFromBranchID($id) {
        $this->load->model('outlet/outlet');
        $fetchAllBranchDetails = $this->outlet->viewBranchDetailsFromID1($id);
        $this->template->draw('outlet/branchDetails', false, $fetchAllBranchDetails);
    }

    /**
     * Function drawOutletViewManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutletViewManage() {
        $this->template->draw('outlet/OutletManage', false);
    }

    /**
     * Function drawOutletManageView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutletManageView($id) {
        $this->load->model('outlet/outlet');
        $fetchAllOutlet = $this->outlet->viewAllOutletDetails($id);
        $this->template->draw('outlet/OutletManage', false, $fetchAllOutlet);
    }

    /**
     * Function updateOutlet
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateOutlet() {

        $this->load->model('outlet/outlet');
        $id = $this->input->post('id_outlet');
        $outlet = $this->outlet->updateOutlet($this->input->post());
        if ($outlet) {
            $this->session->set_flashdata('update_outlet', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Update Outlet</spam>');
        } else {
            $this->session->set_flashdata('update_outlet', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Outlet Error</spam>');
        }

        redirect("outlets/drawIndexOutletManage?id_outlet=$id");
    }

    /**
     * Function updateBranch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateBranch() {

        $this->load->model('outlet/outlet');
        $id_outlet_has_branch = $this->input->post('id_outlet_has_branch');
        $id_outlet2 = $this->input->post('id_outlet');
        $updateBranch = $this->outlet->updateBranch1($this->input->post());
        if ($updateBranch) {
            $this->session->set_flashdata('update_branch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Branch</spam>');
        } else {
            $this->session->set_flashdata('update_branch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Branch Error</spam>');
        }

        redirect("outlets/drawIndexBranchManage?id_outlet_has_branch=$id_outlet_has_branch&id_outlet2=$id_outlet2");
    }

    /**
     * Function updateDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateDivision() {

        $this->load->model('outlet/outlet');
        $id_branch_has_division = $this->input->post('id_branch_has_division');
        $id_outlet_has_branch = $this->input->post('id_outlet_has_branch');
        $updateBranch = $this->outlet->updateDivision1($this->input->post());
        if ($updateBranch) {
            $this->session->set_flashdata('update_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Branch Division</spam>');
        } else {
            $this->session->set_flashdata('update_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Branch Division Error</spam>');
        }

        redirect("outlets/drawindexManageBranchDivision?id_branch_has_division=$id_branch_has_division&id_outlet_has_branch=$id_outlet_has_branch");
    }

    /**
     * Function allOutletCategorytoListBox
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allOutletCategorytoListBox() {
        $this->load->model('outlet/outlet');
        $fetchAllEmployee = $this->outlet->fetchFromAnyTable("tbl_outlet_category", null, null, null, 10000, 0, "RESULTSET", array('outlet_category_status' => 1), null);
        $pushdata = array('outlet' => $fetchAllEmployee);
        $this->template->draw('outlet/AllOutletCategoryCombo', false, $pushdata);
    }

    /**
     * Function allTeritorytoListBox
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allTeritorytoListBox() {
        $this->load->model('outlet/outlet');
        $fetchAllEmployee = $this->outlet->fetchFromAnyTable("tbl_territory", null, null, null, 10000, 0, "RESULTSET", null, null);
        $pushdata = array('outlet' => $fetchAllEmployee);
        $this->template->draw('outlet/allTeritoryCombo', false, $pushdata);
    }

    /**
     * Function allDivisionListBox
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allDivisionListBox() {
        $this->load->model('outlet/outlet');
        $fetchAllEmployee = $this->outlet->fetchFromAnyTable("tbl_division", null, null, null, 10000, 0, "RESULTSET", null, null);
        $pushdata = array('outlet' => $fetchAllEmployee);
        $this->template->draw('outlet/allDivisionCombo', false, $pushdata);
    }

    /**
     * Function getDivisionNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
//auto complete
    public function getDivisionNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('division_name', 'id_division');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_division", 'division_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function getTerritoryNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    //auto complete
    public function getTerritoryNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_territory", 'territory_name', $q, $column);
        echo json_encode($result);
    }

    function viewOutletDetailsItem() {

        $this->load->model('outlet/outlet');
        $this->load->model('outlet/outlet_category_model');
        $this->load->model('division/division_model');
        $columnoutlet = array('id_outlet_category', 'outlet_category_name');
        $columndivision = array('id_division', 'division_name');
        $viewoutlet = $this->outlet_category_model->fetchFromAnyTable("tbl_outlet_category", null, null, $columnoutlet, 10000, 0, "RESULTSET", array('outlet_category_status' => 1), "added_date");
        $viewdivision = $this->division_model->fetchFromAnyTable("tbl_division", null, null, $columndivision, 10000, 0, "RESULTSET", array('division_status' => 1), null);
        $dataarray = array('outlet_name' => $viewoutlet, 'division_name' => $viewdivision);
        $this->template->draw('outlet/outletViewManage', false, $dataarray);
    }

    function getOutletNameType() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('outlet_name', 'id_outlet');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_outlet", 'outlet_name', $q, $column);
        echo json_encode($result);
    }

    function getOutletAddressType() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('outlet_code', 'id_outlet_registration');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_outlet_registration", 'outlet_code', $q, $column);
        echo json_encode($result);
    }

    function getterritoryType() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_territory", 'territory_name', $q, $column);
        echo json_encode($result);
    }

    function viewOutletByFilterKey($Data) {
        $this->load->model('outlet/outlet');
        $viewOutlet = $this->outlet->viewOutletByFilterKey($Data);
        $this->template->draw('outlet/outletView', false, $viewOutlet);
    }

    
}

?>

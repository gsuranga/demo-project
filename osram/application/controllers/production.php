<?php

/**
 * Description of production
 *
 * @author Ishaka & Achala
 * @contact -: isherandi9@gmail.com & acharajakaruna@gmail.com
 * 
 */
class production extends C_Controller {

    private $resours = array(
        'JS' => array('production/js/production'),
        'CSS' => array()
    );

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexProduction() {
        $this->template->attach($this->resours);
        $this->template->draw('production/indexProduction', true);
    }

    /**
     * Function insertProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertProduction() {
        $this->form_validation->set_rules('employee_name', 'Employee Name', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee Id', 'required');
        $this->form_validation->set_rules('batch_no', 'Batch No', 'required');
        $this->form_validation->set_rules('division_name', 'Division Name', 'required');
        $this->form_validation->set_rules('store_name', 'Store Name', 'required');
        $this->form_validation->set_rules('production_no', 'Production No', 'required');
        $this->form_validation->set_rules('date', 'Date', 'required');
        $this->form_validation->set_rules('time', 'Time', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('production/production_model');
            
            $insertUserType = $this->production_model->insertProduction1($this->input->post());
            if ($insertUserType) {
                $this->session->set_flashdata('insert_production', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added production</spam>');
            } else {
                $this->session->set_flashdata('insert_production', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add production Error</spam>');
            }
            redirect('production/indexProduction');
        } else {
            
            $this->indexProduction();
        }
    }

    /**
     * Function drawProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawProduction() {
        $this->load->model('batch/batch_model');
        $this->load->model('division/division_model');
        $this->load->model('store/store_model');
        $column = array('id_batch', 'batch_no');
        $columndivision = array('id_division', 'division_name');
        $columnstore = array('id_store', 'store_name');
        $viewbatch = $this->batch_model->fetchFromAnyTable("tbl_batch", null, null, $column, 10000, 0, "RESULTSET", array('batch_status' => 1), "added_date");
        $viewdivision = $this->division_model->fetchFromAnyTable("tbl_division", null, null, $columndivision, 10000, 0, "RESULTSET", array('division_status' => 1), "added_date");
        $viewstore = $this->store_model->fetchFromAnyTable("tbl_store", null, null, $columnstore, 10000, 0, "RESULTSET", array('store_status' => 1), "added_date");
        $dataarray = array('batch_no' => $viewbatch, 'division_name' => $viewdivision, 'store_name' => $viewstore);
        $this->template->draw('production/productionRegistration', false, $dataarray);
    }

    /**
     * Function getItems
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getItems() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('item_name', 'id_item');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_item", 'item_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * function drawindexManageProduction
     *
     * view the production main page
     *
     * 
     */
    function drawindexManageProduction() {
        $this->template->attach($this->resours);
        $this->template->draw('production/indexManageProduction', true);
    }

    /**
     * Function drawItemKeywordView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawItemKeywordView() {
        $this->load->model('ItemKeyword/item_keyword_model');
        $column = array('id_item_keyword', 'item_keyword');
        $viewItemKeyword = $this->item_keyword_model->fetchFromAnyTable("tbl_item_keyword", null, null, $column, 10000, 0, "RESULTSET", array('item_keyword_status' => 1));

        $this->template->draw('ItemKeyword/ItemKeywordView', false, $viewItemKeyword);
    }

    /**
     * Function deleteItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteItemKeyword() {
        $this->load->model('ItemKeyword/item_keyword_model');
        $id = $this->input->get('id_item_keyword');
        $insertUserType = $this->item_keyword_model->deleteItemKeyword($id);
        // print_r($insertUserType);
        redirect('item_keyword/indexItemKeyword');
    }

    /**
     * Function drawIndexItemKeywordManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexItemKeywordManage() {
        $this->template->attach($this->resours);
        $this->template->draw('ItemKeyword/indexManageItemKeyword', true);
    }

    /**
     * Function viewItemKeywordDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewItemKeywordDetailsFromId($id) {
        $this->load->model('ItemKeyword/item_keyword_model');

        $fetchAllItemKeyword = $this->item_keyword_model->fetchFromAnyTable("tbl_item_keyword", null, null, null, 10000, 0, "RESULTSET", array('item_keyword_status' => 1, 'id_item_keyword' => $id), null);
        $this->template->draw('ItemKeyword/ItemKeywordManage', false, $fetchAllItemKeyword);
    }

    /**
     * Function drawItemKeywordViewManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawItemKeywordViewManage() {
        $this->template->attach($this->resours);
        $this->template->draw('ItemKeyword/ItemKeywordManage', false);
    }

    /**
     * Function updateItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateItemKeyword() {

        $this->load->model('ItemKeyword/item_keyword_model');
        $id = $this->input->post('id_item_keyword');
        $insertUserType = $this->item_keyword_model->updateItemKeyword($this->input->post());
        //print_r($insertUserType);
        if ($insertUserType) {
            $this->session->set_flashdata('update_ItemKeyword', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Item Keyword</spam>');
        } else {
            $this->session->set_flashdata('update_ItemKeyword', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Item Keyword Error</spam>');
        }

        redirect("item_keyword/drawIndexItemKeywordManage?id_item_keyword=$id");
    }

    /**
     * Function drawManageProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawManageProduction() {
        $this->template->attach($this->resours);
        $this->template->draw('production/viewAllProduction', false);
    }

    /**
     * Function updateAllProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateAllProduction() {

        $this->load->model('production/production_model');
        $update = $this->production_model->updateAllProduction($this->input->post());
        redirect("production/indexProduction");
    }

    /**
     * Function getBatchNo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function getBatchNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('batch_no', 'id_batch');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_batch", 'batch_no', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function getDivisionName
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function getDivisionName() {

        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('division_name', 'id_division');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_division", 'division_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function getProductionList
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function getProductionList() {

        $this->load->model('production/production_model');
        $batchid = $this->input->post('id_batch');
        $df = $this->input->post('id_division');
        $viewAllProduction = $this->production_model->viewAllProduction($batchid, $df);
        $this->template->draw('production/productionList', false, $viewAllProduction);
    }

    /**
     * Function viewProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewProduction() {
        $this->template->attach($this->resours);
        $this->template->draw('production/indexItemView', true);
    }

    /**
     * Function viewProductionItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewProductionItem($id) {
        $this->load->model('production/production_model');
        $fetchAllItem = $this->production_model->viewAllItem($id);
        //print_r($fetchAllItem);
        $this->template->draw('production/viewItem', false, $fetchAllItem);
    }

    /**
     * Function viewProductionDetailsItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewProductionDetailsItem($id) {
        $this->load->model('production/production_model');
        $fetchAllItem = $this->production_model->viewProductionDetailsByID($id);
        //print_r($fetchAllItem);
        $this->template->draw('production/productiondetailsview', false, $fetchAllItem);
    }

    /**
     * Function deleteViewProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteViewProduction() {
        $this->load->model('production/production_model');
        $id = $this->input->get('production_id');
        $deleteProductionView = $this->production_model->deleteProductionView1($id);
         if ($deleteProductionView) {
            $this->session->set_flashdata('Delete_production', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Production</spam>');
        } else {
            $this->session->set_flashdata('Delete_production', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Production Error</spam>');
        }
        redirect("production/drawindexManageProduction");
    }

    /**
     * Function drawIndexProductionManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexProductionManage() {
        $this->template->attach($this->resours);
        $this->template->draw('production/indexManageProductionView', true);
    }

    /**
     * Function viewProductionFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewProductionFromID($id) {
        $this->load->model('production/production_model');
        $fetchAllProduction = $this->production_model->viewProductionDetailsByID($id);
        $this->template->draw('production/ProductionViewManage', false, $fetchAllProduction);
    }

    /**
     * Function updateProduction
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateProduction() {

        $this->load->model('production/production_model');
        $production_id = $this->input->post('production_id');
        $update = $this->production_model->updateProduction($this->input->post());
        if ($update) {
            $this->session->set_flashdata('Update_production', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Production</spam>');
        } else {
            $this->session->set_flashdata('Update_production', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Production Error</spam>');
        }
        redirect("production/drawIndexProductionManage?production_id=$production_id");
    }

    /**
     * Function getEmployeeNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getEmployeeNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('production/production_model');
        $column = array('employee_first_name', 'id_employee');
        $result = $this->production_model->getEmployeNames($q, $column);
        $json = array();

        $no_result = array('label' => 'no result founds...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($no_result);
        }
     
    }

}

?>
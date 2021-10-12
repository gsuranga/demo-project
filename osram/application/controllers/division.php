<?php

/**
 * Description of division
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class division extends C_Controller {

    private $resours = array(
        'JS' => array('production/js/production', 'division/js/div'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexDivision
     *
     * 
     *
     * @param no
     * @return no
     */
    function indexDivision() {
        $this->template->attach($this->resours);
        $this->template->draw('division/indexDivision', true);
    }

    /**
     * Function indexdrawViewDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexdrawViewDivision() {
        $this->template->attach($this->resours);
        $this->template->draw('division/indexViewDivision', true);
    }

    /**
     * Function drawDivisionRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawDivisionRegister() {
        $this->template->draw('division/divisionRegister', false);
    }

    /**
     * Function drawDivisionView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawDivisionView() {
        $this->load->model('division/division_model');
        $fetchAllDivision = $this->division_model->getAllDivision();
        $this->template->draw('division/divisionView', false, $fetchAllDivision);
    }

    /**
     * Function allDivisionTypestoCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allDivisionTypestoCombo() {
        $this->load->model('division/division_model');
        $fetchAllDivisionType = $this->division_model->fetchFromAnyTable("tbl_division_type", null, null, null, 10000, 0, "RESULTSET", array('division_status' => 1), null);
        $pushdata = array('division' => $fetchAllDivisionType);
        $this->template->draw('division/allDivisionTypeCombo', false, $pushdata);
    }

    /**
     * Function allDivisiontoCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allDivisiontoCombo() {
        $this->load->model('division/division_model');
        $fetchAllDivision = $this->division_model->fetchFromAnyTable("tbl_division", null, null, null, 10000, 0, "RESULTSET", array('division_status' => 1), null);
        $pushdata = array('division' => $fetchAllDivision);
        $this->template->draw('division/allParentDivisionCombo', false, $pushdata);
    }

    /**
     * Function insertDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertDivision() {
        $this->form_validation->set_rules('divisionname', 'Name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('division/division_model');
            $insertDivisionType = $this->division_model->insertDivision($this->input->post());
            if ($insertDivisionType) {
                $this->session->set_flashdata('insert_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Registered a Division</spam>');
            } else {
                $this->session->set_flashdata('insert_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Register Division Error</spam>');
            }
            //$this->indexDivision();
            redirect('division/indexDivision');
        } else {
            $this->indexDivision();
        }
    }

    /**
     * Function viewDivisionFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivisionFromID($id) {
        $this->load->model('division/division_model');
        $fetchAllDivision = $this->division_model->get_Division_From_Division_ID($id);
        $this->template->draw('division/divisionManage', false, $fetchAllDivision);
    }

    /**
     * Function drawIndexDivisionManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexDivisionManage() {
        //$this->template->attach($this->resours);
        $this->template->draw('division/indexManageDivision', true);
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

        $this->load->model('division/division_model');
        $id = $this->input->post('division_id');
        $updateDivision = $this->division_model->updateDivision1($this->input->post());
        print_r($updateDivision);
        if ($updateDivision) {
            $this->session->set_flashdata('update_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Division</spam>');
        } else {
            $this->session->set_flashdata('update_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Division Error</spam>');
        }

        redirect("division/drawIndexDivisionManage?division_idd=$id");
    }

    /**
     * Function deleteDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteDivision() {
        $this->load->model('division/division_model');
        $id = $this->input->get('division_idd');
        $deleteDivision = $this->division_model->deleteDivision1($id);
        if ($deleteDivision) {
            $this->session->set_flashdata('delete_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Division</spam>');
        } else {
            $this->session->set_flashdata('delete_division', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Division Error</spam>');
        }
        redirect("division/indexDivision");
    }

    /**
     * Function viewDivDetailsItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivDetailsItem() {

        $this->load->model('division_type/division_type_model');
        $this->load->model('division/division_model');
        $columndivision = array('id_division_type', 'tbl_division_type_name');
        $viewdivision = $this->division_type_model->fetchFromAnyTable("tbl_division_type", null, null, $columndivision, 10000, 0, "RESULTSET", array('division_status' => 1), "added_date");
        //$fetchAllProduction = $this->division_model->viewDivDetailsByID();
        $dataarray = array('div_name' => $viewdivision);

        $this->template->draw('division/divViewManage', false, $dataarray);
    }

    /**
     * Function getDivType
     *
     * Division Name AutoComplete
     *
     * @param no
     * @return no
     */
    function getDivType() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('division_name', 'id_division');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_division", 'division_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function viewDivisionByFilterKey
     *
     * Division Name AutoComplete
     *
     * @param no
     * @return no
     */
    function viewDivisionByFilterKey($Data) {
        $this->load->model('division/division_model');
        $viewDivision = $this->division_model->viewDivisionByFilterKey1($Data);
        $this->template->draw('division/divisionView', false, $viewDivision);
    }

}

?>

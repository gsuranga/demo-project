<?php

/**
 * Description of territory
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class territory extends C_Controller {

    private $resours = array(
        'JS' => array('territory/js/territory'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexTerritory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexTerritory() {
        $this->template->attach($this->resours);
        $this->template->draw('territory/indexTerritory', true);
    }

    /**
     * Function indexdrawViewTerritory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexdrawViewTerritory() {
        $this->template->attach($this->resours);
        $this->template->draw('territory/indexViewTerritory', true);
    }

    /**
     * Function drawTerritoryRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawTerritoryRegister() {
        $this->template->attach($this->resours);
        $this->template->draw('territory/territoryRegister', false);
    }

    /**
     * Function drawTerritoryView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawTerritoryView() {
        $this->load->model('territory/territory_model');
        $fetchAllTerritory = $this->territory_model->getAllTerritory();
        $this->template->draw('territory/territoryView', false, $fetchAllTerritory);
    }

    /**
     * Function getParentPositions1
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function getParentPositions1() {
        $this->load->model('territory/territory_model');
        $fetchAllTerritory = $this->territory_model->getParentPositions(1);
        print_r($fetchAllTerritory);
    }

    /**
     * Function allTerritoryTypestoCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allTerritoryTypestoCombo() {
        $this->load->model('territory/territory_model');
        $fetchAllTerritoryType = $this->territory_model->fetchFromAnyTable("tbl_territory_type", null, null, null, 10000, 0, "RESULTSET", array('territory_type_status' => 1), null);
        $pushdata = array('territory' => $fetchAllTerritoryType);
        $this->template->draw('territory/allTerritoryTypeCombo', false, $pushdata);
    }

    /**
     * Function allTerritorytoCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allTerritorytoCombo() {
        $this->load->model('territory/territory_model');
        $fetchAllTerritory = $this->territory_model->fetchFromAnyTable("tbl_territory", null, null, null, 10000, 0, "RESULTSET", array('territory_status' => 1), null);

        $pushdata = array('territory' => $fetchAllTerritory);
        $this->template->draw('territory/allParentTerritoryCombo', false, $pushdata);
    }

    /**
     * Function insertTerritory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertTerritory() {
        $this->form_validation->set_rules('division_name1', 'Division Name', 'required');
        $this->form_validation->set_rules('territory_type', 'Territory Type', 'required');
        $this->form_validation->set_rules('territoryname', 'Territory Name', 'required');
        $this->form_validation->set_rules('division_id1', 'Division ID', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('territory/territory_model');
            $insertTerritory = $this->territory_model->insertTerritory1($this->input->post());
            if ($insertTerritory) {
                $this->session->set_flashdata('insert_territory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Territory</spam>');
            } else {
                $this->session->set_flashdata('insert_territory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Register Territory Error</spam>');
            }
            redirect('territory/indexTerritory');
        } else {
            $this->indexTerritory();
        }
    }

    /**
     * Function indexViewTerritory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexViewTerritory() {
        $this->template->attach($this->resours);
        $this->template->draw('territory/indexViewTerritory', true);
    }

    /**
     * Function viewTerritoryFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewTerritoryFromID($id) {
        $this->load->model('territory/territory_model');
        $fetchAllTerritory = $this->territory_model->getAllTerritoryfromID($id);
        $this->template->draw('territory/territoryManage', false, $fetchAllTerritory);
    }

    /**
     * Function viewDivisionFromDivisionID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivisionFromDivisionID($id) {
        $this->load->model('territory/territory_model');
        $fetchAllDivision = $this->territory_model->getAllDivisionfromDivisionID($id);
        $this->template->draw('territory/territoryMapManage', false, $fetchAllDivision);
    }

    /**
     * Function viewDivisionFromTerritoryID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivisionFromTerritoryID($id) {
        $this->load->model('territory/territory_model');
        $fetchAllDivision = $this->territory_model->getAllDivisionfromID($id);
        $this->template->draw('territory/territoryMapView', false, $fetchAllDivision);
    }

    /**
     * Function drawIndexTerritoryManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexTerritoryManage() {
        $this->template->draw('territory/indexManageTerritory', true);
    }

    /**
     * Function updateTerritory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateTerritory() {

        $this->load->model('territory/territory_model');
        $id = $this->input->post('territory_id');
        $updateTerritory = $this->territory_model->updateTerritory1($this->input->post());
        if ($updateTerritory) {
            $this->session->set_flashdata('update_territory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Territory</spam>');
        } else {
            $this->session->set_flashdata('update_territory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Territory Error</spam>');
        }

        redirect("territory/drawIndexTerritoryManage?territory_idd=$id");
    }

    /**
     * Function updateTerritoryMap
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateTerritoryMap() {

        $this->load->model('territory/territory_model');
        $territory_has_division_id = $this->input->post('territory_has_division_id');
        $id_territory = $this->input->post('id_territory');

        $updateTerritory = $this->territory_model->updateTerritoryMaping1($this->input->post());
        if ($updateTerritory) {
            $this->session->set_flashdata('update_Maping', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully updated Territory Map</spam>');
        } else {
            $this->session->set_flashdata('update_Maping', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Territory Map Error</spam>');
        }

        redirect("territory/drawIndexTerritoryManage?territory_idd2=$id_territory");
    }

    /**
     * Function deleteTerritoryMap
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteTerritoryMap() {

        $this->load->model('territory/territory_model');
        $territory_has_division_id = $this->input->get('id_territory_has_division1');
        $id_territory = $this->input->get('territory_idd2');
        $deleteTerritoryMap = $this->territory_model->deleteTerritoryMap1($territory_has_division_id);
        redirect("territory/drawIndexTerritoryManage?territory_idd2=$id_territory");
    }

    /**
     * Function deleteTerritory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteTerritory() {
        $this->load->model('territory/territory_model');
        $id = $this->input->get('territory_idd');
        $deleteTerritory = $this->territory_model->deleteTerritory1($id);
        if ($deleteTerritory) {
            $this->session->set_flashdata('delete_Maping', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">successfully Deleted Territory </spam>');
        } else {
            $this->session->set_flashdata('delete_Maping', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Territory Error</spam>');
        }
        redirect("territory/indexTerritory");
    }

    /**
     * Function allDivisiontoCombo2
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allDivisiontoCombo2() {
        $this->load->model('territory/territory_model');
        $fetchAllTerritory = $this->territory_model->fetchFromAnyTable("tbl_division", null, null, null, 10000, 0, "RESULTSET", array('division_status' => 1), null);
        $pushdata = array('territory' => $fetchAllTerritory);
        $this->template->draw('territory/allParentDivisionCombo', false, $pushdata);
    }

    /**
     * Function getDivisionNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getDivisionNames() {
		$q = strtolower($_GET['term']); //this is stable
        $this->load->model('territory/territory_model');
        $column = array('division_name', 'id_division');
        $result = $this->territory_model->getDivisionNames($q, $column);
        echo json_encode($result);
    }

    function viewTeryDetailsItem() {

        $this->load->model('territory_type/territory_type_model');
        $this->load->model('territory/territory_model');
        $columndivision = array('id_territory_type', 'territory_type_name');
        $viewdivision = $this->territory_type_model->fetchFromAnyTable("tbl_territory_type", null, null, $columndivision, 10000, 0, "RESULTSET", array('territory_type_status' => 1), "added_date");
        $dataarray = array('tery_name' => $viewdivision);
        $this->template->draw('territory/divTerywManage', false, $dataarray);
    }

    function getTeryType() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('territory_name', 'id_territory');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_territory", 'territory_name', $q, $column);
        echo json_encode($result);
    }

    function viewTeryByFilterKey($Data) {
        $this->load->model('territory/territory_model');
        $viewTerritory = $this->territory_model->viewTeryByFilterKey($Data);
        $this->template->draw('territory/territoryView', false, $viewTerritory);
    }

    /**
     * Function viewBranchDetailsFromBranchID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDevisionDetailsFromTerritoryID($id) {
        $this->load->model('territory/territory_model');
        $fetchAllDevisionDetails = $this->territory_model->getTerritoryDetails($id);
        $this->template->draw('territory/territoryDetails', false, $fetchAllDevisionDetails);
    }
	    public function check_territoryName(){
          $this->load->model('territory/territory_model');
          $result = $this->territory_model->check_territoryName($q);
        foreach ($result as $value) {
            $column = array("territory_name" => $value->territory_name);
        }
        $no_result = array('label' => 'valid');
        if (count($result) > 0) {
            echo json_encode($column);
        } else {
            echo json_encode($no_result);
        }  
    }

}

?>

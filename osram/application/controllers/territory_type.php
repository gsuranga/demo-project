<?php

/**
 * Description of territory_type
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class territory_type extends C_Controller {

    private $resours = array(
        'JS' => array('territory_type/js/territoryType'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexTerritoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexTerritoryType() {
        $this->template->attach($this->resours);
        $this->template->draw('territory_type/indexTerritoryType', true);
    }

    /**
     * Function drawTerritoryTypeRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawTerritoryTypeRegister() {
        $this->template->attach($this->resours);
        $this->template->draw('territory_type/territoryTypeRegister', false);
    }

    /**
     * Function drawTerritoryTypeView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawTerritoryTypeView() {
        $this->load->model('territory_type/territory_type_model');
        $fetchAllTerritoryType = $this->territory_type_model->fetchFromAnyTable("tbl_territory_type", null, null, null, 10000, 0, "RESULTSET", array('territory_type_status' => 1), null);
        $this->template->draw('territory_type/territoryTypeView', false, $fetchAllTerritoryType);
    }

    /**
     * Function insertTerritoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertTerritoryType() {
        $this->form_validation->set_rules('territory_type_name', 'territory Type', 'required');

        if ($this->form_validation->run()) {
            $this->load->model('territory_type/territory_type_model');
            $insertTerritoryType = $this->territory_type_model->insertTerritoryType($this->input->post('territory_type_name'));
            if ($insertTerritoryType) {
                $this->session->set_flashdata('insert_territory_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Registered a Territory Type</spam>');
            } else {
                $this->session->set_flashdata('insert_territory_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Register Territory Type Error</spam>');
            }
            //$this->indexTerritoryType();
            redirect('territory_type/indexTerritoryType');
        } else {
            $this->indexTerritoryType();
        }
    }

    /**
     * Function drawIndexTerritoryTypeManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexTerritoryTypeManage() {
        $this->template->attach($this->resours);
        $this->template->draw('territory_type/indexManageTerritoryType', true);
    }

    /**
     * Function viewTerritoryTypeFromID
     *
     * 
     *
     * @param no
     * @return no
     */
    function viewTerritoryTypeFromID($id) {
        $this->load->model('territory_type/territory_type_model');
        $fetchAllTerritoryType = $this->territory_type_model->fetchFromAnyTable("tbl_territory_type", null, null, null, 10000, 0, "RESULTSET", array('territory_type_status' => 1, 'id_territory_type' => $id), null);
        $pushdata = array('territorytype' => $fetchAllTerritoryType);
        $this->template->draw('territory_type/territoryTypeManage', false, $pushdata);
    }

    /**
     * Function updateTerritoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateTerritoryType() {

        $this->load->model('territory_type/territory_type_model');
        $id = $this->input->post('territory_type_id');
        $updateTerritory = $this->territory_type_model->updateTerritoryType1($this->input->post());
        if ($updateTerritory) {
            $this->session->set_flashdata('update_territory_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Territory Type</spam>');
        } else {
            $this->session->set_flashdata('update_territory_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Territory Type Error</spam>');
        }

        redirect("territory_type/drawIndexTerritoryTypeManage?territory_type_idd=$id");
    }

    /**
     * Function deleteTerritoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteTerritoryType() {
        $this->load->model('territory_type/territory_type_model');
        $id = $this->input->get('territory_type_idd');
        $deleteTerritoryType = $this->territory_type_model->deleteTerritoryType1($id);
        
        if ($deleteTerritoryType) {
                $this->session->set_flashdata('delete_territory_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Territory Type</spam>');
            } else {
                $this->session->set_flashdata('delete_territory_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Territory Type Error</spam>');
            }
            redirect("territory_type/indexTerritoryType");
    }

    /**
     * Function indexViewTerritoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexViewTerritoryType() {
        $this->template->attach($this->resours);
        $this->template->draw('territory_type/indexViewTerritoryType', true);
    }

    function viewTerritoryTypeDetailsItem() {

        $this->load->model('territory_type/territory_type_model');
        $columnterritory = array('id_territory_type', 'territory_type_name');
        $viewdivision = $this->territory_type_model->fetchFromAnyTable("tbl_territory_type", null, null, $columnterritory, 10000, 0, "RESULTSET", array('territory_type_status' => 1), "added_date");

        $dataarray = array('tey_name' => $viewdivision);

        $this->template->draw('territory_type/viewAllTerritoryType', false, $dataarray);
    }

    function viewTerritoryTypeByFilterKey($Data) {
        $this->load->model('territory_type/territory_type_model');
        $viewTerritory = $this->territory_type_model->viewTerritoryTypeByFilterKey1($Data);
        $this->template->draw('territory_type/territoryTypeView', false, $viewTerritory);
    }

    function getTeryTypeName() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('territory_type_name', 'id_territory_type');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_territory_type", 'territory_type_name', $q, $column);
        echo json_encode($result);
    }
    function get_territory_type_name(){
        $this->load->model('territory_type/territory_type_model');
        $column;
        $q = array("territory_type_name"=> $_REQUEST['territory_type_name']);
        $result = $this->territory_type_model->get_territory_type($q);
        foreach ($result as $value) {
           $column = array("territory_type_name" => $value->territory_type_name);
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

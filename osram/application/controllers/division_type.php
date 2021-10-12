<?php

/**
 * Description of division_type
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class division_type extends C_Controller {

    private $resours = array(
        'JS' => array('division_type/js/divType'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexDivisionType() {
	$this->template->attach($this->resours);
        $this->template->draw('division_type/indexDivisionType', true);
    }

    /**
     * Function indexViewDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexViewDivisionType() {
        $this->template->attach($this->resours);
        $this->template->draw('division_type/indexViewDivisionType', true);
    }

    /**
     * Function drawDivisionTypeRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawDivisionTypeRegister() {
        $this->template->draw('division_type/divisionTypeRegister', false);
    }

    /**
     * Function insertDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
function insertDivisionType() {
        $this->form_validation->set_rules('division_type', 'Division Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('division_type/division_type_model');
            $insertDivisionType = $this->division_type_model->insertDivisionType($this->input->post('division_type'));
            if ($insertDivisionType) {
                $this->session->set_flashdata('insert_division_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully registered a Division Type</spam>');
            } else {
                $this->session->set_flashdata('insert_division_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Register Division Type Error</spam>');
            }
            //$this->indexDivisionType();
            redirect('division_type/indexDivisionType');
        } else {
            $this->indexDivisionType();
            //redirect('division_type/indexDivisionType');
        }
    }

    /**
     * Function drawIndexDivisionTypeManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexDivisionTypeManage() {
        $this->template->draw('division_type/indexManageDivisionType', true);
    }

    /**
     * Function drawDivisionTypeView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawDivisionTypeView() {
        $this->load->model('division_type/division_type_model');
        $fetchAllDivisionType = $this->division_type_model->fetchFromAnyTable("tbl_division_type", null, null, null, 10000, 0, "RESULTSET", array('division_status' => 1), null);

        $this->template->draw('division_type/divisionTypeView', false, $fetchAllDivisionType);
    }

    /**
     * Function viewDivisionTypeFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivisionTypeFromID($id) {
        $this->load->model('division_type/division_type_model');
        $fetchAllDivisionType = $this->division_type_model->fetchFromAnyTable("tbl_division_type", null, null, null, 10000, 0, "RESULTSET", array('division_status' => 1, 'id_division_type' => $id), null);
        $pushdata = array('divisiontype' => $fetchAllDivisionType);
        $this->template->draw('division_type/divisionTypeManage', false, $pushdata);
    }

    /**
     * Function updateDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateDivisionType() {

        $this->load->model('division_type/division_type_model');
        $id = $this->input->post('division_type_id');
        $updateDivision = $this->division_type_model->updateDivisionType1($this->input->post());
        if ($updateDivision) {
            $this->session->set_flashdata('update_division_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Division Type Successfully Updated</spam>');
        } else {
            $this->session->set_flashdata('update_division_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Division Type Update Error</spam>');
        }
        redirect("division_type/drawIndexDivisionTypeManage?division_type_idd=$id");
    }

    /**
     * Function deleteDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteDivisionType() {
        $this->load->model('division_type/division_type_model');        
        $id = $this->input->get('division_type_idd');
        $deleteDivisionType = $this->division_type_model->deleteDivisionType1($id);
         if ($deleteDivisionType) {
            $this->session->set_flashdata('delete_division_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Division Type Successfully Deleted</spam>');
        } else {
            $this->session->set_flashdata('delete_division_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Division Type Error</spam>');
        }
        redirect('division_type/indexDivisionType');
    }

    /**
     * Function viewDivTypeDetailsItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivTypeDetailsItem() {

        $this->load->model('division_type/division_type_model');
        $columndivision = array('id_division_type', 'tbl_division_type_name');
        $viewdivision = $this->division_type_model->fetchFromAnyTable("tbl_division_type", null, null, $columndivision, 10000, 0, "RESULTSET", array('division_status' => 1), "added_date");
        $dataarray = array('div_name' => $viewdivision);

        $this->template->draw('division_type/viewAllDivType', false, $dataarray);
    }

    /**
     * Function getDivTypeName
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function getDivTypeName() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('tbl_division_type_name', 'id_division_type');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_division_type", 'tbl_division_type_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function viewDivisionTypeByFilterKey
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewDivisionTypeByFilterKey($Data) {
        $this->load->model('division_type/division_type_model');
        $viewDivision = $this->division_type_model->viewDivisionTypeByFilterKey1($Data);
        $this->template->draw('division_type/divisionTypeView', false, $viewDivision);
    }
    function get_divition_type(){
        $this->load->model('division_type/division_type_model');
        $column;
        $q = array("tbl_division_type_name"=> $_REQUEST['tbl_division_type_name']);
        $result = $this->division_type_model->get_division_type($q);
        foreach ($result as $value) {
            $column = array("tbl_division_type_name" => $value->tbl_division_type_name);
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

<?php

/**
 * Description of employee_type
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class employee_type extends CI_Controller {

    private $resours2 = array(
        'JS' => array('employee/js/employeeTypeManage','employee_type/js/empType'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexEmployeeType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexEmployeeType() {
        $this->template->attach($this->resours2);
        $this->template->draw('employee_type/indexEmployeeType', true);
    }

    /**
     * Function insertEmployeeType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertEmployeeType() {
        $this->form_validation->set_rules('employee_type', 'Employee Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('employee_type/employee_type_model');
            $insertEmployeeType = $this->employee_type_model->insertEmployeeType($this->input->post('employee_type'));
            if ($insertEmployeeType) {
                $this->session->set_flashdata('insert_employee_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Employee Type</spam>');
            } else {
                $this->session->set_flashdata('insert_employee_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px"> Error</spam>');
            }
            redirect('employee_type/indexEmployeeType');
        } else {
            $this->indexEmployeeType();
        }
    }

    /**
     * Function drawEmployeeTypeRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeTypeRegister() {

        $this->template->draw('employee_type/employeeTypeRegister', false);
    }

    /**
     * Function drawEmployeeTypeView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeTypeView() {
        $this->load->model('employee_type/employee_type_model');
        $column = array('id_employee_type', 'employee_type');
        $fetchAllEmployeeType = $this->employee_type_model->fetchFromAnyTable("tbl_employee_type", null, null, null, 10000, 0, "RESULTSET", array('employee_type_status' => 1), null);
        $this->template->draw('employee_type/employeeTypeView', false, $fetchAllEmployeeType);
    }

    /**
     * Function drawEmployeeTypeManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeTypeManage() {
        $this->template->draw('employee_type/employeeTypeManage', false);
    }

    /**
     * Function drawIndexEmployeeTypeManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexEmployeeTypeManage() {
        $this->template->attach($this->resours2);
        $this->template->draw('employee_type/indexManageEmployeeType', true);
    }

    /**
     * Function drawIndexViewEmployeeType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexViewEmployeeType() {
          $this->template->attach($this->resours2);        
        $this->template->draw('employee_type/indexViewEmployeeType', true);
    }

    /**
     * Function viewEmployeeTypeDetailsFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewEmployeeTypeDetailsFromID($idd) {
        $this->load->model('employee_type/employee_type_model');
        $id = $idd;
        $fetchAllEmployee = $this->employee_type_model->fetchFromAnyTable("tbl_employee_type", null, null, null, 10000, 0, "RESULTSET", array('employee_type_status' => 1, 'id_employee_type' => $id), null);
        $pushdata = array('employee1' => $fetchAllEmployee);
        $this->template->draw('employee_type/employeeTypeManage', false, $pushdata);
    }

    /**
     * Function updateEmployeeType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateEmployeeType() {

        $this->load->model('employee_type/employee_type_model');
        $id = $this->input->post('employee_type_id');
        $insertEmployeeType = $this->employee_type_model->updateEmployeeType1($this->input->post());
        if ($insertEmployeeType) {
            $this->session->set_flashdata('update_employee_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px"> Successfully updated Employee Type</spam>');
        } else {
            $this->session->set_flashdata('update_employee_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Error</spam>');
        }

        redirect("employee_type/drawIndexEmployeeTypeManage?employee_type_idd=$id");
    }

    /**
     * Function deleteEmployeeType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteEmployeeType() {
        $this->load->model('employee_type/employee_type_model');
        $id = $this->input->get('employee_type_idd');
        $insertEmployeeType = $this->employee_type_model->deleteEmployeeType1($id);
                if ($insertEmployeeType) {
                $this->session->set_flashdata('delete_emp_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Employee Type</spam>');
            } else {
                $this->session->set_flashdata('delete_emp_type', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Employee Type Error</spam>');
            }
        redirect("employee_type/indexEmployeeType");
    }

    function viewEmpTypeDetailsItem() {

        $this->template->draw('employee_type/empViewManage', false);
    }

    function getEmpType() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('employee_type', 'id_employee_type');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee_type", 'employee_type', $q, $column);
        echo json_encode($result);
    }

    function viewEmployeeTypeByFilterKey($Data) {
        $this->load->model('employee_type/employee_type_model');
        $viewEmptype = $this->employee_type_model->viewEmployeeTypeByFilterKey($Data);
        $this->template->draw('employee_type/employeeTypeView', false, $viewEmptype);
    }

  
    function get_employee_type(){
        $this->load->model('employee_type/employee_type_model');
        $column;
        $q = array("employee_type"=> $_REQUEST['employee_type']);
        $result = $this->employee_type_model->get_employee_type($q);
        foreach ($result as $value) {
            $column = array("employee_type" => $value->employee_type);
        }
        $no_result = array('label' => 'valid');
        if (count($result) > 0) {
            echo json_encode($column);
        } else {
            echo json_encode($no_result);
        }  
    }}

?>

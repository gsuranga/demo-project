<?php

/**
 * Description of employee
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class employee extends C_Controller {

    private $resours = array(
        'JS' => array('employee/js/employeeManage', 'employee/js/employeeTypeManage'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexEmployee
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexEmployee() {
        $this->template->attach($this->resours);
        $this->template->draw('employee/indexEmployee', true);
    }

    /**
     * Function indexEmployeeAssign
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexEmployeeAssign() {
        $this->template->attach($this->resours);
        $this->template->draw('employee/indexEmployeeAssign', true);
    }

    /**
     * Function autoc
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function autoc() {

        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $a = array('employee_type', 'id_employee_type');
        $res = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee_type", 'employee_type', $q, array('id_employee_type', 'id_employee_type', 'added_time'));




        echo json_encode($res);
    }

    /**
     * Function drawEmployeeRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeRegister() {
        $this->template->draw('employee/employeeRegister', false);
    }

    /**
     * Function drawEmployeeAssign
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeAssign($empID) {
        $this->template->draw("employee/employeeAssign", false);
    }

    /**
     * Function drawEmployeeManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeManage() {
        $this->template->draw("employee/employeeManage", false);
    }

    /**
     * Function drawIndexEmployeeManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexEmployeeManage() {
        $this->template->attach($this->resours);
        $this->template->draw('employee/indexManageEmployee', true);
    }

    /**
     * Function drawViewEmployee
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawViewEmployee() {
        $this->template->attach($this->resours);
        $this->template->draw('employee/indexViewEmployee', true);
    }

    /**
     * Function addEmployee
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function addEmployee() {
        $this->form_validation->set_rules('firstname', 'First Name', 'required');
        $this->form_validation->set_rules('lastname', 'Last Name', 'required');
        $this->form_validation->set_rules('nic', 'Nic', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_rules('mobile', 'Mobile No', 'required');
        $this->form_validation->set_rules('telno', 'Telephone', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        if ($this->form_validation->run()) {
            if ($this->input->post("firstname") != '' && $this->input->post("lastname") != '' && $this->input->post("nic") != '' && $this->input->post("employee_type") != '' && $this->input->post("address") != '') {
                $this->load->model('employee/employee_model');
                $insertEmployee = $this->employee_model->insertEmployee($this->input->post());
                redirect("employee/indexEmployeeAssign?empID=$insertEmployee");
            } else {
                $this->session->set_flashdata('employeeRegister', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Please Enter Employee Details</spam>');
                $this->indexEmployee();
            }
            $this->indexEmployee();
            //redirect('division/indexEmployee');
        } else {
            $this->indexEmployee();
        }
    }

    /**
     * Function assignEmployee
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function assignEmployee() {
            $this->load->model('employee/employee_model');
            $insertEmployee = $this->employee_model->employeeAssign1($this->input->post());
            if ($insertEmployee) {
                $this->session->set_flashdata('employeeRegister', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added a Employee</spam>');
            } else {
                $this->session->set_flashdata('employeeRegister', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Employee Error</spam>');
            }
            redirect("employee/indexEmployee");
    }

    /**
     * Function drawEmployeeMapingView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeMapingView($id) {
        $this->load->model('employee/employee_model');
        $fetchAllEmployee = $this->employee_model->getAllEmployeeMaping($id);
        $this->template->draw('employee/employeeMapingView', false, $fetchAllEmployee);
    }

    /**
     * Function drawEmployeeView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawEmployeeView() {
        $this->load->model('employee/employee_model');
        $fetchAllEmployee = $this->employee_model->fetchFromAnyTable("tbl_employee", null, null, null, 10000, 0, "RESULTSET", array('employee_status' => 1), null);
        $this->template->draw('employee/employeeView', false, $fetchAllEmployee);
    }

    /**
     * Function allEmployeeTypestoCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allEmployeeTypestoCombo() {
        $this->load->model('employee/employee_model');
        $fetchAllEmployee = $this->employee_model->fetchFromAnyTable("tbl_employee_type", null, null, null, 10000, 0, "RESULTSET", array('employee_type_status' => 1), null);
        $pushdata = array('employee' => $fetchAllEmployee);
        $this->template->draw('employee/allEmployeeTypeCombo', false, $pushdata);
    }

    /**
     * Function viewEmployeeDetailsFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewEmployeeDetailsFromID($id) {
        $this->load->model('employee/employee_model');
        // print_r($id);
        $fetchAllEmployee = $this->employee_model->getEmployeeFromID($id);
        $pushdata = array('employee' => $fetchAllEmployee);
        //print_r($fetchAllEmployee);
        $this->template->draw('employee/employeeManage', false, $pushdata);
    }

    /**
     * Function viewEmployeeMapFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewEmployeeMapFromID($id) {
        $this->template->attach($this->resours);
        $this->load->model('employee/employee_model');
        $fetchAllEmployeeMap = $this->employee_model->getAllEmployeeMapingFromID($id);
        $this->template->draw('employee/employeeMapManage', false, $fetchAllEmployeeMap);
    }

    /**
     * Function updateEmployee
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateEmployee() {

        $this->load->model('employee/employee_model');
        $id = $this->input->post('employee_id');
        $insertUserType = $this->employee_model->updateEmployee1($this->input->post());
        if ($insertUserType) {
            $this->session->set_flashdata('update_employee', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Employee</spam>');
        } else {
            $this->session->set_flashdata('update_employee', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Employee Error</spam>');
        }

        redirect("employee/drawIndexEmployeeManage?employee_idd=$id");
    }

    /**
     * Function updateEmployeeMap
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateEmployeeMap() {

        $this->load->model('employee/employee_model');
        $id_employee_has_place = $this->input->post('id_employee');
        $employee_has_place = $this->employee_model->updateEmployeeMap1($this->input->post());
        if ($employee_has_place) {
            $this->session->set_flashdata('update_employee_map', '<div id="alert_div" style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated a Employee Map</div>');
        } else {
            $this->session->set_flashdata('update_employee_map', '<div id="alert_div" style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Employee Map Error</div>');
        }

        redirect("employee/drawIndexEmployeeManage?employee_idd2=$id_employee_has_place");
    }

    /**
     * Function deleteEmployee
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteEmployee() {
        $this->load->model('employee/employee_model');
        $id = $this->input->get('employee_idd');
        $deletePEmployee = $this->employee_model->deleteEmployee1($id);
         if ($deletePEmployee) {
            $this->session->set_flashdata('delete_employee', '<div id="alert_div" style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully deleted a Employee </div>');
        } else {
            $this->session->set_flashdata('delete_employee', '<div id="alert_div" style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Delete Employee</div>');
        }
        redirect("employee/indexEmployee");
    }

    /**
     * Function deleteEmployeeMap
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteEmployeeMap() {
        $this->load->model('employee/employee_model');
        $id_employee_has_place2 = $this->input->get('id_employee_has_place2');
        print_r($id_employee_has_place2);
        $deletePEmployee = $this->employee_model->deleteEmployeeMap1($id_employee_has_place2);
        if ($deletePEmployee) {
            $this->session->set_flashdata('delete_employee_map', '<div id="alert_div" style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully deleted a Employee Map </div>');
        } else {
            $this->session->set_flashdata('delete_employee_map', '<div id="alert_div" style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Delete Employee</div>');
        }
        
        redirect("employee/indexEmployee");
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
     * Function getPhysicalPlaceNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    //auto complete
    public function getPhysicalPlaceNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('physical_place_name', 'id_physical_place');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_physical_place", 'physical_place_name', $q, $column);
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

    function viewEmployeeDetailsItem() {


        $this->template->draw('employee/empViewManage', false);
    }

    function getEmpName() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('employee_first_name','employee_last_name', 'id_employee');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee", 'employee_first_name', $q, $column);
        echo json_encode($result);
    }

    function getEmpNIC() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('employee_nic', 'id_employee');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee", 'employee_nic', $q, $column);
        echo json_encode($result);
    }

    function getEmpAddress() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('employee_address', 'id_employee');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee", 'employee_address', $q, $column);
        echo json_encode($result);
    }

    function getEmpMobile() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('employee_mobile', 'id_employee');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee", 'employee_mobile', $q, $column);
        echo json_encode($result);
    }

    function getEmpTele() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('employee_telephone', 'id_employee');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee", 'employee_telephone', $q, $column);
        echo json_encode($result);
    }

    function getEmpEmail() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('employee_email', 'id_employee');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_employee", 'employee_email', $q, $column);
        echo json_encode($result);
    }

    function viewEmployeeByFilterKey($Data) {
        $this->load->model('employee/employee_model');
        $viewEmp = $this->employee_model->viewEmployeeByFilterKey($Data);
        $this->template->draw('employee/employeeView', false, $viewEmp);
    }

    /**
     * Function viewBranchDetailsFromBranchID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewEmployeeDetailsFromEmployeeID($id) {
        $this->load->model('employee/employee_model');
        $fetchAllDevisionDetails = $this->employee_model->getEmployeeDetails($id);
        $this->template->draw('employee/employeeDetails', false, $fetchAllDevisionDetails);
    }

}

?>

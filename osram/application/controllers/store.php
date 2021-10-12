<?php

/**
 * Description of store
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class store extends C_Controller {

    private $resours = array(
        'JS' => array('store/js/store'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function drawIndexStore
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexStore() {

        $this->template->attach($this->resours);
        $this->template->draw('store/indexStore', true);
    }

    /**
     * Function drawInsertStore
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawInsertStore() {
        $this->template->attach($this->resours);
        $this->template->draw('store/addStore', false);
    }

    /**
     * Function insertStore
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
        public function insertStore() {
        $this->form_validation->set_rules('storecode', 'Store Code', 'required');
        $this->form_validation->set_rules('storename', 'Store Name', 'required');
        $this->form_validation->set_rules('emp', 'Employee Name', 'required');
        $this->form_validation->set_rules('empno', 'Employee no', 'required');
        $this->form_validation->set_rules('employee_id', 'Employee ID', 'required');
        $this->form_validation->set_rules('division_name', 'Division Name', 'required');
        $this->form_validation->set_rules('territory_name', 'Territory Name', 'required');
        $this->form_validation->set_rules('physical_place_name', 'Physical Place', 'required');
        $this->form_validation->set_rules('id_employee_has_place', 'id_employee_has_place', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('store/store_model');
            $insertStore = $this->store_model->insertStore($this->input->post());
            if ($insertStore) {
                $this->session->set_flashdata('insert_insertStore', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added a Store  </spam>');
            } else {
                $this->session->set_flashdata('insert_insertStore', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Error</spam>');
            }
            redirect('store/drawIndexStore');
        } else {
            $this->drawIndexStore();
        }
    }

    /**
     * Function getEmpNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getEmpNames() {
        $q = strtolower($_GET['term']); //this is stable
        $this->load->model('store/store_model');
        $column = array('employee_first_name', 'id_employee','id_employee_registration');
        $result = $this->store_model->getEmployeNamesbyStores($q, $column);
        echo json_encode($result);
    }

    /**
     * Function drawViewStore
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawViewStore() {
        $this->load->model('store/store_model');
        $viewStore = $this->store_model->viewAllStore();
        $this->template->draw('store/viewStore', false, $viewStore);
    }

    /**
     * Function deleteStore
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteStore() {
        $this->load->model('store/store_model');
        $id = $this->input->get('id');
        $insertUserType = $this->store_model->deleteStore1($id);
         if ($insertUserType) {
            $this->session->set_flashdata('delete_store', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Store</spam>');
        } else {
            $this->session->set_flashdata('delete_store', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Store Error</spam>');
        }
        redirect("store/drawIndexStore");
    }

    /**
     * Function drawUpdateStore
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawUpdateStore($id) {
        $this->template->attach($this->resours);
        $this->template->draw('store/manageStore', false);
    }

    /**
     * Function updateStore
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
      public function updateStore() {

        $this->load->model('store/store_model');
        $update = $this->store_model->updateStore($this->input->post());
        if ($update) {
            $this->session->set_flashdata('update_store', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated a Store</spam>');
        } else {
            $this->session->set_flashdata('update_store', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Store Error</spam>');
        }
        redirect("store/drawIndexStore");
    }

    public function getDivision() {
        $q = strtolower($_GET['term']);
        $employee_id = $_GET['employee_id'];
        $this->load->model('salesorder/salesorder_model');
        $column = array('division_name', 'id_division');
        $result = $this->salesorder_model->getDivision1($q, $column, $employee_id);
        echo json_encode($result);
    }

    /**
     * Function allDivisionCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allDivisionCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllDivision = $this->salesorder_model->getDivision1($this->input->post('empid'));

        foreach ($fetchAllDivision as $data) {
            echo "<option value='$data->id_division'>$data->division_name</option>";
        }
    }

    /**
     * Function allTerritoryCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allTerritoryCombo() {
        $this->load->model('itemdiscount/itemdiscount_model');
        $fetchAllterritory = $this->itemdiscount_model->getTerritory1($this->input->post('division_name'), $this->input->post('empid'));

        foreach ($fetchAllterritory as $value) {
            echo "<option value='$value->id_territory'>$value->territory_name</option>";
        }
    }

    /**
     * Function allPhysicalPlaceCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allPhysicalPlaceCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllPhysicalPlace = $this->salesorder_model->getPhysicalPlace1($this->input->post('division_name'), $this->input->post('empid'), $this->input->post('territory_name'));

        foreach ($fetchAllPhysicalPlace as $data) {
            foreach ($data as $value) {
                echo "<option value='$value->id_physical_place'>$value->physical_place_name</option>";
            }
        }
    }

    /**
     * Function getEmployeHasPlaceID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function getEmployeHasPlaceID() {
        $this->load->model('salesorder/salesorder_model');
        $frechData = $this->salesorder_model->getEmployeeHasPlaceID($this->input->post());
        echo $frechData->id_employee_has_place . "`" . $frechData->discount;
    }

}

?>

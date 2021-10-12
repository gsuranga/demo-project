<?php

/**
 * Description of itemdiscount
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class itemdiscount extends C_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function drawindexDiscount
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawindexDiscount() {
        //$this->template->attach($this->resours);
        $this->template->draw('itemdiscount/indexDiscount', true);
    }

    /**
     * Function drawindexDiscount
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawindexDiscountManage() {
        //$this->template->attach($this->resours);
        $this->template->draw('itemdiscount/indexDiscountManage', true);
    }

    /**
     * Function drawaddDiscount
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawaddDiscount() {
        //$this->template->attach($this->resours);
        $this->template->draw('itemdiscount/addDiscount', false);
    }

    /**
     * Function insertDiscount
     *
     *
     *
     * @param no
     * @return no
     */
    function insertDiscount() {
        $this->form_validation->set_rules('employee_name', 'Employee Name', 'required');
        $this->form_validation->set_rules('item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('division_name', 'Division Name', 'required');
        $this->form_validation->set_rules('territory_name', 'Territory Name', 'required');
        $this->form_validation->set_rules('physical_place_name', 'Physical Place Name', 'required');
        $this->form_validation->set_rules('discount', 'Discount', 'required');
        $this->form_validation->set_rules('employee_id', 'Discount', 'required');
        $this->form_validation->set_rules('id_employee_has_place', 'id_employee_has_place', 'required');
        $this->form_validation->set_rules('item_id', 'Discount', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('itemdiscount/itemdiscount_model');
            $insertDiscount = $this->itemdiscount_model->insertDiscount1($this->input->post());
            if ($insertDiscount) {
                $this->session->set_flashdata('insert_discount', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Discount</spam>');
            } else {
                $this->session->set_flashdata('insert_discount', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Discount Error</spam>');
            }
            redirect('itemdiscount/drawindexDiscount');
        } else {
            $this->drawindexDiscount(); 
        }
    }

    /**
     * Function updateDiscount
     *
     *
     *
     * @param no
     * @return no
     */
    function updateDiscount() {
        $this->load->model('itemdiscount/itemdiscount_model');
        $id_employee_item_discount = $this->input->post('id_employee_item_discount');
        $updateDiscount = $this->itemdiscount_model->updateDiscount1($this->input->post());
        if ($updateDiscount) {
            $this->session->set_flashdata('update_discount', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated a Discount</spam>');
        } else {
            $this->session->set_flashdata('update_discount', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Discount Error</spam>');
        }

        redirect("itemdiscount/drawindexDiscountManage?id_employee_item_discount=$id_employee_item_discount");
    }

    /**
     * Function deleteDiscount
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteDiscount() {
        $this->load->model('itemdiscount/itemdiscount_model');
        $id_employee_item_discount = $this->input->get('id_employee_item_discount');
        $deleteDivisionType = $this->itemdiscount_model->deleteDiscount1($id_employee_item_discount);
         if ($deleteDivisionType) {
            $this->session->set_flashdata('delete_discount', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted a Discount</spam>');
        } else {
            $this->session->set_flashdata('delete_discount', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Discount Error</spam>');
        }
        redirect("itemdiscount/drawindexDiscount");
    }

    /**
     * Function drawDiscountView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawDiscountView() {
        $this->load->model('itemdiscount/itemdiscount_model');
        $fetchAllDiscount = $this->itemdiscount_model->getAllDiscount1();
        $this->template->draw('itemdiscount/viewDiscount', false, $fetchAllDiscount);
    }

    /**
     * Function drawDiscountView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawDiscountManage($id) {
        $this->load->model('itemdiscount/itemdiscount_model');
        $fetchAllDiscountByID = $this->itemdiscount_model->getAllDiscountById1($id);
        $this->template->draw('itemdiscount/manageDiscount', false, $fetchAllDiscountByID);
    }

    public function getItem() {
        $q = strtolower($_GET['term']);
        $this->load->model('itemdiscount/itemdiscount_model');
        $column = array('item_name', 'id_item');
        $result = $this->itemdiscount_model->getItem1($q, $column);
        echo json_encode($result);
    }

    public function getEmployee() {
        $q = strtolower($_GET['term']);
        $this->load->model('salesorder/salesorder_model');
        $column = array('full_name', 'id_employee');
        $result = $this->salesorder_model->getEmployee1($q, $column);
        echo json_encode($result);
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
     * Function allOutletCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allOutletCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllOutlet = $this->salesorder_model->getOutlet1($this->input->post('territory_name'));

        foreach ($fetchAllOutlet as $data) {
            foreach ($data as $value) {
                echo "<option value='$value->id_outlet'>$value->outlet_name</option>";
            }
        }
    }

    /**
     * Function allBranchCombo
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allBranchCombo() {
        $this->load->model('salesorder/salesorder_model');
        $fetchAllBranch = $this->salesorder_model->getBranch1($this->input->post('outlet_name'));

        foreach ($fetchAllBranch as $value) {
            echo "<option value='$value->id_outlet_has_branch'>$value->branch_address</option>";
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
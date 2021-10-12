<?php

/**
 * Description of outlet_category
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class outlet_category extends C_Controller {

    private $resours = array(
        'JS' => array('outlet/js/OutletCategoryManage'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexOutletCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexOutletCategory() {
        $this->template->attach($this->resours);
        $this->template->draw('outletcategory/indexOutletCategory', true);
    }

    /**
     * Function indexOutletCategoryView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexOutletCategoryView() {
        $this->template->attach($this->resours);
        $this->template->draw('outletcategory/indexOutletCategoryView', true);
    }

    /**
     * Function insertOutletCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertOutletCategory() {
        $this->form_validation->set_rules('outlet_type', 'Outlet Category', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('outlet/outlet_category_model');
            //$employeeType = array($this->input->post('outlet_category_name'));
            $insertUserType = $this->outlet_category_model->insertOutlet_category($this->input->post('outlet_type'));
            if ($insertUserType) {
                $this->session->set_flashdata('insert_outlet_cat', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Outlet Category</spam>');
            } else {
                $this->session->set_flashdata('insert_outlet_cat', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Outlet Category Error</spam>');
            }
            redirect('outlet_category/indexOutletCategory');
        } else {
            $this->indexOutletCategory();
        }
    }

    /**
     * Function drawOutletCategoryRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutletCategoryRegister() {
        $this->template->draw('outletcategory/outletCategoryRegister', false);
    }

    /**
     * Function drawOutletCategoryView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawOutletCategoryView() {
        $this->load->model('outlet/outlet_category_model');
        $column = array('id_outlet_category', 'outlet_category_name', 'added_date', 'added_time');
        $viewoutletCategory = $this->outlet_category_model->fetchFromAnyTable("tbl_outlet_category", null, null, $column, 10000, 0, "RESULTSET", array('outlet_category_status' => 1), "added_date");
        $this->template->draw('outletcategory/outletCategoryView', false, $viewoutletCategory);
    }

    /**
     * Function deleteOutletCategoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteOutletCategoryType() {
        $this->load->model('outlet/outlet_category_model');
        $id = $this->input->get('id_outlet_category');
        $insertUserType = $this->outlet_category_model->deleteOutletCategoryType($id);
        if ($insertUserType) {
                $this->session->set_flashdata('delete_outlet_cat', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Outlet Category</spam>');
            } else {
                $this->session->set_flashdata('delete_outlet_cat', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Outlet Category Error</spam>');
            }
        // print_r($insertUserType);
        redirect('outlet_category/indexOutletCategory');
    }

    /**
     * Function drawIndexOutletCategoryManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexOutletCategoryManage() {
        $this->template->attach($this->resours);
        $this->template->draw('outletcategory/indexManageOutletCategory', true);
    }

    /**
     * Function viewOutletCategoryDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewOutletCategoryDetailsFromId($id) {
        $this->load->model('outlet/outlet_category_model');

        $fetchAllOutletCategory = $this->outlet_category_model->fetchFromAnyTable("tbl_outlet_category", null, null, null, 10000, 0, "RESULTSET", array('outlet_category_status' => 1, 'id_outlet_category' => $id), null);
        $this->template->draw('outletcategory/OutletCategoryManage', false, $fetchAllOutletCategory);
    }

    /**
     * Function drawOutletCategoryViewManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawOutletCategoryViewManage() {
        $this->template->draw('outletcategory/OutletCategoryManage', false);
    }

    /**
     * Function updateOutletCategoryType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateOutletCategoryType() {

        $this->load->model('outlet/outlet_category_model');
        $id = $this->input->post('id_outlet_category');
        $insertUserType = $this->outlet_category_model->updateOutletCategoryType($this->input->post());
        //print_r($insertUserType);
        if ($insertUserType) {
            $this->session->set_flashdata('update_outlet_category', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Outlet Category</spam>');
        } else {
            $this->session->set_flashdata('update_outlet_category', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Outlet Category Error</spam>');
        }

        redirect("outlet_category/drawIndexOutletCategoryManage?id_outlet_category=$id");
    }

    function viewOutletCategoryDetailsItem() {

        $this->load->model('outlet/outlet_category_model');
        $columndivision = array('id_outlet_category', 'outlet_category_name');
        $viewdivision = $this->outlet_category_model->fetchFromAnyTable("tbl_outlet_category", null, null, $columndivision, 10000, 0, "RESULTSET", array('outlet_category_status' => 1), "added_date");
        $dataarray = array('outlet_category_name' => $viewdivision);
        $this->template->draw('outletcategory/outletCategoryViewManage', false, $dataarray);
    }

    function viewOutletCategoryByFilterKey($Data) {
        $this->load->model('outlet/outlet_category_model');
        $viewOutletCategory = $this->outlet_category_model->viewOutletCategoryByFilterKey($Data);
        $this->template->draw('outletcategory/outletCategoryView', false, $viewOutletCategory);
    }

    function getOutletCategoryName() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('outlet_category_name', 'id_outlet_category');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_outlet_category", 'outlet_category_name', $q, $column);
        echo json_encode($result);
    }     function get_outlet_category_name(){
        $this->load->model('outlet/outlet_category_model');
        $column;
        $q = array("outlet_category_name"=> $_REQUEST['outlet_category_name']);
        $result = $this->outlet_category_model->get_outlet_category_name($q);
        foreach ($result as $value) {
           $column = array("outlet_category_name" => $value->outlet_category_name);
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

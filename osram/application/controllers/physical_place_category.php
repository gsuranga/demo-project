<?php

/**
 * Description of physical_place_category
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class physical_place_category extends C_Controller {

    private $resours = array(
        'JS' => array('physicalplace_category/js/physicalplace'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexPhysicalPlaceCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexPhysicalPlaceCategory() {
        $this->template->attach($this->resours);
        $this->template->draw('physicalplace_category/indexPhysicalPlaceType', true);
    }

    /**
     * Function drawPhysicalPlaceCategoryRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPhysicalPlaceCategoryRegister() {
        $this->template->attach($this->resours);
        $this->template->draw('physicalplace_category/physical_place_category_Register', false);
    }

    /**
     * Function drawPhysicalPlaceCategoryView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPhysicalPlaceCategoryView() {
        $this->load->model('physicalplace_type/physical_place_category_model');
        $fetchAllPhysicalPlaceCategory = $this->physical_place_category_model->viewAllPhysicalType();

        $this->template->draw('physicalplace_category/physicalPlaceCategoryView', false, $fetchAllPhysicalPlaceCategory);
    }

    /**
     * Function insertPhysicalPlaceCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertPhysicalPlaceCategory() {
        $this->form_validation->set_rules('physical_palace_category_name', 'Category Name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('physicalplace_type/physical_place_category_model');
            $insertPhysicalPlaceCategory = $this->physical_place_category_model->insertPhysicalPalceCategory1($this->input->post('physical_palace_category_name'));
            if ($insertPhysicalPlaceCategory) {
                $this->session->set_flashdata('insert_physical_place_category', '<br><span style="font-size: 11px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Register Physical Place Category</spam>');
            } else {
                $this->session->set_flashdata('insert_physical_place_category', '<br><span style="font-size: 12px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Register Physical Place Category Error</spam>');
            }
            redirect('physical_place_category/indexPhysicalPlaceCategory');
        } else {
            $this->indexPhysicalPlaceCategory();
        }
    }

    /**
     * Function indexViewTerritoryType
     *
     * 
     *
     * @param no
     * @return no
     */
    function indexViewTerritoryType() {
        $this->template->attach($this->resours);
        $this->template->draw('physicalplace_category/indexViewphysicalPlaceCategory', true);
    }

    /**
     * Function viewPhysicalPlaceFromID
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewPhysicalPlaceFromID($id) {
        $this->load->model('physicalplace_type/physical_place_category_model');
        $fetchAllPhysicalPlaceCategory = $this->physical_place_category_model->fetchFromAnyTable("tbl_physical_place_category", null, null, null, 10000, 0, "RESULTSET", array('physical_place_category_status' => 1, 'id_physical_place_category' => $id), null);
        $pushdata = array('physicalplacecategorytype' => $fetchAllPhysicalPlaceCategory);
        $this->template->draw('physicalplace_category/PhysicalPlaceCategoryManage', false, $pushdata);
    }

    /**
     * Function drawIndexPhysicalPlaceCategoryManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexPhysicalPlaceCategoryManage() {
        $this->template->attach($this->resours);
        $this->template->draw('physicalplace_category/indexManagePhysicalPlaceCategory', true);
    }

    /**
     * Function updatePhysicalPlaceCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updatePhysicalPlaceCategory() {

        $this->load->model('physicalplace_type/physical_place_category_model');
        $id = $this->input->post('physical_place_category__id');
        $updatePhysicalPlaceCategory = $this->physical_place_category_model->updatePhysicalPalceCategory1($this->input->post());
        if ($updatePhysicalPlaceCategory) {
            $this->session->set_flashdata('update_physical_place_category', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Update Physical Place Category</spam>');
        } else {
            $this->session->set_flashdata('update_physical_place_category', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Physical Place Category Error</spam>');
        }

        redirect("physical_place_category/drawIndexPhysicalPlaceCategoryManage?physical_place_category_idd=$id");
    }

    /**
     * Function deletePhysicalPlaceCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deletePhysicalPlaceCategory() {
        $this->load->model('physicalplace_type/physical_place_category_model');
        $id = $this->input->get('physical_place_category_idd');
        $deletePhysicalPlaceCategory = $this->physical_place_category_model->deletePhysicalPalceCategory1($id);
        if ($deletePhysicalPlaceCategory) {
                $this->session->set_flashdata('deletePhysicalPlaceCategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Physical Place Category</spam>');
            } else {
                $this->session->set_flashdata('deletePhysicalPlaceCategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Physical Place Category Error</spam>');
            }
        redirect("physical_place_category/indexPhysicalPlaceCategory");
    }

    function viewPhysicalTypeDetailsItem() {

        $this->load->model('physicalplace_type/physical_place_category_model');
        $columndivision = array('id_physical_place_category', 'physical_place_category_name');
        $viewdivision = $this->physical_place_category_model->fetchFromAnyTable("tbl_physical_place_category", null, null, $columndivision, 10000, 0, "RESULTSET", array('physical_place_category_status' => 1), "added_date");

        $dataarray = array('physical_name' => $viewdivision);

        $this->template->draw('physicalplace_category/viewAllPhysicalType', false, $dataarray);
    }

    function viewPhysicalTypeByFilterKey($Data) {
        $this->load->model('physicalplace_type/physical_place_category_model');
        $viewDivision = $this->physical_place_category_model->viewPhysicalTypeByFilterKey($Data);
        $this->template->draw('physicalplace_category/physicalPlaceCategoryView', false, $viewDivision);
    }

    function getPhysicalCatName() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('physical_place_category_name', 'id_physical_place_category');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_physical_place_category", 'physical_place_category_name', $q, $column);
        echo json_encode($result);
    }
    function check_physical_place_category(){
        $this->load->model('physicalplace_type/physical_place_category_model');
        $column;
        $q = array("physical_place_category_name"=> $_REQUEST['physical_place_category_name']);
        $result = $this->physical_place_category_model->physical_place_category($q);
        foreach ($result as $value) {
            $column = array("physical_place_category_name" => $value->physical_place_category_name);
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

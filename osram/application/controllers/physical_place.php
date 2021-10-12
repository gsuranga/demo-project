<?php

/**
 * Description of physical_place
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class physical_place extends C_Controller {

    private $resours = array(
        'JS' => array('physical_place/js/physicalPlace'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexPhysicalPlace
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexPhysicalPlace() {
        $this->template->attach($this->resours);
        $this->template->draw('physical_place/indexPhysicalPlace', true);
    }

    /**
     * Function drawPhysicalPlaceRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPhysicalPlaceRegister() {
        $this->template->attach($this->resours);
        $this->template->draw('physical_place/physical_placeRegister', false);
    }

    /**
     * Function drawPhysicalPlaceView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawPhysicalPlaceView() {
        $this->load->model('physical_place/physical_place_model');
        $fetchAllPhysicalPlace = $this->physical_place_model->getAllPhysicalPlace();
        $this->template->draw('physical_place/physicalPlaceView', false, $fetchAllPhysicalPlace);
    }

    /**
     * Function insertPhysicalPlace
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertPhysicalPlace() {
        $this->form_validation->set_rules('physical_place_type', 'Type', 'required');
        $this->form_validation->set_rules('physical_place_name', 'Type', 'required');
        $this->form_validation->set_rules('physical_place_address', 'Type', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('physical_place/physical_place_model');
            $insertPhysicalPlaceCategory = $this->physical_place_model->insertPhysicalPalce1($this->input->post());
            if ($insertPhysicalPlaceCategory) {
                $this->session->set_flashdata('insert_physical_place', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Physical Place</spam>');
            } else {
                $this->session->set_flashdata('insert_physical_place', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px"> Error</spam>');
            }
            redirect('physical_place/indexPhysicalPlace');
        } else {
            $this->indexPhysicalPlace();
        }
    }

    /**
     * Function indexViewPhysicalPlace
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexViewPhysicalPlace() {
        $this->template->attach($this->resours);
        $this->template->draw('physical_place/indexViewphysicalPlace', true);
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
        $this->load->model('physical_place/physical_place_model');
        $fetchAllPhysicalPlace = $this->physical_place_model->getAllPhysicalPlaceFromID($id);
        $this->template->draw('physical_place/PhysicalPlaceManage', false, $fetchAllPhysicalPlace);
    }

    /**
     * Function drawIndexPhysicalPlaceManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexPhysicalPlaceManage() {
        $this->template->attach($this->resours);
        $this->template->draw('physical_place/indexManagePhysicalPlace', true);
    }

    /**
     * Function updatePhysicalPlace
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
   function updatePhysicalPlace() {

        $this->load->model('physical_place/physical_place_model');
        $id = $this->input->post('physical_place_id');
        $updatePhysicalPlace = $this->physical_place_model->updatePhysicalPalce1($this->input->post());
        if ($updatePhysicalPlace) {
            $this->session->set_flashdata('update_physical_place', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Physical Place</spam>');
        } else {
            $this->session->set_flashdata('update_physical_place', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Physical Place Error</spam>');
        }

        redirect("physical_place/drawIndexPhysicalPlaceManage?physical_place_idd=$id");
    }

    /**
     * Function deletePhysicalPlace
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deletePhysicalPlace() {
        $this->load->model('physical_place/physical_place_model');
        $id = $this->input->get('physical_place_idd');
        $deletePhysicalPlace = $this->physical_place_model->deletePhysicalPalce1($id);
         if ($deletePhysicalPlace) {
            $this->session->set_flashdata('deletePhysicalPlace', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Physical Place</spam>');
        } else {
            $this->session->set_flashdata('deletePhysicalPlace', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Physical Place Error</spam>');
        }
        redirect("physical_place/indexPhysicalPlace");
    }

    /**
     * Function allPhysicalPlaceCategorytoCombo2
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function allPhysicalPlaceCategorytoCombo2() {
        $this->load->model('physical_place/physical_place_model');
        $fetchAllPhysicalPlaceCategory = $this->physical_place_model->fetchFromAnyTable("tbl_physical_place_category", null, null, null, 10000, 0, "RESULTSET", array('physical_place_category_status' => 1), null);
        $pushdata = array('physical_place' => $fetchAllPhysicalPlaceCategory);
        $this->template->draw('physical_place/allPhysicalPlaceCategory', false, $pushdata);
    }

    function viewPhysicalPlaceDetailsItem() {

        $this->load->model('physical_place/physical_place_model');
        $this->load->model('physicalplace_type/physical_place_category_model');
        $columndivision = array('id_physical_place_category', 'physical_place_category_name');
        $viewdivision = $this->physical_place_category_model->fetchFromAnyTable("tbl_physical_place_category", null, null, $columndivision, 10000, 0, "RESULTSET", array('physical_place_category_status' => 1), "added_date");
        $dataarray = array('Physical_place_cat_name' => $viewdivision);
        $this->template->draw('physical_place/phyicalplaceViewManage', false, $dataarray);
    }

    function getPhysicalPlaceTypeName() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('physical_place_name', 'id_physical_place');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_physical_place", 'physical_place_name', $q, $column);
        echo json_encode($result);
    }

    function getPhysicalPlaceTypeAddress() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('physical_place_address', 'id_physical_place');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_physical_place", 'physical_place_address', $q, $column);
        echo json_encode($result);
    }

    function viewPhysicalByFilterKey($Data) {
        $this->load->model('physical_place/physical_place_model');
        $viewphysicalPlace = $this->physical_place_model->viewPhysicalByFilterKey($Data);
        $this->template->draw('physical_place/physicalPlaceView', false, $viewphysicalPlace);
    }

}

?>

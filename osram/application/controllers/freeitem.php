<?php

/**
 * Description of freeitem
 * 
 * @author Waruna Jayawardana
 * @contact -: warunajaya1990@gmail.com
 */
class freeitem extends C_Controller {

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexFreeItem
     *
     * 
     *
     * @param no
     * @return no
     */
    function indexFreeItem() {
        $this->template->draw('freeitem/indexFreeItem', true);
    }

    /**
     * Function indexViewFreeItem
     *
     * 
     *
     * @param no
     * @return no
     */
    function indexViewFreeItem() {
        $this->template->attach($this->resours);
        $this->template->draw('freeitem/indexViewFreeItem', true);
    }

    /**
     * Function drawDivisionTypeRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawFreeItemRegister() {
        $this->template->draw('freeitem/freeItemRegister', false);
    }

    /**
     * Function insertDivisionType
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertFreeItem() {
        $this->form_validation->set_rules('item_name1_1', 'Name', 'required');
         $this->form_validation->set_rules('qty1', 'Quantity', 'required');
          $this->form_validation->set_rules('item_name2_1', 'Name', 'required');
           $this->form_validation->set_rules('qty2_1', 'Quantity', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('freeitem/freeitem_model');
            $insertFreeItem = $this->freeitem_model->insertFreeitem1($this->input->post());
            if ($insertFreeItem) {
                $this->session->set_flashdata('insert_free_item', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Free Item</spam>');
            } else {
                $this->session->set_flashdata('insert_free_item', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Free Item Error</spam>');
            }
            redirect('freeitem/indexFreeItem');
        } else {
            $this->indexFreeItem();
        }
    }

    public function getItem() {
        $q = strtolower($_GET['term']);
        $this->load->model('itemdiscount/itemdiscount_model');
        $column = array('item_name', 'id_item');
        $result = $this->itemdiscount_model->getItem1($q, $column);
        echo json_encode($result);
    }

    /**
     * Function viewFreeItem
     *
     *
     *
     * @param no
     * @return no
     */
    function viewFreeItem() {
        $this->load->model('freeitem/freeitem_model');
        $viewFreeItem = $this->freeitem_model->viewFreeItem1();
        $this->template->draw('freeitem/freeItemView', false, $viewFreeItem);
    }

    /**
     * Function viewFreeItem
     *
     *
     *
     * @param no
     * @return no
     */
    function deleteFreeitem() {
        $this->load->model('freeitem/freeitem_model');
        $id_assort_free = $this->input->get('id_assort_free');
        $deleteFreeitem = $this->freeitem_model->deleteFreeItem1($id_assort_free);
         if ($deleteFreeitem) {
                $this->session->set_flashdata('delete_freeitem', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Free Item</spam>');
            } else {
                $this->session->set_flashdata('delete_freeitem', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Free Item Error</spam>');
            }
        redirect('freeitem/indexFreeItem');
    }

}

?>

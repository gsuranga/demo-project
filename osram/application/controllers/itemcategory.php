<?php

/**
 * Description of itemCategory
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class itemCategory extends C_Controller {

    function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('itemcategory/js/itemcategory'),
        'CSS' => array());

    /**
     * Function drawIndexItemCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawIndexItemCategory() {
        $this->template->attach($this->resours);
        $this->template->draw('itemcategory/indexItemCategory', true);
    }

    /**
     * Function drawInsertItemCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawInsertItemCategory() {

        $this->template->draw('itemcategory/addItemcategory', false);
    }

    /**
     * Function insertItemCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertItemCategory() {
        $this->form_validation->set_rules('item_name', 'Item Category', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('itemcategory/item_category_model');
            $insertItemCategory = $this->item_category_model->insertItemCategory($this->input->post());
            if ($insertItemCategory) {
                $this->session->set_flashdata('insert_insertItemCategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Item Category</spam>');
            } else {
                $this->session->set_flashdata('insert_insertItemCategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add ItemCategory Fail</spam>');
            }

            redirect('itemcategory/drawIndexItemCategory');
        } else {
            $this->drawIndexItemCategory();
        }
    }

    /**
     * Function drawViewItemCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawViewItemCategory() {
        $this->load->model('itemcategory/item_category_model');
//        $column = array('tbl_item_category_name', 'id_item_category','');
//        $viewItemCategory = $this->item_category_model->fetchFromAnyTable("tbl_item_category", null, null, $column, 10000, 0, "RESULTSET", array('tbl_item_category_status' => 1), "added_date");
        $viewItemCategory=  $this->item_category_model->getAllCategory();
        $this->template->draw('itemcategory/viewItemCategory', false, $viewItemCategory);
    }

    /**
     * Function drawUpdateItemCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawUpdateItemCategory() {

        $this->template->draw('itemcategory/manageItemCategory', false);
    }

    /**
     * Function updateItemCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateItemCategory() {

        $this->load->model('itemcategory/item_category_model');
        $update = $this->item_category_model->updateItemcategory($this->input->post());
        if ($update) {
                $this->session->set_flashdata('insert_itemcategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated an Item Category</spam>');
            } else {
                $this->session->set_flashdata('insert_itemcategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Item Category Error</spam>');
            }
        redirect("itemcategory/drawIndexItemCategory");
    }

    /**
     * Function deleteItemcategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteItemcategory() {
        $this->load->model('itemcategory/item_category_model');
        $id = $this->input->get('id');
        $insertUserType = $this->item_category_model->deleteItemcategory($id);
        if ($insertUserType) {
                $this->session->set_flashdata('delete_itemcategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted a Item Category</spam>');
            } else {
                $this->session->set_flashdata('delete_itemcategory', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Item Category Error</spam>');
            }
        redirect("itemcategory/drawIndexItemCategory");
    }

    public function getBrandName(){
        $this->load->model('itemcategory/item_category_model');
        $BrandName = $this->item_category_model->getBrandName();
        $this->template->draw('itemcategory/brandNamelist', false, $BrandName);
    }
    public function getMangeBrandName(){
        $this->load->model('itemcategory/item_category_model');
        $BrandName = $this->item_category_model->getBrandName();
        $this->template->draw('itemcategory/brandNamelist', false, $BrandName);
    }
}

?>

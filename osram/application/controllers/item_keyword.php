<?php

/**
 * Description of outlet_category
 *
 * @author Ishaka
 * @contact -: isherandi9@gmail.com
 * 
 */
class item_keyword extends C_Controller {

    private $resours = array(
        'JS' => array('ItemKeyword/js/Itemkeyword'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function indexItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function indexItemKeyword() {
        //   $this->template->attach($this->resours);
        $this->template->draw('ItemKeyword/indexItemKeyword', true);
    }

    /**
     * Function insertItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function insertItemKeyword() {
        $this->form_validation->set_rules('item_keyword', 'Item Keyword', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('ItemKeyword/item_keyword_model');
            //$employeeType = array($this->input->post('outlet_category_name'));
            $insertUserType = $this->item_keyword_model->insertItemKeyword($this->input->post('item_keyword'));
            if ($insertUserType) {
                $this->session->set_flashdata('insert_item_keyword', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Add Item Keyword</spam>');
            } else {
                $this->session->set_flashdata('insert_item_keyword', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Item keyword Error</spam>');
            }
            redirect('item_keyword/indexItemKeyword');
        } else {
            $this->indexItemKeyword();
        }
    }

    /**
     * Function drawItemKeywordRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawItemKeywordRegister() {
        $this->template->draw('ItemKeyword/itemKeywordRegister', false);
    }

    /**
     * Function drawItemKeywordView
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawItemKeywordView() {
        $this->load->model('ItemKeyword/item_keyword_model');
        $column = array('id_item_keyword', 'item_keyword');
        $viewItemKeyword = $this->item_keyword_model->fetchFromAnyTable("tbl_item_keyword", null, null, $column, 10000, 0, "RESULTSET", array('item_keyword_status' => 1));

        $this->template->draw('ItemKeyword/ItemKeywordView', false, $viewItemKeyword);
    }

    /**
     * Function deleteItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function deleteItemKeyword() {
        $this->load->model('ItemKeyword/item_keyword_model');
        $id = $this->input->get('id_item_keyword');
        $insertUserType = $this->item_keyword_model->deleteItemKeyword($id);
        // print_r($insertUserType);
        redirect('item_keyword/indexItemKeyword');
    }

    /**
     * Function drawIndexItemKeywordManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexItemKeywordManage() {
        $this->template->attach($this->resours);
        $this->template->draw('ItemKeyword/indexManageItemKeyword', true);
    }

    /**
     * Function viewItemKeywordDetailsFromId
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function viewItemKeywordDetailsFromId($id) {
        $this->load->model('ItemKeyword/item_keyword_model');

        $fetchAllItemKeyword = $this->item_keyword_model->fetchFromAnyTable("tbl_item_keyword", null, null, null, 10000, 0, "RESULTSET", array('item_keyword_status' => 1, 'id_item_keyword' => $id), null);
        $this->template->draw('ItemKeyword/ItemKeywordManage', false, $fetchAllItemKeyword);
    }

    /**
     * Function drawItemKeywordViewManage
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawItemKeywordViewManage() {
        $this->template->draw('ItemKeyword/ItemKeywordManage', false);
    }

    /**
     * Function updateItemKeyword
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function updateItemKeyword() {

        $this->load->model('ItemKeyword/item_keyword_model');
        $id = $this->input->post('id_item_keyword');
        $insertUserType = $this->item_keyword_model->updateItemKeyword($this->input->post());
        //print_r($insertUserType);
        if ($insertUserType) {
            $this->session->set_flashdata('update_ItemKeyword', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Item Keyword</spam>');
        } else {
            $this->session->set_flashdata('update_ItemKeyword', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Item Keyword Error</spam>');
        }

        redirect("item_keyword/drawIndexItemKeywordManage?id_item_keyword=$id");
    }

}

?>

<?php

/**
 * Description of item
 * 
 * @author Kanishka Panditha
 * @contact -: kanishka.sanjaya2@gmail.com
 */
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class item extends C_Controller {

    private $resours = array(
        'JS' => array('item/js/item'),
        'CSS' => array());

    public function __constructor() {
        parent::__construct();
    }

    /**
     * Function drawIndexItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawIndexItem() {
        $this->template->attach($this->resours);
        $this->template->draw('item/indexItem', true);
    }

    /**
     * Function drawIndexManageItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawIndexManageItem() {
        $this->template->attach($this->resours);
        $this->template->draw('item/indexManageItem', true);
    }

    /**
     * Function drawManageItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawManageItem() {
        $this->template->draw('item/itemManage', false);
    }

    /**
     * Function drawItemRegister
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawItemRegister() {
        $this->template->draw('item/itemRegister', false);
    }

    /**
     * Function drawDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawDivision() {
        $this->load->model('division/division_model');
        $allDivision = $this->division_model->getAllDivision();
        $this->template->draw('item/divisionlist', false, $allDivision);
    }

    /**
     * Function insertItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertItem() {
        $this->form_validation->set_rules('reg_item_no', 'Item No', 'required');
        $this->form_validation->set_rules('reg_item_account_code', 'Item Account Code', 'required');
        $this->form_validation->set_rules('reg_item_name', 'Item Name', 'required');
        $this->form_validation->set_rules('reg_item_alias', 'Item Alias', 'required');
        if (TRUE) {
            $this->load->model('item/item_model');
           // $this->load->model('itemkeyword/item_keyword_model');
            $item_details = array();
            $post = $this->input->post();

            foreach ($post as $key => $value) {
                if (strpos($key, 'item_alias')) {
                    $substr = substr($key, 15);
                    array_push($item_details, $substr);
                } else {
                    
                }
            }

            if ($post != '') {
                $added_row_count = 0;
                $sizeof = sizeof($post);
                $result_count = $sizeof / 4;
                $result_count++;
                foreach ($item_details as $value) {
                    $data_array = array("reg_item_no" => $post['reg_item_no_' . $value],
                        "reg_item_account_code" => $post['reg_item_account_code_' . $value],
                        "reg_item_name" => $post['reg_item_name_' . $value],
                        "reg_item_alias" => $post['reg_item_alias_' . $value], //reg_category_hid_
                        "id_item_category" => $post['reg_category_hid_' . $value],
                        "reg_brand_id" => $post['reg_brand_hid_' . $value]
                    );
                    
                    $insertItem = $this->item_model->insertItem($data_array);

                    $item_lastRow = $this->item_model->getLastRow();

                    $map_array = array(
                        'id_division' => $post['reg_division_hid_' . $value],
                        'id_item_category' => $post['reg_category_hid_' . $value],
                        'id_item' => $item_lastRow,
                        'added_date' => date('Y:m:d'),
                        'added_time' => date('H:i:s')
                    );

                    $this->item_model->insertItemMap($map_array);

                    if ($insertItem) {
                        $added_row_count++;
                    }
                }

                if ($added_row_count > 0) {
                    $this->session->set_flashdata('insert_item','<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Item</spam>');
                } else {
                    $this->session->set_flashdata('insert_item', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Item Error</spam>');
                }
            } else {
                echo "no result..";
            }
            redirect('item/drawIndexItem');
        } else {
            $this->drawIndexItem();
        }
    }

    /**
     * Function getCategoryNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getCategoryNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array("tbl_item_category.id_item_category", "tbl_item_category.tbl_item_category_name");
        $join_table = array("tbl_from" => "tbl_item", "join_table" => "tbl_item_category",
            "condition" => "tbl_item.id_item_category = tbl_item_category.id_item_category");
        $where = array("tbl_item_category", "tbl_item_category_name");
        $status = array("0" => "tbl_item.item_status", "1" => "1");
        $result = $this->autocomplete_model->autoCompleteJoinTable($column, $join_table, $where, $q, $status);
        echo json_encode($result);
    }

    /**
     * Function getItemNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getItemNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array('item_name', 'id_item');
        $get = '';
        $where = '';
        if (isset($_GET['id_token'])) {
            $get = $this->input->get('id_token');
            $where = array("0" => "id_item_category", "1" => $get,1=>item_status);
        }
        if (isset($_GET['id_token'])) {

            $result = $this->autocomplete_model->autoCompleteSingleTable('tbl_item', 'item_name', $q, $column, $where);
        } else {

            $result = $this->autocomplete_model->autoCompleteSingleTable('tbl_item', 'item_name', $q, $column);
        }

        echo json_encode($result);
    }

    /**
     * Function drawItemFilterbyName
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawItemFilterbyName() {
        $this->load->model('item/item_model');
        $post_hiddn_item_id = $this->input->post('hiddn_item_id'); // item id
        $post_hiddn_category = $this->input->post('hiddn_token'); //category id
        $view = $this->item_model->viewAllItems();
        $this->template->draw('item/viewSingleItem', false, $view);
    }

    /**
     * Function getItemKeyWord
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getItemKeyWord() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array("item_keyword", "id_item_keyword");
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_item_keyword", 'item_keyword', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function getCategoryList
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getCategoryList($type) {
        $this->load->model('item/item_model');
        $categoryList = $this->item_model->getCategoryList($type);
        $this->template->draw('item/category', false, $categoryList);
    }

    /**
     * Function getCategory
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getCategory() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array("tbl_item_category_name", "id_item_category");
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_item_category", 'tbl_item_category_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function getDivision
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function getDivision() {
        $q = strtolower($_GET['term']);
        $this->load->model('autocomplete/autocomplete_model');
        $column = array("division_name", "id_division");
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_division", 'division_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function updateItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateItem() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "id_item" => $item_detail[0],
            "id_item_category" => $item_detail[1],
            "item_account_code" => $item_detail[2],
            "item_name" => $item_detail[3],
            "item_alias" => $item_detail[4],
            "item_no" => $item_detail[5]
        );

        $item_map = array(
            'id_item_map' => $item_detail[7],
            'id_division' => $item_detail[6],
            'id_item_category' => $item_detail[1],
            'id_item' => $item_detail[0]
        );

        $this->load->model('item/item_model');
        $this->item_model->updateItem($item_detail_decode);
        $this->item_model->updateItemMap($item_map);
        // echo $updateItem;
    }

    /**
     * Function deleteItem
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteItem() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "id_item" => $item_detail[0]
        );

        $item_map_decode = array(
            "id_item_map" => $item_detail[1]
        );

        $this->load->model('item/item_model');
        $this->item_model->deleteItem($item_detail_decode, $item_map_decode);
    }

public function get_item_no() {

        $this->load->model('item/item_model');
        $column;
        $q = array("item_no"=> $_REQUEST['item_no'],
            "item_name"=>$_REQUEST['item_name'],
            "item_account_code"=>$_REQUEST['item_account_code'],
            "item_alias"=>$_REQUEST['item_alias']
            );
        $result = $this->item_model->getItem_no($q);

        foreach ($result as $value) {

            $column = array("item_no" => $value->item_no,
                    "item_name"=>$value->item_name,
                    "item_account_code"=>$value->item_account_code,
                    "item_alias"=>$value->item_alias
                );
        }
        $no_result = array('label' => 'valid');
        if (count($result) > 0) {

            echo json_encode($column);
        } else {

            echo json_encode($no_result);
        }
    }

	    function drawBrand(){
        $this->load->model('item/item_model');
        $allBrand = $this->item_model->getAllBrand();
        $this->template->draw('item/brandlist', false, $allBrand);
    }
    function getbrand(){
        $q = strtolower($_GET['term']);
        $this->load->model('item/item_model');
        $column = array('brand_name', 'item_brand_id');
        $result = $this->item_model->getbrand_names($q, $column);
        echo json_encode($result);
    }
     public function getbrandList($type) {
        $this->load->model('item/item_model');
        $categoryList = $this->item_model->getCategoryList($type);
        $this->template->draw('item/category', false, $categoryList);
    }
	
}

?>

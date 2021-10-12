<?php

/**
 * Description of product
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class product extends C_Controller {

    private $resours = array(
        'JS' => array('product/js/product'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function drawIndexProduct
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    function drawIndexProduct() {

        $this->template->attach($this->resours);
        $this->template->draw('product/indexProduct', true);
    }

    /**
     * Function drawInsertProduct
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawInsertProduct() {
        $this->template->attach($this->resours);
        $this->template->draw('product/addProduct', false);
    }

    /**
     * Function insertProduct
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertProduct() {
        $this->form_validation->set_rules('itemno', 'Item Name', 'required');
        $this->form_validation->set_rules('itemnoh', 'Item No', 'required');
        $this->form_validation->set_rules('batchno', 'Batch', 'required');
        $this->form_validation->set_rules('batchnoh', 'Batch No', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');
        $this->form_validation->set_rules('cost', 'Cost', 'required');
        $this->form_validation->set_rules('expdate', 'Expire Date', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('product/product_model');
            $insertProduct = $this->product_model->insertProduct($this->input->post());
            if ($insertProduct) {
                $this->session->set_flashdata('insert_physical_place_category', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Product</spam>');
            } else {
                $this->session->set_flashdata('insert_physical_place_category', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Product Error</spam>');
            }
            redirect('product/drawIndexProduct');
        } else {
            $this->drawIndexProduct();
        }
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
        $q = strtolower($_GET['term']); //this is stable
        $this->load->model('autocomplete/autocomplete_model'); //this is stable
        $column = array('item_name', 'id_item');
        $result = $this->autocomplete_model->autoCompleteSingleTable("tbl_item", 'item_name', $q, $column);
        echo json_encode($result);
    }

    /**
     * Function getbatchNames
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
	public function getbatchNames() {
        $q = strtolower($_GET['term']); //this is stable
        $this->load->model('product/product_model');
        $column = array('batch_no', 'id_batch'); 
        $result = $this->product_model->get_batchno($q, $column);
        echo json_encode($result); 
    }

    /**
     * Function drawViewProduct
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawViewProduct() {
        $this->load->model('product/product_model');
        $viewProduct = $this->product_model->viewAllProduct();
        $this->template->draw('product/viewProduct', false, $viewProduct);
    }

    /**
     * Function deleteProduct
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteProduct() {
        $this->load->model('product/product_model');
        $id = $this->input->get('productid');
        $deleteProducttype = $this->product_model->deleteProduct($id);
         if ($deleteProducttype) {
                $this->session->set_flashdata('delete_product', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Product</spam>');
            } else {
                $this->session->set_flashdata('delete_product', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Product Error</spam>');
            }
        redirect("product/drawIndexProduct");
    }

    /**
     * Function drawUpdateproduct
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawUpdateproduct($id) {
        $this->template->attach($this->resours);
        $this->template->draw('product/manageProduct', false);
    }

    /**
     * Function updateProduct
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updateProduct() {
        $this->load->model('product/product_model');
        $update = $this->product_model->updateProduct($this->input->post());
         if ($update) {
                $this->session->set_flashdata('update_product', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Product</spam>');
            } else {
                $this->session->set_flashdata('update_product', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Product Error</spam>');
            }
        redirect("product/drawIndexProduct");
    }

 /*
 *function get_item_name
 *add product validation
 **/ 
    public function get_item_name(){
        
        $this->load->model('product/product_model');
        $column;
        $q = array("iditem" => $_REQUEST['iditem']
        );
        $result = $this->product_model->get_iditem($q);

        foreach ($result as $value) {

            $column = array("iditem" => $value->iditem
            );
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

<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of speciol_pramotion
 *
 * @author Shamil
 */
class speciol_pramotion extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('speciol_pramotion/js/speciol_pramotion'),
        'CSS' => array());

    public function drawIndex_speciolPro() {

        $this->template->draw('speciol_pramotion/speciol_pro_add');
    }

    public function drawIndex_speciolProView() {
        $this->template->attach($this->resours);
        $this->template->draw('speciol_pramotion/index_specl_pro', TRUE);
    }

    public function drawIndex_View_speciolPro() {
        $this->load->model('speciol_pramotion/speciol_pramotion_model');
        $fetchAllspclPramotion = $this->speciol_pramotion_model->getAllSpeciolPramotion($_REQUEST);
        $this->template->draw('speciol_pramotion/viewSpecial_Pro', FALSE, $fetchAllspclPramotion);
    }

    public function drawIndex_speciolPro_View() {
        $this->template->attach($this->resours);
        $this->template->draw('speciol_pramotion/indexviewSpecialPro', TRUE);
    }

    public function drawIndex_View_speciolProMain() {
        $this->load->model('speciol_pramotion/speciol_pramotion_model');
        $fetchAllspclPramotion = $this->speciol_pramotion_model->getAllSpeciolPramotionMain();
        $this->template->draw('speciol_pramotion/viewSpecial_ProMain', FALSE, $fetchAllspclPramotion);
    }

    //template call ds
    public function drawIndex_speciolPro_ViewMain() {
        $id_SP_StockToken = $this->input->get('id_SP_');
        $this->template->attach($this->resours);
        $this->template->draw('speciol_pramotion/index_speciolPro_main', TRUE, $id_SP_StockToken);
    }

    public function deleteItem() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "item_id" => $item_detail[0],
            "special_promotion_id" => $item_detail[1]
        );


        $this->load->model('speciol_pramotion/speciol_pramotion_model');
        $this->speciol_pramotion_model->deleteItem($item_detail_decode);
    }

    public function deleteItem1() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "special_promotion_id" => $item_detail[0]
        );


        $this->load->model('speciol_pramotion/speciol_pramotion_model');
        $this->speciol_pramotion_model->deleteItem1($item_detail_decode);
    }

    public function getProduct() {
        $q = strtolower($_GET['term']);
        $this->load->model('speciol_pramotion/speciol_pramotion_model');
        $column = array('item_part_no', 'item_id', 'description', 'selling_price');
        $result = $this->speciol_pramotion_model->get_product($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function getDes() {
        $q = strtolower($_GET['term']);
        $this->load->model('speciol_pramotion/speciol_pramotion_model');
        $column = array('description', 'item_id', 'item_part_no', 'selling_price');
        $result = $this->speciol_pramotion_model->getDes($q, $column);
        $result_data = array('label' => 'no result...');
        if (count($result) > 0) {
            echo json_encode($result);
        } else {
            echo json_encode($result_data);
        }
    }

    public function addSpeciolPramotion() {


        if ($this->input->post("rowCount") != '' && $this->input->post("description") != '') {
            $this->load->model('speciol_pramotion/speciol_pramotion_model');
            $insertSpecialPramotion = $this->speciol_pramotion_model->insertSpeciolPramotion($this->input->post());
            $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Added</spam>');
            redirect('speciol_pramotion/drawIndex_speciolProView');
        } else {
            $this->session->set_flashdata('insert_item1', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px"> Error</spam>');
            redirect('speciol_pramotion/drawIndex_speciolProView');
        }
    }

    public function addUpdateSpeciolPramotion() {

        for ($i = 0; $i <= $_REQUEST['updateRowCount']; $i++) {
            if (isset($_REQUEST['HDUpdate' . $i])) {
                $spid = $_REQUEST['Specl_ProID_HD' . $i];
                $det = array(
                    "SpeciolProID" => $_REQUEST['Specl_ProID_HD' . $i],
                    "DetailID" => $_REQUEST['HDDetail' . $i],
                    "itemID" => $_REQUEST['Item_ID_HD' . $i],
                    "discount" => $_REQUEST['Discount_' . $i],
                    "discountType" => $_REQUEST['combo_id_' . $i]
                );
                
                $this->load->model('speciol_pramotion/speciol_pramotion_model');
                $UpdateSpecialPramotion = $this->speciol_pramotion_model->updateItem1($this->input->post(), $det);
            } else {
                if (isset($_REQUEST['Part_no' . $i])) {
                    $Insetdet = array(
                        "SpeciolProID" => $_REQUEST['Specl_ProID_HD'. $i],
                        "itemID" => $_REQUEST['Item_ID_HD'. $i],
                        //"DetailID" => $_REQUEST['HDDetail' . $i],
                        
                        "discount" => $_REQUEST['Discount_'. $i],
                        "discountType" => $_REQUEST['combo_id_'. $i]
                    );
                    


                    $insertSpecialPramotion = $this->speciol_pramotion_model->insertSpeciolPramotionUpdate($this->input->post(),$Insetdet);
                }
            }
        }
        redirect('speciol_pramotion/drawIndex_speciolPro_View?id_SP_='.$spid);
    }

    public function updateItem() {
        $item_detail = json_decode($_POST['data']);
        $item_detail_decode = array(
            "discount" => $item_detail[0],
            "discount_type" => $item_detail[1],
            "special_promotion_id" => $item_detail[2],
            "item_id" => $item_detail[3],
            "status" => $item_detail[4],
        );



        $this->load->model('speciol_pramotion/speciol_pramotion_model');
        $this->speciol_pramotion_model->updateItem($item_detail_decode);
    }

}
?>


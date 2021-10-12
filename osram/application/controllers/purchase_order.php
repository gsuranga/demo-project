<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of purchase_order
 *
 * @author kanishka
 */
class purchase_order extends C_Controller {

    private $resours = array(
        'JS' => array('purchaseorder/js/purchaseorder'),
        'CSS' => array());

    public function __construct() {
        parent::__construct();
    }

    public function drawIndexPurchase() {
        $this->template->attach($this->resours);
        $this->template->draw('purchaseorder/indexPurchaseOrder', true);
    }

    public function drawIndexManagePurchase() {
        $this->template->attach($this->resours);
        $this->template->draw('purchaseorder/indexManagePurchaseOrder', true);
    }

    public function drawManagePurchase() {
        $this->template->attach($this->resours);
        $this->template->draw('purchaseorder/searchPurchaseOrder', false);
    }

    public function drawPurchaseOrder() {
        $this->template->attach($this->resours);
        $this->template->draw('purchaseorder/registerPurchaseorder', false);
    }

    public function getEmployeeNames() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('employee_first_name', 'id_employee_has_place');
        $result = $this->purchase_model->getEmployeNames($q, $column);
        echo json_encode($result);
    }

    public function getProducts() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('item_name', 'id_products', 'product_price','item_account_code','product_cost');
        $result = $this->purchase_model->getProducts($q, $column);
        echo json_encode($result);
    }

    public function insertPurchaseOrder() {
        
        $this->form_validation->set_rules('employee_no', 'Employee No', 'required');
        $this->form_validation->set_rules('order_no', 'Order No', 'required');
        

       
        if ($this->input->post('submit_view_form')) {

            $this->load->model('purchaseorder/purchase_model');
            $post = $this->input->post();

            $post_hidden_count = '';
            if (isset($_POST['hidden_token_row'])) {

                $post_hidden_count = $this->input->post('hidden_token_row');
            } else {

                $post_hidden_count = $this->input->post('hidden_update_row');
            }
            $post_hidden_count++;

            $purchase_order = '';

            if (isset($_POST['purchase_hidden_id'])) {
                $purchase_order = $this->input->post('purchase_hidden_id');
            } else {

                $this->purchase_model->insertPurchaseOrder($this->input->post());
                $purchase_order = $this->purchase_model->getLastRow();
            }

            if (isset($_POST['hidden_curre_view_rows'])) {
                $row = $this->input->post('hidden_curre_view_rows');


//                $row++;
            } else {
                $row = 1;
            }

//            echo $row;

            if (isset($_POST['hidden_token_row'])) {
                for ($row; $row < $post_hidden_count; $row++) {
                    if (isset($post['hidn_token_' . $row], $post['item_price_' . $row], $post['item_qty_' . $row])) {

                        $hidn_token = $post['hidn_token_' . $row];
                        $item_qty = $post['item_qty_' . $row];

                        $dataarray = array(
                            'id_purchase_order' => $purchase_order,
                            'id_products' => $hidn_token,
                            'item_qty' => $item_qty,
                            'added_date' => date('Y:m:d'),
                            'added_time' => date('H:i:s')
                        );



                       
                        $insertPurchaseOrderHasproducts = $this->purchase_model->insertPurchaseOrderHasproducts($dataarray);
                    if ($insertPurchaseOrderHasproducts) {
                    $this->session->set_flashdata('update_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Purchase Order</spam>');
                } else {
                    $this->session->set_flashdata('update_purchase', '<span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Purchase Order Fail</spam>');
                }
                        
                    }
                }
            }
            if ($this->input->post('submit_view_form')) {
                redirect('purchase_order/drawDetailstPurchase?primary_token_value=' . $this->input->post('hidden_order_id'));
            } else {
                redirect('purchase_order/drawIndexPurchase');
            }
        }
            
          
        
        if ($this->form_validation->run()) {
            $this->load->model('purchaseorder/purchase_model');
            $post = $this->input->post();

            $post_hidden_count = '';
            if (isset($_POST['hidden_token_row'])) {
                $post_hidden_count = $this->input->post('hidden_token_row');
            } else {
                $post_hidden_count = $this->input->post('hidden_update_row');
            }
            $post_hidden_count++;


            $purchase_order = '';

            if (isset($_POST['purchase_hidden_id'])) {
                $purchase_order = $this->input->post('purchase_hidden_id');
            } else {
                
                $this->purchase_model->insertPurchaseOrder($this->input->post());
                $purchase_order = $this->purchase_model->getLastRow();
            }

            if (isset($_POST['hidden_curre_view_rows'])) {
                $row = $this->input->post('hidden_curre_view_rows');
                $row++;
            } else {
                $row = 1;
            }

            if (isset($_POST['hidden_token_row'])) {
                for ($row; $row < $post_hidden_count; $row++) {
                    if (isset($post['hidn_token_' . $row], $post['item_price_' . $row], $post['item_qty_' . $row])) {

                        $hidn_token = $post['hidn_token_' . $row];
                        $item_qty = $post['item_qty_' . $row];

                        $dataarray = array(
                            'id_purchase_order' => $purchase_order,
                            'id_products' => $hidn_token,
                            'item_qty' => $item_qty,
                            'added_date' => date('Y:m:d'),
                            'added_time' => date('H:i:s')
                        );
                        
                        $insertPurchaseOrderHasproducts = $this->purchase_model->insertPurchaseOrderHasproducts($dataarray);
                    }
                }
            }

//            if (isset($_POST['hidden_curre_view_rows'])) {
//                if ($insertPurchaseOrderHasproducts) {
//                    $this->session->set_flashdata('update_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated Purchase Order</spam>');
//                } else {
//                    $this->session->set_flashdata('update_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Purchase Order Fail</spam>');
//                }
//
//                redirect('purchase_order/drawIndexManagePurchase');
//            } else {
                if ($insertPurchaseOrderHasproducts) {
                    $this->session->set_flashdata('insert_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Added Purchase Order</spam>');
                } else {
                    $this->session->set_flashdata('insert_purchase', '<span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Purchase Fail</spam>');
                }

                redirect('purchase_order/drawIndexPurchase');
           // }
            
            
            
        } else {
            $this->drawIndexPurchase();
        }
    }


//    public function insertPurchaseOrder() {
//
//
//
//        $this->form_validation->set_rules('employee_no', 'Employee No', 'required');
//        $this->form_validation->set_rules('order_no', 'Order No', 'required');
//        $this->form_validation->set_rules('order_date', 'Order Date', 'required');
//        $this->form_validation->set_rules('order_time', 'Order Time', 'required');
//
//        if ($this->input->post('submit_view_form')) {
//            //            echo "das";
////                        echo "<pre>";
////                        print_r($this->input->post());
////                        echo "</pre>";
//            $this->load->model('purchaseorder/purchase_model');
//            $post = $this->input->post();
//
//            $post_hidden_count = '';
//            if (isset($_POST['hidden_token_row'])) {
//
//                $post_hidden_count = $this->input->post('hidden_token_row');
//            } else {
//
//                $post_hidden_count = $this->input->post('hidden_update_row');
//            }
//            $post_hidden_count++;
////            echo $post_hidden_count;
//
//
//
//
//
//            $purchase_order = '';
//
//            if (isset($_POST['purchase_hidden_id'])) {
//                $purchase_order = $this->input->post('purchase_hidden_id');
//            } else {
//
//                $this->purchase_model->insertPurchaseOrder($this->input->post());
//                $purchase_order = $this->purchase_model->getLastRow();
//            }
//
//            if (isset($_POST['hidden_curre_view_rows'])) {
//                $row = $this->input->post('hidden_curre_view_rows');
//
//
////                $row++;
//            } else {
//                $row = 1;
//            }
//
////            echo $row;
//
//            if (isset($_POST['hidden_token_row'])) {
//                for ($row; $row < $post_hidden_count; $row++) {
//                    if (isset($post['hidn_token_' . $row], $post['item_price_' . $row], $post['item_qty_' . $row])) {
//
//                        $hidn_token = $post['hidn_token_' . $row];
//                        $item_qty = $post['item_qty_' . $row];
//
//                        $dataarray = array(
//                            'id_purchase_order' => $purchase_order,
//                            'id_products' => $hidn_token,
//                            'item_qty' => $item_qty,
//                            'added_date' => date('Y:m:d'),
//                            'added_time' => date('H:i:s')
//                        );
//
//
//
//                        $insertPurchaseOrderHasproducts = $this->purchase_model->insertPurchaseOrderHasproducts($dataarray);
//                    }
//                }
//            }
//
//            /* if (isset($_POST['hidden_curre_view_rows'])) {
//              if ($insertPurchaseOrderHasproducts) {
//              $this->session->set_flashdata('update_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Update Purchase</spam>');
//              } else {
//              $this->session->set_flashdata('update_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Purchase Fail</spam>');
//              }
//
//              redirect('purchase_order/drawIndexManagePurchase');
//              } else {
//              if ($insertPurchaseOrderHasproducts) {
//              $this->session->set_flashdata('insert_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Succussfully Add Purchase</spam>');
//              } else {
//              $this->session->set_flashdata('insert_purchase', '<span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Add Purchase Fail</spam>');
//              }
//
//              redirect('purchase_order/drawIndexPurchase');
//              } */
//            if ($this->input->post('submit_view_form')) {
//                redirect('purchase_order/drawDetailstPurchase?primary_token_value=' . $this->input->post('hidden_order_id'));
//            } else {
//                redirect('purchase_order/drawIndexPurchase');
//            }
//        } else {
//            //$this->drawIndexPurchase();
//        }
//    }

    public function getPurchaseOrderNo() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('purchase_order_number', 'id_purchase_order');
        $result = $this->purchase_model->getPurchaseOrderNoData($q, $column);
        echo json_encode($result);
    }

    public function getPurchaseOrderNo_employes() {
        $q = strtolower($_GET['term']);
        $this->load->model('purchaseorder/purchase_model');
        $column = array('employee_first_name', 'id_employee_has_place');
        $result = $this->purchase_model->getPurchaseOrderNo_employes($q, $column);
        echo json_encode($result);
    }

    public function drawPendingPurchase() {
        $this->template->attach($this->resours);
        $employe_id = '';
        if ($this->session->userdata('user_type') == "Admin") {
            
        } else {
            $employe_id = $this->session->userdata('id_employee_has_place');
        }


        $this->load->model('purchaseorder/purchase_model');
        $viewAllPurchaseOrder = $this->purchase_model->viewAllPurchaseOrder($employe_id);
        $this->template->draw('purchaseorder/viewPendingOrder', false, $viewAllPurchaseOrder);
    }

    public function drawAcceptPurchase() {
        $this->template->attach($this->resours);
        $employe_id = '';
        if ($this->session->userdata('user_type') == "Admin") {
            
        } else {
            $employe_id = $this->session->userdata('id_employee_has_place');
        }
        $this->load->model('purchaseorder/purchase_model');
        $viewAllPurchaseOrder = $this->purchase_model->viewAllPurchaseOrder($employe_id);
        $this->template->draw('purchaseorder/viewAcceptOrders', false, $viewAllPurchaseOrder);
    }

    public function drawpurchaseDetails() {
        $this->load->model('purchaseorder/purchase_model');
        if (isset($_GET['primary_token_value'])) {
            $primary_token_value = $_GET['primary_token_value'];
            $viewPurchaseOrderDetails = $this->purchase_model->viewPurchaseOrderDetails($primary_token_value);
            $this->template->draw('purchaseorder/viewPurchaseOrder', false, $viewPurchaseOrderDetails);
        }
    }

    public function drawpurchaseDetailsViewOnly() {
        $this->load->model('purchaseorder/purchase_model');
        if (isset($_GET['cl_distributorHayleystoken'])) {
            $primary_token_value = $_GET['cl_distributorHayleystoken'];
            $viewPurchaseOrderDetails = $this->purchase_model->viewPurchaseOrderDetails($primary_token_value);
            $this->template->draw('purchaseorder/viewPurchaseDetail', false, $viewPurchaseOrderDetails);
        }
    }

    public function drawDetailstPurchase() {
        $this->template->attach($this->resours);
        $this->template->draw('purchaseorder/indexPurchaseDetails', true);
    }

    public function deletePurchaseItem() {
        $item_detail = json_decode($_POST['data']);
        $this->load->model('purchaseorder/purchase_model');
        $delete_purchese = $this->purchase_model->deletePurchaseItem($item_detail[0]);
        if ($delete_purchese) {
            $this->session->set_flashdata('delete_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Purchase Oder</spam>');
        } else {
            $this->session->set_flashdata('delete_purchase', '<span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Purchase Fail</spam>');
        }
    }

    public function deletePurchase() {
        $item_detail = json_decode($_POST['data']);
        $this->load->model('purchaseorder/purchase_model');
        $delete_purchese = $this->purchase_model->deletePurchase($item_detail[0]);
        if ($delete_purchese) {
            $this->session->set_flashdata('delete_purchase', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Purchase Oder</spam>');
        } else {
            $this->session->set_flashdata('delete_purchase', '<span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Purchase Fail</spam>');
        }
    }

    public function createDiliveryNote() {
        $diliverynote = json_decode($_POST['data']);
        $this->load->model('diliverynote/diliverynote_model');
        $insertDeliveynote=$this->diliverynote_model->inserDiliveryNote($diliverynote);
        if ($insertDeliveynote) {
            $this->session->set_flashdata('insertDeliveynote', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Created a Delivery Note</spam>');
        } else {
            $this->session->set_flashdata('insertDeliveynote', '<span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Create Delivery Note Failed</spam>');
        }
    }

    /*
     * sameera added
     */

    public function reportsPDFPrint() {
        $topic = $this->input->get('topic');
        $html = "<h1 align='center'>$topic</h1></br>";
        $this->template->attach($this->resours);
        ob_start();
        $data_table = $_POST['key'];
        $mpdf = new mPDF('c', 'A4');
        $mpdf->SetDisplayMode('fullpage');
        $mpdf->SetHeader('{DATE Y-m-d}|| Osram ');
        $mpdf->SetFooter('{PAGENO}');
        $mpdf->WriteHTML($html . $data_table);
        $userName = $this->session->userdata('id_user');
        $pdfName = $this->input->get('pdfName');

        $mpdf->Output("PDF_Reports/report_" . $userName . $pdfName . ".pdf");
        exit;
        ob_flush();
    }

    public function reportsToExcel() {

        ob_start();
        $excel = $_POST['key'];
        $e = json_decode($excel, TRUE);
        $this->load->library('export');
        $name = $this->input->get('excel');
        // $this->load->model('reports/report_model');
        $this->export->to_excel($e, 'nameForFile');
        exit;
        ob_flush();
    }

    /*
     * sammera end
     */

    public function get_avilableQty(){
        $this->load->model('purchaseorder/purchase_model');
       $result= $this->purchase_model->get_avilableQty();
       echo json_encode($result);
    }
}
?>

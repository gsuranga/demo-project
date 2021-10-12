<?php

/* * 0,1,2
 * Description of batch
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */

class bank extends C_Controller {

    private $resours = array(
        'JS' => array('bank/js/bank'),
        'CSS' => array());

    function __construct() {
        parent::__construct();
    }

    /**
     * Function drawIndexBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */

    /**
     * Function drawInsertBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawBankIndex() {
	$this->template->attach($this->resours);
        $this->template->draw('bank/bankIndex', true);
    }

    public function drawBankView() {
        $this->template->draw('bank/addBank', false);
    }

    public function drawViewBanks() {
        $this->load->model('bank/bank_model');
        $fetchAllBank = $this->bank_model->getAllBank();
        $this->template->draw('bank/viewBankDetails', false, $fetchAllBank);
    }

    public function insertBank() {
        print_r($this->input->post());
        $this->form_validation->set_rules('bankName', 'Bank Name', 'required');
        if ($this->form_validation->run()) {
            $this->load->model('bank/bank_model');
            $insertBankType = $this->bank_model->insertBank($this->input->post());
            if ($insertBankType) {
                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Registered a Bank</spam>');
            } else {
                $this->session->set_flashdata('insert_bank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Bank Registration Error</spam>');
            }
            //$this->indexDivision();
            redirect('bank/drawBankIndex');
        } else {
            $this->drawBankIndex();
        }
    }

    function deleteBank() {
        $this->load->model('bank/bank_model');
        $id = $this->input->get('bank_id');
        $delete_bank=$this->bank_model->deleteBank($id);
        if ($delete_bank) {
                $this->session->set_flashdata('deleteBank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted a Bank</spam>');
            } else {
                $this->session->set_flashdata('deleteBank', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Bank Error</spam>');
            }
        redirect("bank/drawBankIndex");
    }

    public function getBank() {
        $this->load->model('bank/bank_model');
        $id = $this->bank_model->getBank();
        print_r($id);
    }

    public function savedatabase() {
        // Load the DB utility class
        $this->load->dbutil();
        $result = $this->dbutil->optimize_database();

        print_r($result);
    }

    public function get_bank_name(){
        $this->load->model('bank/bank_model');
        $column;
        $q = array("bank_name"=> $_REQUEST['bank_name']);
        $result = $this->bank_model->get_bank_name($q);
        foreach ($result as $value) {
            $column = array("bank_name" => $value->bank_name);
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
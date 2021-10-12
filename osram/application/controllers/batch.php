<?php

/**
 * Description of batch
 * 
 * @author Buddika Waduge
 * @contact -: buddikauwu@gmail.com
 */
class batch extends C_Controller {

    private $resours = array(
        'JS' => array('batch/js/batch'),
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
    function drawIndexBatch() {
        $this->template->attach($this->resours);
        $this->template->draw('batch/indexBatch', true);
    }

    /**
     * Function drawInsertBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawInsertBatch() {
        $this->template->draw('batch/addBatch', false);
    }

    /**
     * Function insertBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function insertBatch() {
         $this->form_validation->set_rules('batchno', 'Batch No', 'required');
           $this->form_validation->set_rules('expdate', 'Expire Date', 'required');
        if ($this->form_validation->run()) {
        $this->load->model('batch/batch_model');
        $insertBatch = $this->batch_model->insertBatch($this->input->post());
        if ($insertBatch) {
            $this->session->set_flashdata('insert_insertBatch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully added Batch Number</span>');
        } else {
            $this->session->set_flashdata('insert_insertBatch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Adding Fail</span>');
        }
        redirect('batch/drawIndexBatch');
    }else{
        $this->drawIndexBatch();
    }
    }
    /**
     * Function drawViewBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawViewBatch() {
        $this->load->model('batch/batch_model');
        $column = array('batch_no', 'id_batch', 'expiry_date');
        $viewBatch = $this->batch_model->fetchFromAnyTable("tbl_batch", null, null, $column, 10000, 0, "RESULTSET", array('batch_status' => 1), "expiry_date");
        $this->template->draw('batch/viewBatch', false, $viewBatch);
    }

    /**
     * Function deleteBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function deleteBatch() {
        $this->load->model('batch/batch_model');
        $id = $this->input->get('id');
        $insertUserType = $this->batch_model->deleteBatch($id);
         if ($insertUserType) {
                $this->session->set_flashdata('delete_batch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Deleted Batch</spam>');
            } else {
                $this->session->set_flashdata('delete_batch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Delete Batch Error</spam>');
            }
        redirect("batch/drawIndexBatch");
    }

    /**
     * Function drawUpdateBatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function drawUpdateBatch($id) {
        $this->template->draw('batch/manageBatch', false);
    }

    /**
     * Function updatebatch
     *
     * view indexBatch form
     *
     * @param no
     * @return no
     */
    public function updatebatch() {
        $this->load->model('batch/batch_model');
        $update = $this->batch_model->updateBatch($this->input->post());
         if ($update) {
                $this->session->set_flashdata('update_batch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#00cc00;border:solid 1px #00cc00;padding:2px;border-radius: 5px 5px 5px 5px">Successfully Updated a Batch</spam>');
            } else {
                $this->session->set_flashdata('update_batch', '<br><span style="font-size: 13px;background-color: #FFFFFF;color:#ff0000;border:solid 1px #ff99cc;padding:2px;border-radius: 5px 5px 5px 5px">Update Batch Error</spam>');
            }
        redirect("batch/drawIndexBatch");
    }

    public function get_batch_no() {

        $this->load->model('batch/batch_model');
        $column;
        $q = array("batch_no"=> $_REQUEST['batch_no']
            );
        $result = $this->batch_model->get_batch_no($q);

        foreach ($result as $value) {

            $column = array("batch_no" => $value->batch_no
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


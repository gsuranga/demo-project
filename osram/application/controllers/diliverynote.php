<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of diliverynote
 *
 * @author kanishka
 */
class diliverynote extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('diliverynote/js/dilivernotes'),
        'CSS' => array());

    public function drawViewPendingNotes() {
         $id_physical_place = '';
        if($this->session->userdata('user_type') == "Admin"){
            
        }  else {
            $id_physical_place = $this->session->userdata('id_employee_has_place');
            
        }
        
        $this->load->model('diliverynote/diliverynote_model');
        $viewAllDeliveryNottes = $this->diliverynote_model->viewAllDeliveryNottes($id_physical_place);
        $this->template->draw('diliverynote/viewPendingNotes', false, $viewAllDeliveryNottes);
    }
    
    public function update_dil_qty(){
        $this->load->model('diliverynote/diliverynote_model');
        $this->diliverynote_model->update_dil_qty();
    }

    public function drawViewAcceptNotes() {
        $id_physical_place = '';
        if($this->session->userdata('user_type') == "Admin"){
            
        }  else {
            $id_physical_place = $this->session->userdata('id_employee_has_place');
            
        }
        $this->load->model('diliverynote/diliverynote_model');
        $viewAllDeliveryNottes = $this->diliverynote_model->viewAllDeliveryNottes($id_physical_place);
        $this->template->draw('diliverynote/viewAcceptNotes', false, $viewAllDeliveryNottes);
    }

    public function drawIndexDiliverDetails() {
        $this->template->attach($this->resours);
        $this->template->draw('diliverynote/indexDiliverDetails', true);
    }

    public function drawIndexDiliverNotes() {
        $this->template->attach($this->resours);
        $this->template->draw('diliverynote/indexDiliveryNote', true);
    }

    public function drawDiliverDetails() {
        $this->load->model('diliverynote/diliverynote_model');
        $id = $_GET['cl_distributorHayleysid_dilivery_noteToken'];
        $diliverDetails = $this->diliverynote_model->getDiliverDetails($id);
        $this->template->draw('diliverynote/viewDiliverDetails', false, $diliverDetails);
    }

    public function drawManageDiliverNotes() {
        $this->template->attach($this->resours);
        $this->template->draw('diliverynote/searchDiliveryNotes', false);
    }

    public function getPurcahseOrders() {
        $q = strtolower($_GET['term']);
        $this->load->model('diliverynote/diliverynote_model');
        $column = array('dilivery_note_number', 'id_dilivery_note');
        $result = $this->diliverynote_model->getPurcahseOrders($q, $column);
        echo json_encode($result);
    }

    public function getEmployesByDiliverNote() {
        $q = strtolower($_GET['term']);
        $this->load->model('diliverynote/diliverynote_model');
        $column = array('fullname', 'id_employee_has_place');
        $result = $this->diliverynote_model->getEmployesByDiliverNote($q, $column);
        echo json_encode($result);
    }

    public function deleteDiliver() {
        $dilver_detail = json_decode($_POST['data']);
        $this->load->model('diliverynote/diliverynote_model');
        $this->diliverynote_model->deleteDilverNote($dilver_detail[0]);
    }

    public function inserGoodRecived() {
        $dilver_detail = json_decode($_POST['data']);
        $this->load->model('good_received/good_received_model');
        $userdata = $this->session->userdata('id_employee_registration');
        $this->good_received_model->inserGoodRecived($dilver_detail[0]);
       
    }
    
    
    public function readDeliverNotes() {


        $id_deliver_note = $_GET['id_deliver_note'];

        $myFile = "deliver_erp/READ.txt";
        $fh = fopen($myFile, 'r') or exit("Unable to open file!");
        
        if (filesize($myFile) > 0) {
            $theData = fread($fh, filesize($myFile));
            print_r($theData);
            fclose($fh);
            $split = preg_split('/[\t\n,]/', $theData);
            //print_r($split);
            $array =array();

            $lines = count($split) / 12;
            echo $phone_number;
            for ($index = 0; $index < $lines; $index++) {
                $subArray[$index] = array();
                for ($index1 = $index * 12; $index1 < (($index + 1) * 12); $index1++) {
                    array_push($subArray[$index], $split[$index1]);
                }
                array_push($array, $subArray[$index]);
            }

            

            $newArray = array();
            foreach ($array as $a) {
                $date = $a[2];
                $substr_date = substr($date, 1);
                $new_date = "20" . $substr_date;
                $modified_new_date = substr($new_date, 0, 4) . '-' . substr($new_date, 4, 2) . '-' . substr($new_date, 6, 2);
                $a[2] = $modified_new_date;
                array_push($newArray, $a);
            }
            // print_r($newArray);

            $this->load->model('diliverynote/diliverynote_erp_model');
            $this->diliverynote_erp_model->readArrayToInsertDiliveryNote($newArray);
            $fsrc = fopen("deliver_erp/READ.txt", 'r');




            $fdest = fopen("deliver_erp/WRITE.txt", 'a+');

            $len = stream_copy_to_stream($fsrc, $fdest);
            $delete = fopen("deliver_erp/WRITE.txt", 'a+');

            // unlink('deliver_erp/received.txt');
//            $fp = fopen('deliver_erp/received.txt', "wb");
//            fwrite($fp, '');
//            fclose($fp);
            
            $f_date=date('Y-m-d');
            $f_time=date('H-i-s');
            
            fclose($fsrc);
            $rename=rename ("deliver_erp/READ.txt", "read_texts/".$f_date."-".$f_time.".txt");
            echo $rename;
          //  fwrite($delete, "");
        }
        redirect('diliverynote/drawIndexDiliverNotes');
    }


}

?>

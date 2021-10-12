<?php

/*
 * Create By Insaf Zakariya-(insaf.zak@gmail.com)
 */

class partmovement_profile extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function indexPartMovement() {        
        $this->template->draw('profile/partmovement/drawIndexPartMovementPage', TRUE);
    }

    public function drawSearchField() {
        $this->load->model('profile/partmovement_profile_model');
        $result['branch'] = $this->partmovement_profile_model->getBranchDetail();
        $this->template->draw('profile/partmovement/drawSearchFieldPartMovementPage', FALSE, $result);
    }

    public function drawPartMovementDetailPage() {
        ob_start();
        ini_set('max_execution_time', -1);
        $this->load->model('profile/partmovement_profile_model');
        $mainarray = array();
        $detail['parts'] = $this->partmovement_profile_model->get_parts();

        foreach ($detail['parts'] AS $partno) {
            $counter = $this->partmovement_profile_model->getCounterQty($partno->item_part_no);
            $dealercount = $this->partmovement_profile_model->getdealercount($partno->item_part_no);
            $workshopwcount = $this->partmovement_profile_model->getWorkShopWCount($partno->item_part_no);
            $workshopncount = $this->partmovement_profile_model->getWorkShopNCount($partno->item_part_no);
            $institutonalCount = $this->partmovement_profile_model->institutonalCount($partno->item_part_no);
            $dealerSalesInCounter = $this->partmovement_profile_model->dealerSaleINCounter($partno->item_part_no);
            //echo $partno->item_part_no.'+>/'.$workshopcount[0]->workshopcount;
            $subarray = array();
          // echo $dealercount[0]->dealersale+abs(($counter[0]->counter)-($dealercount[0]->dealersale))+$workshopncount[0]->workshopcount+$workshopwcount[0]->workshopcount+$institutonalCount[0]->insCount.'\n';

            array_push($subarray, $partno->item_part_no);
            array_push($subarray, $partno->description);
            array_push($subarray, $partno->qty);
            array_push($subarray, $partno->val);
            array_push($subarray, ($partno->val) - ($partno->costval));
            array_push($subarray, $partno->model);
            array_push($subarray, $dealercount[0]->dealersale);
            array_push($subarray, abs(($counter[0]->counter)-($dealerSalesInCounter[0]->dealersalescounter)));
            array_push($subarray, $workshopncount[0]->workshopcount);
            array_push($subarray, $workshopwcount[0]->workshopcount);
            array_push($subarray, $institutonalCount[0]->insCount);
            array_push($subarray, ($partno->qty)-($dealercount[0]->dealersale+abs(($counter[0]->counter)-($dealerSalesInCounter[0]->dealersalescounter))+$workshopncount[0]->workshopcount+$workshopwcount[0]->workshopcount+$institutonalCount[0]->insCount));
            array_push($mainarray, $subarray);
        }
        ob_flush();
        ob_clean();
        $this->template->draw('profile/partmovement/drawDetailPartMovementPage', FALSE, $mainarray);
    }

}

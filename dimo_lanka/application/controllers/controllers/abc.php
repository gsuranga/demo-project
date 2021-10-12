<?php

/*
 * Create By Insaf Zakariya (insaf.zak@gmail.com)
 */

Class abc extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    public function indexOverallReport() {
        $this->template->draw('abc/overall/indexOverallReport', TRUE);
    }

    public function drawOverallSearchField() {
        $this->template->draw('abc/overall/drawOverallSearchField', FALSE);
    }

    public function drawOverallDetailPage() {
        $this->load->model('profile/partmovement_profile_model');
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
            array_push($subarray, abs(($counter[0]->counter) - ($dealerSalesInCounter[0]->dealersalescounter)));
            array_push($subarray, $workshopncount[0]->workshopcount);
            array_push($subarray, $workshopwcount[0]->workshopcount);
            array_push($subarray, $institutonalCount[0]->insCount);
            array_push($subarray, ($partno->qty) - ($dealercount[0]->dealersale + abs(($counter[0]->counter) - ($dealerSalesInCounter[0]->dealersalescounter)) + $workshopncount[0]->workshopcount + $workshopwcount[0]->workshopcount + $institutonalCount[0]->insCount));
            //---------------------------Values-------------------------------------------------//
            array_push($subarray, $dealercount[0]->dealersaleValue);
            array_push($subarray, abs(($counter[0]->counter) - ($dealerSalesInCounter[0]->dealersalescounterValue)));
            array_push($subarray, $workshopncount[0]->workshopcountValue);
            array_push($subarray, $workshopwcount[0]->workshopcountValue);
            array_push($subarray, $institutonalCount[0]->insCountValue);
             array_push($subarray, ($partno->val) - ($dealercount[0]->dealersaleValue + abs(($counter[0]->counterValue) - ($dealerSalesInCounter[0]->dealersalescounterValue)) + $workshopncount[0]->workshopcountValue + $workshopwcount[0]->workshopcountValue + $institutonalCount[0]->insCountValue));
            array_push($mainarray, $subarray);
        }
        ob_flush();
        ob_clean();
        $this->template->draw('abc/overall/drawOverallDetailPage', FALSE,$mainarray);
    }

}

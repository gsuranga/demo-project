<?php

/*
  Create By Insaf Zakariya (insaf.zak@gmail.com)
 */

class summary extends C_Controller {

    public function __construct() {
        parent::__construct();
    }

    private $resours = array(
        'JS' => array('summary/js/myscript'),
        'CSS' => array());

    public function indexSummary() {
        $this->template->attach($this->resours);
        $this->template->draw('summary/index_summary', true);
    }

    public function drawSummaryDetailPage() {
        $this->template->draw('summary/view_summary', FALSE);
    }

    public function getBranchs() {
        $this->load->model('summary/summary_model');
        $branch = $this->summary_model->getBranchDetail();

        echo json_encode($branch);
    }

    public function getDetails() {
        $id = $this->input->get('branchID');
        $fromDate = $this->input->get('from_date');
        $todate = $this->input->get('todate');
        $this->load->model('summary/summary_model');
        $fromdate = '';
        $currentdate = date('Y-m-d');
        $currentmonth = date('m');
        if ($currentmonth >= 4) {
            $fromdate = date('Y') . '-04-01';
        } else {
            $fromdate = date("Y", strtotime("-1 year")) . '-04-01';
        }



        $dealerSales = $this->summary_model->getDealerSales($id, $fromDate, $todate);
        $dealerSalesyear = $this->summary_model->getDealerSales($id, $fromdate, $currentdate);

        $counterSales = $this->summary_model->counterSale($id, $fromDate, $todate);
        $counterSalesyear = $this->summary_model->counterSale($id, $fromdate, $currentdate);

        $wshopNcount = $this->summary_model->getWorkShopNCount($id, $fromDate, $todate);
        $wshopNcountyear = $this->summary_model->getWorkShopNCount($id, $fromdate, $currentdate);

        $wshopWcount = $this->summary_model->workShopWCount($id, $fromDate, $todate);
        $wshopWcountyear = $this->summary_model->workShopWCount($id, $fromdate, $currentdate);

        $instSale = $this->summary_model->insutSale($id, $fromDate, $todate);
        $instSaleyear = $this->summary_model->insutSale($id, $fromdate, $currentdate);
        //------------------------------Counter sale----CALCULATION--------
        if ($id == 4) {
            $counterSales[0]->value = ($counterSales[0]->value) - ($instSale[0]->insValue);
            $counterSalesyear[0]->value = ($counterSalesyear[0]->value) - ($instSaleyear[0]->insValue);
            
            $counterSales[0]->costvalue = ($counterSales[0]->costvalue) - ($instSale[0]->insCostValue);
            $counterSalesyear[0]->costvalue = ($counterSalesyear[0]->costvalue) - ($instSaleyear[0]->insCostValue);
        }
        //-----------------------PDI--------------------------------
        $pdi = array();
        $pdiyear = array();
        if ($id == 4) {
            $pdi = $this->summary_model->pdi(2, $fromDate, $todate);
            $pdiyear = $this->summary_model->pdi(2, $fromdate, $currentdate);
        } else {
            $pdi = array((object) array("pdiValue" => 0, "pdiCostValue" => 0));
            $pdiyear = array((object) array("pdiValue" => 0, "pdiCostValue" => 0));
        }
        $totalval = $this->summary_model->totalValues($id, $fromDate, $todate);
        //-------------Checking Value !=0-------------------//
        $dealergpmargin = 0.00;
        if ($dealerSales[0]->dealersaleValue != 0) {
            $dealergpmargin = (((($dealerSales[0]->dealersaleValue) - ($dealerSales[0]->dealercostValue)) / ($dealerSales[0]->dealersaleValue)) * 100 );
        };
        $dealergpmarginyear = 0.00;
        if ($dealerSalesyear[0]->dealersaleValue != 0) {
            $dealergpmarginyear = (((($dealerSalesyear[0]->dealersaleValue) - ($dealerSalesyear[0]->dealercostValue)) / ($dealerSalesyear[0]->dealersaleValue)) * 100 );
        };
        //-------------------------------------------------------------------------------------//-----
        $countergpmargin = 0.00;
        if ($counterSales[0]->value != 0) {
            $countergpmargin = (((($counterSales[0]->value) - ($counterSales[0]->costvalue)) / ($counterSales[0]->value)) * 100 );
        };
        $countergpmarginyear = 0.00;
        if ($counterSalesyear[0]->value != 0) {
            $countergpmarginyear = (((($counterSalesyear[0]->value) - ($counterSalesyear[0]->costvalue)) / ($counterSalesyear[0]->value)) * 100 );
        };
        //-----------------------------------------------------------------------------------//--------
        $workshopNgpmargin = 0.00;
        if ($wshopNcount[0]->workshopncountValue != 0) {
            $workshopNgpmargin = ((($wshopNcount[0]->workshopncountValue) - ($wshopNcount[0]->workshopncountcostValue)) / ($wshopNcount[0]->workshopncountValue)) * 100;
        };
        $workshopNgpmarginyear = 0.00;
        if ($wshopNcountyear[0]->workshopncountValue != 0) {
            $workshopNgpmarginyear = ((($wshopNcountyear[0]->workshopncountValue) - ($wshopNcountyear[0]->workshopncountcostValue)) / ($wshopNcountyear[0]->workshopncountValue)) * 100;
        };
        //--------------------------------------------------------------------//---------------------
        $workshopWgpmargin = 0.00;
        if ($wshopWcount[0]->workshopwcountValue != 0) {
            $workshopWgpmargin = ((($wshopWcount[0]->workshopwcountValue) - ($wshopWcount[0]->workshopwcountcostValue)) / ($wshopWcount[0]->workshopwcountValue)) * 100;
        };
        //----------------------------------------------------------------------------------//--------------
        $workshopWgpmarginyear = 0.00;
        if ($wshopWcountyear[0]->workshopwcountValue != 0) {
            $workshopWgpmarginyear = ((($wshopWcountyear[0]->workshopwcountValue) - ($wshopWcountyear[0]->workshopwcountcostValue)) / ($wshopWcountyear[0]->workshopwcountValue)) * 100;
        };
        //----------------------------------------------------------------------------------//--------------
        $wngrossgp = 0.00;
        if ($wshopNcount[0]->workshopncountValue != 0) {
            $wngrossgp = ((((($wshopNcount[0]->workshopncountValue) - ($wshopNcount[0]->workshopncountcostValue)) + (($wshopWcount[0]->workshopwcountValue) - ($wshopWcount[0]->workshopwcountcostValue))) / (($wshopNcount[0]->workshopncountValue) + ($wshopWcount[0]->workshopwcountValue))) * 100);
        };
        $wngrossgpyear = 0.00;
        if ($wshopNcountyear[0]->workshopncountValue != 0) {
            $wngrossgpyear = ((((($wshopNcountyear[0]->workshopncountValue) - ($wshopNcountyear[0]->workshopncountcostValue)) + (($wshopWcountyear[0]->workshopwcountValue) - ($wshopWcountyear[0]->workshopwcountcostValue))) / (($wshopNcountyear[0]->workshopncountValue) + ($wshopWcountyear[0]->workshopwcountValue))) * 100);
        };
        //---------------------------------------------------------------------------------//---------
        $instgrossgp = 0.00;
        if ($instSale[0]->insValue != 0) {
            $instgrossgp = ((($instSale[0]->insValue) - ($instSale[0]->insCostValue)) / ($instSale[0]->insValue)) * 100;
        }
        $instgrossgpyear = 0.00;
        if ($instSaleyear[0]->insValue != 0) {
            $instgrossgpyear = ((($instSaleyear[0]->insValue) - ($instSaleyear[0]->insCostValue)) / ($instSaleyear[0]->insValue)) * 100;
        }
        //---------------------------------------------------------------------------------//------------
        $pdigrossgp = 0.00;
        if ($pdi[0]->pdiValue != 0) {
            $pdigrossgp = ((($pdi[0]->pdiValue) - ($pdi[0]->pdiCostValue)) / ($pdi[0]->pdiValue)) * 100;
        }
        $pdigrossgpyear = 0.00;
        if ($pdiyear[0]->pdiValue != 0) {
            $pdigrossgpyear = ((($pdiyear[0]->pdiValue) - ($pdiyear[0]->pdiCostValue)) / ($pdiyear[0]->pdiValue)) * 100;
        }
        //-------------------------------------------------------------------------------//----------------
        $totalamount = $dealerSales[0]->dealersaleValue + $counterSales[0]->value + $wshopNcount[0]->workshopncountValue + $wshopWcount[0]->workshopwcountValue + $instSale[0]->insValue + $pdi[0]->pdiValue;
        $totalamountyear = $dealerSalesyear[0]->dealersaleValue + $counterSalesyear[0]->value + $wshopNcountyear[0]->workshopncountValue + $wshopWcountyear[0]->workshopwcountValue + $instSaleyear[0]->insValue + $pdiyear[0]->pdiValue;
        //-------------------------------------------------------------------------------//-//---------------
        $totalcostamount = $dealerSales[0]->dealercostValue + $counterSales[0]->costvalue + $wshopNcount[0]->workshopncountcostValue + $wshopWcount[0]->workshopwcountcostValue + $instSale[0]->insCostValue + $pdi[0]->pdiCostValue;
        $totalcostamountyear = $dealerSalesyear[0]->dealercostValue + $counterSalesyear[0]->costvalue + $wshopNcountyear[0]->workshopncountcostValue + $wshopWcountyear[0]->workshopwcountcostValue + $instSaleyear[0]->insCostValue + $pdiyear[0]->pdiCostValue;

        //------------------------------------------------------------------------------------//--------
        $totalgrossgp = 0.00;
        if ($totalamount != 0) {
            $totalgrossgp = ((($totalamount) - ($totalcostamount)) / ($totalamount)) * 100;
        }
        $totalgrossgpyear = 0.00;
        if ($totalamountyear != 0) {
            $totalgrossgpyear = ((($totalamountyear) - ($totalcostamountyear)) / ($totalamountyear)) * 100;
        }

        $finelArrau = array(
            "dealersale" => $dealerSales[0]->dealersaleValue,
            "dealercostvalue" => $dealerSales[0]->dealercostValue,
            "dealergpvalue" => (($dealerSales[0]->dealersaleValue) - ($dealerSales[0]->dealercostValue)),
            "dealergpmargin" => $dealergpmargin,
            "countersale" => $counterSales[0]->value,
            "countercostvalue" => $counterSales[0]->costvalue,
            "countergpvalue" => (($counterSales[0]->value) - ($counterSales[0]->costvalue)),
            "countergpmargin" => $countergpmargin,
            "workshopNcount" => $wshopNcount[0]->workshopncountValue,
            "workshopNcostcount" => $wshopNcount[0]->workshopncountcostValue,
            "workshopNgpcount" => (($wshopNcount[0]->workshopncountValue) - ($wshopNcount[0]->workshopncountcostValue)),
            "workshopNgpmargin" => $workshopNgpmargin,
            "workshopWcount" => $wshopWcount[0]->workshopwcountValue,
            "workshopWcostcount" => $wshopWcount[0]->workshopwcountcostValue,
            "workshopWgpcount" => (($wshopWcount[0]->workshopwcountValue) - ($wshopWcount[0]->workshopwcountcostValue)),
            "workshopWgpmargin" => $workshopWgpmargin,
            "wnto" => ($wshopNcount[0]->workshopncountValue) + ($wshopWcount[0]->workshopwcountValue),
            "wncost" => ($wshopNcount[0]->workshopncountcostValue) + ($wshopWcount[0]->workshopwcountcostValue),
            "wngross" => (($wshopNcount[0]->workshopncountValue) - ($wshopNcount[0]->workshopncountcostValue)) + (($wshopWcount[0]->workshopwcountValue) - ($wshopWcount[0]->workshopwcountcostValue)),
            "wngrossgp" => $wngrossgp,
            "instValue" => $instSale[0]->insValue,
            "instCostValue" => $instSale[0]->insCostValue,
            "instgross" => (($instSale[0]->insValue) - ($instSale[0]->insCostValue)),
            "instgrossgp" => $instgrossgp,
            "pdiValue" => $pdi[0]->pdiValue,
            "pdiCost" => $pdi[0]->pdiCostValue,
            "pdigross" => (($pdi[0]->pdiValue) - ($pdi[0]->pdiCostValue)),
            "pdigrossgp" => $pdigrossgp,
            "totalValue" => $totalamount,
            "totalCost" => $totalcostamount,
            "totalgross" => (($totalamount) - ($totalcostamount)),
            "totalgrossgp" => $totalgrossgp,
            //--------------------------FY Data----------------------------------------------------//
            "dealersaleyear" => $dealerSalesyear[0]->dealersaleValue,
            "dealercostvalueyear" => $dealerSalesyear[0]->dealercostValue,
            "dealergpvalueyear" => (($dealerSalesyear[0]->dealersaleValue) - ($dealerSalesyear[0]->dealercostValue)),
            "dealergpmarginyear" => $dealergpmarginyear,
            "countersaleyear" => $counterSalesyear[0]->value,
            "countercostvalueyear" => $counterSalesyear[0]->costvalue,
            "countergpvalueyear" => (($counterSalesyear[0]->value) - ($counterSalesyear[0]->costvalue)),
            "countergpmarginyear" => $countergpmarginyear,
            "workshopNcountyear" => $wshopNcountyear[0]->workshopncountValue,
            "workshopNcostcountyear" => $wshopNcountyear[0]->workshopncountcostValue,
            "workshopNgpcountyear" => (($wshopNcountyear[0]->workshopncountValue) - ($wshopNcountyear[0]->workshopncountcostValue)),
            "workshopNgpmarginyear" => $workshopNgpmarginyear,
            "workshopWcountyear" => $wshopWcountyear[0]->workshopwcountValue,
            "workshopWcostcountyear" => $wshopWcountyear[0]->workshopwcountcostValue,
            "workshopWgpcountyear" => (($wshopWcountyear[0]->workshopwcountValue) - ($wshopWcountyear[0]->workshopwcountcostValue)),
            "workshopWgpmarginyear" => $workshopWgpmarginyear,
            "wntoyear" => ($wshopNcountyear[0]->workshopncountValue) + ($wshopWcountyear[0]->workshopwcountValue),
            "wncostyear" => ($wshopNcountyear[0]->workshopncountcostValue) + ($wshopWcountyear[0]->workshopwcountcostValue),
            "wngrossyear" => (($wshopNcountyear[0]->workshopncountValue) - ($wshopNcountyear[0]->workshopncountcostValue)) + (($wshopWcountyear[0]->workshopwcountValue) - ($wshopWcountyear[0]->workshopwcountcostValue)),
            "wngrossgpyear" => $wngrossgpyear,
            "instValueyear" => $instSaleyear[0]->insValue,
            "instCostValueyear" => $instSaleyear[0]->insCostValue,
            "instgrossyear" => (($instSaleyear[0]->insValue) - ($instSaleyear[0]->insCostValue)),
            "instgrossgpyear" => $instgrossgpyear,
            "pdiValueyear" => $pdiyear[0]->pdiValue,
            "pdiCostyear" => $pdiyear[0]->pdiCostValue,
            "pdigrossyear" => (($pdiyear[0]->pdiValue) - ($pdiyear[0]->pdiCostValue)),
            "pdigrossgpyear" => $pdigrossgpyear,
            "totalValueyear" => $totalamountyear,
            "totalCostyear" => $totalcostamountyear,
            "totalgrossyear" => (($totalamountyear) - ($totalcostamountyear)),
            "totalgrossgpyear" => $totalgrossgpyear,
        );

        echo json_encode($finelArrau);
    }

}

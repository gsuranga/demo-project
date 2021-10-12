<script type="text/javascript">
    $j(document).ready(function() {
        $j('#newLabel').html('');
        $j('#View_Main_Stk').dataTable();

    });
</script>

<?php
$_instance = get_instance();
$row_id = 0;

$current_date = date("Y-m-d");

$submit_stock_search = array(
    "id" => "submit_search",
    "name" => "submit_search",
    "type" => "submit",
    "value" => "Search",
);
$form_data = array(
    "id" => "search_tour_data",
    "name" => "search_tour_data",
    "onsubmit" => "return validateForm()",
);
$category_count = count($extraData['visit_categories']);
$purpose_count = count($extraData['visit_purposes']);
if (isset($extraData['date']) && $extraData['officer_id']) {
    $date_selected = $extraData['date'];
    $number_of_days = date('t', strtotime($date_selected . "-01"));
    $officer_id = $extraData['officer_id'];
    $daily_budget = $_instance->getDailyBudget($officer_id, $date_selected);
} else {
    $date_selected = date("Y-m-d");
}
?>

<?php echo form_open('tour_iteneray/drawIndex_DailySumary_ViewMain', $form_data) ?>
<table align="left" width="30%">              


    <tr>
        <td style="float: left"><label style="font-weight: 600">Sales Oficer Name:</label></td>

        <td><input type="text" id="txt_officer_name" name="txt_officer_name" onfocus="getSalesOficerName()" style="float: right"/>
            <input type="hidden" id="txt_officer_id" name="txt_officer_id"/>
        </td> 


    </tr>
    <tr>
        <td style="float: left"><label style="font-weight: 600">Salesman Code:</label></td>

        <td><input type="text" id="salesCode" name="salesCode" onfocus="getSalesOfficerCode()" autocomplete="off" style="float: right"/>

        </td> 


    </tr>

    <tr>
        <td style="float: left"><label style="font-weight: 600">Branch Code:</label></td>

        <td><input type="text" id="branchCod" readonly="readonly" name="branchCod" autocomplete="off" onfocus="get_BranchCode()" style="float: right"/>
            <input type="hidden" id="branchID" name="branchID"/>

        </td> 


    </tr>
    <tr>
        <td style="float: left"><label style="font-weight: 600">Month:</label></td>
        <td><input type="text" id="txt_tour_month" name="txt_tour_month" style="float: right"></td>
    </tr>



    <tr>
        <td></td>
        <td style="float: right"><?php echo form_submit($submit_stock_search); ?></td>
    </tr>
    <tr></tr>
    <tr></tr>
    <tr></tr>
</table>

<?php echo form_close('') ?>
<table align="right" style="position: relative; top: 130px">
    <tr>
        <td></td>
        <td align="right"><input type="button" onclick="reportsToExcel('tbl_tour_itenary_summary', '<?php echo 'tour_itenary_' . $date_selected ?>');" value="To Excel"></td>

    </tr>
</table>
<table class="CSSTableGenerator" cellpadding="1" id="tbl_tour_itenary_summary" name="tbl_tour_itenary_summary">
    <thead>
        <tr> 
            <td style="width:130px" rowspan="2">Date</td>
            <td rowspan="2">Tour Itenerary (Plan)</td>
            <td rowspan="2">Dealers Targeted (Optional)</td>
            <td rowspan="2">Amendments</td>
            <td rowspan="2">Why</td>
            <td rowspan="2">Actuals</td>
            <td colspan="<?php echo $purpose_count ?>">Purpose</td>
            <td colspan="<?php echo $category_count ?>">Category</td>
            <td rowspan="2">Total Sales Value</td>
            <td rowspan="2">Total Return Value</td>
            <td rowspan="2">% Achievement</td>
            <td rowspan="2">No. of Line Items</td>
            <td rowspan="2">No. of Lines</td>
            <td rowspan="2" hidden="hidden">Overdue Dealers</td>
            <td rowspan="2" hidden="hidden">New Dealer Registrations</td>
        </tr>
        <tr>
            <?php foreach ($extraData['visit_purposes'] as $value) { ?>
                <td><?php echo $value->purpose_id_name; ?></td>
            <?php }
            ?>

            <?php foreach ($extraData['visit_categories'] as $value) { ?>
                <td><?php echo $value->category_name; ?></td>
            <?php }
            ?>
        </tr>

    </thead>
    <tbody>
        <tr></tr>
        <tr></tr>
        <?php
        if (isset($number_of_days)) {
            for ($i = 1; $i <= $number_of_days; $i++) {
                ?>
                <tr>
                    <td id="myID" style="width:130px;" ><?php
                        $date = date('Y-m-d', strtotime($date_selected . "-" . $i));
                        echo $date
                        ?></td>
                    <td id="myID1"><?php
                        $tourPlanData = $_instance->getTourPlanData($officer_id, $date);
                        if (isset($tourPlanData[0]->cities)) {
                            echo $tourPlanData[0]->cities;
                        } else {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        if (isset($tourPlanData[0]->dealers)) {
                            echo $tourPlanData[0]->dealers;
                        } else {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $tourPlanAmendments = $_instance->getTourPlanAmendments($officer_id, $date);
                        if (isset($tourPlanAmendments[0]->cities)) {
                            echo $tourPlanAmendments[0]->cities;
                        } else {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        if (isset($tourPlanAmendments[0]->reasons)) {
                            echo $tourPlanAmendments[0]->reasons;
                        } else {
                            echo "-";
                        }
                        ?></td>
                    <td><?php
                        $actualLocations = $_instance->getActualLocations($officer_id, $date);
                        if (isset($actualLocations[0]->actuals)) {
                            echo $actualLocations[0]->actuals;
                        } else {
                            echo "-";
                        }
                        ?></td>

                    <?php foreach ($extraData['visit_purposes'] as $value) { ?>
                        <td title="<?php
                        $title = '';
                        if ($value->visit_purpose_id == 1) {
                            $orderData = $_instance->getOrderData($officer_id, $date);
                            $json_encode = json_encode($orderData);
                            if (isset($orderData)) {
                                foreach ($orderData as $value1) {
                                    $title .= $value1->details . "\n\n";
                                }
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_purpose_id == 4) {
                            $branding = $_instance->getAllBrandingData($officer_id, $date);
                            if (isset($branding) && count($branding) > 0) {
                                foreach ($branding as $value2) {
                                    $title .= $value2;
                                }
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_purpose_id == 5) {
                            $visit_only = $_instance->getAllVisitOnlyData($officer_id, $date);
                            if (isset($visit_only)) {
                                foreach ($visit_only as $value4) {
                                    $title .= $value4;
                                }
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_purpose_id == 6) {
                            $market_info = $_instance->getAllMarketInfoData($officer_id, $date);
                            if (isset($market_info)) {
                                foreach ($market_info as $value3) {
                                    $title .= $value3;
                                }
                            } else {
                                $title = "No data found.";
                            }
                        }
                        echo $title;
                        ?>" <?php if ($value->visit_purpose_id == 1) { ?>
                                id="order_data" class="order_data" onmouseover="writeMessage(<?php echo $officer_id; ?>,<?php echo "'" . $date . "'"; ?>)"

                            <?php }if ($value->visit_purpose_id == 3) {
                                ?> 
                                id="collection_data" class="collection_data" onmouseover="popupCollection(<?php echo $officer_id; ?>,<?php echo "'" . $date . "'"; ?>)"
                                <?php
                            }
                            ?>
                            ><?php
                                $purposeCount = $_instance->countPurposeCount($officer_id, $date, $value->visit_purpose_id);
                                echo $purposeCount;
                                ?></td>
                    <?php } ?>



                    <?php foreach ($extraData['visit_categories'] as $value) { ?>
                        <td title="<?php
                        $title = '';
                        if ($value->visit_category_id == 1) {
                            $visit_dealers = $_instance->getDealerVisitData($officer_id, $date);
                            if (isset($visit_dealers)) {

                                $title = $visit_dealers;
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_category_id == 2) {
                            $visit_garages = $_instance->getGarageVisitData($officer_id, $date);
                            if (isset($visit_garages)) {

                                $title = $visit_garages;
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_category_id == 3) {
                            $visit_fos = $_instance->getFleetOwnerVisitData($officer_id, $date);
                            if (isset($visit_fos)) {

                                $title = $visit_fos;
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_category_id == 4) {
                            $visit_new_dealers = $_instance->getNewDealerVisitData($officer_id, $date);
                            if (isset($visit_new_dealers)) {

                                $title = $visit_new_dealers;
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_category_id == 5) {
                            $visit_vos = $_instance->getVehicleOwnerVisitData($officer_id, $date);
                            if (isset($visit_vos)) {

                                $title = $visit_vos;
                            } else {
                                $title = "No data found.";
                            }
                        } elseif ($value->visit_category_id == 6) {
                            $visit_nc = $_instance->getNewCustomerVisitData($officer_id, $date);
                            if (isset($visit_nc)) {

                                $title = $visit_nc;
                            } else {
                                $title = "No data found.";
                            }
                        }
                        echo $title;
                        ?>"><?php
                                $categoryCount = $_instance->countCategoryCount($officer_id, $date, $value->visit_category_id);
                                echo $categoryCount;
                                ?></td>
                    <?php } ?>


                    <td><?php
                        $totalSalesValue = $_instance->getDailyTotalSalesValue($officer_id, $date);
                        if (isset($totalSalesValue[0]->total)) {
                            echo $totalSalesValue[0]->total;
                        } else {
                            echo "0.00";
                        }
                        ?></td>
                    <td><?php
                        $dailyReturnValue = $_instance->getDailyReturnValue($officer_id, $date);
                        if (isset($dailyReturnValue)) {
                            echo $dailyReturnValue;
                        } else {
                            echo "0.00";
                        }
                        ?></td>
                    <td><?php
                        if (isset($totalSalesValue[0]->total) && isset($daily_budget) && $daily_budget > 0 && $totalSalesValue[0]->total > 0) {
                            echo round((($totalSalesValue[0]->total / $daily_budget) * 100), 2);
                        } else {
                            echo "0.00";
                        }
                        ?></td>
                    <td><?php
                        if (isset($totalSalesValue[0]->no_of_line_items)) {
                            echo $totalSalesValue[0]->no_of_line_items;
                        } else {
                            echo "0";
                        }
                        ?></td>
                    <td><?php
                        if (isset($totalSalesValue[0]->no_of_lines)) {
                            echo $totalSalesValue[0]->no_of_lines;
                        } else {
                            echo "0";
                        }
                        ?></td>
                    <td hidden="hidden"></td>
                    <td hidden="hidden"></td>
                </tr>
                <?php
            }
        }
        ?>


    </tbody>
</table>

<div hidden="hidden" id="hidden_popup" style="border-bottom-style: dotted;background-color: #F7F9FE">
    <table>
        <tbody id="tbl_order_data">

        </tbody>
    </table>



</div>
<!--#F7F9FE-->
<div hidden="hidden" id="hidden_collection_popup" style="background-color: #F7F9FE;">
    <table>
        <tbody id="tbl_cash_payment_data">

        </tbody>
    </table>
    <table>
        <tbody id="tbl_cheque_payment_data">

        </tbody>
    </table>
    <table>
        <tbody id="tbl_bd_payment_data">
        <td style="font-weight: 700"></td>
        </tbody>
    </table>



</div>
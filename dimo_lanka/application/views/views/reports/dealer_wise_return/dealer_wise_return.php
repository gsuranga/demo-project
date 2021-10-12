<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<?php
$year1 = 0;
$so_id = 0;
//$txt_sales_officer_id = '';
//$txt_sales_officer = '';
//$year_picker = '';

if (isset($_POST['year_picker'])) {

    $so_id = $_POST['txt_dealer_id'];
    $year1 = $_POST['year_picker'];
}
$username = $this->session->userdata('username');

$_instance = get_instance();
$typename = $this->session->userdata('typename');
$salesmanData = '';
$readOnly = true;
if ($typename == "Dealer") {
    $employe_id = $this->session->userdata('employe_id');
    $salesmanData = $_instance->getCurrentDealer($employe_id);
    $readOnly = false;
} else {
    
}
?>

<?php echo form_open(); ?>  

<table align="center"  style="alignment-adjust: middle" width="45%">
    <tr>
        <td >Dealer :</td>
        <td>
            <input style="width: 208px;" type="text" style="width: 220px;" <?php if ($typename == "Dealer") { ?> readonly="true" <?php } ?> id="txt_dealer_name" name="txt_dealer_name" placeholder="Dealer" autocomplete="off" onfocus="get_all_dealer_name();" value="<?php
            if ($typename == "Dealer") {
                echo $salesmanData[0]->name;
            } else {
                if (count($extraData[0]['form_data'])) {
                    echo $extraData[0]['form_data'][0];
                }
            }
            ?>"/>
            <input type="hidden" id="txt_dealer_id" name="txt_dealer_id" value="<?php
            if ($typename == "Dealer") {
                echo $salesmanData[0]->employee_id;
            } else {
                if (count($extraData[0]['form_data'])) {
                    echo $extraData[0]['form_data'][1];
                }
            }
            ?>"/>
        </td>
    </tr>
    <tr>
        <td>Account No :</td>
        <td>
            <input style="width: 208px;" type="text" style="width: 220px;" <?php if ($typename == "Sales Officer") { ?> readonly="true" <?php } ?> id="txt_dealer_acnt_no" name="txt_dealer_acnt_no" placeholder="Account No" autocomplete="off" onfocus="get_all_dealer_acnt_no();" value="<?php
            if ($typename == "Dealer") {
                echo $salesmanData[0]->delar_account_no;
            } else {
                if (count($extraData[0]['form_data'])) {
                    echo $extraData[0]['form_data'][2];
                }
            }
            ?>"/>
<!--            <input type="hidden" id="txt_sales_officer_id1" name="txt_sales_officer_id1"/>-->
        </td>
    </tr>
    <tr>
        <td>Financial Year :</td>
        <td>
            <select style="width: 220px;" name="year_picker" id="year_picker">
                <?php if (count($extraData[0]['form_data'])) { ?>
                    <option selected ><?php echo $extraData[0]['form_data'][3]; ?></option>

                <?php }
                ?>
                <option>---year---</option>
                <?php
                $year = date('Y');

                for ($i = 2000; $i <= $year; $i++) {
                    ?>

                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td></td>
        <td style="position: absolute;left: 494px;">
            <input type="button" id="to_exel" value="To Exel"  onclick="reportsToExcel('tbl_sales_man_wise_return_overall', 'total_returns')"/>

        </td>
        <td style="position: absolute;left: 585px;">
            <input type="submit" value="Search" />
        </td>

    </tr>
</table>
<table>
    <tr height="40">

    </tr>
</table>
<?php echo form_close(); ?>
<table align="center" class="actual_parts_count" width='100%' id="tbl_sales_man_wise_return_overall" >
    <th>
    <tr>
        <td style="background: #003366;color:white;padding: 1px;text-align: center" rowspan="2">Part number</td>
        <td  style="background: #003366;color:white;padding: 1px;text-align: center" rowspan="2">Description</td>
        <td  style="background: #003366;color:white;padding: 1px;text-align: center" rowspan="2">Model</td>
        <td  style="background: #003366;color:white;padding: 1px;text-align: center" colspan="12">Actual Quantities</td>
        <td   style="background: #003366;color:white;padding: 1px;text-align: center" rowspan="2">Total</td>
        <td  style="background: #003366;color:white;padding: 1px;text-align: center" rowspan="2">Avg(%)</td>
    </tr>
    <tr>

        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Apr</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">May</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Jun</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Jul</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Aug</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Sep</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Oct</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Nov</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Dec</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Jan</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Feb</font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">Mar</font></td>

    </tr>
    <tr>
        <td style="background: #003366;color:white;padding: 1px;text-align: center" colspan="3">Hash Quantities</td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-04-01";
            $end_date = $year1 . "-04-30";

            $returnHashQuantity_apr = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_apr;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-05-01";
            $end_date = $year1 . "-05-31";

            $returnHashQuantity_may = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_may;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-06-01";
            $end_date = $year1 . "-06-30";

            $returnHashQuantity_jun = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_jun;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff"> 
            <?php
            $start_date = $year1 . "-07-01";
            $end_date = $year1 . "-07-31";

            $returnHashQuantity_jul = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_jul;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-08-01";
            $end_date = $year1 . "-08-31";

            $returnHashQuantity_aug = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_aug;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-09-01";
            $end_date = $year1 . "-09-30";

            $returnHashQuantity_sep = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_sep;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">  <?php
            $start_date = $year1 . "-10-01";
            $end_date = $year1 . "-10-31";

            $returnHashQuantity_oct = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_oct;
            ?></font></td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-11-01";
            $end_date = $year1 . "-11-30";

            $returnHashQuantity_nov = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_nov;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-12-01";
            $end_date = $year1 . "-12-31";

            $returnHashQuantity_dec = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_dec;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = ($year1 + 1) . "-01-01";
            $end_date = ($year1 + 1) . "-01-31";

            $returnHashQuantity_jan = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_jan;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = ($year1 + 1) . "-02-01";
            $end_date = ($year1 + 1) . "-02-29";

            $returnHashQuantity_feb = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_feb;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = ($year1 + 1) . "-03-01";
            $end_date = ($year1 + 1) . "-03-31";

            $returnHashQuantity_mar = $_instance->getReturnDealerHashQuantity($so_id, $start_date, $end_date);
            echo $returnHashQuantity_mar;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $total_return_hash_quantity = $returnHashQuantity_apr + $returnHashQuantity_may + $returnHashQuantity_jun + $returnHashQuantity_jul + $returnHashQuantity_aug + $returnHashQuantity_sep + $returnHashQuantity_oct + $returnHashQuantity_nov + $returnHashQuantity_dec + $returnHashQuantity_jan + $returnHashQuantity_feb + $returnHashQuantity_mar;
            echo $total_return_hash_quantity;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $total_return_hash_quantity_avg = $returnHashQuantity_apr + $returnHashQuantity_may + $returnHashQuantity_jun + $returnHashQuantity_jul + $returnHashQuantity_aug + $returnHashQuantity_sep + $returnHashQuantity_oct + $returnHashQuantity_nov + $returnHashQuantity_dec + $returnHashQuantity_jan + $returnHashQuantity_feb + $returnHashQuantity_mar;
            $return_avg = $total_return_hash_quantity_avg / 12 * 100;
            echo number_format($return_avg, 2);
            ?></font>
        </td>
    </tr>

    <tr>
        <td style="background: #003366;color:white;padding: 1px;text-align: center" colspan="3">No. of Individual Lines</td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-04-01";
            $end_date = $year1 . "-04-30";
            $returnIndividualLine_apr = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_apr;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-05-01";
            $end_date = $year1 . "-05-31";
            $returnIndividualLine_may = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_may;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-06-01";
            $end_date = $year1 . "-06-30";
            $returnIndividualLine_jun = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_jun;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-07-01";
            $end_date = $year1 . "-07-31";
            $returnIndividualLine_jul = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_jul;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-08-01";
            $end_date = $year1 . "-08-31";
            $returnIndividualLine_aug = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_aug;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-09-01";
            $end_date = $year1 . "-09-30";
            $returnIndividualLine_sep = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_sep;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-10-01";
            $end_date = $year1 . "-10-31";
            $returnIndividualLine_oct = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_oct;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-11-01";
            $end_date = $year1 . "-11-30";
            $returnIndividualLine_nov = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_nov;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = $year1 . "-12-01";
            $end_date = $year1 . "-12-31";
            $returnIndividualLine_dec = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_dec;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = ($year1 + 1) . "-01-01";
            $end_date = ($year1 + 1) . "-01-31";
            $returnIndividualLine_jan = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_jan;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = ($year1 + 1) . "-02-01";
            $end_date = ($year1 + 1) . "-02-29";
            $returnIndividualLine_feb = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_feb;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $start_date = ($year1 + 1) . "-03-01";
            $end_date = ($year1 + 1) . "-03-31";
            $returnIndividualLine_mar = $_instance->getDealerReturnIndividualLine($so_id, $start_date, $end_date);
            echo $returnIndividualLine_mar;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $total_individual = $returnIndividualLine_apr + $returnIndividualLine_may + $returnIndividualLine_jun + $returnIndividualLine_jul + $returnIndividualLine_aug + $returnIndividualLine_sep + $returnIndividualLine_oct + $returnIndividualLine_nov + $returnIndividualLine_dec + $returnIndividualLine_jan + $returnIndividualLine_feb + $returnIndividualLine_mar;
            echo $total_individual;
            ?></font>
        </td>
        <td style="background-color: #0A7EC5;text-align: center"><font style="color: #ffffff">
            <?php
            $total_individual_avg = $returnIndividualLine_apr + $returnIndividualLine_may + $returnIndividualLine_jun + $returnIndividualLine_jul + $returnIndividualLine_aug + $returnIndividualLine_sep + $returnIndividualLine_oct + $returnIndividualLine_nov + $returnIndividualLine_dec + $returnIndividualLine_jan + $returnIndividualLine_feb + $returnIndividualLine_mar;
            $ind_avg = $total_individual_avg / 12 * 100;
            echo number_format($ind_avg, 2);
            ?></font>
        </td>
    </tr>

</th>
<tbody>
    <tr></tr>
    <?php
    if (!empty($extraData[1]['result_data']) && count($extraData[1]['result_data']) > 0) {
        foreach ($extraData[1]['result_data'] as $value) {
            ?>
            <tr>
                <td style="text-align: center" align="right"><?php echo $value->part_no; ?></td>
                <td style="text-align: center" colspan="2"><?php echo $value->description; ?></td>
                <td style="text-align: center">
                    <?php
                    $apr = $value->apr_ret_hash;
                    echo $apr;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $may = $value->may_ret_hash;
                    echo $may;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $jun = $value->jun_ret_hash;
                    echo $jun;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $jul = $value->jul_ret_hash;
                    echo $jul;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $aug = $value->aug_ret_hash;
                    echo $aug;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $sep = $value->sep_ret_hash;
                    echo $sep;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $oct = $value->oct_ret_hash;
                    echo $oct;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $nov = $value->nov_ret_hash;
                    echo $nov;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $dec = $value->dec_ret_hash;
                    echo $dec;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $jan = $value->jan_ret_hash;
                    echo $jan;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $feb = $value->feb_ret_hash;
                    echo $feb;
                    ?>
                </td>
                <td style="text-align: center">
                    <?php
                    $mar = $value->mar_ret_hash;
                    echo $mar;
                    ?>
                </td>
                <td style="text-align: center" align="center">
                    <?php
                    $tot = $apr + $may + $jun + $jul + $aug + $sep + $oct + $nov + $dec + $jan + $feb + $mar;
                    echo $tot;
                    ?>
                </td>
                <td style="text-align: center" align="center"><?php
                    $tot_avg = $apr + $may + $jun + $jul + $aug + $sep + $oct + $nov + $dec + $jan + $feb + $mar;
                    $tot_avg_print = $tot_avg / 12 * 100;
                    echo number_format($tot_avg_print, 2);
                    ?>
                </td>
            </tr>

            <?php
        }
    }
    ?> 
</tbody>
</table>
<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of salesman_daily_summary
 *
 * @author SHDINESH
 */
?>
<?php echo form_open('reports/drawIndexDailySalesSummary') ?>

<table align="center" >

    <tr>
        <td>Date</td>
        <td>
            <input type="text" id="daily_summary_date" name="daily_summary_date">
        </td>
        <td></td>
        <td>
            <select id="sales_type1" name="sales_type1">
                <?php foreach ($extraData['all_sales_types'] as $value) { ?>
                    <option value="<?php echo $value->sales_type_id; ?>"><?php echo $value->sales_type_name ?></option>;                                                                                                                      ?></option>
                <?php } ?>
            </select>
        </td>
        <td>
            <input type="submit" id="btn_submit" name="btn_submit" value="Summary">
        </td>
    </tr>

</table>  
&emsp;
<?php echo form_close(); ?>
<table class="CSSTableGenerator" style="">
    <tbody>
        <tr>
            <td></td>
            <td></td>  
            <td></td>  
            <td colspan="6"><?php echo $extraData['selected_month']; ?></td>
            <td colspan="3">Overall - Apr to Feb</td>
        </tr>
        <tr>
            <td style="background: #DFF4FF"></td>
            <td style="background: #DFF4FF"></td>
            <td style="background: #DFF4FF"></td>
            <td style="background: #DFF4FF; font-weight: 700;font-size: 14px" colspan="3"><?php echo $extraData['selected_date']; ?></td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 14px" colspan="3"><?php echo "Commulative (" . $extraData['selected_date'] . ")"; ?></td>
            <td style="background: #DFF4FF" colspan="3"></td>


        </tr>
        <tr>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Area</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Workshop</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Repair Type</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Budget</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Actual</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Achivement</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Budget</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Actual</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Achivement</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Budget</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Actual</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Achivement</td>
        </tr>
        <?php
        $workshop_daily_overall = 0;
        $workshop_comm_overall = 0;
        $workshop_overall = 0;

        foreach ($extraData['daily_summary'] as $value) {
            ?>


            <tr>
                <td rowspan="12" style="font-style: oblique; font-weight: 900"><?php echo $value->area_name; ?></td>
                <td rowspan="12" style="font-style: oblique; font-weight: 900"><?php echo $value->workshop_name; ?></td>
                <td>Normal Repairs TATA</td>
                <td></td>
                <td><?php
                    $normal_tata_daily = 0.00;
                    if ($value->normal_tata_daily == null) {
                        $normal_tata_daily = 0.00;
                        echo number_format($normal_tata_daily, 2);
                    } else {
                        echo $normal_tata_daily = $value->normal_tata_daily;
                    }
                    ?></td>

                <td></td>
                <td></td>
                <td><?php
                    $normal_tata_commulative = 0.00;
                    if ($value->normal_tata_daily == null) {
                        $normal_tata_commulative = 0.00;
                        echo number_format($normal_tata_commulative, 2);
                    } else {
                        echo $normal_tata_commulative = $value->normal_tata_commulative;
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $normal_tata_overall = 0.00;
                    if ($value->normal_tata_overall == null) {
                        $normal_tata_overall = 0.00;
                        echo number_format($normal_tata_overall, 2);
                    } else {
                        echo $normal_tata_overall = $value->normal_tata_overall;
                    }
                    ?></td>
                <td></td>
            </tr>
            <tr>

                <td>Normal Repairs Non TATA</td>
                <td></td>
                <td><?php
                    $normal_non_tata_daily = 0.00;
                    if ($value->normal_non_tata_daily == null) {
                        $normal_non_tata_daily = 0.00;
                        echo number_format($normal_non_tata_daily, 2);
                    } else {
                        echo $normal_non_tata_daily = $value->normal_non_tata_daily;
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $normal_non_tata_commulative = 0.00;
                    if ($value->normal_non_tata_commulative == null) {
                        $normal_non_tata_commulative = 0.00;
                        echo number_format($normal_non_tata_commulative, 2);
                    } else {
                        echo $normal_non_tata_commulative = $value->normal_non_tata_commulative;
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $normal_non_tata_overall = 0.00;
                    if ($value->normal_non_tata_overall == null) {
                        $normal_non_tata_overall = 0.00;
                        echo number_format($normal_non_tata_overall, 2);
                    } else {
                        echo $normal_non_tata_overall = $value->normal_non_tata_overall;
                    }
                    ?></td>
                <td></td>
            </tr>
            <tr>

                <td>Normal Repairs Total </td>
                <td></td>
                <td><?php
                    $normal_tata_daily_tot = $normal_tata_daily + $normal_non_tata_daily;
                    echo number_format($normal_tata_daily_tot, 2);
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $normal_tata_commulative_tot = $normal_tata_commulative + $normal_non_tata_commulative;
                    echo number_format($normal_tata_commulative_tot, 2);
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $normal_tata_overall_tot = $normal_tata_overall + $normal_non_tata_overall;
                    echo number_format($normal_tata_overall_tot, 2)
                    ?></td>
                <td></td>
            </tr>
            <tr>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>

                <td>Warrenty Repairs TATA</td>
                <td></td>
                <td><?php
                    $warrenty_tata_daily = 0.00;
                    if ($value->warrenty_tata_daily == null) {
                        $warrenty_tata_daily = 0.00;
                        echo number_format($warrenty_tata_daily, 2);
                    } else {
                        echo $warrenty_tata_daily = $value->warrenty_tata_daily;
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $warrenty_tata_commulative = 0.00;
                    if ($value->warrenty_tata_commulative == null) {
                        $warrenty_tata_commulative = 0.00;
                        echo number_format($warrenty_tata_commulative, 2);
                    } else {
                        echo $warrenty_tata_commulative = $value->warrenty_tata_commulative;
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $warrenty_tata_overall = 0.00;
                    if ($value->warrenty_tata_overall == null) {
                        $warrenty_tata_overall = 0.00;
                        echo number_format($warrenty_tata_overall, 2);
                    } else {
                        echo $warrenty_tata_overall = $value->warrenty_tata_overall;
                    }
                    ?></td>
                <td></td>
            </tr>
            <tr>

                <td>Warrenty Repairs Non TATA</td>
                <td></td>
                <td><?php
                    $warrenty_non_tata_daily = 0.00;
                    if ($value->warrenty_non_tata_daily == null) {
                        $warrenty_non_tata_daily = 0.00;
                        echo number_format($warrenty_non_tata_daily, 2);
                    } else {
                        echo $warrenty_non_tata_daily = $value->warrenty_non_tata_daily;
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $warrenty_non_tata_commulative = 0.00;
                    if ($value->warrenty_non_tata_commulative == null) {
                        $warrenty_non_tata_commulative = 0.00;
                        echo number_format($warrenty_non_tata_commulative, 2);
                    } else {
                        echo $warrenty_non_tata_commulative = $value->warrenty_non_tata_commulative;
                    }
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $warrenty_non_tata_overall = 0.00;
                    if ($value->warrenty_non_tata_overall == null) {
                        $warrenty_non_tata_overall = 0.00;
                        echo number_format($warrenty_non_tata_overall, 2);
                    } else {
                        echo $warrenty_non_tata_overall = $value->warrenty_non_tata_overall;
                    }
                    ?></td>
                <td></td>
            </tr>
            <tr>

                <td>Warrenty Repairs Total</td>
                <td></td>
                <td><?php
                    $warrenty_tata_daily_tot = $warrenty_tata_daily + $warrenty_non_tata_daily;
                    echo number_format($warrenty_tata_daily_tot, 2)
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $warrenty_tata_commulative_tot = $warrenty_tata_commulative + $warrenty_non_tata_overall;
                    echo number_format($warrenty_tata_commulative_tot, 2)
                    ?></td>
                <td></td>
                <td></td>
                <td><?php
                    $warrenty_tata_overall_tot = $warrenty_tata_overall + $warrenty_non_tata_overall;
                    echo number_format($warrenty_tata_overall_tot, 2)
                    ?></td>
                <td></td>
            </tr>
            <tr>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>

                <td style="font-weight: 700">Work Shop TATA</td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"><?php
                    $workshop_tata_daily_tot = $normal_tata_daily + $warrenty_tata_daily;
                    echo number_format($workshop_tata_daily_tot, 2);
                    ?></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"><?php
                    $workshop_tata_comm_tot = $normal_tata_commulative + $warrenty_tata_commulative;
                    echo number_format($workshop_tata_comm_tot, 2);
                    ?></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"><?php
                    $workshop_tata_overall_tot = $normal_tata_overall + $warrenty_tata_overall;
                    echo number_format($workshop_tata_overall_tot, 2);
                    ?></td>
                <td style="font-weight: 700"></td>
            </tr>
            <tr>

                <td style="font-weight: 700">Work Shop Non TATA</td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"><?php
                    $workshop_non_tata_daily_tot = $normal_non_tata_daily + $warrenty_non_tata_daily;
                    echo number_format($workshop_non_tata_daily_tot, 2);
                    ?></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"><?php
                    $workshop_non_tata_comm_tot = $normal_non_tata_commulative + $warrenty_non_tata_commulative;
                    echo number_format($workshop_non_tata_comm_tot, 2);
                    ?></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"></td>
                <td style="font-weight: 700"><?php
                    $workshop_non_tata_overall_tot = $normal_non_tata_overall + $warrenty_non_tata_overall;
                    echo number_format($workshop_non_tata_overall_tot, 2);
                    ?></td>
                <td style="font-weight: 700"></td>
            </tr>
            <tr>

                <td style="font-weight: 800">Work Shop Total</td>
                <td style="font-weight: 800"></td>
                <td style="font-weight: 800"><?php
                    $workshop_total_daily = $workshop_tata_daily_tot + $workshop_non_tata_daily_tot;
                    $workshop_daily_overall += $workshop_total_daily;
                    echo number_format($workshop_total_daily, 2);
                    ?></td>
                <td style="font-weight: 800"></td>
                <td style="font-weight: 800"></td>
                <td style="font-weight: 800"><?php
                    $workshop_total_comm = $workshop_tata_comm_tot + $workshop_non_tata_comm_tot;
                    $workshop_comm_overall += $workshop_total_comm;
                    echo number_format($workshop_total_comm, 2);
                    ?></td>
                <td style="font-weight: 800"></td>
                <td style="font-weight: 800"></td>
                <td style="font-weight: 800"><?php
                    $workshop_total_overall = $workshop_tata_overall_tot + $workshop_non_tata_overall_tot;
                    $workshop_overall += $workshop_total_overall;
                    echo number_format($workshop_total_overall, 2);
                    ?></td>
                <td style="font-weight: 800"></td>
            </tr>
            <tr>

                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        <?php } ?>
        <tr>
            <td> </td>
            <td> </td>
            <td style="font-weight: bolder">Overall Workshops</td>
            <td></td>
            <td style="font-weight: bolder"><?php echo number_format($workshop_daily_overall, 2); ?></td>
            <td></td>
            <td></td>
            <td style="font-weight: bolder"><?php echo number_format($workshop_comm_overall, 2); ?> </td>
            <td></td>
            <td></td>
            <td style="font-weight: bolder"><?php echo number_format($workshop_overall, 2); ?> </td>
            <td></td>
        </tr>
    </tbody>



</table>
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
                    <option value="<?php echo $value->sales_type_id; ?>"><?php echo $value->sales_type_name; ?></option>
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
<table class="CSSTableGenerator">
    <tbody>
        <tr>
            <td></td>   
            <td></td>   
            <td colspan="6"><?php echo $extraData['selected_month']; ?></td>
            <td colspan="3">Overall - Apr to Feb</td>
        </tr>
        <tr>
            <td style="background: #DFF4FF"></td>
            <td style="background: #DFF4FF"></td>
            <td style="background: #DFF4FF; font-weight: 700;font-size: 14px" colspan="3"><?php echo $extraData['selected_date']; ?></td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 14px" colspan="3"><?php echo "Commulative (" . $extraData['selected_date'] . ")"; ?></td>
            <td style="background: #DFF4FF" colspan="3"></td>


        </tr>
        <tr>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Branch</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">SE Name</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Budget</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Actual</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Achivement(%)</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Budget</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Actual</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Achivement(%)</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Budget</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Actual</td>
            <td style="background: #DFF4FF;font-weight: 700;font-size: 12px">Achivement(%)</td>
        </tr>
        <?php foreach ($extraData['daily_summary'] as $value) { ?>
            <tr>
                <td><?php echo $value->branch_name; ?></td>
                <td><?php echo $value->sales_officer_name; ?></td>
                <td><?php
                    if ($value->daily_budget == null) {
                        echo "0.00";
                    } else {
                        echo $value->daily_budget;
                    };
                    ?></td>
                <td><?php
                    if ($value->daily_selling == null) {
                        echo "0.00";
                    } else {
                        echo $value->daily_selling;
                    };
                    ?></td>
                <td><?php
                    if ($value->daily_budget == 0) {
                        echo "-";
                    } else {
                        echo round(($value->daily_selling / $value->daily_budget) * 100, 2);
                    }
                    ?></td>
                <td><?php
                    if ($value->monthly_budget == null) {
                        echo "0.00";
                    } else {
                        echo $value->monthly_budget;
                    }
                    ?></td>
                <td><?php
                    if ($value->monthly_selling == null) {
                        echo "0.00";
                    } else {
                        echo $value->monthly_selling;
                    };
                    ?></td>
                <td><?php
                    if ($value->monthly_budget == 0) {
                        echo "-";
                    } else {
                        echo round(($value->monthly_selling / $value->monthly_budget) * 100, 2);
                    }
                    ?></td>
                <td><?php
                    if ($value->yearly_budget == null) {
                        echo "0.00";
                    } else {
                        echo $value->yearly_budget;
                    };
                    ?></td>
                <td><?php
                    if ($value->yearly_selling == null) {
                        echo "0.00";
                    } else {
                        echo $value->yearly_selling;
                    };
                    ?></td>
                <td><?php
                    if ($value->yearly_budget == 0) {
                        echo "-";
                    } else {
                        echo round(($value->yearly_selling / $value->yearly_budget) * 100, 2);
                    }
                    ?></td>
            </tr> 
        <?php } ?>


    </tbody>





</table>
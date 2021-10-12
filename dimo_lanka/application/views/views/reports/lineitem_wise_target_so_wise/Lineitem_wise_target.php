<!--<script type="text/javascript">
    $j(document).ready(function() {
        var s = $j('#tbl_so_wise_actual').dataTable();
        setupDataTableSettings(true, false, true, [10, 20, 30, 40], 'tbl_so_wise_actual', true, true);
    });
</script>-->

<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$_instance = get_instance();
$financial_year = 0000;
if (isset($extraData['financial_year'])) {
    $financial_year = $extraData['financial_year'];
}
?>
<?php echo form_open('reports/drawIndexLineitemWiseTargetSOwise') ?>
<table width="35%" align="center">
    <tr>
        <td>Financial year:</td>
        <td width="40%"><select style="width: 150px" name="year_picker" id="year_picker">
                <option value="0">----year----</option>
                <?php
                $year = date('Y');
                for ($i = 2000; $i <= $year; $i++) {
                    ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select></td>
        <td><input type="submit" id="btn_search" name="btn_search" value="Search" style="height: 35px"></td>
    </tr>
</table>
&emsp;
<?php echo form_close() ?>
<table border="1" width="100%" class="CSSTableGenerator" id="tbl_so_wise_actual">
    <thead>
        <tr>
            <td rowspan="2">Name of the ASO</td>
            <td colspan="12">Number of individual line items</td>
            <td rowspan="2">Total</td>
            <td rowspan="2">Avg</td>
        </tr>
        <tr>
            <td>Apr</td>
            <td>May</td>
            <td>June</td>
            <td>July</td>
            <td>Aug</td>
            <td>Sep</td>
            <td>Oct</td>
            <td>Nov</td>
            <td>Dec</td>
            <td>Jan</td>
            <td>Feb</td>
            <td>Mar</td>
        </tr>
    </thead>

    <tbody>
        <tr></tr>
        <tr></tr>
        <?php
        if (isset($extraData['sales_officers']) && $financial_year > 0) {
            foreach ($extraData['sales_officers'] as $value) {
                ?>
                <tr>
                    <td style="text-align: left"><?php echo $value->sales_officer_name . " - " . $value->sales_officer_code; ?></td>
                    <td><?php
                        $officer_id = $value->sales_officer_id;
                        $start_date_apr = $financial_year . "-04-01";
                        $end_date_apr = $financial_year . "-04-30";
                        $count_apr = $_instance->calculateLineItems($officer_id, $start_date_apr, $end_date_apr);
                        echo $count_apr;
                        ?></td>
                    <td>
                        <?php
                        $start_date_may = $financial_year . "-05-01";
                        $end_date_may = $financial_year . "-05-31";
                        $count_may = $_instance->calculateLineItems($officer_id, $start_date_may, $end_date_may);
                        echo $count_may;
                        ?>
                    </td>
                    <td>
                        <?php
                        $start_date_jun = $financial_year . "-06-01";
                        $end_date_jun = $financial_year . "-06-30";
                        $count_jun = $_instance->calculateLineItems($officer_id, $start_date_jun, $end_date_jun);
                        echo $count_jun;
                        ?>
                    </td>
                    <td><?php
                        $start_date_jul = $financial_year . "-07-01";
                        $end_date_jul = $financial_year . "-07-31";
                        $count_jul = $_instance->calculateLineItems($officer_id, $start_date_jul, $end_date_jul);
                        echo $count_jul;
                        ?></td>
                    <td>
                        <?php
                        $start_date_aug = $financial_year . "-08-01";
                        $end_date_aug = $financial_year . "-08-31";
                        $count_aug = $_instance->calculateLineItems($officer_id, $start_date_aug, $end_date_aug);
                        echo $count_aug;
                        ?>
                    </td>
                    <td><?php
                        $start_date_sep = $financial_year . "-09-01";
                        $end_date_sep = $financial_year . "-09-30";
                        $count_sep = $_instance->calculateLineItems($officer_id, $start_date_sep, $end_date_sep);
                        echo $count_sep;
                        ?></td>
                    <td><?php
                        $start_date_oct = $financial_year . "-10-01";
                        $end_date_oct = $financial_year . "-10-31";
                        $count_oct = $_instance->calculateLineItems($officer_id, $start_date_oct, $end_date_oct);
                        echo $count_oct;
                        ?></td>
                    <td><?php
                        $start_date_nov = $financial_year . "-11-01";
                        $end_date_nov = $financial_year . "-11-30";
                        $count_nov = $_instance->calculateLineItems($officer_id, $start_date_nov, $end_date_nov);
                        echo $count_nov;
                        ?></td>
                    <td><?php
                        $start_date_dec = $financial_year . "-12-01";
                        $end_date_dec = $financial_year . "-12-31";
                        $count_dec = $_instance->calculateLineItems($officer_id, $start_date_dec, $end_date_dec);
                        echo $count_dec;
                        ?></td>
                    <td><?php
                        $start_date_jan = $financial_year + 1 . "-01-01";
                        $end_date_jan = $financial_year + 1 . "-01-31";
                        $count_jan = $_instance->calculateLineItems($officer_id, $start_date_jan, $end_date_jan);
                        echo $count_jan;
                        ?></td>
                    <td><?php
                        $start_date_feb = $financial_year + 1 . "-02-01";
                        $end_date_feb = $financial_year + 1 . "-02-28";
                        $count_feb = $_instance->calculateLineItems($officer_id, $start_date_feb, $end_date_feb);
                        echo $count_feb;
                        ?></td>
                    <td><?php
                        $start_date_mar = $financial_year + 1 . "-03-01";
                        $end_date_mar = $financial_year + 1 . "-03-31";
                        $count_mar = $_instance->calculateLineItems($officer_id, $start_date_mar, $end_date_mar);
                        echo $count_mar;
                        ?></td>
                    <td><?php
                        $total_of_year = $count_apr + $count_may + $count_jun + $count_jul + $count_aug + $count_sep + $count_oct + $count_nov + $count_dec + $count_jan + $count_feb + $count_mar;
                        echo round($total_of_year, 2);
                        ?></td>
                    <td>
                        <?php echo round(($total_of_year / 12), 2); ?>
                    </td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>

</table>
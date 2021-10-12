<!--Last Modified : 2014-08-13 2:00:00>-->
<script>
    $j(document).ready(function() {
        $j('#loading_image').hide();
    });

<?php if (isset($extraData['ranking_data'])) { ?>
        $j("#btn_print").show();
<?php } ?>
</script>
<?php //print_r($extraData) ?>
<head>
    <style>
        .td1 {
            background-color: #efefff;


        }
    </style>
</head>

<?php
$form_data = array(
    'id' => 'dealer_rank_form',
    'name' => 'dealer_rank_form',
);
?>
<?php echo form_open('reports/drawIndexDealerRanking', $form_data); ?>

<table align="center" >
    <tr>
        <td>Month :</td>
        <td><input type="text" id="ranking_month_picker" name="ranking_month_picker" style="border-style: groove" ></td>
        <td><input type="submit" name="btn_submit" id="btn_submit" value="Search" onclick=" return validateSearch();"></td>
        <?php if (isset($extraData['ranking_data'])) { ?>
            <td width="40%" style="position: absolute; float: right"><input type="button" name="btn_print" id="btn_print" value="To Excel" style="width: 90px;text-align: left" onclick="reportsToExcel('tbl_dealer_ranking', '<?php echo "Dealer_Ranking_FY_" . $extraData['fy_data']['fy'] ?>');"></td>
        <?php } ?>
    </tr>
    <tr>
        <td><?php echo form_error('ranking_month_picker'); ?></td>
    </tr>
</table>


<?php echo form_close(); ?>
&emsp;
<table class="dealer_ranking_css" id="tbl_dealer_ranking" width="95%" align="center">
    <thead>
        <tr><td colspan="6">
                <?php
                $fy = $extraData['fy_data']['fy'];
                if (isset($fy) && $fy != "-1/") {
                    echo "FY - " . $extraData['fy_data']['fy'];
                }
                ?>
            </td>
            <td colspan="2">
                <?php
                if (isset($extraData['fy_data']['month'])) {
                    echo date("F", mktime(0, 0, 0, $extraData['fy_data']['month']));
                } else {
                    echo "Month";
                }
                ?>

            </td>
            <td colspan="2"> Commulative Figures</td>
            <td colspan="1" >Avg. Sale</td>
        </tr>
    </thead>
    <tbody id="ranking_body">
        <tr >
            <td>Rank</td>
            <td>Dealer Name</td>
            <td>Account No.</td>
            <td>District</td>
            <td>Sales Officer</td>
            <td>Branch</td>
            <td>Target</td>
            <td>Actual</td>
            <td>Target</td>
            <td>Actual</td>
            <td>Per Month ( Apr - Jan )</td>
        </tr>
        <?php
        if (isset($extraData['ranking_data'])) {
            $rank = 1;
            foreach ($extraData['ranking_data'] as $ranking_data) {
                //e2d384
                ?>
                <tr>
                    <td><?php echo $rank++ ?></td>
                    <td><?php echo $ranking_data->delar_name ?></td>
                    <td><?php echo $ranking_data->delar_account_no ?></td>
                    <td><?php echo $ranking_data->district_name ?></td>
                    <td><?php echo $ranking_data->sales_officer_name ?></td>
                    <td><?php echo $ranking_data->area_code ?></td>
                    <td style="text-align: right;background-color: #FF9B9B"><?php echo $ranking_data->target ?></td>
                    <td style="text-align: right;background-color: #f4de8d"><?php echo $ranking_data->actual ?></td>
                    <td style="text-align: right;background-color: #FF9B9B"><?php echo $ranking_data->total_target ?></td>
                    <td style="text-align: right;font-weight: bold;background-color: #f4de8d"><?php echo $ranking_data->commulative_actual ?></td>
                    <td style="text-align: right;background-color: #a6ca8a"><?php echo $ranking_data->avg_sales ?></td>
                </tr>
                <?php
            }
        }
        ?>
    </tbody>
</table>


<div id="loading_image" hidden="hidden">
    <img src="<?php echo $System['URL'] ?>public/images/processing.gif" alt="Please Wait..." />
</div>